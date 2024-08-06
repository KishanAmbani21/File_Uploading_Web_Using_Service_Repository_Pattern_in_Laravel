<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>View Posts</title>

    <link rel="stylesheet" href="{{ asset('assets/css/showpost.css') }}">

</head>

<body>
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="{{ route('home') }}">Home</a></li>
                    <li><a class="nav-link scrollto active" href="{{ route('viewPosts') }}">View Post</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('image') }}">Images</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('pdf') }}">PDFs</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('doc') }}">Docs</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('uploadPost') }}">Add Post</a></li>

                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->

        </div>
    </header>


    <div class="row" style="margin-top: 100px;">
        @if ($posts->isEmpty())
            <p style=" font-size: 20px; text-align: center; margin-top: 100px; color: white;">files not Available</p>
        @endif
        @foreach ($posts as $post)
            <div class="column">
                <div class="card">
                    <img class="card-img-top"
                        src="{{ file_exists(public_path('Images/' . $post->image)) ? asset('Images/' . $post->image) : asset('https://play-lh.googleusercontent.com/83sCGxIWuDo2nr4_dqgBbQUPwc-Qs_Ssp99mugxqcPdElbavO8ZXZYIWyXbu-SLEUA') }}"
                        alt="{{ $post->title }}" width="200px" height="300px">
                    <div class="card-body" style="background-color: burlywood">
                        <h5 class="card-title" style="background-color: burlywood">Title : {{ $post->title }}</h5>
                        <p class="card-text" style="background-color: burlywood">Description :
                            {{ $post->description }}</p>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
</body>

</html>
