@extends('layouts.admin')
@section('title' , 'Nepdoor | Category List')
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="margin-top: 8px; font-weight:bold">Category</h3>
                        <a href="{{ route('category.create') }}" class="btn btn-success float-right" style="margin-left:0px"><i
                                class="fa fa-plus" style="font-size: 12px">Add Category</i>

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
                                    <th>Key</th>
                                    <th style="width: 90px">Status</th>
                                    <th style="width: 190px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($packageCategories_data))
                                    @foreach ($packageCategories_data as $packageCategories => $packageCategory)
                                        <tr>
                                            <td>{{ $packageCategories + 1 }}</td>
                                            <td>{{ $packageCategory->title }}</td>

                                            <td>{{ $packageCategory->key }}</td>
                                            <td><span
                                                    class="{{ @$packageCategory->status == 'Active' ? 'badge bg-success' : 'badge bg-danger' }}">{{ $packageCategory->status }}</span>
                                            </td>
                                            <td>
                                                <a href="{{ route('category.show', $packageCategory->id) }}"><button
                                                        class="btn btn-primary"><i class="fa fa-eye"></button></i></a>
                                                <a href="{{ route('category.edit', $packageCategory->id) }}"><button
                                                        class="btn btn-success"><i class="fa fa-pencil"></button></i></a>
                                                <form action="{{ route('category.destroy', $packageCategory->id) }}"
                                                    method="post" class="d-inline">
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
