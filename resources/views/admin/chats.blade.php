<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Chats</title>
    <base href="/public">
    @include('admin.css')
    <!-- Add Bootstrap CSS for styling -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 30px;
        }
        .card {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: white;
            font-size: 1.25rem;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .edit_message {
            max-width: 500px; /* Set a reasonable max width for the message */
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        /* Adjust table layout */
        .table th, .table td {
            word-wrap: break-word;
            white-space: normal;
        }
        .message-container {
            max-height: 500px;
            overflow-y: auto;
            padding: 15px;
        }
        .message {
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 8px;
            background-color: #f8f9fa;
        }
        .message.sent {
            background-color: #e3f2fd;
            margin-left: 20%;
        }
        .message.received {
            background-color: #f5f5f5;
            margin-right: 20%;
        }
        .message-image {
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .message-image img {
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="container-scroller">
        @include('admin.sidebar')
        @include('admin.header')
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="container">
                    <!-- Card for User Chats -->
                    <div class="card">
                        <div class="card-header">
                            <h3>User Chats</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>Last Message</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($chats as $chat)
                                        <tr>
                                            <td>{{ $chat->user->name }}</td>
                                            <td class="edit_message">
                                                @if($chat->messages->last())
                                                    {{ $chat->messages->last()->message }}
                                                    @if($chat->messages->last()->image)
                                                        <br><small>(Has attachment)</small>
                                                    @endif
                                                @else
                                                    No messages yet
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.viewChat', $chat->id) }}" class="btn btn-primary btn-sm">View Chat</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
