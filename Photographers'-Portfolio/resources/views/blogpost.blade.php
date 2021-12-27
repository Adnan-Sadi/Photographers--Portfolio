<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Post a Blog | Photographer's Portfolio</title>

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
    <section class="breadcrumb-area bg-img bg-overlay jarallax">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content text-center">
                        <h2 class="page-title">{{ Session::get('username') }}'s Blog</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ asset('profileindex.blade.php') }} ">{{ Session::get('username') }} </a><i class="fa fa-user" aria-hidden="true"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="breadcrumb-content text-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li>
                                    <a class="btn btn-danger upload-button" href="/photo-upload-page"><i class="fas fa-upload"></i> Upload Photo</a>
                                </li>
                                <li>
                                    <a class="btn btn-danger upload-button" href="/blogpost"><i class="fas fa-upload"></i> Post Blog</a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Area End -->

    <!-- Post Create Area Start -->

    <div class="container flex justify-center">
        <header class="text-center">
            <div class="alime-contact-form mt-50">
                <!-- Form -->
                <form action="/blogpost" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <input type="text" name="title" class="form-control mb-30" placeholder="Blog Title">
                        </div>
                        <div class="col-12">
                            <textarea name="text_writings" class="form-control mb-30" placeholder="Write Text Here"></textarea>
                        </div>
                    </div>
                </header>
                <div class="row py-4">
                    <div class="col-lg-6 mx-auto">
                        <!-- Upload image input-->
                        <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                            <input id="upload" name="cover_photo" type="file" onchange="readURL(this);" class="form-control border-0">
                            <label id="upload-label" for="upload" class="font-weight-light text-muted">Choose file</label>
                            <div class="input-group-append">
                                <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                            </div>
                        </div>
                        <!-- Uploaded image area-->
                        <p class="font-italic text-center">Upload a Cover Image for your blog.</p>
                        <div class="image-area mt-4"><img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block">
                    </div>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn alime-btn btn-2 mt-15">Post</button>
            </div>
        </form>
    </div>

    <!-- Post Create Area End -->

    
    @include('layouts.gbfooter')
