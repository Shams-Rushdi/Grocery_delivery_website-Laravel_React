<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UMSRegistration;
use App\Models\Product;
use App\Models\Category;
use App\Models\Report;
use App\Models\Order;
use App\Models\Token;
use App\Models\CUser;
use Illuminate\Support\Facades\Validator;

class APIController extends Controller
{
    //
    public function login(Request $req){

        $user = UMSRegistration::where('email',$req->email)
        ->where('password',$req->password)->first();
        
        // if(!$user || Hash::check($req->password,$user->password_get_info) )
        // {
        //     return([
        //         'error'=> ["Email or password is not Matched"]
        //     ]);
        // }
    
        //return $user;
        
        
    }


    public function get(Request $req){
        $st = Student::where('id',$req->id)->first();
        if($st){
            return response()->json($st,200);
        }
        return response()->json(["msg"=>"notfound"],404);
        
    }


    public function Productlist(){
        $products = Product::all();
        return $products;
        //return response()->json($products);
        }

        public function Productadd(Request $req){
            $pr = new Product();
            //$pr->id = $req->id;
            $pr->name = $req->name;
            $pr->price = $req->price;
            $pr->quantity = $req->quantity;
            $pr->picture = $req->picture;
            if($pr->save()) return "Successful";
        }
        public function UpdateProduct(Request $req,$id){   ///Update AND Details
            $pr = Product::find($id);
            $pr->name = $req->name;
            $pr->price = $req->price;
            $pr->quantity = $req->quantity;
            $pr->picture = $req->picture;
            $pr->update();
            return response()->json([
                'prescribe'=>  'updated successfull',
            ],200);
               
        }

        public function DeleteProduct(Request $req,$id){
            $pr = Product::find($id);
            $pr->delete();
            return response()->json([
                'Producted'=>  'Deleted successfull',
            ],200);
        }
        public function EditProduct(Request $req,$id){   ///Update AND Details
            $pr = Product::find($id);
            return $pr;
               
        }


        //........................Category.................................

        public function Categorylist(){
            $categories = Category::all();
            return $categories;
        }
        public function Categoryadd(Request $req){
            $ct = new Category();
            $ct->name = $req->name;
            if($ct->save()) return "Successful";
        }
        
        public function EditCategory(Request $req,$id){   ///Update AND Details
            $ct = Category::find($id);
            return $ct;
               
        }

        public function UpdateCategory(Request $req,$id){   ///Update AND Details
            $ct = Category::find($id);
            $ct->name = $req->name;
            $ct->update();
            return response()->json([
                'prescribe'=>  'updated successfull',
            ],200);
               
        }

        public function DeleteCategory(Request $req,$id){
            $ct = Category::find($id);
            $ct->delete();
            return response()->json([
                'Producted'=>  'Deleted successfull',
            ],200);
        }

        //.............................Report.................................


        public function Reportlist(){
            $reports = Report::all();
            return $reports;
        }
        public function Reportadd(Request $req){
            $rt = new Report();
            $rt->report = $req->report;
            if($ct->save()) return "Successful";
        }
        public function DeleteReport(Request $req,$id){
            $rt = Report::find($id);
            $rt->delete();
            return response()->json([
                'Producted'=>  'Deleted successfull',
            ],200);
        }

          //.............................Order List.................................

          public function Orderlist(){
            $orders = Order::all();
            return $orders;
        }
        public function DeleteOrder(Request $req,$id){
            $od = Order::find($id);
            $od->delete();
            return response()->json([
                'Producted'=>  'Deleted successfull',
            ],200);
        }

        //.............................Customer.................................


        
        public function Customerlist(){
            $users = CUser::all();
            return $users;
        }
        public function Customeradd(Request $req){
            $users = new CUser();
            //$pr->id = $req->id;
            $users->name = $req->name;
            $users->email = $req->email;
            $users->password = $req->password;
            $users->confirmpassword = $req->confirmpassword;
            $users->phonenumber = $req->phonenumber;
            $users->address = $req->address;
            if($users->save()) return "Successful";
        }
        
        public function EditCustomer(Request $req,$id){   ///Update AND Details
            $ct = CUser::find($id);
            return $ct;
               
        }

        public function UpdateCustomer(Request $req,$id){   ///Update AND Details
            $ct = CUser::find($id);
            $ct->name = $req->name;
            $ct->update();
            return response()->json([
                'prescribe'=>  'updated successfull',
            ],200);
               
        }

        public function DeleteCustomer(Request $req,$id){
            $ct = CUser::find($id);
            $ct->delete();
            return response()->json([
                'Producted'=>  'Deleted successfull',
            ],200);
        }

}
