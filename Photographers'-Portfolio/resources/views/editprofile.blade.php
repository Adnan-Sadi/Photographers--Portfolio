<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Profile | Photographer's Portfolio</title>

    


    <!-- Stylesheet -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">

</head>
@include('layouts.header')
<body>

<div class="container">
    <form action="/user/{{ $user->u_id }}/update" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-md-8 offset-2">

                <div class="row"><h2>Edit Profile</h2></div>




                <div class="form-group row">
                    <label for="bio"  >BIO</label>
                    <input id="bio" type="text"
                        class="form-control @error('bio') is-invalid @enderror"
                        name="bio" value="{{ old('bio') ?? $user-> bio }}"
                        autocomplete="bio" autofocus>

                    @error('bio')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>





                <div class="row">
                    <label for="image"  >Profile Picture</label>
                    <input id="image" type="file"
                        class="form-control-file @error('image') is-invalid @enderror"
                        name="image" value="{{ old('image') ?? $user->profile->image }}">

                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row pt-4">
                    <button class="btn btn-primary">Save Profile</button>
                </div>

            </div>
        </div>
    </form>
</body>