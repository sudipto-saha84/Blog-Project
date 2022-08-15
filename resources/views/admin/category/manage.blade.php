@extends('admin.master')

@section('title')
    Manage Category
@endsection
@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Manage Category</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category Name</th>
                                    <th>Category Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$category->category_name}}</td>
                                    <td>
                                        <img src="{{asset($category->category_image)}}" style="height: 100px; width: 100px;" alt="">
                                    </td>
                                    <td>{{$category->status ==1?"Published":"Unpublished"}}</td>
                                    <td>
                                        <a href="{{route('edit-category',['id'=>$category->id])}}" class="btn btn-info btn-sm">Edit</a>
                                        <a href="{{route('delete-category',['id'=>$category->id])}}" class="btn btn-danger btn-sm">Del</a>
                                        <a href="{{route('change-category-status',['id'=>$category->id])}}" class="btn {{$category->status==1?"btn-success":"btn-danger"}} btn-sm"><i class="fa-solid fa-eye"></i></a>

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
