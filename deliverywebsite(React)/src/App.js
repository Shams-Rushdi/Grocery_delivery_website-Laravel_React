import "bootstrap/dist/css/bootstrap.min.css";
import {
  BrowserRouter,
  Routes,
  Route,
} from "react-router-dom";
import Login from "./Components/Login/Login";



import './App.css';
import HomePage from "./Components/AddHome/HomePage";
import Header from "./Components/Header/Header";
import CreateProduct from "./Components/Product/CreateProduct";
import ListProduct from "./Components/Product/ListProduct";
import CategoryList from "./Components/Category/CategoryList";
import ListOrder from "./Components/Order/OrderList";
import EditProduct from "./Components/Product/EditProduct";
import ReportList from "./Components/Report/ReportList";
import EditCategory from "./Components/Category/EditCategory";
import CreateCategory from "./Components/Category/CreateCategory";
import CustomerList from "./Components/Customer/CustomerList";
import Registration from "./Components/Customer/Registration";


function App() {
  return (
<BrowserRouter>
    <Routes>
    <Route path="/register" element={<Registration/>}/>  
    <Route path="/ReportList" element={<ReportList/>}/>
    <Route path="/ListOrder" element={<ListOrder />}/>
    <Route path="/CreateProduct" element={<CreateProduct />}/>
    <Route path="/ListProduct" element={<ListProduct />}/>
    <Route path="/CategoryList" element={<CategoryList/>}/>
    <Route path="/CreateCategory" element={<CreateCategory />}/>
    <Route path="/editproduct/:id" element={<EditProduct/>}/>
    <Route path="/editcategory/:id" element={<EditCategory/>}/>
    <Route path="/CustomerList" element={<CustomerList/>}/>
    <Route path="/" element={<Login />}/>
    <Route path="/home" element={<Header />}>
    <Route path="/home" element={<HomePage />} /> 
        </Route> 
    </Routes>
  </BrowserRouter>
  );
}

export default App;
