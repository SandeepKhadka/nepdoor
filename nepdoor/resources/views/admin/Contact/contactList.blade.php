@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="margin-top: 8px">Contact</h3>
                        {{-- <button class='btn btn-primary' style="margin-left: 949px">Add</button> --}}
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="searching" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">C.N.</th>
                                    <th>Full Name</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th style="width: 60px">Status</th>
                                    <th style="width: 100px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>Update software</td>
                                    <td>Topic</td>
                                    <td>{{ Str::limit('Dummy data Dummy data Dummy data Dummy data Dummy data Dummy data Dummy data', 20) }}
                                    </td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    {{-- <td><span class="badge bg-warning">Inctive</span></td> --}}
                                    <td><a href="#"><button class="btn btn-danger"style="margin-right: 10px"><i
                                                    class="fa fa-trash"></button></i></a>
                                        <a href="{{ url('contactView') }}"><button class="btn btn-primary"><i
                                                    class="fa fa-eye"></button></i></a>
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
