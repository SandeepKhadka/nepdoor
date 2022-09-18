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
                            <h1 class="m-0 badge bg-success" style="width:1125px;">TICKETS</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header" style="text-align: center">
                                    <h2>Card Title</h2>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12"></div>
                                        <div class="col-lg-6">
                                            <p class="font-weight-bold">Your Message</p>
                                            <div class="card"
                                                style="background-color: rgb(201, 204, 207); border-radius:5%;">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <textarea type="number" id="amount" name="amount" class="form-control" rows="4"
                                                                style="width: 500px; resize: none; background-color:rgb(255, 255, 255);"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-6"></div>
                                        <div class="col-lg-6">
                                            <p class="font-weight-bold">Admin Reply</p>
                                            <div class="card"
                                                style="background-color: rgb(183, 179, 179); border-radius:5%;">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <textarea type="number" id="amount" name="amount" class="form-control" rows="4"
                                                                style="width: 500px; resize: none ;background-color:rgb(255, 255, 255);" disabled></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
    @include('inc.footer')
</body>
