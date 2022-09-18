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
                            <h1 class="m-0" style="border-bottom:1px solid black; text-align:center"><span style="color: #2151A1; font-weight: bold ">ALL</span><span style="color: #EB1933; font-weight: bold">TICKETS</span></h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <div class="content">
                <div class="container" style="width: 60%">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">

                                <div class="card-header">
                                    <h1 class="card-title">Card Title</h1>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card-body">
                                            <span class="badge" style="margin-left: 23px">You</span>
                                            <div class="row">
                                                {{-- <div class="form-group col-md-6"> --}}
                                                <textarea type="number" id="amount" name="amount" class="form-control" rows="2"
                                                    style="width: 400px; resize: none ;background-color:#217ee3; border-radius:35px; color: white"></textarea>
                                                {{-- </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-6"></div> --}}
                                </div>

                                <div class="row">
                                    <div class="col-lg-6"></div>
                                    <div class="col-lg-6">
                                        <div class="card-body">
                                            <span class="badge" style="">Admin</span>
                                            <div class="row">
                                                {{-- <div class="form-group col-md-6"> --}}
                                                <textarea type="number" id="amount" name="amount" class="form-control" rows="2"
                                                    style="width: 400px; resize: none ;background-color:#686869; border-radius:35px; color: white" disabled></textarea>
                                                {{-- </div> --}}
                                            </div>
                                            <div>
                                            </div>
                                        </div>
                                        <div>
                                            <button type="submit" value="Submit" class="btn btn-primary"
                                                style="float: right">Reply</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('inc.footer')
