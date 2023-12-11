<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>update_attendance</title>
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
        <a class="nav-link active" aria-current="page" href="parent.php">Pupils</a>
        <a class="nav-link" href="parent.php">Parents</a>
        <a class="nav-link" href="teacher.php">Teacher</a>
        <a class="nav-link" href="subject.php">Subject</a>
        <a class="nav-link" href="Attendance.php">Attendance</a>
        <a class="nav-link" href="class.php">Class</a>
      </div>
    </div>
  </div>
</nav>
<h2>Update attendance</h2>
<form method="post" action="update_attendance.php">

<label for="Attendance_ID">Enter Attendance ID:</label>
<input type="text" name="attendance_id">
<label for="Attend_Status">Enter Status:</label>
<input type="text" name="attend_status">
<label for="Date">Enter Date:</label>
<input type="date" name="date">
<label for="Time">Time:</label>
<input type="time" name="time">

<input type="submit" name="submit" value="update">
</form>

<?php
$connection = mysqli_connect("localhost", "root", "", "st_alophonsus_primary_school");
//check the connection
if($connection === false) {
    die("connection failed: ");
}
if(isset($_POST['submit'])) {

    $attendance_id = $_POST['attendance_id'];
    $attend_status = $_POST['attend_status'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    //command sql to update a record
    $sql = "UPDATE attendance SET Attend_Status='$attend_status', Date='$date', Time='$time' WHERE Attendance_ID=$attendance_id";

    if($connection->query($sql) === TRUE) {
        echo "Attendance update successful<br>";
    }else{
        echo "Errors on update attendance: " . $connection->error;
    }
    $connection->close();
    echo "update operation success";
}
?>
</body>
</html>