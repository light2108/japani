<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from codervent.com/dashtremev3/table-data-tables.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 29 Jul 2020 09:41:41 GMT -->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard</title>
    <base href="{{asset('')}}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- loader-->
    <link href="backend/assets/css/pace.min.css" rel="stylesheet" />
    <!--favicon-->
    <link rel="icon" href="backend/assets/images/favicon.ico" type="image/x-icon">
    <!-- simplebar CSS-->
    <link href="backend/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <!-- Bootstrap core CSS-->
    <link href="backend/assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--Data Tables -->
    <link href="backend/assets/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="backend/assets/plugins/bootstrap-datatable/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <!-- animate CSS-->
    <link href="backend/assets/css/animate.css" rel="stylesheet" type="text/css" />
    <!-- Icons CSS-->
    <link href="backend/assets/css/icons.css" rel="stylesheet" type="text/css" />
    <!-- Metismenu CSS-->
    <link href="backend/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- Custom Style-->
    <link href="backend/assets/css/app-style.css" rel="stylesheet" />

</head>

<body class="bg-theme bg-theme1">

    <!-- Start wrapper-->
    <div id="wrapper">

        <!--Start sidebar-wrapper-->
        @include('backend.layout.sidebar')
        <!--End sidebar-wrapper-->

        <!--Start topbar header-->
        @include('backend.layout.header')
        <!--End topbar header-->

        <div class="clearfix"></div>

        @yield('content')
        <!--End content-wrapper-->
        <!--Start Back To Top Button-->
        <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
        <!--End Back To Top Button-->

        <!--Start footer-->

        <!--End footer-->

        <!--start color switcher-->

        <!--end color switcher-->

    </div>
    <!--End wrapper-->


    <!-- Bootstrap core JavaScript-->
    <script src="backend/assets/js/jquery.min.js"></script>
    <script src="backend/assets/js/popper.min.js"></script>
    <script src="backend/assets/js/bootstrap.min.js"></script>

    <!-- simplebar js -->
    <script src="backend/assets/plugins/simplebar/js/simplebar.js"></script>
    <!-- Metismenu js -->
    <script src="backend/assets/plugins/metismenu/js/metisMenu.min.js"></script>

    <!-- Custom scripts -->
    <script src="backend/assets/js/app-script.js"></script>

    <!--Data Tables js-->
    <script src="backend/assets/plugins/bootstrap-datatable/js/jquery.dataTables.min.js"></script>
    <script src="backend/assets/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js"></script>
    <script src="backend/assets/plugins/bootstrap-datatable/js/dataTables.buttons.min.js"></script>
    <script src="backend/assets/plugins/bootstrap-datatable/js/buttons.bootstrap4.min.js"></script>
    <script src="backend/assets/plugins/bootstrap-datatable/js/jszip.min.js"></script>
    <script src="backend/assets/plugins/bootstrap-datatable/js/pdfmake.min.js"></script>
    <script src="backend/assets/plugins/bootstrap-datatable/js/vfs_fonts.js"></script>
    <script src="backend/assets/plugins/bootstrap-datatable/js/buttons.html5.min.js"></script>
    <script src="backend/assets/plugins/bootstrap-datatable/js/buttons.print.min.js"></script>
    <script src="backend/assets/plugins/bootstrap-datatable/js/buttons.colVis.min.js"></script>

    <script>
        $(document).ready(function() {
            //Default data table
            $('#default-datatable').DataTable();


            var table = $('#example').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
            });

            table.buttons().container()
                .appendTo('#example_wrapper .col-md-6:eq(0)');

        });
        
    </script>
    <script src="backend/main.js"></script>
</body>

<!-- Mirrored from codervent.com/dashtremev3/table-data-tables.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 29 Jul 2020 09:41:55 GMT -->

</html>

