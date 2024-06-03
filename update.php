<?php
require_once("db.php");

$connection = new connect();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $update_id = $_POST["up_id"];
    $new_name = $_POST["up_name"];
    $new_email = $_POST["up_email"];

    // Validate and sanitize user input as needed

    $success = $connection->update($update_id, $new_name, $new_email);

    if ($success) {
        echo "Data updated successfully!";
    }
}

$data = $connection->read();

?>