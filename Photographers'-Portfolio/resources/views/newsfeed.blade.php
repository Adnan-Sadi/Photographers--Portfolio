<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newsfeed</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8aa2fd0685.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
</head>

@include('layouts.header')

<body>
 
  
<div class="blog-item">

    <!-- Photo Upload Button -->
    <div class="upload-photo">
        <a class="btn btn-default upload-button" href="/photo-upload-page"><i class="fas fa-upload"></i> Upload Photo</a></p>
    </div>

    @if ($allPostsSorted->isEmpty())
    
      <h3 class="text-center" style="color:white;"><strong> Please follow other users to View Newsfeed. </strong></h3>
        
    @endif
  

    @foreach ( $allPostsSorted as $post )

    <!-- Generating blog cards if the post is a blog -->
    @if (isset($post->b_id))

        <!---  Blogs --->  
        <div class="blog-body">
            <div class="icon">
                <img src="{{ asset('photos/cover-images/'.$post->cover_photo) }}" alt="">
            </div>

            <div class="content">
                <div class="details"> 
                    <a href="#"><span class="blog-owner">{{ $post->user->full_name }}</span></a> 
                    <a href="#"><span class="blog-likes"><i class="far fa-thumbs-up"></i> Likes</span></a>
                    <a href="#"><span class="blog-comments"><i class="far fa-comment"></i> Comments</span></a> 
                </div>
                
                <div class="title">{{ $post->title }}  
                <span class="blog-date">{{ $post->created_at }}</span></div>
                <div class="rounded"></div>

                <p>
                   {{ Str::limit($post->text_writings,300,'...') }}
                </p>
            </div>

            <div class="item-arrow">
                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
            </div>
        </div>    
       <!---  Blogs --->
       
    <!-- Generating photo cards if the post is a photo -->
    @else
  
     <!-- Photo -->
    <div class="photo-item">
        <div onclick="location.href='/photo/{{ $post->p_id }}'">
           <img src="{{ asset('photos/photo-uploads/'.$post->photo_path) }}" alt="">
        </div>
    
        <div class="details"> 
           <a href=""><span class="blog-owner">{{ $post->user->full_name }}</span></a> 
           <a href=""><span class="blog-likes"><i class="far fa-thumbs-up"></i> Likes</span></a>
           <a href=""><span class="blog-comments"><i class="far fa-comment"></i> Comments</span></a>
           <span class="photo-date">{{ $post->created_at }}</span> 
       </div>
    
       <div class="rounded"></div>
    
       <div class="photo-caption">
           {{ $post->caption }}
       </div>
    </div>
    <!-- Photo -->
    @endif
        
   @endforeach
</div><br><br>

   <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>
