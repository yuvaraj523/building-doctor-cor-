
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg"
    data-sidebar-image="none">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Quotaion List</title>
    
    <link rel="shortcut icon" href="assets/img/bd-logo.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="shortcut icon" href="assets/img/logo.maIn.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/plugins/feather/feather.css">

    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

    <link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <script src="assets/js/layout.js" type="3aab8abce64812a656bcb864-text/javascript"></script>


    <style>
        .round-img {
            border-radius: 50%;
            width: 80px;
            height: 80px;
            object-fit: cover;
        }
    </style>

</head>

<body>

    <div class="main-wrapper">

        <div class="header header-one">
            <a href="add-quotations.php.php"
                class="d-inline-flex d-sm-inline-flex align-items-center d-md-inline-flex d-lg-none align-items-center device-logo">
                <img src="assets/img/logo_main.png" class="img-fluid logo2" alt="Logo" width="90px">
            </a>
            <div class="main-logo d-inline float-start d-lg-flex align-items-center d-none d-sm-none d-md-none">
                <div class="logo-white">
                    <a href="add-quotations.php">
                        <img src="assets/img/logo_main.png" class="img-fluid logo-blue" alt="Logo">
                    </a>
                    <a href="dadd-quotations.php">
                        <img src="assets/img/bd-logo.png" class="img-fluid logo-small" alt="Logo">
                    </a>
                </div>
                <div class="logo-color">
                    <a href="add-quotations.php">
                        <img src="assets/img/bd-logo.png" class="img-fluid logo-blue" alt="Logo" width="90px">
                    </a>
                    <a href="add-quotations.php">
                        <img src="assets/img/bd-logo.png" class="img-fluid logo-small" alt="Logo">
                    </a>
                </div>
            </div>

            <a href="javascript:void(0);" id="toggle_btn">
                <span class="toggle-bars">
                    <span class="bar-icons"></span>
                    <span class="bar-icons"></span>
                    <span class="bar-icons"></span>
                    <span class="bar-icons"></span>
                </span>
            </a>




            <a class="mobile_btn" id="mobile_btn">
                <i class="fas fa-bars"></i>
            </a>


            <ul class="nav nav-tabs user-menu">


                <li class="nav-item  has-arrow dropdown-heads ">
                    <a href="javascript:void(0);" class="toggle-switch">
                        <i class="fe fe-moon"></i>
                    </a>
                </li>

                <li class="nav-item  has-arrow dropdown-heads ">
                    <a href="javascript:void(0);" class="win-maximize">
                        <i class="fe fe-maximize"></i>
                    </a>
                </li>


            </ul>

        </div>


        <div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul class="sidebar-vertical">

                <li class="menu-title"><span>Main</span></li>

                <ul class="sidebar-vertical">
                    <li class="submenu">
                        <a href="#"><i class="fe fe-home"></i> <span>Quotation</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="add-quotations.php">Add Quotation</a></li>
                            <li><a href="display.php">List of Quotation</a></li>
                            <li><a href="itemlist.php"> List of All Items</a></li>
                         
                        </ul>
                    </li>

                    <!-- Logout Button -->
                    <li>
                        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a>
                    </li>

                </ul>

            </ul>
        </div>
    </div>
</div>

        <div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="content-page-header">
                <h5>Quotation List</h5>
                <div class="list-btn">
                    <ul class="filter-list">
                        <li>
                            <a class="btn btn-filters w-auto popup-toggle" data-bs-toggle="tooltip"
                                data-bs-placement="bottom" title="Filter"><span class="me-2"><img
                                        src="assets/img/icons/filter-icon.svg" alt="filter"></span>Filter </a>
                        </li>
                        <li>
                            <div class="dropdown dropdown-action" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Download">
                               
                                <div class="dropdown-menu dropdown-menu-end">
                                    <ul class="d-block">
                                        <li>
                                            <a class="d-flex align-items-center download-item" href="download.php?format=pdf" download><i class="far fa-file-pdf me-2"></i>PDF</a>
                                        </li>
                                        <li>
                                            <a class="d-flex align-items-center download-item" href="download.php?format=csv" download><i class="far fa-file-text me-2"></i>CSV</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li>
                            <!-- <a class="btn-filters" href="javascript:void(0);" onclick="window.print();" data-bs-toggle="tooltip"
                                data-bs-placement="bottom" title="Print"><span><i
                                        class="fe fe-printer"></i></span> </a> -->

                        </li>
                        <li>
                       
    </li>
                        <li>
                            <a class="btn btn-primary w-auto" data-bs-toggle="modal" data-bs-target="#quotationModal">Add item</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="filter_inputs" class="card filter-card">
            <div class="card-body pb-0">
                <div class="row">
                    <div class="col-sm-6 col-md-3">
                        <div class="input-block mb-3">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="<?php echo isset($_GET['name']) ? htmlspecialchars($_GET['name']) : ''; ?>">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="input-block mb-3">
                            <label>Date</label>
                            <input type="text" class="form-control" name="date" value="<?php echo isset($_GET['date']) ? htmlspecialchars($_GET['date']) : ''; ?>">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="input-block mb-3">
                            <label>Quotation Number</label>
                            <input type="text" class="form-control" name="quotation_no" value="<?php echo isset($_GET['quotation_no']) ? htmlspecialchars($_GET['quotation_no']) : ''; ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>


