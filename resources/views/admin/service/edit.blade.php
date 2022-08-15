@extends('admin.master')

@section('title')
    Edit Service
@endsection

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Edit Service</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('update-service',['id'=>$service->id])}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mt-3">
                                    <label for="" class="col-md-4 col-form-label">Service Title</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="service_title" value="{{$service->service_title}}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4 col-form-label">Service Image</label>
                                    <div class="col-md-8">
                                        <input type="file" class="form-control-file" name="service_image">
                                        <img src="{{asset($service->service_image)}}" alt="" style="100px; width: 100px;">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4 col-form-label">Service Content</label>
                                    <div class="col-md-8">
                                        <textarea name="service_content" id="editor" cols="30" rows="10" class="form-control">{!! $service->service_content !!}</textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4 col-form-label">Status</label>
                                    <div class="col-md-8">
                                        <label for=""><input type="radio" name="status" value="1" {{$service->status==1?"checked":""}}>Published</label>
                                        <label for=""><input type="radio" name="status" value="0"{{$service->status==0?"checked":""}}>UnPublished</label>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4 col-form-label"></label>
                                    <div class="col-md-8">
                                        <input type="submit" class="btn btn-success btn-block" value="Update Service">
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
