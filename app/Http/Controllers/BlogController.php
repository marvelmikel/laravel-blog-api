<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    //
    public function getBlog($id=null)
    {
        if($id){
            $blog = Blog::find($id);
        }else{
            $blog =Blog::all();
        }
        return $blog;
    }

    public function addBlog(Request $request)
    {

        $blog = new Blog;
        $blog->title = $request->title;
        $blog->details = $request->details;
        $result = $blog->save();
        if($result){
            return ["result" => "Blog Added successful"];
        }else {
            return ["result" => "Blog not saved"];
        }
    }


    public function updateBlog(Request $request)
    {

        $blog = Blog::find($request->id);
        $blog->title = $request->title;
        $blog->details = $request->details;
        $result = $blog->save();
        if($result){
            return ["result" => "Blog Updated successful"];
        }else{
            return ["result" => "Blog not Updated"];
        }

    }

    public function deleteBlog($id)
    {
        $blog = Blog::find($id);
        $result = $blog->delete();
        if($result)
        {
            return ["result" => "Blog Deleted successful"];
        }else{
            return ["result" => "Blog not Deleted"];
        }
    }

    public function searchBlogByName($param)
    {
       $blog = Blog:: where('title', 'like', "%" .$param."%")->get();
       return $blog;
    }
}
