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
                            <h1 class="m-0 text-center font-weight-bold">Basic packages</small></h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('storeBasicData') }}" method="post"
                                        enctype="multipart/form-data" onsubmit="alert('Form sent successfully.')">
                                        @csrf
                                        <div class="row" style="display: none">
                                            <div class="form-group col-md-6">
                                                <label for="package_id">Package</label>
                                                @if (isset($package_info))
                                                    @foreach ($package_info as $package)
                                                        @if ($package->name == 'Basic')
                                                            <input type="text" id="package_id" name="package_id"
                                                                class="form-control" value="{{ $package->id }}">
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="cat_id">Choose Category</label>
                                                <select id="cat_id" name="cat_id"
                                                    class="form-control custom-select">
                                                    <option selected disabled hidden>Choose any one package...</option>
                                                    @if (isset($package_info))
                                                        @foreach ($package_info as $package)
                                                            @if ($package->name == 'Basic')
                                                                <option value="{{ $package->cat_info['title'] }}">
                                                                    {{ $package->cat_info['title'] }}</option>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="amount">Voucher Amount</label>
                                                <input type="number" id="amount" name="amount"
                                                    class="form-control">
                                            </div>


                                            <div class="form-group col-md-6">
                                                <label>Insert Voucher Image</label>
                                                <input type="file" class="form-control-file" name="voucher"
                                                    id="voucher">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="message">Write Message</label>
                                            <textarea id="message" name="message" class="form-control" rows="4" style="resize: none"></textarea>
                                        </div>
                                        <button type="submit" value="Submit"
                                            class="btn btn-success float-right">Submit</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="content-header">
                        <div class="container">
                            <div class="row mb-2">
                                <div class="col-sm-12">
                                    <h1 class="m-0 text-center font-weight-bold"> Basic packages</small></h1>
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div><!-- /.container-fluid -->
                    </div>

                    <div class="row">
                        @foreach ($package_info as $package)
                            @if ($package->name == 'Basic')
                                <div class="col-12 col-sm-6 col-md-4">
                                    <div class="info-box">
                                        <div class="info-box-content">
                                            <span class="info-box-text">{{ $package->cat_info['title'] }}</span>
                                            <span class="info-box-number">
                                                NRs. {{ $package->price }} Monthly
                                            </span>
                                            <a href="#" class="card-link">Learn More</a>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                            @endif
                        @endforeach

                    </div>
                </div>

                <!-- /.info-box -->
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->

    @include('inc.footer')
