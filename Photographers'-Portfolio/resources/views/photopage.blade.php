<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Page</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8aa2fd0685.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/photopage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">

    
</head>

@include('layouts.header')

<body>
    

<div class="photo-item">

    <!-- Photo Section -->
    <div>
       <img src="{{ asset('photos/photo-uploads/'. $photo->photo_path) }}" alt="">
    </div>

    <div class="details"> 
       <a href=""><span class="photo-owner">{{ $photo->user->username }}</span></a> 
       <a href=""><span class="photo-likes"><i class="far fa-thumbs-up"></i> Likes</span></a>
       <a href=""><span class="photo-comments"><i class="far fa-comment"></i> Comments</span></a>
       
       <span class="photo-date">{{ $photo->created_at }}</span>

       
       @if ($showDeleteButton == true)
           <!-- Delete Button -->
            <a type="button" class="btn" data-toggle="modal" data-target="#deleteModal">
                <span class="photo-delete" >
                <i class="fas fa-trash-alt" data-toggle="tooltip" data-placement="right" title="Delete Photo"></i>
            </span></a>
            <!-- Delete Button --> 
       @endif 
       
   </div>

   <div class="rounded"></div>

   <div class="photo-caption">
       {{ $photo->caption }}
   </div>
   <!-- Photo Section-->
  
  <!-- Confirmation Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Photo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure you want to delete this photo?
        </div>
        <div class="modal-footer">

        <form id="form-delete" action="/photo-delete/{{ $photo->p_id }}" method="POST">
        @csrf
        @method('delete')
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Yes</button>
        </form>
        
        </div>
      </div>
    </div>
  </div>
  <!-- Confirmation Modal -->

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

@include('layouts.footer')

    <script>
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();
    });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>
