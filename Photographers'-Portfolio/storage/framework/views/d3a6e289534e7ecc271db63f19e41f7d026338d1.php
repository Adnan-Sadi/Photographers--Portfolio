<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>navigation-with-button</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8aa2fd0685.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo e(asset('css/photopage.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/header.css')); ?>">

    
</head>

<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body>
    

<div class="photo-item">

    <!-- Photo Section -->
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
   <!-- Photo Section-->

   <br><br>

   <!-- Comment Section -->
   <div class="detailBox">
    <div class="titleBox">
      <label>Comment Box</label>
    </div>
    <div class="actionBox">
        <ul class="commentList">
            <li>
                <div class="commenterImage">
                  <img src="http://placekitten.com/50/50" />
                </div>
                <div class="commentText">
                    <p class="">Hello this is a test comment.</p> <span class="date sub-text">on November 5th, 2021</span>

                </div>
            </li>
            <li>
                <div class="commenterImage">
                  <img src="http://placekitten.com/45/45" />
                </div>
                <div class="commentText">
                    <p class="">Hello this is a test comment and this comment is particularly very long and it goes on and on and on.</p> <span class="date sub-text">on December 8th, 2021</span>

                </div>
            </li>
            <li>
                <div class="commenterImage">
                  <img src="http://placekitten.com/40/40" />
                </div>
                <div class="commentText">
                    <p class="">Hello this is a test comment.</p> <span class="date sub-text">on December 10th, 2021</span>

                </div>
            </li>
        </ul>
        <form class="form-inline" role="form">
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Your comments" />
            </div>
            <div class="form-group">
                <button class="btn btn-default">Add</button>
            </div>
        </form>
    </div>
  </div>
<!-- Comment Section -->

</div><br><br>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>
<?php /**PATH C:\Projects\CSE-327-Project\Photographers'-Portfolio\resources\views/photopage.blade.php ENDPATH**/ ?>