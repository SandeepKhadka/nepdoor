@extends('layouts.admin')
@section('title' , 'Nepdoor | HelpCenter Form')
@section('main-content')
{{-- BreadCrumb  --}}
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('helpCenter.index') }}">Help Center</a></li>
        <li class="breadcrumb-item active" aria-current="reply">Form</li>
    </ol>
</nav>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="m-0 text-left font-weight-bold" style="padding: 10px">Help Centre
                        {{ isset($helpCenter_data) ? 'Update' : 'Add' }}</h4>
                    <div class="card">
                        <div class="card-body">
                            @if (isset($helpCenter_data))
                                <form action="{{ route('helpCenter.update', @$helpCenter_data->id) }}" method="post"
                                    class="form" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                @else
                                    <form action="{{ route('helpCenter.store') }}" method="post" class="form"
                                        enctype="multipart/form-data">
                                        @csrf
                            @endif
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="title">Title</label>
                                    <input type="text" id="title" name="title" class="form-control"
                                        value="{{ @$helpCenter_data->title }}"required>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="link">Link</label>
                                    <input type="link" id="link" name="link" class="form-control"
                                        value="{{ @$helpCenter_data->link }}" required>
                                    @error('link')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            @if (isset($helpCenter_data))
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="order_id">Order ID</label>
                                        <input type="number" id="order_id" name="order_id" class="form-control"
                                            rows="5" value="{{ @$helpCenter_data->order_id }}">
                                        @error('order_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class=" form-group col-md-12">
                                        <label for="status ">Status</label>
                                        <select type="text" class="form-control form-control-sm" id="status"
                                            name="status">
                                            <option {{ @$helpCenter_data->status == 'Active' ? 'selected' : '' }}>Active
                                            </option>
                                            <option {{ @$helpCenter_data->status == 'Inactive' ? 'selected' : '' }}>
                                                Inactive
                                            </option>
                                        </select>
                                        @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            @endif
                            <button type="submit" class="btn btn-success float-right" value="Sumbit">Submit</button>
                            <a href="{{ route('helpCenter.index') }}" class="btn btn-primary float-right"
                                style="margin-right: 10px" value="Back">Back
                            </a>
                            </form>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
