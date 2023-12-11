<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Parent-information</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.html">St-Alophonsus-primary-school</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="pupils.php">Pupils</a>
        <a class="nav-link" href="teacher.php">Teacher</a>
        <a class="nav-link" href="subject.php">Subject</a>
        <a class="nav-link" href="Attendance.php">Attendance</a>
        <a class="nav-link" href="class.php">Class</a>
      </div>
    </div>
  </div>
</nav>
<h2>Parents</h2>
<br>
<div class="container">
    <a class="btn btn-danger" href="/website/add_parent.php" role="button">Add new parent</a>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>Parent_ID</th>
                <th>First_Name</th>
                <th>Last_Name</th>
                <th>Address</th>
                <th>Phone_Number</th>
                <th>Email_Address</th>
                <th>Gender</th>
                <th>Nationality</th>
                <th>Date_Of_Birth</th>
                <th>Pupils_ID</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "st_alophonsus_primary_school";

            //create connection to the database
            $connection = new mysqli($servername, $username, $password, $database);

            //check connection
            if($connection->connect_error) {
                die("connection failed: " . $connection->connect_error);
            }

            //read all rows from database table
            $sql = "SELECT * FROM parent";
            $result =$connection->query($sql);

            if(!$result) {
                die("Invalid query: " .$connection->error);
            }

            //read data from each row from database
            while($row =$result->fetch_assoc()) {
                echo "
                <tr>
                <td>$row[Parent_ID]</td>
                <td>$row[First_Name]</td>
                <td>$row[Last_Name]</td>
                <td>$row[Address]</td>
                <td>$row[Phone_Number]</td>
                <td>$row[Email_Address]</td>
                <td>$row[Gender]</td>
                <td>$row[Nationality]</td>
                <td>$row[Date_Of_Birth]</td>
                <td>$row[Pupils_ID]</td>
                <td>
                 <a class= 'btn btn-primary btn-sm' href = 'update_parent.php?id=$row[Parent_ID]'>Update</a>
                 <a class= 'btn btn-warning btn-sm' href = 'delete_parent.php?id=$row[Parent_ID]'>Delete</a>
                 </td>
                 ";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>