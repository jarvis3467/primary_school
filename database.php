<h1>School Database</h1>
<?php
$db_server ="localhost";
$db_user ="root";
$db_pass ="";
$db_name = "st_alophonsus_primary_school";
$conn ="";

$conn = mysqli_connect($db_server,$db_user,$db_pass,$db_name);

if($conn){
    echo "You are successfully connected to st-alphonsus-primary-school server";
}else{
    echo "Access Delined";
}


?>