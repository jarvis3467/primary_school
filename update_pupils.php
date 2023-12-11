

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>update_pupils</title>
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
        <h2>Update pupils</h2>
        <form method="post" action="update_pupils.php">

<label for="Pupils_ID">Enter Pupils ID:</label>
<input type="text" name="pupils_id">
<label for="First_Name">Enter First Name:</label>
<input type="text" name="first_name">
<label for="Last_Name">Enter Last Name:</label>
<input type="text" name="last_name">
<label for="Gender">Gender:</label>
<input type="text" name="gender">
<label for="Phone_Number">Enter Phone Number:</label>
<input type="text" name="phone_number">
<label for="Address">Enter Address:</label>
<input type="text" name="address">
<label for="Email_Address">Enter Email address</label>
<input type="text" name="email_address">
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
        $pupils_id =$_POST['pupils_id'];
        $first_name =$_POST['first_name'];
        $last_name =$_POST['last_name'];
        $gender =$_POST['gender'];
        $phone_number =$_POST['phone_number'];
        $address =$_POST['address'];
        $email_address =$_POST['email_address'];
        $nationality =$_POST['nationality'];
        $date_of_birth =$_POST['date_of_birth'];

        //command sql to update record
        $sql = "UPDATE pupils SET First_Name='$first_name', Last_Name='$last_name', Gender='$gender', Phone_Number='$phone_number', Address='$address', Email_Address='$email_address', Nationality='$nationality', Date_Of_Birth='$date_of_birth' WHERE Pupils_ID=$pupils_id";

        if($connection->query($sql) === TRUE) {
            echo "Pupils update successful<br>";
        }else{
            echo "Errors on update pupils: " . $connection->error;
        }
        $connection->close();
        echo "Update operation success";
    }
    ?>
</body>
</html>