<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Category;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    public function addCarousel()
    {
        return view('admin.carousel.add');
    }
    public function newCarousel(Request $request)
    {

        Carousel::newCarousel($request);
        return redirect()->back()->with('message','Carousel Created Successfully');
    }
    public function manageCarousel()
    {
        return view('admin.carousel.manage',[
            'carousels'=>Carousel::all(),
        ]);
    }
    public function editCarousel($id)
    {
        return view('admin.carousel.edit',[
            'carousel'=>Carousel::find($id),
        ]);
    }

    public function updateCarousel(Request $request,$id)
    {
        Carousel::updateCarousel($request,$id);
        return redirect('/manage-carousel')->with('message','Carousel Updated Successfully');
    }
    public function deleteCarousel($id)
    {
        Carousel::deleteCarousel($id);
        return redirect('/manage-carousel')->with('message','Carousel Deleted Successfully');
    }
    public function changeCarouselStatus($id)
    {
        $carousel = Carousel::find($id);
        $carousel->status = $carousel->status ==1?"0":"1";
        $carousel->save();
        return redirect('/manage-carousel')->with('message','Carousel Status Change Successfully');
    }
    public function carouselDetails($id)
    {
        return view('admin.carousel.details',[
            'carousel'=>Carousel::find($id),
        ]);
    }
}
