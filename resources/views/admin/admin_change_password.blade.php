@extends('admin.admin_master')

@section('admin_content')

<div class="container-full">

<section class="content">

<!-- Basic Forms -->
 <div class="box">
   <div class="box-header with-border">
     <h4 class="box-title">Admin Change Password</h4>
     
   </div>
   <!-- /.box-header -->
   <div class="box-body">
     <div class="row">
       <div class="col">
           <form method="POST" action="{{ route('admin.update.password') }}">
                 @csrf

             <div class="row">
               <div class="col-12">						
                   
                   <div class="row">
                       <div class="col-md-6">
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
              
                        </div> <!--  end col md 6 -->
                   </div><!--  end row -->
                  
               <div class="text-xs-right">
                    <button type="submit" class="btn btn-rounded btn-primary md-5">Update</button>
                    <a href="{{ route('admin.profile') }}" class="btn btn-rounded btn-info md-5">Back</a>
               </div>
           </form>
          
       </div>
       <!-- /.col -->
     </div>
     <!-- /.row -->
   </div>
   <!-- /.box-body -->
 </div>
 <!-- /.box -->

</section>

</div>

@endsection