import "../assets/plugins/jquery/jquery.min.js";
import './bootstrap';
import "../assets/dist/js/adminlte.js";

import "../assets/plugins/bootstrap/js/bootstrap.bundle.min.js";
import "../assets/plugins/sparklines/sparkline.js";

import "../assets/plugins/jqvmap/jquery.vmap.min.js";
import "../assets/plugins/jqvmap/maps/jquery.vmap.usa.js";

import "../assets/plugins/jquery-knob/jquery.knob.min.js";

import "../assets/plugins/datatables/jquery.dataTables.min.js";

import "../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js";

// import "../assets/plugins/moment/moment.min.js";

// import "../assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js";

import "../assets/plugins/summernote/summernote-bs4.min.js";

import "../assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js";

import "../assets/dist/js/pages/dashboard.js";

 
$(document).ready( function () {
    $('#table').DataTable();
} );


$("#activityContent").summernote();
