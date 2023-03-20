<?php
if(count($_POST)>0){
    $conn = mysqli_connect("localhost", "root", "", "ensemble");

    if (!$conn) {
        echo "Connection failed!";
    }

$query = "UPDATE schedule set Show_ID='" . $_POST['Show_ID'] . "', StartTime='" . $_POST['StartTime'] . "', Date='" . $_POST['Date'] . "', Location='" . $_POST['Location'] ."' WHERE Schedule_ID='" . $_POST['Schedule_ID'] . "'"; // update form data from the database
 if (mysqli_query($conn, $query)) {
    $msg = 2;
 } else {
    $msg = 4;
 }
}
header ("Location: schedule.php?msg=".$msg."");
?>