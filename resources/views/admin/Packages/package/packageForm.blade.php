@extends('layouts.admin')

@section('main-content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="m-0 text-left font-weight-bold" style="padding: 10px">Package {{ isset($package_data) ? 'Update' : 'Add' }}</small></h4>
                    <div class="card">
                        <div class="card-body">
                            {{-- @if ($errors->any())
                                {{ implode('', $errors->all('<div>:message</div>')) }}
                            @endif --}}
                            @if (isset($package_data))
                                <form action="{{ route('package.update', @$package_data->id) }}" method="post" class="form"
                                    enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                @else
                                    <form action="{{ route('package.store') }}" method="post" class="form"
                                        enctype="multipart/form-data">
                                        @csrf
                            @endif
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="name" value="{{ @$package_data->name }}"
                                        class="form-control" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="price">Price</label>
                                    <input type="number" id="price" name="price" value="{{ @$package_data->price }}"
                                        class="form-control" required>
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Category</label>
                                    <div>
                                        <select name="cat_id" id="cat_id" class="form-control">
                                            <option value="" disabled selected hidden>Select package category</option>
                                            @if (isset($category_data))
                                                @foreach (@$category_data as $category => $data)
                                                    <option value="{{ @$category != null ? @$category : '' }}"
                                                        {{ @$package_data->cat_id == $category ? 'selected' : '' }}>
                                                        {{ @$data }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('cat_id')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            @if (isset($package_data))
                                <div class="row">
                                    <div class=" form-group col-md-12">
                                        <label for="status ">Status</label>
                                        <select name="status" id="status" class="form-control form-control-sm">
                                            <option {{ @$package_data->status == 'Active' ? 'selected' : '' }}>Active
                                            </option>
                                            <option {{ @$package_data->status == 'Inactive' ? 'selected' : '' }}>Inactive
                                            </option>
                                        </select>
                                        @error('status')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            @endif
                            <button type="submit" class="btn btn-success float-right" value="Sumbit">Submit</button>
                            <a href="{{ route('package.index') }}" class="btn btn-primary float-right"
                                style="margin-right: 10px" value="Back">Back
                            </a>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
