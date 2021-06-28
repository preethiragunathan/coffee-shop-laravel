@extends('user.layouts.app')

@section('main')
<main class="form-signin">
<form action="{{route('post.register')}}" method="post">
@csrf
    <h1 class="h3 mb-3 fw-normal">Register</h1>
	<div class="form-floating">
      <input type="text" class="form-control" name="fname" id="fname" placeholder="name">
      <label for="floatingInput">First Name<span class="required">*</span></label>
    </div>
    <div class="form-floating">
      <input type="text" class="form-control" name="lname" id="lname" placeholder="name">
      <label for="floatingInput">Last Name</label>
    </div>
    <div class="form-floating">
      <input type="text" class="form-control" name="mobile" id="mobile" maxlength="10" placeholder="mobile">
      <label for="floatingInput">Mobile Number<span class="required">*</span></label>
    </div>
    <div class="form-floating">
      <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
      <label for="floatingInput">Email address<span class="required">*</span></label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" name="password" id="password" minlength="8" maxlength="16" placeholder="Password">
      <label for="floatingPassword">Password<span class="required">*</span></label>
	  <p class="password-msg">Must be at least 8 characters contain 1 number, 1 lowercase, 1 uppercase, 1 special character.</p>
    </div>
	<div class="form-floating">
      <input type="password" class="form-control" name="confirmpass" id="confirmpass" minlength="8" maxlength="16" placeholder="Password">
      <label for="floatingInput">Confirm Password<span class="required">*</span></label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" name="submit" id="submit" type="submit">Submit</button>
  </form>
</main>
@endsection
@section('script')
    <script type="text/javascript">
		$(document).ready(function () {
		  $("#mobile").keypress(function (e) {
			 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
				alert("Digits Only");
				return false;
			}
		   });
		  $("#password").change(function ()
		  {
			  var regex = /^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%&]).*$/;
			  if(!regex.test($("#password").val()))
			  {
				  alert("Please Enter Valid Password");
				  return false;
			  }
		  });
		  $("#confirmpass").change(function ()
		  {
			  var pass=$("#password").val();
			  var conpass=$("#confirmpass").val();
			  if(pass!=conpass)
			  {
				  alert("Passwords Not Matching");
				  return false;
			  }
		  });
		});
        $("#submit").click(function()
		{
			var fname=$("#fname").val();
			var lname=$("#lname").val();
			var mobile=$("#mobile").val();
			var email=$("#email").val();
			var password=$("#password").val();
			var confirmpass=$("#confirmpass").val();
			var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
			if(fname=='')
			{
				alert("Please Enter First Name");
				return false;
			}
			else if(mobile=='')
			{
				alert("Please Enter Mobile Number");
				return false;
			}
			else if(mobile.length!=10)
			{
				alert("Please Enter Valid Mobile Number");
				return false;
			}
			else if(email=='')
			{
				alert("Please Enter Email Address");
				return false;
			}
			else if(!pattern.test(email))
			{
				alert("Please Enter Valid Email Address");
				return false;
			}
			else if(password=='')
			{
				alert("Please Enter Password");
				return false;
			}
			else if(confirmpass=='')
			{
				alert("Please Enter Confirm Password");
				return false;
			}
			else if(password!=confirmpass)
			{
				alert("Passwords Not Matching");
				return false;
			}
			else
			{
				return true;
			}
		});
    </script>
@endsection