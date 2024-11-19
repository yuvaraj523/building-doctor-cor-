<?php
include('db.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
   
    $item_name = $con->real_escape_string($_POST['item_name']);
    $price = $con->real_escape_string($_POST['price']);


    $sql = "INSERT INTO add_item (item_name, price) VALUES ('$item_name', '$price')";

    
    if ($con->query($sql) === TRUE) {
     
        header("Location: itemlist.php");
        exit(); 
    } else {
       
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}


$con->close();
?>