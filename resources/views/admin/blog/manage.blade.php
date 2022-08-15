@extends('admin.master')

@section('title')
    Manage Blog
@endsection
@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Manage Blog</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th> BLog Title</th>
                                    <th>Blog Category Name</th>
                                    <th>Blog Image</th>
                                    <th>Blog Content</th>
                                    <th>Blog Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($blogs as $blog)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$blog->blog_title}}</td>
                                        @php
                                        $category = \App\Models\Category::where('id',$blog->category_id)->first()->category_name;
                                        @endphp
                                        <td>{{$category}}</td>
                                        <td>
                                            <img src="{{asset($blog->blog_image)}}" style="height: 100px; width: 100px;" alt="">
                                        </td>
                                        <td>{!! $blog->blog_content !!}</td>
                                        <td>{{$blog->status ==1?"Published":"Unpublished"}}</td>
                                        <td>
                                            <a href="{{route('edit-blog',['id'=>$blog->id])}}" class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="{{route('delete-blog',['id'=>$blog->id])}}" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                                            <a href="{{route('change-blog-status',['id'=>$blog->id])}}" class="btn {{$blog->status==1?"btn-success":"btn-danger"}} btn-sm"><i class="fa-solid fa-eye"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
