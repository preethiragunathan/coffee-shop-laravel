@extends('user.layouts.app')

@section('main')
<main class="form-signin">
<form method="post" action="{{route('post.login')}}">
	@csrf
    <h1 class="h3 mb-3 fw-normal">Login</h1>

    <div class="form-floating">
      <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" name="password" id="password" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" name="remember"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" name="login" id="login" type="submit">Sign in</button>
  </form>
</main>
@endsection
<script type="text/javascript">
$("#login").click(function()
{
	var email=$("#email").val();
	var pass=$("#password").val();
	if(email=='')
	{
		alert("Please Enter Email Address");
		return false;
	}
	else if(pass=='')
	{
		alert("Please Enter Password");
		return false;
	}
	else
	{
		return true;
	}
});
</script>