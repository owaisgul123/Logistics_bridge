<?php include 'session/session_input.php'; ?>
<!doctype html>
<html lang="en">


<!-- Mirrored from themesdesign.in/webadmin/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:03 GMT -->

<head>

    <meta charset="utf-8" />
    <title>
        Vehicles |
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
                            <h3>Vehicles</h3>

                            <table id="myTable" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">S.No</th>
                                        <th class="text-center">Trailer Reg No</th>
                                        <!-- <th class="text-center">Prime Mover Reg No</th>
                                        <th class="text-center">Country of Registration</th>
                                        <th class="text-center">Registration Document</th>
                                        <th class="text-center">Picture</th>
                                        <th class="text-center">Make</th>
                                        <th class="text-center">Model</th>
                                        <th class="text-center">Load Compartment Type</th>
                                        <th class="text-center">Cooling Capacity</th>
                                        <th class="text-center">Carrying Capacity</th>
                                        <th class="text-center">Volume</th>
                                        <th class="text-center">No of Axles</th> -->
                                        <th class="text-center">Owned By</th>
                                        <th class="text-center">Created By</th>
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
                        <!-- Prime Mover Reg No -->
                        <!-- <div class="form-group col-md-6">
                            <label for="prime_mover_reg_no" style="margin: 8px 0px;">Prime Mover Reg No</label>
                            <input type="text" class="form-control" id="prime_mover_reg_no" name="prime_mover_reg_no"
                                placeholder="Enter Prime Mover Reg No" required>
                        </div> -->
                        <!-- Trailer Reg No -->
                        <div class="form-group col-md-6">
                            <label for="trailer_reg_no" style="margin: 8px 0px;">Trailer Reg No</label>
                            <input type="text" class="form-control" id="trailer_reg_no" name="trailer_reg_no"
                                placeholder="Enter Trailer Reg No" required>
                        </div>

                        <!-- Country of Registration -->
                        <!-- <div class="form-group col-md-6">
                            <label for="country_of_registration" style="margin: 8px 0px;">Country of
                                Registration</label>
                            <input type="text" class="form-control" id="country_of_registration"
                                name="country_of_registration" placeholder="Enter Country of Registration" required>
                        </div> -->
                        <!-- Make -->
                        <!-- <div class="form-group col-md-6">
                            <label for="make" style="margin: 8px 0px;">Make</label>
                            <input type="text" class="form-control" id="make" name="make" placeholder="Enter Make"
                                required>
                        </div> -->
                        <!-- Model -->
                        <!-- <div class="form-group col-md-6">
                            <label for="model" style="margin: 8px 0px;">Model</label>
                            <input type="text" class="form-control" id="model" name="model" placeholder="Enter Model"
                                required>
                        </div> -->
                        <!-- Load Compartment Type -->
                        <!-- <div class="form-group col-md-6">
                            <label for="load_compartment_type" style="margin: 8px 0px;">Load Compartment Type</label>
                            <input type="text" class="form-control" id="load_compartment_type"
                                name="load_compartment_type" placeholder="Enter Load Compartment Type" required>
                        </div> -->
                        <!-- Cooling Capacity -->
                        <!-- <div class="form-group col-md-6">
                            <label for="cooling_capacity" style="margin: 8px 0px;">Cooling Capacity</label>
                            <input type="text" class="form-control" id="cooling_capacity" name="cooling_capacity"
                                placeholder="Enter Cooling Capacity" required>
                        </div> -->
                        <!-- Carrying Capacity -->
                        <!-- <div class="form-group col-md-6">
                            <label for="carrying_capacity" style="margin: 8px 0px;">Carrying Capacity</label>
                            <input type="text" class="form-control" id="carrying_capacity" name="carrying_capacity"
                                placeholder="Enter Carrying Capacity" required>
                        </div> -->
                        <!-- Volume -->
                        <!-- <div class="form-group col-md-6">
                            <label for="volume" style="margin: 8px 0px;">Volume</label>
                            <input type="text" class="form-control" id="volume" name="volume" placeholder="Enter Volume"
                                required>
                        </div> -->
                        <!-- No of Axles -->
                        <!-- <div class="form-group col-md-6">
                            <label for="no_of_axles" style="margin: 8px 0px;">No of Axles</label>
                            <input type="text" class="form-control" id="no_of_axles" name="no_of_axles"
                                placeholder="Enter No of Axles" required>
                        </div> -->
                        <!-- Owned By -->
                        <!-- <div class="form-group col-md-6">
                            <label for="owned_by" style="margin: 8px 0px;">Owned By</label>
                            <input type="text" class="form-control" id="owned_by" name="owned_by"
                                placeholder="Enter Owner Name" required>
                        </div> -->
                        <!-- <div class="form-group col-md-4">

                            <label for="fileInput2" id="fileInputLabel2">Vehicle Document</label></br>
                            <input type="file" id="fileInput2" accept=".pdf" name='registration_document' required>
                            <input type="hidden" id="registration_document_hidden" name="registration_document_hidden"> -->

                            <!-- <div id="dropArea2">
                                <p>Drag and drop , Vechicle Documents </p>
                                <div id="imageContainer2">
        <i id="removeButton2" class="fas fa-times-circle"></i>
    </div>
                                <img id="imagePreview2" src="" alt="Image Preview">

                            </div> -->


                        <!-- </div> -->

                        <!-- <div class="form-group col-md-4">
                            <label for="fileInput" id="fileInputLabel">Vechicle Picture</label> </br>
                            <input type="file" id="fileInput" name='picture' accept="image/*" required>
                            <input type="hidden" id="picture_hidden" name="picture_hidden">
                            <div id="dropArea">
                                <p>Drag and drop , or click to select an image. Image must be 800x600</p>
                                <div id="imageContainer">
                                    <i id="removeButton" class="fas fa-times-circle"></i>
                                </div>
                                <img id="imagePreview" src="" alt="Image Preview">

                            </div>

                        </div> -->

                        <!-- Created By
                        <div class="form-group col-md-6">
                            <label for="created_by" style="margin: 8px 0px;">Created By</label>
                            <input type="text" class="form-control" id="created_by" name="created_by" placeholder="Enter Creator Name" required>
                        </div>
                          -->
                        <div class="col-md-12 text-center">
                            <input class="btn rounded-pill btn-primary" style="margin: 10px 0px;" type="submit"
                                name="insert" id="insert" value="Save">
                        </div>
                        <div class="col-12">
                            <input type="hidden" name="row_id" id="row_id" value="0">
                            <input type="hidden" name="created_by" id="" value="<?php echo $_SESSION['user_id'] ?>">
                            <input type="hidden" name="owned_by" id="" value="<?php echo $_SESSION['user_id'] ?>">

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
                            url: "<?php echo $api_url2; ?>create/create_vehicle.php",
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
                            url: "<?php echo $api_url2; ?>update/update_vehicle.php",
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
                    "url": "<?php echo $api_url; ?>get/vehicle_info.php?key=03201232927&id=" + id + "",
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
                            $('#trailer_reg_no').val(response[0]['trailer_reg_no']);
                            // $('#prime_mover_reg_no').val(response[0]['prime_mover_reg_no']);
                            // $('#country_of_registration').val(response[0]['country_of_registration']);
                            // $('#make').val(response[0]['make']);
                            // $('#model').val(response[0]['model']);
                            // $('#load_compartment_type').val(response[0]['load_compartment_type']);
                            // $('#cooling_capacity').val(response[0]['cooling_capacity']);
                            // $('#carrying_capacity').val(response[0]['carrying_capacity']);
                            // $('#volume').val(response[0]['volume']);
                            // $('#no_of_axles').val(response[0]['no_of_axles']);
                            $('#owned_by').val(response[0]['owned_by']);
                            // $('#picture_hidden').val(response[0]['picture']);
                            // $('#registration_document_hidden').val(response[0]['registration_document']);

                            // document.getElementById("imagePreview").src = ""
                            $('#row_id').val(response[0]['id']);

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
                            //                 <a href="${pdfUrl}" target="_blank">
                            //                     <img src="${pdfIcon}" alt="PDF Icon" style="width: 100px; height: auto;">
                            //                 </a>
                            //             `;

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
                fetch("<?php echo $api_url2; ?>get/all_vehicles.php?key=03201232927&user_id=" +
                        <?php echo $_SESSION['user_id'] ?> + "", requestOptions)
                    .then(response => response.json())
                    .then(response => {
                        console.log(response)
                        response = response['data'];

                        table.clear().draw();
                        $.each(response, function(index, data) {
                            let priv = data.role_id == 1 ? "Admin" : "Company";

                            table.row.add([
                                index + 1,
                                data.trailer_reg_no,
                                // data.prime_mover_reg_no,
                                // data.country_of_registration,
                                // '<a href="' + data.registration_document +
                                // '" target="_blank">View</a>',
                                // '<img src="" alt="Vehicle Image" width="50">',
                                // data.make,
                                // data.model,
                                // data.load_compartment_type,
                                // data.cooling_capacity,
                                // data.carrying_capacity,
                                // data.volume,
                                // data.no_of_axles,
                                data.owner_name,
                                data.created_by_name,
                                '<button type="button" id="delete" name="delete" onclick="deleteData(' +
                                data.id +
                                ')" class="btn btn-soft-danger waves-effect waves-light"><i class="bx bx-trash-alt font-size-16 align-middle"></i></button>',
                                '<button type="button" id="edit" name="edit" onclick="editData(' +
                                data.id +
                                ')" class="btn btn-soft-warning waves-effect waves-light"><i class="bx bx-edit-alt font-size-16 align-middle"></i></button>'
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
                        "url": "<?php echo $api_url2; ?>delete/delete_vehicle.php?key=03201232927&id=" + id + "",
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


            $('#add_btn').on('click', function() {
                $('#zmRole').hide();
                $('#tmRole').hide();
                $("#salesRole").hide();

            })
            </script>
</body>


<!-- Mirrored from themesdesign.in/webadmin/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:03 GMT -->

</html>