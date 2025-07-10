<?php include 'session/session_input.php'; ?>
<!doctype html>
<html lang="en">


<!-- Mirrored from themesdesign.in/webadmin/layouts/pages-starter.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 10:08:03 GMT -->

<head>

    <meta charset="utf-8" />
    <title>
        Job Cards |
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
.document-item {
    background-color: #f8f9fa;
    transition: all 0.2s ease;
}

/* .document-item:hover {
    background-color: #f1f1f1;
    box-shadow: 0 2px 6px rgba(0,0,0,0.05);
} */

.font-monospace {
    font-family: 'SFMono-Regular', Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
    font-size: 0.85rem;
}

.remove-doc {
    padding: 0.25rem 0.5rem;
    font-size: 0.75rem;
}

/* Custom Timeline Styling */
.timeline {
    position: relative;
    padding: 20px 0;
    list-style: none;
}

.timeline:before {
    content: ' ';
    position: absolute;
    top: 0;
    bottom: 0;
    left: 50px;
    width: 2px;
    margin-left: -1px;
    background-color: #e9ecef;
}

.timeline-item {
    position: relative;
    margin-bottom: 20px;
}

.timeline-badge {
    position: absolute;
    width: 40px;
    height: 40px;
    left: 30px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    background: #2575fc;
    z-index: 2;
}

.timeline-badge.success {
    background: #2ecc71;
}

.timeline-badge.warning {
    background: #f39c12;
}

.timeline-badge.danger {
    background: #e74c3c;
}

.timeline-badge.info {
    background: #3498db;
}

.timeline-panel {
    position: relative;
    margin-left: 80px;
    padding: 15px;
    border-radius: 8px;
    background: white;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    border-left: 3px solid #2575fc;
}

.timeline-panel:before {
    content: ' ';
    position: absolute;
    top: 20px;
    left: -10px;
    border-top: 10px solid transparent;
    border-bottom: 10px solid transparent;
    border-right: 10px solid white;
}

.timeline-heading h6 {
    font-weight: 600;
}

