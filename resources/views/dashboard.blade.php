
@extends('frontend.main_master')

@section('content')


<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2"><br>
                <img src="{{ (!empty($user->profile_photo_path))? 
                                url('upload/user_images/'.$user->profile_photo_path): url('upload/no_image.jpg') }}"
                                alt="User Avatar" width="100%" height="100%"
                                class="card-img-top" style="border-radius: 50%"><br><br>
                                <ul class="list-group list-group-flush">
                                    <a href="" class="btn btn-primary btn-sm btn-block">Home</a>
                                    <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                                    <a href="" class="btn btn-primary btn-sm btn-block">Change Password</a>
                                    <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                                </ul>
            </div> <!-- end col-md-2 -->

            <div class="col-md-2">
                <h1>Hello</h1>
            </div> <!-- end col-md-2 -->

            <div class="col-md-6">
                    <div class="card">
                        <h3 classa="text-center">
                            <span class="text-danger">
                            Hi...</span><strong>{{ Auth::user()->name }}</strong> Welcome to TZNH Online Shop
                        </h3>
                    </div>

            </div> <!-- end col-md-8 -->

        </div> <!-- end row -->
    </div> <!-- end container -->
</div> <!-- end content -->

@endsection