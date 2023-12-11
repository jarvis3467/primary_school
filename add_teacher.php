<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "st_alophonsus_primary_school";

//create connection to database
$connection = new mysqli($servername, $username, $password, $database);

$first_name = "";
$last_name = "";
$address = "";
$email_address = "";
$phone_number = "";
$date_of_birth = "";
$gender = "";
$nationality = "";

$errormessage ="";
$successmessage ="";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $address = $_POST["address"];
    $email_address = $_POST["email_address"];
    $phone_number = $_POST["phone_number"];
    $date_of_birth = $_POST["date_of_birth"];
    $gender = $_POST["gender"];
    $nationality = $_POST["nationality"];

    do{
        if(empty($first_name) || empty($last_name) || empty($address) || empty($email_address) || empty($phone_number) || empty($date_of_birth) || empty($gender) || empty($nationality)) {
            $errormessage = "All the fields are required";
            break;
        }
        //add new teacher to the database
        $sql = "INSERT INTO teacher (First_Name, Last_Name, Address, Email_Address, Phone_Number, Date_Of_Birth, Gender, Nationality)" .
               "VALUES ('$first_name', '$last_name', '$address', '$email_address', '$phone_number', '$date_of_birth', '$gender', '$nationality')";
               $result = $connection->query($sql);

               if (!$result) {
                $errormessage = "Invalid query: " . $connection->error;
                break;
               }
               $first_name = "";
               $last_name = "";
               $address = "";
               $email_address = "";
               $phone_number = "";
               $date_of_birth = "";
               $gender = "";
               $nationality = "";
               
               $successmessage = "Teacher successfully added";
               header("location: /website/teacher.php");
               exit;

    }while (false);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>add_teacher</title>
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
        <a class="nav-link" href="parent.php">Parent</a>
        <a class="nav-link" href="subject.php">Subject</a>
        <a class="nav-link" href="Attendance.php">Attendance</a>
        <a class="nav-link" href="class.php">Class</a>
      </div>
    </div>
  </div>
</nav>
<div class="container my-3">
    <h2>Add new teacher</h2>
     <?php
     if(!empty($errormessage)) {
        echo "
        <div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>$errormessage</strong>
        <button type='button' class'btn-close' data-bs-dismiss='alert' aria-label='close'></button>
        </div>
        ";
     }
     ?>
    <form method="post">
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">First_Name</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="first_name" value="<?php echo $first_name; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Last_Name</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="last_name" value="<?php echo $last_name; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Address</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Email_Address</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="email_address" value="<?php echo $email_address; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Phone_Number</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="phone_number" value="<?php echo $phone_number; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Date_Of_Birth</label>
            <div class="col-sm-6">
                <input type="date" class="form-control" name="date_of_birth" value="<?php echo $date_of_birth; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Gender</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="gender" value="<?php echo $gender; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Nationality</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="nationality" value="<?php echo $nationality; ?>">
            </div>
        </div>
        <?php
        if( !empty($successmessage)){
            echo "
            <div class='row mb-3'>
             <div class='offset-sm-3 col-sm-6'>
             <div class='alert alert-success alert-dismissible fade show' role'alert'>
             <strong>$successmessage</strong>
             <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
             </div>
             </div>
             </div>
             ";
        }
        ?>
        <div class="row mb-3">
          <div class="offset-sm-3 col-sm-3 d-grid">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
          <div class="col-sm-3 d-grid">
            <a class="btn btn-outline-warning" href="/website/teacher.php" role="button">Cancellation</a>
          </div>
    </form>
</div>
</body>
</html>