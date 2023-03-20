<?php
if(count($_POST)>0){
    $conn = mysqli_connect("localhost", "root", "", "ensemble");

    if (!$conn) {
        echo "Connection failed!";
    }

$query = "UPDATE inquiry set Customer_ID='" . $_POST['Customer_ID'] . "', Subject='" . $_POST['Subject'] . "', Message='" . $_POST['Message'] . "', Date='" . $_POST['Date'] ."' WHERE Inquiry_ID='" . $_POST['Inquiry_ID'] . "'"; // update form data from the database
 if (mysqli_query($conn, $query)) {
    $msg = 2;
 } else {
    $msg = 4;
 }
}
header ("Location: inquiry.php?msg=".$msg."");
?>