
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevBlog - Noureldin Farag's Personal Blog</title>

    <!--
    - favicon
  -->
    <link rel="shortcut icon" href="./assets/images/favicon.ico" type="image/x-icon">

    <!--
    - custom css link
  -->
    <link rel="stylesheet" href="{{ url('./assets/css/style.css') }}" />

    <!--
    - google font link
  -->
    <link rel="preconnect" href="{{ url('https://fonts.googleapis.com') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/a88e445782.js" crossorigin="anonymous"></script>
    <style>
        .flex-action {
            display: flex;
            justify-content: space-evenly;
            flex-wrap: nowrap;
        }
    </style>
</head>

<body class="light-theme">
    <?php
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Auth;
    $articles = DB::table('article')
        ->join('category', 'article.category_id', '=', 'category.category_id')
        ->select('article.*', 'category.name')
        ->where('article.is_active', 1)
        ->get();
  
    ?>
    <header>

        <div class="container">

            <nav class="navbar">

                <a href="#">
                    <img src="./assets/images/logo-light.svg" alt="Devblog's logo" width="150" class="logo-light">
                    <img src="./assets/images/logo-dark.svg" alt="Devblog's logo" width="150" class="logo-dark">
                </a>

                <div class="btn-group">


                    <button class="nav-menu-btn">
                        <ion-icon name="menu-outline"></ion-icon>
                    </button>

                </div>

                <div class="flex-wrapper">

                    <ul class="desktop-nav">

                        <li>
                            <a href="#" class="nav-link">Home</a>
                        </li>

                        <li>
                            <a href="#" class="nav-link">About Me</a>
                        </li>

                        <li>
                            <a href="#" class="nav-link">Contact</a>
                        </li>

                    </ul>

                </div>

                <div class="mobile-nav">

                    <button class="nav-close-btn">
                        <ion-icon name="close-outline"></ion-icon>
                    </button>

                    <div class="wrapper">

                        <p class="h3 nav-title">Main Menu</p>

                        <ul>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Home</a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">About Me</a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">Contact</a>
                            </li>
                        </ul>

                    </div>

                    <div>

                        <p class="h3 nav-title">Topics</p>

                        <ul>
                            <li class="nav-item">
                                <a href="post.html" class="nav-link">Database</a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">Accessibility</a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">Web Performance</a>
                            </li>
                        </ul>

                    </div>

                </div>

            </nav>

        </div>

    </header>
    <main>
        <div class="hero">

            <div class="container">

                <div class="left">

                    <h1 class="h1">
                        Hi, I'm <b>Noureldin Farag</b>.
                        <br>Web Developer
                    </h1>

                    <p class="h3">
                        Specialized in <abbr title="Accessibility">PHP</abbr>
                        and Core Web Vitals
                    </p>
                   
                    <div class="btn-group">
                    @csrf 
                    @if(Auth::guest())
                    <a href="{{url('login')}}" class="btn btn-secondary"> Login</a>
                    @else
                            <a href="Blog/Create" class="btn btn-secondary">Add Blog</a>
                            <a href="{{url('logout')}}" class="btn btn-secondary"> Logout</a>
                    @endif
                    </div>

                </div>

                <div class="right">

                    <div class="pattern-bg"></div>
                    <div class="img-box">
                        <img src="./assets/images/hero.png" alt="Noureldin Farag" class="hero-img">
                        <div class="shape shape-1"></div>
                        <div class="shape shape-2"></div>
                    </div>

                </div>

            </div>

        </div>





        <div class="main">

            <div class="container">
                <div class="blog">

                    <h2 class="h2">Latest Blog Post</h2>

                    <div class="blog-card-group">
                        @csrf
                        @foreach ($articles as $article)
                            <div class="blog-card">
                                <div class="blog-card-banner">
                                    <img src="{{url("./assets/images/$article->img")}}" width="250"
                                        class="blog-banner-img">
                                </div>

                                <div class="blog-content-wrapper">

                                    <button class="blog-topic text-tiny">{{ $article->name }}</button>

                                    <h3>
                                        <a href="post/{{ $article->article_id }}" class="h3">
                                            {{ $article->title }}
                                        </a>
                                    </h3>

                                    <p class="blog-text">
                                        {{ $article->article_body }}
                                    </p>

                                    <div class="wrapper-flex">

                                        <div class="profile-wrapper">
                                            <img src="./assets/images/author.png" alt="Noureldin Farag" width="50">
                                        </div>

                                        <div class="wrapper">
                                            <a href="#" class="h4">Noureldin Farag</a>

                                        </div>

                                    </div>
                                    @csrf
                                   
                                    @if(Auth::guest())
                                    <div></div>
                                    @else
                                        <div class="flex-action">
                                            <a href="{{ url("post/delete/ $article->article_id") }}"><i
                                                    class="fa-solid fa-trash"></i></a>
                                            <a href="{{ url("post/hide/$article->article_id") }}">
                                                <i class="fa-solid fa-eye-slash"></i></a>
                                            <a href="edit/{{ $article->article_id }}">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        @endforeach

                    </div>

                    <button style="display:none" class="btn load-more">Load More</button>

                </div>





                <!--
          - ASIDE
        -->

                <div class="aside">

                    <div class="contact">

                        <h2 class="h2">Let's Talk</h2>

                        <div class="wrapper">

                            <p>
                                Do you want to learn more about how I can help your company overcome problems? Let us
                                have a
                                conversation.
                            </p>

                            <ul class="social-link">

                                <li>
                                    <a href="#" class="icon-box discord">
                                        <ion-icon name="logo-discord"></ion-icon>
                                    </a>
                                </li>

                                <li>
                                    <a href="#" class="icon-box twitter">
                                        <ion-icon name="logo-twitter"></ion-icon>
                                    </a>
                                </li>

                                <li>
                                    <a href="#" class="icon-box facebook">
                                        <ion-icon name="logo-facebook"></ion-icon>
                                    </a>
                                </li>

                            </ul>

                        </div>

                    </div>

                    <div class="newsletter">

                        <h2 class="h2">Newsletter</h2>

                        <div class="wrapper">

                            <p>
                                Subscribe to our newsletter to be among the first to keep up with the latest updates.
                            </p>

                            <form action="#">
                                <input type="email" name="email" placeholder="Email Address" required>

                                <button type="submit" class="btn btn-primary">Subscribe</button>
                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </main>





    <!--
    - #FOOTER
  -->

    <footer>

        <div class="container">

            <div class="wrapper">

                <a href="#" class="footer-logo">
                    <img src="./assets/images/logo-light.svg" alt="DevBlog's Logo" width="150"
                        class="logo-light">
                    <img src="./assets/images/logo-dark.svg" alt="DevBlog's Logo" width="150" class="logo-dark">
                </a>

                <p class="footer-text">
                    Learn about Web accessibility, Web performance, and Database management.
                </p>

            </div>

            <div class="wrapper">

                <p class="footer-title">Quick Links</p>

                <ul>

                    <li>
                        <a href="#" class="footer-link">Advertise with us</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">About Us</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Contact Us</a>
                    </li>

                </ul>

            </div>

            <div class="wrapper">

                <p class="footer-title">Legal Stuff</p>

                <ul>

                    <li>
                        <a href="#" class="footer-link">Privacy Notice</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Cookie Policy</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Terms Of Use</a>
                    </li>

                </ul>

            </div>

        </div>

        <p class="copyright">
            &copy; Copyright 2022 <a href="#">DevBlog</a>
        </p>

    </footer>





    <!--
    - custom js link
  -->
    <script src="./assets/js/script.js"></script>

    <!--
    - ionicon link
  -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
