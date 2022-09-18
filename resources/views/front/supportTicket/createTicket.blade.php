@include('inc.toppart')

<body class="hold-transition sidebar-collapse layout-top-nav">
    <div class="wrapper">

        @include('inc.navbar')

        @include('inc.sidebar')

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content" style="padding-top:50px;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="m-0 text-left font-weight-bold" style="padding: 10px">Create Ticket Message</h4>
                            <div class="card">
                                <div class="card-body">
                                    <form action="" method="post" class="form" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label>Title</label>
                                                <input type="text" class="form-control" value="">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="message">Send Message</label>
                                                <textarea type="text" class="form-control" rows="5" name="message" id="message" required
                                                    style="resize: none;">
                                                </textarea>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success float-right"
                                            value="Sumbit">Send</button>
                                        </a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    @include('inc.footer')
</body>
