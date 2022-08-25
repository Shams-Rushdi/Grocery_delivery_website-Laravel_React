import {useState} from 'react';
import axios from 'axios';
import Header from '../Header/Header';
const CreateProduct=()=>{
    const[name,setName] = useState("");
    const[price,setPrice] = useState("");
    const[quantity,setQuantity] = useState("");
    const[picture,setPicture] = useState("");
    const[err,setErr] = useState("");
    const[msg,setMsg] = useState("");
    const handleForm=(event)=>{
        event.preventDefault();
        var data = {name:name,price:price,quantity:quantity,picture:picture};
        axios.post("http://localhost:8000/api/product/add",data)
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
            Price : <input type="text" value={price} onChange={(e)=>{setPrice(e.target.value)}} /> <span>{err.price? err.price[0]:''}</span><br/>
            Quantity : <input type="text" value={quantity} onChange={(e)=>{setQuantity(e.target.value)}} /> <span>{err.quantity? err.pricquantitye[0]:''}</span><br/>
            Picture : <input type="text" value={picture} onChange={(e)=>{setPicture(e.target.value)}} /> <span>{err.picture? err.picture[0]:''}</span><br/>
            <input type="submit" value="Create" />
        </form>
    )
}
export default CreateProduct;