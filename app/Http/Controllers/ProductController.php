<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class ProductController extends Controller
{
    //show product
    public function AllProduct(){
        $all = DB::table('product')
                ->get();
        return view('product.all-product', compact('all')); 
    }

    //add product, insert product
    public function AddProductIndex(){
        return view ('product.add-product');
    }

    public function InsertProduct(Request $request){
        $data = array();
        $data['name']= $request->name;
        $data['description'] = $request->description;
        $data['price'] = $request->price;

        $insert = DB::table('product')->insert($data);
        if ($insert) {
            return redirect("/all-product")->with('success', 'Successfully Add User!');
        } else {
            return redirect("/all-product")->with('error', 'Something Wrong, Please Try Again!');
        }
        
    }

    //edit & update product
    public function EditProduct($id){
        $edit = DB::table('product')->where('id', $id)->first();
        return view('product.edit-product', compact('edit' ));
    }

    public function UpdateProduct(Request $request, $id){
        $data = array();
        $data['name']= $request->name;
        $data['description'] = $request->description;
        $data['price'] = $request->price;
    
        $update = DB::table('product')
        ->where('id', $id)
        ->update($data);
        if ($update){
            return redirect("/all-product")->with('success', 'Successfully Update User!');
        } else {
            return redirect("/all-product")->with('error', 'Something Wrong, Please Try Again!');
        }

    }

    //delete product
    public function DeleteProduct($id){
        $delete = DB::table('product')
        ->where('id' , $id)
        ->delete();
        if($delete) {
            return redirect("/all-product")->with('success', 'Successfully Delete User!');
        } else {
            return redirect("/all-product")->with('error', 'Something Wrong, Please Try Again!');
        }
    }
}
