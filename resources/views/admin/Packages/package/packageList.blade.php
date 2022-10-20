@extends('layouts.admin')
@section('title', 'Nepdoor | Package List')
@section('main-content')
    {{-- BreadCrumb  --}}
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('package.index') }}">Package</a></li>
            <li class="breadcrumb-item active" aria-current="reply">Packages</li>
        </ol>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="margin-top: 8px; font-weight: bold">Packages</h3>
                        <a href="{{ route('package.create') }}" class="btn btn-success float-right"
                            style="margin-bottom: 0px"><i class="fa fa-plus" style="font-size: 12px">
                                Add Package
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
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th style="width: 90px">Status</th>
                                    <th style="width: 190px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($package_data))
                                    @foreach ($package_data as $packages => $package)
                                        <tr>
                                            <td>{{ $packages + 1 }}</td>
                                            <td>{{ $package->name }}</td>
                                            <td>
                                                @if (isset($package->cat_info['title']))
                                                    {{ $package->cat_info['title'] }}
                                                @else
                                                    --
                                                @endif
                                            </td>
                                            <td>${{ $package->price }}</td>
                                            <td><span
                                                    class="{{ @$package->status == 'Active' ? 'badge bg-success' : 'badge bg-danger' }}">{{ $package->status }}</span>
                                            </td>
                                            <td>
                                                <a href="{{ route('package.show', $package->id) }}"
                                                    class="btn btn-primary">
                                                    <i class="fa fa-eye">

                                                    </i>
                                                </a>
                                                <a href="{{ route('package.edit', $package->id) }}"
                                                    class="btn btn-success">
                                                    <i class="fa fa-pen">

                                                    </i>
                                                </a>
                                                <form action="{{ route('package.destroy', $package->id) }}" method="post"
                                                    class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger"
                                                        onclick="return confirm('Do you want to delete this package?');"><i
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
