@extends('layouts.app')
@section('content')





<form method="post" action="{{route('ums.users.update.editproduct')}}" enctype="multipart/form-data">
<div class="container">
<h1>Product Page</h1>
<label for="report"><b>Add Product</b></label>
    <hr>
        {{@csrf_field()}}

        <input type="hidden" name="id" placeholder="id" value="{{ $products->id }}">
        
        <br>
        @error('name')
            {{$message}}<br>
        @enderror
        Product Name: <input type="text" name="name" value="{{ $products->name }}" placeholder="Product Name"><br><br>

        @error('price')
            {{$message}}<br>
        @enderror
        Product Price: <input type="text" name="price" value="{{ $products->price }}" placeholder="Product Price"><br><br>  

        @error('quantity')
            {{$message}}<br>
        @enderror
        Product Quantity: <input type="text" name="quantity" value="{{ $products->quantity }}" placeholder="Product Quantity"><br><br>
        @error('picture')
            {{$message}}<br>
        @enderror
        Product Picture: <input type="file" id="myFile" value="{{ $products->picture }}" name="picture"><br><br>
        <input type="submit" class="addbtn" value="Submit">
        </div>
      
  </form>






        @endsection