@extends('admin.master')

@section('title')
    Add Service
@endsection

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Add Service</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('new-service')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mt-3">
                                    <label for="" class="col-md-4 col-form-label">Service Title</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="service_title">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4 col-form-label">Service Image</label>
                                    <div class="col-md-8">
                                        <input type="file" class="form-control-file" name="service_image">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4 col-form-label">Service Content</label>
                                    <div class="col-md-8">
                                        <textarea name="service_content" id="editor" cols="30" rows="10" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4 col-form-label">Status</label>
                                    <div class="col-md-8">
                                        <label for=""><input type="radio" name="status" value="1" checked>Published</label>
                                        <label for=""><input type="radio" name="status" value="0">UnPublished</label>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4 col-form-label"></label>
                                    <div class="col-md-8">
                                        <input type="submit" class="btn btn-success btn-block" value="Add Service">
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
