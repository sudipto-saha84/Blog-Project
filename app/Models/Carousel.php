<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected static $carousel;
    protected static $image;
    protected static $imageName;
    protected static $imageDirectory;
    protected static $imageUrl;

    protected static function newCarousel($request)
    {
        if ($request->file('image'))
        {
            self::$imageUrl=self::imageUpload($request);
        }else{
            self::$imageUrl='';
        }


        self::$carousel =new Carousel();
        self::$carousel->small_title=$request->small_title;
        self::$carousel->big_title=$request->big_title;
        self::$carousel->image = self::$imageUrl;
        self::$carousel->content=$request->content;
        self::$carousel->status=$request->status;
        self::$carousel->save();
    }
    protected static function imageUpload($request)
    {
        self::$image=$request->file('image');
        self::$imageName=time().rand(10,1000).'.'.self::$image->getClientOriginalExtension();
        self::$imageDirectory ='assets/image/carousel/';
        self::$image->move(self::$imageDirectory,self::$imageName);
        return self::$imageDirectory.self::$imageName;
    }
    protected static function updateCarousel($request,$id)
    {
        self::$carousel=Carousel::find($id);

        if ($request->file('image'))
        {
            if (file_exists(self::$carousel->image))
            {
                unlink(self::$carousel->image);

            }
            self::$imageUrl = self::imageUpload($request);
        }else
        {
            self::$imageUrl=self::$carousel->image;
        }


        self::$carousel->small_title=$request->small_title;
        self::$carousel->big_title=$request->big_title;
        self::$carousel->image = self::$imageUrl;
        self::$carousel->content=$request->content;
        self::$carousel->status=$request->status;
        self::$carousel->save();
    }
    protected static function deleteCarousel($id)
    {
        self::$carousel= Carousel::find($id);

        if (self::$carousel->image)
        {
            unlink(self::$carousel->image);
        }
        self::$carousel->delete();

    }
}
