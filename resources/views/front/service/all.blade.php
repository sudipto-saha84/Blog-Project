@extends('front.master')

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                @foreach($services as $service)
                <div class="col-md-4">
                    <div class="card">
                            <div class="card-header">
                                <h3>{{$service->service_title}}</h3>
                            </div>
                        <div class="card-body">
                            <img src="{{asset($service->service_image)}}" alt="" style="height: 300px; width: 300px">
                            <p>{!! $service->service_content !!}</p>
                        </div>
                        <a href="{{route('service-details',['id'=>$service->id])}}" class="btn btn-outline">More</a>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
