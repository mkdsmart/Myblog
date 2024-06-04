@extends('design.design')

@section('content')
<style>
      .post-form {
  background-color: #fff;
  padding: 20px;
  margin-bottom: 20px;
}

.post-form h2 {
  margin-bottom: 10px;
}

label {
  display: block;
  margin-bottom: 5px;
}

input,
textarea {
  width: 100%;
  padding: 8px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

button {
  background-color: #007bff;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  background-color: #096bd5;
}
</style>
<div class="post-form">
    <h2>Edit Post</h2>
    <form action="{{ route('update_post') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $post->id }}">
        <label for="post-title">Title:</label>
        <input type="text" id="post-title" name="title" value="{{ $post->title }}">
        @if($errors->has('title'))
            <span class="text-danger">{{$errors->first('title')}}</span>
        @endif

        <label for="post-content">Content:</label>
        <textarea id="post-content" name="content" rows="4">{{ $post->content }}</textarea>
        @if($errors->has('content'))
            <span class="text-danger">{{$errors->first('content')}}</span>
        @endif

        <label for="post-img">Choose an image:</label>
        <input type="file" id="post-img" name="image" value="{{ $post->image }}">
        @if($errors->has('image'))
            <span class="text-danger">{{$errors->first('image')}}</span><br>
        @endif

        <button type="submit">Submit</button>
    </form>
</div>
@endsection