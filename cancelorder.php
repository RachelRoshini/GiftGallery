<?php
require("connection.php");

// Sanitize and validate the Id from the request
$Id = isset($_REQUEST["del"]) ? (int)$_REQUEST["del"] : 0;  // Ensure it's an integer

if($Id > 0) {
    // Fetch the row before deletion (your original method)
    $res = $con->query("SELECT * FROM user_product WHERE Id = $Id");
    $count = $res->num_rows;
    
    // Check if the row exists
    if($count > 0) {
        // Proceed with the delete query using prepared statements
        $stmt = $con->prepare("DELETE FROM user_product WHERE Id = ?");
        $stmt->bind_param("i", $Id);  // "i" denotes an integer type

        // Execute the delete query
        $stmt->execute();

        // Check if any rows were affected
        if($stmt->affected_rows > 0) {
            header("location: myorder.php");
            exit();  // Stop further execution after redirect
        } else {
            echo 'Order not cancelled.';
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        echo 'Order not found.';
    }
} else {
    echo 'Invalid request.';
}

// Close the database connection
$con->close();
?>
