<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}


.cancelbtn, .signupbtn {
  float: middle;
  width: 20%;
 
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}
.container {
  padding: 16px;
  background-color: white;
}
.signin {
  background-color: #f1f1f1;
  text-align: center;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>


<h5>{{Session::get('msg')}}</h5>
@if(Session::has('logged'))
<h3>Already Logged in </h3>
@endif
<form action="" method="post">
    {{@csrf_field()}}
    <h2>Login Form</h2>
    <div class="container">
    <label for="email"><b>Email</b></label>
    @error('email')
     {{$message}} <br>
    @enderror
    <input type="text" name="email" placeholder="Email"><br>

    <label for="password"><b>Password</b></label>
    @error('password')
     {{$message}} <br>
    @enderror
    <input type="password" name="password" placeholder="Password"></br>

    <button type="submit" value="Login">Login</button>
    
<br>
    <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
<br>
    

<div class="container signin">
    <p>Create an account? <a href="{{route('ums.users.registration')}}">Sign Up</a>.</p>
  </div>

    
  </div>

    <div class="container" style="background-color:#f1f1f1">
   
    <span class="psw">Forgot password</span>
  </div>
    </form>

</body>
</html>

