@extends('layout.master2')
@section('page-css')


@endsection
@section('content')

    <div class="page-content d-flex align-items-center justify-content-center">

        <div class="row w-100 mx-0 auth-page">
            <div class="col-md-8 col-xl-6 mx-auto">
                <div class="card">
                    <div class="row">
                        <div class="col-md-4 pr-md-0">
                            <div class="auth-left-wrapper" style="background-image: url({{ url('https://via.placeholder.com/219x452') }})">

                            </div>
                        </div>
                        <div class="col-md-8 pl-md-0">
                            <div class="auth-form-wrapper px-4 py-5">
                                <a href="#" class="noble-ui-logo d-block mb-2">Criptware <span> Admin</span> </a>
                                <h5 class="text-muted font-weight-normal mb-4">Welcome back! Log in to your account.</h5>
                                <form class="forms-sample" method="post" action="{{ route('login') }}">
                                    @csrf
                                    @if($errors->any())
                                        <p style="color: #e60980; font-weight: bold; text-align: center;"> {{$errors->first()}} </p>
                                    @endif
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" autocomplete="current-password" placeholder="Password">
                                    </div>
                                    <div class="form-check form-check-flat form-check-primary">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input">
                                            Remember me
                                        </label>
                                    </div>
                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                                            Login
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-js')

@endsection
