@extends('layouts.admin')
@section('title' , 'Nepdoor | Billing View')
@section('main-content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="m-0 text-left font-weight-bold" style="padding: 10px">Billing View</small></h4>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="amount">Amount</label>
                                    <input type="number" id="amount" name="amount" class="form-control" value="{{ @$billing_data->amount }}" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="col-md-3" for="voucher">Voucher:</label>
                                    <div class="col-md-4">
                                        <img src={{ asset('uploads/billing/Thumb-' . @$billing_data->voucher) }} alt=""
                                            class="img img-fluid img-responsive" style="max-width: 10rem">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class=" form-group col-md-12">
                                    <label for="payment_status ">Payment status</label>
                                    <select name="payment_status" id="payment_status" class="form-control form-control-sm" disabled>
                                        <option {{ @$billing_data->payment_status == 'Paid' ? 'selected' : '' }}>Paid
                                        </option>
                                        <option {{ @$billing_data->payment_status == 'Unpaid' ? 'selected' : '' }}>Unpaid
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="created_at">Created at</label>
                                    <input type="datetime-local" id="created_at" name="created_at" class="form-control" rows="5"
                                        value="{{ @$billing_data->created_at }}" disabled>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="updated_at">Updated at</label>
                                    <input type="datetime-local" id="updated_at" name="updated_at" class="form-control"
                                        rows="5" value="{{ @$billing_data->updated_at }}" disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class=" form-group col-md-12">
                                    <label for="status ">Status</label>
                                    <select name="status" id="status" class="form-control form-control-sm" disabled>
                                        <option {{ @$billing_data->status == 'Active' ? 'selected' : '' }}>Active</option>
                                        <option {{ @$billing_data->status == 'Inactive' ? 'selected' : '' }}>Inactive
                                        </option>
                                    </select>
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
