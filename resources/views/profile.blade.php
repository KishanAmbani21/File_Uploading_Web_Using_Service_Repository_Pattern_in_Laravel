<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile Page</title>

    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link href="{{ asset('assets/css/profile.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="main-body">

            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                            class="rounded-circle" width="150">
                    </div>

                    <div class="card-body">
                        <div class="f1">
                            <div class="row">

                                <div class="col-sm-100" style="padding-left: 480px">
                                    <h6 class="mb-0">Full Name : {{ $loggedInUserData->name }}</h6>
                                </div>


                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-100" style="padding-left: 480px">
                                    <h6 class="mb-0">Email : {{ $loggedInUserData->email }}</h6>
                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-sm-100" style="padding-left: 480px">
                                    <h6 class="mb-0">Mobile : (+91) 83200 75592</h6>
                                </div>

                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-sm-12" id="a1">
                                <a class="btn btn-info" target="__blank" href="{{ route('logout') }}"
                                    style="display: block">Logout</a>
                            </div>
                        </div>

                        <h4>List of Post</h4>
                        <table class="table table-striped">


                            <thead>
                                <!-- Table headers -->
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($dataArray))
                                    @foreach ($dataArray as $post)
                                        <tr>
                                            <!-- Post details -->
                                            <td>{{ $post->id }}</td> <!-- Post ID -->
                                            <td>{{ $post->title }}</td> <!-- Post Title -->
                                            <td>{{ $post->description }}</td> <!-- Post Description -->
                                            <!-- Displaying the image, checking if it exists -->
                                            <td><img class="card-img-top"
                                                    src="{{ file_exists(public_path('Images/' . $post->image)) ? asset('Images/' . $post->image) : asset('https://cdn.iconscout.com/icon/free/png-256/free-image-file-2014959-1700567.png') }}"
                                                    alt="{{ $post->title }}"
                                                    style="
                                            height: 80px;
                                            width: 80px;">
                                            </td>
                                            <td>
                                                <!-- Button to delete the post, linking to delete_page route with post ID -->
                                                <a class="btn
                                                    btn-secondary px-5 mt-2"
                                                    href="{{ route('deletePost', $post->id) }}"
                                                    onclick="return confirm('Are you sure you want to delete this post?')">Delete</a>

                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" style="text-align: center;">No Data Available</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
