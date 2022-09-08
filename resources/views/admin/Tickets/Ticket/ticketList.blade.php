@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="margin-top: 8px; font-weight: bold;">Tickets</h3>
                        <a href="{{ route('ticket.create') }}" class="btn btn-success float-right"
                            style="margin-bottom: 0px"><i class="fa fa-plus" style="font-size: 12px">
                                Add Ticket
                            </i>
                        </a>
                        {{-- <button href="{{url('packageList')}}" class='btn btn-primary' style="margin-left: 949px">Add</button> --}}
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="searching" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">S.N.</th>
                                    <th>Title</th>
                                    <th>Subscription</th>
                                    <th>Priority</th>
                                    <th>Ticket Status</th>
                                    <th style="width: 90px">Status</th>
                                    <th style="width: 190px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($ticket_data))
                                    @foreach ($ticket_data as $ticket)
                                        <tr>
                                            <td>1.</td>
                                            <td>{{ $ticket->title }}</td>
                                            <td>{{ $ticket->subs_id }}</td>
                                            <td>{{ $ticket->priority }}</td>
                                            <td><span class="{{@$ticket->ticket_status == 'Opened' ? 'badge bg-success': 'badge bg-danger'}}">{{ $ticket->ticket_status }}</td>
                                            <td><span class="{{@$ticket->status == 'Active' ? 'badge bg-success': 'badge bg-danger'}}">{{ $ticket->status }}</td>
                                            <td>
                                                <a href="{{ route('ticket.show', $ticket->id) }}" class="btn btn-primary">
                                                    <i class="fa fa-eye"></button>

                                                    </i>
                                                </a>
                                                <a href="{{ route('ticket.edit', $ticket->id) }}" class="btn btn-success">
                                                    <i class="fa fa-pen">

                                                    </i>
                                                </a>
                                                <form action="{{ route('ticket.destroy', $ticket->id) }}" method="post"
                                                    class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger"
                                                        onclick="return confirm('Do you want to delete this ticket?');"><i
                                                            class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
@endsection
