@extends('layouts.admin')
@section('title' , 'Nepdoor | Category View')
@section('main-content')
{{-- BreadCrumb  --}}
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Package</a></li>
        <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category</a></li>
        <li class="breadcrumb-item active" aria-current="reply">View</li>
    </ol>
</nav>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="m-0 text-left font-weight-bold" style="padding: 10px">Category View</small></h4>
                    <div class="card">
                        <div class="card-body">
                            @if (isset($packageCategories_data))
                                <form action="{{ route('category.store') }}" method="post" class="form"
                                    enctype="multipart/form-data">
                                    @csrf
                            @endif

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="title">Title</label>
                                    <input type="text" id="title" name="title" class="form-control"
                                        value="{{ @$packageCategories_data->title }}" disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="key">Key</label>
                                    <input type="text" id="key" name="key" class="form-control"
                                        value="{{ @$packageCategories_data->key }}" disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="created_at">Created at</label>
                                    <input type="datetime-local" id="created_at" name="created_at" class="form-control" rows="5"
                                        value="{{ @$packageCategories_data->created_at }}" disabled>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="updated_at">Updated at</label>
                                    <input type="datetime-local" id="updated_at" name="updated_at" class="form-control"
                                        rows="5" value="{{ @$packageCategories_data->updated_at }}" disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class=" form-group col-md-12">
                                    <label for="status ">Status</label>
                                    <select type="text" class="form-control form-control-sm" id="status"
                                        name="status" disabled>
                                        <option {{ @$packageCategories_data->status == 'Active' ? 'selected' : '' }}>Active
                                        </option>
                                        <option {{ @$packageCategories_data->status == 'Inactive' ? 'selected' : '' }}>
                                            Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <a href="{{ route('category.index') }}" class="btn btn-primary float-right"
                                style="margin-right: 10px" value="Back">Back</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
