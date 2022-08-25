@extends('layouts.app')
@section('content')






        <form method="post" action="{{route('ums.users.update.editcategory')}}" enctype="multipart/form-data">
<div class="container">
<h1>Category Page</h1>
    <p>Category</p>
    <hr>
        {{@csrf_field()}}


        <label for="report"><b>Add Category</b></label>
        <br>
        <input type="hidden" name="id" placeholder="id" value="{{ $categories->id }}">
        @error('name')
            {{$message}}<br>
        @enderror
        <input type="text" name="name" value="{{ $categories->name }}" placeholder="Category name">
        <input type="submit" class="registerbtn" value="Submit">
        </div>
      
  </form>





        @endsection