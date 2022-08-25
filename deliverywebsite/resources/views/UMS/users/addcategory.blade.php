@extends('layouts.app')
@section('content')





<form method="post" action="" enctype="multipart/form-data">
<div class="container">
<h1>Category Page</h1>
    <p>Category</p>
    <hr>
        {{@csrf_field()}}


        <label for="report"><b>Add Category</b></label>
        <br>
        @error('report')
            {{$message}}<br>
        @enderror
        <input type="text" name="name" value="" placeholder="Category name">
        <input type="submit" class="registerbtn" value="Submit">
        </div>
      
  </form>






        @endsection