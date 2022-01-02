 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title> PROFILE | Photographer's Portfolio</title>



    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">

</head>

<body>
<div class="container">
    <div class="main-body">

          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">

              <li class="breadcrumb-item"><a href="{{ asset('gallery.blade.php') }} ">  Home</a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0)">Gallery</a></li>

            </div>
          </nav>
          <!-- /Breadcrumb -->

          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">

                    <img src="{{ $user->profileImage() }}"  alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-7">
                      <h4> {{ $user->username }}</h4>
                      <p class="text-secondary mb-1">  {{ $user->bio}}  </p>



                    </div>
                  </div>
                </div>
              </div>


            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $user->full_name}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $user->email}}
                    </div>
                  </div>



                  <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-info " target="__blank" href="https://www.bootdey.com/snippets/view/profile-edit-data-and-skills">Edit</a>
                    </div>
                  </div>
                </div>
              </div>



              </div>



            </div>
          </div>

        </div>
    </div>
</body>
</html>
