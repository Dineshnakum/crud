<?php

require_once("db.php");

$connection = new connect();

// Example of inserting data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];

    // Validate and sanitize user input as needed

    $success = $connection->insert($name, $email);

    if ($success) {
        echo "Data inserted successfully!";
    }
}
?>