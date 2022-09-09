@extends('layouts.admin')

@section('main-content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="m-0 text-left font-weight-bold" style="padding: 10px">Contact
                        {{ isset($contact_data) ? 'Update' : 'Add' }}</small></h4>
                    <div class="card">
                        <div class="card-body">
                            @if (isset($contact_data))
                                <form action="{{ route('contact.update', @$contact_data->id) }}" method="post" class="form"
                                    enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                @else
                                    <form action="{{ route('contact.store') }}" method="post" class="form"
                                        enctype="multipart/form-data">
                                        @csrf
                            @endif
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">Full Name</label>
                                    <input type="text" id="name" name="name" value="{{ @$contact_data->name }}"
                                        class="form-control" required>
                                    @error('name')
                                        <span class="alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="subject">Subject</label>
                                    <input type="text" id="subject" name="subject"
                                        value="{{ @$contact_data->subject }}" class="form-control" required>
                                    @error('subject')
                                        <span class="alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="text" id="email" name="email" value="{{ @$contact_data->email }}"
                                        class="form-control" required>
                                    @error('email')
                                        <span class="alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="phone">Phone</label>
                                    <input type="text" id="phone" name="phone" value="{{ @$contact_data->phone }}"
                                        class="form-control" required>
                                    @error('phone')
                                        <span class="alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="message">Message</label>
                                    <textarea id="message" name="message" class="form-control" style="resize: none;" rows="5" required>{{ @$contact_data->message }}</textarea>
                                    @error('message')
                                        <span class="alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            @if (isset($contact_data))
                                <div class="row">
                                    <div class=" form-group col-md-12">
                                        <label for="status ">Status</label>
                                        <select type="text" class="form-control form-control-sm" id="status"
                                            name="status" required>
                                            <option {{ @$contact_data->status == 'Active' ? 'selected' : '' }}>Active
                                            </option>
                                            <option {{ @$contact_data->status == 'Inactive' ? 'selected' : '' }}>Inactive
                                            </option>
                                        </select>
                                        @error('status')
                                            <span class="alert-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            @endif
                            <button type="submit" class="btn btn-success float-right" value="Sumbit">Submit</button>
                            <a href="{{ route('contact.index') }}" class="btn btn-primary float-right"
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
