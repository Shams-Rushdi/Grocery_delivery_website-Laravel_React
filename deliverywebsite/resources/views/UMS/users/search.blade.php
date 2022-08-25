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
<br><br>
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
           <td> <a href="{{route('ums.users.show',['id'=>$ps->id])}}" title="View Product"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a></td>
            

        </tr>
    @endforeach
    <br>

</table>

</div>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    @endsection