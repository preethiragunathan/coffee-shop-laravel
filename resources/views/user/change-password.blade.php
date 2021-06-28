@extends('user.layouts.app')

@section('main')
<main class="form-signin change-pass">
<form method="post" action="{{route('user.password.update')}}">
	@csrf
    <h1 class="h3 mb-3 fw-normal">Change Password</h1>
    <input type="hidden" name="id" value="{{Auth::user()->id}}">
    <div class="form-floating">
      <div class="col-md-12 mb-2">
	  <label class="mb-2">Old Password <span class="required">*</span></label>
		<input type="password" name="old_password" id="old_password" class="form-control" minlength="8" maxlength="16">
	  </div>
    </div>
	<div class="form-floating">
      <div class="col-md-12 mb-2">
	  <label class="mb-2">New Password <span class="required">*</span></label>
		<input type="password" name="new_password" id="new_password" class="form-control" minlength="8" maxlength="16">
	  </div>
    </div>
	<div class="form-floating">
      <div class="col-md-12 mb-2">
	  <label class="mb-2">Confirm New Password <span class="required">*</span></label>
		<input type="password" name="confirm_new_password" id="confirm_new_password" class="form-control" minlength="8" maxlength="16">
	  </div>
    </div>
    <button class="w-100 btn btn-lg btn-primary" name="submit" id="submit" type="submit">Change</button>
  </form>
</main>
@endsection
@section('script')
<script type="text/javascript">
$(document).ready(function () {
/*$("#old_password").change(function ()
  {
	  var regex = /^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%&]).*$/;
	  if(!regex.test($("#old_password").val()))
	  {
		  alert("Please Enter Valid Old Password");
		  return false;
	  }
  });*/
  $("#new_password").change(function ()
  {
	  var regex = /^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%&]).*$/;
	  if(!regex.test($("#new_password").val()))
	  {
		  alert("Please Enter Valid New Password");
		  return false;
	  }
  });
  
  $("#confirm_new_password").change(function ()
  {
	  var new_password=$("#new_password").val();
	  var confirm_new_password=$("#confirm_new_password").val();
	  if(new_password!=confirm_new_password)
	  {
		  alert("Passwords Not Matching");
		  return false;
	  }
  });
});

$("#submit").click(function()
{
	var old_password=$("#old_password").val();
	var new_password=$("#new_password").val();
	var confirm_new_password=$("#confirm_new_password").val();
	if(old_password=='')
		{
			alert("Please Enter Password");
			return false;
		}
		else if(new_password=='')
		{
			alert("Please Enter New Password");
			return false;
		}
		else if(confirm_new_password=='')
		{
			alert("Please Enter Confirm Password");
			return false;
		}
		
		else
		{
			return true;
		}
});
</script>
@endsection