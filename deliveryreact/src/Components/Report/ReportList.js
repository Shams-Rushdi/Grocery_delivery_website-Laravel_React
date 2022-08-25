import {useState,useEffect} from 'react';
//import axiosConfig from '../axiosConfig';
import axios from 'axios';
import {Link} from 'react-router-dom';
import Header from '../Header/Header';
//import ReportList from './ReportList';


const ReportList=()=>{
    const [categories,setCategories] = useState([]);

    useEffect(()=>{
        axios.get("http://localhost:8000/api/report/list")
        .then((rsp)=>{
            setCategories(rsp.data);
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
<br/>
<br/>
<br/>
<br/>
            
            <table>
                <tr>
                    <th>Id</th>
                    <th>User Name</th>
                    <th>Report</th>

                    <th>Action</th>
                </tr>
                {
                    categories.map((ps,index)=>(
                        <tr>
                            <td><Link to={`/product/details/`}>{ps.id}</Link></td>
                            <td>{ps.email}</td>
                            <td>{ps.report}</td>
                        
                        <Link class="btn btn-warning me-2" to={`/Product/Edit/`}>Feedback</Link>
                        {/* <Link class="btn btn-danger" onClick={()=>deleteUser(products.id)}>Delete</Link> */}
                        
                
                        </tr>
                    ))
                }
            </table>
        </div>
    )
}
export default ReportList;