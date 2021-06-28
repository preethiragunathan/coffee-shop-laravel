@extends('admin.layout.layout')
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
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
		<div class="widget widget-table-three">

			<div class="row" style="margin-bottom:20px;">
			<div class="col-md-6">
			<div class="widget-heading" style="margin-top: 12px;">
				<h5 class="">Orders List</h5>
			</div>
			</div>
						</div>
			<div class="widget-content">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th><div class="th-content">S.no</div></th>
								<th><div class="th-content th-heading">Order Id</div></th>
								<th><div class="th-content th-heading">User</div></th>
                                <th><div class="th-content th-heading">Product</div></th>
								<th><div class="th-content th-heading">Amount</div></th>
                                <th><div class="th-content th-heading">Order Status</div></th>
								<th><div class="th-content">Action</div></th>
							</tr>
						</thead>
						<tbody>
						@php
							$i =1;
						@endphp
						@foreach($orders as $order)
                        @php
                        $user=App\Models\User::where('id', $order->user_id)->first();
                        $product=App\Models\Product::where('id', $order->product)->first();
                        @endphp
							<tr>
								<td>{{$i}}</td>
								<td>
									<div class="td-content">
										<span class="pricing">{{$order->id}}</span>
									</div>
								</td>
								<td>
									<div class="td-content">
										<span class="pricing">{{$user->email}}</span>
									</div>
								</td>
								<td>
									<div class="td-content">
										<span class="pricing">{{$product->product_name}}</span>
									</div>
									</div>
								</td>
                                <td>
									<div class="td-content">
										<span class="pricing">{{$order->amount}}</span>
									</div>
									</div>
								</td>
                                <td>
									<div class="td-content">
										<span class="pricing">{{$order->status}}</span>
									</div>
									</div>
								</td>
								<td>
									<div class="td-content">
										<a href="{{route('order.edit', $order->id)}}" class="">Edit</a>
										<a href="{{route('order.delete', $order->id)}}" class="">
											Delete
										</a>
									</div>
								</td>
							</tr>
							@php
								$i = $i+1;
							@endphp
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
    </div>
	</div>
	</div>
</div>
  @stop
 @section('script')          
 @stop     
        