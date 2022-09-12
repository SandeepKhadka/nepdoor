@extends('layouts.admin')
@section('title' , 'Nepdoor | Ticket Reply View')
@section('main-content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="m-0 text-left font-weight-bold" style="padding: 10px">Ticket Reply View
                        </small></h4>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="ticket_id">Ticket ID</label>
                                    <input type="text" id="ticket_id" name="ticket_id" disabled class="form-control"
                                        value="{{ @$reply_data->ticket_id }}">
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="message">Message</label>
                                    <textarea type="text" id="message" name="message" class="form-control" style="resize: none;" rows="5"
                                        disabled>{{ @$reply_data->message }}
                                    </textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class=" form-group col-md-12">
                                    <label for="status ">Status</label>
                                    <input type="text" id="status" name="status" disabled class="form-control"
                                        value="{{ @$reply_data->status }}">
                                </div>
                            </div>
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
