@extends('admin.master')

@section('title')
    Edit-Category
@endsection

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Edit Category</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('update-category',['id'=>$category->id])}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row mt-3">
                                    <label for="" class="col-md-4 col-form-label">Category Name</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="category_name" value="{{$category->category_name}}">
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <label for="" class="col-md-4 col-form-label">Category Image</label>
                                    <div class="col-md-8">
                                        <input type="file" class="form-control-file" name="category_image">
                                        <img src="{{asset($category->category_image)}}" style="height: 100px; width: 100px" alt="">
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <label for="" class="col-md-4 col-form-label">Status</label>
                                    <div class="col-md-8">
                                        <label for=""><input type="radio" name="status" value="1" {{$category->status ==1?"checked":""}}>Published</label>
                                        <label for=""><input type="radio" name="status" value="0" {{$category->status ==0?"checked":""}}>UnPublished</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4 col-form-label"></label>
                                    <div class="col-md-8">
                                        <input type="submit" class="btn btn-success btn-block" value="Update Category">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
