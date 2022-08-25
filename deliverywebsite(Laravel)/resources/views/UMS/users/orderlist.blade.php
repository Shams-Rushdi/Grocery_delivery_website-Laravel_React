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
        
        <th>Email</th>
        <th>Phone Number</th>
        <th>Address</th>
        <th>Total Price</th>


    </tr>
    @foreach($orderslist as $ol)
        <tr>

            <td>{{$ol->email}}</td>
            <td>{{$ol->phonenumber}}</td>
            <td>{{$ol->address}}</td>
            <td>{{$ol->price}}</td>            
           
            

        </tr>
    @endforeach
    <br>
</table>

</div>


</div>
@endsection



