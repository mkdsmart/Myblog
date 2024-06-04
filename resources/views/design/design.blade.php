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
        .menu-toggle {
            cursor: pointer;
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
        }

        .dash {
            width: 30px;
            height: 3px;
            background-color: black;
            margin: 6px 0;
            transition: all 0.3s ease;
        }

        .menu-items {
            display: none;
            position: fixed;
            top: 50px;
            right: 20px;
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .menu-items li {
            list-style-type: none;
            margin-bottom: 10px;
        }

        .menu-items li a {
            text-decoration: none;
            color: #333;
            font-size: 16px;
        }

        .menu-toggle.open .dash:nth-child(1) {
            transform: translateY(9px) rotate(45deg);
        }

        .menu-toggle.open .dash:nth-child(2) {
            opacity: 0;
        }

        .menu-toggle.open .dash:nth-child(3) {
            transform: translateY(-9px) rotate(-45deg);
        }

        .menu-toggle.open + .menu-items {
            display: block;
        }
        .user{
            position: fixed;
            top: 30px;
            right: 70px;
        }
    </style>
</head>
<body>
        <!-- The navbar for all pages -->
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{route('home')}}">My Blog</a>
            </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
             <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="nstyled">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                    @if(auth()->user()->admin == true)
                    <li><a href="{{route('adminonly')}}">Admin only</a></li>
                    @endif
                </ul>
                <!-- <form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Search</button>
                </form> -->
               <div class="user">{{ auth()->user()->name }}</div>
                <div class="menu-toggle">
                    <div class="dash"></div>
                    <div class="dash"></div>
                    <div class="dash"></div>
                </div>
                <ul class="menu-items">
                    <li><a href=" {{route('profile.edit')}}">Profile</a></li>
                    <li><a href="{{ route('logout') }}">Logout</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>

    <div class="wrapper">
        @yield('content')
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
                    <li><a href="{{route('home')}}">Home</a></li>
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

<script>
    document.querySelector('.menu-toggle').addEventListener('click', function() {
        this.classList.toggle('open');
    });
</script>

</body>
</html>
