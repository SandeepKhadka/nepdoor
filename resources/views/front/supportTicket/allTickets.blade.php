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
                            <h1 class="m-0 text-center">All Tickets</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="container-sm w-50">
                    <div class="row">
                        <div class="col lg-12">
                            <div class="card">

                                <div class="card-header">
                                    <h3 class="card-title" style="font-weight: bold">
                                        Title
                                    </h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">


                                    <div class="row">
                                        <div class="col lg-12">
                                            <div class="card h-100">


                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-10">
                                                            <div class="card-body">
                                                                <span class="badge">You</span>
                                                                <div class="row">
                                                                    <textarea type="text" id="message" name="message" class="form-control w-100 px-3 py-3 " rows="2"
                                                                        style=" resize: none ;background-color:#e7e7e9; border-radius: 0px 15px 15px 12px; color: rgb(0, 0, 0); font-size:12px"
                                                                        disabled></textarea>

                                                                </div>
                                                                @error('message')
                                                                    <span class="invalid-feedback"
                                                                        role="alert">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-3"></div>
                                                        <div class="col-lg-9">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <span class="badge"
                                                                        style="margin-left:410px">Admin</span>
                                                                    <textarea type="text" id="message" name="message" class="form-control w-100 px-3 py-3" rows="2"
                                                                        style="resize: none ;background-color: #e7e7e9; border-radius:15px 12px 0px 15px; color: rgb(0, 0, 0); font-size:12px"
                                                                        disabled></textarea>
                                                                </div>
                                                                @error('message')
                                                                    <span class="invalid-feedback"
                                                                        role="alert">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col lg-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div>
                                                        <button type="submit" value="Submit"
                                                            class="btn btn-primary float-right">Reply</button>
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
            </div>
        </div>
    </div>
    @include('inc.footer')
