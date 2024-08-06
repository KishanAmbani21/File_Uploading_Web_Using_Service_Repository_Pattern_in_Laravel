<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Files Page</title>
    <link rel="stylesheet" href="{{ asset('assets/css/showpost.css') }}">

</head>

<body>
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="{{ route('home') }}">Home</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('viewPosts') }}">View Post</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('image') }}">Images</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('pdf') }}">PDFs</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('doc') }}">Docs</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('uploadPost') }}">Add Post</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>
    </header>

    @if ($segment == 'image')
        <div class="row" style="margin-top: 100px;">
            @php
                $imagePosts = $posts->filter(function ($post) {
                    return Str::endsWith(strtolower($post->image), ['.jpg', '.jpeg', '.png']);
                });
            @endphp

            @if ($imagePosts->isEmpty())
                <p style=" font-size: 20px; text-align: center; margin-top: 100px; color: white;">Image files not
                    available.</p>
            @else
                @foreach ($imagePosts as $post)
                    <div class="column">
                        <div class="card">
                            <img class="card-img-top"
                                src="{{ file_exists(public_path('Images/' . $post->image)) ? asset('Images/' . $post->image) : asset('https://cdn.iconscout.com/icon/free/png-256/free-image-file-2014959-1700567.png') }}"
                                alt="{{ $post->title }}" width="200px" height="300px">
                            <div class="card-body" style="background-color: burlywood">
                                <h5 class="card-title" style="background-color: burlywood">Title :
                                    {{ $post->title }}</h5>
                                <p class="card-text" style="background-color: burlywood">Description :
                                    {{ $post->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    @elseif($segment == 'doc')
        <div class="row" style="margin-top: 100px;">

            @php
                $DocPosts = $posts->filter(function ($post) {
                    return Str::endsWith(strtolower($post->image), ['.doc', '.docx', '.txt']);
                });
            @endphp

            @if ($DocPosts->isEmpty())
                <p style=" font-size: 20px; text-align: center; margin-top: 100px; color: white;">Doc files not
                    Available</p>
            @else

                @foreach ($DocPosts as $post)

                        <div class="column">
                            <div class="card">
                                <img class="card-img-top"
                                    src="{{ file_exists('public/DOCs/' . $post->image) ? asset('Images/' . $post->image) : asset('https://img.freepik.com/premium-vector/modern-flat-design-doc-file-icon-web_599062-7102.jpg') }}"
                                    alt="{{ $post->title }}" width="200px" height="300px">
                                <div class="card-body" style="background-color: burlywood">
                                    <h5 class="card-title" style="background-color: burlywood">Title :
                                        {{ $post->title }}
                                    </h5>
                                    <p class="card-text" style="background-color: burlywood">Description :
                                        {{ $post->description }}</p>
                                </div>
                            </div>
                        </div>

                @endforeach
                @endif
        </div>
    @elseif($segment == 'pdf')
        <div class="row" style="margin-top: 100px;">

            @php
                $PdfPosts = $posts->filter(function ($post) {
                    return Str::endsWith(strtolower($post->image), ['.pdf']);
                });
            @endphp

            @if ($PdfPosts->isEmpty())
                <p style=" font-size: 20px; text-align: center; margin-top: 100px; color: white;">Pdf files not
                    Available</p>
            @else

            @foreach ($PdfPosts as $post)
                    <div class="column">
                        <div class="card">
                            <img class="card-img-top"
                                src="{{ file_exists('public/PDFs/' . $post->image) ? asset('Images/' . $post->image) : asset('https://play-lh.googleusercontent.com/9XKD5S7rwQ6FiPXSyp9SzLXfIue88ntf9sJ9K250IuHTL7pmn2-ZB0sngAX4A2Bw4w') }}"
                                alt="{{ $post->title }}" width="200px" height="300px">
                            <div class="card-body" style="background-color: burlywood">
                                <h5 class="card-title" style="background-color: burlywood">Title :
                                    {{ $post->title }}</h5>
                                <p class="card-text" style="background-color: burlywood">Description :
                                    {{ $post->description }}</p>
                            </div>
                        </div>
                    </div>

            @endforeach
            @endif
        </div>
    @endif
</body>

</html>
