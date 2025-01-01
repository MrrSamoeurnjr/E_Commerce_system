<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Chat;
use Illuminate\Support\Facades\Auth;

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
    
    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required',
            'image' => 'nullable|image|max:2048', // Ensure valid images up to 2MB
        ]);

        // Get or create the chat for the user
        $chat = Chat::where('user_id', Auth::id())->first();
        if (!$chat) {
            $chat = Chat::create([
                'user_id' => Auth::id(),
                'admin_id' => 1, // Assuming admin ID is 1
            ]);
        }
// Handle file upload if present
$imagePath = null;
if ($request->hasFile('image')) {
    $imagePath = $request->file('image')->store('chat_images', 'public');
}
        // Save the message
        Message::create([
            'chat_id' => $chat->id,
            'user_id' => Auth::id(),
            'message' => $request->message,
            'image' => $imagePath,
        ]);

        return redirect()->back()->with('success','Message sent successfully');
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
        $chat = Chat::with('messages', 'user')->findOrFail($chatId);
        return view('admin.viewChat', compact('chat'));
    }

    // Admin sends a message
    public function adminSendMessage(Request $request, $chatId)
    {
        $request->validate([
            'message' => 'required',
        ]);

        // Find the chat and create a new message
        $chat = Chat::findOrFail($chatId);

        Message::create([
            'chat_id' => $chat->id,
            'user_id' => Auth::id(), // Assuming the admin is logged in
            'message' => $request->message,
        ]);

        return redirect()->route('admin.viewChat', $chatId);
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
