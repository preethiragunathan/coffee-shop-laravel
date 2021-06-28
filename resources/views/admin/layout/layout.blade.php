<!doctype html>
<html>
<head>
@include('admin.layout.head')
@yield('css')
</head>
<body>
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->
	@include('admin.layout.header')
	
	   <div class="main-container" id="container">
			<div class="overlay"></div>
			<div class="search-overlay"></div>
			@include('admin.layout.menu')
			<div id="content" class="main-content">
			@yield('body')
			@include('admin.layout.footer')
			</div>
		</div>
	
	@include('admin.layout.script')
	@yield('script')
</body>
</html>