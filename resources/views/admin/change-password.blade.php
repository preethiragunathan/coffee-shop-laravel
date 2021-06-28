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
		<div class="d-flex justify-content-between">
                                    <h3 class="">Change Password</h3>
                                </div>
			<div class="widget-content widget-content-area">
				 <div class="form-group col-md-12">
					<form action="{{route('password.update')}}" method="post">
					 @csrf
					 <input type="hidden" name="id" id="id" value="{{Auth::guard('admin')->user()->id}}">
						<div class="form-group col-md-6">
							<label for="old_password">Old Password</label>
							<input type="text" class="form-control" id="old_password" name="old_password">
							<span id="old_passwordErr" style="color:Red;display:none;"></span>
						</div>
						<div class="form-group col-md-6">
							<label for="new_password">New Password</label>
							<input type="text" class="form-control" id="new_password" name="new_password">
							<span id="new_passwordErr" style="color:Red;display:none;"></span>
						</div>
						<div class="form-group col-md-6">
							<button type="submit" class="btn btn-primary mt-3" id="submit" style="text-align:center;">Submit</button>
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
<script>
	$("#submit").click( function (e)
	{
		var old_password=$("#old_password").val();
		var new_password=$("#new_password").val();
		
		if(old_password=='')
		{
			$("#old_passwordErr").html("Please Enter Old Password").show();
			return false;
		}
		else
			$("#old_passwordErr").hide();
		if(new_password=='')
		{
			$("#new_passwordErr").html("Please Enter New Password").show();
			return false;
		}
		else
			$("#new_passwordErr").hide();
		
	});
	</script> 
 @stop     
        