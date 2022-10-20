@extends('layouts.admin')
@section('title', 'Nepdoor | HelpCenter List')
@section('main-content')
    {{-- BreadCrumb --}}
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="reply">Help Center</li>
        </ol>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="margin-top: 8px; font-weight:bold;">Help Center</h3>
                        <a href="{{ route('helpCenter.create') }}" class="btn btn-success float-right"
                            style="margin-bottom: 0px"><i class="fa fa-plus" style="font-size: 12px;">
                                Add Help Post
                            </i>
                        </a>
                        {{-- <button href="{{url('packageList')}}" class='btn btn-primary' style="margin-left: 949px">Add</button> --}}
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">S.N.</th>
                                    <th>Title</th>
                                    <th>Link</th>
                                    <th style="width: 90px">Order ID</th>
                                    <th style="width: 90px">Status</th>
                                    <th style="width: 190px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($helpCenter_data))
                                    @foreach ($helpCenter_data as $helpCenters => $helpCenter)
                                        {{-- {{ dd($helpCenter) }} --}}
                                        <tr>
                                            <td>{{ $helpCenters + 1 }}</td>
                                            <td>{{ $helpCenter->title }}</td>
                                            <td>{{ $helpCenter->link }}</td>
                                            <td>{{ $helpCenter->order_id }}</td>
                                            <td><span
                                                    class="{{ @$helpCenter->status == 'Active' ? 'badge bg-success' : 'badge bg-danger' }}">{{ $helpCenter->status }}</span>
                                            </td>
                                            <td>
                                                <a href="{{ route('helpCenter.show', $helpCenter->id) }}"
                                                    class="btn btn-primary">
                                                    <i class="fa fa-eye"></button>

                                                    </i>
                                                </a>
                                                <a href="{{ route('helpCenter.edit', $helpCenter->id) }}"
                                                    class="btn btn-success">
                                                    <i class="fa fa-pen">

                                                    </i>
                                                </a>
                                                <form action="{{ route('helpCenter.destroy', $helpCenter->id) }}"
                                                    method="post" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger"
                                                        onclick="return confirm('Do you want to delete this activity?');"><i
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
