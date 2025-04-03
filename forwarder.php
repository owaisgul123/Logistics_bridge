<%- contentFor('HeaderCss') %>
    <!-- Datatables css -->
    <link href="assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet"
        type="text/css" />
    <link href="assets/vendor/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css" rel="stylesheet"
        type="text/css" />
    <link href="assets/vendor/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css" rel="stylesheet"
        type="text/css" />
    <link href="assets/vendor/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet"
        type="text/css" />
    <link href="assets/vendor/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet"
        type="text/css" />
    <link href="assets/vendor/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css">


    <%- contentFor('body') %>
        <div id="preloader">
            <div id="status">
                <div class="bouncing-loader">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div
                    class="page-title-box justify-content-between d-flex align-items-md-center flex-md-row flex-column">
                    <h4 class="page-title">Limit Top Up Maker</h4>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Jidox</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                        <li class="breadcrumb-item active">User</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div style="display: flex; gap: 10px; margin-bottom: 15px;">
                            <button class="btn btn-soft-success" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                                <i class="fas fa-plus"></i> Create
                            </button>
                        </div>
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
                            aria-labelledby="offcanvasRightLabel" style="width: 40%;">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasRightLabel">Create</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                            <hr>
                            <div class="offcanvas-body" id="createRecordForm">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="instrument_type" class="form-label">Instrument Type</label>
                                        <input type="text" class="form-control" id="instrument_type"
                                            name="instrument_type" placeholder="Enter Instrument Type">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="bank_name" class="form-label">Bank Name</label>
                                        <input type="text" class="form-control" id="bank_name" name="bank_name"
                                            placeholder="Enter Bank Name">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="instrument_ref_no" class="form-label">Instrument Ref No</label>
                                        <input type="text" class="form-control" id="instrument_ref_no"
                                            name="instrument_ref_no" placeholder="Enter Reference No">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="tot_up_amm" class="form-label">Total Top Up Amount</label>
                                        <input type="number" class="form-control" id="tot_up_amm" name="tot_up_amm"
                                            placeholder="Enter Total Amount">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="selec_category" class="form-label">Select Category</label>
                                        <select class="form-control select3" id="selec_category" name="selec_category">
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="comp_types_id" class="form-label">Company</label>
                                        <select class="form-control select3" id="comp_types_id" name="comp_types_id">
                                            <option value="">Choose Company</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="card_types_id" class="form-label">Card</label>
                                        <select class="form-control select3" id="card_types_id" name="card_types_id">
                                            <option value="">Choose Card</option>
                                            <option value="1">Debit Card</option>
                                            <option value="2">Credit Card</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="topup_amm" class="form-label">Top Up Amount</label>
                                        <input type="number" class="form-control" id="topup_amm" name="topup_amm"
                                            placeholder="Enter Top Up Amount">
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button class="btn rounded-pill btn-primary" type="submit"
                                        onclick="create()">Save</button>
                                </div>

                            </div>
                        </div>


                        <table id="users_table" class="table table-striped nowrap w-100">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Instrument Type</th>
                                    <th>Bank Name</th>
                                    <th>Instrument Ref No</th>
                                    <th>Total Top Up Amount</th>
                                    <th>Select Category</th>
                                    <th>Company</th>
                                    <th>Card</th>
                                    <th>Top Up Amount</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                        </table>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div> <!-- end row-->

        <%- contentFor('FooterJs') %>
            <!-- Datatables js -->
            <script src="assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
            <script src="assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
            <script src="assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
            <script src="assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
            <script src="assets/vendor/datatables.net-fixedcolumns-bs5/js/fixedColumns.bootstrap5.min.js"></script>
            <script src="assets/vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
            <script src="assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
            <script src="assets/vendor/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
            <script src="assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
            <script src="assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
            <script src="assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
            <script src="assets/vendor/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
            <script src="assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
            <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.pdfmin.js"></script>
            <script src="assets/vendor/select2/js/select2.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <!-- Datatable Demo Aapp js -->
            <!-- <script src="assets/js/pages/demo.datatable-init.js"></script> -->

            <script>

                function fetchData(apiUrl, dropdownId, nameField, param = null) {
                    fetch(apiUrl)
                        .then(response => response.json())
                        .then(data => {
                            console.log("API Response:", data);

                            let dropdown = document.getElementById(dropdownId);
                            dropdown.innerHTML = '<option value="">Select</option>';

                            // ✅ Check if API returned success status and data is an array
                            if (data.status === "success" && Array.isArray(data.data)) {
                                data.data.forEach(item => {
                                    let option = document.createElement("option");
                                    if (param == "1") {
                                        console.log("plastic_type_id", data)
                                        option.value = item.card_type_id;
                                    }
                                    else if (param == "2") {
                                        option.value = item.plastic_type_id;

                                    } else {
                                        option.value = item.id;

                                    }
                                    option.textContent = item[nameField];
                                    dropdown.appendChild(option);
                                });
                            } else {
                                console.error("Error: API did not return a valid data array", data);
                            }
                        })
                        .catch(error => console.error("Error fetching data:", error));
                }

                document.addEventListener("DOMContentLoaded", function () {

                fetchData("https://hungry-chaum.92-205-119-218.plesk.page/company_information/all_comp.php", "comp_types_id", "company_name");

                fetchData("https://hungry-chaum.92-205-119-218.plesk.page/batch_management/all_batch.php", "selec_category", "category");
                });


                $(document).ready(function () {

                    // Initialize select2 for dropdown
                    $('.select3').select2({
                        width: '100%',
                        dropdownParent: $('#offcanvasRight')
                    });

                    // Initialize DataTable
                    var table = $("#users_table").DataTable({
                        lengthChange: false,
                        buttons: ["copy", "print", "excel", "csv", "pdf"],
                        language: {
                            paginate: {
                                previous: "<i class='ri-arrow-left-s-line'>",
                                next: "<i class='ri-arrow-right-s-line'>"
                            }
                        },
                        drawCallback: function () {
                            $(".dataTables_paginate > .pagination").addClass("pagination-rounded");
                        }
                    });

                    table.buttons().container().appendTo("#users_table_wrapper .col-md-6:eq(0)");

                    // Initialize DataTable
                    var table = $('#users_table').DataTable();

                    // Fetch users data from API
                    function fetchtable() {
                        $.ajax({
                            url: "https://hungry-chaum.92-205-119-218.plesk.page/limit_topup/all_records.php",
                            method: "GET",
                            dataType: "json",
                            success: function (response) {
                                console.log(response); // Log response for debugging

                                if (!response.data || response.data.length === 0) {
                                    console.error("No records found!");
                                    return;
                                }

                                table.clear().draw(); // Clear existing rows

                                response.data.forEach((data) => {
                                    table.row.add([
                                        data.id,
                                        data.instrument_type,
                                        data.bank_name,
                                        data.instrument_ref_no,
                                        data.tot_up_amm,
                                        data.selec_category,
                                        data.comp_types_id,
                                        data.card_types_id,
                                        data.topup_amm,
                                        `<button type="button" onclick="deleteData(${data.id})" class="btn btn-soft-danger"><i class="bx bx-trash-alt font-size-16 align-middle"></i></button>`,
                                        // `<button type="button" onclick="editData(${data.id})" class="btn btn-soft-warning"><i class="bx bx-edit-alt font-size-16 align-middle"></i></button>`
                                    ]).draw(false);
                                });
                            },
                            error: function (xhr, status, error) {
                                console.error("Error fetching data:", error);
                            }
                        });
                    }

                    fetchtable(); // Load table data on page load

                    // Define create function globally
                    window.create = function () {
                        var form = new FormData();
                        form.append("instrument_type", $("#instrument_type").val());
                        form.append("bank_name", $("#bank_name").val());
                        form.append("instrument_ref_no", $("#instrument_ref_no").val());
                        form.append("tot_up_amm", $("#tot_up_amm").val());
                        form.append("selec_category", $("#selec_category").val());
                        form.append("comp_types_id", $("#comp_types_id").val());
                        form.append("card_types_id", $("#card_types_id").val());
                        form.append("topup_amm", $("#topup_amm").val());

                        $.ajax({
                            url: "https://hungry-chaum.92-205-119-218.plesk.page/limit_topup/limit_topup_maker.php",
                            method: "POST",
                            processData: false,
                            contentType: false,
                            data: form,
                            success: function (response, textStatus, xhr) {
                                if (xhr.status === 201) {
                                    showPopup("Success!", "Data created successfully.", "success");
                                    fetchtable(); // Refresh table

                                    // Close offcanvas
                                    var offcanvas = new bootstrap.Offcanvas(document.getElementById('offcanvasRight'));
                                    offcanvas.hide();
                                    fetchtable();
                                } else {
                                    showPopup("Error!", "There was an error creating the record.", "error");
                                }
                            },
                            error: function (xhr) {
                                let message = "An error occurred, please try again!";
                                if (xhr.status === 409) message = "Error: Conflict detected!";
                                if (xhr.status === 404) message = "Error: Resource not found!";
                                showPopup("Error!", message, "error");
                            }
                        });
                    };

                    function showPopup(title, message, icon) {
                        Swal.fire({
                            title: title,
                            text: message,
                            icon: icon,
                            confirmButtonText: "OK"
                        });
                    }

                    // Function to delete user
                    window.deleteData = function (userId) {
                        $.ajax({
                            url: "https://hungry-chaum.92-205-119-218.plesk.page/limit_topup/dlte_top.php",
                            method: "POST",
                            timeout: 0,
                            data: { id: userId },
                            dataType: "json",
                        })
                            .done(function (response) {
                                console.log(response);
                                if (response && response.status === "success") {
                                    showPopup("Success!", "Data deleted successfully.", "success");
                                    fetchtable();
                                } else {
                                    showPopup("Error!", response.message || "There was an error deleting the data.", "error");
                                }
                            })
                            .fail(function (xhr) {
                                console.log("Error: ", xhr.responseText);
                                showPopup("Error!", "An error occurred. Please try again.", "error");
                            });
                    };

                });
            </script>