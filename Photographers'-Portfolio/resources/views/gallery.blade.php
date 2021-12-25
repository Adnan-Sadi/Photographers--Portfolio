<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Gallery | Photographer's Portfolio</title>

    <!-- Favicon -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8aa2fd0685.js" crossorigin="anonymous"></script>

    <!-- Stylesheet -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/photoupload.css') }}">

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
    <section class="breadcrumb-area bg-img bg-overlay jarallax">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content text-center">
                        <h2 class="page-title">{{ Session::get('username') }}'s Gallery</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ asset('profileindex.blade.php') }} ">{{ Session::get('username') }} </a><i class="fa fa-user" aria-hidden="true"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Area End -->

    <!-- Gallery Area Start -->
    <div class="alime-portfolio-area section-padding-80 clearfix">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Projects Menu -->
                    <div class="alime-projects-menu wow fadeInUp" data-wow-delay="100ms">
                        <div class="portfolio-menu text-center">
                            <button class="btn active" data-filter="*">All</button>
                            <button class="btn" data-filter=".photo">Photo</button>
                            <button class="btn" data-filter=".blogs">Blog</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row alime-portfolio alime-blog-area section-padding-80-0 mb-70">
                <!-- Single Gallery Item -->
                <div class="photo blog photo-card col-12 col-sm-6 col-lg-3 single_gallery_item">

                    <a href="#" class="post-thumbnail"><img class="card-img-top card-img" src="img/bg-img/10.jpg" alt="Card image cap"></a>
                    <div class="card-body post-content">
                        <div class="post-meta">
                            <a href="#"><i class="ti-star" aria-hidden="true"></i></a>
                            <a href="#">3 Comments</a>
                        </div>
                        <h5 class="card-title post-title">Post title</h5>
                        <a href="#" class="post-title">Captions</a>                            
                        <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit.....</p>
                        <a href="#" class="btn post-catagory">...See More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Gallery Area End -->
    @include('layouts.footer')
