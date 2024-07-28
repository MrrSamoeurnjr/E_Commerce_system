<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
   </head>
   <style type="text/css">
     .comments-section, .all-comments {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.comments-section h1, .all-comments h1 {
    font-size: 24px;
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

.comment-form, .reply-form {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.comment-form textarea, .reply-form textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
}

.comment-form .btn, .reply-form .btn {
    align-self: flex-end;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.comment-form .btn-primary {
    background-color: #007bff;
    color: white;
}

.reply-form .btn-success {
    background-color: #28a745;
    color: white;
}

.reply-form .btn-secondary {
    background-color: #6c757d;
    color: white;
}

.comment {
    padding: 15px;
    border-bottom: 1px solid #ddd;
}

.comment h3 {
    margin: 0;
    font-size: 18px;
    color: #007bff;
}

.comment p {
    margin: 5px 0;
    color: #555;
}

.reply-link {
    color: #007bff;
    cursor: pointer;
    text-decoration: none;
}

.reply-link:hover {
    text-decoration: underline;
}

.replies {
    margin-left: 20px;
    padding-left: 15px;
    border-left: 2px solid #ddd;
}

.reply {
    padding: 10px 0;
}

.reply h5 {
    margin: 0;
    font-size: 16px;
    color: #28a745;
}

.reply p {
    margin: 5px 0;
    color: #555;
}

   </style>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
         @include('home.slider')
         <!-- end slider section -->
      </div>
      <!-- why section -->
      @include('home.why')
      <!-- end why section -->
      
      <!-- arrival section -->
      @include('home.arrival')
      <!-- end arrival section -->
      
      <!-- product section -->
      @include('home.product')
      <!-- end product section -->
      <!-- <div>
         <h1 style="font-size:30px;text-align:center;padding-top:20px;padding-bottom:20px;">Comments</h1>
         <form action="{{ url('add_comment') }}" method="POST">
            @csrf
            <textarea name="comment" id="" placeholder="Comment something here"></textarea>
            <input type="submit" value="Comment" name="" class="btn btn-primary">
         </form>
      </div>
      <div>
      <h1>All Comments</h1>
@if($comments->isNotEmpty())
    @foreach($comments as $comment)
        <div>
            <h3>{{ $comment->name }}</h3>
            <p>{{ $comment->comment }}</p>
            <a href="javascript:void(0);" onclick="reply(this)" data-Commentid="{{ $comment->id }}">Reply</a>
            @if($comment->replies->isNotEmpty())
                <div style="margin-left: 20px;">
                    <h4>Replies:</h4>
                    @foreach($comment->replies as $reply)
                        <div>
                            <h5>{{ $reply->name }}</h5>
                            <p>{{ $reply->reply }}</p>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    @endforeach
@else
    <p>No comments available.</p>
@endif
      </div>

<div style="display: none;" class="replyDiv">
<form action="{{url('add_reply')}}" method="POST">
    @csrf
    <input type="text" id="commentId" name="commentId" hidden="">
    <textarea name="reply" id="" placeholder="Write something here"></textarea>
    <button type="submit" value="Reply" class="btn btn-success">Reply</button>
    <a href="javascript:void(0);" class="btn" onclick="reply_close(this)">Close</a>
</form>
</div> -->
<div class="comments-section">
    <h1>Comments</h1>
    <form action="{{ url('add_comment') }}" method="POST" class="comment-form">
        @csrf
        <textarea name="comment" placeholder="Comment something here"></textarea>
        <input type="submit" value="Comment" class="btn btn-primary">
    </form>
</div>

<div class="all-comments">
    <h1>All Comments</h1>
    @if($comments->isNotEmpty())
        @foreach($comments as $comment)
            <div class="comment">
                <h3>{{ $comment->name }}</h3>
                <p>{{ $comment->comment }}</p>
                <a href="javascript:void(0);" onclick="reply(this)" data-Commentid="{{ $comment->id }}" class="reply-link">Reply</a>
                @if($comment->replies->isNotEmpty())
                    <div class="replies">
                        <h4>Replies:</h4>
                        @foreach($comment->replies as $reply)
                            <div class="reply">
                                <h5>{{ $reply->user->name }}</h5>
                                <p>{{ $reply->reply }}</p>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        @endforeach
    @else
        <p>No comments available.</p>
    @endif
</div>
<div class="replyDiv" style="display: none;">
    <form action="{{url('add_reply')}}" method="POST" class="reply-form">
        @csrf
        <input type="text" id="commentId" name="commentId" hidden="">
        <textarea name="reply" placeholder="Write something here"></textarea>
        <button type="submit" class="btn btn-success">Reply</button>
        <a href="javascript:void(0);" class="btn btn-secondary" onclick="reply_close(this)">Close</a>
    </form>
</div>



      <!-- subscribe section -->
      @include('home.subscribe')
      <!-- end subscribe section -->
      <!-- client section -->
      @include('home.client')
      <!-- end client section -->
      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         </p>
      </div>
      <script type="text/javascript">
         function reply(caller) {
            document.getElementById('commentId').value=$(caller).attr('data-Commentid');
            $('.replyDiv').insertAfter($(caller));
            $('.replyDiv').show();
         }
         function reply_close(caller) {
            $('.replyDiv').hide();
         }
      </script>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>
