@extends('client.client_page_layout.page_layout')
@section('PageTitle', 'Register')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Fill in The Form</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('client.storeInfo') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Enter full name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter name" required>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Enter email</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Enter email</label>
                                <input type="text" name="phone" class="form-control" placeholder="Enter phone" required>
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                        <p class="text-center mt-3">Have an account? <a href="{{ route('client.login') }}">Sign in</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection