@extends('admin.admin_master')

@section('admin_content')


<div class="container-full">


<section class="content">

<!-- Basic Forms -->
 <div class="box">
   <div class="box-header with-border">
     <h4 class="box-title">Admin Profile</h4>
     
   </div>
   <!-- /.box-header -->
   <div class="box-body">
     <div class="row">
       <div class="col">
           <form novalidate="">
             <div class="row">
               <div class="col-12">						
                   
                   <div class="row">
                       <div class="col-md-6">
                            <div class="form-group">
                                <h5>Admin User Name<span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="test" name="name" class="form-control" 
                                required=""  value="{{ $editData->name}}"></div>
                            </div>
                       </div> <!--  end col md 6 -->
                       <div class="col-md-6">
                            <div class="form-group">
                                <h5>Admin Email<span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="email" name="email" class="form-control" 
                                required=""  value="{{ $editData->email}}"></div>
                            </div>
                       </div> <!--  end col md 6 -->      
                    
                   </div><!--  end row -->

                   <div class="row">
                   <div class="col-md-6">
                        <div class="form-group">
                            <h5>Profile Image <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="file" name="profile_photo_path" class="form-control" 
                                required=""> <div class="help-block"></div>
                            </div>
                        </div>
                    </div> <!--  end col md 6 -->    
                     <div class="col-md-6">
                        <img  src="{{ (!empty($adminData->profile_photo_path))? 
                                url('upload/admin_images/'.$adminData->profile_photo_path): url('upload/no_image.jpg') }} "
                                alt="User Avatar" style="width:100px; height:100px;">
                        </div>
                       </div> <!--  end col md 6 -->  
                   
                   </div><!--  end row -->
                  
               <div class="text-xs-right">
                   <input type="submit" class="btn btn-rounded btn-primary md-5"  value="Update"/>
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