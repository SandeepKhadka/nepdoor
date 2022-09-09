@extends('layouts.admin')
@section('main-content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="m-0 text-left font-weight-bold" style="padding: 10px">Activity View</small></h4>
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>User</label>
                                    <div>
                                        <select name="user_id" id="user_id" class="form-control" disabled>
                                            <option value="" disabled selected hidden>Select user</option>
                                            @if (isset($user_info))
                                                @foreach (@$user_info as $user => $data)
                                                    <option value="{{ @$user != null ? @$user : '' }}"
                                                        {{ @$activity_data->user_id == $user ? 'selected' : '' }}>
                                                        {{ @$data }}</option>
                                                @endforeach
                                                @error('user_id')
                                                    <span class="alert-danger">{{ $message }}</span>
                                                @enderror
                                            @endif
                                        </select>
                                        @error('user_id')
                                            <span class="alert-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="title">Title</label>
                                        <input type="text" id="title" name="title" class="form-control"
                                            value="{{ @$activity_data->title }}" disabled>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="content">Content</label>
                                        <textarea type="text" id="content" name="content" class="form-control" rows="5" disabled>{{ @$activity_data->content }}
                                    </textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="created_at">Created at</label>
                                        <input type="datetime-local" id="created_at" name="created_at" class="form-control"
                                            rows="5" value="{{ @$activity_data->created_at }}" disabled>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="updated_at">Updated at</label>
                                        <input type="datetime-local" id="updated_at" name="updated_at" class="form-control"
                                            rows="5" value="{{ @$activity_data->updated_at }}" disabled>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class=" form-group col-md-12">
                                        <label for="status">Status</label>
                                        <input type="text" id="status" name="status" class="form-control"
                                            value="{{ @$activity_data->status }}" disabled>

                                    </div>
                                </div>
                                <a href="{{ route('activity.index') }}" class="btn btn-primary float-right"
                                    style="margin-right: 10px" value="Back">Back
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endsection
