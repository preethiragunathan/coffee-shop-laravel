@extends('admin.layout.layout')
    <link href="{{static_asset('admin/assets/css/users/user-profile.css')}}" rel="stylesheet" type="text/css" />
 @section('css')
    <style>
        .layout-px-spacing {
            min-height: calc(100vh - 166px)!important;
        }
    </style>
  @stop
 @section('body')
<div class="layout-px-spacing">
	<div class="row layout-top-spacing">
		<div class="card-body">
			<div class="widget-content widget-content-area">
				 <div class="form-group col-md-12">
					<form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
					 @csrf
					 <div class="form-row">
					  <input type="hidden" name="id" id="id" value="{{Auth::guard('admin')->user()->id}}">
						<div class="form-group col-md-6">
							<label for="first_name">First Name</label>
							<input type="text" class="form-control" id="first_name" name="first_name" value="{{Auth::guard('admin')->user()->first_name}}">
							<span id="firstnameErr" style="color:Red;display:none;"></span>
						</div>
						<div class="form-group col-md-6">
							<label for="last_name">last Name</label>
							<input type="text" class="form-control" id="last_name" name="last_name" value="{{Auth::guard('admin')->user()->last_name}}">
							<span id="lastnameErr" style="color:Red;display:none;"></span>
						</div>
						<div class="form-group col-md-6">
							<label for="email">Email</label>
							<input type="text" class="form-control txtDate" id="email" name="email" value="{{Auth::guard('admin')->user()->email}}">
							<span id="emailErr" style="color:Red;display:none;"></span>
						</div>
						<div class="form-group col-md-6">
							<label for="mobile_number">Mobile Number</label>
							<input type="text" class="form-control txtDate" id="mobile_number" name="mobile_number" value="{{Auth::guard('admin')->user()->mobile_number}}" onkeypress="return isNumberKey(event)" maxlength="12">
							<span id="mobileErr" style="color:Red;display:none;"></span>
						</div>
						
						<div class="form-group col-md-12">
							<button type="submit" class="btn btn-primary mt-3" id="submit" style="text-align:center;">Submit</button>
						</div>
						</div>
					</form>			
				</div>	
			</div>				
		</div>
	</div>
	</div>
</div>
  @stop
 @section('script')          
 @stop     
        