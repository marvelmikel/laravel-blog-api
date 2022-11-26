<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class FileUploadController extends Controller
{
    //
    public function fileUpload(Request $request)
    {
        $uploaded_files = $request->file->store('public/uploads');
        $blog = new Blog;
        $blog-> title = $request->title;
        $blog-> details = $request->details;
        $blog-> blog_image = $request->file->hashName();
        $result = $blog->save();
        if($result){
            return ["result" =>  "Blog posted success"];

        }else{
            return ["result" =>  "Blog not posted"];

        }



    }
}
