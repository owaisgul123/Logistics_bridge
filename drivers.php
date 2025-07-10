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
.dataTables_scrollBody {
    scrollbar-width: auto;
    /* For Firefox */
    scrollbar-height: 15px;
    /* For Firefox */
}

/* For Chrome/Edge/Safari */
.dataTables_scrollBody::-webkit-scrollbar {
    height: 15px;
    /* Adjust this value to make scrollbar taller */
}

.view-scan-link {
    color: #0d6efd;
    text-decoration: none;
}

.view-scan-link:hover {
    text-decoration: underline;
}

.bx-show {
    vertical-align: middle;
    margin-right: 3px;
}

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

.bg-danger-light {
    background-color: rgba(220, 53, 69, 0.08);
    /* Subtle red background */
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
                                        <th>Driver Visa's</th>

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
                    <div class="row mb-4 g-3">
                        <!-- Added g-3 for consistent gutter spacing -->

                        <!-- Name -->
                        <div class="form-group col-md-6">
                            <label for="name" class="form-label mb-1">Name</label>
                            <input type="text" class="form-control py-2" id="name" name="name"
                                placeholder="Enter Driver Name" required>
                        </div>

                        <!-- Employee Number -->
                        <div class="form-group col-md-6">
                            <label for="employee_no" class="form-label mb-1">Employee #</label>
                            <input type="text" class="form-control py-2" id="employee_no" name="employee_no"
                                placeholder="Enter Employee Number" required>
                        </div>

                        <!-- blood group -->
                        <div class="form-group col-md-6">
                            <label for="blood_group" class="form-label mb-1">Blood Group</label>
                            <input type="text" class="form-control py-2" id="blood_group" name="blood_group"
                                placeholder="Enter Blood Group" required>
                        </div>

                        <!-- Passport Number -->
                        <div class="form-group col-md-6">
                            <label for="passport_no" class="form-label mb-1">Passport #</label>
                            <input type="text" class="form-control py-2" id="passport_no" name="passport_no"
                                placeholder="Enter Passport Number" required>
                        </div>

                        <!-- Passport Scan - New Row Layout -->
                        <div class="col-12">
                            <div class="row align-items-center g-3">
                                <div class="col-md-6">
                                    <label for="passport_scan" class="form-label mb-1">Passport Scan</label>
                                    <input type="file" class="form-control" id="passport_scan" name="passport_scan"
                                        accept=".pdf,.jpg,.png" >
                                    <input type="hidden" id="hidden_passport_scan" name="hidden_passport_scan"
                                        value="">
                                    </div>
                                <div class="col-md-6">
                                    <div id="passportArea" class="border p-2 text-center" style="min-height: 100px">
                                        <img id="passportPreview" src="" alt="Passport Preview" class="img-fluid"
                                            style="max-height: 100px; display: none;">
                                        <small class="text-muted d-block mt-1">Preview will appear here</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- National ID -->
                        <div class="form-group col-md-6">
                            <label for="national_id" class="form-label mb-1">National ID #</label>
                            <input type="text" class="form-control py-2" id="national_id" name="national_id"
                                placeholder="Enter National ID" required>
                        </div>

                        <!-- National ID Scan - New Row Layout -->
                        <div class="col-12">
                            <div class="row align-items-center g-3">
                                <div class="col-md-6">
                                    <label for="national_id_scan" class="form-label mb-1">National ID Scan</label>
                                    <input type="file" class="form-control" id="national_id_scan"
                                        name="national_id_scan" accept=".pdf,.jpg,.png" >
                                
                                <input type="hidden" id="hidden_national_id_scan" name="hidden_national_id_scan"
                                        value="">   
                                     </div>
                                <div class="col-md-6">
                                    <div id="dropArea2" class="border p-2 text-center" style="min-height: 100px">
                                        <img id="nationalIdPreview" src="" alt="National ID Preview" class="img-fluid"
                                            style="max-height: 100px; display: none;">
                                        <small class="text-muted d-block mt-1">Preview will appear here</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Group Insurance Card - New Row Layout -->
                        <div class="col-12">
                            <div class="row align-items-center g-3">
                                <div class="col-md-6">
                                    <label for="group_ins" class="form-label mb-1">Group Insurance Card</label>
                                    <input type="file" class="form-control" id="group_ins" name="group_ins"
                                        accept=".pdf,.jpg,.png" >
                                        <input type="hidden" id="hidden_group_ins" name="hidden_group_ins"
                                        value="">
                                </div>
                                <div class="col-md-6">
                                    <div id="group_insArea" class="border p-2 text-center" style="min-height: 100px">
                                        <img id="groupInsPreview" src="" alt="Insurance Preview" class="img-fluid"
                                            style="max-height: 100px; display: none;">
                                        <small class="text-muted d-block mt-1">Preview will appear here</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- driver license -->
                        <div class="col-12">
                            <div class="row align-items-center g-3">
                                <div class="col-md-6">
                                    <label for="driver_license" class="form-label mb-1">Driver License</label>
                                    <input type="file" class="form-control" id="driver_license" name="driver_license"
                                        accept=".pdf,.jpg,.png" >
                                    <input type="hidden" id="hidden_driver_license" name="hidden_driver_license"
                                        value="">
                                    </div>
                                <div class="col-md-6">
                                    <div id="driver_licenseArea" class="border p-2 text-center" style="min-height: 100px">
                                        <img id="driver_licensePreview" src="" alt="Driver License Preview" class="img-fluid"
                                            style="max-height: 100px; display: none;">
                                        <small class="text-muted d-block mt-1">Preview will appear here</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Security Clearance - New Row Layout -->
                        <div class="col-12">
                            <div class="row align-items-center g-3">
                                <div class="col-md-6">
                                    <label for="sec_clearence" class="form-label mb-1">Security Clearance</label>
                                    <input type="file" class="form-control" id="sec_clearence" name="sec_clearence"
                                        accept=".pdf,.jpg,.png" >
                                    <input type="hidden" id="hidden_sec_clearence" name="hidden_sec_clearence"
                                        value="">
                                </div>
                                <div class="col-md-6">
                                    <div id="sec_clearenceArea2" class="border p-2 text-center"
                                        style="min-height: 100px">
                                        <img id="secClearancePreview" src="" alt="Clearance Preview" class="img-fluid"
                                            style="max-height: 100px; display: none;">
                                        <small class="text-muted d-block mt-1">Preview will appear here</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="email" class="form-label mb-1">Email Address</label>
                            <input type="email" class="form-control py-2" id="email" name="email"
                                placeholder="Enter Email Address" required>
                        </div>

                        <!-- Contact Numbers -->
                        <div class="row">
                            <!-- Contact Numbers Section -->
                            <div class="col-md-12  pb-2 mt-3">
                                <h6 class="fw-bold text-dark border-bottom pb-2 mb-3">Contact Numbers</h6>

                                <div class="row g-3">
                                    <!-- Cell #1 -->
                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label for="cell_1" class="form-label small text-dark">Pakistan
                                                Number</label>
                                            <div class="input-group border rounded">
                                                <span class="input-group-text bg-light"><i
                                                        class="bx bx-phone text-dark"></i></span>
                                                <input type="text" class="form-control border-0" id="cell_1"
                                                    name="cell_1" placeholder="+92 300 1234567" required>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Cell #2 -->
                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label for="cell_2" class="form-label small text-dark">Afghanistan
                                                Number</label>
                                            <div class="input-group border rounded">
                                                <span class="input-group-text bg-light"><i
                                                        class="bx bx-phone text-dark"></i></span>
                                                <input type="text" class="form-control border-0" id="cell_2"
                                                    name="cell_2" placeholder="+92 301 1234567">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Cell #3 -->
                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label for="cell_3" class="form-label small text-dark">Uzbakistan
                                                Number</label>
                                            <div class="input-group border rounded">
                                                <span class="input-group-text bg-light"><i
                                                        class="bx bx-phone text-dark"></i></span>
                                                <input type="text" class="form-control border-0" id="cell_3"
                                                    name="cell_3" placeholder="+92 302 1234567">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Cell #4 -->
                                    <div class="col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label for="cell_4" class="form-label small text-dark">Tajikistan
                                                Number</label>
                                            <div class="input-group border rounded">
                                                <span class="input-group-text bg-light"><i
                                                        class="bx bx-phone text-dark"></i></span>
                                                <input type="text" class="form-control border-0" id="cell_4"
                                                    name="cell_4" placeholder="+92 303 1234567">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- russian number -->
                                    <!-- <div class="col-md-6 col-lg-3">
                <div class="form-group">
                    <label for="cell_4" class="form-label small text-dark">Russian Number</label>
                    <div class="input-group border rounded">
                        <span class="input-group-text bg-light"><i class="bx bx-phone text-dark"></i></span>
                        <input type="text" class="form-control border-0" id="cell_5" name="cell_5" 
                               placeholder="+92 303 1234567">
                    </div>
                </div>
            </div> -->
                                </div>
                            </div>
                        </div>
                        <!-- Email -->


                        <!-- Hidden Fields -->
                        <input type="hidden" name="created_by" value="<?php echo $_SESSION['user_id']; ?>">
                        <input type="hidden" name="parent_id" value="<?php echo $_SESSION['user_id']; ?>">
                        <input type="hidden" name="row_id" id="row_id" value="0">

                        <!-- Submit Button -->
                        <div class="col-md-12 text-center mt-3">
                            <input class="btn btn-primary rounded-pill px-4 py-2" id="insert" type="submit"
                                value="Save Driver">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- visa offcanvas -->
    <div class="offcanvas offcanvas-end w-75" tabindex="-1" id="visaoffcanvasRight"
        aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header border-bottom">
            <h5 id="offcanvasRightLabel">Visas</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="visaoffcanvasRight"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="container-fluid">
                <form method="post" id="visa_form" enctype="multipart/form-data">

                    <div class="row mb-2">
                        <div class="col-md-12">
                            <h5>Visa Information</h5>
                            <button type="button" class="btn btn-sm btn-success" id="addVisa">+ Add Visa</button>
                        </div>
                    </div>
                    <input type="hidden" name="driver_id" id="driver_id" value="0">
                    <!-- Visa Container (dynamic fields will be added here) -->
                    <div id="visaContainer">
                        <!-- <div class="visa-entry border p-3 mb-3">
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label>Visa Country</label>
                                    <input type="text" class="form-control" name="visa_country[]" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Visa Number</label>
                                    <input type="text" class="form-control" name="visa_number[]" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Visa Expiry</label>
                                    <input type="date" class="form-control" name="visa_expiry[]" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Visa Scan</label>
                                    <input type="file" class="form-control" name="visa_scan[]" accept=".pdf,.jpg,.png"
                                        required>
                                    <button type="button" class="btn btn-sm btn-danger mt-2 remove-visa">Remove</button>
                                </div>
                            </div>
                        </div> -->

                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <input class="btn btn-primary rounded-pill" id="insert_visa" type="submit" value="Save">
                        </div>
                    </div>

                </form>
            </div>
        </div>
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

        document.getElementById('addVisa').addEventListener('click', function() {
            const visaContainer = document.getElementById('visaContainer');
            const newVisaEntry = document.createElement('div');
            newVisaEntry.className = 'visa-entry border p-3 mb-3';
            newVisaEntry.innerHTML = `
        <div class="row">
            <div class="form-group col-md-3">
                <label>Visa Country</label>
                <input type="text" class="form-control" name="visa_country[]" required>
            </div>
            <div class="form-group col-md-3">
                <label>Visa Number</label>
                <input type="text" class="form-control" name="visa_number[]" required>
            </div>
            <div class="form-group col-md-3">
                <label>Visa Expiry</label>
                <input type="date" class="form-control" name="visa_expiry[]" required>
            </div>
            <div class="form-group col-md-3">
                <label>Visa Scan</label>
                <input type="file" class="form-control" name="visa_scan[]" accept=".pdf,.jpg,.png" required>
                <button type="button" class="btn btn-sm btn-danger mt-2 remove-visa">Remove</button>
            </div>
        </div>
    `;
            visaContainer.appendChild(newVisaEntry);
        });

        // Event delegation for remove buttons
        document.getElementById('visaContainer').addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-visa')) {
                e.target.closest('.visa-entry').remove();
            }
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


        // visa form
        $('#visa_form').on("submit", function(event) {
            event.preventDefault();
            // alert("Name")
            var data = new FormData(this);
            $.ajax({
                url: "<?php echo $api_url2; ?>create/create_driver_visa.php",
                cache: false,
                contentType: false,
                processData: false,
                method: "POST",
                data: data,
                beforeSend: function() {
                    $('#insert_visa').val("Saving");
                    document.getElementById("insert_visa").disabled = true;

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
                            $('#visa_form')[0].reset();
                            $('#visaoffcanvasRight').modal('hide');
                            fetchtable();

                            document.getElementById("insert_visa").disabled =
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
                    $('#blood_group').val(response[0]['blood_group']);
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
                    $('#hidden_passport_scan').val(response[0]['passport_scan']);
                    $('#hidden_national_id_scan').val(response[0]['national_id_scan']);
                    $('#hidden_driver_license').val(response[0]['driver_license']);
                    $('#hidden_sec_clearence').val(response[0]['sec_clearence_cert']);
                    $('#hidden_group_ins').val(response[0]['group_ins_card']);
                    
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


                    // document.getElementById("imagePreview2").src =
                    //     "http://localhost/logistic_bridge_api/uploads/purchase_orders/" +
                    //     response[0]['contract_file'] + "";
                    // Set the PDF file preview
                    const pdfIcon =
                        "http://localhost/logistic_bridge_api/uploads/drivers/" +
                        response[0][
                            'national_id_scan'
                        ]; // Path to the PDF icon
                    const pdfUrl = "http://localhost/logistic_bridge_api/uploads/drivers/" +
                        response[0][
                            'national_id_scan'
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
                    pdfImg.style.width = "150PX";
                    pdfImg.style.height = "auto";

                    pdfLink.appendChild(pdfImg);
                    pdfPreviewContainer.appendChild(pdfLink);

                    const passportUrl = "http://localhost/logistic_bridge_api/uploads/drivers/" +
                        response[0]['passport_scan'];
                    const passportPreviewContainer = document.getElementById('passportArea');

                    // Clear existing content
                    passportPreviewContainer.innerHTML = "";

                    // Create preview
                    const passportLink = document.createElement('a');
                    passportLink.href = passportUrl;
                    passportLink.target = "_blank";

                    const passportImg = document.createElement('img');
                    passportImg.src = "http://localhost/logistic_bridge_api/uploads/drivers/" +
                        response[0]['passport_scan'];
                    passportImg.alt = "PDF Icon";
                    passportImg.style.width = "150PX";
                    passportImg.style.height = "auto";

                    passportLink.appendChild(passportImg);
                    passportPreviewContainer.appendChild(passportLink);
                    // sec clearence

                    const secClearanceUrl = "http://localhost/logistic_bridge_api/uploads/drivers/" +
                        response[0]['sec_clearence_cert'];
                    const secClearanceContainer = document.getElementById('sec_clearenceArea2');
                    secClearanceContainer.innerHTML = "";

                    if (response[0]['sec_clearence_cert']) {
                        const secClearanceLink = document.createElement('a');
                        secClearanceLink.href = secClearanceUrl;
                        secClearanceLink.target = "_blank";
                        secClearanceLink.title = "View Security Clearance";

                        const secClearanceImg = document.createElement('img');
                        secClearanceImg.src = "http://localhost/logistic_bridge_api/uploads/drivers/" +
                            response[0]['sec_clearence_cert'];; // Your PDF icon variable
                        secClearanceImg.alt = "Security Clearance Certificate";
                        secClearanceImg.className = "document-preview"; // Add consistent styling
                        secClearanceImg.style.width = "150PX";
                        secClearanceImg.style.height = "auto";

                        secClearanceLink.appendChild(secClearanceImg);
                        secClearanceContainer.appendChild(secClearanceLink);
                    } else {
                        secClearanceContainer.textContent = "No certificate uploaded";
                    }

                    const groupInsUrl = "http://localhost/logistic_bridge_api/uploads/drivers/" +
                        response[0]['group_ins_card'];
                    const groupInsContainer = document.getElementById('group_insArea');
                    groupInsContainer.innerHTML = "";

                    if (response[0]['group_ins_card']) {
                        const groupInsLink = document.createElement('a');
                        groupInsLink.href = groupInsUrl;
                        groupInsLink.target = "_blank";
                        groupInsLink.title = "View Group Insurance";

                        const groupInsImg = document.createElement('img');
                        groupInsImg.src = "http://localhost/logistic_bridge_api/uploads/drivers/" +
                            response[0]['group_ins_card']; // Your PDF icon variable
                        groupInsImg.alt = "Group Insurance Card";
                        groupInsImg.className = "document-preview"; // Add consistent styling
                        groupInsImg.style.width = "150px";
                        groupInsImg.style.height = "auto";
                        groupInsLink.appendChild(groupInsImg);
                        groupInsContainer.appendChild(groupInsLink);
                    } else {
                        groupInsContainer.textContent = "No insurance card uploaded";
                    }

                    // driver license
                    const driver_licenseUrl = "http://localhost/logistic_bridge_api/uploads/drivers/" +
                        response[0]['driver_license'];
                    const driver_licenseContainer = document.getElementById('driver_licenseArea');
                    driver_licenseContainer.innerHTML = "";

                    if (response[0]['driver_license']) {
                        const driver_licenseLink = document.createElement('a');
                        driver_licenseLink.href = driver_licenseUrl;
                        driver_licenseLink.target = "_blank";
                        driver_licenseLink.title = "View Driver License";

                        const driver_licenseImg = document.createElement('img');
                        driver_licenseImg.src = "http://localhost/logistic_bridge_api/uploads/drivers/" +
                            response[0]['driver_license']; // Your PDF icon variable
                        driver_licenseImg.alt = "Driver License";
                        driver_licenseImg.className = "document-preview"; // Add consistent styling
                        driver_licenseImg.style.width = "150px";
                        driver_licenseImg.style.height = "auto";
                        driver_licenseLink.appendChild(driver_licenseImg);
                        driver_licenseContainer.appendChild(driver_licenseLink);
                    } else {
                        driver_licenseContainer.textContent = "No Driver License uploaded";
                    }

                    $('#offcanvasRight').offcanvas('show');

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

    function visa_info(driver_id) {
        const visaContainer = document.getElementById("visaContainer");
        visaContainer.innerHTML = ""; // Clear previous
        $('#driver_id').val(driver_id); // Set the driver_id in the form

        $.ajax({
            url: `<?php echo $api_url2?>get/driver_visas.php?key=03201232927&driver_id=${driver_id}`,
            method: "GET",
            success: function(response) {
                response = JSON.parse(response);

                if (response.status === "success" && Array.isArray(response.data)) {
                    const today = new Date();
                    const warningDate = new Date();
                    warningDate.setDate(today.getDate() + 15); // 15 days from now

                    response.data.forEach((visa) => {
                        const visaEntry = document.createElement("div");
                        visaEntry.className = "visa-entry border p-3 mb-3";

                        // Check if visa expires within 15 days
                        const expiryDate = new Date(visa.expiry_date);
                        const isExpiringSoon = expiryDate <= warningDate;

                        // Add danger class if expiring soon
                        if (isExpiringSoon) {
                            visaEntry.classList.add("border-danger", "bg-danger-light");
                        }

                        visaEntry.innerHTML = `
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>Visa Country</label>
                            <input type="text" class="form-control" name="visa_country[]" value="${visa.country}" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Visa Number</label>
                            <input type="text" class="form-control" name="visa_number[]" value="${visa.visa_number}" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Visa Expiry</label>
                            <input type="date" class="form-control ${isExpiringSoon ? 'text-danger fw-bold' : ''}" 
                                   name="visa_expiry[]" value="${visa.expiry_date}" required>
                            ${isExpiringSoon ? '<span class="badge bg-danger ms-2">Expiring Soon</span>' : ''}
                        </div>
                        <div class="form-group col-md-3">
                            <label>Visa Scan</label>
                            <input type = "hidden" name = "file_hidden[]" value = "${visa.visa_scan}">
                            <input type="file" class="form-control" name="visa_scan[]" accept=".pdf,.jpg,.png">
<div class="d-flex align-items-center">
        <a href="http://localhost/logistic_bridge_api/uploads/visas/${visa.visa_scan}" class="view-scan-link me-2" target="_blank" >
            <i class="bx bx-show"></i> View
        </a>
        <button type="button" class="btn btn-sm btn-danger remove-visa">Remove</button>
    </div>                        </div>
                    </div>
                    `;
                        visaContainer.appendChild(visaEntry);
                    });
                }
            },
            error: function() {
                // Swal.fire("Error", "Failed to fetch visa data.", "error");
            }
        });
        $('#visaoffcanvasRight').offcanvas('show');
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
                        //     <i class="bx bx-show font-size-16 align-middle"></i> <!-- View icon -->

                        '<button type="button" id="view_visa" name="view_visa" onclick="visa_info(' +
                        data.id +
                        ')" class="btn btn-soft-warning waves-effect waves-light">    <i class="bx bx-show font-size-16 align-middle"></i></button>',
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