@extends('layouts.admin')
@section('title', 'Nepdoor | Subscription List')
@section('main-content')
    {{-- BreadCrumb  --}}
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>|
            <li class="breadcrumb-item active" aria-current="reply">Subscription</li>
        </ol>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="margin-top: 8px; font-weight:bold">Subscription</h3>
                        <a href="{{ route('subscription.create') }}" class="btn btn-success float-right"
                            style="margin-left:0px"><i class="fa fa-plus" style="font-size: 12px">Add Subscription</i>

                        </a>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">S.N.</th>
                                    <th>User</th>
                                    <th>Category</th>
                                    <th>Package</th>
                                    <th style="width: 80px">Billing No</th>
                                    <th>Message</th>
                                    <th style="width: 110px">End Date</th>
                                    <th style="width: 70px">Status</th>
                                    <th style="width: 160px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($subscription_data))
                                    @foreach ($subscription_data as $subscriptions => $subscription)
                                        <tr>
                                            <td>{{ $subscriptions + 1 }}</td>
                                            <td>
                                                @if (isset($subscription->user_info['full_name']))
                                                    {{ $subscription->user_info['full_name'] }}
                                                @else
                                                    --
                                                @endif
                                            </td>
                                            <td>
                                                {{ $subscription->cat_id }}
                                            </td>
                                            <td>
                                                @if (isset($subscription->package_info['name']))
                                                    {{ $subscription->package_info['name'] }}
                                                @else
                                                    --
                                                @endif
                                            </td>
                                            <td>{{ $subscription->billing_id }}</td>
                                            <td>{{ Str::limit($subscription->message, 10) }}</td>
                                            <td>{{ $subscription->end_date }}</td>
                                            <td><span
                                                    class="{{ @$subscription->status == 'Active' ? 'badge bg-success' : 'badge bg-danger' }}">{{ $subscription->status }}</span>
                                            </td>
                                            <td>
                                                <a href="{{ route('subscription.show', $subscription->id) }}"><button
                                                        class="btn btn-primary"><i class="fa fa-eye"></button></i></a>
                                                <a href="{{ route('subscription.edit', $subscription->id) }}"><button
                                                        class="btn btn-success"><i class="fa fa-pencil"></button></i></a>
                                                <form action="{{ route('subscription.destroy', $subscription->id) }}"
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
