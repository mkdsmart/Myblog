@extends('design.design')

@section('content')
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .post-image {
            width: 100%;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .post-title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }
        .post-content {
            font-size: 16px;
            color: #555;
            margin-bottom: 20px;
        }
        .comments {
            margin-bottom: 20px;
        }
        .comment {
            margin-bottom: 10px;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 4px;
        }
        .comment-content {
            font-size: 14px;
            color: #444;
        }
        .comment-input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 20px;
        }
        .comment-button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>

    <div class="container">
        <img src="{{ asset($post->image) }}" alt="Post Image" class="post-image">
        <h2 class="post-title">{{ $post->title }}</h2>
        <p class="post-content">
           {{ $post->content }}
        </p>

        <div class="comments"> Comments
            @foreach($comments as $comment)
            <div class="comment">
                <p>author: {{ $comment->author }}</p>
                <p class="comment-content">{{ $comment->message}}</p>
                <p>likes: {{ $comment->likes }}</p>
            </div>
            @endforeach
           
            
        </div>
        <form action="{{ route('save_comment') }}" method="post">
            @csrf
            <input type="hidden" name="postid" value="{{ $post->id }}">
            <input type="text" class="comment-input" placeholder="Add a comment..." name="message">
            @if($errors->has('message'))
                <span class="text-danger">{{$errors->first('message')}}</span>
            @endif
            <button class="comment-button">Add Comment</button>
        </form>
        
    </div>

@endsection