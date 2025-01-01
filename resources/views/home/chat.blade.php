<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat with Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="home/css/font-awesome.min.css" rel="stylesheet">
    <link href="home/css/style.css" rel="stylesheet">
    <link href="home/css/responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f2f2f2; /* Light background for contrast */
        }

        .hero_area {
            padding: 20px;
            margin-top: 10px;
        }

        .chat-container {
            max-width: 600px; /* Center chat container */
            margin: 0 auto; /* Center horizontally */
            background-color: #fff; /* White background for the chat */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Subtle shadow */
        }

        .chat-box {
            background-color: #f8f9fa;
            height: 400px; /* Increased height for better viewing */
            overflow-y: auto; /* Allow scrolling */
            border: 1px solid #ced4da;
            border-radius: 5px;
            padding: 15px; /* Padding for the chat content */
        }

        .chat-box p {
            padding: 10px;
            border-radius: 15px;
            max-width: 80%; /* Increased message width */
            margin-bottom: 10px; /* Spacing between messages */
        }

        .chat-box .text-right p {
            background-color: #007bff; /* User message color */
            color: white;
            margin-left: auto; /* Align user messages to the right */
        }

        .chat-box .text-left p {
            background-color: #6c757d; /* Admin message color */
            color: white;
            margin-right: auto; /* Align admin messages to the left */
        }

        .form-group textarea {
            resize: none;
        }

        .btn-block {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-block:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
    </style>
</head>
<body>
<div class="hero_area">
    @include('home.header')
    <div class="container mt-4">
        <h3 class="text-center">Chat with Admin</h3>
        <div class="chat-container p-3">
            <!-- <div class="chat-box">
                @foreach ($messages as $message)
                    <div class="mb-2">
                        @if ($message->user_id == Auth::id())
                            <div class="text-right">
                                <p>
                                    <strong>You:</strong> {{ $message->message }}
                                </p>
                            </div>
                        @else
                            <div class="text-left">
                                <p>
                                    <strong>Admin:</strong> {{ $message->message }}
                                </p>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div> -->
            <div class="chat-box">
    @foreach ($messages as $message)
        <div class="mb-2">(
            @if ($message->user_id == Auth::id))
                <div class="text-right">
                    <p>
                        <strong>You:</strong> {{ $message->message }}
                    </p>
                    @if ($message->image)
                        <img src="{{ asset('storage/' . $message->image) }}" class="img-fluid rounded" style="max-width: 200px;"/>
                    @endif
                </div>
            @else
                <div class="text-left">
                    <p>
                        <strong>Admin:</strong> {{ $message->message }}
                    </p>
                    @if ($message->image)
                        <img src="{{ asset('storage/' . $message->image) }}" class="img-fluid rounded" style="max-width: 200px;"/>
                    @endif
                </div>
            @endif
        </div>
    @endforeach
</div>

        </div>
        
        <form action="{{ route('send.message') }}" method="POST" class="mt-3">
            @csrf
            <div class="form-group">
                <textarea name="message" class="form-control" rows="3" placeholder="Type your message..."></textarea>
            </div>
            <div class="form-group">
                <input type="file" name="image" accept="image/*" class="form-control-file">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Send</button>
        </form>
    </div>
</div>
@include('home.footer')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
