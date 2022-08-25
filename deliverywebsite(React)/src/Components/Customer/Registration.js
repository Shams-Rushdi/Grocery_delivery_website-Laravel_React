import {useState} from 'react';
import axios from 'axios';
import Header from '../Header/Header';
const CreateProduct=()=>{
    const[name,setName] = useState("");
    const[email,setEmail] = useState("");
    const[password,setPassword] = useState("");
    const[confirmpassword,setConfirmPassword] = useState("");
    const[phonenumber,setPhoneNumber] = useState("");
    const[address,setAddress] = useState("");
    const[err,setErr] = useState("");
    const[msg,setMsg] = useState("");
    const handleForm=(event)=>{
        event.preventDefault();
        var data = {name:name,email:email,password:password,confirmpassword:confirmpassword,phonenumber:phonenumber,address:address};
        axios.post("http://localhost:8000/api/Customer/add",data)
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
            <h1>Registration Page</h1>
            <h3>{msg}</h3>
            Name : <input type="text" value={name} onChange={(e)=>{setName(e.target.value)}} /> <span>{err.name? err.name[0]:''}</span><br/>
            Email : <input type="text" value={email} onChange={(e)=>{setEmail(e.target.value)}} /> <span>{err.email? err.email[0]:''}</span><br/>
            Password : <input type="text" value={password} onChange={(e)=>{setPassword(e.target.value)}} /> <span>{err.password? err.password[0]:''}</span><br/>
            Confirm Password : <input type="text" value={confirmpassword} onChange={(e)=>{setConfirmPassword(e.target.value)}} /> <span>{err.confirmpassword? err.confirmpassword[0]:''}</span><br/>
            Phone Number : <input type="text" value={phonenumber} onChange={(e)=>{setPhoneNumber(e.target.value)}} /> <span>{err.phonenumber? err.phonenumber[0]:''}</span><br/>
            Address : <input type="text" value={address} onChange={(e)=>{setAddress(e.target.value)}} /> <span>{err.address? err.address[0]:''}</span><br/>
            <input type="submit" value="Create" />
        </form>
    )
}
export default CreateProduct;