import {useState,useEffect} from 'react';
import axiosConfig from './axiosConfig';
import {Link} from 'react-router-dom';
const ListStudents=()=>{
    const [students,setStudents] = useState([]);
    useEffect(()=>{
        axiosConfig.get("/product/list")
        .then((rsp)=>{
            setStudents(rsp.data);
            console.log(rsp);
        },(err)=>{

        }) 
    },[]);

    return(
        <div>

            
            <table>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Picture</th>
                </tr>
                {
                    students.map((ps)=>(
                        <tr>
                            <td><Link to={`/student/details/${ps.id}`}>{ps.id}</Link></td>
                            <td>{ps.name}</td>
                            <td>{ps.price}</td>
                            <td>{ps.quantity}</td>
                            <td>{ps.picture}</td>
                        </tr>
                    ))
                }
            </table>
        </div>
    )
}
export default ListStudents;