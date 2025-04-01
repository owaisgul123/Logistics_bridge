<?php include 'session/session_input.php'; ?>
<!doctype html>
<html lang="en">


<!-- Mirrored from themesdesign.in/webadmin/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:03 GMT -->

<head>

    <meta charset="utf-8" />
    <title>
        Users |
        <?php echo $_SESSION['user_name']; ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- App favicon -->

    <?php include 'css_script.php'; ?>


</head>
<style>
    .password-container {
        position: relative;
        display: inline-block;
        width: 100%;
    }

    .password-input {
        padding-right: 30px;
        /* Space for the show/hide button */
    }

    .toggle-password {
        position: absolute;
        top: 50%;
        right: 20px;
        transform: translateY(-50%);
        cursor: pointer;
    }
</style>


<body>

    <!-- <body data-layout="horizontal"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">


        <?php include 'header.php'; ?>
        <!-- ========== Left Sidebar Start ========== -->
        <?php include 'sidebar.php'; ?>

        <!-- Left Sidebar End -->


        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <?php include 'right_sidebar.php'; ?>

        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-md-6">
                            <button class="btn btn-soft-primary waves-effect waves-light" type="button"
                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" id="add_btn"
                                aria-controls="offcanvasRight"><i
                                    class="bx bxs-add-to-queue font-size-16 align-middle me-2 cursor-pointer"></i>Add</button>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h3>Users</h3>

                            <table id="myTable" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">S.No</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Password</th>
                                        <th class="text-center">Privilege</th>
                                        <th class="text-center">Contact No</th>
                                        <!-- <th class="text-center">View</th> -->
                                        <th class="text-center">Delete</th>
                                        <th class="text-center">Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <?php include 'footer.php'; ?>

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->


    <!-- Right Sidebar -->

    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- chat offcanvas -->
    <div class="offcanvas offcanvas-end w-75" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header border-bottom">
            <h5 id="offcanvasRightLabel">Settings</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="container-fluid">
                <form method="post" id="insert_form" enctype="multipart/form-data">

                    <!-- User Table Fields -->
                    <div class="row mb-4">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4" style="margin: 8px 0px;">Username</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Username" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4" style="margin: 8px 0px;">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password" style="margin: 8px 0px;">Enter Password</label>
                            <input type="password" id="password" name="password" required minlength="10" class="form-control input" placeholder="Enter Password">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="confirm_password" style="margin: 8px 0px;">Confirm Password</label>
                            <input type="password" id="confirm_password" name="confirm_password" required minlength="10" class="form-control input" placeholder="Confirm Password">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="number" style="margin: 8px 0px;">Contact No</label>
                            <input type="text" class="form-control" id="number" name="number" placeholder="Enter Contact No">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="role" style="margin: 8px 0px;">Role</label>
                            <select class="form-control" id="role_id" name="role_id">
                                <option value="">Select Role</option>
                                <option value=1>Admin</option>
                                <option value=2>Trucking Company</option>
                                <option value=3>Clearing Agent</option>
                                <option value=4>Operational Manager</option>
                                <!-- <option value="Order">Order</option>
                                <option value="Logistics">Logistics</option> -->
                            </select>
                        </div>

                        <!-- Specific Roles -->
                       

                        <!-- User Info Table Fields -->
                        <div class="form-group col-md-6">
                            <label for="address_ho" style="margin: 8px 0px;">Head Office Address</label>
                            <input type="text" class="form-control" id="address_ho" name="address_ho" placeholder="Enter Head Office Address">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="address_1" style="margin: 8px 0px;">Branch 1 Address</label>
                            <input type="text" class="form-control" id="address_1" name="address_1" placeholder="Enter Branch 1 Address">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="address_2" style="margin: 8px 0px;">Branch 2 Address</label>
                            <input type="text" class="form-control" id="address_2" name="address_2" placeholder="Enter Branch 2 Address">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="address_3" style="margin: 8px 0px;">Branch 3 Address</label>
                            <input type="text" class="form-control" id="address_3" name="address_3" placeholder="Enter Branch 3 Address">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="ntn_no" style="margin: 8px 0px;">NTN No</label>
                            <input type="text" class="form-control" id="ntn_no" name="ntn_no" placeholder="Enter NTN Number">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="reg_no" style="margin: 8px 0px;">Registration No</label>
                            <input type="text" class="form-control" id="reg_no" name="reg_no" placeholder="Enter Registration Number">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="license_no" style="margin: 8px 0px;">License No</label>
                            <input type="text" class="form-control" id="license_no" name="license_no" placeholder="Enter License Number">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="validity" style="margin: 8px 0px;">Validity</label>
                            <input type="date" class="form-control" id="validity" name="validity">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nature_of_business" style="margin: 8px 0px;">Nature of Business</label>
                            <input type="text" class="form-control" id="nature_of_business" name="nature_of_business" placeholder="Enter Nature of Business">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="sub_role" style="margin: 8px 0px;">Sub Role</label>
                            <input type="text" class="form-control" id="sub_role" name="sub_role" placeholder="Enter Sub Role">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone" style="margin: 8px 0px;">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone_2" style="margin: 8px 0px;">Phone 2</label>
                            <input type="text" class="form-control" id="phone_2" name="phone_2" placeholder="Enter Alternative Phone Number">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="whatsapp_num" style="margin: 8px 0px;">Whatsapp Number</label>
                            <input type="text" class="form-control" id="whatsapp_num" name="whatsapp_num" placeholder="Enter Whatsapp Number">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="telegram" style="margin: 8px 0px;">Telegram</label>
                            <input type="text" class="form-control" id="telegram" name="telegram" placeholder="Enter Telegram Username">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="location" style="margin: 8px 0px;">Location</label>
                            <input type="text" class="form-control" id="location" name="location" placeholder="Enter Location">
                        </div>
                        <div class="col-md-12 text-center">

                            <input class="btn rounded-pill btn-primary" style="
                             margin: 10px 0px;"
                                type="submit" name="insert" id="insert" value="Save">
                        </div>

                        <div class="col-12">
                            <input type="hidden" name="row_id" id="row_id" value="0">


                        </div>
                    </div>
                </form>
            </div>

            <!-- JAVASCRIPT -->

            <?php include 'script_tags.php'; ?>

            <script>
                var table;
                var type;
                var subtype;
                load_all_select();
                $(document).ready(function() {
                    // $('.js-example-basic-multiple').select2();

                    var invalidChars = /[$&'".?/]/;

                    // Prevent typing invalid characters
                    $("#password, #confirm_password").on("keydown", function(event) {
                        var key = event.key;
                        if (invalidChars.test(key)) {
                            event.preventDefault(); // Stop the character from appearing in input
                        }
                    });

                    // Validate password match
                    function validatePassword() {
                        var password = $("#password").val();
                        var confirmPassword = $("#confirm_password").val();
                        var message = $("#message");

                        if (password.length < 10 || confirmPassword.length < 10) {
                            message.css("color", "red").text("Password must be at least 10 characters long.");
                        } else if (password !== confirmPassword) {
                            message.css("color", "red").text("Passwords do not match.");
                        } else {
                            message.css("color", "green").text("Passwords match!");
                        }
                    }

                    // Validate on input change
                    $("#password, #confirm_password").on("input", validatePassword);
                    $('#togglePassword').on('click', function() {
                        togglePasswordVisibility('password', 'togglePassword');
                    });

                    $('#toggleConfirmPassword').on('click', function() {
                        togglePasswordVisibility('confirm_password', 'toggleConfirmPassword');
                    });

                    function togglePasswordVisibility(inputId, toggleId) {
                        var passwordInput = $('#' + inputId);
                        var toggleButton = $('#' + toggleId);

                        var passwordType = passwordInput.attr('type');
                        if (passwordType === 'password') {
                            passwordInput.attr('type', 'text');
                            toggleButton.find('i').removeClass('fa-eye').addClass('fa-eye-slash');
                        } else {
                            passwordInput.attr('type', 'password');
                            toggleButton.find('i').removeClass('fa-eye-slash').addClass('fa-eye');
                        }
                    }

                    $("#role").on("change", function() {
                        var selectedRole = $(this).val();
                        // Hide all secondary dropdowns
                        $("#salesRole, #zmRole, #tmRole,#logisticsSelect").hide();
                        if (selectedRole === "Sales") {
                            $("#salesRole").show();
                        } else if (selectedRole === "Logistics") {
                            $("#logisticsSelect").show();
                        }
                    });

                    $("#sales").on("change", function() {
                        var selectedSalesRole = $(this).val();
                        // alert(selectedSalesRole)
                        // Hide all secondary dropdowns
                        $("#zmRole, #tmRole").hide();
                        if (selectedSalesRole === "TM") {
                            $("#zmRole").show();
                        } else if (selectedSalesRole === "ASM") {
                            $("#tmRole").show();
                        }
                    });

                    table = $('#myTable').DataTable({
                        dom: 'Bfrtip',


                        buttons: ['copy', 'excel', 'csv', 'pdf', 'print']

                    });

                    fetchtable();
                    $('#add_btn').click(function() {

                        $('#row_id').val("");

                        $('#insert_form')[0].reset();
                        // alert("running")

                    });

                    $('#insert_form').on("submit", function(event) {
                        update_id = $('#row_id').val();
                        if (update_id == 0) {
                            event.preventDefault();
                            // alert("Name")
                            var data = new FormData(this);
                            $.ajax({
                                url: "<?php echo $api_url2; ?>create/create_user.php",
                                cache: false,
                                contentType: false,
                                processData: false,
                                method: "POST",
                                data: data,
                                beforeSend: function() {
                                    $('#insert').val("Saving");
                                    document.getElementById("insert").disabled = true;

                                },
                                success: function(data) {
                                    data = JSON.parse(data)
                                    console.log(data)

                                    if (data.status === "success") {
                                        Swal.fire(
                                            'Success!',
                                            'Record Created Successfully',
                                            'success'
                                        )
                                        setTimeout(function() {
                                            $('#insert_form')[0].reset();
                                            $('#offcanvasRight').modal('hide');
                                            fetchtable();
                                            $("#salesRole, #zmRole, #tmRole,#logisticsSelect")
                                                .hide();
                                            $('#insert').val("Save");
                                            document.getElementById("insert").disabled = false;

                                            // location.reload();


                                        }, 2000);

                                    } else {
                                        // ------------------
                                        Swal.fire(
                                            'Server Error!',
                                            'Record Not Created',
                                            'error'
                                        )
                                        $('#insert').val("Save");
                                        document.getElementById("insert").disabled = false;


                                    }

                                }
                            });
                        } else {
                            event.preventDefault();
                            // alert("Name")
                            var data = new FormData(this);

                            $.ajax({
                                url: "<?php echo $api_url2; ?>update/update_user.php",
                                cache: false,
                                contentType: false,
                                processData: false,
                                method: "POST",
                                data: data,
                                beforeSend: function() {
                                    $('#insert').val("Saving");
                                    document.getElementById("insert").disabled = true;

                                },
                                success: function(data) {
                                    data = JSON.parse(data)
                                    console.log(data)

                                    if (data.status == "success") {
                                        Swal.fire(
                                            'Success!',
                                            'Record Updated Successfully',
                                            'success'
                                        )
                                        setTimeout(function() {
                                            $('#insert_form')[0].reset();
                                            $('#offcanvasRight').modal('hide');
                                            fetchtable();
                                            $("#salesRole, #zmRole, #tmRole,#logisticsSelect")
                                                .hide();
                                            $('#insert').val("Save");
                                            document.getElementById("insert").disabled = false;

                                        }, 2000);
                                        // ---------------
                                    } else {
                                        Swal.fire(
                                            'Server Error!',
                                            'Record Not Updated',
                                            'error'
                                        )
                                        $('#insert').val("Save");
                                        document.getElementById("insert").disabled = false;


                                        

                                            //     location.reload();



                                        // load_all_select()

                                    }

                                },
                                error: function(xhr, textStatus, errorThrown) {
                                    console.log(xhr)
                                    console.log(textStatus)
                                    console.log(errorThrown)
                                    Swal.fire(
                                        'Server Error!',
                                        'Record Not Updated',
                                        'error'

                                    )

                                    // console.log("Request failed with status code: " + xhr.status);
                                }
                            });


                        }
                    });

                })
                $('#password,#confirm_password').on('input', function() {
                    validatePassword();
                });


                function validatePassword() {
                    var password = $('#password').val();
                    var confirmPassword = $('#confirm_password').val();

                    if (password !== confirmPassword) {
                        var error_message = $('#message').html('Passwords do not match!').css('color', 'red');
                        $("#insert").prop("disabled", true);


                    } else {
                        var success_message = $('#message').html('Passwords match.').css('color', 'green');
                        $("#insert").prop("disabled", false);

                    }
                }


                function fetchtable() {

                    var requestOptions = {
                        method: 'GET',
                        redirect: 'follow'
                    };

                    // http://localhost/logistic_bridge_api/get/all_users.php?key=03201232927&user_id=1
                    fetch("<?php echo $api_url2; ?>get/all_users.php?key=03201232927&user_id=" + <?php echo $_SESSION['user_id'] ?> + "", requestOptions)
                        .then(response => response.json())
                        .then(response => {
                            console.log(response)
                            response = response['data'];

                            table.clear().draw();
                            $.each(response, function(index, data) {
                                let priv = data.role_id == 1 ? "Admin" : "Company";

                                table.row.add([
                                    index + 1,
                                    data.name,
                                    data.email,
                                    '********',
                                    priv,
                                    data.phone,
                                    // '<button type="button"id="edit" name="edit" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"  onclick="editData(' +
                                    // data.id +
                                    // ')"  class="btn btn-soft-warning waves-effect waves-light"><i class="bx bx-edit-alt font-size-16 align-middle"></i></button>',
                                    // '<button class="btn btn-soft-warning waves-effect waves-light" onclick = "get_user_log(' + <?php echo $_SESSION['user_id'] ?> + ')"><i class="fas fa-eye font-size-16 align-middle"></i></button>',
                                    '<button type="button" id="delete" name="delete" onclick="deleteData(' +
                                    data.id +
                                    ')" class="btn btn-soft-danger waves-effect waves-light"><i class="bx bx-trash-alt font-size-16 align-middle"></i></button>',
                                    '<button type="button" id="edit" name="edit"  onclick="editData(' +
                                    data.id +
                                    ')" class="btn btn-soft-danger waves-effect waves-light"><i class="bx bx-edit-alt font-size-16 align-middle"></i></button>'
                                ]).draw(false);
                            });
                        })
                        .catch(error => console.log('error', error));


                }


                function get_user_log(id) {

                    var requestOptions = {
                        method: 'GET',
                        redirect: 'follow'
                    };

                    fetch("<?php echo $api_url; ?>get/user_log.php?key=03201232927&id=" + id + "",
                            requestOptions)
                        .then(response => response.json())
                        .then(response => {
                            console.log(" Log response ", response);
                            // $('#ledger_logs').empty();
                            // if (response.length > 0) {


                            //     $.each(response, function(index, data) {

                            //         var originalDate = data.datetime;
                            //         var dateObject = new Date(originalDate);

                            //         var day = dateObject.getDate(); // Extract the day (returns 25)
                            //         var month = dateObject.toLocaleString('en-US', {
                            //             month: 'short'
                            //         }); // Extract the month (returns "Oct")

                            //         console.log("Day:", day);
                            //         console.log("Month:", month);
                            //         $('#ledger_logs').append('<div class="row timeline-right">' +
                            //             '<div class="col-md-6">' +
                            //             ' <div class="timeline-icon">' +
                            //             '<i class="bx bx-briefcase-alt-2 text-primary h2 mb-0"></i>' +
                            //             ' </div>' +
                            //             '</div>' +
                            //             '<div class="col-md-6">' +
                            //             '<div class="timeline-box">' +
                            //             '<div class="timeline-date bg-primary text-center rounded">' +
                            //             '<h3 class="text-white mb-0 font-size-20">' + day + '</h3>' +
                            //             '<p class="mb-0 text-white-50">' + month + '</p>' +
                            //             '</div>' +
                            //             '<div class="event-content">' +
                            //             '<div class="timeline-text">' +
                            //             // '<h3 class="font-size-17">' + data.description + '</h3>' +
                            //             // '<p class="mb-0 mt-2 pt-1 text-muted">Previous Ledger : ' + data.old_ledger +
                            //             // '</p>' +

                            //             '<p class="mb-0 mt-2 pt-1 text-muted">Update Ledger : ' + data.new_ledger +
                            //             '</p>' +
                            //             '<p class="mb-0 mt-2 pt-1 text-muted">Date : ' + data.datetime +
                            //             '<p class="mb-0 mt-2 pt-1 text-muted">Doc NO : ' + data.doc_no + '</p>' +
                            //             '<p class="mb-0 mt-2 pt-1 text-muted">Debit/Credit : ' + data.debit_no +
                            //             '</p>' +
                            //             '<p class="mb-0 mt-2 pt-1 text-muted">Document Type : ' + data.document_type +
                            //             '</p>' +
                            //             '<p class="mb-0 mt-2 pt-1 text-muted">Record Time : ' + data.created_at +
                            //             '</p>' +
                            //             '</div>' +
                            //             '</div>' +
                            //             '</div>' +
                            //             '</div>' +
                            //             '</div>');

                            //     });
                            // } else {
                            //     $('#ledger_logs').append('<div class="row timeline-right">' +
                            //         '<div class="col-md-6">' +
                            //         ' <div class="timeline-icon">' +
                            //         '<i class="bx bx-briefcase-alt-2 text-primary h2 mb-0"></i>' +
                            //         ' </div>' +
                            //         '</div>' +
                            //         '<div class="col-md-6">' +
                            //         '<div class="timeline-box">' +
                            //         '<div class="timeline-date bg-primary text-center rounded">' +
                            //         '<h3 class="text-white mb-0 font-size-20">---</h3>' +
                            //         '<p class="mb-0 text-white-50">--</p>' +
                            //         '</div>' +
                            //         '<div class="event-content">' +
                            //         '<div class="timeline-text">' +
                            //         '<h3 class="font-size-17">Log Not Found</h3>' +
                            //         '<p class="mb-0 mt-2 pt-1 text-muted">Previous Dip : --- </p>' +
                            //         '<p class="mb-0 mt-2 pt-1 text-muted">Update Dip : --- </p>' +
                            //         '<p class="mb-0 mt-2 pt-1 text-muted">Action Time : --- </p>' +
                            //         '</div>' +
                            //         '</div>' +
                            //         '</div>' +
                            //         '</div>' +
                            //         '</div>');
                            // }
                            // $('#ledger_backlog_modal').modal('show');
                        })
                        .catch(error => console.log('error', error));



                }

                function load_all_select() {

                    $.ajax({
                        url: '<?php echo $api_url2; ?>get/get_tm.php?key=03201232927',
                        method: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#zm').empty();

                            // Iterate through the data and append options to the select element
                            $.each(data, function(index, item) {
                                $('#tm').append($('<option>', {
                                    value: item.id,
                                    text: item.name
                                }));
                            });

                            // Refresh the Select2 element to display the newly added options
                            $('#tm').trigger('change.select2');
                        },
                        error: function(error) {
                            console.error('Error fetching data:', error);
                        }
                    });

                    $.ajax({
                        url: '<?php echo $api_url2; ?>get/get_zm.php?key=03201232927',
                        method: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            // $('#zm').empty(); 
                            console.log('ZM')
                            console.log(data)
                            // Iterate through the data and append options to the select element
                            $.each(data, function(index, item) {
                                $('#zm').append($('<option>', {
                                    value: item.id,
                                    text: item.name
                                }));
                            });

                            // Refresh the Select2 element to display the newly added options
                            $('#zm').trigger('change.select2');
                        },
                        error: function(error) {
                            console.error('Error fetching data:', error);
                        }
                    });




                }

                function deleteData(id) {
                    var result = window.confirm("Are you sure you want to proceed?");

                    // Check the result
                    if (result) {
                        var settings = {
                            "url": "<?php echo $api_url2; ?>delete/delete_users.php?key=03201232927&id=" + id + "",
                            "method": "DELETE",
                            "timeout": 0,
                        };
                        $.ajax({
                            ...settings,
                            statusCode: {
                                200: function(response) {
                                    console.log(response);
                                    // $('#myModal').modal('hide');
                                    // console.log("Request was successful");
                                    Swal.fire(
                                        'Success!',
                                        'Record Deleted Successfully',
                                        'success'
                                    )
                                    setTimeout(function() {

                                        location.reload();


                                    }, 2000);
                                },
                                // Add more status code handlers as needed
                            },
                            success: function(data) {
                                // Additional success handling if needed
                            },
                            error: function(xhr, textStatus, errorThrown) {
                                Swal.fire(
                                    'Server Error!',
                                    'Record Not Deleted',
                                    'error'
                                )

                                // console.log("Request failed with status code: " + xhr.status);
                            }
                        });
                    }
                }

                function editData(id) {

                    var settings = {
                        // user_info.php?key=03201232927&user_id=4
                        "url": "<?php echo $api_url2; ?>get/user_info.php?key=03201232927&user_id=" + id + "",
                        "method": "GET",
                        "timeout": 0,
                    };

                    $.ajax({
                        ...settings,
                        statusCode: {
                            200: function(jsonData) {
                                let response = JSON.parse(jsonData);
                                // console.log(response);
                                let data = response['data'][0];
                                console.log(data)
                                let role = data.role_id == 1 ? "Admin" : "Company";
                                document.getElementById('name').value = data.name;
                                document.getElementById('email').value = data.email;
                                document.getElementById('password').value = data.description;
                                document.getElementById('confirm_password').value = data.description;
                                document.getElementById('number').value = data.phone;
                                document.getElementById('role_id').value = role;
                                document.getElementById('address_ho').value = data.address_ho;
                                document.getElementById('address_1').value = data.address_1;
                                document.getElementById('address_2').value = data.address_2;
                                document.getElementById('address_3').value = data.address_3;
                                document.getElementById('ntn_no').value = data.ntn_no;
                                document.getElementById('reg_no').value = data.reg_no;
                                document.getElementById('license_no').value = data.license_no;
                                document.getElementById('validity').value = data.validity;
                                document.getElementById('nature_of_business').value = data.nature_of_business;
                                document.getElementById('sub_role').value = data.sub_role;
                                document.getElementById('phone').value = data.phone;
                                document.getElementById('phone_2').value = data.phone_2;
                                document.getElementById('whatsapp_num').value = data.whatsapp_num;
                                document.getElementById('telegram').value = data.telegram;
                                document.getElementById('location').value = data.location;
                                document.getElementById('row_id').value = data.id;
                                // load_all_select()
                            }
                        }
                    })
                    $('#offcanvasRight').offcanvas('show')
                }
                $('#add_btn').on('click', function() {
                    $('#zmRole').hide();
                    $('#tmRole').hide();
                    $("#salesRole").hide();

                })
            </script>
</body>


<!-- Mirrored from themesdesign.in/webadmin/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:03 GMT -->

</html>