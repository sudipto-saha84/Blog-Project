<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected static $category;
    protected static $image;
    protected static $imageName;
    protected static $imageDirectory;
    protected static $imageUrl;

    protected static function addCategory($request)
    {
        if ($request->file('category_image'))
        {
            self::$imageUrl = self::imageUpload($request);
        }else
        {
            self::$imageUrl='';
        }
        self::$category = new Category();
        self::$category->category_name= $request->category_name;
        self::$category->category_image=self::$imageUrl;
        self::$category->status= $request->status;
        self::$category->save();
    }
    protected static function imageUpload($request)
    {
        self::$image=$request->file('category_image');
        self::$imageName=time().rand(10,1000).'.'.self::$image->getClientOriginalExtension();
        self::$imageDirectory='assets/image/category/';
        self::$image->move(self::$imageDirectory,self::$imageName);
        return self::$imageDirectory.self::$imageName;
    }

    protected static function updateCategory($request,$id)
    {
        self::$category= Category::find($id);

        if ($request->file('category_image'))
        {
            if (file_exists(self::$category->category_image))
            {
                unlink(self::$category->category_image);
            }
            self::$imageUrl=self::imageUpload($request);
        }else{
            self::$imageUrl = self::$category->category_image;
        }



        self::$category->category_name= $request->category_name;
        self::$category->category_image=self::$imageUrl;
        self::$category->status= $request->status;
        self::$category->save();
    }

    protected static function deleteCategory($id)
    {
        self::$category =Category::find($id);

        if (file_exists(self::$category->category_image))
        {
            unlink(self::$category->category_image);
        }
        self::$category->delete();



    }
}
