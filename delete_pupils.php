




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>del pupils</title>
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
</div>

<form method="post" action="delete_pupils.php">
    <label for="studentID">Enter pupil ID: </label>
    <input type="text" name="pid">
    <input type="submit" name="submit" value="delete">


</form>

    
<?php
$connection = mysqli_connect("localhost", "root", "", "st_alophonsus_primary_school");
//check connection
if($connection === false) {
    die("connection failed: ");
}
if (isset($_POST['submit'])) {

    $pid=$_POST['pid'];
    //sql to delete a record
    $sql = "DELETE FROM pupils WHERE Pupils_ID=$pid";

    if ($connection->query($sql) === TRUE) {
        echo "Pupils record delete successful<br>";
    }else {
        echo "Errors on deleting: " . $connection->error;
    }
    $connection->close();

    echo "delete operation";
}
?>
</body>
</html>