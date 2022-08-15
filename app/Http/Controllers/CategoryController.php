<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addCategory()
    {
        return view('admin.category.add');
    }
    public function newCategory(Request $request)
    {
        Category::addCategory($request);
        return redirect()->back()->with('message','Category Created Successfully');
    }
    public function manageCategory()
    {
        return view('admin.category.manage',[
            'categories'=>Category::latest()->get()
        ]);
    }
    public function editCategory($id)
    {
        return view('admin.category.edit',[
            'category'=>Category::find($id)
        ]);
    }
    public function updateCategory(Request $request,$id)
    {
        Category::updateCategory($request,$id);
        return redirect('/manage-category')->with('message','Category Updated Successfully');
    }
    public function deleteCategory($id)
    {
        Category::deleteCategory($id);
        return redirect('/manage-category')->with('message','Category Deleted Successfully');
    }
    public function changeCategoryStatus($id)
    {
        $category = Category::find($id);
        $category->status = $category->status==1?"0":"1";
        $category->save();
        return redirect('manage-category')->with('message','Category Status Change Successfully');
    }

}