<?php
include('db.php');


if (isset($_GET['delete'])) {
    $id_to_delete = $_GET['delete'];

    
    $delete_admin2_sql = "DELETE FROM admin2 WHERE quotation_id = '$id_to_delete'";
    if ($con->query($delete_admin2_sql) === TRUE) {
       
        $delete_admin_sql = "DELETE FROM admin WHERE id = '$id_to_delete'";
        if ($con->query($delete_admin_sql) === TRUE) {
            $_SESSION['delete_success'] = 'true'; 
        } else {
            $_SESSION['delete_success'] = 'false'; 
        }
    } else {
        $_SESSION['delete_success'] = 'false'; 
    }
}


$whereClauses = [];
        if (isset($_GET['name']) && $_GET['name'] !== '') {
            $name = $con->real_escape_string($_GET['name']);
            $whereClauses[] = "name LIKE '%$name%'";
        }
        if (isset($_GET['date']) && $_GET['date'] !== '') {
            $date = $con->real_escape_string($_GET['date']);
            $whereClauses[] = "date = '$date'";
        }
        if (isset($_GET['quotation_no']) && $_GET['quotation_no'] !== '') {
            $quotation_no = $con->real_escape_string($_GET['quotation_no']);
            $whereClauses[] = "quotation_no LIKE '%$quotation_no%'";
        }

        $sql = "SELECT * FROM admin" . (count($whereClauses) > 0 ? " WHERE " . implode(' AND ', $whereClauses) : '');
        $result = $con->query($sql);
        ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-table">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-center table-hover datatable" id="salesTable">
                                <thead class="thead-light">
                                    <tr>
                                       <!-- Select All checkbox -->
                                      
                                        <th>S.No</th>
                                        <th>Date</th>
                                        <th>Quote No.</th>
                                        <th>Customer Name</th>
                                        <!-- <th>Phone No</th> -->
                                        <th>Quote Amount</th>
                                        <th>Total</th>
                                        <th>Profit</th>
                                        <th>Loss</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                if ($result->num_rows > 0) {
                                    $sno = 1; // For serial number
                                    while ($row = $result->fetch_assoc()) {
                                        $last_id = $row["id"];
                                        // Fetch the total for each quotation
                                        $sql2 = "SELECT SUM(total) as total_sum FROM admin2 WHERE quotation_id = '$last_id'";
                                        $result2 = $con->query($sql2);
                                        $total_sum = $result2->fetch_assoc()['total_sum'];

                                        echo "<tr>";
                                        echo "<td>" . htmlspecialchars($sno) . "</td>";
                                        echo "<td>" . date("d-m-Y", strtotime($row["date"])) . "</td>";
                                        echo "<td>" . htmlspecialchars($row["quotation No"]) . "</td>";
                                        echo "<td>" . htmlspecialchars($row["quotation To"]) . "</td>";
                                       
                                        echo "<td>" . htmlspecialchars($row["quotation Amount"]) . "</td>";
                                        echo "<td>" . htmlspecialchars($row["subtotal"]) . "</td>";
                                        echo "<td>" . htmlspecialchars($row["profit"]) . "</td>";
                                        echo "<td>" . htmlspecialchars($row["loss"]) . "</td>";
                                    
                                        echo "<td>
                                                <a href='edit.php?id=" . urlencode($last_id) . "' class='btn btn-primary btn-sm'>
                                                    <i class='fas fa-edit' style='color:gold;'></i>
                                                </a>
                                                <a href='print.php?id=".urlencode($last_id)."' class='btn btn-primary btn-sm' id='printButton'>
                                                    <i class='fas fa-print' style='color:gold;'></i>
                                                </a>
                                                <a href='#' onclick='confirmDelete($last_id)' class='btn btn-primary btn-sm'>
                                                    <i class='fas fa-trash' style='color:gold;'></i>
                                                </a>
                                            </td>";
                                        echo "</tr>";
                                        $sno++; // Increment serial number for the next row
                                    }
                                } else {
                                    echo "<tr><td colspan='8'>No records found.</td></tr>";
                                }
                                ?>
                                </tbody>
                            </table>

                          
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




        <div class="modal fade" id="quotationModal" tabindex="-1" aria-labelledby="quotationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"> 
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="quotationModalLabel">Add Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="addsubmit.php" method="post">
                    <div class="mb-3">
                        <label for="item_name" class="form-label">Item Name:</label> <!-- Added Bootstrap form-label class -->
                        <input type="text" id="item_name" name="item_name" class="form-control" required> <!-- Added Bootstrap form-control class -->
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price:</label> <!-- Added Bootstrap form-label class -->
                        <input type="number" id="price" name="price" class="form-control" required step="0.01"min ="1"> <!-- Added Bootstrap form-control class -->
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

 <?php
        $con->close();
        ?>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

        <div class="toggle-sidebar">
            <div class="sidebar-layout-filter">
                <div class="sidebar-header">
                    <h5>Filter</h5>
                    <a href="#" class="sidebar-closes"><i class="fa-regular fa-circle-xmark"></i></a>
                </div>
                <div class="sidebar-body">
                    <form method="GET" action="">
                        <div class="accordion" id="accordionMain1">
                            <div class="card-header-new" id="headingOne">
                                <h6 class="filter-title">
                                    <a href="javascript:void(0);" class="w-100" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true"
                                        aria-controls="collapseOne">
                                        Filter Your Quotation
                                        <span class="float-end"><i class="fa-solid fa-chevron-down"></i></span>
                                    </a>
                                </h6>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample1">
                                <div class="card-body-chat">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="checkBoxes1">
                                                <div class="form-custom">
                                                    <input type="text"
                                                        class="form-control member-search-dropdown"
                                                        id="member_search1" name="search"
                                                        placeholder="Filter Here">
                                                    <span><img src="assets/img/icons/search.svg"
                                                            alt="img"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="filter-buttons">
                       <!--     <button type="submit" class="d-inline-flex align-items-center justify-content-center btn w-100 btn-primary">Apply Filter</button>-->
                            <button type="button" onclick="resetAndRedirect()"
                                class="d-inline-flex align-items-center justify-content-center btn w-100 btn-secondary">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


                <script>
                    document.getElementById('member_search1').addEventListener('input', function () {
                        var input = this.value.toUpperCase();
                        var table = document.getElementById('salesTable');
                        var tr = table.getElementsByTagName('tr');

                        for (var i = 1; i < tr.length; i++) { // Start from 1 to skip header row
                            tr[i].style.display = 'none'; // Hide all rows initially
                            var td = tr[i].getElementsByTagName('td');
                            var rowContainsInput = false; // Track if row matches input

                            for (var j = 0; j < td.length; j++) {
                                if (td[j]) {
                                    var txtValue = td[j].textContent || td[j].innerText;
                                    if (txtValue.toUpperCase().indexOf(input) > -1) {
                                        rowContainsInput = true;
                                        break; // Match found, no need to check further cells in this row
                                    }
                                }
                            }

                            if (rowContainsInput) {
                                tr[i].style.display = ''; 
                            }
                        }
                    });

                    function resetAndRedirect() {
                        document.getElementById('member_search1').value = ''; 
                        var table = document.getElementById('salesTable');
                        var tr = table.getElementsByTagName('tr');

                        for (var i = 1; i < tr.length; i++) {
                            tr[i].style.display = ''; 
                        }
                    }
                </script>
                <script>
                    document.getElementById('member_search1').addEventListener('input', function () {
                        var input = this.value.toUpperCase();
                        var table = document.getElementById('salesTable');
                        var tr = table.getElementsByTagName('tr');

                        for (var i = 1; i < tr.length; i++) { // Start from 1 to skip header row
                            tr[i].style.display = 'none'; // Hide all rows initially
                            var td = tr[i].getElementsByTagName('td');
                            var rowContainsInput = false; // Track if row matches input

                            for (var j = 0; j < td.length; j++) {
                                if (td[j]) {
                                    var txtValue = td[j].textContent || td[j].innerText;
                                    if (txtValue.toUpperCase().indexOf(input) > -1) {
                                        rowContainsInput = true;
                                        break; // Match found, no need to check further cells in this row
                                    }
                                }
                            }

                            if (rowContainsInput) {
                                tr[i].style.display = ''; 
                            }
                        }
                    });

                    function resetAndRedirect() {
                        document.getElementById('member_search1').value = ''; 
                        var table = document.getElementById('salesTable');
                        var tr = table.getElementsByTagName('tr');

                        for (var i = 1; i < tr.length; i++) {
                            tr[i].style.display = ''; 
                        }
                    }
                </script>



         <script src="assets/plugins/datatables/datatables.min.js"
            type="da4f9371b8a44478d6db867d-text/javascript"></script>
         <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"
            type="da4f9371b8a44478d6db867d-text/javascript"></script>
        <script src="assets/js/script.js" type="da4f9371b8a44478d6db867d-text/javascript"></script>
        <script src="./cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"
            data-cf-settings="da4f9371b8a44478d6db867d-|49" defer></script>
       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"> </script>
        <script>
        // Function to confirm delete action
        function confirmDelete(id) {
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                // If confirmed, redirect to the delete action
                window.location.href = "?delete=" + encodeURIComponent(id);
            }
            });
        }
        </script>
        <script>
        <?php if (isset($_GET['message']) && $_GET['message'] == 'update_success') : ?>
            Swal.fire({
            title: 'Success!',
            text: 'Record updated successfully.',
            icon: 'success',
            confirmButtonColor: '#3085d6',
            timer: 5000,
            confirmButtonText: 'OK'
            }).then(() => {
            // Remove 'message' parameter from the URL after showing the alert
            window.history.replaceState(null, null, window.location.pathname);
            });
        <?php endif; ?>
        </script>

        <script>
        <?php if (isset($_SESSION['delete_success'])) : ?>
            <?php if ($_SESSION['delete_success'] == 'true') : ?>
            // Show success SweetAlert
            Swal.fire({
                title: 'Deleted!',
                text: 'The record has been deleted successfully.',
                icon: 'success',
                confirmButtonColor: '#3085d6',
                timer: 5000,
                confirmButtonText: 'OK'
            }).then(() => {
            // Remove 'message' parameter from the URL after showing the alert
            window.history.replaceState(null, null, window.location.pathname);
            });
            <?php elseif ($_SESSION['delete_success'] == 'false') : ?>
            // Show error SweetAlert
            Swal.fire({
                title: 'Error!',
                text: 'Failed to delete the record.',
                icon: 'error',
                confirmButtonColor: '#d33',
                confirmButtonText: 'OK'

            });
            <?php endif; ?>

            // Clear the session flag after showing the alert
            <?php unset($_SESSION['delete_success']); ?>
        <?php endif; ?>
        </script>


