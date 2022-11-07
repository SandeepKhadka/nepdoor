@extends('layouts.admin')
@section('title', 'Nepdoor | Activity View')
@section('styles')
    <style>
        .slidecontainer {
            width: 100%;
        }

        .slider {
            -webkit-appearance: none;
            width: 100%;
            height: 25px;
            background: #d3d3d3;
            outline: none;
            opacity: 0.7;
            -webkit-transition: .2s;
            transition: opacity .2s;
        }

        .slider:hover {
            opacity: 1;
        }

        .slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 25px;
            height: 25px;
            background: #04AA6D;
            cursor: pointer;
        }

        .slider::-moz-range-thumb {
            width: 25px;
            height: 25px;
            background: #04AA6D;
            cursor: pointer;
        }
    </style>
@endsection
@section('scripts')
    <script>
        document.getElementById('progressTracker').innerHTML = document.getElementById("progress").value

        function updateSlider() {
            document.getElementById('progressTracker').innerHTML = document.getElementById("progress").value
        }
    </script>
@endsection
@section('main-content')
    {{-- BreadCrumb --}}
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('activity.index') }}">Activity</a></li>
            <li class="breadcrumb-item active" aria-current="reply">View</li>
        </ol>
    </nav>
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
                                            @endif
                                        </select>
                                        @error('user_id')
                                            <span class="alert-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
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
                                <div class="form-group col-md-6">
                                    <div class="slidecontainer">
                                        <label for="progress">Progress</label>
                                        <input type="range" min="0" max="100" class="slider" id="progress"
                                            value="{{ @$activity_data->progress }}" disabled name="progress"
                                            onchange="updateSlider()" oninput="updateSlider()">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="slidecontainer">
                                        <label for="progress">Value</label>
                                        <p id="progressTracker"></p>
                                    </div>
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
