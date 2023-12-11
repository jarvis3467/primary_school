<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "st_alophonsus_primary_school";

//create connection to database
$connection = new mysqli($servername, $username, $password, $database);

$first_name ="";
$last_name ="";
$address ="";
$phone_number ="";
$email_address ="";
$gender ="";
$nationality ="";
$date_of_birth ="";

$errormessage ="";
$successmessage ="";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $address = $_POST["address"];
    $phone_number = $_POST["phone_number"];
    $email_address = $_POST["email_address"];
    $gender = $_POST["gender"];
    $nationality = $_POST["nationality"];
    $date_of_birth = $_POST["date_of_birth"];

    do{
        if(empty($first_name) || empty($last_name) || empty($address) || empty($phone_number) || empty($email_address) || empty($gender) || empty($nationality) || empty($date_of_birth)) {
            $errormessage = "All the fields are required";
            break;
        }
        //Add new parents to database
        $sql = "INSERT INTO parent (First_Name, Last_Name, Address, Phone_Number, Email_Address, Gender, Nationality, Date_Of_Birth)" .
               "VALUES ('$first_name', '$last_name', '$address', '$phone_number', '$email_address', '$gender', '$nationality', '$date_of_birth')";
               $result = $connection->query($sql);

        if (!$result) {
            $errormessage = "Invalid query: " . $connection->error;
            break;
        }
        $first_name ="";
        $last_name ="";
        $address ="";
        $phone_number ="";
        $email_address ="";
        $gender ="";
        $nationality ="";
        $date_of_birth ="";

        $successmessage = "Parent successfully added";

        header("location: /website/parent.php");
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
    <title>add_parent</title>
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
<div class="container my-3">
<h2>Add new parent</h2>
<?php
if( !empty($errormessage)) {
    echo "
    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>$errormessage</strong>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
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
        <label class="col-sm-3 col-form-label">Phone_Number</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="phone_number" value="<?php echo $phone_number; ?>">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Email_Address</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="email_address" value="<?php echo $email_address; ?>">
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
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Date_Of_Birth</label>
        <div class="col-sm-6">
            <input type="date" class="form-control" name="date_of_birth" value="<?php echo $date_of_birth; ?>">
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
            <a class="btn btn-outline-danger" href="/website/parent.php" role="button">Cancellation</a>
        </div>
    </div>
</form>
</div>
</body>
</html>