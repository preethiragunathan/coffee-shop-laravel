<header class="site-header sticky-top py-1">
  <nav class="container d-flex flex-column flex-md-row justify-content-between">
    <a class="py-2" href="{{route('home')}}" aria-label="Product">
      <img src="{{static_asset('user/assets/img/logo.jpg')}}" width="50px" height="50px"/>
    </a>
    <a class="py-2 d-none d-md-inline-block" href="{{route('home')}}">Home</a>
    @if(route('home'))
    <a class="py-2 d-none d-md-inline-block" href="#product">Product</a>
    @else
    <a class="py-2 d-none d-md-inline-block" href="{{route('home')}}">Product</a>
    @endif
    @if(Auth::check())
    @php
    $user=App\Models\User::where('id', Auth::user()->id)->first();
    @endphp
    <a class="py-2 d-none d-md-inline-block" href="{{route('user.wallet')}}"><i class="las la-wallet wallet-ico"></i> ₹{{$user->balance}}</a>
	<div class="dropdown">
		<a class="py-2 d-none d-md-inline-block" href="{{route('user.profile')}}">My Account</a>
		 <div class="dropdown-content">
		<a href="{{route('myorder')}}">My Orders</a>
        <a href="{{route('mytrans')}}">My Transactions</a>
		<a href="{{route('user.profile')}}">Profile</a>
		<a href="{{route('user.change.password')}}">Change Password</a>
		<a href="{{route('user.logout')}}">Logout</a>
	  </div>
	</div>
    @else
    <a class="py-2 d-none d-md-inline-block" href="{{route('user.login')}}">Login</a>
    <a class="py-2 d-none d-md-inline-block" href="{{route('register')}}">Registration</a>
    @endif
  </nav>
</header>