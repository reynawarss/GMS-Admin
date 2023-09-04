<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PengumumanController extends Controller
{
    //show pengumuman
    public function AllPengumuman(){
        $all = dB::table('pengumuman')
                ->get();
        return view('pengumuman.all-pengumuman', compact('all'));
    }

    //add pengumuman, insert pengumuman
    public function AddPengumumanIndex(){
        return view ('pengumuman.add-pengumuman');
    }

    public function InsertPengumuman(Request $request){
        $data = array();
        $data['title']= $request->title;
        $data['content'] = $request->content;

        $insert = DB::table('pengumuman')->insert($data);
        if ($insert) {
            return redirect("/all-pengumuman")->with('success', 'Successfully Add Announcement!');
        } else {
            return redirect("/all-pengumuman")->with('error', 'Error with add Announcement!');
        }
        
    }

    //edit & update pengumuman
    public function EditPengumuman($id){
        $edit = DB::table('pengumuman')->where('id', $id)->first();
        return view('pengumuman.edit-pengumuman', compact('edit' ));
    }

    public function UpdatePengumuman(Request $request, $id){
        $data = array();
        $data['title']= $request->title;
        $data['content'] = $request->content;
    
        $update = DB::table('pengumuman')
        ->where('id', $id)
        ->update($data);
        if ($update){
            return redirect("/all-pengumuman")->with('success', 'Successfully Update Announcement!');
        } else {
            return redirect("/all-pengumuman")->with('error', 'Something Wrong, Please Try Again!');
        }
    }

    //delete pengumuman
    public function DeletePengumuman($id){
        $delete = DB::table('pengumuman')
        ->where('id' , $id)
        ->delete();
        if($delete) {
            return redirect("/all-pengumuman")->with('success', 'Successfully Delete Announcement!');
        } else {
            return redirect("/all-pengumuman")->with('error', 'Error With Delete Announcement!');
        }
    }
}
