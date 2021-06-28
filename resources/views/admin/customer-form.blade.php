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
					<form action="{{route('customer.add')}}" method="post">
					 @csrf
					  <div class="row">
						<div class="form-group col-md-6">
							<label for="first_name">First Name</label>
							<input type="text" class="form-control" id="first_name" name="first_name">
						</div>
						<div class="form-group col-md-6">
							<label for="last_name">Last Name</label>
							<input type="text" class="form-control" id="last_name" name="last_name">
						</div>
						<div class="form-group col-md-6">
							<label for="mobile_number">Mobile Number</label>
							<input type="text" class="form-control" id="mobile_number" name="mobile_number">
						</div>
						
						<div class="form-group col-md-6">
							<label for="exam">Email</label>
							<input type="text" class="form-control" id="email" name="email">
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
        