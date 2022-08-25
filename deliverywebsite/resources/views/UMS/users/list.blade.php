@extends('layouts.app')
@section('content')



<div class="container">
<table class="table table-bordered">

<form class="form" id="form-buscar" type ="get" action="{{route('search')}}">
<div class="form-group">
<div class="input-group">
<input id="1" class="form-control" name="query" type="text" name="search" placeholder="Search..." required/>
<span class="input-group-btn">
<button class="btn btn-success" type="submit">
<i class="glyphicon glyphicon-search" aria-hidden="true"></i> Search
</button>
</span>
</div>
</div>
</form>

<br>
<a href="{{route('ums.users.addproduct')}}">Add Product</a><br>


    <tr>
        
        <th>Id</th>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity(Per Kg)</th>
        <th>Picture</th>
        <th>Action</th>
    </tr>
    @foreach($products as $ps)
        <tr>

            <td>{{$ps->id}}</td>
            <td>{{$ps->name}}</td>
            <td>{{$ps->price}}</td>
            <td>{{$ps->quantity}}</td>            
            <td><img src="{{asset('storage/uploads/'.$ps->picture) }}" alt="error" width="50px" , height="50px"></td>
           <td> <a href="{{route('ums.users.edit.editproduct',['id'=>$ps->id])}}" title="View Product"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Edit</button></a>
            <a href="{{route('ums.users.show',['id'=>$ps->id])}}" title="View Product"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a></td>
            

        </tr>
    @endforeach
    <br>
    <div class="container">
    <table class="table table-bordered">
    {{$products->links()}}
    </table>
    </div>
</table>

</div>
@endsection

<script>
    </script>

