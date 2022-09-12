@extends('layouts.admin')
@section('title' , 'Nepdoor | Billing List')
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="margin-top: 8px; font-weight: bold;">Billing</h3>
                        <a href="{{ route('billing.create') }}" class="btn btn-success float-right"
                            style="margin-bottom: 0px"><i class="fa fa-plus" style="font-size: 12px">
                                Add Bill
                            </i>
                        </a>
                        {{-- <button href="{{url('billingList')}}" class='btn btn-primary' style="margin-left: 949px">Add</button> --}}
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="searching" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">S.N.</th>
                                    <th style="width: 50px">BillNo</th>
                                    <th>Amount</th>
                                    <th>Voucher</th>
                                    <th style="width:150px">Payment Status</th>
                                    <th style="width: 90px">Status</th>
                                    <th style="width: 190px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($billing_data))
                                    @foreach ($billing_data as $billings => $billing)
                                        <tr>
                                            <td>{{ $billings + 1 }}</td>
                                            <td>{{ $billing->billNo }}</td>
                                            <td>{{ $billing->amount }}</td>
                                            <td>
                                                <img src="{{ asset('uploads/billing/Thumb-' . $billing->voucher) }}"
                                                    alt="" class="img img-responsive">
                                            </td>
                                            <td><span
                                                    class="{{ @$billing->payment_status == 'Paid' ? 'badge bg-success' : 'badge bg-danger' }}">{{ $billing->payment_status }}</span>
                                            </td>
                                            <td><span
                                                    class="{{ @$billing->status == 'Active' ? 'badge bg-success' : 'badge bg-danger' }}">{{ $billing->status }}</span>
                                            </td>
                                            <td>
                                                <a href="{{ route('billing.show', $billing->id) }}" class="btn btn-primary">
                                                    <i class="fa fa-eye">

                                                    </i>
                                                </a>
                                                <a href="{{ route('billing.edit', $billing->id) }}" class="btn btn-success">
                                                    <i class="fa fa-pen">

                                                    </i>
                                                </a>
                                                <form action="{{ route('billing.destroy', $billing->id) }}" method="post"
                                                    class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger"
                                                        onclick="return confirm('Do you want to delete this billing?');"><i
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
