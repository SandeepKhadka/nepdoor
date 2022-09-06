@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="margin-top: 8px">Reply List</h3>
                        <a href="{{ url('replyForm') }}" class="btn btn-primary" style="margin-left:947px;";>
                            Add
                        </a>
                        {{-- <button href="{{url('packageList')}}" class='btn btn-primary' style="margin-left: 949px">Add</button> --}}
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id= "searching" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">P.N.</th>
                                    <th>Ticket(id)</th>
                                    <th>Message</th>
                                    <th style="width: 90px">Status</th>
                                    <th style="width: 150px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>Update software</td>
                                    <td>{{ Str::limit('Dummy data Dummy data Dummy data Dummy data Dummy data Dummy data Dummy data', 20) }}</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td><a href="#"><button class="btn btn-danger" style="margin-right: 10px"><i
                                                    class="fa fa-trash"></button></i></a>
                                        <a href="{{ url('replyView') }}"><button class="btn btn-primary" style="margin-right: 10px"><i
                                                    class="fa fa-eye"></button></i></a>
                                        <a href="{{ url('replyForm') }}"><button class="btn btn-success"style="margin-right: 10px"><i
                                                    class="fa fa-pencil"></button></i></a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
@endsection
