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
				<h5 class="">Product List</h5>
			</div>
			</div>
			<div class="col-md-6">
			<a  href="{{route('product.form')}}">
							<button type="submit" class="btn btn-primary mt-3 addbtn-bottom" style="float: inline-end;">Add New Product</button>
						</a>
						</div>
						</div>
			<div class="widget-content">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th><div class="th-content">S.no</div></th>
								<th><div class="th-content th-heading">Product Name</div></th>
								<th><div class="th-content th-heading">Price</div></th>
								<th><div class="th-content th-heading">Description</div></th>
								<th><div class="th-content th-heading">Image</div></th>
								<th><div class="th-content">Action</div></th>
							</tr>
						</thead>
						<tbody>
						@php
							$i =1;
						@endphp
						@foreach(App\Models\Product::where('status', 1)->get() as $product)
							<tr>
								<td>{{$i}}</td>
								<td>
									<div class="td-content">
										<span class="pricing">{{$product->product_name}}</span>
									</div>
								</td>
								<td>
									<div class="td-content">
										<span class="pricing">{{$product->price}}</span>
									</div>
								</td>
								<td>
									<div class="td-content">
										<span class="pricing">{{$product->description}}</span>
									</div>
									</div>
								</td>
								<td>
									<div class="td-content">
										<img src="{{static_asset('admin/assets/img/products-uploads/'.$product->image)}}" class="product-img" alt="Products">
									</div>
								</td>
								<td>
									<div class="td-content">
										<a href="{{route('product.edit', $product->id)}}" class="">Edit</a>
										<a href="{{route('product.delete', $product->id)}}" class="">
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
        