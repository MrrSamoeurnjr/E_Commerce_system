<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Chat</title>
    <base href="/public">
    @include('admin.css')
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    /* Chat container */
    .chat-container {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 80vh;
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 15px;
        background-color: #f9f9f9;
    }

    /* Chat box */
    .chat-box {
        height: 65vh;
        overflow-y: auto;
        margin-bottom: 15px;
        background-color: #fff;
        padding: 10px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    /* Message bubbles */
    .message {
        margin-bottom: 10px;
        display: flex;
        justify-content: flex-start;
    }

    .message.admin {
        justify-content: flex-end;
    }

    .message p {
        padding: 10px 15px;
        border-radius: 15px;
        max-width: 70%;
        font-size: 15px;
    }

    .message.admin p {
        background-color: #007bff;
        color: #fff;
    }

    .message.user p {
        background-color: #e0e0e0;
        color: #333;
    }

    /* Chat input area */
    .chat-input {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .chat-input textarea {
        flex-grow: 1;
        border-radius: 20px;
        padding: 10px 20px;
        border: 1px solid #ddd;
        outline: none;
        font-size: 14px;
        height: 50px;
        resize: none;
    }

    .chat-input button {
        border-radius: 20px;
        height: 50px;
    }

    /* Scrollbar styling */
    .chat-box::-webkit-scrollbar {
        width: 8px;
    }

    .chat-box::-webkit-scrollbar-thumb {
        background-color: #007bff;
        border-radius: 10px;
    }
 #edit_username
 {  
    color: white;
 }
</style>
</head>
<body>
<div class="container-scroller">
<!-- partial:partials/_sidebar.html -->
@include('admin.sidebar')
<!-- partial -->
<!-- partial:partials/_navbar.html -->
@include('admin.header')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="container mt-4">
            <h3 id="edit_username" class="mb-4">Chat with {{ $chat->user->name }}</h3>

            <div class="chat-container">
                <!-- Chat Box -->
                <div class="chat-box">
                    @foreach ($chat->messages as $message)
                        <div class="message {{ $message->user_id == $chat->user->id ? 'user' : 'admin' }}">
                            @if ($message->user_id == $chat->user->id)
                                <p><strong>{{ $chat->user->name }}:</strong> {{ $message->message }}</p>
                            @else
                                <p><strong>Admin:</strong> {{ $message->message }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>

                <!-- Chat Input -->
                <form action="{{ route('admin.sendMessage', $chat->id) }}" method="POST" class="chat-input">
                    @csrf
                    <textarea name="message" class="form-control" placeholder="Type your message..."></textarea>
                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
