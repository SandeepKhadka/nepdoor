@extends('layouts.admin')
@section('main-content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="m-0 text-left font-weight-bold" style="padding: 10px">Contact view</small></h4>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="fullName">Full Name</label>
                                    <input type="text" id="fullName" name="fullName" class="form-control" disabled>
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="subject">Subject</label>
                                    <input type="text" id="subject" name="subject" class="form-control"disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="message">Message</label>
                                    <textarea id="message" name="message" class="form-control" style="resize: none; height:120px" disabled></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class=" form-group col-md-12">
                                    <label for="status ">Status</label>
                                    <select type="text" class="form-control form-control-sm" id="status"
                                        name="status" required disabled>
                                        <option>Active</option>
                                        <option>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success float-right" >Submit</button>
                            <a href="{{ url('contact') }}"><button type="submit" class="btn btn-primary float-right" style="margin-right: 10px">Back</button></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
