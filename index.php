<?php

require_once("read.php");

?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>

<body>
  <h3>crud with OOPs</h3>
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
    Launch demo modal
  </button>

  <!--Add Modal -->
  <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="insert.php" method="POST">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Email </label>
              <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="modal-footer">
              <input type="submit" name="submit" value="Add Data" class="btn btn-primary">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($data as $row) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td class='d-flex'><button class='btn btn-warning btn-edit' data-sid=" . $row['id'] . " data-bs-toggle='modal' data-bs-target='#updateModal" . $row['id'] . "'>Edit</button>
                <button class='btn btn-warning btn-edit' data-bs-toggle='modal' data-bs-target='#deleteModal" . $row['id'] . "'>Delete</button>

            <!-- Delete Modal -->
            <div class='modal fade' id='deleteModal" . $row['id'] . "' tabindex='-1' aria-labelledby='deleteModalLabel" . $row['id'] . "' aria-hidden='true'>
                <div class='modal-dialog'>
                    <div class='modal-content'>
                      <div class='modal-header'>
                        <h5 class='modal-title' id='deleteModalLabel" . $row['id'] . "'>Confirm Deletion</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                      </div>
                      <div class='modal-body'>
                        <p>Are you sure to delete the data?</p>
                        <form action='delete.php' method='POST'>
                                <input type='hidden' name='id' value='" . $row['id'] . "'>
                                <button type='submit' class='btn btn-primary'>Delete</button>
                        </form>
                      </div>
                      <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                      </div>
                  </div>
              </div>
            </div>
            

            <!-- updateModal Modal -->
              <div class='modal fade' id='updateModal" . $row['id'] . "' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                <div class='modal-dialog'>
                  <div class='modal-content'>
                    <div class='modal-header'>
                      <h5 class='modal-title' id='exampleModalLabel'>Update Data</h5>
                      <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <div class='modal-body'>
                      <form action='update.php' method='POST'>
                        <div class='mb-3'>
                          <label for='up_name' class='form-label'>Name</label>
                          <input type='text' class='form-control' id='up_name' name='up_name' value='" . htmlspecialchars($row['name']) . "'>
                        </div>
                        <div class='mb-3'>
                          <label for='up_email' class='form-label'>Email</label>
                          <input type='email' class='form-control' id='up_email' name='up_email' value='" . htmlspecialchars($row['email']) . "'>
                        </div>
                        <!-- Hidden input for passing the row ID -->
                        <input type='hidden' name='up_id' value='" . htmlspecialchars($row['id']) . "'>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                            <input type='submit' name='submit' value='Update' class='btn btn-primary'>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </td>";
        echo "</tr>";
      }
      ?>
    </tbody>
  </table>


  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>