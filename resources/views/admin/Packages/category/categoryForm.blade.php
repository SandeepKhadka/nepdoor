@extends('layouts.admin')
@section('title', 'Nepdoor | Category Form')
@section('main-content')
    {{-- BreadCrumb  --}}
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Package</a></li>
            <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category</a></li>
            <li class="breadcrumb-item active" aria-current="reply">{{ isset($packageCategories_data) ? 'Edit' : 'Form' }}</li>
        </ol>
    </nav>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="m-0 text-left font-weight-bold" style="padding: 10px">Category
                        {{ isset($packageCategories_data) ? 'Update' : 'Add' }}</h4>
                    <div class="card">
                        <div class="card-body">
                            @if (isset($packageCategories_data))
                                <form action="{{ route('category.update', @$packageCategories_data->id) }}" method="post"
                                    class="form" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                @else
                                    <form action="{{ route('category.store') }}" method="post" class="form"
                                        enctype="multipart/form-data">
                                        @csrf
                            @endif

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="title">Title</label>
                                    <input type="text" id="title" name="title" class="form-control"
                                        value="{{ @$packageCategories_data->title }}" required>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="key">Key</label>
                                    <input type="text" id="key" name="key" class="form-control"
                                        value="{{ @$packageCategories_data->key }}">
                                    @error('key')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            @if (isset($packageCategories_data))
                                <div class="row">
                                    <div class=" form-group col-md-12">
                                        <label for="status ">Status</label>
                                        <select type="text" class="form-control form-control-sm" id="status"
                                            name="status" required>
                                            <option {{ @$packageCategories_data->status == 'Active' ? 'selected' : '' }}>
                                                Active</option>
                                            <option {{ @$packageCategories_data->status == 'Inactive' ? 'selected' : '' }}>
                                                Inactive</option>
                                        </select>
                                        @error('status')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            @endif
                            <button type="submit" class="btn btn-success float-right" value="Sumbit">Submit</button>
                            <a href="{{ route('category.index') }}" class="btn btn-primary float-right"
                                style="margin-right: 10px" value="Back">Back</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
