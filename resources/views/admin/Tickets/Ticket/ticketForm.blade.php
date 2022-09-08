@extends('layouts.admin')
@section('main-content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="m-0 text-left font-weight-bold" style="padding: 10px">Ticket
                        {{ isset($ticket_data) ? 'Update' : 'Add' }}</small></h4>
                    <div class="card">
                        <div class="card-body">
                            @if (isset($ticket_data))
                                <form action="{{ route('ticket.update', @$ticket_data->id) }}" method="post" class="form"
                                    enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                @else
                                    <form action="{{ route('ticket.store') }}" method="post" class="form"
                                        enctype="multipart/form-data">
                                        @csrf
                            @endif
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="title">Title</label>
                                    <input type="text" id="title" name="title" class="form-control"
                                        value="{{ @$ticket_data->title }}" required>
                                    @error('title')
                                        <span class="alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="subs_id">Subscription</label>
                                    <select type="text" class="form-control form-control-sm" id="subs_id"
                                        name="subs_id" required>
                                        <option></option>
                                    </select>
                                    @error('subs_id')
                                        <span class="alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="token_id">Token ID</label>
                                    <input type="text" id="token_id" name="token_id" class="form-control"
                                        value="{{ @$ticket_data->token_id }}" required>
                                    @error('token_id')
                                        <span class="alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="priority">Priority</label>
                                    <select type="text" class="form-control form-control-sm" id="priority"
                                        name="priority" required>
                                        <option {{ @$ticket_data->priority == 'Normal' ? 'selected' : '' }}>Normal
                                        </option>
                                        <option {{ @$ticket_data->priority == 'Urgent' ? 'selected' : '' }}>Urgent
                                        </option>
                                    </select>
                                    @error('priority')
                                        <span class="alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="message">Message</label>
                                    <textarea type="text" id="message" name="message" class="form-control" rows="5" required
                                        style="resize: none;">{{ @$ticket_data->message }}</textarea>
                                    @error('message')
                                        <span class="alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            @if (isset($ticket_data))
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="ticket_status">Ticket Status</label>
                                        <select type="text" class="form-control form-control-sm" id="ticket_status"
                                            name="ticket_status" required>
                                            <option {{ @$ticket_data->ticket_status == 'Opened' ? 'selected' : '' }}>
                                                Opened</option>
                                            <option {{ @$ticket_data->ticket_status == 'Closed' ? 'selected' : '' }}>Closed
                                            </option>
                                        </select>
                                        @error('ticket_status')
                                            <span class="alert-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="status">Status</label>
                                        <select type="text" class="form-control form-control-sm" id="status"
                                            name="status" required>
                                            <option {{ @$ticket_data->status == 'Active' ? 'selected' : '' }}>Active
                                            </option>
                                            <option {{ @$ticket_data->status == 'Inactive' ? 'selected' : '' }}>Inactive
                                            </option>
                                        </select>
                                        @error('status')
                                            <span class="alert-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            @endif
                            <button type="submit" class="btn btn-success float-right" value="Sumbit">Submit</button>
                            <a href="{{ route('ticket.index') }}" class="btn btn-primary float-right"
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
