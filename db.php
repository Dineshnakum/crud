<?php

class connect{
    public $conn;

    public function __construct(){
        $this->conn = new mysqli("localhost","root","","crud");
        if($this->conn->connect_error){
            echo"not connected".$this->conn->connect_error;
        }

    }

    public function read(){
        $sql = "SELECT * FROM crudop";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $data = $result->fetch_all();
            return $data;
        } else {
            return [];
        }
    }

    public function insert($name, $email) {
        $name = $this->conn->real_escape_string($name);
        $email = $this->conn->real_escape_string($email);

        $sql = "INSERT INTO crudop (name, email) VALUES ('$name', '$email')";
        $result = $this->conn->query($sql);

        if ($result) {
            return true; // Insert successful
        } else {
            die("Error in insertion: " . $this->conn->error);
        }
    }

    public function delete($id) {
        $id = $this->conn->real_escape_string($id);

        $sql = "DELETE FROM crudop WHERE id = '$id'";
        $result = $this->conn->query($sql);

        if ($result) {
            return true; // Delete successful
        } else {
            die("Error in deletion: " . $this->conn->error);
        }
    }


    public function update($id, $name, $email) {
        $id = $this->conn->real_escape_string($id);
        $name = $this->conn->real_escape_string($name);
        $email = $this->conn->real_escape_string($email);

        $sql = "UPDATE crudop SET name = '$name', email = '$email' WHERE id = $id";
        $result = $this->conn->query($sql);

        if ($result) {
            return true; // Update successful
        } else {
            die("Error in update: " . $this->conn->error);
        }
    }
}

$co = new connect();

?>