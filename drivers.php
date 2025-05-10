<?php include 'session/session_input.php'; ?>
<!doctype html>
<html lang="en">


<!-- Mirrored from themesdesign.in/webadmin/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:03 GMT -->

<head>

    <meta charset="utf-8" />
    <title>
        Drivers |
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
                            <h3>Drivers</h3>

                            <table id="myTable" class="display" style="width:100%">

                                <thead>
                                    <tr>

                                        <th>S no</th>
                                        <th>Name</th>
                                        <th>Employee #</th>
                                        <th>Passport #</th>
                                        <th>National ID #</th>
                                        <th>Email</th>
                                        <th>Cell #1</th>
                                        <th>Edit</th>
                                        <th>Delete</th>

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

                        <!-- Name -->
                        <div class="form-group col-md-6">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Driver Name" required>
                        </div>

                        <!-- Employee Number -->
                        <div class="form-group col-md-6">
                            <label for="employee_no">Employee #</label>
                            <input type="text" class="form-control" id="employee_no" name="employee_no" placeholder="Enter Employee Number" required>
                        </div>

                        <!-- Passport Number -->
                        <div class="form-group col-md-6">
                            <label for="passport_no">Passport #</label>
                            <input type="text" class="form-control" id="passport_no" name="passport_no" placeholder="Enter Passport Number" required>
                        </div>

                        <!-- Passport Scan -->
                        <!-- <div class="form-group col-md-6">
                            <label for="passport_scan">Passport Scan</label>
                            <input type="file" class="form-control" id="passport_scan" name="passport_scan" accept=".pdf,.jpg,.png" required>
                        </div> -->

                        <!-- National ID -->
                        <div class="form-group col-md-6">
                            <label for="national_id">National ID #</label>
                            <input type="text" class="form-control" id="national_id" name="national_id" placeholder="Enter National ID" required>
                        </div>

                        <!-- National ID Scan -->
                        <!-- <div class="form-group col-md-6">
                            <label for="national_id_scan">National ID Scan</label>
                            <input type="file" class="form-control" id="national_id_scan" name="national_id_scan" accept=".pdf,.jpg,.png" required>
                        </div> -->

                        <!-- Contact Numbers -->
                        <div class="form-group col-md-3">
                            <label for="cell_1">Cell # 1</label>
                            <input type="text" class="form-control" id="cell_1" name="cell_1" placeholder="Enter Cell Number" required>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="cell_2">Cell # 2</label>
                            <input type="text" class="form-control" id="cell_2" name="cell_2" placeholder="Enter Cell Number">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="cell_3">Cell # 3</label>
                            <input type="text" class="form-control" id="cell_3" name="cell_3" placeholder="Enter Cell Number">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="cell_4">Cell # 4</label>
                            <input type="text" class="form-control" id="cell_4" name="cell_4" placeholder="Enter Cell Number">
                        </div>

                        <!-- Email -->
                        <div class="form-group col-md-6">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Address" required>
                        </div>

                        <!-- Visa Country -->
                        <div class="form-group col-md-3">
                            <label for="visa_country">Visa Country</label>
                            <input type="text" class="form-control" id="visa_country" name="visa_country" placeholder="Enter Visa Country" required>
                        </div>

                        <!-- Visa Number -->
                        <div class="form-group col-md-3">
                            <label for="visa_number">Visa Number</label>
                            <input type="text" class="form-control" id="visa_number" name="visa_number" placeholder="Enter Visa Number" required>
                        </div>

                        <!-- Visa Expiry -->
                        <div class="form-group col-md-6">
                            <label for="visa_expiry">Visa Expiry Date</label>
                            <input type="date" class="form-control" id="visa_expiry" name="visa_expiry" required>
                        </div>

                        <!-- Visa Scan -->
                        <!-- <div class="form-group col-md-6">
                            <label for="visa_scan">Visa Scan</label>
                            <input type="file" class="form-control" id="visa_scan" name="visa_scan" accept=".pdf,.jpg,.png" required>
                        </div> -->

                        <!-- Created By -->
                        <input type="hidden" name="created_by" value="<?php echo $_SESSION['user_id']; ?>">
                        <input type="hidden" name="parent_id" value="<?php echo $_SESSION['user_id']; ?>">
                        <input type="hidden" name="row_id" id = "row_id" value="0">

                        <div class="col-md-12 text-center">
                            <input class="btn btn-primary rounded-pill" id = "insert" type="submit" value="Save Driver">
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
                    // vehicle picture 

                    // const dropArea = document.getElementById('dropArea');
                    // const fileInput = document.getElementById('fileInput');
                    // const fileInputLabel = document.getElementById('fileInputLabel');
                    // const imageContainer = document.getElementById('imageContainer');
                    // const imagePreview = document.getElementById('imagePreview');
                    // const removeButton = document.getElementById('removeButton');

                    // dropArea.addEventListener('dragover', (event) => {
                    //     event.preventDefault();
                    //     dropArea.style.border = '2px solid #000';
                    // });

                    // dropArea.addEventListener('dragleave', () => {
                    //     dropArea.style.border = '2px dashed #ccc';
                    // });

                    // dropArea.addEventListener('drop', (event) => {
                    //     event.preventDefault();
                    //     dropArea.style.border = '2px dashed #ccc';

                    //     const selectedFile = event.dataTransfer.files[0];
                    //     processImage(selectedFile);
                    // });

                    // fileInput.addEventListener('change', () => {
                    //     const selectedFile = fileInput.files[0];
                    //     processImage(selectedFile);
                    // });

                    // removeButton.addEventListener('click', () => {
                    //     imageContainer.style.display = 'none';
                    //     fileInput.value = ''; // Clear the selected file
                    //     fileInputLabel.style.display = 'block';
                    // });

                    function processImage(selectedFile) {
                        if (selectedFile) {
                            const fileExtension = selectedFile.name.split('.').pop().toLowerCase();
                            const resolution = {
                                width: 0,
                                height: 0
                            };

                            if (fileExtension === 'jpg' || fileExtension === 'jpeg' || fileExtension === 'png' ||
                                fileExtension === 'gif') {
                                const reader = new FileReader();

                                reader.onload = function(e) {
                                    const img = new Image();
                                    img.src = e.target.result;

                                    img.onload = function() {
                                        resolution.width = img.width;
                                        resolution.height = img.height;

                                        if (resolution.width === 800 && resolution.height === 600) {
                                            imagePreview.src = e.target.result;
                                            //    . imageContainer.style.display = 'block';
                                            fileInputLabel.style.display = 'none';
                                            // removeButton.style.display = 'block';
                                        } else {
                                            fileInput.value = '';
                                            alert(
                                                'Invalid resolution. Please select an image with a resolution of 1200x200.'
                                            );
                                        }
                                    };
                                };

                                reader.readAsDataURL(selectedFile);
                            } else {
                                alert('Invalid file format. Please select an image file.');
                            }
                        }
                    }
                    // ------------------------------


                    // $('.js-example-basic-multiple').select2();
                    // image 
                    // fileInput2.addEventListener('change', () => {
                    //     const selectedFile2 = fileInput2.files[0];
                    //     processImage2(selectedFile2);
                    // });

                    // removeButton2.addEventListener('click', () => {
                    //     imageContainer2.style.display = 'none';
                    //     fileInput2.value = ''; // Clear the selected file
                    //     fileInputLabel2.style.display = 'block';
                    // });

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

                    // ------------------------------

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
                                url: "<?php echo $api_url2; ?>create/create_driver.php",
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
                                url: "<?php echo $api_url2; ?>update/update_driver.php",
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

                // edit respondata function

                function editData(id) {
                    var settings = {
                        "url": "<?php echo $api_url; ?>get/driver_info.php?key=03201232927&id=" + id + "",
                        "method": "GET",
                        "timeout": 0,
                    };
                    $.ajax({
                        ...settings,
                        statusCode: {
                            200: function(stringData) {
                                var response = JSON.parse(stringData);
                                console.log(response);
                                response = response['data'];
                                // console.log(response[0]['title']);

                                $('#name').val(response[0]['name']);
                                $('#employee_no').val(response[0]['employee_number']);
                                $('#passport_no').val(response[0]['passport_number']);
                                $('#national_id').val(response[0]['national_id_number']);
                                $('#cell_1').val(response[0]['cell_1']);
                                $('#cell_2').val(response[0]['cell_2']);
                                $('#cell_3').val(response[0]['cell_3']);
                                $('#cell_4').val(response[0]['cell_4']);
                                $('#email').val(response[0]['email']);
                                $('#visa_country').val(response[0]['visa_country']);
                                $('#visa_number').val(response[0]['visa_number']);
                                $('#visa_expiry').val(response[0]['visa_expiry']);
                                $('#row_id').val(response[0]['id']);
                                
                                // document.getElementById("imagePreview").src = ""
                                // $('#row_id').val(response[0]['id']);

                                // var filelogo = $('#fileInput2')[0];
                                // var filebanner = $('#fileInput')[0];
                                // if (filelogo.files.length === 0) {
                                //     filelogo.removeAttribute('required')

                                // }
                                // if (filebanner.files.length === 0) {
                                //     filebanner.removeAttribute('required')

                                // }


                                // document.getElementById("imagePreview").src =
                                //     "<?php echo $api_url; ?>uploads/vehicles/" +
                                //     response[0]['picture'] + "";
                                // // Set the PDF file preview
                                // const pdfIcon =
                                //     "<?php echo $api_url; ?>uploads/pdf-icon.png"; // Path to the PDF icon
                                // const pdfUrl = "<?php echo $api_url; ?>uploads/vehicles/" + response[0][
                                //     'registration_document'
                                // ];
                                // const pdfPreviewContainer = document.getElementById('dropArea2');
                                // pdfPreviewContainer.innerHTML = `
                                //             <a href="${pdfUrl}" target="_blank">
                                //                 <img src="${pdfIcon}" alt="PDF Icon" style="width: 100px; height: auto;">
                                //             </a>
                                //         `;

                                $('#offcanvasRight').offcanvas('show')


                            },


                            // Add more status code handlers as needed
                        },
                        success: function(data) {
                            // Additional success handling if needed

                        },
                        error: function(xhr, textStatus, errorThrown) {
                            Swal.fire(
                                'Server Error!',
                                '',
                                'error'
                            )

                            // console.log("Request failed with status code: " + xhr.status);
                        }
                    });

                }

                function fetchtable() {

                    var requestOptions = {
                        method: 'GET',
                        redirect: 'follow'
                    };

                    // http://localhost/logistic_bridge_api/get/all_users.php?key=03201232927&user_id=1
                    fetch("<?php echo $api_url2; ?>get/all_drivers.php?key=03201232927&user_id=" +
                            <?php echo $_SESSION['user_id'] ?> + "", requestOptions)
                        .then(response => response.json())
                        .then(response => {
                            response = response['data'];
                            console.log(response)

                            table.clear().draw();
                            $.each(response, function(index, data) {
                                let priv = data.role_id == 1 ? "Admin" : "Company";

                                table.row.add([
                                    index + 1,
                                    data.name,
                                    data.employee_number,
                                    data.passport_number,
                                    data.national_id_number,
                                    data.email,
                                    data.cell_1,
                                    '<button type="button" id="edit" name="edit" onclick="editData(' +
                                    data.id +
                                    ')" class="btn btn-soft-warning waves-effect waves-light"><i class="bx bx-edit-alt font-size-16 align-middle"></i></button>',
                                    '<button type="button" id="delete" name="delete" onclick="deleteData(' +
                                    data.id +
                                    ')" class="btn btn-soft-danger waves-effect waves-light"><i class="bx bx-trash-alt font-size-16 align-middle"></i></button>'
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
                            "url": "<?php echo $api_url2; ?>delete/delete_driver.php?key=03201232927&id=" + id + "",
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

                                        // location.reload();


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


                $('#add_btn').on('click', function() {
                    $('#zmRole').hide();
                    $('#tmRole').hide();
                    $("#salesRole").hide();

                })
            </script>
</body>


<!-- Mirrored from themesdesign.in/webadmin/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:03 GMT -->

</html>