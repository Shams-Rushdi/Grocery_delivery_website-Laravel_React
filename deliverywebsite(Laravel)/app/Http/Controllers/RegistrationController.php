<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UMSRegistration;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Category;
use App\Models\Report;
use App\Models\Orderdetail;


class RegistrationController extends Controller
{
    //Products

    function Product(){
        return view ('UMS.users.addproduct');

    }
    function ProductSubmit(Request $req){
        $this->validate($req,
            [
                "name"=>"required|max:50|min:3",
                "price"=> "required",
                "quantity"=>"required",
                "picture"=>"required"
  
            ],
        
            [
                "name.required"=>"Please provide Product name",
                "name.max"=>"Name should not exceed 50 characters", 
                "price.required"=>"Please provide Product Price",
                "quantity.required"=>"Please provide Quantity",
                "picture.required"=>"Please provide a Picture"
            ]);
            //$registrations = Registration::all();
           //$registrations = Registration::all();
           $pr = new Product();
           $pr->name = $req->name;
           $pr->price = $req->price;
           $pr->quantity = $req->quantity;
           $pr->picture = $req->picture;
           $pr->save();
           session()->flash('msg','successfull');
           //return view('product.list')->with('products',$products);
           return back();
        
    }

    public function ProductDelete(Request $req){
        $id =  $req->id;
        $products = Product :: where ('id',$id)->first();
        $products->delete();
        return back();
        //return view ('UMS.users.categorylist')->with('categories',$categories);;

    }
    public function ProductEdit(Request $req){
        $id =  $req->id;
        $products = Product :: where ('id',$id)->first();
        return view ('UMS.users.editproduct')->with('products',$products);

    }
   public function ProductEditSubmit(Request $req){

    $this->validate($req,
    [
        "name"=>"required|max:50|min:3",
  
    ],

    [
        "name.required"=>"Please provide Product name",
        "name.max"=>"Name should not exceed 50 characters", 
        "price.required"=>"Please provide Product Price",
        "quantity.required"=>"Please provide Quantity",
        "picture.required"=>"Please provide a Picture"
    ]);

            $ps = Product::where ('id',$req->id)->first();;
            $ps->name = $req->name;
            $ps->price = $req->price;
            $ps->quantity = $req->quantity;
            $ps->picture = $req->picture;
            $ps->save();
            session()->flash('msg','successfull');
            //return view('UMS.users.categorylist');
            return back();

        
    }


    public function list(Request $req){
       $user = UMSRegistration::where('email',session()->get('logged'))->first();
       //$user = UMSRegistration::where('email',$req->email)->where('password',$req->password)->first();
        if($user = true){
            $user = $req->email;
            $products = Product::paginate(10);
            return view('UMS.users.list')->with('user',$user)->with('products',$products);
            //return view("UMS.users.dashboard",compact('products',$products));
        }
        else {
            return "Null";
        
        }

    }

    function registration(){
        return view ('UMS.users.registration');

    }
    function registrationSubmit(Request $req){
        $this->validate($req,
            [
                "name"=>"required|max:50|min:3",
                "email"=>"required|email|unique:users,email",
                "password"=>'required|min:8',
                "confirmpassword"=>'required|min:8|same:password',
                "phonenumber"=>'required',
                "address"=>'required'   
            ],
        
            [
                "name.required"=>"Please provide your name",
                "name.max"=>"Name should not exceed 50 characters",  
            ]);
            //$registrations = Registration::all();
            $rg = new UMSRegistration();
            $rg->name = $req->name;
            $rg->email =$req->email;
            $rg->password =$req->password;
            $rg->confirmpassword =$req->confirmpassword;
            $rg->phonenumber =$req->phonenumber;
            $rg->address =$req->address;
            $rg->save();
            session()->flash('msg','successfull');
            //return view('product.list')->with('products',$products);
            return back();
        
    }

    function login(){
        return view('UMS.users.login');
    }
    function loginSubmit(Request $req)
    {
        $this->validate($req,[
            "email"=>"required|exists:registration,email",
            "password"=>"required|min:8"
        ]);
        $user = UMSRegistration::where('email',$req->email)
                            ->where('password',$req->password)->first();

        if($user){
            session()->put('user',$user->email);
            $products = Product::paginate(10);
            //session()->flash('msg','User Exists');
            //session()->put('logged',$user->email);
            
            return view('UMS.users.dashboard')->with('user',$user)->with('products',$products);

        }
        else {
            session()->flash('msg','User not valid');
            return back();
        
        }

    }
    function dashboard(){

        $user = UMSRegistration::where('email',session()->get('user'))->first();
        return view('UMS.users.dashboard')->with('user',$user );
    }
    function orderList(){
        $products = Product::paginate(10);

        $user = UMSRegistration::where('email',session()->get('logged'))->first();
        return view('UMS.users.list')->with('user',$user)->with('products',$products);
    }

