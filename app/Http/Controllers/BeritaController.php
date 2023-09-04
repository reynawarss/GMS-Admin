<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Berita;
use App\Notifications\BeritaDeletedNotification;
class BeritaController extends Controller
{
    //show berita
    public function AllBerita(){
        $all = dB::table('berita')
                ->get();
        return view('berita.all-berita', compact('all'));
    }

    //add berita, insert berita
    public function AddBeritaIndex(){
        return view ('berita.add-berita');
    }

    public function InsertBerita(Request $request){
        $data = array();
        $data['title']= $request->title;
        $data['content'] = $request->content;
        $data['date']= $request->date;

        $insert = DB::table('berita')->insert($data);
        if ($insert) {
            return redirect("/all-berita")->with('success', 'Successfully Update Berita!');
        } else {
            return redirect("/all-berita")->with('error', 'Something Wrong PLease Try Again!');
        }
    }

    //Edit & update berita
    public function EditBerita($id){

        $edit = DB::table('berita')->where('id', $id)->first();
        return view('berita.edit-berita', compact('edit' ));

    }

    public function UpdateBerita(Request $request, $id){
        $data = array();
        $data['title']= $request->title;
        $data['content']= $request->content;
        $data['date']= $request->date;
        
        $update = DB::table('berita')
        ->where('id', $id)
        ->update($data);
        if ($update){
            return redirect("/all-berita")->with('success', 'Successfully Delete Berita!');
        } else {
            return redirect("/all-berita")->with('error', 'Error With Delete Berita!');
        }

    }

    //Delete berita
    public function DeleteBerita($id){
        $delete = DB::table('berita')
        ->where('id' , $id)
        ->delete();
        if($delete) {
            return redirect("/all-berita")->with('success', 'Successfully Delete Berita!');
        } else {
            return redirect("/all-berita")->with('error', 'Error With Delete Berita!');
        }
    }
}
