@extends('layouts.admin')
@section('title', 'Nepdoor | Contact View')
@section('main-content')
    {{-- BreadCrumb  --}}
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('contact.index') }}">Contact</a></li>
            <li class="breadcrumb-item active" aria-current="reply">View</li>
        </ol>
    </nav>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="m-0 text-left font-weight-bold" style="padding: 10px">Contact View
                        </small></h4>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">Full Name</label>
                                    <input type="text" id="name" name="name" value="{{ @$contact_data->name }}"
                                        class="form-control" disabled>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="subject">Subject</label>
                                    <input type="text" id="subject" name="subject"
                                        value="{{ @$contact_data->subject }}" class="form-control" disabled>
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="text" id="email" name="email" value="{{ @$contact_data->email }}"
                                        class="form-control" disabled>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="phone">Phone</label>
                                    <input type="text" id="phone" name="phone" value="{{ @$contact_data->phone }}"
                                        class="form-control" disabled>
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="message">Message</label>
                                    <textarea id="message" name="message" class="form-control" style="resize: none;" rows="5" disabled>{{ @$contact_data->message }}</textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class=" form-group col-md-12">
                                    <label for="status ">Status</label>
                                    <input type="text" id="status" name="status" value="{{ @$contact_data->status }}"
                                        class="form-control" disabled>
                                </div>
                            </div>
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
