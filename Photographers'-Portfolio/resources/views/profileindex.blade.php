
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
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">

</head>
@include('layouts.header')
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 p-2 text-center">
            <img class="rounded-circle w-50" src="{{ $user->profileImage() }}" alt="profile">
        </div>
        <div class="col-md-8 pt-2">
            <div class="d-flex justify-content-between align-items-baseline">

                <div class="d-flex align-items-center mb-4">
                    <div class="h4 mr-4">{{ $user->username }}</div>

                    @if($showFollowBtn)
                        <follow-button user-id="{{ $user->u_id }}" follows="{{ $follows }}"></follow-button>
                    @endif
                </div>

                @can('update', $user->profile)
                <a href="/p/create">Add New Post</a>
                @endcan
            </div>

            @can('update', $user->profile)
                <a href="/editprofile/{{ $user->u_id }}/edit">Edit Profile</a>
            @endcan

            <div class="d-flex">
                <div class="pr-5"><strong>{{ $postsCount }}</strong> posts</div>
                <div class="pr-5"><strong>{{ $followersCount }}</strong> followers</div>
                <div class="pr-5"><strong>{{ $followingCount }}</strong> following</div>
            </div>
            <div>
                @if(!is_null($user->title))
                <div><strong>{{ $user->title }}</strong></div>
                @endif
                <div>{{ $user->bio }}</div>
                <div><strong><a href="">{{ $user->url }}</a></strong></div>
            </div>
        </div>

    </div>
</div>
</body>
</html>
