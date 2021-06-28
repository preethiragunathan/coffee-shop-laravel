<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{static_asset('admin/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{static_asset('admin/assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{static_asset('admin/assets/css/authentication/form-2.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="{{static_asset('admin/assets/css/forms/theme-checkbox-radio.css')}}">
    <link rel="stylesheet" type="text/css" href="{{static_asset('admin/assets/css/forms/switches.css')}}">
</head>
<body class="form">
    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <h2 class="">Sign In</h2>
						@if(Session::has('message'))
						 <p  style="color: red;">{{Session::get('message')}}</p>
						@endif
                        
                        <form class="text-left" method="post" action="{{route('admin.post.login')}}">
						  @csrf
                            <div class="form">
                                <div id="username-field" class="field-wrapper input">
                                    <label for="email">EMAIL ID</label>
                                    <input id="email" name="admin_email" type="text" class="form-control">
                                </div>

                                <div id="password-field" class="field-wrapper input mb-2">
                                    <label for="password">PASSWORD</label>
                                    <input id="password" name="admin_password" type="password" class="form-control">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                </div>
                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary">Log In</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>                    
                </div>
            </div>
        </div>
    </div>    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{static_asset('admin/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
    <script src="{{static_asset('admin/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{static_asset('admin/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="{{static_asset('admin/assets/js/authentication/form-2.js')}}"></script>
</body>
</html>