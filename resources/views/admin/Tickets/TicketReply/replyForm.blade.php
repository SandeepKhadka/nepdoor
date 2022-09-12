@extends('layouts.admin')
@section('title' , 'Nepdoor | Ticket Reply Form')
@section('main-content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="m-0 text-left font-weight-bold" style="padding: 10px">Ticket Reply
                        {{ isset($reply_data) ? 'Update' : 'Add' }}</h4>
                    <div class="card">
                        <div class="card-body">
                            @if (isset($reply_data))
                                <form action="{{ route('reply.update', @$reply_data->id) }}" method="post" class="form"
                                    enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                @else
                                    <form action="{{ route('reply.store') }}" method="post" class="form"
                                        enctype="multipart/form-data">
                                        @csrf
                            @endif
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Ticket</label>
                                    <div>
                                        <select name="ticket_id" id="ticket_id" class="form-control">
                                            <option value="" disabled selected hidden>Select token no</option>
                                            @if (isset($ticket_info))
                                                @foreach (@$ticket_info as $ticket => $data)
                                                    <option value="{{ @$ticket != null ? @$ticket : '' }}"
                                                        {{ @$ticket_data->ticket_id == $ticket ? 'selected' : '' }}>
                                                        {{ @$data }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('ticket_id')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="message">Message</label>
                                    <textarea type="text" id="message" name="message" class="form-control" style="resize: none;" rows="5"
                                        required>{{ @$reply_data->message }}
                                    </textarea>
                                    @error('message')
                                        <span class="alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            @if (isset($reply_data))
                                <div class="row">
                                    <div class=" form-group col-md-12">
                                        <label for="status ">Status</label>
                                        <select type="text" class="form-control form-control-sm" id="status"
                                            name="status">
                                            <option {{ @$reply_data->status == 'Active' ? 'selected' : '' }}>Active
                                            </option>
                                            <option {{ @$reply_data->status == 'Inactive' ? 'selected' : '' }}>Inactive
                                            </option>
                                        </select>
                                        @error('status')
                                            <span class="alert-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            @endif
                            <button type="submit" class="btn btn-success float-right" value="Sumbit">Submit</button>
                            <a href="{{ route('reply.index') }}" class="btn btn-primary float-right"
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
