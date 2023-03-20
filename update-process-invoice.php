<?php
if(count($_POST)>0){
    $conn = mysqli_connect("localhost", "root", "", "ensemble");

    if (!$conn) {
        echo "Connection failed!";
    }

$query = "UPDATE invoice set Customer_ID='" . $_POST['Customer_ID'] . "', Reservation_ID='" . $_POST['Reservation_ID'] . "', Payment_Method='" . $_POST['Payment_Method'] . "', Amount='" . $_POST['Amount'] . "',Date='" . $_POST['Date'] . "',Type='" . $_POST['Type'] . "' WHERE Invoice_ID='" . $_POST['Invoice_ID'] . "'"; // update form data from the database
 if (mysqli_query($conn, $query)) {
    $msg = 2;
 } else {
    $msg = 4;
 }
}
header ("Location: invoice.php?msg=".$msg."");
?>