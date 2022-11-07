@include('inc.toppart')

<body class="hold-transition sidebar-collapse layout-top-nav">
    <div class="wrapper">

        @include('inc.navbar')
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="subscriptions">Subscriptions</li>
            </ol>
        </nav>
        @include('inc.sidebar')

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-sm">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h1 class="m-0 text-center">Subscriptions</h1>
                        </div>
                    </div>
                </div>

                <div class="content">
                    <div class="container">
                        {{-- <div class="col-lg-12"> --}}
                            <div class="row">
                        @if (isset($subscription_data) && $subscription_data != null)
                            @foreach ($subscription_data as $subscription)
                                    {{-- <div class="row"> --}}
                                    <div class="col-lg-4 ">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title" style="font-weight: bold">
                                                    {{ $subscription->cat_id }}
                                                    <span
                                                        class="{{ @$subscription->status == 'Active' ? 'badge bg-success' : 'badge bg-warning' }}">{{ $subscription->status }}</span>
                                                </h3>

                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool"
                                                        data-card-widget="collapse" title="Collapse">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="card-text">
                                                    <h6>Package:
                                                        @if (isset($package_info))
                                                            @foreach (@$package_info as $package)
                                                                @if ($subscription->package_id == $package->id)
                                                                    {{ $package->name }}
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </h6>

                                                    <h6>Start Date:
                                                        {{ $subscription->start_date }}
                                                    </h6>
                                                    <h6>End Date:
                                                        {{ $subscription->end_date }}
                                                    </h6>
                                                </div>
                                                {{-- </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @if (!isset($subscription) || $subscription == null)
                                    <h5 class="text-center">There are no ongoing activities.</h5>
                                    @endif
                                    @endif
                                </div>
                        {{-- </div>  --}}
                    </div>
                </div>




            </div>
        </div>

        @include('inc.footer')
