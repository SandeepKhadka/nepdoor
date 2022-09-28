@include('inc.toppart')

<body class="hold-transition sidebar-collapse layout-top-nav">
    <div class="wrapper">

        @include('inc.navbar')

        @include('inc.sidebar')

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h1 class="m-0 text-center font-weight-bold">Billing</small></h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->


            <div class="content">
                <div class="container">


                    {{-- @if (isset($billing_data)) --}}
                    {{-- @foreach ($billing_data as $billings => $billing) --}}
                    @if (isset($subscription_data))
                        @foreach ($subscription_data as $subscriptions => $subscription)
                            {{-- @if (isset($billing_info))
                                        @foreach (@$billing_info as $billings => $data)
                                            @if ($subscription->billNo == $billings->billNo) --}}
                            {{-- @if ($billing->billNo == $subscriptions) --}}
                            <section class="invoice mt-10">
                                <!-- title row -->

                                <!-- Table row -->
                                <div class="row">
                                    <div class="col-12 table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Bill No</th>
                                                    <th>Category</th>
                                                    <th>Package</th>
                                                    <th>Price</th>
                                                    <th>Payment Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{ $subscription->billing_id }}</td>
                                                    <td>{{ $subscription->cat_id }}</td>
                                                    <td>
                                                        @if (isset($subscription->package_info['name']))
                                                            {{ $subscription->package_info['name'] }}
                                                        @else
                                                            --
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if (isset($billing_data))
                                                            @foreach ($billing_data as $billing)
                                                                @if ($billing->billNo == $subscription->billing_id)
                                                                    {{ $billing->amount }}
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if (isset($billing_data))
                                                            @foreach ($billing_data as $billing)
                                                                @if ($billing->billNo == $subscription->billing_id)
                                                                    <span
                                                                        class="{{ @$billing->payment_status == 'Paid' ? 'badge bg-success' : 'badge bg-warning' }}">{{ $billing->payment_status }}</span>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    <!-- /.col -->
                                    <div class="col-6"></div>
                                    <div class="col-6">
                                        <p class="lead" style="font-weight: bold">Date:
                                            {{ $subscription->created_at }}
                                        </p>

                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr>
                                                    <th style="width:50%">Subtotal:</th>
                                                    <td>
                                                        @if (isset($billing_data))
                                                            @foreach ($billing_data as $billing)
                                                                @if ($billing->billNo == $subscription->billing_id)
                                                                    {{ $billing->amount }}
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Discount</th>
                                                    <td>
                                                        @if (isset($billing_data))
                                                        @foreach ($billing_data as $billing)
                                                            @if ($billing->billNo == $subscription->billing_id)
                                                                {{ $billing->discount }}
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Total:</th>
                                                    <td>
                                                        @if (isset($billing_data))
                                                            @foreach ($billing_data as $billing)
                                                                @if ($billing->billNo == $subscription->billing_id)
                                                                    <?php
                                                                    $total = $billing->amount - ($billing->amount * ($billing->discount/100));
                                                                    ?>
                                                                    {{ $total }}
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </section>

                            <hr>
                            {{-- @endif --}}
                            {{-- @endif
                                        @endforeach
                                    @endif --}}
                            {{-- @endforeach --}}
                            {{-- @endif --}}
                        @endforeach
                    @endif

                </div>
            </div>

        </div><!-- /.container-fluid -->

        @include('inc.footer')
