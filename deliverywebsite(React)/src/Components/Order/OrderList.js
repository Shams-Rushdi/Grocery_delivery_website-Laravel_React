import {useState,useEffect} from 'react';
//import axiosConfig from '../axiosConfig';
import axios from 'axios';
import {Link} from 'react-router-dom';
import Header from '../Header/Header';



const OrderList=()=>{
    const [orders,setOrders] = useState([]);
    

    useEffect(()=>{
        axios.get("http://localhost:8000/api/order/list")
        .then((rsp)=>{
            setOrders(rsp.data);
            console.log(rsp);
        },(err)=>{
            console.log(err);
        }) 
    },[]);
    // const deleteUser = async (id) =>{
    //     let result = await fetch(`http://127.0.0.1:8000/api/AllHotel/delete/${id}`,{
    //       method:'DELETE'
    //     });
    //     result = await result.json();
        
    //   }

    return(
        <div>
            <Header/>
            <ul>
          </ul>
            
            <table>
                <tr>
                    <th>Id</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>Total Price</th>
                    <th>Action</th>
                </tr>
                {
                    orders.map((os,index)=>(
                        <tr>
                            <td><Link to={`/product/details/`}>{os.id}</Link></td>
                            <td>{os.name}</td>
                            <td>{os.email}</td>
                            <td>{os.address}</td>
                            <td>{os.price} 
                                </td>
                            <td>
                        
                        <Link class="btn btn-warning me-2" to={'/Product/Edit'}>Delivered</Link>
                        {/* <Link class="btn btn-danger" onClick={()=>deleteUser(products.id)}>Delete</Link> */}
                        
                </td>
                        </tr>
                    ))
                }
            </table>
        </div>
    )
}
export default OrderList;