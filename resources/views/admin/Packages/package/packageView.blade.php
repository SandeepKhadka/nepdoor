@extends('layouts.admin')
@section('main-content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="m-0 text-left font-weight-bold" style="padding: 10px">Package View</small></h4>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="name" value="{{ @$package_data->name }}"
                                        class="form-control" disabled>
                                    @error('name')
                                        <span class="alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="price">Price</label>
                                    <input type="number" id="price" name="price" value="{{ @$package_data->price }}"
                                        class="form-control" disabled>
                                    @error('price')
                                        <span class="alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Category</label>
                                    <div>
                                        <select name="cat_id" id="cat_id" class="form-control" disabled>
                                            <option value="" disabled selected hidden>Select package category</option>
                                            @if (isset($cat_info))
                                                @foreach (@$cat_info as $category => $data)
                                                    <option value="{{ @$category != null ? @$category : '' }}"
                                                        {{ @$package_data->cat_id == $category ? 'selected' : '' }}>
                                                        {{ @$data }}</option>
                                                @endforeach
                                                @error('cat_id')
                                                    <span class="alert-danger">{{ $message }}</span>
                                                @enderror
                                            @endif
                                        </select>
                                        @error('cat_id')
                                            <span class="alert-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="created_at">Created at</label>
                                    <input type="datetime-local" id="created_at" name="created_at" class="form-control" rows="5"
                                        value="{{ @$package_data->created_at }}" disabled>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="updated_at">Updated at</label>
                                    <input type="datetime-local" id="updated_at" name="updated_at" class="form-control"
                                        rows="5" value="{{ @$package_data->updated_at }}" disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class=" form-group col-md-12">
                                    <label for="status ">Status</label>
                                    <select name="status" id="status" class="form-control form-control-sm" disabled>
                                        <option {{ @$package_data->status == 'Active' ? 'selected' : '' }}>Active</option>
                                        <option {{ @$package_data->status == 'Inactive' ? 'selected' : '' }}>Inactive
                                        </option>
                                    </select>
                                    @error('status')
                                        <span class="alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
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
