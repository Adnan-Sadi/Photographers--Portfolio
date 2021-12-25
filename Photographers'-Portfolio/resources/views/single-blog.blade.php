<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Blog | Photographer's Portfolio</title>

    <!-- Favicon -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8aa2fd0685.js" crossorigin="anonymous"></script>

    <!-- Stylesheet -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('css/gb.css') }}">

</head>

<body>
    

    <!-- Header Area Start -->
    <header class="header-area">
        <!-- Main Header Start -->
        <div class="main-header-area">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Classy Menu -->
                    <nav class="classy-navbar justify-content-between" id="alimeNav">
                        <!-- Logo -->
                        <a class="nav-brand" href="./index.html"><img src="./img/core-img/logo.png" alt=""></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">
                            <!-- Menu Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>
                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul id="nav">
                                    <li><a href="{{ asset('newsfeed') }}">Home</a></li> 
                                    
                                    <!-- Checking if user is logged in -->
                                    @if (Session::get('u_id'))
                                    <li><a href="#">{{ Session::get('username') }}</a></li>
                                    @endif
                                     <!-- Checking if user is logged in -->
                                    
                                    
                                    <li class="active"><a href="{{ asset('gallery') }}">Gallery</a></li>
                                    <!-- Checking if user is not logged in -->
                                    @if (!Session::get('u_id'))
                                    <li><a class="navbar-link login" href="/login">Log In</a></li>
                                    <li><a class="btn action-button" role="button" href="/registration">Sign Up</a></p></li>
                                    @else
                                    <!-- Checking if user is not logged in -->
                                    <li><a class="btn btn-outline-light action-button" role="button" href="/logout">Logout</a></li>
                                    @endif
                                </ul>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->

    <!-- Breadcrumb Area Start -->
    <section class="breadcrumb-area blog bg-img bg-overlay jarallax" style="background-image: url(img/bg-img/18.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content text-center">
                        <h2 class="page-title">Sunset over Cantal, France</h2>
                        <div class="post-meta">
                            <a href="#" class="post-author">By Jared Padilla</a>
                            <a href="#" class="post-date">July 15, 2019</a>
                            <a href="#" class="post-comments">No Comments</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Area End -->

    <!-- Blog Details Area Start -->
    <div class="alime--blog-area section-padding-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <!-- Blog Details Text -->
                    <div class="blog-details-text">
                    </div>

                    <!-- Post Author Area -->
                    <div class="post-author-area mt-50 d-flex align-items-center justify-content-between">                      
                        <!-- Share Info -->
                        <div class="post-social-info d-flex align-items-center">
                            <p>Share:</p>
                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Details Area End -->

    <!-- Pager Area Start -->
    <div class="alime-pager-area section-padding-0-80">
        <div class="container">
            <div class="row no-gutters">
                <!-- Previous -->
                <div class="col-6">
                    <div class="previous bg-img" style="background-image: url(img/bg-img/5.jpg);">
                        <div class="overlay-content d-flex align-items-center justify-content-center">
                            <a href="#" class="post-title">Lorem</a>
                            <a href="#" class="previous-link"><i class="arrow_left"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Next -->
                <div class="col-6">
                    <div class="next bg-img" style="background-image: url(img/bg-img/49.jpg);">
                        <div class="overlay-content d-flex align-items-center justify-content-center">
                            <a href="#" class="post-title">Ipsum</a>
                            <a href="#" class="next-link"><i class="arrow_right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pager Area End -->

    <!-- Comment Area Start -->
    <div class="comment-area section-padding-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <!-- Comments Area -->
                    <div class="comment_area clearfix">
                        <h4 class="mb-30">02 Comments</h4>

                        <ol>
                            <!-- Single Comment Area -->
                            <li class="single_comment_area">
                                <!-- Comment Content -->
                                <div class="comment-content d-flex">
                                    <!-- Comment Author -->
                                    <div class="comment-author">
                                        <img src="img/bg-img/34.jpg" alt="author">
                                    </div>
                                    <!-- Comment Meta -->
                                    <div class="comment-meta">
                                        <a href="#" class="post-date">27 Aug 2018</a>
                                        <h5>Mike Phillips</h5>
                                        <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetu adipisci velit, sed quia non numquam eius modi</p>
                                        <a href="#" class="like">Like</a>
                                        <a href="#" class="reply">Reply</a>
                                    </div>
                                </div>
                                
                                <ol class="children">
                                    <li class="single_comment_area">
                                        <!-- Comment Content -->
                                        <div class="comment-content d-flex">
                                            <!-- Comment Author -->
                                            <div class="comment-author">
                                                <img src="img/bg-img/33.jpg" alt="author">
                                            </div>
                                            <!-- Comment Meta -->
                                            <div class="comment-meta">
                                                <a href="#" class="post-date">27 Aug 2018</a>
                                                <h5>Mia Maya</h5>
                                                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetu adipisci velit, sed quia non numquam eius modi</p>
                                                <a href="#" class="like">Like</a>
                                                <a href="#" class="reply">Reply</a>
                                            </div>
                                        </div>
                                    </li>
                                </ol>
                            </li>
                        </ol>
                    </div>

                    <!-- Leave A Reply -->
                    <div class="alime-contact-form mt-50">
                        <h4 class="mb-30">Leave A Comment</h4>

                        <!-- Form -->
                        <form action="#" method="post">
                            <div class="row">                             
                                <div class="col-12">
                                    <textarea name="comment" class="form-control mb-30" placeholder="Your Comment"></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn alime-btn btn-2 mt-15">Comment</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Comment Area End -->


    @include('layouts.footer')
