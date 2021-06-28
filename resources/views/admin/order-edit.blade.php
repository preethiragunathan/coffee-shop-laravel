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
					<form action="{{route('order.update')}}" method="post">
					 @csrf
					  @php
						$order=App\Models\Order::where('id', $id)->first();
						@endphp
						<input type="hidden" name="id" value="{{$order->id}}">
					  <div class="row">
						<div class="form-group col-md-6">
							<label for="status">Order Status</label>
							<select name="status" id="status">
                            <option value="">Select</option>
                            <option value="Confirmed">Confirmed</option>
                            <option value="Processed">Processed</option>
                            <option value="Delivered">Delivered</option>
                            </select>
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
        