
@extends('frontend.main_master')

@section('content')

<!-- @php
$user = DB::table('users')->where('id', Auth::user()->id)->first();
@endphp -->

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
                                    <a href="{{ route('user.change.password') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>
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
                            Hi...</span><strong>{{ Auth::user()->name }}</strong> Update Your Profile
                        </h3>

                        <div class="card-body">
                         <form action="{{ route('user.profile.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
                                <input type="text" class="form-control" id="name"  name="name" value="{{ $user->name }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Phone Number</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">User Image <span>*</span></label>
                                <input type="file" class="form-control" id="profile_photo_path" name="profile_photo_path">
                                @error('profile_photo_path')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                               <button type="submit" class="btn btn-primary">Update</button>
                               <a href="{{route('dashboard')}}" class="btn btn-info">Back</a>
                            </div>
                        </form>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->

            </div> <!-- end col-md-6 -->

        </div> <!-- end row -->
    </div> <!-- end container -->
</div> <!-- end content -->

@endsection