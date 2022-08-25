import {useState,useEffect} from 'react';
//import axiosConfig from '../axiosConfig';
import axios from 'axios';
import {Link, useNavigate} from 'react-router-dom';
import Header from '../Header/Header';



const ListCustomer=()=>{
    const [customers,setCustomers] = useState([]);
    const navigate = useNavigate();
    const key= localStorage.getItem('key')
    if(!key){
        navigate('/')
    }
    useEffect(()=>{
        loaduser()   
    },[]);
    const loaduser=()=>{
        axios.get("http://localhost:8000/api/Customer/list")
        .then((rsp)=>{
            setCustomers(rsp.data);
            console.log(rsp);
        },(err)=>{
            console.log(err);
        }) 
    }
 
    // const deleteUser = async (id) =>{
    //     let result = await fetch(`http://127.0.0.1:8000/api/AllHotel/delete/${id}`,{
    //       method:'DELETE'
    //     });
    //     result = await result.json();
        
    //   }
    const deleteCustomer =(id)=>{
        axios.delete(`http://localhost:8000/api/Customer/delete/${id}`)
        .then((rsp)=>{
            setCustomers(rsp.data);
            console.log(rsp);
           loaduser()
        },(err)=>{
            console.log(err);
        }) 
    }

    return(
        <div>
            <Header/>
<br/><br/><br/><br/>
            
            <table>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
                {
                    customers.map((ps,index)=>(
                        <tr>
                            <td><Link to={`/product/details/`}>{ps.id}</Link></td>
                            <td>{ps.name}</td>
                            <td>{ps.email}</td>
                            <td>{ps.phonenumber}</td>
                            <td>{ps.address}</td>  
                            <td>                     
                        
                        <button class="btn btn-danger me-2" onClick={()=>deleteCustomer(ps.id)} >Delete</button>
                        
                </td>
                        </tr>
                    ))
                }
            </table>
        </div>
    )
}
export default ListCustomer;