@extends('layouts.app')
@section('content')





<form method="post" action="" enctype="multipart/form-data">
<div class="container">
<h1>Product Page</h1>
<label for="report"><b>Add Product</b></label>
    <hr>
        {{@csrf_field()}}


        
        <br>
        @error('name')
            {{$message}}<br>
        @enderror
        Product Name: <input type="text" name="name" value="" placeholder="Product Name"><br><br>

        @error('price')
            {{$message}}<br>
        @enderror
        Product Price: <input type="text" name="price" value="" placeholder="Product Price"><br><br>  

        @error('quantity')
            {{$message}}<br>
        @enderror
        Product Quantity: <input type="text" name="quantity" value="" placeholder="Product Quantity"><br><br>
        @error('picture')
            {{$message}}<br>
        @enderror
        Product Picture: <input type="file" id="myFile" name="picture"><br><br>
        <input type="submit" class="addbtn" value="Submit">
        </div>
      
  </form>






        @endsection