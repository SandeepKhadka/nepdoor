@extends('layouts.admin')
@section('main-content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="m-0 text-left font-weight-bold" style="padding: 10px">Help Centre Form</small></h4>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="title">Title</label>
                                    <input type="text" id="title" name="title" class="form-control" 
                                        value="{{ @$helpCenter_data->title }}"required disabled>
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="link">Link</label>
                                    <input type="text" id="link" name="link" class="form-control"
                                        value="{{ @$helpCenter_data->link }}" required disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="order_id">order ID</label>
                                    <input type="text" id="order_id" name="order_id" class="form-control" rows="5"
                                        value="{{ @$helpCenter_data->order_id }}" required disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class=" form-group col-md-12">
                                    <label for="status ">Status</label>
                                    <input type="text" id="status" name="status" class="form-control" rows="5"
                                        value="{{ @$helpCenter_data->status }}" required disabled>
                                </div>
                            </div>
                            <a href="{{ route('helpCenter.index') }}" class="btn btn-primary float-right"
                                style="margin-right: 10px" value="Back">Back
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
