<?php
 $conn = mysqli_connect("localhost", "root", "", "ensemble");

 if (!$conn) {
     echo "Connection failed!";
 }
$query = "DELETE FROM reservation WHERE Reservation_ID='" . $_GET["Reservation_ID"] . "'"; // Delete data from the table customers using id
 if (mysqli_query($conn, $query)) {
    $msg = 3;
 } else {
    $msg = 4;
 }
header ("Location: reservation.php?msg=".$msg."");
?>