.timeline-body {
    padding-top: 5px;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .timeline:before {
        left: 40px;
    }

    .timeline-badge {
        left: 20px;
    }

    .timeline-panel {
        margin-left: 60px;
    }
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
                            <button class="btn btn-soft-primary waves-effect waves-light" type="button" id="add_btn"><i
                                    class="bx bxs-add-to-queue font-size-16 align-middle me-2 cursor-pointer"></i>Add</button>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h3>Job Cards</h3>

                            <table id="myTable" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">S.No</th>
                                        <th class="text-center">Job Card No</th>
                                        <th class="text-center">Vehicle Reg no</th>
                                        <th class="text-center">Driver Name</th>
                                        <!-- <th class="text-center">TIR</th>
                                        <th class="text-center">CMR</th>
                                        <th class="text-center">GD</th> -->
                                        <th class="text-center">Upload Documents</th>
                                        <th class="text-center">View Documents</th>
                                        <th class="text-center">Log Expense</th>
                                        <!-- <th class="text-center">Log Activity</th> -->
                                        <th class="text-center">View Expenses</th>
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

    <!-- expense logging modal  -->
    <div class="modal fade show" id="expenseLoggModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="jobCardModalLabel">Job Card Expense</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="expenseForm" method="POST" enctype="multipart/form-data">
                        <!-- Hidden Job Card ID -->
                        <input type="hidden" id="job_card_id_exp" name="job_card_id">
                        <!-- <input type="hidden" id="purchase_order_id_exp" name="purchase_order_id"> -->
                        <input type="hidden" id="created_by_exp" name="created_by"
                            value="<?php echo $_SESSION['user_id']; ?>">
                        <div class="row">

                            <!-- Direction -->
                            <div class="mb-3">
                                <label class="form-label">Direction</label>
                                <!--  class="js-example-basic-single"  -->
                                <select class="form-select" id="direction" name="direction" required>
                                    <option value="">Select Direction</option>
                                    <option value="Outbound">Outbound</option>
                                    <option value="Inbound">Inbound</option>
                                </select>
                            </div>

                            <!-- Country -->
                            <div class="mb-3">
                                <label class="form-label">Country</label>
                                <select class="form-select " id="country" name="country" required>
                                    <option value="">Select country</option>


                                </select>
                            </div>

                            <!-- Location -->
                            <div class="mb-3">
                                <label class="form-label">Location</label>
                                <select class="form-select" id="location_exp" name="location" required>
                                    <option value="">Select Location</option>


                                </select>
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="2"
                                    placeholder="Enter expense description" required></textarea>
                            </div>


                            <!-- Currency -->
                            <div class="mb-3">
                                <label class="form-label">Currency</label>

                                <select class="form-select" id="currency" name="currency" required>
                                    <option value="">Select Currency</option>


                                </select>
                            </div>

                            <!-- Local Expenses -->
                            <div class="mb-3">
                                <label class="form-label">Local Expenses</label>
                                <input type="number" step="0.01" class="form-control" id="local_expenses"
                                    name="local_expenses" required>
                            </div>

                            <!-- Expense Type -->
                            <div class="mb-3">
                                <label class="form-label">Expense Type</label>
                                <select class="form-select" id="expense_type" name="expense_type" required>
                                    <option value="">Select Expense Type</option>
                                    <option value="Misc">Misc</option>
                                    <option value="Fuel">Fuel</option>
                                    <option value="Toll">Toll</option>

                                </select>
                            </div>




                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <input class="btn rounded-pill btn-primary" style="margin: 10px 0px;" type="submit"
                                    name="insert" id="expense_insert" value="Save Expense">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- expenses reportt modal  -->
    <div class="modal fade show" id="expenseReportModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="jobCardModalLabel">Job Card Expenses Report</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table id="expTable" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">S.No</th>
                                <th>Date</th>
                                <th>Direction</th>
                                <th>Country</th>
                                <th>Location</th>
                                <th>Description</th>
                                <th>Currency</th>
                                <th>Local Expenses</th>
                                <th>Exchange Rate</th>
                                <th>Converted USD</th>
                                <th>Converted PKR</th>
                                <th>Expense Type</th>
                                <!-- <th>Created By</th> -->
                                <!-- <th>Created At</th> -->
                                <!-- <th class="text-center">Log Activity</th> -->
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
    <!-- joob cards modal -->
    <!-- Modal -->
    <div class="modal fade" id="jobCardModal" tabindex="-1" aria-labelledby="jobCardModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="jobCardModalLabel">Job Cards</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="jobCardForm" method="POST" enctype="multipart/form-data">
                        <input type="hidden" id="job_order_id" name="job_order_id">
                        <input type="hidden" id="purchase_order_id" name="purchase_order_id">
                        <input type="hidden" id="created_by" name="created_by" value="1">

                        <div class="row mb-2">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-sm btn-success" id="addJobCardBtn">+ Add Job
                                    Card</button>
                            </div>
                        </div>

                        <div id="jobCardContainer"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input class="btn rounded-pill btn-primary" style="margin: 10px 0px;" type="submit" name="insert"
                        id="job_card_insert" value="Save Job cards">
                </div>
                </form>
            </div>
        </div>
    </div>
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

    <!-- Vehicle Activity Log Modal -->
    <div class="modal fade" id="vehicleActivityModal" tabindex="-1" aria-labelledby="vehicleActivityModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content border-0 shadow">
                <!-- Header with gradient background -->
                <div class="modal-header border-0 text-white"
                    style="background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);">
                    <h5 class="modal-title d-flex align-items-center" id="vehicleActivityModalLabel">
                        <i class="bx bx-trip me-2"></i>
                        <span>Vehicle Journey Log</span>
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <!-- Modal body with timeline style -->
                <div class="modal-body p-0">
                    <div class="timeline-container">
                        <ul class="timeline" id="vehicleActivityList">
                            <!-- Sample item (will be replaced dynamically) -->
                            <li class="timeline-item">
                                <div class="timeline-badge success">
                                    <i class="bx bx-check-circle"></i>
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h6 class="d-flex justify-content-between">
                                            <span class="text-primary">
                                                <i class="bx bx-map me-1"></i> Karachi Border
                                            </span>
                                            <small class="text-muted">Today, 10:30 AM</small>
                                        </h6>
                                    </div>
                                    <div class="timeline-body">
                                        <p class="mb-1">Completed border crossing procedures</p>
                                        <div class="d-flex align-items-center text-muted">
                                            <i class="bx bx-time me-1"></i>
                                            <small>Processing time: 45 minutes</small>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- quetta -->
                            <li class="timeline-item">
                                <div class="timeline-badge success">
                                    <i class="bx bx-check-circle"></i>
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h6 class="d-flex justify-content-between">
                                            <span class="text-primary">
                                                <i class="bx bx-map me-1"></i> Queeta Border
                                            </span>
                                            <small class="text-muted">Today, 10:30 AM</small>
                                        </h6>
                                    </div>
                                    <div class="timeline-body">
                                        <p class="mb-1">Completed border crossing procedures</p>
                                        <div class="d-flex align-items-center text-muted">
                                            <i class="bx bx-time me-1"></i>
                                            <small>Processing time: 85 minutes</small>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- stucked -->
                            <li class="timeline-item">
                                <div class="timeline-badge danger">
                                    <i class="bx bx-check-circle"></i>
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h6 class="d-flex justify-content-between">
                                            <span class="text-primary">
                                                <i class="bx bx-map me-1"></i> Chaman Border
                                            </span>
                                            <small class="text-muted">Today, 10:30 AM</small>
                                        </h6>
                                    </div>
                                    <div class="timeline-body">
                                        <p class="mb-1">Stucked</p>
                                        <div class="d-flex align-items-center text-muted">
                                            <i class="bx bx-time me-1"></i>
                                            <small>Processing time: pending</small>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Footer with summary -->
                <div class="modal-footer bg-light">
                    <div class="d-flex w-100 justify-content-between">
                        <div>
                            <i class="bx bx-stats text-primary me-2"></i>
                            <span id="activityStats">3 milestones completed</span>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-primary">
                            <i class="bx bx-printer me-1"></i> Export Log
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- modal -->
    <div class="modal fade" id="activityModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Log Activity</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="activityForm" method="POST" enctype="multipart/form-data">
                        <!-- Event Type Dropdown -->
                        <div class="mb-3">
                            <input type="hidden" id="job_c_id" name="job_c_id">
                            <label class="form-label">Event Type</label>
                            <select class="form-select" id="eventType" name="event_type" required>
                                <option value="">Select Event</option>
                                <option value="departure">Departure</option>
                                <option value="arrival">Arrival</option>
                                <option value="delay">Delay</option>
                                <option value="incident">Incident</option>
                            </select>
                        </div>

                        <!-- Dynamic Location Dropdown -->
                        <div class="mb-3">
                            <label class="form-label">Location</label>
                            <select class="form-select" id="location" name="location_name" required>
                                <option value="">Loading locations...</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Remarks</label>
                            <textarea class="form-control" id="remarks" name="remarks" rows="2"
                                placeholder="Enter any additional remarks"></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" id="saveActivity">
                </div>
            </div>
            </form>

        </div>
    </div>
    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- doc off canvas -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="documentsOffcanvas">
        <div class="offcanvas-header">
            <h5>Uploaded Documents</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div id="tirContainer">
            <h6>TIR Documents</h6>
            <div class="document-list"></div>
        </div>

        <div id="cmrContainer" class="mt-4">
            <h6>CMR Documents</h6>
            <div class="document-list"></div>
        </div>
    </div>

    <!-- offcanvas doucments -->
    <div class="offcanvas offcanvas-end w-75" tabindex="-1" id="documentUploadCanvas">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Upload Documents</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">

            <!-- Document Selection and Upload Section -->
            <div class="mb-3">
                <div class="row g-3 align-items-end">
                    <div class="col-md-4">
                        <label class="form-label">Document Type</label>
                        <select class="form-select doc-type-select">
                            <option value="">Select Document Type</option>
                            <option value="tir">TIR Document</option>
                            <option value="cmr">CMR Document</option>
                            <option value="gd">GD Document</option>
                            <option value="tmr">TMR Document</option>
                            <option value="insurance">Insurance Certificate</option>
                            <!-- Add more as needed -->
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Document File</label>
                        <input type="file" class="form-control doc-file-input" name="">
                        <!-- <input type="file" name="tir[]" id="actualFileInput" style="display:none"> -->

                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Remarks</label>
                        <input type="text" class="form-control doc-file-remarks" name="">
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-primary w-100 add-doc-btn">Add</button>
                    </div>
                </div>
            </div>

            <!-- Documents List Container -->
            <div id="documentsContainer" class="mb-3">
                <!-- Dynamic documents will appear here -->
            </div>
            <form id="uploadDocsForm" enctype="multipart/form-data">
                <input type="hidden" name="job_card_id" id="job_card_id">
                <input type="hidden" name="uploaded_by" value="<?php echo $_SESSION['user_id']; ?>">


                <button type="submit" class="btn btn-success">Upload Documents</button>
            </form>
        </div>
    </div>

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
                            <select class="form-control " id="transporter_id" name="transporter_id">
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
            let jobCardIndex = 0;
            let trucks_data = "";
            let drivers_data = "";
            let uploadedDocs = []; // Array to hold uploaded documents
            load_all_select();
            $(document).ready(function() {
                // $('.js-example-basic-multiple').select2();
                // var myModal = new bootstrap.Modal(document.getElementById('vehicleActivityModal'));
                // myModal.show();
                $('.js-example-basic-single').select2();
                var invalidChars = /[$&'".?/]/;

                // Prevent typing invalid characters
                $("#password, #confirm_password").on("keydown", function(event) {
                    var key = event.key;
                    if (invalidChars.test(key)) {
                        event.preventDefault(); // Stop the character from appearing in input
                    }
                });
                document.getElementById('addJobCardBtn').addEventListener('click', () => {
                    appendJobCard();
                });

                // Remove job card
                document.addEventListener('click', function(e) {
                    if (e.target.classList.contains('remove-job-card')) {
                        e.target.closest('.job-card-entry').remove();
                    }
                });

                // doucment uploader
                document.querySelector('.add-doc-btn').addEventListener('click', function() {
                    const typeSelect = this.closest('.row').querySelector('.doc-type-select');
                    const fileInput = this.closest('.row').querySelector('.doc-file-input');
                    const fileRemarks = this.closest('.row').querySelector('.doc-file-remarks');
                    // const actualFileInput = document.getElementById('actualFileInput');
                    // actualFileInput.name = `${typeSelect.value}[]`; // Set name="tir[]"
                    // actualFileInput.files = fileInput.files; // Transfer file data
                    if (!typeSelect.value || !fileInput.files.length) {
                        alert('Please select both document type and file');
                        return;
                    }

                    const docContainer = document.getElementById('documentsContainer');
                    const docId = Date.now(); // Unique ID for each document

                    // append files into doc array
                    uploadedDocs.push({
                        type: typeSelect.value,
                        file: fileInput.files[0],
                        remarks: fileRemarks.value || 'No remarks'
                    });

                    console.log(uploadedDocs);

                    docContainer.innerHTML += `
        <div class="document-item border p-3 mb-2 rounded" data-type = "${typeSelect.value}" data-filename = "${fileInput.files[0].name}" data-doc-id="${docId}">
    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex flex-column">
            <div class="d-flex align-items-center mb-1">
                <strong class="text-primary me-2">${typeSelect.options[typeSelect.selectedIndex].text}:</strong>
                <span class="text-muted font-monospace">${fileInput.files[0].name}</span>
            </div>
            <div class="d-flex align-items-center">
                <span class="badge bg-light text-dark">
                    <i class="bx bx-note me-1"></i>${fileRemarks.value || 'No remarks'}
                </span>
            </div>
        </div>
        <div>
            
            <button type="button" class="btn btn-sm btn-outline-danger remove-doc">
                <i class="bx bx-trash"></i>
            </button>
        </div>
    </div>
</div>
    `;
                    // 


                    // 4. Append to form

                    // Reset inputs
                    typeSelect.value = '';
                    fileInput.value = '';
                    // docContainer.appendChild(hiddenInput);
                });

                // Remove document handler
                document.addEventListener('click', function(e) {
                    if (e.target.classList.contains('remove-doc')) {
                        const docEntry = e.target.closest(
                            '.document-item');

                        // Get values to identify which file to remove
                        const type = docEntry.getAttribute('data-type');
                        const fileName = docEntry.getAttribute('data-filename');

                        // Remove from array
                        uploadedDocs = uploadedDocs.filter(doc => !(doc.type === type && doc.file
                            .name === fileName));

                        // Remove from DOM
                        docEntry.remove();
                        console.log(uploadedDocs);
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

                $("#country").on("change", function() {
                    var selectedRole = $(this).val();
                    // Hide all secondary dropdowns
                    // locations test 
                    $.ajax({
                        url: `<?php echo $api_url2; ?>get/all_cities.php?key=03201232927&country_id=${selectedRole}`,
                        method: 'GET',
                        dataType: 'json',
                        success: function(response) {

                            data = response['data'];
                            $('#location_exp').empty(); // Clear existing options
                            $.each(data, function(index, item) {
                                $('#location_exp').append($('<option>', {
                                    value: item.id,
                                    text: item.name
                                }));
                            });

                            // Refresh the Select2 element to display the newly added options
                            $('#location_exp').trigger('change.select2');
                        },
                        error: function(error) {
                            console.error('Error fetching data:', error);
                        }
                    });

                });



                table = $('#myTable').DataTable({
                    dom: 'Bfrtip',


                    buttons: ['copy', 'excel', 'csv', 'pdf', 'print']

                });
                // expenses     table
                exp_table = $('#expTable').DataTable({
                    dom: 'Bfrtip',


                    buttons: ['copy', 'excel', 'csv', 'pdf', 'print'],
                    scrollX: true

                });


                fetchtable();
                $('#add_btn').click(function() {

                    $('#row_id').val("");

                    $('#insert_form')[0].reset();
                    $('#jobCardModal').modal('show');
                    // $('#expenseLoggModal').modal('show');
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
                                        document.getElementById("insert")
                                            .disabled =
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
                                        document.getElementById("insert")
                                            .disabled =
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
            // event listener for logging activity
            $('#activityForm').on("submit", function(event) {
                //    get the form data
                event.preventDefault();

                var data = new FormData(this);
                $.ajax({
                    url: "<?php echo $api_url2; ?>create/job_card_activity_log.php",
                    cache: false,
                    contentType: false,
                    processData: false,
                    method: "POST",
                    data: data,
                    beforeSend: function() {
                        $('#saveActivity').val("Saving");
                        document.getElementById("saveActivity").disabled = true;

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
                                $('#activityForm')[0].reset();

                                $('#saveActivity').val("Save");
                                document.getElementById("job_card_insert").disabled =
                                    false;

                                location.reload();


                            }, 2000);

                        } else {
                            // ------------------
                            Swal.fire(
                                'Server Error!',
                                'Record Not Created',
                                'error'
                            )
                            $('#saveActivity').val("Save");
                            document.getElementById("saveActivity").disabled = false;


                        }

                    }
                });
            });

            // event listener for job card button
            $('#jobCardForm').on("submit", function(event) {
                //    get the form data
                event.preventDefault();

                var data = new FormData(this);
                $.ajax({
                    url: "<?php echo $api_url2; ?>create/create_job_cards.php",
                    cache: false,
                    contentType: false,
                    processData: false,
                    method: "POST",
                    data: data,
                    beforeSend: function() {
                        $('#job_card_insert').val("Saving");
                        document.getElementById("job_card_insert").disabled = true;

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
                                $('#job_card_insert').val("Save");
                                document.getElementById("job_card_insert").disabled =
                                    false;

                                location.reload();


                            }, 2000);

                        } else {
                            // ------------------
                            Swal.fire(
                                'Server Error!',
                                'Record Not Created',
                                'error'
                            )
                            $('#job_card_insert').val("Save");
                            document.getElementById("job_card_insert").disabled = false;


                        }

                    }
                });
            });
            // event for the log expense form
            $('#expenseForm').on("submit", function(event) {
                //    get the form data
                event.preventDefault();

                var data = new FormData(this);
                $.ajax({
                    url: "<?php echo $api_url2; ?>create/log_trip_expense.php",
                    cache: false,
                    contentType: false,
                    processData: false,
                    method: "POST",
                    data: data,
                    beforeSend: function() {
                        $('#expense_insert').val("Saving");
                        document.getElementById("expense_insert").disabled = true;

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
                                $('#expenseForm')[0].reset();


                                // location.reload();


                            }, 2000);

                        } else {
                            // ------------------
                            Swal.fire(
                                'Server Error!',
                                'Record Not Created',
                                'error'
                            )
                            $('#job_card_insert').val("Save");
                            document.getElementById("job_card_insert").disabled = false;


                        }

                    }
                });
            });
            // -------------------
            $('#uploadDocsForm').on("submit", function(event) {
                //    get the form data
                event.preventDefault();

                var data = new FormData(this);
                uploadedDocs.forEach(doc => {
                    data.append(`${doc.type}[]`, doc.file);
                    data.append(`${doc.type}_remarks[]`, doc.remarks);
                });
                // logged the form values with keys



                $.ajax({
                    url: "<?php echo $api_url2; ?>create/upload_job_card_doc.php",
                    cache: false,
                    contentType: false,
                    processData: false,
                    method: "POST",
                    data: data,
                    beforeSend: function() {
                        $('#job_card_insert').val("Saving");
                        document.getElementById("job_card_insert").disabled = true;

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
                                $('#job_card_insert').val("Save");
                                document.getElementById("job_card_insert").disabled =
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
                            $('#job_card_insert').val("Save");
                            document.getElementById("job_card_insert").disabled = false;


                        }

                    }
                });
            });



            $('#password,#confirm_password').on('input', function() {
                validatePassword();
            });

            function appendJobCard() {
                // const trucks = await fetchOptions('path/to/get_trucks.php');
                // const drivers = await fetchOptions('path/to/get_drivers.php');

                const container = document.getElementById('jobCardContainer');
                const card = document.createElement('div');
                card.className = 'job-card border p-3 mb-3';

                const truckOptions = trucks_data.map(t => `<option value="${t.id}">${t.trailer_reg_no}</option>`)
                    .join(
                        '');
                const driverOptions = drivers_data.map(d => `<option value="${d.id}">${d.name}</option>`).join('');

                card.innerHTML = `
    <div class="row">
      <div class="form-group col-md-5">
        <label>Truck</label>
        <select class="form-control" name="trucks[]" required>
          <option value="">Select Truck</option>
          ${truckOptions}
        </select>
      </div>
      <div class="form-group col-md-5">
        <label>Driver</label>
        <select class="form-control" name="drivers[]" required>
          <option value="">Select Driver</option>
          ${driverOptions}
        </select>
      </div>
      <div class="form-group col-md-2 d-flex align-items-end">
        <button type="button" class="btn btn-danger remove-job-card">Remove</button>
      </div>
    </div>
  `;

                container.appendChild(card);
            } // On click Add Job Card


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

            function openDocUpload(job_card_id) {
                // fetch the relevant doucments for the job card via ajax request

                $.ajax({
                    url: "<?php echo $api_url2; ?>get/job_card_documents.php?key=03201232927&job_card_id=" +
                        job_card_id,
                    method: "GET",
                    dataType: "json",
                    success: function(response) {
                        data = response['data'];
                        data.forEach(doc => {
                            const container = document.querySelector(
                                `#${doc.doc_type}Container .document-list`);
                            if (!container) return; // Skip if type container doesn't exist

                            const docDiv = document.createElement('div');
                            docDiv.classList.add('border', 'p-2', 'mb-2', 'rounded');
                            docDiv.innerHTML = `
                    <div class="d-flex justify-content-between align-items-start">
                 <div class="d-flex align-items-center">
                    <div class="me-3 text-primary">
                        <i class="bx bxs-file-pdf fs-4"></i>
                    </div>
                    <div>
                        <a href="http://localhost/logistic_bridge_api/uploads/jobcards/${doc.file_name}" 
                           target="_blank" 
                           class="text-decoration-none fw-semibold">
                            ${doc.file_name}
                        </a>
                        ${doc.remarks ? `
                        <div class="mt-1">
                            <small class="text-muted">
                                <i class="bx bx-note me-1"></i>
                                ${doc.remarks}
                            </small>
                        </div>` : ''}
                    </div>
                </div>
                <div class="dropdown">
                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" 
                            type="button" 
                            data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="http://localhost/logistic_bridge_api/uploads/jobcards/${doc.file_name}" download><i class="bx bx-download me-2"></i>Download</a></li>
                        <li><a class="dropdown-item" href="http://localhost/logistic_bridge_api/uploads/jobcards/${doc.file_name}" target="_blank"><i class="bx bx-show me-2"></i>Preview</a></li>
                    </ul>
                </div>
            </div>
        `;
                            container.appendChild(docDiv);
                        });
                        // document.getElementById('documentsOffcanvas').addEventListener('show.bs.offcanvas', loadDocuments);
                        const canvas = new bootstrap.Offcanvas(document.getElementById(
                            'documentsOffcanvas'));
                        canvas.show();
                    }
                });




            }
            //  function removeDoc(type, file_name, elem) {
            //         uploadedDocs = uploadedDocs.filter(doc => !(doc.type === type && doc.file.name ===
            //             file_name));
            //         eleme.target.closest('.document-item').remove();
            //         }

            function uploadDocuments(jc_id) {
                const docContainer = document.getElementById('documentsContainer');
                docContainer.innerHTML = "";
                document.getElementById('job_card_id').value = job_card_id;
                const canvas = new bootstrap.Offcanvas(document.getElementById('documentUploadCanvas'));
                canvas.show();
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

                const urlParams = new URLSearchParams(window.location.search);
                const job_order_id = urlParams.get('job_order_id');
                const purchase_order_id = urlParams.get('purchase_order_id');
                $('#job_order_id').val(job_order_id);
                $('#purchase_order_id').val(purchase_order_id);

                var requestOptions = {
                    method: 'GET',
                    redirect: 'follow'
                };

                // http://localhost/logistic_bridge_api/get/all_users.php?key=03201232927&user_id=1
                fetch("<?php echo $api_url2; ?>get/job_cards.php?key=03201232927&job_order_id=" + job_order_id + "",
                        requestOptions)
                    .then(response => response.json())
                    .then(response => {
                        console.log(response)
                        response = response['data'];

                        table.clear().draw();
                        $.each(response, function(index, data) {
                            // let priv = data.role_id == 1 ? "Admin" : "Company";

                            table.row.add([
                                index + 1,
                                data.job_card_number,
                                data.reg_no,
                                data.driver_name,
                                ` <button class="btn btn-soft-danger waves-effect waves-light" onclick="uploadDocuments(${data.id})">
                    <i class="bx bx-upload  font-size-16 align-middle"></i>
                </button>`,
                                `<button class="btn btn-sm btn-primary" onclick="openDocUpload(${data.id})">
    <i class="bx bx-file"></i> Doc's
</button>`,
                                `<button class="btn btn-sm btn-primary" onclick="$('#expenseLoggModal').modal('show'); $('#job_card_id_exp').val(${data.id})">
    <i class="fas fa-file-invoice-dollar" title="Log Expense"></i>
</button>`,
                                `<button class="btn btn-sm btn-primary" onclick="getExpenseReport(${data.id})">
    <i class="fas fa-eye"></i>
</button>`
                                //                 ,
                                //                                 `<button class="btn btn-soft-danger waves-effect waves-light" onclick="openActivityModal(${data.id})" title="Log Activity">
                                //   <i class="bx bx-map-pin  font-size-16 align-middle"></i>
                                // </button>`

                            ]).draw(false);
                        });
                    })
                    .catch(error => console.log('error', error));


            }

            function openActivityModal(jobCardId) {
                document.getElementById('job_c_id').value = jobCardId;
                const modal = new bootstrap.Modal(document.getElementById('activityModal'));
                modal.show();
            }



            function getExpenseReport(id) {
                let jc_id = id;
                var requestOptions = {
                    method: 'GET',
                    redirect: 'follow'
                };

                //  <th>Direction</th>
                //                 <th>Country</th>
                //                 <th>Location</th>
                //                 <th>Description</th>
                //                 <th>Currency</th>
                //                 <th>Local Expenses</th>
                //                 <th>Exchange Rate</th>
                //                 <th>Converted USD</th>
                //                 <th>Converted PKR</th>
                //                 <th>Expense Type</th>
                //                 <th>Created By</th>
                // http://localhost/logistic_bridge_api/get/all_users.php?key=03201232927&user_id=1
                fetch("<?php echo $api_url2; ?>get/job_card_expense.php?key=03201232927&job_card_id=" + jc_id + "",
                        requestOptions)
                    .then(response => response.json())
                    .then(response => {
                        response = response['data'];
                        console.log("Response -> ", response)

                        exp_table.clear().draw();
                        $.each(response, function(index, data) {
                            // let priv = data.role_id == 1 ? "Admin" : "Company";
                            const formatted = formatDate(data.created_at);

                            exp_table.row.add([
                                index + 1,
                                formatted,
                                data.direction,
                                data.country,
                                data.location,
                                data.description,
                                data.currency,
                                data.local_expenses,
                                data.exchange_rate,
                                data.converted_usd,
                                data.converted_pkr,
                                data.expense_type,
                                // data.created_by
                            ]).draw(false);
                        });
                        $('#expenseReportModal').modal('show');
                    })
                    .catch(error => console.log('error', error));

            }

            function formatDate(sqlTimestamp) {
                const date = new Date(sqlTimestamp);
                const day = String(date.getDate()).padStart(2, '0');
                const month = date.toLocaleString('en-US', {
                    month: 'short'
                });
                const year = date.getFullYear();
                return `${day}-${month}-${year}`;
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

                let param_url = new URLSearchParams(window.location.search);
                let job_order_id = param_url.get('job_order_id');


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
                // all drivers

                $.ajax({
                    url: '<?php echo $api_url2; ?>get/all_drivers.php?key=03201232927&user_id=<?php echo $_SESSION['user_id']; ?>',
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        drivers_data = response['data'];

                    },
                    error: function(error) {
                        console.error('Error fetching data:', error);
                    }
                });
                // all vehicles 
                $.ajax({

                    url: '<?php echo $api_url2; ?>get/all_vehicles.php?key=03201232927&user_id=<?php echo $_SESSION['user_id']; ?>',
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        // $('#zm').empty(); 
                        // console.log('ZM')
                        // console.log(data)
                        // Iterate through the data and append options to the select element
                        trucks_data = response['data'];


                    },
                    error: function(error) {
                        console.error('Error fetching data:', error);
                    }
                });
                // location -> destination of job cards
                $.ajax({

                    url: `<?php echo $api_url2; ?>get/job_order_route.php?key=03201232927&id=${job_order_id}`,
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        // response = JSON.parse(response);
                        data = JSON.parse(response.route);;

                        $.each(data, function(index, item) {
                            $('#location').append($('<option>', {
                                value: item.name,
                                text: item.name
                            }));
                        });

                        // Refresh the Select2 element to display the newly added options
                        $('#location').trigger('change.select2');


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

                        data = response['data'];

                        $.each(data, function(index, item) {
                            $('#country').append($('<option>', {
                                value: item.id,
                                text: item.name
                            }));
                        });

                        // Refresh the Select2 element to display the newly added options
                        $('#country').trigger('change.select2');
                    },
                    error: function(error) {
                        console.error('Error fetching data:', error);
                    }
                });

                // currencies 
                $.ajax({
                    url: '<?php echo $api_url2; ?>get/currencies.php?key=03201232927',
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {

                        data = response['data'];

                        $.each(data, function(index, item) {
                            $('#currency').append($('<option>', {
                                value: item.currency_code,
                                text: item.currency_code
                            }));
                        });

                        // Refresh the Select2 element to display the newly added options
                        $('#currency').trigger('change.select2');
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