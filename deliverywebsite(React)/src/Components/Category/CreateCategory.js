import {useState} from 'react';
import axios from 'axios';
import Header from '../Header/Header';
const CreateCategory=()=>{
    const[name,setName] = useState("");
    const[err,setErr] = useState("");
    const[msg,setMsg] = useState("");
    const handleForm=(event)=>{
        event.preventDefault();
        var data = {name:name};
        axios.post("http://localhost:8000/api/category/add",data)
        .then((rsp)=>{
            console.log(rsp)
            setMsg(rsp.data);
        },(er)=>{
            if(er.response.status==422) //for data validation
            {
                setErr(er.response.data);
            }else{
                setMsg("Server Error Occured");
            }
        })
    }
    return(
        <form onSubmit={handleForm}>
            <Header/>
            <h3>{msg}</h3>
            Name : <input type="text" value={name} onChange={(e)=>{setName(e.target.value)}} /> <span>{err.name? err.name[0]:''}</span><br/>
            
            <input type="submit" value="Create" />
        </form>
    )
}
export default CreateCategory;