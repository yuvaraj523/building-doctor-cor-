<?php
include('db.php');


if (isset($_POST['delete_selected']) && isset($_POST['selected_records'])) {
    $selected_ids = $_POST['selected_records']; 
    
 
    foreach ($selected_ids as $id) {
       
        $id = intval($id);

        
        $sqlDeleteAdmin2 = "DELETE FROM admin2 WHERE quotation_id = $id";
        $sqlDeleteAdmin = "DELETE FROM admin WHERE id = $id";

   
        $con->query($sqlDeleteadmin2);
        $con->query($sqlDeleteadmin);
    }


    header("Location: display.php?delete_success=true");
    exit();
}

$con->close();
?>