</body>
</html>
         <!-- Button to delete selected records -->
                           <!--   <button type="submit" name="delete_selected"class="btn btn-primary w-auto" id="delete_button" style="display:none;">
                              <i class='fas fa-trash'></i>
                            </button>-->
                            <!--<script>
    // Function to toggle the visibility of the "Delete Selected" button
    function toggleDeleteButton() {
        const checkboxes = document.querySelectorAll('.select-checkbox');
        const deleteButton = document.getElementById('delete_button');
        
        // Check if any checkbox is selected
        let isAnySelected = false;
        checkboxes.forEach(function(checkbox) {
            if (checkbox.checked) {
                isAnySelected = true;
            }
        });

        // Show the button if any checkbox is checked, otherwise hide it
        if (isAnySelected) {
            deleteButton.style.display = 'inline-block';
        } else {
            deleteButton.style.display = 'none';
        }
    }

    // Function to select or deselect all checkboxes
    document.getElementById('select_all').addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('.select-checkbox');
        checkboxes.forEach(function(checkbox) {
            checkbox.checked = document.getElementById('select_all').checked;
        });
        toggleDeleteButton();  // Call to toggle the delete button visibility
    });

    // Initialize delete button visibility
    toggleDeleteButton();
</script>

<script>
                    // Select/Deselect all checkboxes
                    document.getElementById('select_all').addEventListener('change', function () {
                        const checkboxes = document.querySelectorAll('input[name="selected_records[]"]');
                        checkboxes.forEach(checkbox => {
                            checkbox.checked = this.checked;
                        });
                    });

                    // Handle delete button click
                    document.getElementById('delete_button').addEventListener('click', function () {
                        const selectedItems = document.querySelectorAll('input[name="selected_records[]"]:checked');

                        if (selectedItems.length === 0) {
                            Swal.fire({
                                icon: 'warning',
                                title: 'No items selected',
                                text: 'Please select at least one item to delete.',
                                confirmButtonText: 'OK'
                            });
                            return;
                        }

                        Swal.fire({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, delete them!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Submit the form to delete selected items
                                document.getElementById('select DeleteForm').submit();
                            }
                        });
                    });
                      <th><input type="checkbox" id="select_all" class="select-all-checkbox"> </th>
                </script> -->   <!-- <form method="POST" action="select_delete.php">-->
               <!-- echo "<td><input type='checkbox' name='selected_records[]' value='" . htmlspecialchars($last_id) . "' class='select-checkbox' onclick='toggleDeleteButton()'></td>"; // Checkbox for each row-->