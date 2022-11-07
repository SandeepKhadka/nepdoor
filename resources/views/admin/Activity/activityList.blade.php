@extends('layouts.admin')
@section('title', 'Nepdoor | Activity List')

@section('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection

@section('scripts')
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $('.table').DataTable();
    </script>
@endsection

@section('main-content')
    {{-- BreadCrumb --}}
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="reply">Activity</li>
        </ol>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="margin-top: 8px; font-weight:bold;">Activity</h3>
                        <a href="{{ route('activity.create') }}" class="btn btn-success float-right"
                            style="margin-bottom: 0px"><i class="fa fa-plus" style="font-size: 12px">
                                Add Activity
                            </i>
                        </a>
                        {{-- <button href="{{url('packageList')}}" class='btn btn-primary' style="margin-left: 949px">Add</button> --}}
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table  id="table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">S.N.</th>
                                    <th style="width: 200px">User</th>
                                    <th style="width: 180px">Title</th>
                                    <th>Content</th>
                                    <th>Progress</th>
                                    <th style="width: 90px">Status</th>
                                    <th style="width: 190px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($activity_data))
                                    @foreach ($activity_data as $activities => $activity)
                                        <tr>
                                            <td>{{ $activities + 1 }}</td>
                                            <td>
                                                @if (isset($activity->user_info['full_name']))
                                                    {{ $activity->user_info['full_name'] }}
                                                @else
                                                    --
                                                @endif
                                            </td>
                                            <td>{{ $activity->title }}</td>
                                            <td>{{ Str::limit($activity->content, 20) }}</td>
                                            <td>
                                                <div class="progress progress-sm" style="width: 50%">
                                                    <div class="progress-bar bg-green" role="progressbar" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: {{ $activity->progress }}%">
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span
                                                    class="{{ @$activity->status == 'Completed' ? 'badge bg-success' : 'badge bg-warning' }}">{{ $activity->status }}</span>
                                            </td>
                                            <td>
                                                <a href="{{ route('activity.show', $activity->id) }}"
                                                    class="btn btn-primary">
                                                    <i class="fa fa-eye"></button>

                                                    </i>
                                                </a>
                                                <a href="{{ route('activity.edit', $activity->id) }}"
                                                    class="btn btn-success">
                                                    <i class="fa fa-pen">

                                                    </i>
                                                </a>
                                                <form action="{{ route('activity.destroy', $activity->id) }}"
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
