<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class UserController extends Controller
{
    public function AllUser(){
        $all = DB::table('users')
                ->get();
        return view('user.all-user', compact('all')); 
    }

    //add user, insert user
    public function AddUserIndex(){

        return view ('user.add-user');
    }

    public function InsertUser(Request $request){

        $data = array();
        $data['name']= $request->name;
        $data['email']= $request->email;
        $data['role']= $request->role;
        $data['password']= Hash::make($request->password);
    
        $insert = DB::table('users')->insert($data);
        if ($insert){
            return redirect("/all-user")->with('success', 'Successfully Add User!');
        } else {
            return redirect("/all-user")->with('error', 'Something Wrong, Please Try Again!');
        }

    }

    //Edit & update user
    public function EditUser($id){

        $edit = DB::table('users')->where('id', $id)->first();
        return view('user.edit-user', compact('edit' ));

    }

    public function UpdateUser(Request $request, $id){
        $data = array();
        $data['name']= $request->name;
        $data['email']= $request->email;
        $data['role']= $request->role;
        $data['password']= Hash::make($request->password);
    
        $update = DB::table('users')
        ->where('id', $id)
        ->update($data);
        if ($update){
            return redirect("/all-user")->with('success', 'Successfully Update User!');
        } else {
            return redirect("/all-user")->with('error', 'Something Wrong, Please Try Again!');
        }

    }

    //Delete User
    public function DeleteUser($id){
        $delete = DB::table('users')
        ->where('id' , $id)
        ->delete();
        if($delete) {
            return redirect("/all-user")->with('success', 'Successfully Delete User!');
        } else {
            return redirect("/all-user")->with('error', 'Something Wrong, Please Try Again!');
        }
    }
}
