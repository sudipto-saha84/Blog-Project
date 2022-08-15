@extends('admin.master')

@section('title')
    Manage Service
@endsection
@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Manage Service</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th> Service Title</th>
                                    <th>Service Image</th>
                                    <th>Service Content</th>
                                    <th>Service Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($services as $service)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$service->service_title}}</td>
                                        <td>
                                            <img src="{{asset($service->service_image)}}" style="height: 100px; width: 100px;" alt="">
                                        </td>
                                        <td>{!! $service->service_content !!}</td>
                                        <td>{{$service->status ==1?"Published":"Unpublished"}}</td>
                                        <td>
                                            <a href="{{route('edit-service',['id'=>$service->id])}}" class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="{{route('delete-service',['id'=>$service->id])}}" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                                            <a href="{{route('change-service-status',['id'=>$service->id])}}" class="btn {{$service->status==1?"btn-success":"btn-danger"}} btn-sm"><i class="fa-solid fa-eye"></i></a>
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
