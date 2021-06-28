@extends('user.layouts.app')

@section('main')
<div class="container pt-5">
<div class="container">
    <div class="main-body">
          <div class="row gutters-sm">
            <div class="col-md-12">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">First Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
					{{Auth::user()->first_name}}
                    </div>
                  </div>
                  <hr>
				  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Last Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
					{{Auth::user()->last_name}}
                    </div>
                  </div>
                  <hr>
				  
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
					{{Auth::user()->email}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Mobile</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{Auth::user()->mobile}}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
    </div>
</div>
@endsection
@section('script')
@endsection