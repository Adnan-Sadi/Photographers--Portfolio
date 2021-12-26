<!DOCTYPE html>
<html>
    <head>
<link rel="stylesheet" href="style.css">
<script src="https://codepen.io/nusrat_khan"></script>
 <script src="pro.jc"></script>
    </head>
    <body>
        <header>

            <div class="container">

                <div class="profile">

                    <div class="profile-image">

                        <img src="{{ $user->profile->profileImage() }}" alt="profile">

                    </div>

                    <div class="profile-user-settings">

                        <h1 class="profile-user-name">{{ $user->username }} </h1>
                        @if($showFollowBtn)
                        <follow-button class="btn profile-edit-btn" user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                    @endif


                    @can('update', $user->profile)
                      <a href="/profile/{{ $user->id }}/edit">   Edit Profile </a>
            @endcan
                    @can('update', $user->profile)
                    <a href="/p/create">Add Post</a>
                    @endcan

                        <button class="btn profile-settings-btn" aria-label="profile settings"><i class="fas fa-cog" aria-hidden="true"></i></button>

                    </div>

                    <div class="profile-stats">

                        <ul>
                            <li><span class="profile-stat-count">164</span> posts</li>
                            <li><span class="profile-stat-count">188</span> followers</li>
                            <li><span class="profile-stat-count">206</span> following</li>
                        </ul>

                    </div>

                    <div class="profile-bio">

                        <p><span class="profile-real-name"  >  {{ $user->bio}}     > </span>  </p>

                    </div>

                </div>
                <!-- End of profile section -->

            </div>
            <!-- End of container -->

        </header>

        <main>

            <div class="container">

                <div class="gallery">

                    <div class="gallery-item" tabindex="0">

                        <img src="https://images.unsplash.com/photo-1511765224389-37f0e77cf0eb?w=500&h=500&fit=crop" class="gallery-image" alt="">

                        <div class="gallery-item-info">



                        </div>

                    </div>

                    <div class="gallery-item" tabindex="0">

                        <img src="https://images.unsplash.com/photo-1497445462247-4330a224fdb1?w=500&h=500&fit=crop" class="gallery-image" alt="">

                        <div class="gallery-item-info">



                        </div>

                    </div>

                    <div class="gallery-item" tabindex="0">

                        <img src="https://images.unsplash.com/photo-1426604966848-d7adac402bff?w=500&h=500&fit=crop" class="gallery-image" alt="">

                        <div class="gallery-item-type">

                            <span class="visually-hidden">Gallery</span><i class="fas fa-clone" aria-hidden="true"></i>

                        </div>

                        <div class="gallery-item-info">



                        </div>

                    </div>

                    <div class="gallery-item" tabindex="0">

                        <img src="https://images.unsplash.com/photo-1502630859934-b3b41d18206c?w=500&h=500&fit=crop" class="gallery-image" alt="">

                        <div class="gallery-item-type">

                            <span class="visually-hidden">Video</span><i class="fas fa-video" aria-hidden="true"></i>

                        </div>

                        <div class="gallery-item-info">



                        </div>

                    </div>

                    <div class="gallery-item" tabindex="0">

                        <img src="https://images.unsplash.com/photo-1498471731312-b6d2b8280c61?w=500&h=500&fit=crop" class="gallery-image" alt="">

                        <div class="gallery-item-type">

                            <span class="visually-hidden">Gallery</span><i class="fas fa-clone" aria-hidden="true"></i>

                        </div>

                        <div class="gallery-item-info">



                        </div>

                    </div>

                    <div class="gallery-item" tabindex="0">

                        <img src="https://images.unsplash.com/photo-1515023115689-589c33041d3c?w=500&h=500&fit=crop" class="gallery-image" alt="">

                        <div class="gallery-item-info">



                        </div>

                    </div>

                    <div class="gallery-item" tabindex="0">

                        <img src="https://images.unsplash.com/photo-1504214208698-ea1916a2195a?w=500&h=500&fit=crop" class="gallery-image" alt="">

                        <div class="gallery-item-type">

                            <span class="visually-hidden">Gallery</span><i class="fas fa-clone" aria-hidden="true"></i>

                        </div>

                        <div class="gallery-item-info">



                        </div>

                    </div>

                    <div class="gallery-item" tabindex="0">

                        <img src="https://images.unsplash.com/photo-1515814472071-4d632dbc5d4a?w=500&h=500&fit=crop" class="gallery-image" alt="">

                        <div class="gallery-item-info">



                        </div>

                    </div>

                    <div class="gallery-item" tabindex="0">

                        <img src="https://images.unsplash.com/photo-1511407397940-d57f68e81203?w=500&h=500&fit=crop" class="gallery-image" alt="">

                        <div class="gallery-item-type">

                            <span class="visually-hidden">Gallery</span><i class="fas fa-clone" aria-hidden="true"></i>

                        </div>

                        <div class="gallery-item-info">


                        </div>

                    </div>




                <div class="loader"></div>

            </div>
            <!-- End of container -->

        </main>
    </body>
</html>
