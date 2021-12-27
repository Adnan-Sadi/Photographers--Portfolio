<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload Photo</title>

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8aa2fd0685.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/photoupload.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
</head>
<body>

@include('layouts.header')

<!-- Photo Uplaod Form -->

    <h4 class="form-title">Upload Photo</h4>

    <!-- View Photo Upload Errors if any-->
         @if ($errors->any())
         <div class="alert alert-danger alert-block error">
         <strong>Error:</strong><br>
         <button type="button" class="close" data-dismiss="alert">×</button>

         @foreach ($errors->all() as $error)
             <span>{{$error}}</span><br>
         @endforeach
         </div>
         @endif
     <!-- View Photo Upload Errors if any-->

    <div class="form-body">

        <form action="/photo-upload" method="POST" enctype="multipart/form-data">
        @csrf    
            <div class="form-group">
                <label for="caption-text" class="col-form-label" >Caption</label>
                <textarea class="form-control" id="caption-text" rows="5" name="caption"></textarea>
            </div>
            
        
            
                <div class="file-upload">
                    <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>
                
                    <div class="image-upload-wrap">
                    <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" name="photo" />
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
           
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Upload</button>
            <br><br><br>
        </form>
    </div>   
 
 <!-- Photo Upload Form -->
 @include('layouts.footer')

   <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script src="{{ asset('js/photoupload.js') }}"></script>
</body>
</html>