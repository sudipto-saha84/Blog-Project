<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected static $blog;
    protected static $image;
    protected static $imageName;
    protected static $imagedirectory;
    protected static $imageUrl;

    protected static function saveBlog($request)
    {
        if ($request->file('blog_image'))
        {
            self::$imageUrl = self::imageUpload($request);
        }else
        {
            self::$imageUrl='';
        }


        self::$blog =new Blog();
        self::$blog->category_id =$request->category_id;
        self::$blog->blog_title = $request->blog_title;

        self::$blog->blog_image  =self::$imageUrl ;
        self::$blog->blog_content = $request->blog_content;
        self::$blog->status =$request->status;
        self::$blog->save();
    }
    protected static function imageUpload($request)
    {
        self::$image = $request->file('blog_image');
        self::$imageName = time().rand(10,1000).'.'.self::$image->getClientOriginalExtension();
        self::$imagedirectory = 'assets/image/blog/';
        self::$image->move(self::$imagedirectory,self::$imageName);
        return self::$imagedirectory.self::$imageName;
    }

    protected static function updateBlog($request,$id)

    {
        self::$blog = Blog::find($id);


        if ($request->file('blog_image'))
        {
            if (file_exists(self::$blog->blog_image))
            {
                unlink(self::$blog->blog_image);
            }
            self::$imageUrl =self::imageUpload($request);
        }else
        {
            self::$imageUrl = self::$blog->blog_image;
        }



        self::$blog->category_id =$request->category_id;
        self::$blog->blog_title = $request->blog_title;

        self::$blog->blog_image  =self::$imageUrl ;
        self::$blog->blog_content = $request->blog_content;
        self::$blog->status =$request->status;
        self::$blog->save();

    }
    protected static function deleteBlog($id)
    {
       self::$blog=Blog::find($id);
       if (self::$blog->blog_image)
       {
           unlink(self::$blog->blog_image);
       }
       self::$blog->delete();
    }


}
