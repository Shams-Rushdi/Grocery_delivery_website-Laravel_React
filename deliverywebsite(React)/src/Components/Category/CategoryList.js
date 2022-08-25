import {useState,useEffect} from 'react';
//import axiosConfig from '../axiosConfig';
import axios from 'axios';
import {Link, useNavigate} from 'react-router-dom';
import Header from '../Header/Header';
import CategoryList from './CategoryList';


const ListCategory=()=>{
    const [categories,setCategories] = useState([]);
    const navigate = useNavigate();
    useEffect(()=>{
        loaduser()   
    },[]);
    const loaduser=()=>{
        axios.get("http://localhost:8000/api/category/list")
        .then((rsp)=>{
            setCategories(rsp.data);
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
        axios.delete(`http://localhost:8000/api/category/delete/${id}`)
        .then((rsp)=>{
            setCategories(rsp.data);
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
            <Link to='/CreateCategory'>
                Create Category
            </Link>
          </ul>
            
            <table>
                <tr>
                    <th>Id</th>
                    <th>Name</th>

                    <th>Action</th>
                </tr>
                {
                    categories.map((ps,index)=>(
                        <tr>
                            <td><Link to={`/product/details/`}>{ps.id}</Link></td>
                            <td>{ps.name}</td>
                        
                        <Link class="btn btn-warning me-2" to={`/editcategory/${ps.id}`}>Edit</Link>
                        <button class="btn btn-danger me-2" onClick={()=>deleteProduct(ps.id)} >Delete</button>
                        
                
                        </tr>
                    ))
                }
            </table>
        </div>
    )
}
export default ListCategory;