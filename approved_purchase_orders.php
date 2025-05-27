<?php include 'session/session_input.php'; ?>
<?php include 'env_set.php'; ?>
<!doctype html>
<html lang="en">


<!-- Mirrored from themesdesign.in/webadmin/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:03 GMT -->

<head>

    <meta charset="utf-8" />
    <title>
       Approved Purchase Orders |
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

    <!-- Approve/Unapprove Modal -->
    <div class="modal fade" id="approveModal" tabindex="-1" aria-labelledby="approveModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="approveForm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Approve/Unapprove Purchase Order</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="approve_po_id" name="po_id">
                        <div class="mb-3">
                            <label for="approve_status" class="form-label">Status</label>
                            <select class="form-control" id="approve_status" name="status" required>
                                <option value="1">Approved</option>
                                <option value="0">Unapproved</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="approve_remarks" class="form-label">Remarks</label>
                            <input type="text" class="form-control" id="approve_remarks" name="remarks" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


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
                            <button class="btn btn-soft-primary waves-effect waves-light d-none" type="button"
                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" id="add_btn"
                                aria-controls="offcanvasRight"><i
                                    class="bx bxs-add-to-queue font-size-16 align-middle me-2 cursor-pointer"></i>Add</button>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h3>Approved PO</h3>

                            <table id="myTable" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">S.No</th>
                                        <th class="text-center">PO Number</th>
                                        <th class="text-center">Contracting Party</th>
                                        <th class="text-center">Role</th>
                                        <th class="text-center">Shipper</th>
                                        <th class="text-center">Freight Forwarder</th>
                                        <th class="text-center">Broker</th>
                                        <th class="text-center">Pickup Location</th>
                                        <th class="text-center">Delivery Location</th>
                                        <th class="text-center">Commodity</th>
                                        <th class="text-center">Total Qty (tons)</th>
                                        <th class="text-center">Truck Count</th>
                                        <th class="text-center">Contract Type</th>
                                        <th class="text-center">Transit Days</th>
                                        <th class="text-center">Status</th>
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
                    <div class="row mb-4">
                        <!-- Contracting Party -->
                        <div class="form-group col-md-6">
                            <label>Contracting Party</label>
                            <select class="form-control" id="contracting_party_id" name="contracting_party_id" required>
                                <option value="">Select Contracting Party</option>
                            </select>
                        </div>

                        <!-- Contracting Party Role -->
                        <div class="form-group col-md-6">
                            <label>Role of Contracting Party</label>
                            <select class="form-control" id="contracting_party_role_id" name="contracting_party_role_id"
                                required>
                                <option value="">Select Role</option>
                            </select>
                        </div>

                        <!-- Shipper -->
                        <div class="form-group col-md-6">
                            <label>Shipper</label>
                            <select class="form-control" id="shipper_id" name="shipper_id" required>
                                <option value="">Select Shipper</option>
                            </select>
                        </div>

                        <!-- Freight Forwarder -->
                        <div class="form-group col-md-6">
                            <label>Freight Forwarder</label>
                            <select class="form-control" id="freight_forwarder_id" name="freight_forwarder_id">
                                <option value="">Select Forwarder</option>
                            </select>
                        </div>

                        <!-- Broker -->
                        <div class="form-group col-md-6">
                            <label>Freight Broker</label>
                            <select class="form-control" id="broker_id" name="broker_id">
                                <option value="">Select Broker</option>
                            </select>
                        </div>

                        <!-- Pickup -->
                        <div class="form-group col-md-6">
                            <label>Pickup Location</label>
                            <select class="form-control" id="pickup_location_id" name="pickup_location_id" required>
                                <option value="">Select Pickup Location</option>
                            </select>
                        </div>

                        <!-- Delivery -->
                        <div class="form-group col-md-6">
                            <label>Delivery Location</label>
                            <select class="form-control" id="delivery_location_id" name="delivery_location_id" required>
                                <option value="">Select Delivery Location</option>
                            </select>
                        </div>

                        <!-- Commodity -->
                        <div class="form-group col-md-6">
                            <label>Commodity</label>
                            <select class="form-control" id="commodity_id" name="commodity_id" required>
                                <option value="">Select Commodity</option>
                            </select>
                        </div>

                        <!-- Total Quantity -->
                        <div class="form-group col-md-6">
                            <label>Total Quantity (tons)</label>
                            <input type="number" class="form-control" id="total_quantity" name="total_quantity"
                                required>
                        </div>

                        <!-- Truck Count -->
                        <div class="form-group col-md-6">
                            <label>Truck Count</label>
                            <input type="number" class="form-control" id="truck_count" name="truck_count" required>
                        </div>

                        <!-- Contract Type -->
                        <div class="form-group col-md-6">
                            <label>Contract Type</label>
                            <select class="form-control" id="contract_type" name="contract_type" required>
                                <option value="electronic">Electronic</option>
                                <option value="manual">Manual (upload)</option>
                            </select>
                        </div>

                        <!-- Upload Contract (only if manual) -->
                        <!-- <div class="form-group col-md-6">
                            <label>Contract File</label>
                            <input type="file" class="form-control" id="contract_file" name="contract_file">
                        </div> -->

                        <div class="form-group col-md-4">

                            <label for="fileInput2" id="fileInputLabel2">Vehicle Document</label></br>
                            <input type="file" id="fileInput2" accept=".pdf" name='contract_file'>
                            <input type="hidden" id="registration_document_hidden" name="registration_document_hidden">

                            <div id="dropArea2">
                                <p>Drag and drop , Vechicle Documents </p>
                                <div id="imageContainer2">
                                    <i id="removeButton2" class="fas fa-times-circle"></i>
                                </div>
                                <img id="imagePreview2" src="" alt="Image Preview">

                            </div>


                        </div>

                        <!-- Route (JSON or text) -->
                        <!-- <div class="form-group col-md-12">
                            <label>Route Description</label>
                            <textarea class="form-control" id="route_description" name="route_description" rows="3"
                                placeholder='e.g. {"route":"A-B-C"}'></textarea>
                        </div> -->

                        <!-- Estimated Transit Days -->
                        <div class="form-group col-md-6">
                            <label>Estimated Transit Days</label>
                            <input type="number" class="form-control" id="estimated_transit_days"
                                name="estimated_transit_days" required>
                        </div>

                        <!-- Submit -->
                        <div class="col-md-12 text-center">
                            <input type="hidden" name="created_by" value="<?php echo $_SESSION['user_id'] ?>">
                            <input type="hidden" id="row_id" name="row_id" value="0">
                            <input type="hidden" id="hidden_file_contract" name="contract_file_hidden" value="0">
                            <input class="btn rounded-pill btn-primary" style="margin: 10px 0px;" id="insert"
                                type="submit" value="Save">
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
                // event listener for file
                fileInput2.addEventListener('change', () => {
                    const selectedFile2 = fileInput2.files[0];
                    processImage2(selectedFile2);
                });



                // Handle approve/unapprove form submission
                $('#approveForm').on('submit', function(e) {
                    e.preventDefault();
                    var po_id = $('#approve_po_id').val();
                    var status = $('#approve_status').val();
                    var remarks = $('#approve_remarks').val();
                    $.ajax({
                        url: "<?php echo $api_url2; ?>update/update_po_status.php",
                        method: "POST",
                        data: {
                            po_id: po_id,
                            checkbox: status,
                            remarks: remarks,
                            user_id: <?php echo $_SESSION['user_id']; ?>
                        },
                        success: function(data) {
                            var res = typeof data === "string" ? JSON.parse(data) : data;
                            if (res.status === "success") {
                                Swal.fire('Success!', 'Purchase Order status updated.',
                                    'success');
                                $('#approveModal').modal('hide');
                                fetchtable();
                            } else {
                                Swal.fire('Error!', 'Could not update status.', 'error');
                            }
                        },
                        error: function() {
                            Swal.fire('Error!', 'Server error.', 'error');
                        }
                    });
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

                function processImage2(selectedFile2) {
                    if (selectedFile2) {
                        const fileExtension2 = selectedFile2.name.split('.').pop().toLowerCase();

                        if (fileExtension2 === 'pdf') {
                            const reader2 = new FileReader();

                            reader2.onload = function(e) {
                                const pdfBlob = new Blob([e.target.result], {
                                    type: 'application/pdf'
                                });
                                const pdfUrl = URL.createObjectURL(pdfBlob);

                                const pdfPreviewContainer = document.getElementById('dropArea2');
                                pdfPreviewContainer.innerHTML = `
                                            <a href="${pdfUrl}" target="_blank">
                                                <img src="http://localhost/logistic_bridge_api/uploads/pdf-icon.png" alt="PDF Icon" style="width: 100px; height: auto;">
                                            </a>
                                    `;
                                fileInputLabel2.style.display = 'none';
                            };

                            reader2.readAsArrayBuffer(selectedFile2);
                        } else {
                            alert('Invalid file format. Please select a PDF file.');
                            fileInput2.value = ''; // Clear the selected file
                        }
                    }
                }


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


                    buttons: ['copy', 'excel', 'csv', 'pdf', 'print'],
                    scrollX: true

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
                            url: "<?php echo $api_url2; ?>create/create_purchase_order.php",
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
                            url: "<?php echo $api_url2; ?>update/update_purchase_order.php",
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

            function openApproveModal(po_id, current_status) {
                $('#approve_po_id').val(po_id);
                $('#approve_status').val(current_status);
                $('#approve_remarks').val('');
                $('#approveModal').modal('show');
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
                fetch("<?php echo $api_url2; ?>get/approved_purchase_orders.php?key=03201232927&user_id=" +
                        <?php echo $_SESSION['user_id'] ?> + "", requestOptions)
                    .then(response => response.json())
                    .then(response => {
                        response = response['data'];
                        table.clear().draw();
                        $.each(response, function(index, data) {
                            table.row.add([
                                index + 1,
                                data.po_number,
                                data.contracting_party_name,
                                data.contracting_party_role,
                                data.shipper_name,
                                data.freight_forwarder_name,
                                data.broker_name,
                                data.pickup_city,
                                data.delivery_city,
                                data.commodity_name,
                                data.total_quantity,
                                data.truck_count,
                                data.contract_type == 'electronic' ? 'Electronic' : 'Manual',
                                data.estimated_transit_days,
                                // data.is_signed == '1' ? 'Signed' : 'Pending',
                                '<i class="bx bx-check-circle text-success" style="cursor:pointer" title="Approved" onclick="openApproveModal(' +
                                data.id + ',1)"></i>',
                                '<button type="button" id="delete" name="delete" onclick="deleteData(' +
                                data.id +
                                ')" class="btn btn-soft-danger waves-effect waves-light"><i class="bx bx-trash-alt font-size-16 align-middle"></i></button>',
                                '<button type="button" id="edit" name="edit" onclick="editPO(' +
                                data.id +
                                ')" class="btn btn-soft-warning waves-effect waves-light"><i class="bx bx-edit-alt font-size-16   align-middle"></i></button>'
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
                            $('#contracting_party_role_id').append($('<option>', {
                                value: item.id,
                                text: item.name
                            }));
                        });

                        // Refresh the Select2 element to display the newly added options
                        $('#contracting_party_role_id').trigger('change.select2');
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
                            $('#pickup_location_id').append($('<option>', {
                                value: item.id,
                                text: item.name
                            }));
                            $('#delivery_location_id').append($('<option>', {
                                value: item.id,
                                text: item.name
                            }));
                        });

                        // Refresh the Select2 element to display the newly added options
                        $('#pickup_location_id').trigger('change.select2');
                        $('#delivery_location_id').trigger('change.select2');
                    },
                    error: function(error) {
                        console.error('Error fetching data:', error);
                    }
                });
                $.ajax({
                    url: '<?php echo $api_url2; ?>get/all_forwarders.php?key=03201232927',
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        // $('#zm').empty(); 
                        // console.log('ZM')
                        // console.log(data)
                        // Iterate through the data and append options to the select element
                        data = response['data'];

                        $.each(data, function(index, item) {
                            $('#freight_forwarder_id').append($('<option>', {
                                value: item.id,
                                text: item.name
                            }));
                        });

                        // Refresh the Select2 element to display the newly added options
                        $('#freight_forwarder_id').trigger('change.select2');
                    },
                    error: function(error) {
                        console.error('Error fetching data:', error);
                    }
                });
                $.ajax({
                    url: '<?php echo $api_url2; ?>get/all_shippers.php?key=03201232927',
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        // $('#zm').empty(); 
                        // console.log('ZM')
                        // console.log(data)
                        // Iterate through the data and append options to the select element
                        data = response['data'];

                        $.each(data, function(index, item) {
                            $('#shipper_id').append($('<option>', {
                                value: item.id,
                                text: item.name
                            }));
                        });

                        // Refresh the Select2 element to display the newly added options
                        $('#shipper_id').trigger('change.select2');
                    },
                    error: function(error) {
                        console.error('Error fetching data:', error);
                    }
                });
                // 
                $.ajax({
                    url: '<?php echo $api_url2; ?>get/all_broker.php?key=03201232927',
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        // $('#zm').empty(); 
                        // console.log('ZM')
                        // console.log(data)
                        // Iterate through the data and append options to the select element
                        data = response['data'];

                        $.each(data, function(index, item) {
                            $('#broker_id').append($('<option>', {
                                value: item.id,
                                text: item.name
                            }));
                        });

                        // Refresh the Select2 element to display the newly added options
                        $('#broker_id').trigger('change.select2');
                    },
                    error: function(error) {
                        console.error('Error fetching data:', error);
                    }
                });
                // 
                $.ajax({
                    url: '<?php echo $api_url2; ?>get/commodities.php?key=03201232927',
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        // $('#zm').empty(); 
                        // console.log('ZM')
                        // console.log(data)
                        // Iterate through the data and append options to the select element
                        data = response['data'];

                        $.each(data, function(index, item) {
                            $('#commodity_id').append($('<option>', {
                                value: item.id,
                                text: item.name
                            }));
                        });

                        // Refresh the Select2 element to display the newly added options
                        $('#commodity_id').trigger('change.select2');
                    },
                    error: function(error) {
                        console.error('Error fetching data:', error);
                    }
                });
                // 
                $.ajax({
                    url: '<?php echo $api_url2; ?>get/parties.php?key=03201232927',
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        // $('#zm').empty(); 
                        // console.log('ZM')
                        // console.log(data)
                        // Iterate through the data and append options to the select element
                        data = response['data'];

                        $.each(data, function(index, item) {
                            $('#contracting_party_id').append($('<option>', {
                                value: item.id,
                                text: item.name
                            }));
                        });

                        // Refresh the Select2 element to display the newly added options
                        $('#contracting_party_id').trigger('change.select2');
                    },
                    error: function(error) {
                        console.error('Error fetching data:', error);
                    }
                });
                // 



            }

            function deleteData(id) {
                var result = window.confirm("Are you sure you want to proceed?");

                // Check the result
                if (result) {
                    var settings = {
                        "url": "<?php echo $api_url2; ?>delete/delete_purcahse_order.php?key=03201232927&id=" + id + "",
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

            function editPO(id) {
                var settings = {
                    url: "<?php echo $api_url; ?>get/purchase_order_info.php?key=03201232927&id=" + id,
                    method: "GET",
                    timeout: 0,
                };

                $.ajax({
                    ...settings,
                    statusCode: {
                        200: function(stringData) {
                            var response = JSON.parse(stringData);
                            response = response['data'];

                            $('#contracting_party_id').val(response[0]['contracting_party_id']);
                            $('#contracting_party_role_id').val(response[0]['contracting_party_role_id']);
                            $('#shipper_id').val(response[0]['shipper_id']);
                            $('#freight_forwarder_id').val(response[0]['freight_forwarder_id']);
                            $('#broker_id').val(response[0]['broker_id']);
                            $('#pickup_location_id').val(response[0]['pickup_location_id']);
                            $('#delivery_location_id').val(response[0]['delivery_location_id']);
                            $('#commodity_id').val(response[0]['commodity_id']);
                            $('#total_quantity').val(response[0]['total_quantity']);
                            $('#truck_count').val(response[0]['truck_count']);
                            $('#contract_type').val(response[0]['contract_type']);
                            $('#route_description').val(response[0]['route_description']);
                            $('#estimated_transit_days').val(response[0]['estimated_transit_days']);
                            $('#row_id').val(response[0]['id']);
                            // trigger the change event to update the select2
                            $('#contracting_party_id').val(response[0]['contracting_party_id']).trigger(
                                'change.select2');
                            $('#contracting_party_role_id').val(response[0]['contracting_party_role_id'])
                                .trigger('change.select2');
                            $('#shipper_id').val(response[0]['shipper_id']).trigger('change.select2');
                            $('#freight_forwarder_id').val(response[0]['freight_forwarder_id']).trigger(
                                'change.select2');
                            $('#broker_id').val(response[0]['broker_id']).trigger('change.select2');
                            $('#pickup_location_id').val(response[0]['pickup_location_id']).trigger(
                                'change.select2');
                            $('#delivery_location_id').val(response[0]['delivery_location_id']).trigger(
                                'change.select2');
                            $('#commodity_id').val(response[0]['commodity_id']).trigger('change.select2');
                            $('#hidden_file_contract').val(response[0]['contract_file']);
                            // image
                            // document.getElementById("imagePreview2").src =
                            //     "<?php echo $api_url; ?>uploads/purchase_orders/" +
                            //     response[0]['contract_file'] + "";
                            // Set the PDF file preview
                            const pdfIcon =
                                "<?php echo $api_url; ?>uploads/pdf-icon.png"; // Path to the PDF icon
                            const pdfUrl = "<?php echo $api_url; ?>uploads/purchase_orders/" + response[0][
                                'contract_file'
                            ];
                            const pdfPreviewContainer = document.getElementById('dropArea2');

                            // Clear any existing content before appending new preview
                            pdfPreviewContainer.innerHTML = "";

                            // Create and append preview
                            const pdfLink = document.createElement('a');
                            pdfLink.href = pdfUrl;
                            pdfLink.target = "_blank";

                            const pdfImg = document.createElement('img');
                            pdfImg.src = pdfIcon;
                            pdfImg.alt = "PDF Icon";
                            // Remove any previous preview to avoid duplication
                            while (pdfPreviewContainer.firstChild) {
                                pdfPreviewContainer.removeChild(pdfPreviewContainer.firstChild);
                            }
                            pdfImg.style.width = "100px";
                            pdfImg.style.height = "auto";

                            pdfLink.appendChild(pdfImg);
                            pdfPreviewContainer.appendChild(pdfLink);
                            $('#offcanvasRight').offcanvas('show');
                        }
                    },
                    error: function() {
                        Swal.fire('Server Error!', '', 'error');
                    }
                });
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