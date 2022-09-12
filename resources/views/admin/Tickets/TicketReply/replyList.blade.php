@extends('layouts.admin')
@section('title', 'Nepdoor | Ticket Reply List')
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="margin-top: 8px; font-weight: bold">Ticket Reply</h3>
                        <a href="{{ route('reply.create') }}" class="btn btn-success float-right" style="margin-bottom: 0px"><i
                                class="fa fa-plus" style="font-size: 12px">
                                Add Ticket Reply
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
                                    <th style="width: 150px">Ticket ID</th>
                                    <th>Message</th>
                                    <th style="width: 150px">Status</th>
                                    <th style="width: 190px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($reply_data))
                                    @foreach ($reply_data as $reply)
                                        <tr>
                                            <td>1.</td>
                                            <td>
                                                @if (isset($reply->ticket_info['token_id']))
                                                    {{ $reply->ticket_info['token_id'] }}
                                                @else
                                                    --
                                                @endif
                                            </td>
                                            <td>{{ Str::limit($reply->message, 30) }}</td>
                                            <td><span
                                                    class="{{ @$reply->status == 'Active' ? 'badge bg-success' : 'badge bg-danger' }}">{{ $reply->status }}
                                            </td>
                                            <td>
                                                <a href="{{ route('reply.show', $reply->id) }}" class="btn btn-primary">
                                                    <i class="fa fa-eye">

                                                    </i>
                                                </a>
                                                <a href="{{ route('reply.edit', $reply->id) }}" class="btn btn-success">
                                                    <i class="fa fa-pen">

                                                    </i>
                                                </a>
                                                <form action="{{ route('reply.destroy', $reply->id) }}" method="post"
                                                    class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger"
                                                        onclick="return confirm('Do you want to delete this reply?');"><i
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
