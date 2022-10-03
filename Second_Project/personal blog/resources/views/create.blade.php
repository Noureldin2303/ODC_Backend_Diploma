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
    <link rel="stylesheet" href="{{url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css')}}" />

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
    <div class="container">
 
        <section class="post">
            <header>Create Post</header>
            <form action="{{ url('blog/add') }}" method="post" enctype='multipart/form-data'>
            @csrf
                <div class="content">
                    <img src="{{url('./assets/images/hero.png')}}" alt="logo">
                    <div class="details">
                        <p>Noureldin Farag</p>
                        <div class="privacy">
                            <i class="fas fa-user-friends"></i>
                            <span>Public</span>
                            <i class="fas fa-caret-down"></i>
                        </div>
                    </div>
                </div>
                <div class="options">
                    <input type="text" placeholder="Add a title" name="title" class="title" />
                </div>
                <textarea name="article_body" placeholder=" What's on your mind, ?" spellcheck="false" required></textarea>
              
                <div class="upload" data-text="Select your file!">
                    <input name="file-upload-field" type="file" name="img" class="file-upload-field" required>
                </div>


                <input type="submit" value="Post" class="button" />
                
            </form>
        </section>

    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/templatemo-script.js"></script>
</body>

</html>