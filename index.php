<?php include 'env_set.php'; ?>
<!doctype html>
<html lang="en">


<!-- Mirrored from themesdesign.in/webadmin/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:00 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Login | <?php echo $name?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <script src="js_cdn/jquery_cdn.js"></script>
    <script src="js_cdn/swall.js"></script>
    
</head>
<style>
.bg {
    background-image: url("https://png.pngtree.com/thumb_back/fh260/background/20230706/pngtree-3d-rendered-concept-oil-pump-refinery-with-crude-oil-barrel-image_3787694.jpg");
    height: 100%;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;

}
</style>

<body>
<?php // $api_url = 'http://localhost/portalflowapis/'?>
    <!-- <body data-layout="horizontal"> -->

    <div class="authentication-bg min-vh-100 bg">
        <div class="bg-overlay bg-light"></div>
        <div class="container ">
            <div class="d-flex flex-column min-vh-100 px-3 pt-4">
                <div class="row justify-content-center my-auto">
                    <div class="col-md-8 col-lg-6 col-xl-5">

                        <div class="mb-4 pb-2">
                            <a href="index.html" class="d-block auth-logo">
                                <img src="<?php echo $api_url.''.$logo;?>" alt="" height="60"
                                    class="auth-logo-dark me-start">
                                <img src="<?php echo $api_url.''.$logo;?>" alt="" height="60"
                                    class="auth-logo-light me-start">
                            </a>
                        </div>

                        <div class="card">
                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5>Welcome Back !</h5>
                                    <p class="text-muted">Sign in to continue</p>
                                </div>
                                <div class="p-2 mt-4">

                                    <div class="mb-3">
                                        <label class="form-label" for="username">Username</label>
                                        <div class="position-relative input-custom-icon">
                                            <input type="text" class="form-control" id="username"
                                                placeholder="Enter username">
                                            <span class="bx bx-user"></span>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="float-end">
                                            <!-- <a href="auth-recoverpw.html"
                                                class="text-muted text-decoration-underline">Forgot password?</a> -->
                                        </div>
                                        <label class="form-label" for="password-input">Password</label>
                                        <div class="position-relative auth-pass-inputgroup input-custom-icon">
                                            <span class="bx bx-lock-alt"></span>
                                            <input type="password" class="form-control" id="password"
                                                placeholder="Enter password">
                                            <button type="button"
                                                class="btn btn-link position-absolute h-100 end-0 top-0"
                                                id="password-addon">
                                                <!-- <i class="mdi mdi-eye-outline font-size-18 text-muted"></i> -->
                                            </button>
                                        </div>
                                    </div>

                                    <!-- <div class="form-check py-1">
                                        <input type="checkbox" class="form-check-input" id="auth-remember-check">
                                        <label class="form-check-label" for="auth-remember-check">Remember
                                            me</label>
                                    </div> -->

                                    <div class="mt-3">
                                        <button class="btn btn-primary w-100 waves-effect waves-light" type="submit"
                                            onclick="do_login()">Log In</button>
                                    </div>




                                </div>

                            </div>
                        </div>

                    </div><!-- end col -->
                </div><!-- end row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center p-4">
                            <p>© <script>
                                document.write(new Date().getFullYear())
                                </script> . Crafted with <i class="mdi mdi-heart text-danger"></i></p>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- end container -->
    </div>
    <!-- end authentication section -->

    <!-- JAVASCRIPT -->
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenujs/metismenujs.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/eva-icons/eva.min.js"></script>

    <script src="assets/js/pages/pass-addon.init.js"></script>


    <script type="text/javascript">
    function do_login() {
        var username = $("#username").val();
        var password = $("#password").val();
        if (username != "" && password != "") {
            $("#loading_spinner").css({
                "display": "block"
            });
            $.ajax({
                type: 'post',
                url: 'session/session.php',
                data: {
                    do_login: "do_login",
                    username: username,
                    password: password
                },
                success: function(response) {
                    console.log(response)
                    if (response == 1) {

                        Swal.fire(
                            'Success!',
                            'Login Successfully',
                            'success'
                        )
                        window.location.href = "main_dashboard.php";
                    }  else {
                        Swal.fire(
                            'Authentication Error!',
                            'Your Login Name or Password is invalid',
                            'error'
                        )


                    }
                }
            });
        } else {
            Swal.fire(
                'Authentication Error!',
                'Please Fill All The Details',
                'error'
            )
        }


    }
    </script>

</body>


<!-- Mirrored from themesdesign.in/webadmin/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:01 GMT -->

</html>