<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductAPIController extends Controller
{

    public function list(){
        $products = Product::all();
        return $products;
    }
    public function add(Request $req){
        $pr = new Product();
        //$pr->id = $req->id;
        $pr->name = $req->name;
        $pr->price = $req->price;
        $pr->image = $req->image;
        if($pr->save()) ;
        return "Successful";
    }
    public function prescribe ($id){
        $prescribe= Book::find($id);

        return response()->json([
            'prescribe'=>  $prescribe,
        ],200);

    }

    public function UpdateProfile(Request $request,$id){
        $var = Book::find($id);
        $var->prescribe=$request->prescribe;
        $var->update();
        return response()->json([
            'prescribe'=>  'updated successfull',
        ],200);
    }

    //Category


}
