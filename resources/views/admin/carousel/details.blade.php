@extends('front.master')

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">{{$carousel->small_title}}</h4>
                                <h2 class="text-center">{{$carousel->big_title}}</h2>
                            </div>
                            <div class="card-body">
                                <img src="{{asset($carousel->image)}}" alt="" style="height: 300px; width: 400px;">
                                <p>{!! $carousel->content !!}</p>
                                <a href="{{route('home')}}" class="btn btn-outline">Back</a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>
@endsection
