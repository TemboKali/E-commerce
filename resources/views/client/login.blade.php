@extends('client.client_page_layout.page_layout')
@section('PageTitle', isset($pageTitle) ? $pageTitle : 'Login')
@section('content')
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <div class="card">
                    <form action="{{ route('client.user') }}" class="form-control" method="POST">
                        @csrf
                        <div class="card-header">
                            <h2 class="text-center">Login Form</h2>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="" class="form-label">User or email</label>
                                <input type="text" name="login" class="form-control" placeholder="Enter email or user name">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter password">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Login</button>
                        <p class="text-center">Don't have account?<a href="{{ route('client.register') }}"
                                style="text-decoration:none;color:blue">Sign
                                up</a></p>
                        <p class="text-center">Don't remember your password?<a href=""
                                style="text-decoration:none;color:blue">Forogot
                                Password</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection()