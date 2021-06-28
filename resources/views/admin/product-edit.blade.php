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
			<div class="widget-content widget-content-area">
				 <div class="form-group col-md-12">
					<form action="{{route('product.update')}}" method="post" enctype="multipart/form-data">
					 @csrf
					 @php
						$product=App\Models\Product::where('id', $id)->first();
						@endphp
						<input type="hidden" name="id" value="{{$product->id}}">
					  <div class="row">
						<div class="form-group col-md-6">
							<label for="exam">Product Name</label>
							<input type="text" class="form-control" id="product_name" name="product_name" value="{{$product->product_name}}">
						</div>
						<div class="form-group col-md-6">
							<label for="exam">Price</label>
							<input type="text" class="form-control" id="price" name="price" value="{{$product->price}}">
						</div>
						<div class="form-group col-md-6">
							<label for="exam">Image</label>
							<div class="row">
							<div class="col-md-2">
							<img src="{{static_asset('admin/assets/img/products-uploads/'.$product->image)}}" class="product-img-edit" alt="Products">
							</div>
							<div class="col-md-10">
							<input type="file" class="form-control" id="image" name="image">
							</div>
							</div>
						</div>
						
						<div class="form-group col-md-6">
							<label for="exam">Description</label>
							<textarea type="text" class="form-control" id="description" name="description">{{$product->description}}</textarea>
						</div>
						</div>
						</div>
						<div class="form-group col-md-6">
							<button type="submit" class="btn btn-primary mt-3" style="text-align:center;">Submit</button>
						</div>
					</form>			
				</div>	
			</div>				
		</div>
	</div>
</div>
  @stop
 @section('script')          
 @stop     
        