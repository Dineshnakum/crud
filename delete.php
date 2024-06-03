<?php
require_once("db.php");

$connection = new connect();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["id"])) {
        $id_to_delete = $_POST["id"];
        $success = $connection->delete($id_to_delete);

        if ($success) {
            echo "Data deleted successfully!";
        }
    }
}

?>