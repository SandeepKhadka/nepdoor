@extends('layouts.admin')
@section('main-content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="m-0 text-left font-weight-bold" style="padding: 10px">Ticket Form</small></h4>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="token_id">Token</label>
                                    <input type="text" id="token_id" name="token_id" class="form-control" value="{{ @$ticket_data->token_id }}" disabled>
                                   
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="subs_id">Subscription </label>
                                    <input type="text" id="subs_id" name="subs_id" class="form-control" value="{{ @$ticket_data->subs_id }}" disabled>
                                   
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="title">Title</label>
                                    <input type="text" id="title" name="title" class="form-control" value="{{ @$ticket_data->title }}" disabled>
                                   
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="priority">Priority</label>
                                    <input type="text" id="priority" name="priority" class="form-control" value="{{ @$ticket_data->priority }}" disabled>
                                    
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="message">Message</label>
                                    <textarea type="text" id="message" name="message" class="form-control" rows="5" disabled style="resize:none;">{{ @$ticket_data->message }}</textarea>
                                   
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="ticket_status">Ticket Status</label>
                                    <input type="text" id="ticket_status" name="ticket_status" class="form-control" value="{{ @$ticket_data->ticket_status }}" disabled>
                                    
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="status">Status</label>
                                    <input type="text" id="status" name="status" class="form-control" value="{{ @$ticket_data->status }}" disabled>
                                   
                                </div>
                            </div>
                            <a href="{{ route('ticket.index') }}" class="btn btn-primary float-right"
                                style="margin-right: 10px" value="Back">Back
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
