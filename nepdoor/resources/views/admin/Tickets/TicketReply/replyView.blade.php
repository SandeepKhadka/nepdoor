@extends('layouts.admin')
@section('main-content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="m-0 text-left font-weight-bold" style="padding: 10px">Ticket Reply Form</small></h4>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="inputName">Ticket ID</label>
                                    <input type="text" id="inputName" class="form-control" disabled>
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="inputName">Message</label>
                                    <textarea type="number" id="inputName" class="form-control" rows="5" disabled>
                                    </textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class=" form-group col-md-12">
                                    <label for="status ">Status</label>
                                    <select type="text" class="form-control form-control-sm" id="status" disabled
                                        name="status" ; required>
                                        <option>Active</option>
                                        <option>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success float-right" value="Submit">Submit</button>
                            <a href="{{ url('replyList') }}"><button type="submit" class="btn btn-primary float-right" style="margin-right: 10px" value="Back">Back</button></a>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
