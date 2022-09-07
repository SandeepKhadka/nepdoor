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
                                <div class="form-group col-md-12">
                                    <label for="user_id">User</label>
                                    <input type="text" id="user_id" name="user_id" class="form-control" value="{{ @$activity_data->user_id }}" disabled>
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="title">Title</label>
                                    <input type="text" id="title" name="title" class="form-control" value="{{ @$activity_data->title }}"  disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="content">Content</label>
                                    <textarea type="text" id="content" name="content" class="form-control" rows="5" disabled >{{ @$activity_data->content }}
                                    </textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class=" form-group col-md-12">
                                    <label for="status">Status</label>
                                    <input type="text" id="status" name="status" class="form-control" value="{{ @$activity_data->status }}"  disabled>
                                      
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
