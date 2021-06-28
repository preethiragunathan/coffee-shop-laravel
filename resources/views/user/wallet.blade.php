@extends('user.layouts.app')

@section('main')
<div class="container pt-5">
<div class="container">
    <div class="main-body">
          <div class="row gutters-sm">
		  <p>Wallet Deposit</p>
          				@if(Session::has('message'))
						 <h2  style="color: green;">{{Session::get('message')}}</h2>
						@endif
            <div class="col-md-12">
              <div class="card mb-3">
                <div class="card-body">
				<form action="{{route('add.wallet')}}" method="post">
				@csrf
                  <div class="col-md-6 mb-2">
				  <label class="mb-2">Amount</label>
					<input type="text" name="amount" id="amount" class="form-control">
				  </div>
				  <div class="col-md-6">
				  <button class="btn btn-primary" type="submit" name="submit" id="submit">Submit</button>
				  </div>
				 </form> 
                </div>
              </div>
            </div>
          </div>

        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
$(document).ready(function () {
$("#amount").keypress(function (e) {
	 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
		alert("Digits Only");
		return false;
	}
   });
});
$("#submit").click(function()
{
	var amount=$("#amount").val();
	if(amount=='')
	{
		alert("Please enter vaild amount");
		return false;
	}
	else
	{
		return true;
	}
});			
</script>
@endsection