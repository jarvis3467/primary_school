<?php
$servername = "localhost";
$username = "root";
$password ="";
$database ="st_alophonsus_primary_school";

//create connection to database
$connection = new mysqli($servername, $username, $password, $database);

$fname ="";
$lname ="";
$gender ="";
$phone_number ="";
$address ="";
$email_address ="";
$nationality ="";
$date_of_birth ="";

$errorMessage = "";
$successmessage ="";

if ( $_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $gender = $_POST["gender"];
    $phone_number = $_POST["phone_number"];
    $address = $_POST["address"];
    $email_address = $_POST["email_address"];
    $nationality = $_POST["nationality"];
    $date_of_birth =["date_of_birth"];

    do{
        if(empty($fname) || empty($lname) || empty($gender) || empty($phone_number) || empty($address) || empty($email_address) || empty($nationality) || empty($date_of_birth)) {
            $errorMessage = "All the fields are required";
            break;
        }

        //add new pupils to database
        $sql = "INSERT INTO pupils (First_Name, Last_Name, Gender, Phone_Number, Address, Email_Address, Nationality, Date_Of_Birth)" .
               "VALUES ('$fname', '$lname', '$gender', '$phone_number', '$address', '$email_address', '$nationality', '$date_of_birth')";
        $result = $connection->query($sql);
        
        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }


        $fname ="";
        $lname ="";
        $gender ="";
        $phone_number ="";
        $address ="";
        $email_address ="";
        $nationality ="";
        $date_of_birth ="";

        $successmessage = "Pupils successfully added";

        header("location: /website/pupils.php");
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
    <title>add_pupils</title>
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
    <div class="container my-3">
        <h2>Add new pupils</h2>
        <?php
        if ( !empty($errorMessage)) {
            echo "
            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>$errorMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
            </div>
            ";
        }
        ?>

        <form method="post">
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">First_Name</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="fname" value="<?php echo $fname; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Last_Name</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="lname" value="<?php echo $lname; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Gender</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="gender" value="<?php echo $gender; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Phone_Number</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="phone_number" value="<?php echo $phone_number; ?>">
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
        if( !empty($successmessage)) {
            echo "
            <div class='row mb-3'>
               <div class='offset-sm-3 col-sm-6'>
               <div class='alert alert-success alert-dismissible fade show' role='alert'>
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
                <button type="submit" class="btn btn-primary">submit</button>
            </div>
            <div class="col-sm-3 d-grid">
                <a class="btn btn-outline-warning" href="/website/pupils.php" role="button">Cancellation</a>
            </div>
        </div>
        </form>

    </div>
</body>
</html>