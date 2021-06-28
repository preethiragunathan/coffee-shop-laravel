@extends('user.layouts.app')

@section('main')
<main>
  <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">

        <img src="{{static_asset('user/assets/img/banner.jpg')}}" width="100%" height="100%"/>
      </div>

  <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3" id="product">
 @foreach(App\Models\Product::where('status', 1)->get() as $product)
    <div class="bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
      <div class="my-3 py-3">
        <h4 class="display-5">{{$product->product_name}}</h4>
        <p class="lead">{{$product->description}}</p>
      </div>
      <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
	  <img class="product-img-index" src="{{static_asset('admin/assets/img/products-uploads/'.$product->image)}}">
	  </div>
      <div class="my-3 py-3">
      @auth
      @php
      $userdet=App\Models\User::where('id', Auth::user()->id)->first();
      @endphp
      @if($userdet->balance >= $product->price)
        <form action="{{route('place.order')}}" method="post">
        @csrf
        <input type="hidden" name="product_id" value="{{$product->id}}" />
        <button class="w-20 btn btn-lg btn-primary" name="order" id="order">Order Now</button>
        </form>
       @else
       <a href="{{route('user.wallet')}}"><button class="w-20 btn btn-lg btn-primary">Add Amout to Wallet</button></a>
      @endif
      @else
      <button class="w-20 btn btn-lg btn-primary">Please Login to Place Order	</button>
      @endauth
      </div>
    </div>
 @endforeach	
  </div>
</main>
@endsection
@section('script')
@endsection