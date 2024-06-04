@extends('design.design')

@section('content')
<style>
  main {
    display: flex;
    flex-direction: row;
    overflow-x: scroll;
    flex-wrap: nowrap;
    height: 500px;
    width: fit-content;
  }

  .post {
    /* background-color: #fff !important;
    padding: 20px;
    height: 500px;
    width: 500px;
    margin-bottom: 20px;
    flex-basis: calc(33.33% - 20px);
    border: #0c0b0b 1px solid; */
    position: relative;
    width: 500px; /* Adjust the width as needed */
    height: 500px; /* Same as width to make it a square */
    background-color: #f0f0f0; /* Background color of the box */
    border: 1px solid #ccc; /* Border around the box */
    margin: 5px; /* Margin around each box */
    padding: 10px; /* Padding inside each box */
    box-sizing: border-box; /* Include border and padding in the box size */
    float: left;
  }
  .post img {
    width: 100%; /* Set maximum width to 100% of the container */
    height: 40%; /* Maintain aspect ratio */
  }

  .title {
    position: absolute;
    left: 10%;
    width: 100%;
    font-size: 1.4em;
    margin-bottom: 10px;
  }

  .content {
    position: absolute;
    top: 60%;
    left: 0%;
    width: 100%;
    color: #0c0b0b;
  }
  .buttons{
    position: absolute;
    top: 80%;
    left: 0%;
    width: 100%;
  }
  a {
    color: #007bff;
    text-decoration: none;
  }

  a:hover {
    text-decoration: underline;
  }

#add-post-btn {
    position: sticky;
    bottom: 100;
    display: block;
    margin: 0 auto;
    padding: 10px 20px;
    font-size: 16px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

#add-post-btn:hover {
    background-color: #0056b3;
}

</style>
<h2>Welcome to Myblog</h2>
<p>Living an authentic life and sharing to inspire and encourage others</p>

<main>
    @foreach($posts as $post)
            <div class= "post">
                <a href="{{ route('comment_post', ['id' => $post->id]) }}">
                    <img class="image-post" src="{{ asset($post->image) }}">
                    <div class="title"><h2 id= "title">{{ $post->title }}</h2></div>
                    <div class="content"><p id = "content">{{ $post->content }}</p></div>


                    <div class = "buttons">
                        <a href="{{route('delete_post', ['id' => $post->id])}}" method= "post" name= ><button class="dislike" type="button" value="dislike">Dislike</button></a>
                        <div><a href="{{route('like_post', ['id' => $post->id])}}" method= "post" name= ><button class="like" type="button" value="like">like</button></a>{{ $post->num_like }}</div>
                        <a href="{{ route('comment_post', ['id' => $post->id]) }}">comment ?</a>
                    </div>
                </a>
         </div>
   @endforeach

</main>

@endsection
