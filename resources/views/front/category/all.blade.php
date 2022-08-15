@extends('front.master')

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                @foreach($blogs as $blog)
                <div class="col-md-4">
                    <div class="card">

                            <div class="card-header">
                                <h2 class="text-center">{{$blog->blog_title}}</h2>
                            </div>
                            <div class="card-body">
                                <img src="{{asset($blog->blog_image)}}" alt="" style="height: 300px; width: 300px;">
                                <p>{!! $blog->blog_content !!}</p>
                                <a href="{{route('blog-details',['id'=>$blog->id])}}" class="btn btn-outline">Details</a>
                            </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
