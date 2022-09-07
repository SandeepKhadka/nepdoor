@extends('layouts.admin')
@section('main-content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="m-0 text-left font-weight-bold" style="padding: 10px">Activity Form</small></h4>
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                                {{ implode('', $errors->all('<div>:message</div>')) }}
                            @endif
                            @if (isset($activity_data))
                                <form action="{{ route('activity.update', @$activity_data->id) }}" method="post"
                                    class="form" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                @else
                                    <form action="{{ route('activity.store') }}" method="post" class="form"
                                        enctype="multipart/form-data">
                                        @csrf
                            @endif
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="user_id">User</label>
                                    <input type="text" id="user_id" name="user_id" class="form-control"
                                        value="{{ @$activity_data->user_id }}"required>
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="title">Title</label>
                                    <input type="text" id="title" name="title" class="form-control"
                                        value="{{ @$activity_data->title }}" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="content">Content</label>
                                    <textarea type="text" id="content" name="content" class="form-control" rows="5">{{ @$activity_data->content }}
                                    </textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class=" form-group col-md-12">
                                    <label for="status ">Status</label>
                                    <select type="text" class="form-control form-control-sm" id="status"
                                        name="status" required>
                                        <option {{ @$activity_data->status == 'Active' ? 'selected' : '' }}>Active</option>
                                        <option {{ @$activity_data->status == 'Inactive' ? 'selected' : '' }}>Inactive
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success float-right" value="Sumbit">Submit</button>
                            <a href="{{ route('activity.index') }}" class="btn btn-primary float-right"
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
