<?php
if(count($_POST)>0){
    $conn = mysqli_connect("localhost", "root", "", "ensemble");

    if (!$conn) {
        echo "Connection failed!";
    }

$query = "UPDATE reservation set Customer_ID='" . $_POST['Customer_ID'] . "', R_Date='" . $_POST['R_Date'] . "', RequestedDate='" . $_POST['RequestedDate'] . "' WHERE Reservation_ID='" . $_POST['Reservation_ID'] . "'"; // update form data from the database
 if (mysqli_query($conn, $query)) {
    $msg = 2;
 } else {
    $msg = 4;
 }
}
header ("Location: reservation.php?msg=".$msg."");
?>