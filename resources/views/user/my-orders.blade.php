@extends('user.layouts.app')

@section('main')
<div class="container pt-5">
<table class="table">
  <thead>
    <tr>
      <th scope="col">S.no</th>
      <th scope="col">Order ID</th>
      <th scope="col">Product Name</th>
      <th scope="col">Amount</th>
      <th scope="col">Order Status</th>
    </tr>
  </thead>
  <tbody>
  @if($orders)
  @php
  $i=1;
  @endphp
  @foreach($orders as $order)
  @php
  $product=App\Models\Product::where('id', $order->product)->first();
  @endphp
    <tr>
      <th scope="row">{{$i}}</th>
      <td>{{$order->id}}</td>
      <td>{{$product->product_name}}</td>
      <td>{{$product->price}}</td>
      <td>{{$order->status}}</td>
    </tr>
    @php
  $i++;
  @endphp
  @endforeach	
  @else
  <tr>
  <td colspan="4" align="center"><p>No record found!</p></td>
  </tr>
  @endif
  </tbody>
</table>
</div>
@endsection
@section('script')
@endsection