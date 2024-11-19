<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include('db.php');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
$result = $con->query("SELECT MAX(CAST(SUBSTRING(`quotation No`, 3) AS UNSIGNED)) AS maxQuotationNo FROM `admin`");
$row = $result->fetch_assoc();

if ($row['maxQuotationNo'] !== null) {
    $lastQuotationNo = intval($row['maxQuotationNo']);
   $quotationNo = $lastQuotationNo + 1; 
} else {
    $quotationNo = 1;  
}

$quotationNoFormatted = 'IA' . str_pad($quotationNo, 3, '0', STR_PAD_LEFT);

$con->close();
?>



<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg"
    data-sidebar-image="none">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add quotation </title>

    <link rel="shortcut icon" href="assets/img/bd-logo.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">


    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/plugins/feather/feather.css">

    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

    <link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .select2-results {
            max-height: 200px;

            overflow-y: auto;

        }
    </style>
</head>

<body>

    <div class="main-wrapper">

        <div class="header header-one">

            <div class="main-logo d-inline float-start d-lg-flex align-items-center d-none d-sm-none d-md-none">
                <div class="logo-white">
                    <a href="add-quotations.php">
                        <img src="assets/img/bd-logo.png" class="img-fluid logo-blue" alt="Logo">
                    </a>
                    <a href="add-quotations.php">
                        <img src="assets/img/bd-logo.png" class="img-fluid logo-small" alt="Logo">
                    </a>
                </div>
                <div class="logo-color">
                    <a href="add-quotations.php">
                        <img src="assets/img/bd-logo.png" class="img-fluid logo-blue " alt="Logo" width="100px">
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
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <nav class="greedys sidebar-horizantal">
                        <ul class="list-inline-item list-unstyled links">
                            <li><a href="inventory.html"><i class="fe fe-user"></i> <span>Inventory</span></a></li>
                            <li class="submenu">
                                <a href="#"><i class="fe fe-file-plus"></i><span>Signature</span> <span
                                        class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="signature-list.html"><i class="fe fe-clipboard"></i> <span>List of
                                                Signature</span></a></li>
                                    <li><a href="signature-invoice.html"><i class="fe fe-box"></i> <span>Signature
                                                Invoice</span></a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <ul class="sidebar-vertical">
                        <li class="menu-title"><span>Main</span></li>
                        <li class="submenu">
                            <a href="#"><i class="fe fe-home"></i> <span>Quotation</span> <span
                                    class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="add-quotations.php"> Add Quotation</a></li>
                                <li><a href="display.php">List of Quotation</a></li>
                                <li><a href="itemlist.php">List of All Items</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="logout.php"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="page-header">
                            <div class="content-page-header">
                                <h5>Create Quotations</h5>
                            </div>
                        </div>
                        <form id="quotationForm" method="POST" action="admin.php">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="quotation-card">
                                        <div class="form-group-item border-0 mb-0">
                                            <div class="row align-item-center">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="input-block mb-3">
                                                        <label for="date"><i class="fas fa-calendar-alt"></i>
                                                            Date:</label>
                                                        <input type="date" id="date" name="date" class="form-control"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="input-block mb-3">
                                                        <label for="quotationNo"><i class="fas fa-file-alt"></i>
                                                            Quotation No:</label>
                                                        <input type="text" id="quotationNo" name="quotationNo"
                                                            class="form-control"
                                                            value="<?php echo htmlspecialchars($quotationNoFormatted); ?>"
                                                            readonly required>
                                                    </div>

                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="input-block mb-3">
                                                        <label for="quotationTo"><i class="fas fa-user"></i> Customer
                                                            Name:</label>
                                                        <input type="text" id="quotationTo" name="quotationTo"
                                                            class="form-control" required pattern="^[A-Za-z\s]+$"
                                                            maxlength="100"
                                                            title="Please enter a valid name (letters and spaces only)."
                                                            placeholder="Enter name">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="input-block mb-3">
                                                        <label for="mobileno"><i class="fa fa-phone"
                                                                aria-hidden="true"></i> Phone No:</label>
                                                        <input type="tel" id="mobileno" name="mobileno"
                                                            class="form-control" required pattern="^\d{10}$"
                                                            maxlength="10"
                                                            title="Please enter a valid 10-digit phone number."
                                                            placeholder="Enter 10-digit phone number">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="input-block mb-3">
                                                        <label for="quotationAmount">₹ Quotation Amount:</label>
                                                        <input type="number" id="quotationAmount" name="quotationAmount"
                                                            class="form-control" oninput="calculateTotal()" required
                                                            min="0" step="0.01" placeholder="Enter quotation amount"
                                                            title="Please enter a positive number.">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group-item">
                                            <div class="card-table">
                                                <div class="card-body">
                                                    <div class="table-responsive no-pagination">
                                                        <table id="adminTable"
                                                            class="table table-center table-hover datatable">
                                                            <thead>
                                                                <tr>
                                                                    <th>S.No</th>
                                                                    <th>Item</th>
                                                                    <th>Price</th>
                                                                    <th>Qty</th>
                                                                    <th>Total</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="adminTableBody">
                                                                <tr>
                                                                    <td>
                                                                        <?= $sno = 1; ?>
                                                                    </td>
                                                                    <td>
                                                                        <select name="item1" id="itemDropdown1"
                                                                            class="form-control" required
                                                                            onchange="updatePrice(1)">
                                                                            <option value="">Select Item</option>
                                                                            <?php
                                                                            include('db.php');
                                                                            $sql = "SELECT item_name, price FROM add_item";
                                                                            $result = $con->query($sql);
                                                                            if ($result && $result->num_rows > 0) {
                                                                                while ($row = $result->fetch_assoc()) {
                                                                                    $itemName = htmlspecialchars($row['item_name'], ENT_QUOTES, 'UTF-8');
                                                                                    $itemPrice = htmlspecialchars($row['price'], ENT_QUOTES,  'UTF-8');
                                                                                    echo "<option value='{$itemName}' data-price='{$itemPrice}'>{$itemName}</option>";
                                                                                }
                                                                            } else {
                                                                                echo "<option value=''>No items available</option>";
                                                                            }
                                                                            $con->close();
                                                                            ?>
                                                                        </select>
                                                                    </td>
                                                                    <td><input type="number" name="price1" id="price1"
                                                                            class="form-control" required readonly></td>
                                                                    <td><input type="number" name="qty1"
                                                                            class="form-control"
                                                                            oninput="calculateTotal()" required min="1">
                                                                    </td>
                                                                    <td><input type="number" name="total1"
                                                                            class="form-control" required min="1"></td>
                                                                    <td><button type="button" class="btn btn-primary"
                                                                            onclick="removeRow(this)">
                                                                            <i class="fa fa-trash"
                                                                                style="border:none; background:none;"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <button type="button" class="btn btn-primary"
                                                            onclick="addNewRow()">
                                                            <i class="fas fa-plus"></i> Add New
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group-item border-0 mb-0">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="input-block mb-3">
                                                        <label for="subtotal">Subtotal:</label>
                                                        <input type="number" id="subtotal" class="form-control" readonly
                                                            value="0.00">
                                                        <input type="hidden" id="subtotalInput" name="subtotal">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="input-block mb-3">
                                                        <label for="profit">Profit:</label>
                                                        <input type="number" id="profit" class="form-control" readonly
                                                            value="0.00">
                                                        <input type="hidden" id="profitInput" name="profit">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="input-block mb-3">
                                                        <label for="loss">Loss:</label>
                                                        <input type="number" id="loss" class="form-control" readonly
                                                            value="0.00">
                                                        <input type="hidden" id="lossInput" name="loss">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="assets/js/jquery-3.7.1.min.js"></script>
        <script src="assets/plugins/select2/js/select2.min.js"></script>
        <script>
            let sno = 1;

            $(document).ready(function () {
                initializeSelect2();
                calculateTotal();
            });

            function initializeSelect2() {
                $('#adminTable select').select2({
                    placeholder: "Select Item",
                    allowClear: true,
                    tags: true,
                    width: '50%',
                    matcher: function (params, data) {
                        if ($.trim(params.term) === '') {
                            return data;
                        }
                        if (data.text.toLowerCase().startsWith(params.term.toLowerCase())) {
                            return data;
                        }
                        return null;
                    }
                });
            }

            function updatePrice(rowNumber) {
                const itemDropdown = document.getElementById('itemDropdown' + rowNumber);
                const selectedOption = itemDropdown.options[itemDropdown.selectedIndex];
                const price = selectedOption.getAttribute('data-price') || '0';
                document.getElementById('price' + rowNumber).value = price;
                calculateTotal();
            }

            function trackManualTotal(input) {
                input.dataset.manual = 'true';
                calculateTotal();
            }

            function calculateTotal() {
                let subtotal = 0;
                const rows = document.querySelectorAll("#adminTable tbody tr");

                rows.forEach((row) => {
                    const priceInput = row.querySelector('input[name^="price"]');
                    const qtyInput = row.querySelector('input[name^="qty"]');
                    const totalInput = row.querySelector('input[name^="total"]');

                    let price = parseFloat(priceInput.value) || 0;
                    let qty = parseFloat(qtyInput.value) || 0;
                    let calculatedTotal = price * qty;

                    if (totalInput.dataset.manual !== 'true') {
                        totalInput.value = calculatedTotal > 0 ? calculatedTotal.toFixed(2) : "";
                    }

                    subtotal += parseFloat(totalInput.value) || 0;
                });

                updateSubtotalDisplay(subtotal);
                updateProfitAndLoss(subtotal);
            }

            function updateSubtotalDisplay(subtotal) {
                document.getElementById('subtotal').value = subtotal > 0 ? subtotal.toFixed(2) : "";
                document.getElementById('subtotalInput').value = subtotal > 0 ? subtotal.toFixed(2) : "";
            }

            function updateProfitAndLoss(subtotal) {
                let quotationAmount = parseFloat(document.getElementById('quotationAmount').value) || 0;
                let profit = (subtotal < quotationAmount) ? quotationAmount - subtotal : 0;
                let loss = (subtotal > quotationAmount) ? subtotal - quotationAmount : 0;

                document.getElementById('profit').value = profit > 0 ? profit.toFixed(2) : "";
                document.getElementById('profitInput').value = profit > 0 ? profit.toFixed(2) : "";

                document.getElementById('loss').value = loss > 0 ? loss.toFixed(2) : "";
                document.getElementById('lossInput').value = loss > 0 ? loss.toFixed(2) : "";
            }

            document.getElementById('quotationAmount').addEventListener('input', function () {
                let subtotal = parseFloat(document.getElementById('subtotalInput').value) || 0;
                updateProfitAndLoss(subtotal);
            });

            function addNewRow() {
                const tableBody = document.getElementById("adminTableBody");
                sno++;

                const newRow = document.createElement('tr');
                newRow.innerHTML = `
        <td>${sno}</td>
        <td>
            <select name="item${sno}" id="itemDropdown${sno}" class="form-control" required onchange="updatePrice(${sno})">
                <option value="">Select Item</option>
                <?php
                include('db.php');
                $sql = "SELECT item_name, price FROM add_item";
                $result = $con->query($sql);
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $itemName = htmlspecialchars($row['item_name'], ENT_QUOTES, 'UTF-8');
                        $itemPrice = htmlspecialchars($row['price'], ENT_QUOTES, 'UTF-8');
                        echo "<option value='{$itemName}' data-price='{$itemPrice}'>{$itemName}</option>";
                    }
                } else {
                    echo "<option value=''>No items available</option>";
                }
                ?>
            </select>
        </td>
        <td><input type="number" name="price${sno}" id="price${sno}" class="form-control  " readonly></td> 
        <td><input type="number" name="qty${sno}" class="form-control" oninput="calculateTotal()" required min="1"></td>
        <td><input type="number" name="total${sno}" class="form-control" required oninput="trackManualTotal(this);" required min="1"></td>
        <td><button type="button" class="btn btn-primary" onclick="removeRow(this)"><i class="fa fa-trash" style="border:none; background:none;"></i> </button></td>
       
    `;

                tableBody.appendChild(newRow);
                initializeSelect2();
                updateSerialNumbers();
            }

            function updateSerialNumbers() {
                const rows = document.querySelectorAll("#adminTable tbody tr");
                rows.forEach((row, index) => {
                    row.cells[0].innerHTML = index + 1;
                });
            }

            function removeRow(button) {
                const row = button.closest('tr');
                row.parentNode.removeChild(row);
                updateSerialNumbers();
                calculateTotal();
            }

        </script>
       
        <script src="assets/plugins/datatables/datatables.min.js"
            type="da4f9371b8a44478d6db867d-text/javascript"></script>
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"
            type="da4f9371b8a44478d6db867d-text/javascript"></script>
        <script src="assets/js/script.js" type="da4f9371b8a44478d6db867d-text/javascript"></script>
        <script src="./cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"
            data-cf-settings="da4f9371b8a44478d6db867d-|49" defer></script>
</body>

</html>