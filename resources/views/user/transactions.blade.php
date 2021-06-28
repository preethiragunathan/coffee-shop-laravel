@extends('user.layouts.app')

@section('main')
<div class="container pt-5">
<table class="table">
  <thead>
    <tr>
      <th scope="col">S.no</th>
      <th scope="col">Amount</th>
      <th scope="col">Transaction Type</th>
      <th scope="col">Remarks</th>
      <th scope="col">Date Time</th>
    </tr>
  </thead>
  <tbody>
  @if($trans)
  @php
  $i=1;
  @endphp
  @foreach($trans as $tc)
    <tr>
      <th scope="row">{{$i}}</th>
      <td>{{$tc->amount}}</td>
      <td>{{$tc->trans_type}}</td>
      <td>{{$tc->remarks}}</td>
      <td>{{$tc->created_datetime}}</td>
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