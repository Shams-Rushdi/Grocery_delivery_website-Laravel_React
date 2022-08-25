import React, { useState,useEffect } from "react";
import { useParams } from "react-router-dom";
import {useNavigate} from 'react-router-dom'
import axios from "axios";

const EditCategory = () => {
  const navigate =useNavigate()
  const {id}=useParams()
  const key = localStorage.getItem("key");
 
  const [data, setdata] = useState({
    name:"",
    price:"",
    quantity:"",
    picture:""
  });
  
  
  useEffect(() => {
    axios({
      method: "GET",
      url: `http://localhost:8000/api/category/edit/${id}`,
      headers: {
        "Content-Type": "application/json",
        key: key,
      },
    })
      .then((response) => {
        setdata(response.data);
        console.log(response.data)
     
      })
      .catch((err) => {
        console.log(err);
   
      });
  }, [])
  

  
  
  const handleOnchange=(e)=>{
const {name,value}=e.target

 setdata({...data,[name]:value})

  }



  const handleOnsubmit = () => {
 
    axios({
      method: "PUT",
      url:`http://localhost:8000/api/category/update/${id}`,
      data:data,
      headers: {
        "Content-Type": "application/json",
        key: key,
      },
    })
      .then((response) => {
        setdata(response.data);
        navigate('/CategoryList')
      })
      .catch((err) => {
        console.log(err);
      });
  
  
  };
 
  return (
    <>
      <div className="min-h-screen p-6 bg-gray-100 flex items-center justify-center">
        <div className="container max-w-screen-lg mx-auto">
          <div>
            <h2 className="font-semibold text-xl text-gray-600">
              Update Product 
            </h2>
          

            <div className="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
              <div className="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                <div className="text-gray-600">
                  <p className="font-medium text-lg">Item Details</p>
            
                </div>

                <div className="lg:col-span-2">
                  <div className="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                    <div className="md:col-span-5">
                      <label htmlFor="full_name">Product Name</label>
                      <input
                      onChange={handleOnchange}
                        type="text"
                        name="name"
                        id="full_name"
                        className="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                        value={data.name}
                      />
                    </div>
         

                    <div className="md:col-span-5 text-right">
                      <div className="inline-flex items-end">
                        <button
                          onClick={handleOnsubmit}
                          className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                        >
                          Submit
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </>
  );
};

export default EditCategory;
