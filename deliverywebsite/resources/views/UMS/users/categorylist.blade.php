@extends('layouts.app')
@section('content')



<div class="container">
<table class="table table-bordered">

<form class="form" id="form-buscar" type ="get" action="{{route('categorysearch')}}">
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
        <th>Action</th>

    </tr>
    <form class="form-inline my-2 my-lg-0">
        <div class="dropdown-divider"></div>
          <a href="{{route('ums.users.addcategory')}}">Add Category</a>
        </div>
    </form> 
    @foreach($categories as $cg)
        <tr>

            <td>{{$cg->id}}</td>
            <td>{{$cg->name}}</td>
            <td> <a href="{{route('ums.users.edit.editcategory',['id'=>$cg->id])}}" title="View Product"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Edit</button></a>
            <a href="{{route('CategoryDelete',['id'=>$cg->id])}}" title="View Product"><button class="btn btn-info btn-danger"><i class="fa fa-eye" aria-hidden="true"></i> Delete</button></a></td>
            

        </tr>
    @endforeach
    <br>
    <div class="container">
    <table class="table table-bordered">
    {{$categories->links()}}
    </table>
    </div>
</table>

</div>
@endsection

<script>
    </script>

