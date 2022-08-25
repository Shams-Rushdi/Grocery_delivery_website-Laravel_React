
import React,{ useState, useEffect } from "react";
import { Form, Button } from "react-bootstrap";
import {useNavigate} from "react-router-dom";
//import swal from "sweetalert";
import axios from "axios";
// import Header from "../Header";
const Login = () => {
  const navigate = useNavigate();
  useEffect(()=>{
    if(localStorage.getItem("token"))
    {
      navigate('/')
    }
    // eslint-disable-next-line
  },[]);
 
  const [loginInput, setLogin] = useState({
    email: "",
    password: "",
    error_list: [],
  });
 
  const handleInput = (e) => {
    e.persist();
    setLogin({ ...loginInput, [e.target.name]: e.target.value });
  };
  // const loginSubmit = (e) => {
  //   e.preventDefault();
  
  //   const data = {
  //     email: loginInput.email,
  //     password: loginInput.password,
  //   };
  //   axios.post("http://localhost:8000/api/login", data).then((res) => {
  //     console.log(res.data);
 
  //     if (res.data.success === true) {
  //         console.log(res.data);
  //         localStorage.setItem("token", res.data.token);
      
  //       //localStorage.setItem("id", res.data.user.id);
 
  //       swal("Success", res.data.message, "success");
  //   } 
  //   else if(res.data.success === false)
  //   {
        
  //       swal("Opps!", res.data.message, "warning");
  //     }
  //     else {
  //       setLogin({ ...loginInput, error_list: res.data.errors });
  //       console.log(res.data.errors);
  //     }
  //   });
  // };
const  handleonSubmit =async (e)=>{
e.preventDefault()
try{
   await axios ({
    method:"post",
    url:"http://localhost:8000/api/login",
    data:loginInput,
    headers:{
        'content-type':'application/json'
    }
   }).then((result)=>{
    console.log(result.data.authtoken.token)
    if(result.data.authtoken.token){
        localStorage.setItem('key',result.data.authtoken.token)
    }
   })
   navigate('/home')
}
catch(err){
console.log(err)
}
}

const handleOnClick=()=>{
  navigate('/register')
}

  return (
    <>
    {/* <Header/> */}
      <div className="container">
        <div className="row text-center">
          <div className="col-sm-12">
            <h1>Login</h1>
          </div>
        </div>
      </div>
      <div className="container">
        <div className="row justify-content-center">
          <div className="col-md-6 col-sm-12">
            <Form onSubmit={handleonSubmit}>
              <Form.Group className="mb-3" controlId="formBasicEmail">
                <Form.Control type="email" name="email" value={loginInput.email} onChange={handleInput} placeholder="Enter email" />
              </Form.Group>
              <Form.Group className="mb-3" controlId="formBasicPassword">
                <Form.Control type="password" name="password" value={loginInput.password} onChange={handleInput} placeholder="Enter Password" />
              </Form.Group>
              <Button variant="primary" type="submit">
                Login 
              </Button>
              <Button onClick={handleOnClick} variant="primary" type="submit">
                Register 
              </Button>
            </Form>
          </div>
        </div>
      </div>
    </>
  );
};

export default Login;

