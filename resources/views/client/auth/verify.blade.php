@extends('client.client_page_layout.page_layout')
@section('PageTitle', 'Email Verification')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Email Verification</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('verification.verify') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Verification Code</label>
                                <input type="text" name="verification_code" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Verify Email</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection