@extends('layouts.app')
@section('content')


<form method="post" action="" enctype="multipart/form-data">
<div class="container">
<h1>Report Page</h1>
    <p>Complain or Report</p>
    <hr>
        {{@csrf_field()}}


        <label for="report"><b>Report</b></label>
        <br>
        @error('report')
            {{$message}}<br>
        @enderror
        <input type="text" name="report" value="{{old('report')}}" placeholder="Report">
        <input type="submit" class="registerbtn" value="Submit">
        </div>
      
  </form>


@endsection