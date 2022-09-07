@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="margin-top: 8px; font-weight:bold;">Activity</h3>
                        <a href="{{ route('activity.create') }}" class="btn btn-success float-right" style="margin-bottom: 0px"><i
                                class="fa fa-plus" style="font-size: 12px">
                                Add Activity
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
                                    <th style="width: 90px">User</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th style="width: 90px">Status</th>
                                    <th style="width: 190px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($activity_data))
                                    @foreach ($activity_data as $activity)
                                        <tr>
                                            <td>1</td>
                                            <td>{{ $activity->user_id }}</td>
                                            <td>{{ $activity->title }}</td>
                                            <td>{{ $activity->content }}</td>
                                            <td><span class="{{@$activity->status == 'Active' ? 'badge bg-success': 'badge bg-danger'}}">{{ $activity->status }}</span></td>
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
                                                <form action="{{ route('activity.destroy', $activity->id) }}" method="post"
                                                    class="d-inline">
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
