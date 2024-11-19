<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $date = isset($_POST['date']) ? $_POST['date'] : '';
    $quotationNo = isset($_POST['quotationNo']) ? $_POST['quotationNo'] : '';
    $quotationTo = isset($_POST['quotationTo']) ? $_POST['quotationTo'] : '';
    $mobileno = isset($_POST['mobileno']) ? $_POST['mobileno'] : '';
    $quotationAmount = isset($_POST['quotationAmount']) ? $_POST['quotationAmount'] : '';
    $subtotal = isset($_POST['subtotal']) ? $_POST['subtotal'] : '';
    $profit = isset($_POST['profit']) ? $_POST['profit'] : '';
    $loss = isset($_POST['loss']) ? $_POST['loss'] : '';


    $sql = "INSERT INTO admin (date, `quotation No`,`quotation To`,`mobileno`, `quotation Amount`, subtotal, profit, loss)
            VALUES ('$date', '$quotationNo', '$quotationTo','$mobileno', '$quotationAmount', '$subtotal', '$profit', '$loss')";

    if ($con->query($sql) === TRUE) {
        $last_id = $con->insert_id; 

        $rows = 0;
        $max_items = 1000; 

        while ($rows < $max_items) {
            $item = isset($_POST["item" . ($rows + 1)]) ? $_POST["item" . ($rows + 1)] : '';
            $price = isset($_POST["price" . ($rows + 1)]) ? $_POST["price" . ($rows + 1)] : 0; 
            $qty = isset($_POST["qty" . ($rows + 1)]) ? $_POST["qty" . ($rows + 1)] : 0; 
            $total = isset($_POST["total" . ($rows + 1)]) ? $_POST["total" . ($rows + 1)] : 0; 


            if (empty($item)) {
                $rows++; 
                continue; 
            }

            $sql2 = "INSERT INTO admin2 (quotation_id, item, price, qty, total) 
                     VALUES ('$last_id', '$item', '$price', '$qty', '$total')";

            if (!$con->query($sql2)) {
                echo "Error: " . $sql2 . "<br>" . $con->error; 
            }

            $rows++; 
        }


        
        header("Location: display.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
?>