<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BlogController extends Controller
{
    //show blog
    public function AllBlog(){
        $all = dB::table('blog')
                ->get();
        return view('blog.all-blog', compact('all'));
    }

    //add blog, insert blog
    public function AddBlogIndex(){
        return view ('blog.add-blog');
    }

    public function InsertBlog(Request $request)
    {
        $data = array();
        $data['title'] = $request->title;
        $data['content'] = $request->content;
        $data['date'] = $request->date;

        $insert = DB::table('blog')->insert($data);
        if ($insert) {
            return redirect("/all-blog")->with('success', 'Successfully add Blog!');
        } else {
            return redirect("/all-blog")->with('error', 'Failed to add Blog!');
        }
    }


    //Edit & update Blog
    public function EditBlog($id){

        $edit = DB::table('blog')->where('id', $id)->first();
        return view('blog.edit-blog', compact('edit' ));

    }

    public function UpdateBlog(Request $request, $id){
        $data = array();
        $data['title']= $request->title;
        $data['content']= $request->content;
        $data['date']= $request->date;
        
        $update = DB::table('blog')
        ->where('id', $id)
        ->update($data);
        if ($update){
            return redirect("/all-blog")->with('success', 'Successfully Update Blog!');
        } else {
            return redirect("/all-blog")->with('error', 'Something Wrong, Please Try Again!');
        }

    }

    //Delete Blog
    public function DeleteBlog($id){
        $delete = DB::table('blog')
        ->where('id' , $id)
        ->delete();
        if($delete) {
            return redirect("/all-blog")->with('success', 'Successfully Delete Blog!');
        } else {
            return redirect("/all-blog")->with('error', 'Error With Delete Blog!');
        }
    }
}
