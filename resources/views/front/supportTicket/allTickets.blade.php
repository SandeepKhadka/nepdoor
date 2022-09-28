@include('inc.toppart')

<body class="hold-transition sidebar-collapse layout-top-nav">
    <div class="wrapper">

        @include('inc.navbar')

        @include('inc.sidebar')

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-sm">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h1 class="m-0 text-center"><span
                                style="color: #2151A1; font-weight: bold ">ALL</span><span
                                style="color: #EB1933; font-weight: bold">TICKETS</span></h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="container-sm w-50 pb-3">
                    <div class="row">
                        <div class="col lg-12">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <div class="card-body">
                                                <span class="badge">You</span>
                                                <div class="row">
                                                    <textarea type="number" id="amount" name="amount" class="form-control w-100 px-3 py-3 " rows="2"
                                                        style=" resize: none ;background-color:#484848; border-radius: 0px 15px 15px 12px; color: white; font-size:12px"></textarea>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3"></div>
                                        <div class="col-lg-9">
                                            <div class="card-body">
                                                <div class="row">
                                                    <span class="badge" style="margin-left:440px">Admin</span>
                                                    <textarea type="number" id="amount" name="amount" class="form-control w-100 px-3 py-3" rows="2"
                                                        style="resize: none ;background-color: #e7e7e9; border-radius:15px 12px 0px 15px; color: rgb(0, 0, 0); font-size:12px"
                                                        ></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="container-sm w-50">
                    <div class="row">
                        <div class="col lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div>
                                        <button type="submit" value="Submit" class="btn btn-primary float-right"
                                            >Reply</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>





        {{-- <div class="content-wrapper">
            

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
                                                <textarea type="number" id="amount" name="amount" class="form-control" rows="2"
                                                    style="width: 400px; resize: none ;background-color:#217ee3; border-radius:35px; color: white"></textarea>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6"></div>
                                    <div class="col-lg-6">
                                        <div class="card-body">
                                            <span class="badge" style="">Admin</span>
                                            <div class="row">
                                                <textarea type="number" id="amount" name="amount" class="form-control" rows="2"
                                                    style="width: 400px; resize: none ;background-color:#686869; border-radius:35px; color: white" disabled></textarea>
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
        </div> --}}

        @include('inc.footer')
