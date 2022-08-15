@extends('admin.master')

@section('title')
    Log In
@endsection
@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="text-center text-info" >Log In</h2>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" action="{{route('login')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="useremail">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter email">
                                </div>

                                <div class="form-group">
                                    <label for="userpassword">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Enter password">
                                </div>
                                <div class="mt-4">
                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In</button>
                                </div>

                                <div class="mt-4 text-center">
                                    <h5 class="font-size-14 mb-3">Sign up using</h5>

                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a href="javascript::void()" class="social-list-item bg-primary text-white border-primary">
                                                <i class="mdi mdi-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript::void()" class="social-list-item bg-info text-white border-info">
                                                <i class="mdi mdi-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript::void()" class="social-list-item bg-danger text-white border-danger">
                                                <i class="mdi mdi-google"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
