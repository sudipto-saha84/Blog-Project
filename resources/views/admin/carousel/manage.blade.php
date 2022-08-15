@extends('admin.master')

@section('title')
    Manage Carousel
@endsection
@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Manage Carousel
                            </h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-responsive" id="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Carousel Small Title</th>
                                    <th>Carousel Big Title</th>
                                    <th>Carousel Content</th>
                                    <th>Carousel Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($carousels as $carousel)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$carousel->small_title}}</td>
                                    <td>{{$carousel->big_title}}</td>
                                    <td>{!! $carousel->content !!}</td>
                                    <td><img src="{{asset($carousel->image)}}" alt="" style="height: 100px; width: 100px;"></td>
                                    <td>{{$carousel->status==1?"Published":"Unpublished"}}</td>
                                    <td>
                                        <a href="{{route('edit-carousel',['id'=>$carousel->id])}}" class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="{{route('delete-carousel',['id'=>$carousel->id])}}" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                                        <a href="{{route('change-carousel-status',['id'=>$carousel->id])}}" class="btn {{$carousel->status==1?"btn-success":"btn-danger"}} btn-sm"><i class="fa-solid fa-eye"></i></a>

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
