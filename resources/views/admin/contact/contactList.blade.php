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
                        <table id= "searching" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">C.N.</th>
                                    <th>Full Name</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th style="width: 90px">Status</th>
                                    <th style="width: 50px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>Update software</td>
                                    <td><span class="badge bg-danger">55%</span></td>
                                    <td>{{ Str::limit('Dummy data Dummy data Dummy data Dummy data Dummy data Dummy data Dummy data', 20) }}</td>
                                    <td><span class="badge bg-danger">55%</span></td>
                                    <td><a href="#"><i class="fa fa-trash" style="margin-right: 15px"></i></a>
                                        <a href="{{ url('contactView') }}"><i class="fa fa-eye"></i></a>
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