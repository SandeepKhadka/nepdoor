@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="margin-top: 8px; font-weight: bold">Contact</h3>
                        <a href="{{ route('contact.create') }}" class="btn btn-success float-right"
                            style="margin-bottom: 0px"><i class="fa fa-plus" style="font-size: 12px">
                                Add Contact
                            </i>
                        </a>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="searching" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">S.N.</th>
                                    <th>Full Name</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th style="width: 60px">Status</th>
                                    <th style="width: 190px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($contact_data))
                                    @foreach ($contact_data as $contact)
                                        <tr>
                                            <td>1.</td>
                                            <td>{{ $contact->name }}</td>
                                            <td>{{ $contact->subject }}</td>
                                            <td>{{ Str::limit($contact->message, 20) }}
                                            </td>
                                            <td><span
                                                    class="{{ @$contact->status == 'Active' ? 'badge bg-success' : 'badge bg-danger' }}">{{ $contact->status }}</span>
                                            </td>
                                            <td><a href="{{ route('contact.show', $contact->id) }}" class="btn btn-primary">
                                                    <i class="fa fa-eye">

                                                    </i>
                                                </a>
                                                <a href="{{ route('contact.edit', $contact->id) }}" class="btn btn-success">
                                                    <i class="fa fa-pen">

                                                    </i>
                                                </a>
                                                <form action="{{ route('contact.destroy', $contact->id) }}" method="post"
                                                    class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger"
                                                        onclick="return confirm('Do you want to delete this contact?');"><i
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
