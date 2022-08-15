<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Carousel;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        return view('front.home.home',[
            'carousels'=>Carousel::where('status',1)->get(),
            'services'=>Service::where('status',1)->take(3)->latest()->get(),
            'blogs'=>Blog::where('status',1)->get()
        ]);
    }
    public function categoryAll($id)

    {
        return view('front.category.all',[
            'blogs'=>Blog::where('category_id',$id)->get(),
        ]);
    }
    public function serviceAll()
    {
        return view('front.service.all',[
            'services'=>Service::where('status',1)->get(),
        ]);
    }
    public function blogAll()
    {
        return view('front.blog.all',[
            'blogs'=>Blog::where('status',1)->get(),
        ]);
    }

}
