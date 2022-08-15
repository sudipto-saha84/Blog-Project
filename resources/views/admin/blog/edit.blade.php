@extends('admin.master')

@section('title')
    Edit Blog
@endsection

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Edit Blog</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('update-blog',['id'=>$blog->id])}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mt-3">
                                    <label for="" class="col-md-4 col-form-label">Blog Title</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="blog_title" value="{{$blog->blog_title}}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4 col-form-label">Blog Category</label>
                                    <div class="col-md-8">
                                        <select name="category_id" class="form-control">
                                            <option value="" disabled selected><---------Select Category Name--------></option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}"{{$category->id==$blog->category_id?"selected":''}}>{{$category->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4 col-form-label">Blog Image</label>
                                    <div class="col-md-8">
                                        <input type="file" class="form-control-file" name="blog_image">
                                        <img src="{{asset($blog->blog_image)}}" alt="" style="height: 100px; width: 100px">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4 col-form-label">Blog Content</label>
                                    <div class="col-md-8">
                                        <textarea name="blog_content" id="editor" cols="30" rows="10" class="form-control">{!! $blog->blog_content !!}</textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4 col-form-label">Status</label>
                                    <div class="col-md-8">
                                        <label for=""><input type="radio" name="status" value="1" {{$blog->status==1?"checked":""}}>Published</label>
                                        <label for=""><input type="radio" name="status" value="0"{{$blog->status==0?"checked":""}}>UnPublished</label>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4 col-form-label"></label>
                                    <div class="col-md-8">
                                        <input type="submit" class="btn btn-success btn-block" value="Edit Blog">
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
