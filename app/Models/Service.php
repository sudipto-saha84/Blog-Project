<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected static $service;
    protected static $image;
    protected static $imageName;
    protected static $imagedirectory;
    protected static $imageUrl;

    protected static function saveService($request)
    {
        if ($request->file('service_image'))
        {
            self::$imageUrl = self::imageUpload($request);
        }else
        {
            self::$imageUrl='';
        }


        self::$service =new Service();
        self::$service->service_title = $request->service_title;

        self::$service->service_image  =self::$imageUrl ;
        self::$service->service_content = $request->service_content;
        self::$service->status =$request->status;
        self::$service->save();
    }
    protected static function imageUpload($request)
    {
        self::$image = $request->file('service_image');
        self::$imageName = time().rand(10,1000).'.'.self::$image->getClientOriginalExtension();
        self::$imagedirectory = 'assets/image/service/';
        self::$image->move(self::$imagedirectory,self::$imageName);
        return self::$imagedirectory.self::$imageName;
    }

    protected static function updateService($request,$id)

    {
        self::$service=Service::find($id);


        if ($request->file('service_image'))
        {
            if (file_exists(self::$service->service_image))
            {
                unlink(self::$service->service_image);
            }
            self::$imageUrl =self::imageUpload($request);
        }else
        {
            self::$imageUrl = self::$service->service_image;
        }

        self::$service->service_title = $request->service_title;

        self::$service->service_image  =self::$imageUrl ;
        self::$service->service_content = $request->service_content;
        self::$service->status =$request->status;
        self::$service->save();

    }
    protected static function deleteService($id)
    {
        self::$service=Service::find($id);
        if (self::$service->service_image)
        {
            unlink(self::$service->service_image);
        }
        self::$service->delete();
    }


}
