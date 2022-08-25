<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title></title>
    <style>
    * {
  -webkit-border-radius: 1px !important;
     -moz-border-radius: 1px !important;
          border-radius: 1px !important;
}
#logo {
color: #666;
width:100%;   
}
#logo h1 {
    font-size: 60px;
    text-shadow: 1px 2px 3px #999;
    font-family: Roboto, sans-serif;
    font-weight: 700;
    letter-spacing: -1px;
}
#logo p{
  padding-bottom: 20px;
}


#form-buscar >.form-group >.input-group > .form-control {
    height: 40px;
}
#form-buscar >.form-group >.input-group > .input-group-btn > .btn{
        height: 40px; 
        font-size: 16px;
        font-weight: 300; 
         
       
}
#form-buscar >.form-group >.input-group > .input-group-btn > .btn .glyphicon{
 margin-right:12px;   
}    


#form-buscar >.form-group >.input-group > .form-control {
    font-size: 16px;
    font-weight: 300;
   
}

#form-buscar >.form-group >.input-group > .form-control:focus {
  border-color: #33A444;
  outline: 0;
  -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 1px rgba(0, 109, 0, 0.8);
          box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 1px rgba(0, 109, 0, 0.8);
}
</style>

  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><h2>Grocery Delivery Website</h2></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    @csrf
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('ums.users.list') }}">List of Product</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('ums.users.orderlist') }}">Order Details</a>        
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('ums.users.cart')}}">Cart</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('ums.users.report')}}">Report</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('ums.users.categorylist')}}">Category</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="">Welcome  {{ $user->email }}</a>
      </li>
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Account
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a href="{{  route('ums.users.edit.profile',[$user->id])  }}">Update profile</a>
        
          <div class="dropdown-divider"></div>
          <a href="{{route('logout')}}">Logout</a>
        </div>
      </li>
    </form>
    
  </div>

</nav>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>


<br>


</div>


<script>
    </script>


