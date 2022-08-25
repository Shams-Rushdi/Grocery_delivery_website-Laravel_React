import React from "react";
import { NavLink,Button } from "react-bootstrap";
import { Link, useNavigate } from "react-router-dom";
// import axios from "axios";
// import swal from "sweetalert";

const Header = () => {

  const navigate = useNavigate();
  const logoutSubmit = (e)=>{
    e.preventDefault();
    localStorage.clear()
    // axios.post("http://localhost:8000/api/login").then((res) =>{
    //   if(res.data.success===true)
    //   {
    //     localStorage.clear()
    //     swal("Logout", res.data.message, "success");
    //     // <Redirect to="/"/>
    //     navigate("/");
    // }
    // });
    navigate("/");
  }


  return (
    
    <div>
      <nav className="navbar navbar-expand-lg navbar-light bg-light">
        <div className="container-fluid">
          <NavLink className="navbar-brand" href="#">
            <h3>Descalzo</h3>
          </NavLink>
          <ul>
            <Link to='/listProduct'>
                Product
            </Link>
          </ul>
          <ul>
            <Link to='/CategoryList'>
                Category
            </Link>
          </ul>
          <ul>
            <Link to='/ListOrder'>
                Order Details
            </Link>
          </ul>
          
          <ul>
            <Link to='/CustomerList'>
                Customer Details
            </Link>
          </ul>
          <ul>
            <Link to='/ReportList'>
                Report
            </Link>
          </ul>



             <Button type="button" onClick={logoutSubmit} className="btn btn-danger">Logout</Button>
         
        </div>
      </nav>
    </div>
  );
};

export default Header;
