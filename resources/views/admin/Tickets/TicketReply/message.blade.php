@extends('layouts.admin')
@section('title', 'Nepdoor | Ticket View')
@section('main-content')
    {{-- <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="m-0 text-left font-weight-bold" style="padding: 10px">Reply Ticket Message</h4>
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('ticket.store') }}" method="post" class="form"
                                enctype="multipart/form-data">
                                @csrf
                                @if ($errors->any())
                                    {{ implode('', $errors->all('<div>:message</div>')) }}
                                @endif
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name="title" value="{{ @$ticket_data->title }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>User</label>
                                        <div>
                                            <select class="form-control" name="user_id">
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
                                        <select type="text" class="form-control form-control-sm" style="pointer-events: none;" name="priority">
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
                                        <textarea type="text" class="form-control" rows="5" disabled style="resize: none;">{{ @$ticket_data->message }}
                                        </textarea>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="message">Reply Message</label>
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
    </div> --}}
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-sm">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0 text-center">All Tickets</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            @if (isset($ticket_title) && $ticket_title != null)
                <div class="container-sm w-50">
                    <div class="row">
                        <div class="col lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title" style="font-weight: bold">
                                        {{ isset($ticket_title) ? $ticket_title : '' }}
                                    </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                {{-- @endif
                                        @endforeach
                                        @endif --}}
                                <div class="card-body" id="msgBody"
                                    style="height: 400px; overflow-y: scroll; overflow-x: hidden">
                                    <div class="row">
                                        <div class="col lg-12">
                                            <div>
                                                <div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div>
                                                                {{-- @if (auth()->user()->role == 'customer') --}}
                                                                @foreach ($ticket_message as $message)
                                                                @if (isset($message) && $message->message != null)
                                                                    @if (auth()->user()->id == $message->user_id)
                                                                        <div style="text-align: right;">
                                                                            <p
                                                                                style="background-color:lightblue; word-wrap:break-word; display:inline-block;
                                                                                    padding:5px; border-radius:10px; max-width:70%; margin: 5px">
                                                                                {{ $message->message }}
                                                                            </p>

                                                                        </div>
                                                                    @endif
                                                                    @if ($message->user_id != 1)
                                                                        <div style="text-align: left;">
                                                                            <p
                                                                                style="background-color:yellow; word-wrap:break-word; display:inline-block;
                                                                            padding:5px; border-radius:10px; max-width:70%">
                                                                                {{ $message->message }}
                                                                            </p>

                                                                        </div>
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col lg-12">
                                        <div class="card" style="margin-bottom: 1px">
                                            <div class="card-body ">
                                                {{-- {{dd($message->title)}} --}}
                                                <form action="{{ route('storeTicketReply', $token_id) }}"
                                                    method="post">
                                                    @csrf
                                                    @if ($errors->any())
                                                        {{ implode('', $errors->all('<div>:message</div>')) }}
                                                    @endif
                                                    <div class="row">
                                                        <input type="text" name="title"
                                                            value="{{ $ticket_title }}" hidden>
                                                        <input type="text" name="priority"
                                                            value="{{ $priority }}" hidden>
                                                        <div class="col-lg-11">
                                                            <textarea type="text" id="message" name="message" class="form-control" rows="1" required
                                                                style=" resize: none ;background-color:#ffffff; border-radius: 12px 15px 15px 12px; font-size:13px; border: 1px solid black"></textarea>

                                                            @error('message')
                                                                <span class="invalid-feedback"
                                                                    role="alert">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-lg-1">
                                                            <button type="submit"
                                                                class="btn btn-primary px-2">Reply</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <h5 class="text-center">There is no ticket created</h5>
            @endif

            {{-- @endif
                @endforeach
                @if (!isset($message))
                    <h4 class="text-center">There is no tickets created</h4>
                @endif
            @else
                <h4 class="text-center">There is no tickets created</h4>
            @endif --}}
        </div>
    </div>
@endsection
