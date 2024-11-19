<?php
include('db.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['selected_items'])) {
  
    $selected_items = $_POST['selected_items'];

    
    $ids = implode(',', array_map('intval', $selected_items)); 
    $delete_sql = "DELETE FROM add_item WHERE id IN ($ids)";

    
    if ($con->query($delete_sql) === TRUE) {
     
        header("Location: itemlist.php?message=delete_success");
        exit();
    } else {
        
        echo "Error: " . htmlspecialchars($con->error);
    }
}

$con->close();
?>