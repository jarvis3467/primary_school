<?php
$servername = "localhost";
$username = "root";
$password ="";
$database ="st_alophonsus_primary_school";

//create connection to database
$connection = new mysqli($servername, $username, $password, $database);

$Year = "";
$Classroom = "";
$Capacity = "";

$errorMessage = "";
$successmessage = "";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Year = $_POST["Year"];
    $Classroom = $_POST["Classroom"];
    $Capacity = $_POST["Capacity"];

    do{
        if(empty($Year) || empty($Classroom) || empty($Capacity)) {
            $errorMessage = "All the fields are required";
            break;
        }
        //Add new class to database
        $sql = "INSERT INTO class (Year, Classroom, Capacity) " .
               "VALUES ('$Year', '$Classroom', '$Capacity')";
        $result = $connection->query($sql);
        
        if(!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $Year = "";
        $Classroom = "";
        $Capacity = "";

        $successmessage = "Classes added successful";

        header("location: class.php");
        exit;
    }while(false);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>add_classes</title>
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
    <h2>Add classes</h2>
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
            <label class="col-sm-3 col-form-label">Year:</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="Year" value="<?php echo $Year; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Classroom:</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="Classroom" value="<?php echo $Classroom; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Capacity:</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="Capacity" value="<?php echo $Capacity; ?>">
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
                <a class="btn btn-outline-warning" href="class.php" role="button">Cancellation</a>
            </div>
        </div>
    </form>
</div>
</body>
</html>