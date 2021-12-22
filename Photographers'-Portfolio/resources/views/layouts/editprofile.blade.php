@extends('layouts.indexprofile')

<div class="container">
    <form action="/profile/{{ $user->id }}/update" enctype="multipart/form-data" method="post">
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
