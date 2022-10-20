@extends('layouts.admin')
@section('title', 'Nepdoor | Dashboard')
@section('main-content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="reply">Home</li>
    </ol>
</nav>
    <div class="container-fluid">
        <!-- Content Wrapper. Contains page content -->
        <div class="row">
            <div class="col-md-12">
                {{-- <div class="content-wrapper"> --}}

                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <h1 class="m-0">Admin Home</h1>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <!-- Small boxes (Stat box) -->
                        @if (isset($subscriptionCategory))
                            @foreach ($subscriptionCategory as $category_name => $category_number)
                                @if ($category_name != null && isset($subscription_info))
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    {{ $category_name }}
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        @foreach ($subscription_info as $subscription)
                                                            @php
                                                                $categoryPackage = $subscription
                                                                    ->where('cat_id', $category_name)
                                                                    ->where('Status', 'Active')
                                                                    ->get(['cat_id', 'package_id']);
                                                            @endphp
                                                            @foreach ($categoryPackage as $singlePackages)
                                                                @if ($singlePackages->package_id == $subscription->package_id)
                                                                    @php
                                                                        $subscriptionPackage[] = $subscription->package_info['name'];
                                                                    @endphp
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                        @php
                                                            $unique_subscriptionPackage = array_count_values($subscriptionPackage);
                                                            $subscriptionPackage = [];
                                                        @endphp
                                                        @foreach ($unique_subscriptionPackage as $package_name => $package_number)
                                                            <div class="col-lg-4 col-6">
                                                                <div class="small-box bg-success">
                                                                    <div class="inner">
                                                                        <h3>{{ $package_number }}</h3>
                                                                        <p>{{ $package_name }}</p>
                                                                    </div>
                                                                    <div class="icon">
                                                                        <i class="ion ion-bag"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div><!-- /.container-fluid -->
                </section>
                <!-- /.content -->
                {{-- </div> --}}
                <!-- /.content-wrapper -->
            </div>
        </div>
    </div>

@endsection
