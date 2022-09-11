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
                        <div class="row">

                            <div class="form-group col-md-12">
                                <label for="subject">Choose Subject</label>
                                <select id="subject" class="form-control custom-select">
                                    <option selected disabled>Choose any one Package...</option>
                                    <option>Social Media Marketing Package</option>
                                    <option>Digital Marketing Package</option>
                                    <option>SEO Package</option>
                                </select>
                            </div>
                           
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="amount">Voucher Amount</label>
                                <input type="number" id="amount" class="form-control">
                            </div>
                        

                        <div class="form-group col-md-6" >
                            <label>Insert Voucher Image</label>
                            <input type="file" class="form-control-file" name="image" id="image">
                        </div>
                    </div>

                        <div class="form-group">
                        <label for="message">Write Message</label>
                        <textarea id="message" name="message" class="form-control" rows="4"></textarea>
                        </div>
                        <input type="submit" value="Submit" class="btn btn-success float-right">
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
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="info-box">
                            <div class="info-box-content">
                                <span class="info-box-text">Social Media Marketing Package</span>
                                <span class="info-box-number">
                                    NRs. 10,000 Monthly
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
                                <span class="info-box-text">Digital Marketing Package</span>
                                <span class="info-box-number">
                                    NRs. 15,000 Monthly
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
                                <span class="info-box-text">SEO Package</span>
                                <span class="info-box-number">
                                    NRs. 20,000 Monthly
                                </span>
                                <a href="#" class="card-link">Learn More</a>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    <!-- /.info-box -->
                    </div>
                </div>
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
