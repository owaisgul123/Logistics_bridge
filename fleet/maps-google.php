<?php include '../env_set.php'; ?>
<!doctype html>
<html lang="en">
<!-- Mirrored from themesbrand.com/minia/layouts/maps-google.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 31 Oct 2022 13:23:05 GMT -->

<head>
    <meta charset="utf-8">
    <title>Vehicle Track</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/img/favicon.ico">
    <!-- preloader css -->
    <link rel="stylesheet" href="assets/css/preloader.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://github.hubspot.com/odometer/themes/odometer-theme-car.css">
    <!-- <link rel="stylesheet" href="assets/css/odometer-theme-car.css" type="text/css"> -->
    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">
    <script src="assets/js/gauge.js"></script>
    <!-- <link href="https://github.hubspot.com/odometer/themes/odometer-theme-default.css" rel="stylesheet"> -->
    <!-- <script src="assets/js/odometer.js"></script> -->
    <style>
    .bg-c-blue {
        background: linear-gradient(45deg, #4099ff, #73b4ff);
    }

    .bg-c-green {
        background: linear-gradient(45deg, #2ed8b6, #59e0c5);
    }

    .bg-c-yellow {
        background: linear-gradient(45deg, #FFB64D, #ffcb80);
    }

    .bg-c-pink {
        background: linear-gradient(45deg, #FF5370, #ff869a);
    }

    .odometer {
        font-size: 20px;
    }

    .labels {
        color: white;
        background-color: red;
        font-family: "Lucida Grande", "Arial", sans-serif;
        font-size: 10px;
        text-align: center;
        width: 10px;
        white-space: nowrap;
    }

    .dot {
        height: 15px;
        width: 15px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
    }

    #content {
        opacity: 0;
        visibility: hidden;
        transition: all 1900ms cubic-bezier(0.335, 0.010, 0.030, 1.360);

    }
    </style>
</head>

<body style="min-height: 700px;">
    <script>
    var page = 1;
    var offset = 1;
    </script>
    <!-- <body data-layout="horizontal"> -->
    <!-- Begin page -->
    <div id="layout-wrapper">
        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->


                    <!-- App Search-->

                    <div class="dropdown d-none d-sm-block">
                        <button type="button" class="btn header-item" id="toggle">
                            <i class="bx bx-taxi" style="font-size:20px;"></i>
                        </button>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="dropdown d-inline-block d-lg-none ms-2">
                        <button type="button" class="btn header-item" id="page-header-search-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i data-feather="search" class="icon-lg"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                            aria-labelledby="page-header-search-dropdown">
                            <form class="p-3">
                                <div class="form-group m-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search ..."
                                            aria-label="Search Result">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="mdi mdi-magnify"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="dropdown d-none d-sm-inline-block">
                        <button type="button" class="btn header-item" id="mode-setting-btn">
                            <i data-feather="moon" class="icon-lg layout-mode-dark"></i>
                            <i data-feather="sun" class="icon-lg layout-mode-light"></i>
                        </button>
                    </div>
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item bg-soft-light border-start border-end"
                            id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img class="rounded-circle header-profile-user small_logo" src="assets/images/gno.png"
                                alt="Header Avatar">
                            <span class="d-none d-xl-inline-block ms-1 fw-medium project_name" id="project_name"></span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->

                            <a class="dropdown-item" href="../logout.php">
                                <i class="mdi mdi-logout font-size-16 align-middle me-1"></i>
                                Logout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- ========== Left Sidebar Start ========== -->

        <!-- Left Sidebar End -->
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content" style="
        margin-left: 0px;
    ">
            <div class="page-content" style="padding: 0px;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12" style="padding :0 !important">
                            <div id="googleMap" style="width: 100%; height: 100vh; z-index: 0; margin-top: 70px;"
                                class=""></div>
                            <div class="col-md-3" id="content"
                                style="position: absolute; top: 60px ;  z-index: 1 ; background: transparent; ">
                                <div class="card " style="height: 100vh;width: 450px;">
                                    <div class="card-body" style="overflow-y: scroll;">
                                        <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#home1"
                                                    role="tab">
                                                    <span class="d-block d-sm-none">
                                                        <i class="fas fa-home"></i>
                                                    </span>
                                                    <span class="d-none d-sm-block">Vehicles</span>
                                                </a>
                                            </li>
                                            <!-- <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab" href="#profile1" role="tab">
                                                    <span class="d-block d-sm-none">
                                                        <i class="far fa-user"></i>
                                                    </span>
                                                    <span class="d-none d-sm-block">Geofences</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab" href="#messages1" role="tab">
                                                    <span class="d-block d-sm-none">
                                                        <i class="far fa-envelope"></i>
                                                    </span>
                                                    <span class="d-none d-sm-block">Drivers</span>
                                                </a>
                                            </li> -->
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content text-muted">
                                            <div class="tab-pane active" id="home1" role="tabpanel">
                                                <div class="app-search d-none d-lg-block position-relative pb-0">
                                                    <div class="row p-0">
                                                        <div class="col-8 p-0">
                                                            <div class="input-group mb-3">
                                                                <input type="text" class="form-control" id="myInput"
                                                                    placeholder="Search Vehicles..."
                                                                    style="background-color: #e1e1e1;">
                                                                <span class="input-group-text" id="basic-addon1" style="
                                                                                                /* color: antiquewhite; */
                                                                                                background-color: #5746ac;
                                                                                            ">
                                                                    <i class="bx bx-search-alt"
                                                                        style="color: rgb(255, 255, 255);"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-2 p-0">
                                                            <button type="button" onclick="delmarkers(null);"
                                                                class="btn btn-soft-primary waves-effect waves-light">
                                                                <i class="fas fa-eye font-size-16 align-middle"></i>
                                                            </button>
                                                        </div>
                                                        <!-- <div class="col-2 p-0">
                                                            <button type="button"
                                                                class="btn btn-soft-primary waves-effect waves-light"
                                                                id="modal_b" data-bs-toggle="modal"
                                                                data-bs-target="#myModal">
                                                                <i class="bx bx-filter font-size-16 align-middle"></i>
                                                            </button>
                                                        </div> -->
                                                    </div>
                                                    <!-- <button class="btn btn-primary" type="button"><i class="bx bx-search-alt align-middle"></i></button> -->
                                                </div>
                                                <div class="row">
                                                    <!-- <h3> -->
                                                    <h5 class="pt-0">Vehicles : <strong id="user_name">Admin</strong>
                                                    </h5>
                                                    <!-- </h3> -->

                                                </div>
                                                <div class="row p-0">
                                                    <div class="col-2 mb-1 p-0 text-center" title="Stopped Vehicles">
                                                        <button type="button" id="stop"
                                                            class="btn btn-soft-violent waves-effect waves-light w-sm"
                                                            style="min-width: 60px !important;">
                                                            <i class="far fa-stop-circle d-block font-size-16"
                                                                style="color: rgb(250, 8, 8);"></i>
                                                            <b></b>
                                                        </button>
                                                    </div>
                                                    <div class="col-2 mb-1 p-0 text-center" title="Running Vehicles">
                                                        <button type="button" id="running"
                                                            class="btn btn-soft-info waves-effect waves-light w-sm"
                                                            style="min-width: 60px !important;">
                                                            <i class="fas fa-location-arrow d-block font-size-16"
                                                                style="color: rgb(29, 115, 141);"></i>
                                                            <b></b>
                                                        </button>
                                                        <!-- <i class="fas fa-location-arrow" style="color: rgb(67, 153, 10);"></i>
                                                        <p> <b>150</b> </p> -->
                                                    </div>
                                                    <div class="col-2 mb-1 p-0 text-center" title="Idle Vehicles">
                                                        <button type="button" id="idle"
                                                            class="btn btn-soft-warning waves-effect waves-light w-sm"
                                                            style="min-width: 60px !important;">
                                                            <i class="fas fa-hourglass-half d-block font-size-16"
                                                                style="color: #E6B730;"></i>
                                                            <b></b>
                                                        </button>
                                                        <!-- <i class="fas fa-hourglass-half" style="color: rgb(248, 229, 59);"></i>
                                                        <p> <b>10</b> </p> -->
                                                    </div>
                                                    <div class="col-2 mb-1 p-0 text-center" title="In-Active Vehicles">
                                                        <button type="button" id="inactive"
                                                            class="btn btn-soft-purple waves-effect waves-light w-sm"
                                                            style="min-width: 60px !important;">
                                                            <i class="fas fa-ban d-block font-size-16"
                                                                style="color: #751386;"></i>
                                                            <b></b>
                                                        </button>
                                                        <!-- <i class="fas fa-ban" style="color: rgb(7, 149, 206);"></i>
                                                        <p> <b>10</b> </p> -->
                                                    </div>
                                                    <div class="col-2 mb-1 p-0 text-center"
                                                        title="Speed Violation Vehicles">
                                                        <button type="button" id="nodata"
                                                            class="btn btn-soft-danger waves-effect waves-light w-sm"
                                                            style="min-width: 60px !important;">
                                                            <i class="fab fa-creative-commons-zero d-block font-size-16"
                                                                style="color: #a70000;"></i>
                                                            <b></b>
                                                        </button>
                                                        <!-- <i class="fab fa-creative-commons-zero" style="color: rgba(122, 122, 122, 0.973);"></i>
                                                        <p> <b>10</b> </p> -->
                                                    </div>
                                                    <div class="col-2 mb-1 p-0 text-center" title="Total Vehicles">
                                                        <button type="button" id="total"
                                                            class="btn btn-soft-primary waves-effect waves-light w-sm"
                                                            style="min-width: 60px !important;">
                                                            <i class="fas fa-check-double align-middle d-block font-size-16"
                                                                style="color: rgb(89, 7, 184);"></i>
                                                            <b></b>
                                                        </button>
                                                        <!-- <i class="fas fa-check-double align-middle" style="color: rgb(89, 7, 184);"></i>
                                                        <p> <b>1500</b> </p> -->
                                                    </div>
                                                </div>
                                                <div id="d2" class="d2"></div>
                                                <button type="button" onclick="callVehic(page,offset,user_id)"
                                                    class="btn btn-link btn-rounded waves-effect">View More</button>
                                            </div>
                                            <div class="tab-pane" id="profile1" role="tabpanel">
                                                <p class="mb-0">
                                                    Food truck fixie locavore, accusamus mcsweeney's marfa nulla
                                                    single-origin coffee squid. Exercitation +1 labore velit, blog
                                                    sartorial PBR leggings next level wes anderson artisan four loko
                                                    farm-to-table craft beer twee. Qui photo booth letterpress,
                                                    commodo enim craft beer mlkshk aliquip jean shorts ullamco ad
                                                    vinyl cillum PBR. Homo nostrud organic, assumenda labore
                                                    aesthetic magna delectus.
                                                </p>
                                            </div>
                                            <div class="tab-pane" id="messages1" role="tabpanel">
                                                <p class="mb-0">
                                                    Etsy mixtape wayfarers, ethical wes anderson tofu before they
                                                    sold out mcsweeney's organic lomo retro fanny pack lo-fi
                                                    farm-to-table readymade. Messenger bag gentrify pitchfork
                                                    tattooed craft beer, iphone skateboard locavore carles etsy
                                                    salvia banksy hoodie helvetica. DIY synth PBR banksy irony.
                                                    Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh
                                                    mi whatever gluten-free carles.
                                                </p>
                                            </div>
                                            <div class="tab-pane" id="settings1" role="tabpanel">
                                                <p class="mb-0">
                                                    Trust fund seitan letterpress, keytar raw denim keffiyeh etsy
                                                    art party before they sold out master cleanse gluten-free squid
                                                    scenester freegan cosby sweater. Fanny pack portland seitan DIY,
                                                    art party locavore wolf cliche high life echo park Austin. Cred
                                                    vinyl keffiyeh DIY salvia PBR, banh mi before they sold out
                                                    farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral,
                                                    mustache readymade keffiyeh craft.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->
    <!-- Right Sidebar -->

    <!-- /Right-bar -->
    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>
    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script
        src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>

    <script>
    var username = '';

    function get_settings() {
        var requestOptions = {
            method: 'GET',
            redirect: 'follow'
        };
        console.log("<?php echo $api_url_map;?>get/get_settings.php?key=03201232927")
        fetch("<?php echo $api_url_map;?>get/get_settings.php?key=03201232927", requestOptions)
            .then(response => response.json())
            .then(result => {
                console.log(result)

                var username = result['name']
                var logo = result['logo']
                var color = result['color']
                var text_color = result['text_color']

                if (color != "") {
                    $('#sidebar_color').css("background-color", color);

                }

                if (text_color != "") {

                    $("#sidebar_color").find("*").css("color", text_color);
                }


                var image = $(".logo_image");

                // Change the src attribute of the image
                image.attr("src", "<?php echo $api_url_map;?>" + logo);
                $(".small_logo").attr("src", "<?php echo $api_url_map;?>" + logo);
                $('.project_name').text(username);

                console.log(username)
            })
            .catch(error => console.log('error', error));
    }
    get_settings();
    </script>
    <!-- pace js -->
    <!-- <script src="assets/libs/pace-js/pace.min.js"></script> -->
    <div class="offcanvas offcanvas-end " style="width: 250px; margin-top: 70px;" tabindex="-1" id="offcanvasRight"
        aria-labelledby="offcanvasRightLabel" data-bs-scroll="false" data-bs-backdrop="false">
        <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">C-1919</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="row">
                <div class="col-md-12 col-xl-12">
                    <div class="card">
                        <img class="card-img-top img-fluid"
                            src="https://img.freepik.com/free-vector/hand-drawn-transport-truck_23-2149166246.jpg?w=2000"
                            alt="Card image cap">
                        <div class="card-body p-1 badge badge-soft-danger" id="card_color">
                            <div class="row ">
                                <div class="col-md-8">
                                    <p class="card-text badge bg-danger h5" id="status"
                                        style="float: left;font-size: inherit;color:white; display:block">
                                        Running</p>
                                </div>
                                <div class="col-md-4">
                                    <p class="card-text" style="font-size: small;" id="timet"></p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-2 mt-3">
                            <div class="row ">
                                <div class="col-md-4 p-1">
                                    <p class="card-text h4" style="float: left;font-size: smaller;">Last Updated</p>
                                </div>
                                <div class="col-md-8 p-1">
                                    <p class="card-text" id="lasttime" style="font-size: smaller;text-align: end;">2.7
                                        Km</p>
                                </div>
                            </div>
                        </div>
                        <hr class="m-0">
                        <!-- <div class="card-body"> -->
                        <div class="d-flex justify-content-center">
                            <div id="odometer" class="odometer m-2">1</div>
                        </div>
                        <div class="card-body pt-1 p-0">
                            <div class="row">
                                <div class="col-8">
                                    <p style="margin-left:10px">Driver</p>
                                </div>
                                <div class="col-4 d-flex justify-content-end">
                                    <p style="margin-right: 10px;">--</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <p style="margin-left:10px">Mobile</p>
                                </div>
                                <div class="col-4 d-flex justify-content-end">
                                    <p style="margin-right: 10px;">--</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-primary border-primary text-white-50">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <h5 class="mb-3 text-white">Locations</h5>
                                </div>
                                <div class="col-4 d-flex justify-content-end">
                                    <i class="fas fa-route" id="copy"></i>
                                </div>
                            </div>
                            <p class="card-text" id="locations"></p>
                            <p class="card-text" id="latlng"></p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="row">
                            <div class="col-8">

                                <h5 class="card-title p-1">Today Activity</h5>
                            </div>
                            <div class="col-4">
                                <button type="button" class="btn btn-soft-success waves-effect waves-light"><i
                                        class="fas fa-route font-size-16 align-middle"></i></button>
                            </div>
                        </div>
                        <div class="card-body p-0" style="padding-left: 20px !important;">
                            <div class="row" style="justify-content: center;">
                                <div class="col-3 p-0" style="width: 20px;">
                                    <img src="http://iot.trackfleetio.com/images/new/trip_start_flag.svg" alt="start">
                                </div>
                                <div class="col-6" style="border-bottom: 2px dashed #4c4c4c; text-align: center;">
                                    <b id="km">0 KM</b>
                                </div>
                                <div class="col-3">
                                    <img src="http://iot.trackfleetio.com/images/new/trip_end_flag.svg" width="26px"
                                        alt="current">
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-2">
                            <blockquote class="blockquote font-size-14 mb-0 p-3">
                                <div class="row">
                                    <div class="col-6 d-flex justify-content-start p-0">
                                        <p class="font-weight-bold"> <b>Running</b> </p>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end font-size-12 p-0 ">
                                        <p class="font-size-12 font-weight-bold" style="color:rgb(11, 167, 11)"><b
                                                id="runn">00:30 Hrs</b></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 d-flex justify-content-start p-0">
                                        <p class="font-weight-bold"><b>Stop</b></p>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end font-size-12 p-0 ">
                                        <p class="font-size-12 font-weight-bold" style="color:rgb(211, 9, 9)"><b
                                                id="stopp">00:20 Hrs</b></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 d-flex justify-content-start p-0">
                                        <p><b>Idle</b></p>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end font-size-12 p-0">
                                        <p class="font-size-12" style="color:#dbb239"><b id="idlee">00:10 Hrs</b></p>
                                    </div>
                                </div>

                                <!-- <footer class="blockquote-footer mt-0 font-size-12 p-0">
                                    Someone famous in <cite title="Source Title">Source Title</cite>
                                </footer> -->
                            </blockquote>
                        </div>
                    </div>
                    <h4 class="card-title">Speed</h4>
                    <canvas id="tacho" data-type="radial-gauge" data-width="150" data-height="150" data-units="Km/h"
                        data-title="false" data-value="100" data-min-value="0" data-max-value="160"
                        data-major-ticks="0,20,40,60,80,100,120,140,160" data-minor-ticks="2" data-stroke-ticks="false"
                        data-highlights='[]' data-border-outer-width=1 data-border-middle-width=1 data-animation="true"
                        data-color-plate="#5156be" data-color-major-ticks="#f5f5f5" data-color-minor-ticks="#ddd"
                        data-color-title="#fff" data-color-units="#ccc" data-color-numbers="#eee"
                        data-color-needle-start="rgba(240, 128, 128, 1)" data-color-needle-end="rgba(255, 160, 122, .9)"
                        data-font-value="Led" style="margin-left: 15px;"></canvas>
                    <div>
                        <div class="row">
                            <div class="col-6">
                                <div class="card bg-info text-white-50" style="box-shadow: rgb(0 0 0 / 30%) 0px 2px 4px; border-radius:6px; background-image:url('http://iot.trackfleetio.com/images/new/speed-widget-bg.png');background-position: -13px 35px;
                                background-repeat: no-repeat;
                                background-size: 112px 55px;
                                opacity: 1;
                                height: 60px;">
                                    <div class="card-text text-dark p-1 pb-0" style="
                                    color: #005285 !important;
                                    font-size: smaller;
                                ">
                                        Avg. speed
                                    </div>
                                    <div class="card-text text-white p-1 pt-0" id="avg">
                                        0 Km/h
                                    </div>

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card bg-danger text-white-50" style="box-shadow: rgb(0 0 0 / 30%) 0px 2px 4px; border-radius:6px; background-image:url('http://iot.trackfleetio.com/images/new/speed-widget-bg.png');background-position: -13px 35px;
                                background-repeat: no-repeat;
                                background-size: 112px 55px;
                                opacity: 1;
                                height: 60px;">
                                    <div class="card-text p-1 pb-0" style="
                                    color: #9e0000 !important;
                                    font-size: smaller;
                                ">
                                        Max. speed
                                    </div>
                                    <div class="card-text text-white p-1 pt-0" id="max">
                                        70 Km/h
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="myModal" style="padding-top: 50px;" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Select Distributor - End User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <div class="card border border-primary">
                            <div class="card-header bg-transparent border-primary">
                                <h5 class="my-0 text-primary"><i class="mdi mdi-bullseye-arrow me-3"></i>Distributors
                                </h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled mb-0">
                                    <li><b onclick="change_id()">Admin</b>
                                        <ul id="dis">
                                            <div class="spinner-grow text-primary m-1" id="loading" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>

                                            <!-- <li>hascol</li> -->

                                        </ul>
                                    </li>

                                </ul>
                            </div>
                        </div>

                    </div>
                    <!-- <h5>Select Distributor</h5> -->

                    <div class="card border border-primary">
                        <div class="card-header bg-transparent border-primary">
                            <h5 class="my-0 text-primary"><i class="mdi mdi-bullseye-arrow me-3"></i>End-Users</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <!-- <li>Integer molestie lorem at massa</li> -->
                                <li>
                                    <ul id="endu">


                                    </ul>
                                </li>
                                <!-- <li>Faucibus porta lacus fringilla vel</li> -->
                            </ul>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <script>
    var map;
    var markers = {};
    var marker;
    var markersArray = [];
    var odo = 0,
        odo_n = 0;
    var user_id = localStorage.getItem("user_id");
    var prev = localStorage.getItem("prev");
    document.getElementById('user_name').innerHTML = localStorage.getItem("name");
    if (prev == 'Cartraige' || prev == 'End-User') {

        document.getElementById("modal_b").style.display = "none"
    } else {
        user_id = 1;
    }
    // if (user_id == 2) {
    //     user_id = 1;
    // }
    var flightPath;

    function myMap() {
        var mapProp = {
            center: new google.maps.LatLng(30.3753, 69.3451),
            zoom: 5,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
        };
        map = new google.maps.Map(document.getElementById("googleMap"), mapProp);


    }
    </script>

    <script src="assets/js/speedometer.js"></script>
    <script src="https://github.hubspot.com/odometer/odometer.js"></script>
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyBNyJWb04pByaU1CTmimoWNl3b86VV6qZ8&callback=myMap">
    </script>
    <script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>
    </script>
    <!-- google maps api -->
    <script>
    function change_id() {
        user_id = 1;
        document.getElementById('user_name').innerHTML = 'Admin'
        $('#myModal').modal('toggle');
        //console.log(user_id);
        $("#d2").empty();
        count();
        // callVehic(10,1);
        sele = 6;
        ///Vehicle Search
        var settings = {
            "url": "<?php echo $api_url_map;?>map_apis/total.php?accesskey=12345&user=" + user_id + "",
            "method": "GET",
            "timeout": 0,
        };

        $.ajax(settings).done(function(response) {
            const data = JSON.parse(response);
            //console.log(data.length);
            $("#d2").empty();

            var i;

            for (i = 0; i < 100; i++) {
                // //console.log(data[i]['car_name']);
                var server_time = moment(data[i]['time']).format('MM/DD/YYYY hh:mm A');
                var current_time = moment().format('MM/DD/YYYY hh:mm A');
                var a = moment(server_time, 'MM/DD/YYYY hh:mm A');
                var b = moment(current_time, 'MM/DD/YYYY hh:mm A');
                var diffDays = b.diff(a, 'minutes');

                var div;

                // if (diffDays > 1440) {
                div = '' +
                    '                                                   <li class="list-unstyled" data-geo-lat="' +
                    data[i]['lat'] + '" data-geo-long="' + data[i]['lng'] + '">' +
                    '                                                        <div class="card p-0  mb-1 ss" id="' +
                    data[i]['id'] + '">' +
                    '                                                            <div class="card-body p-2">' +
                    '                                                                <div class="row p-0 mb-0 ">' +
                    '                                                                    <div class="col-lg-5">' +
                    '                                                                        <h4 class="card-title mb-1" style="vertical-align: middle;display: flex;"><span style="background-color: #32a58b" class="dot"></span> &nbsp' +
                    '                                                                            ' + data[i][
                        'name'
                    ] + '</h4>' +
                    '                                                                    </div>' +
                    '                                                                    <div class="col-lg-7" style="text-align: right;">' +
                    '                                                                        <p class="p-0 font-size-12 mb-1" id="' +
                    data[i]['id'] + '-time">' + data[i]['time'] +
                    '                                                                        </p>' +
                    '                                                                    </div>' +
                    '                                                                </div>' +
                    '                                                                <div class="row p-0 mb-0 mt-0">' +
                    '                                                                    <div class="col-lg-5">' +
                    '                                                                        <i class="fas fa-tachometer-alt font-size-10"></i>' +
                    '                                                                        &nbsp; ' + data[i][
                        'speed'
                    ] + ' km/h' +
                    '                                                                    </div>' +
                    '                                                                    <div class="col-lg-7" style="text-align: right;">' +
                    '                                                                        <i class="fas fa-key"' +
                    '                                                                            style="color: rgb(185, 8, 8);"></i> &nbsp; <i' +
                    '                                                                            class="fas fa-power-off"' +
                    '                                                                            style="color: rgb(8, 185, 17);"></i>' +
                    '                                                                    </div>' +
                    '                                                                </div>' +
                    '                                                                <div class="row p-0 mb-0 mt-0">' +
                    '                                                                    <div class="col-lg-7">  ' +
                    '                                                                        <i class="fas fa-map-marker-alt font-size-10"' +
                    '                                                                            style="color: rgb(33, 114, 189);"></i>' +
                    '                                                                        &nbsp; ' + data[i][
                        'location'
                    ] +
                    '                                                                    </div>' +
                    '                                                                    <div class="col-lg-5" style="text-align: right;">' +
                    '                                                                                                        <i class="fas fa-building" style="color: rgb(240, 34, 96);"></i> ' +
                    data[i]['trackername'] + '' +
                    '                                                                                                    </div>' +
                    '                                                                </div>' +
                    '                                                            </div>' +
                    '                                                        </div>' +
                    '                                                    </li>';


                // }


                document.getElementById("d2").innerHTML += div;
            }
        });
    }
    var image_selected = new Array();
    var vehcile_selection = new Array();
    vehcile_selection.push(0);
    var markerCluster;
    var myOffcanvas = document.getElementById('offcanvasRight')
    var sele = 6;
    var chicago = new google.maps.LatLng(41.924832, -87.697456),
        pointToMoveTo,
        first = true,
        curMarker = new google.maps.Marker({}),
        $el;
    var focused = 0;

    function distributor() {
        var settings = {
            "url": "",
            "method": "GET",
            "timeout": 0,
        };
        $('#loading').show();
        $.ajax({
            url: "<?php echo $api_url_map;?>map_apis/distributor.php?accesskey=12345",
            method: "GET",
            timeout: 0,
            cache: false,
            success: function(response) {
                // $('.info').append(html);
                const data = JSON.parse(response);
                for (var i = 0; i < data.length; i++) {


                    $('#dis').append('<li class="ss2" id="' + data[i]['distributor_id'] + '">' + data[i][
                        'dis_name'
                    ] + '</li>');
                    // $('#dis').append('<div class="card bg-info border-primary text-white-50 p-0 "><div class="card-body p-1"><h5 class="mb-1 text-white mb-0" id="' + data[i]['distributor_id'] + '">' + data[i]['dis_name'] + '</h5></div></div>');
                }

            },
            complete: function() {
                $('#loading').hide();
            }
        });

    }


    $('#dis').on('click', ".ss2", function() {
        var my_id = this.id;
        //console.log(my_id);
        $("#endu").empty();
        $('#loading').show();
        $.ajax({
            url: "<?php echo $api_url_map;?>map_apis/end_user.php?dis=" + my_id + "&accesskey=12345",
            method: "GET",
            timeout: 0,
            cache: false,
            success: function(response) {
                // $('.info').append(html);
                const data = JSON.parse(response);
                for (var i = 0; i < data.length; i++) {
                    $('#endu').append('<li class="ss3" id="' + data[i]['end_user_id'] + '">' + data[
                        i]['enduser_name'] + '</li>');
                }

            },
            complete: function() {
                $('#loading').hide();
            }
        });

    });

    $('#endu').on('click', ".ss3", function() {
        var my_id = this.id;

        user_id = my_id;
        document.getElementById('user_name').innerHTML = $(this).text();
        $('#myModal').modal('toggle');
        //console.log(user_id);
        $("#d2").empty();
        count();
        // callVehic(10,1);
        sele = 6;
        ///Vehicle Search
        var settings = {
            "url": "<?php echo $api_url_map;?>map_apis/total.php?accesskey=12345&user=" + user_id + "",
            "method": "GET",
            "timeout": 0,
        };

        $.ajax(settings).done(function(response) {
            const data = JSON.parse(response);
            //console.log(data.length);
            $("#d2").empty();

            var i;

            for (i = 0; i < 50; i++) {
                // //console.log(data[i]['car_name']);
                var server_time = moment(data[i]['time']).format('MM/DD/YYYY hh:mm A');
                var current_time = moment().format('MM/DD/YYYY hh:mm A');
                var a = moment(server_time, 'MM/DD/YYYY hh:mm A');
                var b = moment(current_time, 'MM/DD/YYYY hh:mm A');
                var diffDays = b.diff(a, 'minutes');

                var div;

                // if (diffDays > 1440) {
                div = '' +
                    '                                                   <li class="list-unstyled" data-geo-lat="' +
                    data[i]['lat'] + '" data-geo-long="' + data[i]['lng'] + '">' +
                    '                                                        <div class="card p-0  mb-1 ss" id="' +
                    data[i]['id'] + '">' +
                    '                                                            <div class="card-body p-2">' +
                    '                                                                <div class="row p-0 mb-0 ">' +
                    '                                                                    <div class="col-lg-5">' +
                    '                                                                        <h4 class="card-title mb-1" style="vertical-align: middle;display: flex;"><span style="background-color: #32a58b" class="dot"></span> &nbsp' +
                    '                                                                            ' +
                    data[i]['name'] + '</h4>' +
                    '                                                                    </div>' +
                    '                                                                    <div class="col-lg-7" style="text-align: right;">' +
                    '                                                                        <p class="p-0 font-size-12 mb-1" id="' +
                    data[i]['id'] + '-time">' + data[i]['time'] +
                    '                                                                        </p>' +
                    '                                                                    </div>' +
                    '                                                                </div>' +
                    '                                                                <div class="row p-0 mb-0 mt-0">' +
                    '                                                                    <div class="col-lg-5">' +
                    '                                                                        <i class="fas fa-tachometer-alt font-size-10"></i>' +
                    '                                                                        &nbsp; ' +
                    data[i]['speed'] + ' km/h' +
                    '                                                                    </div>' +
                    '                                                                    <div class="col-lg-7" style="text-align: right;">' +
                    '                                                                        <i class="fas fa-key"' +
                    '                                                                            style="color: rgb(185, 8, 8);"></i> &nbsp; <i' +
                    '                                                                            class="fas fa-power-off"' +
                    '                                                                            style="color: rgb(8, 185, 17);"></i>' +
                    '                                                                    </div>' +
                    '                                                                </div>' +
                    '                                                                <div class="row p-0 mb-0 mt-0">' +
                    '                                                                    <div class="col-lg-7">  ' +
                    '                                                                        <i class="fas fa-map-marker-alt font-size-10"' +
                    '                                                                            style="color: rgb(33, 114, 189);"></i>' +
                    '                                                                        &nbsp; ' +
                    data[i]['location'] +
                    '                                                                    </div>' +
                    '                                                                    <div class="col-lg-5" style="text-align: right;">' +
                    '                                                                                                        <i class="fas fa-building" style="color: rgb(240, 34, 96);"></i> ' +
                    data[i]['trackername'] + '' +
                    '                                                                                                    </div>' +
                    '                                                                </div>' +
                    '                                                            </div>' +
                    '                                                        </div>' +
                    '                                                    </li>';


                // }


                document.getElementById("d2").innerHTML += div;
            }
        });

    });

    // });

    ///select 1:stop
    ///select 2:running
    ///select 3:idle
    ///select 4:inactive
    ///select 5:nodata
    ///select 6:all
    document.getElementById("odometer").innerHTML = 126;
    setInterval(function() {
        count();
        // odometer.innerHTML = 23456;
        // //console.log("Interval WOrking");
    }, 5000);


    $("#copy").click(function() {
        let text = document.getElementById('latlng').innerHTML;
        copyToClipboard("https://maps.google.com/maps?q=loc:" + document.getElementById("latlng"));
        drawpath();
        // Copy the text inside the text field
        // navigator.clipboard.writeText();
        // alert('sd');


    });


    function copyToClipboard(elem) {
        // create hidden text element, if it doesn't already exist
        var targetId = "_hiddenCopyText_";
        var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
        var origSelectionStart, origSelectionEnd;
        if (isInput) {
            // can just use the original source element for the selection and copy
            target = elem;
            origSelectionStart = elem.selectionStart;
            origSelectionEnd = elem.selectionEnd;
        } else {
            // must use a temporary form element for the selection and copy
            target = document.getElementById(targetId);
            if (!target) {
                var target = document.createElement("textarea");
                target.style.position = "absolute";
                target.style.left = "-9999px";
                target.style.top = "0";
                target.id = targetId;
                document.body.appendChild(target);
            }
            target.textContent = elem.textContent;
        }
        // select the content
        var currentFocus = document.activeElement;
        target.focus();
        target.setSelectionRange(0, target.value.length);

        // copy the selection
        var succeed;
        try {
            succeed = document.execCommand("copy");
        } catch (e) {
            succeed = false;
        }
        // restore original focus
        if (currentFocus && typeof currentFocus.focus === "function") {
            currentFocus.focus();
        }

        if (isInput) {
            // restore prior selection
            elem.setSelectionRange(origSelectionStart, origSelectionEnd);
        } else {
            // clear temporary content
            target.textContent = "";
        }
        return succeed;
    }
    // var vehcile_selection
    $(document).ready(function() {
        distributor();
        ///Selected Vehicle Run Time
        var refreshId = setInterval(function() {
            if (vehcile_selection.length == 1) {
                clearInterval(refreshId);
            } else {


                var settings = {
                    "url": "<?php echo $api_url_map;?>map_apis/selected_vehicle.php?vehi=" +
                        vehcile_selection + "&accesskey=12345",
                    "method": "GET",
                    "timeout": 0,
                };
                //console.log("<?php echo $api_url_map;?>map_apis/selected_vehicle.php?vehi=" + vehcile_selection + "&accesskey=12345");

                $.ajax(settings).done(function(response) {
                    const data = JSON.parse(response);
                    for (i = 0; i < data.length; i++) {
                        var lat = data[i]['lat'];
                        var lng = data[i]['lng'];
                        var id = data[i]['id'];
                        var location = data[i]['location'];
                        var speed = data[i]['speed'];
                        var time = data[i]['time'];
                        var ignition = data[i]['ignition'];
                        var ignition = data[i]['ignition'];
                        var angle = data[i]['angle'];
                        var m1 = moment(new Date(time));
                        var m2 = moment(new Date());
                        // var m2 = m1.clone().add(59, 'seconds');

                        var hoursDiff = m2.diff(m1, 'hours');
                        //console.log('Hours:' + hoursDiff);
                        // document.getElementById("odometer").innerHTML = data[i]['odometer'];
                        // document.getElementById("locations").innerHTML = data[i]['location'];
                        // document.getElementById("latlng").innerHTML = lat + "," + lng;

                        // document.getElementById(id+'-time').innerHTML = time;
                        var icon;
                        var color;
                        if (ignition == "OFF" && speed == 0 && hoursDiff < 24) {
                            color = "red";
                            icon = "assets/images/truck2.svg";
                        } else if (ignition == 'ON' && speed > 0 && speed <= 50 && hoursDiff <
                            24) {
                            color = "#1D738D";
                            icon = "assets/images/truck.svg";
                        } else if (ignition == 'ON' && speed == 0 && hoursDiff < 24) {
                            color = "yellow";
                            icon = "assets/images/truck.svg";
                        } else if (ignition == 'ON' && speed > 50 && hoursDiff < 24) {
                            color = "#e62e2d";
                            icon = "assets/images/truck.svg";
                        } else if (hoursDiff > 24) {
                            color = "#c34c9c";
                            icon = "assets/images/truck.svg";
                        }

                        marker = markers[id]
                        marker.setIcon({
                            path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW,
                            scale: 6,
                            fillColor: color,
                            fillOpacity: 0.8,
                            strokeWeight: 1,
                            rotation: parseInt(
                                angle) //this is how to rotate the pointer
                        })

                        animatedMove(marker, 5, marker.position, new google.maps.LatLng(lat,
                            lng));
                        // map.setCenter(new google.maps.LatLng(lat, lng));

                    }

                });

            }
        }, 10000);

        var refreshId2 = setInterval(function() {
            updated_data()
        }, 10000);



        ///Count Of Vehicles
        count();


        $("#myInput").keydown(function() {
            $("#d2").empty();
            var filter = $(this).val();
            ///Vehicle Search
            var settings = {
                "url": "<?php echo $api_url_map;?>map_apis/vehi_search.php?accesskey=12345&str=" +
                    filter + "&sel=" + sele + "&user=" + user_id,
                "method": "GET",
                "timeout": 0,
            };

            $.ajax(settings).done(function(response) {
                const data = JSON.parse(response);
                //console.log(data.length);
                var i;
                for (i = 0; i < data.length; i++) {
                    // //console.log(data[i]['car_name']);
                    var server_time = moment(data[i]['time']).format('MM/DD/YYYY hh:mm A');
                    var current_time = moment().format('MM/DD/YYYY hh:mm A');
                    var a = moment(server_time, 'MM/DD/YYYY hh:mm A');
                    var b = moment(current_time, 'MM/DD/YYYY hh:mm A');
                    var diffDays = b.diff(a, 'minutes');

                    var div;
                    if (sele == 1) {
                        div = '' +
                            '                                                   <li class="list-unstyled" data-geo-lat="' +
                            data[i]['lat'] + '" data-geo-long="' + data[i]['lng'] + '">' +
                            '                                                        <div class="card p-0  mb-1 ss" id="' +
                            data[i]['id'] + '">' +
                            '                                                            <div class="card-body p-2">' +
                            '                                                                <div class="row p-0 mb-0 ">' +
                            '                                                                    <div class="col-lg-5">' +
                            '                                                                        <h4 class="card-title mb-1" style="vertical-align: middle;display: flex;"><span style="background-color: red" class="dot"></span> &nbsp' +
                            '                                                                            ' +
                            data[i]['name'] + '</h4>' +
                            '                                                                    </div>' +
                            '                                                                    <div class="col-lg-7" style="text-align: right;">' +
                            '                                                                        <p class="p-0 font-size-12 mb-1" id="' +
                            data[i]['id'] + '-time">' + data[i]['time'] +
                            '                                                                        </p>' +
                            '                                                                    </div>' +
                            '                                                                </div>' +
                            '                                                                <div class="row p-0 mb-0 mt-0">' +
                            '                                                                    <div class="col-lg-5">' +
                            '                                                                        <i class="fas fa-tachometer-alt font-size-10"></i>' +
                            '                                                                        &nbsp; ' +
                            data[i]['speed'] + ' km/h' +
                            '                                                                    </div>' +
                            '                                                                    <div class="col-lg-7" style="text-align: right;">' +
                            '                                                                        <i class="fas fa-key"' +
                            '                                                                            style="color: rgb(185, 8, 8);"></i> &nbsp; <i' +
                            '                                                                            class="fas fa-power-off"' +
                            '                                                                            style="color: rgb(8, 185, 17);"></i>' +
                            '                                                                    </div>' +
                            '                                                                </div>' +
                            '                                                                <div class="row p-0 mb-0 mt-0">' +
                            '                                                                    <div class="col-lg-7">  ' +
                            '                                                                        <i class="fas fa-map-marker-alt font-size-10"' +
                            '                                                                            style="color: rgb(33, 114, 189);"></i>' +
                            '                                                                        &nbsp; ' +
                            data[i]['location'] +
                            '                                                                    </div>' +
                            '                                                                    <div class="col-lg-5" style="text-align: right;">' +
                            '                                                                                                        <i class="fas fa-building" style="color: rgb(240, 34, 96);"></i> ' +
                            data[i]['trackername'] + '' +
                            '                                                                                                    </div>' +
                            '                                                                </div>' +
                            '                                                            </div>' +
                            '                                                        </div>' +
                            '                                                    </li>';


                    } else if (sele == 2) {
                        div = '' +
                            '                                                   <li class="list-unstyled" data-geo-lat="' +
                            data[i]['lat'] + '" data-geo-long="' + data[i]['lng'] + '">' +
                            '                                                        <div class="card p-0  mb-1 ss" id="' +
                            data[i]['id'] + '">' +
                            '                                                            <div class="card-body p-2">' +
                            '                                                                <div class="row p-0 mb-0 ">' +
                            '                                                                    <div class="col-lg-5">' +
                            '                                                                        <h4 class="card-title mb-1" style="vertical-align: middle;display: flex;"><span style="background-color: #1D738D" class="dot"></span> &nbsp' +
                            '                                                                            ' +
                            data[i]['name'] + '</h4>' +
                            '                                                                    </div>' +
                            '                                                                    <div class="col-lg-7" style="text-align: right;">' +
                            '                                                                        <p class="p-0 font-size-12 mb-1" id="' +
                            data[i]['id'] + '-time">' + data[i]['time'] +
                            '                                                                        </p>' +
                            '                                                                    </div>' +
                            '                                                                </div>' +
                            '                                                                <div class="row p-0 mb-0 mt-0">' +
                            '                                                                    <div class="col-lg-5">' +
                            '                                                                        <i class="fas fa-tachometer-alt font-size-10"></i>' +
                            '                                                                        &nbsp; ' +
                            data[i]['speed'] + ' km/h' +
                            '                                                                    </div>' +
                            '                                                                    <div class="col-lg-7" style="text-align: right;">' +
                            '                                                                        <i class="fas fa-key"' +
                            '                                                                            style="color: rgb(185, 8, 8);"></i> &nbsp; <i' +
                            '                                                                            class="fas fa-power-off"' +
                            '                                                                            style="color: rgb(8, 185, 17);"></i>' +
                            '                                                                    </div>' +
                            '                                                                </div>' +
                            '                                                                <div class="row p-0 mb-0 mt-0">' +
                            '                                                                    <div class="col-lg-7">  ' +
                            '                                                                        <i class="fas fa-map-marker-alt font-size-10"' +
                            '                                                                            style="color: rgb(33, 114, 189);"></i>' +
                            '                                                                        &nbsp; ' +
                            data[i]['location'] +
                            '                                                                    </div>' +
                            '                                                                    <div class="col-lg-5" style="text-align: right;">' +
                            '                                                                                                        <i class="fas fa-building" style="color: rgb(240, 34, 96);"></i> ' +
                            data[i]['trackername'] + '' +
                            '                                                                                                    </div>' +
                            '                                                                </div>' +
                            '                                                            </div>' +
                            '                                                        </div>' +
                            '                                                    </li>';


                    } else if (sele == 3) {
                        div = '' +
                            '                                                   <li class="list-unstyled" data-geo-lat="' +
                            data[i]['lat'] + '" data-geo-long="' + data[i]['lng'] + '">' +
                            '                                                        <div class="card p-0  mb-1 ss" id="' +
                            data[i]['id'] + '">' +
                            '                                                            <div class="card-body p-2">' +
                            '                                                                <div class="row p-0 mb-0 ">' +
                            '                                                                    <div class="col-lg-5">' +
                            '                                                                        <h4 class="card-title mb-1" style="vertical-align: middle;display: flex;"><span style="background-color: yellow" class="dot"></span> &nbsp' +
                            '                                                                            ' +
                            data[i]['name'] + '</h4>' +
                            '                                                                    </div>' +
                            '                                                                    <div class="col-lg-7" style="text-align: right;">' +
                            '                                                                        <p class="p-0 font-size-12 mb-1" id="' +
                            data[i]['id'] + '-time">' + data[i]['time'] +
                            '                                                                        </p>' +
                            '                                                                    </div>' +
                            '                                                                </div>' +
                            '                                                                <div class="row p-0 mb-0 mt-0">' +
                            '                                                                    <div class="col-lg-5">' +
                            '                                                                        <i class="fas fa-tachometer-alt font-size-10"></i>' +
                            '                                                                        &nbsp; ' +
                            data[i]['speed'] + ' km/h' +
                            '                                                                    </div>' +
                            '                                                                    <div class="col-lg-7" style="text-align: right;">' +
                            '                                                                        <i class="fas fa-key"' +
                            '                                                                            style="color: rgb(185, 8, 8);"></i> &nbsp; <i' +
                            '                                                                            class="fas fa-power-off"' +
                            '                                                                            style="color: rgb(8, 185, 17);"></i>' +
                            '                                                                    </div>' +
                            '                                                                </div>' +
                            '                                                                <div class="row p-0 mb-0 mt-0">' +
                            '                                                                    <div class="col-lg-7">  ' +
                            '                                                                        <i class="fas fa-map-marker-alt font-size-10"' +
                            '                                                                            style="color: rgb(33, 114, 189);"></i>' +
                            '                                                                        &nbsp; ' +
                            data[i]['location'] +
                            '                                                                    </div>' +
                            '                                                                    <div class="col-lg-5" style="text-align: right;">' +
                            '                                                                                                        <i class="fas fa-building" style="color: rgb(240, 34, 96);"></i> ' +
                            data[i]['trackername'] + '' +
                            '                                                                                                    </div>' +
                            '                                                                </div>' +
                            '                                                            </div>' +
                            '                                                        </div>' +
                            '                                                    </li>';


                    } else if (sele == 4) {
                        div = '' +
                            '                                                   <li class="list-unstyled" data-geo-lat="' +
                            data[i]['lat'] + '" data-geo-long="' + data[i]['lng'] + '">' +
                            '                                                        <div class="card p-0  mb-1 ss" id="' +
                            data[i]['id'] + '">' +
                            '                                                            <div class="card-body p-2">' +
                            '                                                                <div class="row p-0 mb-0 ">' +
                            '                                                                    <div class="col-lg-5">' +
                            '                                                                        <h4 class="card-title mb-1" style="vertical-align: middle;display: flex;"><span style="background-color: #cb0ded" class="dot"></span> &nbsp' +
                            '                                                                            ' +
                            data[i]['name'] + '</h4>' +
                            '                                                                    </div>' +
                            '                                                                    <div class="col-lg-7" style="text-align: right;">' +
                            '                                                                        <p class="p-0 font-size-12 mb-1" id="' +
                            data[i]['id'] + '-time">' + data[i]['time'] +
                            '                                                                        </p>' +
                            '                                                                    </div>' +
                            '                                                                </div>' +
                            '                                                                <div class="row p-0 mb-0 mt-0">' +
                            '                                                                    <div class="col-lg-5">' +
                            '                                                                        <i class="fas fa-tachometer-alt font-size-10"></i>' +
                            '                                                                        &nbsp; ' +
                            data[i]['speed'] + ' km/h' +
                            '                                                                    </div>' +
                            '                                                                    <div class="col-lg-7" style="text-align: right;">' +
                            '                                                                        <i class="fas fa-key"' +
                            '                                                                            style="color: rgb(185, 8, 8);"></i> &nbsp; <i' +
                            '                                                                            class="fas fa-power-off"' +
                            '                                                                            style="color: rgb(8, 185, 17);"></i>' +
                            '                                                                    </div>' +
                            '                                                                </div>' +
                            '                                                                <div class="row p-0 mb-0 mt-0">' +
                            '                                                                    <div class="col-lg-7">  ' +
                            '                                                                        <i class="fas fa-map-marker-alt font-size-10"' +
                            '                                                                            style="color: rgb(33, 114, 189);"></i>' +
                            '                                                                        &nbsp; ' +
                            data[i]['location'] +
                            '                                                                    </div>' +
                            '                                                                    <div class="col-lg-5" style="text-align: right;">' +
                            '                                                                                                        <i class="fas fa-building" style="color: rgb(240, 34, 96);"></i> ' +
                            data[i]['trackername'] + '' +
                            '                                                                                                    </div>' +
                            '                                                                </div>' +
                            '                                                            </div>' +
                            '                                                        </div>' +
                            '                                                    </li>';


                    } else if (sele == 5) {
                        div = '' +
                            '                                                   <li class="list-unstyled" data-geo-lat="' +
                            data[i]['lat'] + '" data-geo-long="' + data[i]['lng'] + '">' +
                            '                                                        <div class="card p-0  mb-1 ss" id="' +
                            data[i]['id'] + '">' +
                            '                                                            <div class="card-body p-2">' +
                            '                                                                <div class="row p-0 mb-0 ">' +
                            '                                                                    <div class="col-lg-5">' +
                            '                                                                        <h4 class="card-title mb-1" style="vertical-align: middle;display: flex;"><span style="background-color: #fd625e" class="dot"></span> &nbsp' +
                            '                                                                            ' +
                            data[i]['name'] + '</h4>' +
                            '                                                                    </div>' +
                            '                                                                    <div class="col-lg-7" style="text-align: right;">' +
                            '                                                                        <p class="p-0 font-size-12 mb-1" id="' +
                            data[i]['id'] + '-time">' + data[i]['time'] +
                            '                                                                        </p>' +
                            '                                                                    </div>' +
                            '                                                                </div>' +
                            '                                                                <div class="row p-0 mb-0 mt-0">' +
                            '                                                                    <div class="col-lg-5">' +
                            '                                                                        <i class="fas fa-tachometer-alt font-size-10"></i>' +
                            '                                                                        &nbsp; ' +
                            data[i]['speed'] + ' km/h' +
                            '                                                                    </div>' +
                            '                                                                    <div class="col-lg-7" style="text-align: right;">' +
                            '                                                                        <i class="fas fa-key"' +
                            '                                                                            style="color: rgb(185, 8, 8);"></i> &nbsp; <i' +
                            '                                                                            class="fas fa-power-off"' +
                            '                                                                            style="color: rgb(8, 185, 17);"></i>' +
                            '                                                                    </div>' +
                            '                                                                </div>' +
                            '                                                                <div class="row p-0 mb-0 mt-0">' +
                            '                                                                    <div class="col-lg-7">  ' +
                            '                                                                        <i class="fas fa-map-marker-alt font-size-10"' +
                            '                                                                            style="color: rgb(33, 114, 189);"></i>' +
                            '                                                                        &nbsp; ' +
                            data[i]['location'] +
                            '                                                                    </div>' +
                            '                                                                    <div class="col-lg-5" style="text-align: right;">' +
                            '                                                                                                        <i class="fas fa-building" style="color: rgb(240, 34, 96);"></i> ' +
                            data[i]['trackername'] + '' +
                            '                                                                                                    </div>' +
                            '                                                                </div>' +
                            '                                                            </div>' +
                            '                                                        </div>' +
                            '                                                    </li>';


                    } else if (sele == 6) {
                        div = '' +
                            '                                                   <li class="list-unstyled" data-geo-lat="' +
                            data[i]['lat'] + '" data-geo-long="' + data[i]['lng'] + '">' +
                            '                                                        <div class="card p-0  mb-1 ss" id="' +
                            data[i]['id'] + '">' +
                            '                                                            <div class="card-body p-2">' +
                            '                                                                <div class="row p-0 mb-0 ">' +
                            '                                                                    <div class="col-lg-5">' +
                            '                                                                        <h4 class="card-title mb-1" style="vertical-align: middle;display: flex;"><span style="background-color: #32a58b" class="dot"></span> &nbsp' +
                            '                                                                            ' +
                            data[i]['name'] + '</h4>' +
                            '                                                                    </div>' +
                            '                                                                    <div class="col-lg-7" style="text-align: right;">' +
                            '                                                                        <p class="p-0 font-size-12 mb-1" id="' +
                            data[i]['id'] + '-time">' + data[i]['time'] +
                            '                                                                        </p>' +
                            '                                                                    </div>' +
                            '                                                                </div>' +
                            '                                                                <div class="row p-0 mb-0 mt-0">' +
                            '                                                                    <div class="col-lg-5">' +
                            '                                                                        <i class="fas fa-tachometer-alt font-size-10"></i>' +
                            '                                                                        &nbsp; ' +
                            data[i]['speed'] + ' km/h' +
                            '                                                                    </div>' +
                            '                                                                    <div class="col-lg-7" style="text-align: right;">' +
                            '                                                                        <i class="fas fa-key"' +
                            '                                                                            style="color: rgb(185, 8, 8);"></i> &nbsp; <i' +
                            '                                                                            class="fas fa-power-off"' +
                            '                                                                            style="color: rgb(8, 185, 17);"></i>' +
                            '                                                                    </div>' +
                            '                                                                </div>' +
                            '                                                                <div class="row p-0 mb-0 mt-0">' +
                            '                                                                    <div class="col-lg-7">  ' +
                            '                                                                        <i class="fas fa-map-marker-alt font-size-10"' +
                            '                                                                            style="color: rgb(33, 114, 189);"></i>' +
                            '                                                                        &nbsp; ' +
                            data[i]['location'] +
                            '                                                                    </div>' +
                            '                                                                    <div class="col-lg-5" style="text-align: right;">' +
                            '                                                                                                        <i class="fas fa-building" style="color: rgb(240, 34, 96);"></i> ' +
                            data[i]['trackername'] + '' +
                            '                                                                                                    </div>' +
                            '                                                                </div>' +
                            '                                                            </div>' +
                            '                                                        </div>' +
                            '                                                    </li>';


                    } else {
                        div = '';
                    }

                    document.getElementById("d2").innerHTML += div;
                }
            });
        });



        callVehic(10, 1);
    });
    ////STOP CLICKED
    function diff_minutes(dt2, dt1) {

        var diff = (dt2.getTime() - dt1.getTime()) / 1000;
        diff /= 60;
        return Math.abs(Math.round(diff));

    }

    function timeConvert(n) {
        var num = n;
        var hours = (num / 60);
        var rhours = Math.floor(hours);
        var minutes = (hours - rhours) * 60;
        var rminutes = Math.round(minutes);
        return rhours + ":" + rminutes;
    }

    function updated_data() {

        if (focused == 0) {
            //console.log('not selected');
        } else {

            var settings = {
                "url": "<?php echo $api_url_map;?>map_apis/selected_vehicle.php?vehi=" + focused + "&accesskey=12345",
                "method": "GET",
                "timeout": 0,
            };
            //console.log("<?php echo $api_url_map;?>map_apis/selected_vehicle.php?vehi=" + focused + "&accesskey=12345");

            $.ajax(settings).done(function(response) {
                const data = JSON.parse(response);
                for (i = 0; i < data.length; i++) {
                    var lat = data[i]['lat'];
                    var lng = data[i]['lng'];
                    var id = data[i]['id'];
                    var location = data[i]['location'];
                    var speed = data[i]['speed'];
                    var time = data[i]['time'];
                    var ignition = data[i]['ignition'];
                    var ignition = data[i]['ignition'];
                    var angle = data[i]['angle'];
                    odo_n = parseInt(data[i]['odometer']);
                    odo = odo_n - odo;
                    document.getElementById("offcanvasRightLabel").innerHTML = data[i]['name'];
                    //  document.getElementById("km").innerHTML = odo +"KM"
                    // //console.log(odo);
                    document.getElementById("odometer").innerHTML = data[i]['odometer'];
                    document.getElementById("locations").innerHTML = data[i]['location'];
                    document.getElementById("lasttime").innerHTML = data[i]['time'];
                    document.getElementById("latlng").innerHTML = lat + "," + lng;
                    // var hms = "01:12:33";
                    var target = new Date(time);
                    //console.log(target);
                    var currentdate = new Date();

                    var n = diff_minutes(target, currentdate)
                    document.getElementById("timet").innerHTML = timeConvert(n);

                    var canvas = document.getElementById("tacho");
                    canvas.dataset.value = speed;
                    // canvas.dataset.value.text = data[i]['odometer']+"km";
                    document.getElementById("status").style.display = "block";
                    var m1 = moment(new Date(time));
                    var m2 = moment(new Date());
                    // var m2 = m1.clone().add(59, 'seconds');

                    var hoursDiff = m2.diff(m1, 'hours');
                    //console.log('Hours:' + hoursDiff);
                    // document.getElementById(id+'-time').innerHTML = time;
                    var icon;
                    var color;
                    if (ignition == "OFF" && speed == 0 && hoursDiff < 24) {
                        color = "red";
                        icon = "assets/images/truck2.svg";
                    }
                    if (ignition == 'ON' && speed > 0 && speed <= 50 && hoursDiff < 24) {
                        color = "#1D738D";
                        icon = "assets/images/truck.svg";
                    }
                    if (ignition == 'ON' && speed == 0 && hoursDiff < 24) {
                        color = "yellow";
                        icon = "assets/images/truck.svg";
                    }
                    if (ignition == 'ON' && speed > 50 && hoursDiff < 24) {
                        color = "#e62e2d";
                        icon = "assets/images/truck.svg";
                    }
                    if (hoursDiff > 24) {
                        color = "#c34c9c";
                        icon = "assets/images/truck.svg";
                    } else {
                        color = "#c34c9c";
                    }
                    if (ignition == "OFF") {
                        color = "red";
                        icon = "assets/images/truck2.svg";
                        document.getElementById("status").innerHTML = "Stopped";
                        $("#card_color").removeClass("badge-soft-success");
                        $("#card_color").addClass("badge-soft-danger");
                        $("#status").removeClass("bg-success");
                        $("#status").addClass("bg-danger");
                    } else if (ignition == 'ON') {
                        color = "#1D738D";
                        icon = "assets/images/truck.svg";
                        document.getElementById("status").innerHTML = "Running";
                        $("#card_color").removeClass("badge-soft-danger");
                        $("#card_color").addClass("badge-soft-success");
                        $("#status").removeClass("bg-danger");
                        $("#status").addClass("bg-success");
                    } else {
                        color = "green";
                        icon = "assets/images/truck.svg";

                    }

                    // else {

                    marker = markers[id]
                    marker.setIcon({
                        path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW,
                        scale: 6,
                        fillColor: color,
                        fillOpacity: 0.8,
                        strokeWeight: 1,
                        rotation: parseInt(angle) //this is how to rotate the pointer
                    })

                    animatedMove(marker, 5, marker.position, new google.maps.LatLng(lat, lng));
                    // map.setCenter(new google.maps.LatLng(lat, lng));
                    // }
                }

            });

            activity();
        }

    }

    $("#stop").click(function() {
        sele = 1;
        var myLatlng = new google.maps.LatLng(30.3753, 69.3451)
        map.setZoom(5);
        map.setCenter(myLatlng);
        ///Vehicle Search
        var settings = {
            "url": "<?php echo $api_url_map;?>map_apis/stopped_vehicle.php?accesskey=12345&user=" + user_id +
                "",
            "method": "GET",
            "timeout": 0,
        };

        $.ajax(settings).done(function(response) {
            const data = JSON.parse(response);
            //console.log(data.length);
            $("#d2").empty();
            var i;
            var l;
            if (data.length < 100) {
                l = data.length;

            } else {
                l = 100
            }
            for (i = 0; i < l; i++) {
                //console.log(data[i]['time']);
                // var ss = data[i]['time'];
                var server_time = moment(data[i]['time']).format('MM/DD/YYYY hh:mm A');
                var current_time = moment().format('MM/DD/YYYY hh:mm A');
                var a = moment(server_time, 'MM/DD/YYYY hh:mm A');
                var b = moment(current_time, 'MM/DD/YYYY hh:mm A');
                var diffDays = b.diff(a, 'minutes');

                var div;
                // if (data[i]['ignition'] == 'OFF') {
                div = '' +
                    '                                                   <li class="list-unstyled" data-geo-lat="' +
                    data[i]['lat'] + '" data-geo-long="' + data[i]['lng'] + '">' +
                    '                                                        <div class="card p-0  mb-1 ss" id="' +
                    data[i]['id'] + '">' +
                    '                                                            <div class="card-body p-2">' +
                    '                                                                <div class="row p-0 mb-0 ">' +
                    '                                                                    <div class="col-lg-5">' +
                    '                                                                        <h4 class="card-title mb-1" style="vertical-align: middle;display: flex;"><span style="background-color: red" class="dot"></span> &nbsp' +
                    '                                                                            ' +
                    data[i]['name'] + '</h4>' +
                    '                                                                    </div>' +
                    '                                                                    <div class="col-lg-7" style="text-align: right;">' +
                    '                                                                        <p class="p-0 font-size-12 mb-1" id="' +
                    data[i]['id'] + '-time">' + data[i]['time'] +
                    '                                                                        </p>' +
                    '                                                                    </div>' +
                    '                                                                </div>' +
                    '                                                                <div class="row p-0 mb-0 mt-0">' +
                    '                                                                    <div class="col-lg-5">' +
                    '                                                                        <i class="fas fa-tachometer-alt font-size-10"></i>' +
                    '                                                                        &nbsp; ' +
                    data[i]['speed'] + ' km/h' +
                    '                                                                    </div>' +
                    '                                                                    <div class="col-lg-7" style="text-align: right;">' +
                    '                                                                        <i class="fas fa-key"' +
                    '                                                                            style="color: rgb(185, 8, 8);"></i> &nbsp; <i' +
                    '                                                                            class="fas fa-power-off"' +
                    '                                                                            style="color: rgb(8, 185, 17);"></i>' +
                    '                                                                    </div>' +
                    '                                                                </div>' +
                    '                                                                <div class="row p-0 mb-0 mt-0">' +
                    '                                                                    <div class="col-lg-7">  ' +
                    '                                                                        <i class="fas fa-map-marker-alt font-size-10"' +
                    '                                                                            style="color: rgb(33, 114, 189);"></i>' +
                    '                                                                        &nbsp; ' +
                    data[i]['location'] +
                    '                                                                    </div>' +
                    '                                                                    <div class="col-lg-5" style="text-align: right;">' +
                    '                                                                                                        <i class="fas fa-building" style="color: rgb(240, 34, 96);"></i> ' +
                    data[i]['trackername'] + '' +
                    '                                                                                                    </div>' +
                    '                                                                </div>' +
                    '                                                            </div>' +
                    '                                                        </div>' +
                    '                                                    </li>';


                // }
                document.getElementById("d2").innerHTML += div;
            }

            setMapOnAll(null);
            markersArray = [];
            vehcile_selection.length = 0
            for (var i = 0; i < data.length; i++) {
                var id = data[i]['id'];
                var ignition = data[i]['ignition'];
                var angle = data[i]['angle'];
                var icon;
                if (ignition == "OFF") {
                    color = "red";
                    icon =
                        "http://iot.trackfleetio.com/images/Advance_vehicletype/Truck_Stopped_NORTH.png";
                } else {
                    color = "green";
                    icon =
                        "http://iot.trackfleetio.com/images/Advance_vehicletype/Truck_Running_NORTH.png";
                }
                var latlng = new google.maps.LatLng(data[i].lat, data[i].lng);
                setMarker(data[i]['lat'], data[i]['lng'], data[i]['speed'], data[i]['id'], data[i][
                    'name'
                ], data[i]['location'], data[i]['time'], 'red', angle)
                // markers.push(marker);
            }
        });
    });

    $("#nodata").click(function() {
        sele = 5;
        var myLatlng = new google.maps.LatLng(30.3753, 69.3451)
        map.setZoom(5);
        map.setCenter(myLatlng);
        ///Vehicle Search
        var settings = {
            "url": "<?php echo $api_url_map;?>map_apis/nodata.php?accesskey=12345&user=" + user_id + "",
            "method": "GET",
            "timeout": 0,
        };

        $.ajax(settings).done(function(response) {
            const data = JSON.parse(response);
            //console.log(data.length);
            $("#d2").empty();
            var i;
            var l;
            if (data.length < 100) {
                l = data.length;

            } else {
                l = 100
            }
            for (i = 0; i < l; i++) {
                // //console.log(data[i]['car_name']);

                var server_time = moment(data[i]['time']).format('MM/DD/YYYY hh:mm A');
                var current_time = moment().format('MM/DD/YYYY hh:mm A');
                var a = moment(server_time, 'MM/DD/YYYY hh:mm A');
                var b = moment(current_time, 'MM/DD/YYYY hh:mm A');
                var diffDays = b.diff(a, 'minutes');

                var div;
                // if (data[i]['ignition'] == 'OFF') {
                div = '' +
                    '                                                   <li class="list-unstyled" data-geo-lat="' +
                    data[i]['lat'] + '" data-geo-long="' + data[i]['lng'] + '">' +
                    '                                                        <div class="card p-0  mb-1 ss" id="' +
                    data[i]['id'] + '">' +
                    '                                                            <div class="card-body p-2">' +
                    '                                                                <div class="row p-0 mb-0 ">' +
                    '                                                                    <div class="col-lg-5">' +
                    '                                                                        <h4 class="card-title mb-1" style="vertical-align: middle;display: flex;"><span style="background-color: #e62e2d" class="dot"></span> &nbsp' +
                    '                                                                            ' +
                    data[i]['name'] + '</h4>' +
                    '                                                                    </div>' +
                    '                                                                    <div class="col-lg-7" style="text-align: right;">' +
                    '                                                                        <p class="p-0 font-size-12 mb-1" id="' +
                    data[i]['id'] + '-time">' + data[i]['time'] +
                    '                                                                        </p>' +
                    '                                                                    </div>' +
                    '                                                                </div>' +
                    '                                                                <div class="row p-0 mb-0 mt-0">' +
                    '                                                                    <div class="col-lg-5">' +
                    '                                                                        <i class="fas fa-tachometer-alt font-size-10"></i>' +
                    '                                                                        &nbsp; ' +
                    data[i]['speed'] + ' km/h' +
                    '                                                                    </div>' +
                    '                                                                    <div class="col-lg-7" style="text-align: right;">' +
                    '                                                                        <i class="fas fa-key"' +
                    '                                                                            style="color: rgb(185, 8, 8);"></i> &nbsp; <i' +
                    '                                                                            class="fas fa-power-off"' +
                    '                                                                            style="color: rgb(8, 185, 17);"></i>' +
                    '                                                                    </div>' +
                    '                                                                </div>' +
                    '                                                                <div class="row p-0 mb-0 mt-0">' +
                    '                                                                    <div class="col-lg-7">  ' +
                    '                                                                        <i class="fas fa-map-marker-alt font-size-10"' +
                    '                                                                            style="color: rgb(33, 114, 189);"></i>' +
                    '                                                                        &nbsp; ' +
                    data[i]['location'] +
                    '                                                                    </div>' +
                    '                                                                    <div class="col-lg-5" style="text-align: right;">' +
                    '                                                                                                        <i class="fas fa-building" style="color: rgb(240, 34, 96);"></i> ' +
                    data[i]['trackername'] + '' +
                    '                                                                                                    </div>' +
                    '                                                                </div>' +
                    '                                                            </div>' +
                    '                                                        </div>' +
                    '                                                    </li>';


                // }
                document.getElementById("d2").innerHTML += div;
            }

            setMapOnAll(null);
            markersArray = [];
            vehcile_selection.length = 0
            for (var i = 0; i < data.length; i++) {
                var id = data[i]['id'];
                var ignition = data[i]['ignition'];
                var angle = data[i]['angle'];
                var icon;
                var latlng = new google.maps.LatLng(data[i].lat, data[i].lng);
                setMarker(data[i]['lat'], data[i]['lng'], data[i]['speed'], data[i]['id'], data[i][
                    'name'
                ], data[i]['location'], data[i]['time'], '#e62e2d', angle)
                // markers.push(marker);
            }
        });
    });


    ///RUnning CLICKED;
    $("#running").click(function() {
        sele = 2;
        var myLatlng = new google.maps.LatLng(30.3753, 69.3451)
        map.setZoom(5);
        map.setCenter(myLatlng);
        ///Vehicle Search
        var settings = {
            "url": "<?php echo $api_url_map;?>map_apis/running.php?accesskey=12345&user=" + user_id + "",
            "method": "GET",
            "timeout": 0,
        };

        $.ajax(settings).done(function(response) {
            const data = JSON.parse(response);
            //console.log(data.length);
            $("#d2").empty();
            var i;
            var l;
            if (data.length < 100) {
                l = data.length;

            } else {
                l = 100
            }
            for (i = 0; i < l; i++) {
                // //console.log(data[i]['car_name']);
                var server_time = moment(data[i]['time']).format('MM/DD/YYYY hh:mm A');
                var current_time = moment().format('MM/DD/YYYY hh:mm A');
                var a = moment(server_time, 'MM/DD/YYYY hh:mm A');
                var b = moment(current_time, 'MM/DD/YYYY hh:mm A');
                var diffDays = b.diff(a, 'minutes');

                var div;
                div = '' +
                    '                                                   <li class="list-unstyled" data-geo-lat="' +
                    data[i]['lat'] + '" data-geo-long="' + data[i]['lng'] + '">' +
                    '                                                        <div class="card p-0  mb-1 ss" id="' +
                    data[i]['id'] + '">' +
                    '                                                            <div class="card-body p-2">' +
                    '                                                                <div class="row p-0 mb-0 ">' +
                    '                                                                    <div class="col-lg-5">' +
                    '                                                                        <h4 class="card-title mb-1" style="vertical-align: middle;display: flex;"><span style="background-color: #1D738D" class="dot"></span> &nbsp' +
                    '                                                                            ' +
                    data[i]['name'] + '</h4>' +
                    '                                                                    </div>' +
                    '                                                                    <div class="col-lg-7" style="text-align: right;">' +
                    '                                                                        <p class="p-0 font-size-12 mb-1" id="' +
                    data[i]['id'] + '-time">' + data[i]['time'] +
                    '                                                                        </p>' +
                    '                                                                    </div>' +
                    '                                                                </div>' +
                    '                                                                <div class="row p-0 mb-0 mt-0">' +
                    '                                                                    <div class="col-lg-5">' +
                    '                                                                        <i class="fas fa-tachometer-alt font-size-10"></i>' +
                    '                                                                        &nbsp; ' +
                    data[i]['speed'] + ' km/h' +
                    '                                                                    </div>' +
                    '                                                                    <div class="col-lg-7" style="text-align: right;">' +
                    '                                                                        <i class="fas fa-key"' +
                    '                                                                            style="color: rgb(185, 8, 8);"></i> &nbsp; <i' +
                    '                                                                            class="fas fa-power-off"' +
                    '                                                                            style="color: rgb(8, 185, 17);"></i>' +
                    '                                                                    </div>' +
                    '                                                                </div>' +
                    '                                                                <div class="row p-0 mb-0 mt-0">' +
                    '                                                                    <div class="col-lg-7">  ' +
                    '                                                                        <i class="fas fa-map-marker-alt font-size-10"' +
                    '                                                                            style="color: rgb(33, 114, 189);"></i>' +
                    '                                                                        &nbsp; ' +
                    data[i]['location'] +
                    '                                                                    </div>' +
                    '                                                                    <div class="col-lg-5" style="text-align: right;">' +
                    '                                                                                                        <i class="fas fa-building" style="color: rgb(240, 34, 96);"></i> ' +
                    data[i]['trackername'] + '' +
                    '                                                                                                    </div>' +
                    '                                                                </div>' +
                    '                                                            </div>' +
                    '                                                        </div>' +
                    '                                                    </li>';


                // }

                document.getElementById("d2").innerHTML += div;
            }

            setMapOnAll(null);
            markersArray = [];
            vehcile_selection = [];
            for (var i = 0; i < data.length; i++) {
                var id = data[i]['id'];
                var ignition = data[i]['ignition'];
                var angle = data[i]['angle'];
                var icon;
                if (ignition == "OFF") {
                    color = "red";
                    icon =
                        "http://iot.trackfleetio.com/images/Advance_vehicletype/Truck_Stopped_NORTH.png";
                } else {
                    color = "green";
                    icon =
                        "http://iot.trackfleetio.com/images/Advance_vehicletype/Truck_Running_NORTH.png";
                }
                var latlng = new google.maps.LatLng(data[i].lat, data[i].lng);
                setMarker(data[i]['lat'], data[i]['lng'], data[i]['speed'], data[i]['id'], data[i][
                    'name'
                ], data[i]['location'], data[i]['time'], '#1D738D', angle)
                // markers.push(marker);
            }

        });
    });


    ///IDLE CLICK

    $("#idle").click(function() {
        sele = 3;
        var myLatlng = new google.maps.LatLng(30.3753, 69.3451)
        map.setZoom(5);
        map.setCenter(myLatlng);
        ///Vehicle Search
        var settings = {
            "url": "<?php echo $api_url_map;?>map_apis/idle.php?accesskey=12345&user=" + user_id + "",
            "method": "GET",
            "timeout": 0,
        };

        $.ajax(settings).done(function(response) {
            const data = JSON.parse(response);
            //console.log(data.length);
            $("#d2").empty();
            var i;
            var l;
            if (data.length < 100) {
                l = data.length;

            } else {
                l = 100
            }
            for (i = 0; i < l; i++) {
                // //console.log(data[i]['car_name']);
                var server_time = moment(data[i]['time']).format('MM/DD/YYYY hh:mm A');
                var current_time = moment().format('MM/DD/YYYY hh:mm A');
                var a = moment(server_time, 'MM/DD/YYYY hh:mm A');
                var b = moment(current_time, 'MM/DD/YYYY hh:mm A');
                var diffDays = b.diff(a, 'minutes');

                var div;
                div = '' +
                    '                                                   <li class="list-unstyled" data-geo-lat="' +
                    data[i]['lat'] + '" data-geo-long="' + data[i]['lng'] + '">' +
                    '                                                        <div class="card p-0  mb-1 ss" id="' +
                    data[i]['id'] + '">' +
                    '                                                            <div class="card-body p-2">' +
                    '                                                                <div class="row p-0 mb-0 ">' +
                    '                                                                    <div class="col-lg-5">' +
                    '                                                                        <h4 class="card-title mb-1" style="vertical-align: middle;display: flex;"><span style="background-color: #f8e53b" class="dot"></span> &nbsp' +
                    '                                                                            ' +
                    data[i]['name'] + '</h4>' +
                    '                                                                    </div>' +
                    '                                                                    <div class="col-lg-7" style="text-align: right;">' +
                    '                                                                        <p class="p-0 font-size-12 mb-1" id="' +
                    data[i]['id'] + '-time">' + data[i]['time'] +
                    '                                                                        </p>' +
                    '                                                                    </div>' +
                    '                                                                </div>' +
                    '                                                                <div class="row p-0 mb-0 mt-0">' +
                    '                                                                    <div class="col-lg-5">' +
                    '                                                                        <i class="fas fa-tachometer-alt font-size-10"></i>' +
                    '                                                                        &nbsp; ' +
                    data[i]['speed'] + ' km/h' +
                    '                                                                    </div>' +
                    '                                                                    <div class="col-lg-7" style="text-align: right;">' +
                    '                                                                        <i class="fas fa-key"' +
                    '                                                                            style="color: rgb(185, 8, 8);"></i> &nbsp; <i' +
                    '                                                                            class="fas fa-power-off"' +
                    '                                                                            style="color: rgb(8, 185, 17);"></i>' +
                    '                                                                    </div>' +
                    '                                                                </div>' +
                    '                                                                <div class="row p-0 mb-0 mt-0">' +
                    '                                                                    <div class="col-lg-7">  ' +
                    '                                                                        <i class="fas fa-map-marker-alt font-size-10"' +
                    '                                                                            style="color: rgb(33, 114, 189);"></i>' +
                    '                                                                        &nbsp; ' +
                    data[i]['location'] +
                    '                                                                    </div>' +
                    '                                                                    <div class="col-lg-5" style="text-align: right;">' +
                    '                                                                                                        <i class="fas fa-building" style="color: rgb(240, 34, 96);"></i> ' +
                    data[i]['trackername'] + '' +
                    '                                                                                                    </div>' +
                    '                                                                </div>' +
                    '                                                            </div>' +
                    '                                                        </div>' +
                    '                                                    </li>';




                document.getElementById("d2").innerHTML += div;

            }

            setMapOnAll(null);
            markersArray = [];
            vehcile_selection.length = 0
            for (var i = 0; i < data.length; i++) {
                var id = data[i]['id'];
                var ignition = data[i]['ignition'];
                var angle = data[i]['angle'];
                var icon;
                if (ignition == "OFF") {
                    color = "red";
                    icon =
                        "http://iot.trackfleetio.com/images/Advance_vehicletype/Truck_Stopped_NORTH.png";
                } else {
                    color = "green";
                    icon =
                        "http://iot.trackfleetio.com/images/Advance_vehicletype/Truck_Running_NORTH.png";
                }
                var latlng = new google.maps.LatLng(data[i].lat, data[i].lng);
                setMarker(data[i]['lat'], data[i]['lng'], data[i]['speed'], data[i]['id'], data[i][
                    'name'
                ], data[i]['location'], data[i]['time'], 'yellow', angle)
                // markers.push(marker);
            }



        });
    });


    function setMapOnAll(map) {
        for (var i = 0; i < markersArray.length; i++) {
            markersArray[i].setMap(map);
        }
        // markersArray = [];
    }

    function delmarkers() {
        setMapOnAll(null)
        markersArray = [];
        vehcile_selection.length = 0
        flightPath.setMap(null);
    }

    ///INACTIVE

    ///IDLE CLICK

    $("#inactive").click(function() {
        sele = 4;
        var myLatlng = new google.maps.LatLng(30.3753, 69.3451)
        map.setZoom(5);
        map.setCenter(myLatlng);
        ///Vehicle Search
        var settings = {
            "url": "<?php echo $api_url_map;?>map_apis/inactive.php?accesskey=12345&user=" + user_id + "",
            "method": "GET",
            "timeout": 0,
        };

        $.ajax(settings).done(function(response) {
            const data = JSON.parse(response);
            //console.log(data.length);
            $("#d2").empty();
            var i;
            var l;
            if (data.length < 100) {
                l = data.length;

            } else {
                l = 100
            }
            for (i = 0; i < l; i++) {
                // //console.log(data[i]['car_name']);
                var server_time = moment(data[i]['time']).format('MM/DD/YYYY hh:mm A');
                var current_time = moment().format('MM/DD/YYYY hh:mm A');
                var a = moment(server_time, 'MM/DD/YYYY hh:mm A');
                var b = moment(current_time, 'MM/DD/YYYY hh:mm A');
                var diffDays = b.diff(a, 'minutes');

                var div;

                div = '' +
                    '                                                   <li class="list-unstyled" data-geo-lat="' +
                    data[i]['lat'] + '" data-geo-long="' + data[i]['lng'] + '">' +
                    '                                                        <div class="card p-0  mb-1 ss" id="' +
                    data[i]['id'] + '">' +
                    '                                                            <div class="card-body p-2">' +
                    '                                                                <div class="row p-0 mb-0 ">' +
                    '                                                                    <div class="col-lg-5">' +
                    '                                                                        <h4 class="card-title mb-1" style="vertical-align: middle;display: flex;"><span style="background-color: #c34c9c" class="dot"></span> &nbsp' +
                    '                                                                            ' +
                    data[i]['name'] + '</h4>' +
                    '                                                                    </div>' +
                    '                                                                    <div class="col-lg-7" style="text-align: right;">' +
                    '                                                                        <p class="p-0 font-size-12 mb-1" id="' +
                    data[i]['id'] + '-time">' + data[i]['time'] +
                    '                                                                        </p>' +
                    '                                                                    </div>' +
                    '                                                                </div>' +
                    '                                                                <div class="row p-0 mb-0 mt-0">' +
                    '                                                                    <div class="col-lg-5">' +
                    '                                                                        <i class="fas fa-tachometer-alt font-size-10"></i>' +
                    '                                                                        &nbsp; ' +
                    data[i]['speed'] + ' km/h' +
                    '                                                                    </div>' +
                    '                                                                    <div class="col-lg-7" style="text-align: right;">' +
                    '                                                                        <i class="fas fa-key"' +
                    '                                                                            style="color: rgb(185, 8, 8);"></i> &nbsp; <i' +
                    '                                                                            class="fas fa-power-off"' +
                    '                                                                            style="color: rgb(8, 185, 17);"></i>' +
                    '                                                                    </div>' +
                    '                                                                </div>' +
                    '                                                                <div class="row p-0 mb-0 mt-0">' +
                    '                                                                    <div class="col-lg-7">  ' +
                    '                                                                        <i class="fas fa-map-marker-alt font-size-10"' +
                    '                                                                            style="color: rgb(33, 114, 189);"></i>' +
                    '                                                                        &nbsp; ' +
                    data[i]['location'] +
                    '                                                                    </div>' +
                    '                                                                    <div class="col-lg-5" style="text-align: right;">' +
                    '                                                                                                        <i class="fas fa-building" style="color: rgb(240, 34, 96);"></i> ' +
                    data[i]['trackername'] + '' +
                    '                                                                                                    </div>' +
                    '                                                                </div>' +
                    '                                                            </div>' +
                    '                                                        </div>' +
                    '                                                    </li>';





                document.getElementById("d2").innerHTML += div;



            }

            setMapOnAll(null);
            markersArray = [];
            vehcile_selection.length = 0
            var i;
            for (var i = 0; i < data.length; i++) {
                var id = data[i]['id'];
                var ignition = data[i]['ignition'];
                var angle = data[i]['angle'];
                var icon;
                if (ignition == "OFF") {
                    color = "red";
                    icon =
                        "http://iot.trackfleetio.com/images/Advance_vehicletype/Truck_Stopped_NORTH.png";
                } else {
                    color = "green";
                    icon =
                        "http://iot.trackfleetio.com/images/Advance_vehicletype/Truck_Running_NORTH.png";
                }
                var latlng = new google.maps.LatLng(data[i].lat, data[i].lng);
                setMarker(data[i]['lat'], data[i]['lng'], data[i]['speed'], data[i]['id'], data[i][
                    'name'
                ], data[i]['location'], data[i]['time'], '#c34c9c', angle)
                // markers.push(marker);
            }
        });
    });


    ////TOTAL CLICK
    $("#total").click(function() {
        sele = 6;
        ///Vehicle Search
        var myLatlng = new google.maps.LatLng(30.3753, 69.3451)
        map.setZoom(5);
        map.setCenter(myLatlng);
        var settings = {
            "url": "<?php echo $api_url_map;?>map_apis/total.php?accesskey=12345&user=" + user_id + "",
            "method": "GET",
            "timeout": 0,
        };

        $.ajax(settings).done(function(response) {
            const data = JSON.parse(response);
            //console.log(data.length);
            $("#d2").empty();

            var i;
            var l;
            if (data.length < 100) {
                l = data.length;

            } else {
                l = 100
            }
            for (i = 0; i < l; i++) {
                // //console.log(data[i]['car_name']);
                var server_time = moment(data[i]['time']).format('MM/DD/YYYY hh:mm A');
                var current_time = moment().format('MM/DD/YYYY hh:mm A');
                var a = moment(server_time, 'MM/DD/YYYY hh:mm A');
                var b = moment(current_time, 'MM/DD/YYYY hh:mm A');
                var diffDays = b.diff(a, 'minutes');

                var div;
                // if (diffDays > 1440) {
                div = '' +
                    '                                                   <li class="list-unstyled" data-geo-lat="' +
                    data[i]['lat'] + '" data-geo-long="' + data[i]['lng'] + '">' +
                    '                                                        <div class="card p-0  mb-1 ss" id="' +
                    data[i]['id'] + '">' +
                    '                                                            <div class="card-body p-2">' +
                    '                                                                <div class="row p-0 mb-0 ">' +
                    '                                                                    <div class="col-lg-5">' +
                    '                                                                        <h4 class="card-title mb-1" style="vertical-align: middle;display: flex;"><span style="background-color: #32a58b" class="dot"></span> &nbsp' +
                    '                                                                            ' +
                    data[i]['name'] + '</h4>' +
                    '                                                                    </div>' +
                    '                                                                    <div class="col-lg-7" style="text-align: right;">' +
                    '                                                                        <p class="p-0 font-size-12 mb-1" id="' +
                    data[i]['id'] + '-time">' + data[i]['time'] +
                    '                                                                        </p>' +
                    '                                                                    </div>' +
                    '                                                                </div>' +
                    '                                                                <div class="row p-0 mb-0 mt-0">' +
                    '                                                                    <div class="col-lg-5">' +
                    '                                                                        <i class="fas fa-tachometer-alt font-size-10"></i>' +
                    '                                                                        &nbsp; ' +
                    data[i]['speed'] + ' km/h' +
                    '                                                                    </div>' +
                    '                                                                    <div class="col-lg-7" style="text-align: right;">' +
                    '                                                                        <i class="fas fa-key"' +
                    '                                                                            style="color: rgb(185, 8, 8);"></i> &nbsp; <i' +
                    '                                                                            class="fas fa-power-off"' +
                    '                                                                            style="color: rgb(8, 185, 17);"></i>' +
                    '                                                                    </div>' +
                    '                                                                </div>' +
                    '                                                                <div class="row p-0 mb-0 mt-0">' +
                    '                                                                    <div class="col-lg-7">  ' +
                    '                                                                        <i class="fas fa-map-marker-alt font-size-10"' +
                    '                                                                            style="color: rgb(33, 114, 189);"></i>' +
                    '                                                                        &nbsp; ' +
                    data[i]['location'] +
                    '                                                                    </div>' +
                    '                                                                    <div class="col-lg-5" style="text-align: right;">' +
                    '                                                                                                        <i class="fas fa-building" style="color: rgb(240, 34, 96);"></i> ' +
                    data[i]['trackername'] + '' +
                    '                                                                                                    </div>' +
                    '                                                                </div>' +
                    '                                                            </div>' +
                    '                                                        </div>' +
                    '                                                    </li>';


                // }


                document.getElementById("d2").innerHTML += div;
            }
        });
    });


    //////////////
    $('#d2').on('click', ".ss", function() {

        var aa = $(this)
        if (!aa.is('.bg-light')) {
            aa.addClass('bg-light');

            var my_id = this.id;

            if (image_selected.indexOf(my_id) == -1) {
                image_selected.push(my_id);

                var settings = {
                    "url": "<?php echo $api_url_map;?>map_apis/selected_vehicle.php?vehi=" + image_selected +
                        "&accesskey=12345",
                    "method": "GET",
                    "timeout": 0,
                };

                $.ajax(settings).done(function(response) {
                    const data = JSON.parse(response);
                    var l;
                    if (data.length < 100) {
                        l = data.length;

                    } else {
                        l = 100
                    }
                    for (i = 0; i < l; i++) {
                        var size = Object.keys(markers).length;
                        if (size > 0) {

                            if (vehcile_selection.indexOf(data[i]['id']) == -1) {
                                var lat = data[i]['lat'];
                                var lng = data[i]['lng'];
                                var id = data[i]['id'];
                                var ignition = data[i]['ignition'];
                                var angle = data[i]['angle'];
                                var speed = data[i]['speed'];
                                var time = data[i]['time'];

                                document.getElementById("odometer").innerHTML = data[i]['odometer'];
                                document.getElementById("locations").innerHTML = data[i]['location'];
                                document.getElementById("latlng").innerHTML = lat + "," + lng;
                                var target = new Date(time);
                                //console.log(time);
                                var currentdate = new Date();
                                //console.log(currentdate);
                                var m1 = moment(new Date(time));
                                var m2 = moment(new Date());
                                // var m2 = m1.clone().add(59, 'seconds');

                                var hoursDiff = m2.diff(m1, 'hours');
                                //console.log('Hours:' + hoursDiff);
                                // document.getElementById("odometer").innerHTML = data[i]['odometer'];
                                // document.getElementById("locations").innerHTML = data[i]['location'];
                                // document.getElementById("latlng").innerHTML = lat + "," + lng;

                                // document.getElementById(id+'-time').innerHTML = time;
                                var icon;
                                var color;
                                if (ignition == "OFF" && speed == 0 && hoursDiff < 24) {
                                    color = "red";
                                    icon = "assets/images/truck2.svg";
                                }
                                if (ignition == 'ON' && speed > 0 && speed <= 50 && hoursDiff < 24) {
                                    color = "#1D738D";
                                    icon = "assets/images/truck.svg";
                                }
                                if (ignition == 'ON' && speed == 0 && hoursDiff < 24) {
                                    color = "yellow";
                                    icon = "assets/images/truck.svg";
                                }
                                if (ignition == 'ON' && speed > 50 && hoursDiff < 24) {
                                    color = "#e62e2d";
                                    icon = "assets/images/truck.svg";
                                }
                                if (hoursDiff > 24) {
                                    color = "#c34c9c";
                                    icon = "assets/images/truck.svg";
                                }



                                var myLatlng = new google.maps.LatLng(lat, lng);
                                map.setZoom(13);
                                map.setCenter(myLatlng);
                                marker = new google.maps.Marker({
                                    map: map,
                                    id: id,
                                    animation: google.maps.Animation.DROP,
                                    position: myLatlng,
                                    label: data[i]['name'],
                                    labelAnchor: new google.maps.Point(22, 0),
                                    labelClass: "labels",
                                    icon: {
                                        path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW,
                                        scale: 6,
                                        fillColor: color,
                                        fillOpacity: 0.8,
                                        strokeWeight: 1,
                                        rotation: parseInt(
                                            angle) //this is how to rotate the pointer
                                    }
                                });
                                markers[id] = marker;
                                markersArray.push(marker);
                                vehcile_selection.push(data[i]['id']);
                                var yourContent = new google.maps.InfoWindow({
                                    content: data[i]['name']
                                });

                                google.maps.event.addListener(marker, 'click', function() {
                                    focused = id;

                                    // map.setZoom(15); 
                                    updated_data();
                                    basedata(focused);
                                    speedo(focused);
                                    var bsOffcanvas = new bootstrap.Offcanvas(myOffcanvas)
                                    bsOffcanvas.show()
                                    var qty = 1



                                });

                            }


                        } else {
                            var lat = data[i]['lat'];
                            var lng = data[i]['lng'];
                            var id = data[i]['id'];
                            var ignition = data[i]['ignition'];
                            var angle = data[i]['angle'];
                            var speed = data[i]['speed'];
                            var time = data[i]['time'];

                            document.getElementById("odometer").innerHTML = data[i]['odometer'];
                            document.getElementById("locations").innerHTML = data[i]['location'];
                            document.getElementById("latlng").innerHTML = lat + "," + lng;
                            var target = new Date(time).toLocaleString();
                            time = moment(time).format('YYYY-MM-D hh:mm:ss');

                            //console.log(time);
                            var currentdate = new Date().toLocaleString();
                            currentdate = moment(currentdate).format('YYYY-MM-D hh:mm:ss');
                            //console.log(currentdate);
                            var m1 = moment(new Date(time));
                            var m2 = moment(new Date());
                            // var m2 = m1.clone().add(59, 'seconds');

                            var hoursDiff = m2.diff(m1, 'hours');
                            //console.log('Hours:' + hoursDiff);
                            // var duration = moment.duration(currentdate.diff(time));
                            // var hours = duration.asHours();
                            // //console.log(hours);
                            if (ignition == "OFF" && speed == 0 && hoursDiff < 24) {
                                color = "red";
                                icon = "assets/images/truck2.svg";
                            }
                            if (ignition == 'ON' && speed > 0 && speed <= 50 && hoursDiff < 24) {
                                color = "#1D738D";
                                icon = "assets/images/truck.svg";
                            }
                            if (ignition == 'ON' && speed == 0 && hoursDiff < 24) {
                                color = "yellow";
                                icon = "assets/images/truck.svg";
                            }
                            if (ignition == 'ON' && speed > 50 && hoursDiff < 24) {
                                color = "#e62e2d";
                                icon = "assets/images/truck.svg";
                            }
                            if (hoursDiff > 24) {
                                color = "#c34c9c";
                                icon = "assets/images/truck.svg";
                            }

                            var myLatlng = new google.maps.LatLng(lat, lng);
                            map.setZoom(13);
                            map.setCenter(myLatlng);
                            marker = new google.maps.Marker({
                                map: map,
                                id: id,
                                animation: google.maps.Animation.DROP,
                                position: myLatlng,
                                label: data[i]['name'],
                                labelClass: "labels",
                                labelAnchor: new google.maps.Point(22, 0),
                                icon: {
                                    path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW,
                                    scale: 6,
                                    fillColor: color,
                                    fillOpacity: 0.8,
                                    strokeWeight: 1,
                                    rotation: parseInt(
                                        angle) //this is how to rotate the pointer
                                }
                            });
                            markers[id] = marker;
                            markersArray.push(marker);

                            vehcile_selection.push(data[i]['id']);
                            var yourContent = new google.maps.InfoWindow({
                                content: data[i]['name']
                            });

                            google.maps.event.addListener(marker, 'click', function() {
                                focused = id;

                                //console.log(focused);
                                updated_data();
                                basedata(focused);
                                // speed(focused)
                                var bsOffcanvas = new bootstrap.Offcanvas(myOffcanvas)
                                bsOffcanvas.show()

                            });

                            map.setZoom(5);
                            map.setCenter(myLatlng);
                        }



                    }
                });
                // new markerClusterer.MarkerClusterer({ markers, map });

            }
        } else {
            aa.removeClass('bg-light');
            var my_id = this.id;
            var index = image_selected.indexOf(my_id);
            var index2 = vehcile_selection.indexOf(my_id);
            if (index > -1) {
                image_selected.splice(index, 1);
            }
            if (index2 > -1) {
                vehcile_selection.splice(index2, 1);
            }
            var marker = markers[this.id];
            // find the marker by given id
            marker.setMap(null);
            // markerCluster.clearMarkers(marker[this.id]);
            // markerCluster = new MarkerClusterer(map, markers);
        }

        // //console.log("ID of selected images :" + image_selected);
        // $('#display').html("ID of selected images :"+image_selected);
    })


    function activity() {
        var settings = {
            "url": "<?php echo $api_url_map;?>map_apis/running_count.php?vehi=" + focused + "&accesskey=12345",
            "method": "GET",
            "timeout": 0,
        };

        $.ajax(settings).done(function(response) {
            const data = JSON.parse(response);
            // //console.log(data);
            document.getElementById("runn").innerHTML = toHoursAndMinutes(data['run']);
            document.getElementById("stopp").innerHTML = toHoursAndMinutes(data['stop']);
            document.getElementById("idlee").innerHTML = toHoursAndMinutes(data['idle']);
        });
    }

    function toHoursAndMinutes(totalMinutes) {
        const hours = Math.floor(totalMinutes / 60);
        const minutes = totalMinutes % 60;
        return hours + ":" + minutes + "Hrs";
    }


    var toggle = document.getElementById('toggle');
    var content = document.getElementById('content');

    toggle.addEventListener('click', function() {
        var op = document.getElementById("content").style.opacity;
        // content.classList.toggle('open');
        if (op == "1") {
            document.getElementById("content").style.opacity = "0";
            document.getElementById("content").style.visibility = "hidden";
        } else {
            document.getElementById("content").style.opacity = "1";
            document.getElementById("content").style.visibility = "visible";
        }
        //console.log('even fired!');

    });


    function setMarker(lat, lng, speeds, device_id, vehicle_name, location, last_time, color, angle) {
        //removeMarker(markerId);
        ids = device_id;
        // alert("Saa"+vehicle_name)
        var speed = speeds;


        // const mark = (speed > 0) ? fimage : image;


        var server_time = moment(last_time).format('MM/DD/YYYY hh:mm A');
        var current_time = moment().format('MM/DD/YYYY hh:mm A');
        var a = moment(server_time, 'MM/DD/YYYY hh:mm A');
        var b = moment(current_time, 'MM/DD/YYYY hh:mm A');
        var diffDays = b.diff(a, 'minutes');
        // alert(diffDays ) ;

        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(lat, lng),
            id: ids,
            animation: google.maps.Animation.DROP,
            map: map,
            icon: {
                path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW,
                scale: 6,
                fillColor: color,
                fillOpacity: 0.8,
                strokeWeight: 1,
                rotation: parseInt(angle) //this is how to rotate the pointer
            }
        });

        // allMyMarkers[ids] = marker
        markers[ids] = marker;
        // allMyMarkers.push( marker );
        markersArray.push(marker);

        vehcile_selection.push(ids);
        // var index = map.markers.length;
        // map.markers.push(marker /* new Point(map.markers.length, location.lat(), location.lng())*/ );

        var infowindow = new google.maps.InfoWindow({
            content: '<p>Details:' + '<p>Vehical # :' + vehicle_name + '</p>' + '<p>Location # :' + location +
                '</p>' + '<p>Latitude:' + lat + '</p>' + '<p>Longitude:' + lng + '</p>' + '<p>speed:' + speeds +
                '</p>' + '<p>Last:' + last_time + '</p>' + '<a href="run.php?id=' + ids +
                '" class="btn btn-primary">Live Tracking</a>'
        });
        marker.addListener('click', function() {
            // infowindow.open(map, marker);
            focused = marker['id'];
            //console.log(focused)
            updated_data();
            basedata(focused);
            speedo(focused);
            var bsOffcanvas = new bootstrap.Offcanvas(myOffcanvas)
            bsOffcanvas.show();


        });
    }

    function speedo(id) {
        var settings = {
            "url": "<?php echo $api_url_map;?>map_apis/speed.php?vehi=" + id + "&accesskey=12345",
            "method": "GET",
            "timeout": 0,
        };

        $.ajax(settings).done(function(response) {
            const data = JSON.parse(response);
            // //console.log(data[0]["odometer"]);
            avg = parseInt(data[0]["avg"]);
            max = parseInt(data[0]["max"]);
            // odo = odo_n - odo;
            document.getElementById("avg").innerHTML = avg + " Km/h"
            document.getElementById("max").innerHTML = max + " Km/h"
        });
    }

    function basedata(id) {

        var settings = {
            "url": "<?php echo $api_url_map;?>map_apis/base_data.php?vehi=" + id + "&accesskey=12345",
            "method": "GET",
            "timeout": 0,
        };

        $.ajax(settings).done(function(response) {
            const data = JSON.parse(response);
            //console.log(data[0]["odometer"]);
            odo = parseInt(data[0]["odometer"]);
            odo = odo_n - odo;
            document.getElementById("km").innerHTML = odo + " KM"
        });
    }

    function drawpath() {
        var settings = {
            "url": "<?php echo $api_url_map;?>map_apis/route.php?vehi=" + focused + "&accesskey=12345",
            "method": "GET",
            "timeout": 0,
        };

        $.ajax(settings).done(function(response) {
            const data = JSON.parse(response);
            //console.log(data);
            flightPath = new google.maps.Polyline({
                path: data,
                geodesic: true,
                strokeColor: "#FF0000",
                strokeOpacity: 1.0,
                strokeWeight: 2,
            });

            flightPath.setMap(map);

            //console.log(response);
        });

    }

    function animatedMove(marker, t, current, moveto) {
        var lat = current.lat();
        var lng = current.lng();

        var deltalat = (moveto.lat() - current.lat()) / 100;
        var deltalng = (moveto.lng() - current.lng()) / 100;

        var delay = 10 * t;
        for (var i = 0; i < 100; i++) {
            (function(ind) {
                setTimeout(
                    function() {
                        var lat = marker.position.lat();
                        var lng = marker.position.lng();
                        lat += deltalat;
                        lng += deltalng;
                        latlng = new google.maps.LatLng(lat, lng);
                        marker.setPosition(latlng);

                    }, delay * ind
                );
            })(i)
        }
    }


    function callVehic(pager, offseter) {
        page = pager + 100;
        offset = offseter + 10;
        var settings = {
            "url": "<?php echo $api_url_map;?>map_apis/sitara_all_vehi.php?accesskey=12345&user=" + user_id + "&page=" +
                page + "&offset=" + offset,
            "method": "GET",
            "timeout": 0,
        };

        $.ajax(settings).done(function(response) {
            const data = JSON.parse(response);

            var i;
            for (i = 0; i < data.length; i++) {
                var div="";
                var server_time = moment(data[i]['time']).format('MM/DD/YYYY hh:mm A');
                var current_time = moment().format('MM/DD/YYYY hh:mm A');
                var a = moment(server_time, 'MM/DD/YYYY hh:mm A');
                var b = moment(current_time, 'MM/DD/YYYY hh:mm A');
                var diffDays = b.diff(a, 'minutes');
                if (data[i]['ignition'] == 'OFF') {
                    div = '' +
                        '                                                   <li class="list-unstyled" data-geo-lat="' +
                        data[i]['lat'] + '" data-geo-long="' + data[i]['lng'] + '">' +
                        '                                                        <div class="card p-0  mb-1 ss" id="' +
                        data[i]['id'] + '">' +
                        '                                                            <div class="card-body p-2">' +
                        '                                                                <div class="row p-0 mb-0 ">' +
                        '                                                                    <div class="col-lg-5">' +
                        '                                                                        <h4 class="card-title mb-1" style="vertical-align: middle;display: flex;"><span style="background-color: red" class="dot"></span> &nbsp' +
                        '                                                                            ' + data[i]
                        ['name'] + '</h4>' +
                        '                                                                    </div>' +
                        '                                                                    <div class="col-lg-7" style="text-align: right;">' +
                        '                                                                        <p class="p-0 font-size-12 mb-1" id="' +
                        data[i]['id'] + '-time">' + data[i]['time'] +
                        '                                                                        </p>' +
                        '                                                                    </div>' +
                        '                                                                </div>' +
                        '                                                                <div class="row p-0 mb-0 mt-0">' +
                        '                                                                    <div class="col-lg-5">' +
                        '                                                                        <i class="fas fa-tachometer-alt font-size-10"></i>' +
                        '                                                                        &nbsp; ' +
                        data[i]['speed'] + ' km/h' +
                        '                                                                    </div>' +
                        '                                                                    <div class="col-lg-7" style="text-align: right;">' +
                        '                                                                        <i class="fas fa-key"' +
                        '                                                                            style="color: rgb(185, 8, 8);"></i> &nbsp; <i' +
                        '                                                                            class="fas fa-power-off"' +
                        '                                                                            style="color: rgb(8, 185, 17);"></i>' +
                        '                                                                    </div>' +
                        '                                                                </div>' +
                        '                                                                <div class="row p-0 mb-0 mt-0">' +
                        '                                                                    <div class="col-lg-7">  ' +
                        '                                                                        <i class="fas fa-map-marker-alt font-size-10"' +
                        '                                                                            style="color: rgb(33, 114, 189);"></i>' +
                        '                                                                        &nbsp; ' +
                        data[i]['location'] +
                        '                                                                    </div>' +
                        '                                                                    <div class="col-lg-5" style="text-align: right;">' +
                        '                                                                                                        <i class="fas fa-building" style="color: rgb(240, 34, 96);"></i> ' +
                        data[i]['trackername'] + '' +
                        '                                                                                                    </div>' +
                        '                                                                </div>' +
                        '                                                            </div>' +
                        '                                                        </div>' +
                        '                                                    </li>';


                }

                if (data[i]['ignition'] == 'ON' && data[i]['speed'] == 0) {
                    div = '' +
                        '                                                   <li class="list-unstyled" data-geo-lat="' +
                        data[i]['lat'] + '" data-geo-long="' + data[i]['lng'] + '">' +
                        '                                                        <div class="card p-0  mb-1 ss" id="' +
                        data[i]['id'] + '">' +
                        '                                                            <div class="card-body p-2">' +
                        '                                                                <div class="row p-0 mb-0 ">' +
                        '                                                                    <div class="col-lg-5">' +
                        '                                                                        <h4 class="card-title mb-1" style="vertical-align: middle;display: flex;"><span style="background-color: #f8e53b" class="dot"></span> &nbsp' +
                        '                                                                            ' + data[i]
                        ['name'] + '</h4>' +
                        '                                                                    </div>' +
                        '                                                                    <div class="col-lg-7" style="text-align: right;">' +
                        '                                                                        <p class="p-0 font-size-12 mb-1" id="' +
                        data[i]['id'] + '-time">' + data[i]['time'] +
                        '                                                                        </p>' +
                        '                                                                    </div>' +
                        '                                                                </div>' +
                        '                                                                <div class="row p-0 mb-0 mt-0">' +
                        '                                                                    <div class="col-lg-5">' +
                        '                                                                        <i class="fas fa-tachometer-alt font-size-10"></i>' +
                        '                                                                        &nbsp; ' +
                        data[i]['speed'] + ' km/h' +
                        '                                                                    </div>' +
                        '                                                                    <div class="col-lg-7" style="text-align: right;">' +
                        '                                                                        <i class="fas fa-key"' +
                        '                                                                            style="color: rgb(185, 8, 8);"></i> &nbsp; <i' +
                        '                                                                            class="fas fa-power-off"' +
                        '                                                                            style="color: rgb(8, 185, 17);"></i>' +
                        '                                                                    </div>' +
                        '                                                                </div>' +
                        '                                                                <div class="row p-0 mb-0 mt-0">' +
                        '                                                                    <div class="col-lg-7">  ' +
                        '                                                                        <i class="fas fa-map-marker-alt font-size-10"' +
                        '                                                                            style="color: rgb(33, 114, 189);"></i>' +
                        '                                                                        &nbsp; ' +
                        data[i]['location'] +
                        '                                                                    </div>' +
                        '                                                                    <div class="col-lg-5" style="text-align: right;">' +
                        '                                                                                                        <i class="fas fa-building" style="color: rgb(240, 34, 96);"></i> ' +
                        data[i]['trackername'] + '' +
                        '                                                                                                    </div>' +
                        '                                                                </div>' +
                        '                                                            </div>' +
                        '                                                        </div>' +
                        '                                                    </li>';


                }

                if (data[i]['speed'] > 0) {
                    div = '' +
                        '                                                   <li class="list-unstyled" data-geo-lat="' +
                        data[i]['lat'] + '" data-geo-long="' + data[i]['lng'] + '">' +
                        '                                                        <div class="card p-0  mb-1 ss" id="' +
                        data[i]['id'] + '">' +
                        '                                                            <div class="card-body p-2">' +
                        '                                                                <div class="row p-0 mb-0 ">' +
                        '                                                                    <div class="col-lg-5">' +
                        '                                                                        <h4 class="card-title mb-1" style="vertical-align: middle;display: flex;"><span style="background-color: green" class="dot"></span> &nbsp' +
                        '                                                                            ' + data[i]
                        ['name'] + '</h4>' +
                        '                                                                    </div>' +
                        '                                                                    <div class="col-lg-7" style="text-align: right;">' +
                        '                                                                        <p class="p-0 font-size-12 mb-1" id="' +
                        data[i]['id'] + '-time">' + data[i]['time'] +
                        '                                                                        </p>' +
                        '                                                                    </div>' +
                        '                                                                </div>' +
                        '                                                                <div class="row p-0 mb-0 mt-0">' +
                        '                                                                    <div class="col-lg-5">' +
                        '                                                                        <i class="fas fa-tachometer-alt font-size-10"></i>' +
                        '                                                                        &nbsp; ' +
                        data[i]['speed'] + ' km/h' +
                        '                                                                    </div>' +
                        '                                                                    <div class="col-lg-7" style="text-align: right;">' +
                        '                                                                        <i class="fas fa-key"' +
                        '                                                                            style="color: rgb(185, 8, 8);"></i> &nbsp; <i' +
                        '                                                                            class="fas fa-power-off"' +
                        '                                                                            style="color: rgb(8, 185, 17);"></i>' +
                        '                                                                    </div>' +
                        '                                                                </div>' +
                        '                                                                <div class="row p-0 mb-0 mt-0">' +
                        '                                                                    <div class="col-lg-7">  ' +
                        '                                                                        <i class="fas fa-map-marker-alt font-size-10"' +
                        '                                                                            style="color: rgb(33, 114, 189);"></i>' +
                        '                                                                        &nbsp; ' +
                        data[i]['location'] +
                        '                                                                    </div>' +
                        '                                                                    <div class="col-lg-5" style="text-align: right;">' +
                        '                                                                                                        <i class="fas fa-building" style="color: rgb(240, 34, 96);"></i> ' +
                        data[i]['trackername'] + '' +
                        '                                                                                                    </div>' +
                        '                                                                </div>' +
                        '                                                            </div>' +
                        '                                                        </div>' +
                        '                                                    </li>';


                }

                if (diffDays > 1440) {
                    div = '' +
                        '                                                   <li class="list-unstyled" data-geo-lat="' +
                        data[i]['lat'] + '" data-geo-long="' + data[i]['lng'] + '">' +
                        '                                                        <div class="card p-0  mb-1 ss" id="' +
                        data[i]['id'] + '">' +
                        '                                                            <div class="card-body p-2">' +
                        '                                                                <div class="row p-0 mb-0 ">' +
                        '                                                                    <div class="col-lg-5">' +
                        '                                                                        <h4 class="card-title mb-1" style="vertical-align: middle;display: flex;"><span style="background-color: blue" class="dot"></span> &nbsp' +
                        '                                                                            ' + data[i]
                        ['name'] + '</h4>' +
                        '                                                                    </div>' +
                        '                                                                    <div class="col-lg-7" style="text-align: right;">' +
                        '                                                                        <p class="p-0 font-size-12 mb-1" id="' +
                        data[i]['id'] + '-time">' + data[i]['time'] +
                        '                                                                        </p>' +
                        '                                                                    </div>' +
                        '                                                                </div>' +
                        '                                                                <div class="row p-0 mb-0 mt-0">' +
                        '                                                                    <div class="col-lg-5">' +
                        '                                                                        <i class="fas fa-tachometer-alt font-size-10"></i>' +
                        '                                                                        &nbsp; ' +
                        data[i]['speed'] + ' km/h' +
                        '                                                                    </div>' +
                        '                                                                    <div class="col-lg-7" style="text-align: right;">' +
                        '                                                                        <i class="fas fa-key"' +
                        '                                                                            style="color: rgb(185, 8, 8);"></i> &nbsp; <i' +
                        '                                                                            class="fas fa-power-off"' +
                        '                                                                            style="color: rgb(8, 185, 17);"></i>' +
                        '                                                                    </div>' +
                        '                                                                </div>' +
                        '                                                                <div class="row p-0 mb-0 mt-0">' +
                        '                                                                    <div class="col-lg-7">  ' +
                        '                                                                        <i class="fas fa-map-marker-alt font-size-10"' +
                        '                                                                            style="color: rgb(33, 114, 189);"></i>' +
                        '                                                                        &nbsp; ' +
                        data[i]['location'] +
                        '                                                                    </div>' +
                        '                                                                    <div class="col-lg-5" style="text-align: right;">' +
                        '                                                                                                        <i class="fas fa-building" style="color: rgb(240, 34, 96);"></i> ' +
                        data[i]['trackername'] + '' +
                        '                                                                                                    </div>' +
                        '                                                                </div>' +
                        '                                                            </div>' +
                        '                                                        </div>' +
                        '                                                    </li>';


                }


                document.getElementById("d2").innerHTML += div
            }
        });
    }

    function count() {
        var settings = {
            "url": "<?php echo $api_url_map;?>map_apis/counts.php?accesskey=12345&user=" + user_id + "",
            "method": "GET",
            "timeout": 0,
        };

        $.ajax(settings).done(function(response) {
            const data = JSON.parse(response);
            $("#stop").html(
                '<i class="far fa-stop-circle d-block font-size-16" style="color: rgb(250, 8, 8);"></i><b>' +
                data["stop"] + '</b>');
            $("#running").html(
                '<i class="fas fa-location-arrow d-block font-size-16" style="color: rgb(29, 115, 141);"></i><b>' +
                data["running"] + '</b>');
            $("#idle").html(
                '<i class="fas fa-hourglass-half d-block font-size-16" style="color: #E6B730;"></i><b>' +
                data["idle"] + '</b>');
            $("#inactive").html('<i class="fas fa-ban d-block font-size-16" style="color: #751386;"></i><b>' +
                data["inactive"] + '</b>');
            $("#nodata").html(
                '<i class="fab fa-creative-commons-zero d-block font-size-16" style="color: #a70000;"></i><b>' +
                data["nodata"] + '</b>');
            $("#total").html(
                '<i class="fas fa-check-double align-middle d-block font-size-16" style="color: rgb(89, 7, 184);"></i><b>' +
                data["total"] + '</b>');
        });
    }
    </script>
    <!-- Gmaps file -->
    <!-- <script src="assets/libs/gmaps/gmaps.min.js"></script> -->
    <!-- demo codes -->
    <!-- <script src="assets/js/pages/gmaps.init.js"></script> -->
    <script src="assets/js/app.js"></script>
</body>
<!-- Mirrored from themesbrand.com/minia/layouts/maps-google.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 31 Oct 2022 13:23:05 GMT -->

</html>