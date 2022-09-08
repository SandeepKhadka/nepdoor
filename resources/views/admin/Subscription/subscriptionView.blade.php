@extends('layouts.admin')
@section('main-content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="m-0 text-left font-weight-bold" style="padding: 10px">Subscription View</small></h4>
                    <div class="card">
                        <div class="card-body">
                            @if (isset($subscription))
                                <form action="{{ route('subscription.store') }}" method="post" class="form"
                                    enctype="multipart/form-data">
                                    @csrf
                            @endif

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>User</label>
                                    <div>
                                        <select name="user_id" id="user_id" class="form-control" disabled>
                                            <option value="" disabled selected hidden>Select user</option>
                                            @if (isset($user_info))
                                                @foreach (@$user_info as $user => $data)
                                                    <option value="{{ @$user != null ? @$user : '' }}"
                                                        {{ @$subscription_data->user_id == $user ? 'selected' : '' }}>
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

                                <div class="form-group col-md-6">
                                    <label>Package</label>
                                    <div>
                                        <select name="package_id" id="package_id" class="form-control" disabled>
                                            <option value="" disabled selected hidden>Select package</option>
                                            @if (isset($package_info))
                                                @foreach (@$package_info as $package => $data)
                                                    <option value="{{ @$package != null ? @$package : ''  }}"
                                                        {{ @$subscription_data->package_id == $package ? 'selected' : '' }}>
                                                        {{ @$data }}</option>
                                                @endforeach
                                                @error('package_id')
                                                    <span class="alert-danger">{{ $message }}</span>
                                                @enderror
                                            @endif
                                        </select>
                                        @error('package_id')
                                            <span class="alert-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Billing</label>
                                    <div>
                                        <select name="billing_id" id="billing_id" class="form-control" disabled>
                                            <option value="" disabled selected hidden>Select billing</option>
                                            @if (isset($billing_info))
                                                @foreach (@$billing_info as $billing => $data)
                                                    <option value="{{ @$billing != null ? @$billing : '' }}"
                                                        {{ @$subscription_data->billing_id == $billing ? 'selected' : '' }}>
                                                        {{ @$data }}</option>
                                                @endforeach
                                                @error('billing_id')
                                                    <span class="alert-danger">{{ $message }}</span>
                                                @enderror
                                            @endif
                                        </select>
                                        @error('billing_id')
                                            <span class="alert-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="start_date">Start Date</label>
                                    <input type="date" id="start_date" name="start_date" class="form-control"
                                        rows="5" value="{{ @$subscription_data->start_date }}" disabled>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="end_date">End Date</label>
                                    <input type="date" id="end_date" name="end_date" class="form-control"
                                        rows="5" value="{{ @$subscription_data->end_date }}" disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="updated_at">Updated at</label>
                                    <input type="datetime-local" id="updated_at" name="updated_at" class="form-control"
                                        rows="5" value="{{ @$subscription_data->updated_at }}" disabled>
                                </div>
                            </div>


                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="message">Message</label>
                                    <textarea type="text" id="message" name="message" class="form-control" style="resize: none"
                                         rows="5" disabled>{{ @$subscription_data->message }}</textarea>
                                    @error('message')
                                        <span class="alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class=" form-group col-md-12">
                                    <label for="status ">Status</label>
                                    <select type="text" class="form-control form-control-sm" id="status"
                                        name="status" disabled>
                                        <option {{ @$subscription_data->status == 'Active' ? 'selected' : '' }}>Active
                                        </option>
                                        <option {{ @$subscription_data->status == 'Inactive' ? 'selected' : '' }}>
                                            Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <a href="{{ route('subscription.index') }}"><button type="submit"
                                    class="btn btn-primary float-right" style="margin-right: 10px"
                                    value="Back">Back</button></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
