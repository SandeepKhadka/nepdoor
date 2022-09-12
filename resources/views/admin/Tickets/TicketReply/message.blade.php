@extends('layouts.admin')
@section('title', 'Nepdoor | Ticket View')
@section('main-content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="m-0 text-left font-weight-bold" style="padding: 10px">Reply Ticket Message</h4>
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('reply.store') }}" method="post" class="form"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>Title</label>
                                        <input type="text" class="form-control" value="{{ @$ticket_data->title }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>User</label>
                                        <div>
                                            <select class="form-control" disabled>
                                                @if (isset($user_info))
                                                    @foreach (@$user_info as $user => $data)
                                                        <option value="{{ @$user != null ? @$user : '' }}"
                                                            {{ @$tickets_data->user_id == $user ? 'selected' : '' }}>
                                                            {{ @$data }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="ticket_id">Token ID</label>
                                        <input type="text" id="ticket_id" name="ticket_id" class="form-control"
                                            value="{{ @$ticket_data->token_id }}" readonly>
                                        @error('ticket_id')
                                            <span class="alert-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>Priority</label>
                                        <select type="text" class="form-control form-control-sm" disabled>
                                            <option {{ @$ticket_data->priority == 'Normal' ? 'selected' : '' }}>Normal
                                            </option>
                                            <option {{ @$ticket_data->priority == 'Urgent' ? 'selected' : '' }}>Urgent
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="message">Message</label>
                                        <textarea type="text" class="form-control" rows="5" disabled
                                            style="resize: none;">{{ @$ticket_data->message }}
                                        </textarea>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="message">Message</label>
                                        <textarea type="text" class="form-control" rows="5" name="message" id="message" required
                                            style="resize: none;">
                                        </textarea>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success float-right" value="Sumbit">Reply</button>
                                <a href="{{ route('ticket.index') }}" class="btn btn-primary float-right"
                                    style="margin-right: 10px" value="Back">Back
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
