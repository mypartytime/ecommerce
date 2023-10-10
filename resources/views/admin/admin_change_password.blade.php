@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<div class="page-content">

      
        <div class="row profile-body">
          <!-- left wrapper start -->
           
          <!-- left wrapper end -->
          <!-- middle wrapper start -->
          <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
             <div class="card">
              <div class="card-body">

			<h6 class="card-title">Admin Change Password  </h6>

			<form method="POST" action="{{ route('admin.update.password') }}" class="forms-sample">
				@csrf
 

				<div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Old Password  </label>
					 <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror " id="old_password" autocomplete="off" >
           @error('old_password')
           <span class="text-danger">{{ $message }}</span>
           @enderror
				</div>

				  <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">New Password  </label>
           <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror " id="new_password" autocomplete="off" >
           @error('new_password')
           <span class="text-danger">{{ $message }}</span>
           @enderror
        </div>
 
      <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Confirm New Password  </label>
           <input type="password" name="new_password_confirmation" class="form-control" id="new_password_confirmation" autocomplete="off" >
          
        </div> 

				 
	 <button type="submit" class="btn btn-primary me-2">Save Changes </button>
			 
			</form>

              </div>
            </div>




            </div>
          </div>
          <!-- middle wrapper end -->
          <!-- right wrapper start -->
         
          <!-- right wrapper end -->
        </div>

			</div>
 


@endsection