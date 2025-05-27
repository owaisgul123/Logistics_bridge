<?php include 'session/session_input.php'; ?>
<!doctype html>
<html lang="en">


<!-- Mirrored from themesdesign.in/webadmin/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:03 GMT -->

<head>

    <meta charset="utf-8" />
    <title>
        Job Orders |
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
                            <h3>Job Orders</h3>

                            <table id="myTable" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">S.No</th>
                                        <!-- <th class="text-center">PO id</th> -->
                                        <th class="text-center">Job order No</th>
                                        <!-- <th class="text-center">Assign Route</th> -->
                                        <th class="text-center">Transporter</th>
                                        <th class="text-center">Route</th>

                                        <!-- <th class="text-center">Privilege</th>
                                        <th class="text-center">Contact No</th> -->
                                        <!-- <th class="text-center">View</th> -->
                                        <!-- <th class="text-center">Delete</th> -->
                                        <th class="text-center">A Transporter</th>
                                        <th class="text-center">Job Cards</th>
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

    <!-- modal -->
    <!-- Route Modal -->
    <div class="modal fade" id="routeModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Assign Route</h5>
                </div>
                <div class="modal-body">
                    <div id="routeContainer"></div>
                    <button class="btn btn-secondary mt-3" onclick="addRouteRow()">+ Add Route Point</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" onclick="saveRoute()">Save</button>

                </div>
            </div>
        </div>
    </div>

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- chat offcanvas -->
    <div class="offcanvas offcanvas-end w-25" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
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
                            <label for="role" style="margin: 8px 0px;">Transporter</label>
                            <select class="form-control" id="transporter_id" name="transporter_id">
                                <option>Select Transporter</option>
                                <!--<option value=2>Trucking Company</option>
                                <option value=3>Clearing Agent</option>
                                <option value=4>Operational Manager</option> -->
                                <!-- <option value="Order">Order</option>
                                <option value="Logistics">Logistics</option> -->
                            </select>
                        </div>
                        <div class="col-md-12 text-center">

                            <input class="btn rounded-pill btn-primary" style="
                             margin: 10px 0px;" type="submit" name="insert" id="insert" value="Save">
                        </div>

                        <div class="col-12">
                            <input type="hidden" name="row_id" id="row_id" value="0">
                            <input type="hidden" name="parent_id" id="parent_id"
                                value="<?php echo $_SESSION['user_id'] ?>">


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
            let routeList = [];

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
                                        document.getElementById("insert").disabled =
                                            false;

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
                            url: "<?php echo $api_url2; ?>create/assign_transporter.php",
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
                                        document.getElementById("insert").disabled =
                                            false;

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



            function openRouteModal(orderId) {
                document.getElementById('routeContainer').innerHTML = '';
                $('#row_id').val(orderId);
                // write an ajax request to fetch the routes for the job order      
                $.ajax({
                    url: "<?php echo $api_url2; ?>get/job_order_route.php?key=03201232927&id=" + orderId,
                    method: "GET",
                    dataType: "json",
                    success: function(response) {
                        routeList = [];
                        document.getElementById('routeContainer').innerHTML = '';

                        // Check if response.route exists and is valid
                        if (response.route) {
                            try {
                                let route__obj_ar = JSON.parse(response.route);
                                console.log(route__obj_ar);

                                if (Array.isArray(route__obj_ar)) {
                                    route__obj_ar.forEach(function(route, idx) {
                                        const html = `
                        <div class="row mb-2 route-entry">
                            <div class="col-md-5">
                                <select class="form-control route-type" name="type_${idx}">
                                    <option value="milestone" ${route.type === 'milestone' ? 'selected' : ''}>Milestone</option>
                                    <option value="border_crossing" ${route.type === 'border_crossing' ? 'selected' : ''}>Border Crossing</option>
                                    <option value="delivery_point" ${route.type === 'delivery_point' ? 'selected' : ''}>Delivery Point</option>
                                </select>
                            </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control route-name" name="name_${idx}" value="${route.name || ''}" placeholder="Location Name">
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-danger" onclick="this.parentElement.parentElement.remove()"><i class="bx bx-trash-alt font-size-16 align-middle"></i></button>
                            </div>
                        </div>
                        `;
                                        document.getElementById('routeContainer')
                                            .insertAdjacentHTML('beforeend', html);
                                        routeList.push(route);
                                    });
                                }
                            } catch (e) {
                                console.error("Failed to parse route data:", e);
                            }
                        }
                        $('#routeModal').modal('show');
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error:", status, error);
                        routeList = [];
                        document.getElementById('routeContainer').innerHTML = '';
                        $('#routeModal').modal('show');
                    }
                });
            }

            function addRouteRow() {
                const index = routeList.length;
                const html = `
      <div class="row mb-2 route-entry">
        <div class="col-md-5">
          <select class="form-control route-type" name="type_${index}">
            <option value="milestone">Milestone</option>
            <option value="border_crossing">Border Crossing</option>
            <option value="delivery_point">Delivery Point</option>
          </select>
        </div>
        <div class="col-md-5">
          <input type="text" class="form-control route-name" name="name_${index}" placeholder="Location Name">
        </div>
        <div class="col-md-2">
          <button class="btn btn-danger" onclick="this.parentElement.parentElement.remove()"><i class="bx bx-trash-alt font-size-16 align-middle"></i></button>
        </div>
      </div>
    `;
                document.getElementById('routeContainer').insertAdjacentHTML('beforeend', html);
                routeList.push({
                    type: '',
                    name: '',
                    status: '',
                    timestamp: ''
                });
            }

            function saveRoute() {
                const entries = document.querySelectorAll('.route-entry');
                const route = [];

                entries.forEach(entry => {
                    const type = entry.querySelector('.route-type').value;
                    const name = entry.querySelector('.route-name').value;
                    route.push({
                        type,
                        name,
                        status: 'pending',
                        timestamp: new Date().toISOString()
                    });
                });
                let r_id = $('#row_id').val();
                const routeJson = JSON.stringify(route);
                console.log(route);
                // Assume orderId is available in the modal context (e.g., as a global or data attribute)
                // You may want to store the current orderId when opening the modal
                $.ajax({
                    url: "<?php echo $api_url2; ?>update/job_order_route.php",
                    method: "POST",
                    data: {
                        id: r_id,
                        route: routeJson
                    },
                    success: function(response) {
                        var data = JSON.parse(response);
                        if (data.status === "success") {
                            Swal.fire('Success!', 'Route updated successfully.', 'success');
                            fetchtable();
                        } else {
                            Swal.fire('Error', 'Failed to update route.', 'error');
                        }

                    },
                    error: function() {
                        Swal.fire('Error', 'Failed to update route.', 'error');
                    }
                });


                // Send via AJAX or assign to hidden input for form submission
                $('#routeModal').modal('hide');
            }


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
                fetch("<?php echo $api_url2; ?>get/job_orders.php?key=03201232927&user_id=" +
                        <?php echo $_SESSION['user_id'] ?> + "", requestOptions)
                    .then(response => response.json())
                    .then(response => {
                        console.log(response)
                        response = response['data'];

                        table.clear().draw();
                        $.each(response, function(index, data) {
                            // let priv = data.role_id == 1 ? "Admin" : "Company";

                            table.row.add([
                                index + 1,
                                // data.purchase_order_id,
                                data.job_order_number,
                                data.transporter,
                                `
    <button class="btn btn-sm btn-primary" onclick="openRouteModal(${data.id})">+ Add</button>`,

                                // '<button type="button"id="edit" name="edit" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"  onclick="editData(' +
                                // data.id +
                                // ')"  class="btn btn-soft-warning waves-effect waves-light"><i class="bx bx-edit-alt font-size-16 align-middle"></i></button>',
                                // '<button class="btn btn-soft-warning waves-effect waves-light" onclick = "get_user_log(' + <?php echo $_SESSION['user_id'] ?> + ')"><i class="fas fa-eye font-size-16 align-middle"></i></button>',
                                // '<button type="button" id="delete" name="delete" onclick="deleteData(' +
                                // data.id +
                                // ')" class="btn btn-soft-danger waves-effect waves-light"><i class="bx bx-trash-alt font-size-16 align-middle"></i></button>',
                                '<button type="button" id="edit" name="edit"  onclick="editData(' +
                                data.id +
                                ')" class="btn btn-soft-danger waves-effect waves-light"><i class="bx bx-edit-alt font-size-16 align-middle"></i></button>',
                                '<a href="job_cards.php?job_order_id='+ data.id + '&purchase_order_id='+ data.purchase_order_id + '" target = "_blank" class="btn btn-soft-warning waves-effect waves-light"><i class="bx bx-show font-size-16 align-middle"></i></a>'
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
                    url: '<?php echo $api_url2; ?>get/roles.php?key=03201232927',
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        // $('#role_id').empty();
                        // response = JSON.parse(response);
                        console.log(response);
                        data = response['data'];
                        // Iterate through the data and append options to the select element
                        $.each(data, function(index, item) {
                            $('#role_id').append($('<option>', {
                                value: item.id,
                                text: item.name
                            }));
                        });

                        // Refresh the Select2 element to display the newly added options
                        $('#role_id').trigger('change.select2');
                    },
                    error: function(error) {
                        console.error('Error fetching data:', error);
                    }
                });

                $.ajax({
                    url: '<?php echo $api_url2; ?>get/all_countries.php?key=03201232927',
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        // $('#zm').empty(); 
                        // console.log('ZM')
                        // console.log(data)
                        // Iterate through the data and append options to the select element
                        data = response['data'];

                        $.each(data, function(index, item) {
                            $('#country').append($('<option>', {
                                value: item.id,
                                text: item.name
                            }));
                        });

                        // Refresh the Select2 element to display the newly added options
                        $('#country').trigger('change.select2');
                        $('#country').trigger('change.select2');
                    },
                    error: function(error) {
                        console.error('Error fetching data:', error);
                    }
                });
                $.ajax({
                    url: '<?php echo $api_url2; ?>get/all_truckers.php?key=03201232927',
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        // $('#zm').empty(); 
                        // console.log('ZM')
                        // console.log(data)
                        // Iterate through the data and append options to the select element
                        data = response['data'];

                        $.each(data, function(index, item) {
                            $('#transporter_id').append($('<option>', {
                                value: item.id,
                                text: item.name
                            }));
                        });

                        // Refresh the Select2 element to display the newly added options
                        $('#transporter_id').trigger('change.select2');
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
                    // job_order_info.php?key=03201232927&id=1
                    "url": "<?php echo $api_url2; ?>get/job_order_info.php?key=03201232927&id=" + id + "",
                    "method": "GET",
                    "timeout": 0,
                };

                $.ajax({
                    ...settings,
                    statusCode: {
                        200: function(jsonData) {
                            let response = JSON.parse(jsonData);
                            // console.log(response);
                            let data = response['data'];
                            console.log(data)
                            // let role = data.role_id == 1 ? "Admin" : "Company";

                            document.getElementById('row_id').value = data.id;
                            let t_id = `${data.transporter_id}`;
                            console.log("transporter id ", t_id)
                            $('#transporter_id').val(t_id).change(); // Shortcut for trigger('change')
                            // $('#country_id').val(data.country_id).trigger('change');
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