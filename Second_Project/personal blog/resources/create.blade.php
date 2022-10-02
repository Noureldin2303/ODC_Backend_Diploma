<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xtra Blog</title>
    <link rel="stylesheet" href="./assets/css/all.min.css"> <!-- https://fontawesome.com/ -->
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/templatemo-xtra-blog.css') }}" rel="stylesheet">
</head>

<body>
    <header class="tm-header" id="tm-header">
        <div class="tm-header-wrapper">
            <nav class="tm-nav" id="tm-nav">
                <ul>
                    <li class="tm-nav-item"><a href="/" class="tm-nav-link">
                            <i class="fas fa-home"></i>
                            Blog Home
                        </a></li>
                    <li class="tm-nav-item active"><a href="post.html" class="tm-nav-link">
                            <i class="fas fa-pen"></i>
                            Single Post
                        </a></li>
                </ul>
            </nav>

        </div>
    </header>
    <div class="container-fluid">
        <main class="tm-main">

            <div class="row tm-row">
                <center>
                    <div class="col-12">
                        <hr class="tm-hr-primary tm-mb-55">
                        <img src="{{ asset('assets/images/' . $article->img . '') }}"
                            alt="Building microservices with Dropwizard, MongoDB & Docker" width="750"
                            class="blog-banner-img">
                    </div>
                </center>
            </div>
            <div class="row tm-row">
                <div>
                    <div>
                        <div class="mb-4">
                        <form action="{{url("post/create")}}" method="POST">
                        <span>title :</span>
                            <input type="text" name="title">
                            <p class="tm-mb-40">{{ $article->time }} posted by Admin Nat</p>
                            </br>
                            <span>Body :</span>
                            <input type="text" name="article_body">
                            <input type="submit">
                            {{-- بعدين --}}
                            {{-- <span class="d-block text-right tm-color-primary">Creative . Design . Business</span> --}}
                        </div>
</form>
                        <!-- Comments -->
                </div>

            </div>

        </main>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/templatemo-script.js"></script>
</body>

</html>
