
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title></title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><h2>Grocery Delivery Website</h2></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Order List</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">Cart</a>
      </li>

      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Account
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a href="">Update profile</a>
        
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













<br><br>

<table class="table table-bordered">
            <tr>
            
                <td>Picture</td>
                <td>Name</td>
                <td>Quantity</td>
                <td>Unit Price</td>
                <td>Total Price</td>
                <td>Action</td>
            </tr>
            @php
            $total = 0
            @endphp
            
            @foreach ($cart as $item)
                <tr>

                
                
                    <td><img src="{{ asset('storage/uploads/'.$item->picture) }}" alt="error" width="50px" , height="50px"></td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->price * $item->quantity}}</td>
                    <td><a href="{{route('products.deletetocart',['id'=>$item->id])}}" class="btn  btn-danger remove-from-cart" > Delete to cart</a></td>
                    @php 
                        $total += $item->price * $item->quantity
                    @endphp
                </tr>
            @endforeach
 

            <tr>
                <td></td><td></td><td></td>
                <td>Total</td>
                <td>{{$total}}</td>
            </tr>

        </table>
        <br><br>
        <div class="d-grid gap-2 col-6 mx-auto">
        <form action="{{route('products.emptycart')}}" method="get">
            {{@csrf_field()}}
            <input type="submit" class="btn btn-primary" value="Empty Cart">
        </form>
        </div>

        <br>
        <div class="d-grid gap-2 col-6 mx-auto">
        <form action="{{route('checkout')}}" method="post">
            {{@csrf_field()}}
            <input type="hidden" name="total_price" value="{{$total}}">
            <input type="submit" class="btn btn-danger" value="Checkout">
        </form>
        </div>

        @section('scripts')

<script>
      $(document).on('click', '.qty', function(e) {
        e.preventDefault();

        var quantity = $('.input-quantity').val();  
        var id = $('.id').val();

          $.ajax({
            url: "url",
            method: "POST",
            dataType: "json",
            data: {
                _token: "{{ csrf_token() }}",

                quantity: quantity,
                id: id,
              },
              });

            
    });
</script>
@endsection