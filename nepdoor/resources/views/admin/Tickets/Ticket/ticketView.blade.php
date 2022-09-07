@extends('layouts.admin')
@section('main-content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="m-0 text-left font-weight-bold" style="padding: 10px">Ticket view</small></h4>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="inputName">Ticket ID</label>
                                    <input type="number" id="inputName" class="form-control" disabled>
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="inputName">Subscription ID</label>
                                    <input type="number" id="inputName" class="form-control" disabled>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputName">Title</label>
                                    <input type="text" id="inputName" class="form-control" disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="inputName">Priority</label>
                                    <input type="text" id="inputName" class="form-control" disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="inputName">Message</label>
                                    <textarea type="text" id="inputName" class="form-control" rows="5" disabled></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="status">Ticket Status</label>
                                    <select type="text" class="form-control form-control-sm" id="status"
                                        name="status" disabled required>
                                        <option>Open</option>
                                        <option>Closed</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="status ">Status</label>
                                    <select type="text" class="form-control form-control-sm" id="statusTwo"
                                        name="statusTwo" disabled required>
                                        <option>Active</option>
                                        <option>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success float-right" value="Submit">Submit</button>
                            <a href="{{ url('ticketList') }}"><button type="submit" class="btn btn-primary float-right" style="margin-right: 10px" value="Back">Back</button></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
