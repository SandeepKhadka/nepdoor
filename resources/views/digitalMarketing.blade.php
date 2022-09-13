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
                            <h1 class="m-0 text-center font-weight-bold"> Digital Marketing</small></h1>
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
                                    @if ($errors->any())
                                        {{ implode('', $errors->all('<div>:message</div>')) }}
                                    @endif
                                    <form action="{{ route('storeDigitalFormData') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="package">Choose Package</label>
                                                <select id="package" name="package"
                                                    class="form-control custom-select">
                                                    <option selected disabled>Choose any one package...</option>
                                                    @if (isset($package_info))
                                                        @foreach ($package_info as $package)
                                                            @if ($package->cat_info['title'] == 'Digital Marketing' )
                                                                <option>{{ $package->name }}</option>
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
                                            <textarea id="message" name="message" class="form-control" rows="4"></textarea>
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
                                    <h1 class="m-0 text-center font-weight-bold">Digital Marketing Packages</small></h1>
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div><!-- /.container-fluid -->
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="info-box">
                                <div class="info-box-content">
                                    <span class="info-box-text">Standard Package</span>
                                    <span class="info-box-number">
                                        NRs. 22,600 Monthly
                                    </span>
                                    <a href="#" class="card-link">Learn More</a>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="info-box">
                                <div class="info-box-content">
                                    <span class="info-box-text">Premium Package</span>
                                    <span class="info-box-number">
                                        NRs. 45,200 Monthly
                                    </span>
                                    <a href="#" class="card-link">Learn More</a>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="info-box">
                                <div class="info-box-content">
                                    <span class="info-box-text">Enterprise Package</span>
                                    <span class="info-box-number">
                                        NRs. 67,800 Monthly
                                    </span>
                                    <a href="#" class="card-link">Learn More</a>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                    </div>

                </div>

            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->

    @include('inc.footer')
