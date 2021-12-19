<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>navigation-with-button</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8aa2fd0685.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo e(asset('css/homepage.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/photoupload.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/header.css')); ?>">
</head>

<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body>
 
 <!---  Blogs --->   
<div class="blog-item">

    <!-- Photo Upload Button -->
    <div class="upload-photo">
        <a class="btn btn-default upload-button" data-target="#basicModal" data-toggle="modal"><i class="fas fa-upload"></i> Upload Photo</a></p>
    </div>

  <!-- Photo Uplaod Modal -->
  <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Upload Photo</h4>
        </div>

        <div class="modal-body">
          <div class="form-group">
            <label for="caption-text" class="col-form-label">Caption</label>
            <textarea class="form-control" id="caption-text" rows="3" name="description"></textarea>
          </div>
        </div>
        <div class="modal-body">
            <div class="file-upload">
                <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>
              
                <div class="image-upload-wrap">
                  <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
                  <div class="drag-text">
                    <h3>Drag and drop a file or select add Image</h3>
                  </div>
                </div>
                <div class="file-upload-content">
                  <img class="file-upload-image" src="#" alt="your image" />
                  <div class="image-title-wrap">
                    <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                  </div>
                </div>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Upload</button>
        </div>
      </div>
    </div>
  </div>
 <!-- Photo Upload Modal -->

    <div class="blog-body">
        <div class="icon">
            <img src="<?php echo e(asset('photos/123.png')); ?>" alt="">
        </div>
        <div class="content">
            <div class="details"> 
                <a href="#"><span class="blog-owner">username</span></a> 
                <a href="#"><span class="blog-likes"><i class="far fa-thumbs-up"></i> Likes</span></a>
                <a href="#"><span class="blog-comments"><i class="far fa-comment"></i> Comments</span></a> 
            </div>
            
            <div class="title">Lorem Ipsum, dizgi ve bask  <span class="blog-date">27.12.2017</span></div>
            <div class="rounded"></div>

            <p>
                
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculis felis vel ante venenatis faucibus. 
                Vivamus ac tellus turpis. Nulla laoreet ut risus eu malesuada. Sed eu lectus ac ex rutrum congue vel in eros. Nunc iaculis quis tellus at feugiat. 
            </p>
        </div>

        <div class="item-arrow">
            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
        </div>
    </div>

</div>
 <!---  Blogs --->   

<div class="blog-item">
    <div class="blog-body">
        <div class="icon">
            <img src="<?php echo e(asset('photos/123.png')); ?>" alt="">
        </div>
        <div class="content">
            <div class="details"> 
                <a href="#"><span class="blog-owner">username</span></a> 
                <a href="#"><span class="blog-likes"><i class="far fa-thumbs-up"></i> Likes</span></a>
                <a href="#"><span class="blog-comments"><i class="far fa-comment"></i> Comments</span></a>  
            </div>

            <div class="title">Lorem Ipsum, dizgi ve bask <span class="blog-date">27.12.2017</span></div>
            <div class="rounded"></div>

            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculis felis vel ante venenatis faucibus. 
                Vivamus ac tellus turpis. Nulla laoreet ut risus eu malesuada. Sed eu lectus ac ex rutrum congue vel in eros. Nunc iaculis quis tellus at feugiat. 
            </p>
        </div>

        <div class="item-arrow">
            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
        </div>
    </div>

</div>

<!-- Photo -->
<div class="photo-item">
    <div onclick="location.href='/photo'">
       <img src="<?php echo e(asset('photos/123.png')); ?>" alt="">
    </div>

    <div class="details"> 
       <a href=""><span class="blog-owner">username</span></a> 
       <a href=""><span class="blog-likes"><i class="far fa-thumbs-up"></i> Likes</span></a>
       <a href=""><span class="blog-comments"><i class="far fa-comment"></i> Comments</span></a>
       <span class="photo-date">27.12.2017</span> 
   </div>

   <div class="rounded"></div>

   <div class="photo-caption">
       Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculis felis vel ante venenatis faucibus. 
       Vivamus ac tellus turpis. Nulla laoreet ut risus eu malesuada. Sed eu lectus ac ex rutrum congue vel in eros. Nunc iaculis quis tellus at feugiat. 
   </div>
</div>
<!-- Photo -->


<div class="blog-item">
    <div class="blog-body">
        <div class="icon">
            <img src="<?php echo e(asset('photos/123.png')); ?>" alt="">
        </div>
        <div class="content">

            <div class="details"> 
                <a href="#"><span class="blog-owner">username</span></a> 
                <a href="#"><span class="blog-likes"><i class="far fa-thumbs-up"></i> Likes</span></a>
                <a href="#"><span class="blog-comments"><i class="far fa-comment"></i> Comments</span></a> 
            </div>

            <div class="title">Lorem Ipsum, dizgi  <span class="blog-date">27.12.2017</span></div>
            <div class="rounded"></div>

            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculis felis vel ante venenatis faucibus. 
                Vivamus ac tellus turpis. Nulla laoreet ut risus eu malesuada. Sed eu lectus ac ex rutrum congue vel in eros. Nunc iaculis quis tellus at feugiat. 
            </p>
        </div>

        <div class="item-arrow">
            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
        </div>
    </div>

</div>

<div class="photo-item">
    <div>
       <img src="<?php echo e(asset('photos/123.png')); ?>" alt="">
    </div>

    <div class="details"> 
        <a href=""><span class="blog-owner">username</span></a> 
        <a href=""><span class="blog-likes"><i class="far fa-thumbs-up"></i> Likes</span></a>
        <a href=""><span class="blog-comments"><i class="far fa-comment"></i> Comments</span></a>
        <span class="photo-date">27.12.2017</span> 
   </div>

   <div class="rounded"></div>

   <div class="photo-caption">
       Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculis felis vel ante venenatis faucibus. 
       Vivamus ac tellus turpis. Nulla laoreet ut risus eu malesuada. Sed eu lectus ac ex rutrum congue vel in eros. Nunc iaculis quis tellus at feugiat. 
   </div>
</div>

<div class="blog-item">
    <div class="blog-body">
        <div class="icon">
            <img src="<?php echo e(asset('photos/123.png')); ?>" alt="">
        </div>
        <div class="content">

            <div class="details"> 
                <a href="#"><span class="blog-owner">username</span></a> 
                <a href="#"><span class="blog-likes"><i class="far fa-thumbs-up"></i> Likes</span></a>
                <a href="#"><span class="blog-comments"><i class="far fa-comment"></i> Comments</span></a> 
            </div>

            <div class="title">Lorem Ipsum, dizgi ve bask  <span class="blog-date">27.12.2017</span></div>
            <div class="rounded"></div>

            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculis felis vel ante venenatis faucibus. 
                Vivamus ac tellus turpis. Nulla laoreet ut risus eu malesuada. Sed eu lectus ac ex rutrum congue vel in eros. Nunc iaculis quis tellus at feugiat. 
            </p>
        </div>

        <div class="item-arrow">
            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
        </div>
    </div>
</div>

<div class="see-more" align="center">
    <a class="btn btn-default see-more-button" href="#">See More</a></p>
</div>

 
   <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script src="<?php echo e(asset('js/photoupload.js')); ?>"></script>
</body>

</html>
<?php /**PATH C:\Projects\CSE-327-Project\Photographers'-Portfolio\resources\views/newsfeed.blade.php ENDPATH**/ ?>