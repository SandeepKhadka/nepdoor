@extends('layouts.admin')
@section('title' , 'Nepdoor | Subscription Form')
@section('main-content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="m-0 text-left font-weight-bold" style="padding: 10px">Subscription
                        {{ isset($subscription_data) ? 'Update' : 'Add' }}</small></h4>
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                                {{ implode('', $errors->all('<div>:message</div>')) }}
                            @endif
                            @if (isset($subscription_data))
                                <form action="{{ route('subscription.update', @$subscription_data->id) }}" method="post"
                                    class="form" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                @else
                                    <form action="{{ route('subscription.store') }}" method="post" class="form"
                                        enctype="multipart/form-data">
                                        @csrf
                            @endif

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>User</label>
                                    <div>
                                        <select name="user_id" id="user_id" class="form-control">
                                            <option value="" disabled selected hidden>Select user</option>
                                            @if (isset($user_info))
                                                @foreach (@$user_info as $user => $data)
                                                    <option value="{{ @$user != null ? @$user : '' }}"
                                                        {{ @$subscription_data->user_id == $user ? 'selected' : '' }}>
                                                        {{ @$data }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('user_id')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Package</label>
                                    <div>
                                        <select name="package_id" id="package_id" class="form-control">
                                            <option value="" disabled selected hidden>Select package</option>
                                            @if (isset($package_info))
                                                @foreach (@$package_info as $package => $data)
                                                    <option value="{{ @$package != null ? @$package : '' }}"
                                                        {{ @$subscription_data->package_id == $package ? 'selected' : '' }}>
                                                        {{ @$data }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('package_id')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Billing</label>
                                    <div>
                                        <select name="billing_id" id="billing_id" class="form-control">
                                            <option value="" disabled selected hidden>Select billing</option>
                                            @if (isset($billing_info))
                                                @foreach (@$billing_info as $billing => $data)
                                                    <option value="{{ @$billing != null ? @$billing : '' }}"
                                                        {{ @$subscription_data->billing_id == $billing ? 'selected' : '' }}>
                                                        {{ @$data }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('billing_id')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="message">Message</label>
                                    <textarea type="text" id="message" name="message" class="form-control" style="resize: none" rows="5">{{ @$subscription_data->message }}</textarea>
                                    @error('message')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                            @if (isset($subscription_data))
                                <div class="row">
                                    <div class=" form-group col-md-12">
                                        <label for="status ">Status</label>
                                        <select name="status" id="status" class="form-control form-control-sm">
                                            <option {{ @$subscription_data->status == 'Active' ? 'selected' : '' }}>Active
                                            </option>
                                            <option {{ @$subscription_data->status == 'Inactive' ? 'selected' : '' }}>
                                                Inactive
                                            </option>
                                        </select>
                                        @error('status')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            @endif
                            <button type="submit" class="btn btn-success float-right" value="Sumbit">Submit</button>
                            <a href="{{ route('subscription.index') }}" type="submit" class="btn btn-primary float-right"
                                style="margin-right: 10px" value="Back">Back</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
