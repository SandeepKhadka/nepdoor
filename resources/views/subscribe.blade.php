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
            <h1 class="m-0 text-center font-weight-bold">Subscribe our Digital Marketing/SEO Package. </small></h1>
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
                            <div class="form-group col-md-4">
                                <label for="inputName">Your Name</label>
                                <input type="text" id="inputName" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputName">Your Email</label>
                                <input type="email" id="inputName" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputName">Your Phone</label>
                                <input type="text" id="inputName" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="inputName">Choose Subscription Category</label>
                                <select id="inputStatus" class="form-control custom-select">
                                    <option selected disabled>Choose any one category...</option>
                                    <option>Basic Marketing Packages</option>
                                    <option>Social Media Marketing</option>
                                    <option>Digital Marketing</option>
                                    <option>SEO</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputName">Choose Subscription Package</label>
                                <select id="inputStatus" class="form-control custom-select">
                                    <option selected disabled>Choose any one Package...</option>
                                    <option>Social Media Marketing</option>
                                    <option>Digital Marketing</option>
                                    <option>SEO</option>
                                    <option>Training</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputName">Upload Payment Voucher or Screenshot</label>
                                <input type="file" id="inputName" class="form-control">
                                <p class="form-text text-muted">
                                    <a href="#payment_details">Click Here</a> to view our Mobile Banking/Payment Details.
                                </p>
                            </div>
                        </div>
                        <div class="form-group">
                        <label for="inputDescription">Write Message</label>
                        <textarea id="inputDescription" class="form-control" rows="4"></textarea>
                        </div>
                        <input type="submit" value="Submit" class="btn btn-success float-right">
                    </div>
                </div>
            </div>
            <!-- /.col-md-6 -->

            <div class="col-lg-12" id="payment_details">
                <div class="row align-items-center" style="margin-top:10px;">
                        <div class="col-md-8 col-12 m-auto">
                            <div class="info-box text-center">
                                <section id="howtopay" style="padding:50px;">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <div class="col-md-12">
                                                <h2>How to pay from <span>Fonepay Application?</span></h2>
                                                <ul class="unstyled-list">
                                                    <li>Open the app belonging to Fonepay-member bank.</li>
                                                    <li>Swipe from right to left and scan the given QR code.</li>
                                                    <li>You can submit the amount via your bank app.</li>
                                                    <li><strong>Please note that minimum amount for transaction is NPR 500</strong>.</li>
                                                </ul>
                                            </div>
                                            <div class="col-md-12">
                                                <img src="https://broadwayinfosys.com/assets/images/fonepayQR.png" alt="" width="300px">
                                            </div>
                                        </div>
                                    </div>
                                </section>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>

@include('inc.footer')
