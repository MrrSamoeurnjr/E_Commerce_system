@php
    use Illuminate\Support\Facades\Auth;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Chat</title>
    <link rel="stylesheet" href="{{ asset('home/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/style.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .message-container {
            max-height: 500px;
            overflow-y: auto;
            padding: 15px;
            background: white;
            border-radius: 8px;
            margin: 20px 0;
        }
        .message {
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 8px;
        }
        .message.sent {
            background-color: #e3f2fd;
            margin-left: 20%;
        }
        .message.received {
            background-color: #f5f5f5;
            margin-right: 20%;
        }
        .voice-message {
            margin: 10px 0;
            padding: 10px;
            background: #f8f9fa;
            border-radius: 8px;
        }
        .voice-message audio {
            width: 100%;
            max-width: 300px;
        }
        .voice-controls {
            margin: 15px 0;
            padding: 10px;
            background: #f8f9fa;
            border-radius: 8px;
        }
        .camera-controls {
            margin: 10px 0;
            padding: 10px;
            background: #f8f9fa;
            border-radius: 8px;
            display: flex;
            gap: 10px;
        }
        .camera-preview {
            background: #f8f9fa;
            padding: 10px;
            border-radius: 8px;
            text-align: center;
        }
        #cameraPreview, #photoCanvas, #capturedPhoto {
            border-radius: 8px;
            margin: 0 auto;
        }
        .camera-controls button {
            margin-right: 5px;
        }
        #cancelCamera {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        #cancelCamera:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
    </style>
