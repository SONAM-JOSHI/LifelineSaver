<?php 
include('../include/config.php');
session_start();
$date = $_GET['date'];
$user = $_SESSION['user_id'];

// echo $date;
$sql = "UPDATE donor SET save_life_date = '$date' WHERE id = $user";

$result =  mysqli_query($connection,  $sql);

if($result){
    echo 'success';
}

?>