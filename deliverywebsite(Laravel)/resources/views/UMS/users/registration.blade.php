<h1>{{Session::get('msg')}}</h1>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>
<form method="post" action="" enctype="multipart/form-data">
<div class="container">
<h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
        {{@csrf_field()}}
        <label for="name"><b>Name</b></label>
        @error('name')
            {{$message}}<br>
        @enderror
       <input type="text" name="name" placeholder="Name" value="{{old('name')}}">


        <label for="email"><b>Email</b></label>
        @error('email')
            {{$message}}<br>
        @enderror
        <input type="text" name="email" value="{{old('email')}}" placeholder="Email">


        <label for="phonenumber"><b>Phone Number</b></label>
        @error('phonenumber')
            {{$message}}<br>
        @enderror
        <input type="text" name="phonenumber" value="{{old('phonenumber')}}" placeholder="Phone Number">


        <label for="address"><b>Address</b></label>
        @error('address')
            {{$message}}<br>
        @enderror
        <input type="text" name="address" value="{{old('address')}}" placeholder="Address">

 

        <label for="password"><b>Password</b></label>
        @error('password')
            {{$message}}<br>
        @enderror
        <input type="password" name="password" placeholder="Password">


        <label for="confirmpassword"><b>Confirm Password</b></label>
        @error('confirmpassword')
            {{$message}}<br>
        @enderror
        <input type="password" name="confirmpassword" placeholder="Confirm Password">


        <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
        </div>
        <input type="submit" class="registerbtn" value="Create">

        <div class="container signin">
    <p>Already have an account? <a href="{{route('ums.login')}}">Sign in</a>.</p>
  </div>
  </form>

        </body>
</html>