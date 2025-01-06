<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Chat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ChatController extends Controller
{
    // // Display the chat interface
    // public function index()
    // {
    //     $chat = Chat::where('user_id', Auth::id())->first();
    //     if (!$chat) {
    //         // Create a chat if it doesn't exist
    //         $chat = Chat::create([
    //             'user_id' => Auth::id(),
    //             'admin_id' => 1, // Assuming admin ID is 1
    //         ]);
    //     }
    //     // Fetch messages for this chat
    //     $messages = Message::where('chat_id', $chat->id)->get();
    //     return view('home.chat', compact('messages'));
    // }
    // Display the chat interface
public function index()
{
    // Check if the user is authenticated
    if (Auth::id()) {
        // If the user is authenticated, proceed with the chat logic
        $chat = Chat::where('user_id', Auth::id())->first();

        // If chat doesn't exist, create a new chat
        if (!$chat) {
            $chat = Chat::create([
                'user_id' => Auth::id(),
                'admin_id' => 1, // Assuming admin ID is 1
            ]);
        }

        // Fetch messages for this chat
        $messages = Message::where('chat_id', $chat->id)->get();

        // Return the chat view with the messages
        return view('home.chat', compact('messages'));
    } else {
        // If the user is not authenticated, redirect them to the login page
        return redirect('login');
    }
}


    // Handle message sending
    
    private function saveBase64Image($base64Data)
    {
        try {
            // Remove data URI scheme prefix
            $image_parts = explode(";base64,", $base64Data);
            $image_base64 = base64_decode($image_parts[1]);
            
            // Generate unique filename
            $filename = 'captured_' . time() . '_' . uniqid() . '.jpg';
            $path = 'chat_images/' . $filename;
            
            // Save file
            Storage::disk('public')->put($path, $image_base64);
            
            return $path;
        } catch (\Exception $e) {
            \Log::error('Error saving captured photo: ' . $e->getMessage());
            return null;
        }
    }

    public function sendMessage(Request $request)
    {
        try {
            DB::beginTransaction();
            
            $request->validate([
                'message' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'voice_message' => 'nullable|string|max:20000000',
                'captured_photo' => 'nullable|string|max:5000000'
            ]);

            $chat = Chat::firstOrCreate(
                ['user_id' => Auth::id()],
                ['admin_id' => 1]
            );

            $messageData = [
                'chat_id' => $chat->id,
                'user_id' => Auth::id(),
                'message' => $request->message,
                'voice_message' => $request->voice_message
            ];

            $message = Message::create($messageData);

            // Handle uploaded image
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                if ($image->isValid()) {
                    $imagePath = $image->store('chat_images', 'public');
                    Image::create([
                        'message_id' => $message->id,
                        'image_path' => $imagePath
                    ]);
                }
            }

            // Handle captured photo
            if ($request->captured_photo) {
                $imagePath = $this->saveBase64Image($request->captured_photo);
                if ($imagePath) {
                    Image::create([
                        'message_id' => $message->id,
                        'image_path' => $imagePath
                    ]);
                }
            }

            DB::commit();
            return response()->json(['success' => true, 'message' => 'Message sent successfully']);

        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Chat Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to send message: ' . $e->getMessage()
            ], 500);
        }
    }


    // admin chat
    // Admin view: List of user chats
    public function adminChats()
    {
        // Get all chats
        $chats = Chat::with('user')->get();
        return view('admin.chats', compact('chats'));
    }

    // Admin view: Specific chat messages with a user
    public function adminViewChat($chatId)
    {
        try {
            $chat = Chat::with(['messages.user', 'messages.image'])->findOrFail($chatId);
            return view('admin.viewChat', compact('chat'));
        } catch (\Exception $e) {
            \Log::error('Error viewing chat: ' . $e->getMessage());
            return back()->with('error', 'Error loading chat');
        }
    }

    // Admin sends a message
    public function adminSendMessage(Request $request, Chat $chat)
    {
        try {
            DB::beginTransaction();
            
            $request->validate([
                'message' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'voice_message' => 'nullable|string|max:20000000',
                'captured_photo' => 'nullable|string|max:5000000'
            ]);

            $messageData = [
                'chat_id' => $chat->id,
                'user_id' => Auth::id(),
                'message' => $request->message,
                'voice_message' => $request->voice_message
            ];

            $message = Message::create($messageData);

            // Handle uploaded image
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                if ($image->isValid()) {
                    $imagePath = $image->store('chat_images', 'public');
                    Image::create([
                        'message_id' => $message->id,
                        'image_path' => $imagePath
                    ]);
                }
            }

            // Handle captured photo
            if ($request->captured_photo) {
                $imagePath = $this->saveBase64Image($request->captured_photo);
                if ($imagePath) {
                    Image::create([
                        'message_id' => $message->id,
                        'image_path' => $imagePath
                    ]);
                }
            }

            DB::commit();
            return response()->json(['success' => true, 'message' => 'Message sent successfully']);

        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Admin Chat Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to send message: ' . $e->getMessage()
            ], 500);
        }
    }
    // for admin
    public function editMessage($messageId)
{
    // Get the message to be edited
    $message = Message::findOrFail($messageId);

    // Check if the current user is the owner of the message (either user or admin)
    if (Auth::id() != $message->user_id) {
        return redirect()->back()->with('error', 'You are not authorized to edit this message.');
    }

    return view('admin.editMessage', compact('message'));
}
public function updateMessage(Request $request, $messageId)
{
    // Validate the input
    $request->validate([
        'message' => 'required',
    ]);

    // Find the message to be updated
    $message = Message::findOrFail($messageId);

    // Check if the current user is the owner of the message (either user or admin)
    if (Auth::id() != $message->user_id) {
        return redirect()->back()->with('error', 'You are not authorized to edit this message.');
    }

    // Update the message
    $message->message = $request->message;
    $message->save();

    return redirect()->route('admin.viewChat', $message->chat_id)->with('success', 'Message updated successfully.');
}
public function deleteMessage($messageId)
{
    // Find the message to be deleted
    $message = Message::findOrFail($messageId);

    // Check if the current user is the owner of the message (either user or admin)
    if (Auth::id() != $message->user_id) {
        return redirect()->back()->with('error', 'You are not authorized to delete this message.');
    }

    // Delete the message
    $message->delete();

    return redirect()->back()->with('success', 'Message deleted successfully.');
}

}
