@extends('layouts.admin')
@section('title' , 'Nepdoor | Billing Form')
@section('main-content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="m-0 text-left font-weight-bold" style="padding: 10px">Billing
                        {{ isset($billing_data) ? 'Update' : 'Add' }}</small></h4>
                    <div class="card">
                        <div class="card-body">
                            @if (isset($billing_data))
                                <form action="{{ route('billing.update', @$billing_data->id) }}" method="post" class="form"
                                    enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                @else
                                    <form action="{{ route('billing.store') }}" method="post" class="form"
                                        enctype="multipart/form-data">
                                        @csrf
                            @endif
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="amount">Amount</label>
                                    <input type="number" id="amount" name="amount" class="form-control"
                                        value="{{ @$billing_data->amount }}" required>
                                    @error('amount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="col-md-3" for="voucher">Voucher:</label>
                                    <div class="col-md-4">
                                        <input type="file" name="voucher" {{ isset($billing_data) ? '' : 'required' }}>
                                    </div>
                                    <div class="col-md-4">
                                        <img src={{ asset('uploads/billing/Thumb-' . @$billing_data->voucher) }}
                                            alt="" class="img img-fluid img-responsive" style="max-width: 10rem">
                                    </div>
                                    @error('voucher')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class=" form-group col-md-12">
                                    <label for="payment_status ">Payment status</label>
                                    <select name="payment_status" id="payment_status" class="form-control form-control-sm">
                                        <option {{ @$billing_data->payment_status == 'Paid' ? 'selected' : '' }}>Paid
                                        </option>
                                        <option {{ @$billing_data->payment_status == 'Unpaid' ? 'selected' : '' }}>Unpaid
                                        </option>
                                    </select>
                                    @error('payment_status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class=" form-group col-md-12">
                                    <label for="status ">Status</label>
                                    <select name="status" id="status" class="form-control form-control-sm">
                                        <option {{ @$billing_data->status == 'Active' ? 'selected' : '' }}>Active</option>
                                        <option {{ @$billing_data->status == 'Inactive' ? 'selected' : '' }}>Inactive
                                        </option>
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success float-right" value="Sumbit">Submit</button>
                            <a href="{{ route('billing.index') }}" class="btn btn-primary float-right"
                                style="margin-right: 10px" value="Back">Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
