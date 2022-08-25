import {useState,useEffect} from 'react';
//import axiosConfig from '../axiosConfig';
import axios from 'axios';
import {Link, useNavigate} from 'react-router-dom';
import Header from '../Header/Header';



const ListProduct=()=>{
    const [products,setProducts] = useState([]);
    const navigate = useNavigate();
    const key= localStorage.getItem('key')
    if(!key){
        navigate('/')
    }
    useEffect(()=>{
        loaduser()   
    },[]);
    const loaduser=()=>{
        axios.get("http://localhost:8000/api/product/list")
        .then((rsp)=>{
            setProducts(rsp.data);
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
    const deleteProduct =(id)=>{
        axios.delete(`http://localhost:8000/api/product/delete/${id}`)
        .then((rsp)=>{
            setProducts(rsp.data);
            console.log(rsp);
           loaduser()
        },(err)=>{
            console.log(err);
        }) 
    }

    return(
        <div>
            <Header/>
            <ul>
            <Link to='/createProduct'>
                Create Product
            </Link>
          </ul>
            
            <table>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Picture</th>
                    <th>Action</th>
                </tr>
                {
                    products.map((ps,index)=>(
                        <tr>
                            <td><Link to={`/product/details/`}>{ps.id}</Link></td>
                            <td>{ps.name}</td>
                            <td>{ps.price}</td>
                            <td>{ps.quantity}</td>
                            {/* <td><image style={{width:80}} src={"http://localhost:8000/"+ps.picture}/></td> */}
                            <td>{ps.picture}</td>
                            
                            <td>
                        
                        <Link class="btn btn-warning me-2" to={`/editproduct/${ps.id}`}>Edit</Link>
                        <button class="btn btn-danger me-2" onClick={()=>deleteProduct(ps.id)} >Delete</button>
                        
                </td>
                        </tr>
                    ))
                }
            </table>
        </div>
    )
}
export default ListProduct;