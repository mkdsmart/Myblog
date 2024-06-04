<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Add your custom styles here */
        /* For example: */
        body{
            display: flex;
            flex-direction: column;
        }
        .navbar-brand {
            font-size: 24px;
            font-weight: bold;
        }
        .wrapper {
            min-height: calc(100vh - 100px); /* Adjust height based on footer height */
            /* Add additional styles for your wrapper if needed */
        }

        .container {
            flex: 0 0 auto;
            position: sticky;
            bottom: 0;
            width: 100%;
            background-color: #f8f9fa;
            padding: 20px 0;
        }
        main {
    display: flex;
    flex-direction: row;
    overflow-x: scroll;
    flex-wrap: nowrap; 
    height: 500px;
    width: fit-content;
  }
  
  .post {
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
</head>
<body>
        <!-- The navbar for all pages -->
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <!-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar">ghfvhgcg</span>
                    <span class="icon-bar">gvgnchgn</span>
                    <span class="icon-bar">vggnc</span>
                </button> -->
                <a class="navbar-brand" href="#">My Blog</a>
            </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
             <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="nstyled">
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                <form class="navbar-form navbar-right" role="search">
                    <a href="{{ route('login') }}">login</a>
                    <a href="{{ route('register') }}">Register</a>
                </form>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>
    
    <div class="wrapper">
    
    <h2>Welcome to Mybog</h2>
    <p>Living an authentic life and sharing to inspire and encourage others</p>

    <main>
        @foreach($posts as $post)
                <div class= "post"> 
                    <img class="image-post" src="{{ asset($post->image) }}">
                    <div class="title"><h2 id= "title">{{ $post->title }}</h2></div>
                    <div class="content"><p id = "content">{{ $post->content }}</p></div>
                
                        
                    <div class = "buttons"> 
                        <div><a href="{{ route('register') }}" method= "post" name= ><button class="like" type="button" value="like">like</button></a>{{ $post->num_like }}</div>
                        <a href="{{ route('register') }}">comment ?</a>
                    </div>
            </div>
    @endforeach   
    
    </main>
        </div>   
   

    <!-- The footer for all pages -->
    <footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h4>About Us</h4>
                <p>This blog is for college students to share their experiences, good, and bad moments. This is a point where alumni or older students could advice freshman an in coming students about their Academic, professionl, and social life.</p>
            </div>
            <div class="col-md-4">
                <h4>Useful Links</h4>
                <ul class="list-unstyled">
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h4>Contact Us</h4>
                <address>
                    <strong>My Blog</strong><br>
                    410 Westhampton Way<br>
                    Richmond, Virginia, 00000<br>
                    <abbr title="Phone">P:</abbr> (000) 000-0000
                </address>
            </div>
        </div>
        <hr>
        <div class="text-center">
            <p>&copy; 2024 My Blog. All rights reserved.</p>
        </div>
    </div>
</footer>

</body>
</html>