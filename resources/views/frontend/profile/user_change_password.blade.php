
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
                                    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
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
                            Change Password</span><strong></strong>
                        </h3>

                 <div class="card-body">
                    <form method="POST" action="{{ route('user.update.password') }}">
                        @csrf						
                            <div class="form-group">
                                <h5>Current Password<span class="text-danger">*</span></h5>
                                <input type="password" name="oldpassword" class="form-control" 
                                id="current_password" placeholder="Current Password">
                                    @error('oldpassword')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>

                            <div class="form-group">
                                <h5>New Password<span class="text-danger">*</span></h5>
                                <input type="password" name="password" class="form-control" 
                                id="password" placeholder="New Password">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>

                            <div class="form-group">
                                <h5>Confirm Password<span class="text-danger">*</span></h5>
                                <input type="password" name="password_confirmation" class="form-control"
                                id="password_confirmation" placeholder="Confirm Password">
                                    @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>  
                
                            <div class="text-xs-right">
                                    <button type="submit" class="btn btn-rounded btn-primary md-5">Update</button>
                                    <a href="{{ route('dashboard') }}" class="btn btn-rounded btn-info md-5">Back</a>
                            </div>
                    </form>
                </div> <!-- end card-body -->
            </div> <!-- end card -->

            </div> <!-- end col-md-6 -->

        </div> <!-- end row -->
    </div> <!-- end container -->
</div> <!-- end content -->

@endsection