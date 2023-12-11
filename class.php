<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Class-information</title>
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
        <a class="nav-link active" aria-current="page" href="parent.php">Parents</a>
        <a class="nav-link" href="pupils.php">Pupils</a>
        <a class="nav-link" href="teacher.php">Teacher</a>
        <a class="nav-link" href="subject.php">Subject</a>
        <a class="nav-link" href="Attendance.php">Attendance</a>
        <a class="nav-link" href="class.php">Class</a>
      </div>
    </div>
  </div>
</nav>
<h2>Class</h2>
<br>
<div class="container">
    <a class="btn btn-primary" href="add_class.php" role="button">Add Classes</a>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>Class_ID</th>
                <th>Year</th>
                <th>Classroom</th>
                <th>Capacity</th>
                <th>Subject_ID</th>
                <th>Attendance_ID</th>
                <th>Pupils_ID</th>
                <th>Teacher_ID</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "st_alophonsus_primary_school";

            //create connection to database
            $connection = new mysqli($servername, $username, $password, $database);

            //check connection
            if($connection->connect_error) {
                die("connection failed: " . $connection->connect_error);
            }

            //read all rows from database table
            $sql = "SELECT * FROM class";
            $result =$connection->query($sql);

            if(!$result) {
                die("Invalid query: " .$connection->error);
            }

            //read every data of each row from database
            while($row =$result->fetch_assoc()) {
                echo "
                <tr>
                <td>$row[Class_ID]</td>
                <td>$row[Year]</td>
                <td>$row[Classroom]</td>
                <td>$row[Capacity]</td>
                <td>$row[Subject_ID]</td>
                <td>$row[Attendance_ID]</td>
                <td>$row[Pupils_ID]</td>
                <td>$row[Teacher_ID]</td>
                <td>
                <a class= 'btn btn-primary btn-sm' href = 'update_class.php?id=$row[Class_ID]'>Update</a>
                <a class= 'btn btn-warning btn-sm' href = 'delete_class.php?id=$row[Class_ID]'>Delete</a>
                </td>
                ";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>