

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>update_parent</title>
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
<h2>update_parent</h2>
<form method="post" action="update_parent.php">

<label for="Parent_ID">Enter Parent ID:</label>
<input type="text" name="parent_id">
<label for="First_Name">Enter First Name:</label>
<input type="text" name="first_name">
<label for="Last_Name">Enter Last Name:</label>
<input type="text" name="last_name">
<label for="Address">Enter Address:</label>
<input type="text" name="address">
<br>
<label for="Phone_Number">Enter Phone Number:</label>
<input type="text" name="phone_number">
<label for="Email_Address">Enter Email:</label>
<input type="text" name="email">
<label for="Gender">Enter Gender:</label>
<input type="text" name="gender">
<label for="Nationality">Enter Nationality:</label>
<input type="text" name="nationality">
<label for="Date_Of_birth">Enter Date of birth:</label>
<input type="date" name="date_of_birth">

<input type="submit" name="submit" value="update">
</form>
<?php
$connection = mysqli_connect("localhost", "root", "", "st_alophonsus_primary_school");
//check the connection
if($connection === false) {
    die("connection failed: ");
}
if(isset($_POST['submit'])) {
    $parent_id = $_POST['parent_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $nationality = $_POST['nationality'];
    $date_of_birth = $_POST['date_of_birth'];

    //command sql to update record
    $sql = "UPDATE parent SET First_Name='$first_name', Last_Name='$last_name', Address='$address', Phone_Number='$phone_number', Email_Address='$email', Gender='$gender', Nationality='$nationality', Date_Of_Birth='$date_of_birth' WHERE Parent_ID=$parent_id";

    if($connection->query($sql) === TRUE) {
        echo "Parent update successful<br>";
    }else{
        echo "Errors on update parent: " . $connection->error;
    }
    $connection->close();
    echo "update operation success";
}
?>
</body>
</html>