</head>
<body>
<div class="hero_area">
@include('home.header')
    <div class="container mt-5">
   
        <div class="card">
            <div class="card-header">
                <h3>Chat with Admin</h3>
            </div>
            <div class="card-body">
                <div class="message-container">
                    @foreach($messages as $message)
                        <div class="message {{ $message->user_id == Auth::id() ? 'sent' : 'received' }}">
                            <strong>{{ $message->user->name }}:</strong>
                            
                            @if($message->message)
                                <p>{{ $message->message }}</p>
                            @endif
                            
                            @if($message->voice_message)
                                <div class="voice-message">
                                    <audio controls>
                                        <source src="{{ $message->voice_message }}" type="audio/mp3">
                                        Your browser does not support the audio element.
                                    </audio>
                                </div>
                            @endif
                            
                            @if($message->image)
                                <div class="message-image">
                                    <img src="{{ asset('storage/' . $message->image->image_path) }}" 
                                         alt="Chat Image" 
                                         class="img-fluid rounded">
                                </div>
                            @endif
                            
                            <small class="text-muted">
                                {{ $message->created_at->format('M d, Y H:i') }}
                            </small>
                        </div>
                    @endforeach
                </div>

                <div class="chat-controls mt-3">
                    <form id="chatForm" action="{{ route('send.message') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <textarea name="message" class="form-control" rows="3" placeholder="Type your message..."></textarea>
                        </div>
                        
                        <div class="form-group">
                            <input type="file" name="image" accept="image/*" class="form-control-file">
                        </div>

                        <div class="form-group">
                            <div class="camera-controls">
                                <button type="button" id="startCamera" class="btn btn-info">
                                    <i class="fa fa-camera"></i> Open Camera
                                </button>
                                <button type="button" id="takePhoto" class="btn btn-success" style="display: none;">
                                    <i class="fa fa-camera"></i> Take Photo
                                </button>
                                <button type="button" id="retakePhoto" class="btn btn-warning" style="display: none;">
                                    Retake
                                </button>
                                <button type="button" id="cancelCamera" class="btn btn-danger" style="display: none;">
                                    <i class="fa fa-times"></i> Cancel
                                </button>
                            </div>
                            <div class="camera-preview mt-2">
                                <video id="cameraPreview" style="display: none; max-width: 100%; width: 400px;" autoplay></video>
                                <canvas id="photoCanvas" style="display: none; max-width: 100%; width: 400px;"></canvas>
                                <img id="capturedPhoto" style="display: none; max-width: 100%; width: 400px;" />
                            </div>
                            <input type="hidden" name="captured_photo" id="capturedPhotoData">
                        </div>

                        <div class="voice-controls">
                            <button type="button" id="startRecording" class="btn btn-info">
                                <i class="fa fa-microphone"></i> Start Recording
                            </button>
                            <button type="button" id="stopRecording" class="btn btn-danger" style="display: none;">
                                <i class="fa fa-stop"></i> Stop Recording
                            </button>
                            <audio id="audioPlayback" controls style="display: none;"></audio>
                            <input type="hidden" name="voice_message" id="voiceMessage">
                        </div>

                        <button type="submit" class="btn btn-primary btn-block mt-2">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let mediaRecorder;
        let audioChunks = [];

        document.getElementById('startRecording').addEventListener('click', async () => {
            try {
                audioChunks = [];
                const stream = await navigator.mediaDevices.getUserMedia({ audio: true });
                mediaRecorder = new MediaRecorder(stream);

                mediaRecorder.ondataavailable = (event) => {
                    audioChunks.push(event.data);
                };

                mediaRecorder.onstop = async () => {
                    const audioBlob = new Blob(audioChunks, { type: 'audio/mp3' });
                    const audioUrl = URL.createObjectURL(audioBlob);
                    
                    // Show preview
                    const audio = document.getElementById('audioPlayback');
                    audio.src = audioUrl;
                    audio.style.display = 'block';

                    // Convert to base64
                    const reader = new FileReader();
                    reader.onloadend = () => {
                        const base64Audio = reader.result;
                        document.getElementById('voiceMessage').value = base64Audio;
                    };
                    reader.readAsDataURL(audioBlob);
                };

                mediaRecorder.start();
                document.getElementById('startRecording').style.display = 'none';
                document.getElementById('stopRecording').style.display = 'inline-block';

            } catch (err) {
                console.error('Error:', err);
                alert('Error accessing microphone. Please ensure you have granted permission.');
            }
        });

        document.getElementById('stopRecording').addEventListener('click', () => {
            if (mediaRecorder && mediaRecorder.state === 'recording') {
                mediaRecorder.stop();
                document.getElementById('startRecording').style.display = 'inline-block';
                document.getElementById('stopRecording').style.display = 'none';
            }
        });

        // Auto-scroll to bottom of message container
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.querySelector('.message-container');
            container.scrollTop = container.scrollHeight;
        });

        let stream;
        const cameraPreview = document.getElementById('cameraPreview');
        const photoCanvas = document.getElementById('photoCanvas');
        const capturedPhoto = document.getElementById('capturedPhoto');
        const startCameraBtn = document.getElementById('startCamera');
        const takePhotoBtn = document.getElementById('takePhoto');
        const retakePhotoBtn = document.getElementById('retakePhoto');
        const cancelCameraBtn = document.getElementById('cancelCamera');

        startCameraBtn.addEventListener('click', async () => {
            try {
                stream = await navigator.mediaDevices.getUserMedia({ 
                    video: { 
                        facingMode: 'user',
                        width: { ideal: 1280 },
                        height: { ideal: 720 }
                    } 
                });
                cameraPreview.srcObject = stream;
                cameraPreview.style.display = 'block';
                startCameraBtn.style.display = 'none';
                takePhotoBtn.style.display = 'inline-block';
                cancelCameraBtn.style.display = 'inline-block';
                capturedPhoto.style.display = 'none';
            } catch (err) {
                console.error('Error:', err);
                alert('Error accessing camera. Please ensure you have granted permission.');
            }
        });

        takePhotoBtn.addEventListener('click', () => {
            photoCanvas.width = cameraPreview.videoWidth;
            photoCanvas.height = cameraPreview.videoHeight;
            
            const context = photoCanvas.getContext('2d');
            context.drawImage(cameraPreview, 0, 0, photoCanvas.width, photoCanvas.height);
            
            const photoData = photoCanvas.toDataURL('image/jpeg');
            capturedPhoto.src = photoData;
            document.getElementById('capturedPhotoData').value = photoData;
            
            cameraPreview.style.display = 'none';
            capturedPhoto.style.display = 'block';
            takePhotoBtn.style.display = 'none';
            retakePhotoBtn.style.display = 'inline-block';
            cancelCameraBtn.style.display = 'inline-block';
            
            if (stream) {
                stream.getTracks().forEach(track => track.stop());
            }
        });

        retakePhotoBtn.addEventListener('click', () => {
            startCameraBtn.click();
            retakePhotoBtn.style.display = 'none';
            document.getElementById('capturedPhotoData').value = '';
            cancelCameraBtn.style.display = 'inline-block';
        });

        cancelCameraBtn.addEventListener('click', () => {
            if (stream) {
                stream.getTracks().forEach(track => track.stop());
            }
            cameraPreview.style.display = 'none';
            capturedPhoto.style.display = 'none';
            photoCanvas.style.display = 'none';
            startCameraBtn.style.display = 'inline-block';
            takePhotoBtn.style.display = 'none';
            retakePhotoBtn.style.display = 'none';
            cancelCameraBtn.style.display = 'none';
            document.getElementById('capturedPhotoData').value = '';
        });

        // Update the form submission handler
        document.getElementById('chatForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            
            try {
                const response = await fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    }
                });

                const result = await response.json();
                
                if (result.success) {
                    // Clear form
                    this.reset();
                    // Clear camera preview and stop stream
                    if (stream) {
                        stream.getTracks().forEach(track => track.stop());
                    }
                    cameraPreview.style.display = 'none';
                    capturedPhoto.style.display = 'none';
                    photoCanvas.style.display = 'none';
                    startCameraBtn.style.display = 'inline-block';
                    takePhotoBtn.style.display = 'none';
                    retakePhotoBtn.style.display = 'none';
                    document.getElementById('audioPlayback').style.display = 'none';
                    
                    // Reload only the messages container
                    const messagesContainer = document.querySelector('.message-container');
                    const response = await fetch(window.location.href);
                    const html = await response.text();
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const newMessages = doc.querySelector('.message-container');
                    messagesContainer.innerHTML = newMessages.innerHTML;
                    
                    // Scroll to bottom
                    messagesContainer.scrollTop = messagesContainer.scrollHeight;
                } else {
                    alert(result.message || 'Failed to send message');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Failed to send message. Please try again.');
            }
        });

        // Add this function to periodically check for new messages
        function pollForNewMessages() {
            setInterval(async () => {
                try {
                    const response = await fetch(window.location.href);
                    const html = await response.text();
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const newMessages = doc.querySelector('.message-container');
                    const currentMessages = document.querySelector('.message-container');
                    
                    if (newMessages.innerHTML !== currentMessages.innerHTML) {
                        currentMessages.innerHTML = newMessages.innerHTML;
                        currentMessages.scrollTop = currentMessages.scrollHeight;
                    }
                } catch (error) {
                    console.error('Error polling messages:', error);
                }
            }, 5000); // Poll every 5 seconds
        }

        // Start polling when page loads
        document.addEventListener('DOMContentLoaded', () => {
            pollForNewMessages();
        });
    </script>
</body>
</html>
