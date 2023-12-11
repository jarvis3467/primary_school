<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Update_class</title>
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
<h2>Update class</h2>
<form method="post" action="update_class.php">

    <label for="Class_ID">Enter Class ID:</label>
    <input type="text" name="cid">
    <label for="Year">Enter Year:</label>
    <input type="text" name="yr">
    <label for="Classroom">Enter Classroom number:</label>
    <input type="text" name="cno">
    <label for="Capacity">Enter Classroom capacity:</label>
    <input type="text" name="c">

    <input type="submit" name="submit" value="update">
</form>


<?php
$connection = mysqli_connect("localhost", "root", "", "st_alophonsus_primary_school");
//check the connection
if($connection === false) {
    die("connection failed: ");
}
if(isset($_POST['submit'])) {

    $cid = $_POST['cid'];//Class_ID variable is stored in $cid
    $yr = $_POST['yr'];//Year is stored in variable $yr
    $cno = $_POST['cno'];//Classroom number is stored in variable $cno
    $c = $_POST['c'];//capacity of classroom is stored in the variable $c
    
    //command sql to update a record
    $sql = "UPDATE class SET Year='$yr', Classroom='$cno', Capacity=$c WHERE Class_ID=$cid";
      
      if($connection->query($sql) === TRUE) {
        echo "Classes update successful<br>";
      }else{
        echo "Errors on update class record: " . $connection->error;
      }
      $connection->close();
      echo "Update operation success";     
}
?>
</body>
</html>