    public function show(Request $req)
    {
        $id = $req->id;
        $product = Product::find($id);
        return view('.UMS.users.show')->with('products', $product);
    }

    
    public function addtocart(Request $req,$id){
        
        $p = Product::where('id',$id)->first();
        $cart=[];
        if(session()->has('cart')){
            $cart = json_decode(session()->get('cart'));
        }
        $product = array('id'=>$id,'picture'=>$p->picture,'quantity'=>$req->quantity ,'name'=>$p->name,'price'=>$p->price);
        $cart[] = (object)($product);
        $jsonCart = json_encode($cart);
        
        session()->put('cart',$jsonCart);
        //return session()->get('cart');
       //return redirect()->route('products.list');
        //return back()->with('message','Added ');
        return redirect()->route('ums.users.list');
    }
    public function deletetocart(Request $req){
        if($req->id) {
            $cart = session()->pull('cart');
            if(isset($cart[$req->id])) {
                //return $req;
                //return $req;
                //unset($cart[$req->id]);
                unset($cart->$req[id]);
                //$request->session()->forget(['name', 'status']);
                //unset->session()->forget($req);
                //pull($cart[$req->id]);
                session()->put('cart', $cart);

                    Session::put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
    }
}
    public function emptycart(){
        session()->forget('cart');
        
        return redirect()->route('ums.users.list');
       /* if(!session()->has('cart')){
            return "Cart is empty";
        }
        return session('cart');
        */
    }
    public function mycart(){
        if($cart = json_decode(session()->get('cart'))){
            return view('UMS.users.cart')->with('cart',$cart);
        }
        else{
            //return "Cart is empty";
            return view('UMS.users.emptycart');
        }
        
    }
    public function searchProduct(){
        $search_text = $_GET['query'];
        $products = Product:: where ('name','LIKE' , '%'.$search_text. '%')->get();
        return view('UMS.users.search',compact('products'));
    }
    public function profileUpdate2(){
        $user = UMSRegistration::where('email',session()->get('logged'))->first();
        return view ('UMS.users.profile')->with('user',$user);;

    }
    public function profileUpdate(Request $req){
        $id =  $req->id;
        $user = UMSRegistration :: where ('id',$id)->first();
        return view ('UMS.users.profile')->with('user',$user);

    }
   public function profileUpdateSubmit(Request $req){

    $this->validate($req,
    [
        "name"=>"required|max:50|min:3",
        "email"=>"required|email|unique:users,email",
        "phonenumber"=>'required',
        "address"=>'required'   
    ],

    [
        "name.required"=>"Please provide your name",
        "name.max"=>"Name should not exceed 50 characters",  
    ]);
            //$registrations = Registration::all();
            //$var = new UMSRegistration();
            $var = UMSRegistration::where ('id',$req->id)->first();
            //return $req;
            $var->name = $req->name;
            //return $req;
            $var->email =$req->email;
            $var->password =$req->password;
            $var->confirmpassword =$req->confirmpassword;
            $var->phonenumber =$req->phonenumber;
            $var->address =$req->address;
            $var->save();
            session()->flash('msg','successfull');
            //return view('product.list')->with('products',$products);
            //return view('UMS.users.dashboard')->with('user',$user );
            return redirect()->route('logout');
        
    }
    public function checkout(Request $req){
        $products = json_decode(session()->get('cart'));
        $email = session()->get('user');
        $var = UMSRegistration::where ('email',$email)->first();
        //return $var;
        
        $order = new Order();
        $order->email = $email;
        $order->address=$var->address;
        $order->phonenumber=$var->phonenumber;
        $order->price = $req->total_price;
        $order->save();
        session()->forget('cart');
        return redirect()->route('ums.users.list');
        

    }
    public function orderslist()
    {
        if(session()->has('user')){
            $orderslist = order::all();
            //$user = UMSRegistration::where('email',session()->get('logged'))->first();
            return view('UMS.users.orderlist')->with('orderslist',$orderslist);
        }
        
        else{
            return redirect()->route('ums.login');


        }


    }

    function Report(){
        return view ('UMS.users.report');

    }

    function ReportSubmit(Request $req){
        $this->validate($req,
            [
                "report"=>'required'  
            ]);

            $email = session()->get('user');
            $var = UMSRegistration::where ('email',$email)->first();
            //$registrations = Registration::all();
            $rg = new Report();
            $rg->email =$email;
            $rg->report =$req->report;
            $rg->save();
            session()->flash('msg','successfull');
            
            return back();
        
    }

    //Category
    function CategoryList(){

        $categories = Category::paginate(10);
        return view('UMS.users.categorylist')->with('categories',$categories);
    }
    public function searchCategory(){
        $search_text = $_GET['query'];
        $categories =Category:: where ('name','LIKE' , '%'.$search_text. '%')->get();
        return view('UMS.users.categorysearch',compact('categories'));
    }

    function Category(){
        return view ('UMS.users.addcategory');

    }
    function CategorySubmit(Request $req){
        $this->validate($req,
            [
                "name"=>"required|max:50|min:3",
  
            ],
        
            [
                "name.required"=>"Please provide Category name",
                "name.max"=>"Name should not exceed 50 characters",  
            ]);
            //$registrations = Registration::all();
           //$registrations = Registration::all();
           $cg = new Category();
           $cg->name = $req->name;
           $cg->save();
           session()->flash('msg','successfull');
           //return view('product.list')->with('products',$products);
           return back();
        
    }

    public function CategoryDelete(Request $req){
        $id =  $req->id;
        $categories = Category :: where ('id',$id)->first();
        $categories->delete();
        return back();
        //return view ('UMS.users.categorylist')->with('categories',$categories);;

    }
    public function CategoryEdit(Request $req){
        $id =  $req->id;
        $categories = Category :: where ('id',$id)->first();
        return view ('UMS.users.editcategory')->with('categories',$categories);

    }
   public function CategoryEditSubmit(Request $req){

    $this->validate($req,
    [
        "name"=>"required|max:50|min:3",
  
    ],

    [
        "name.required"=>"Please provide Category name",
        "name.max"=>"Name should not exceed 50 characters",  
    ]);

            $cat = Category::where ('id',$req->id)->first();;
            $cat->name = $req->name;
            $cat->save();
            session()->flash('msg','successfull');
            //return view('UMS.users.categorylist');
            return back();

        
    }
}
