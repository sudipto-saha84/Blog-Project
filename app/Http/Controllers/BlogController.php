<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function addBlog()
    {
        return view('admin.blog.add',[
            'categories'=>Category::where('status',1)->get()
        ]);

    }
    public function newBlog(Request $request)
    {
        Blog::saveBlog($request);
        return redirect()->back()->with('message','Blog Created Successfully');
    }
    public function manageBlog()
    {
        return view('admin.blog.manage',[
           'blogs'=>Blog::latest()->get()
        ]);
    }
    public function editBlog($id)
    {
        return view('admin.blog.edit',[
            'blog'=>Blog::find($id),
            'categories'=>Category::where('status',1)->get()
        ]);
    }
    public function updateBlog(Request $request,$id)
    {
        Blog::updateBlog($request,$id);

        return redirect('/manage-blog')->with('message',"Blog Updated Successfully");
    }
    public function deleteBlog($id)
    {
        Blog::deleteBlog($id);
        return redirect('/manage-blog')->with('message','BLog Deleted Successfully');
    }
    public function blogDetails($id)
    {
        return view('admin.blog.details',[
            'blog'=>Blog::find($id),
        ]);
    }
    public function changeBlogStatus($id)
    {
        $blog = Blog::find($id);
        $blog->status =$blog->status == 1?"0":"1";
        $blog->save();
        return redirect('/manage-blog')->with('message','Blog Status Change Successfully');
    }

}
