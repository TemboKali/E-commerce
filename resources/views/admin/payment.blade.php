@extends('admin-layout.page-layout')
@section('content')
    <style type="text/css">
        table {
            position: relative;
            left: 15%;
            top: 120px;
            width: 300px;
        }

        .table {
            width: 80%;
        }
    </style>
    <div class="bar">
        <div class="text">
            <h3>Payment Methods</h3>
        </div>
    </div>
    <div class="buttons mt-4">
        <div class="categor">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#paymentModal">Add Payment
                Method</button>
        </div>
        <div class="subca">

            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#paymentMethodTypeModal">Add Payment
                Method Type</button>
        </div>
    </div>
    <table class="table table-border">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Image</th>
                <th scope="col">Payment Method Type</th>
                <th scope="col">Payment Method</th>
            </tr>
        </thead>
        <tbody>
            @forelse($paymentMethods as $method)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $method->image_path)}}" alt="Image" style="width:50px; height:50px;">

                    </td>
                    <td>{{ $method->type->type }}</td>
                    <td>{{ $method->payment_method }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No Payment Methods Found.</td>
                </tr>
            @endforelse()
        </tbody>
    </table>


    <div class="modal fade" id="paymentMethodTypeModal" tabindex="-1" aria-labelledby="paymentMethodTypeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('admin.payment_methods.type.store') }}" class="form-control">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="paymentMethodTypeModalLabel">Add Payment Method Type</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Enter Type</label>
                            <input type="text" class="form-control" name="name" placeholder="e.g. online or offline"
                                required>
                        </div>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('admin.payment_methods.store') }}" class="form-control"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="paymentModalLabel">Add Payment Method</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Enter Payment Method</label>
                            <input type="text" class="form-control" name="name" placeholder="e.g. PayPal, Cash" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Payment Method Type</label>

                            <select name="payment_method_type_id" id="payment_method_type_id" class="form-control" required>
                                <option value="">Select Payment Method Type</option>
                                @foreach($paymentMethodTypes as $paymentMethodType)
                                    <option value="{{ $paymentMethodType->id }}">{{ $paymentMethodType->type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" name="image_path" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection