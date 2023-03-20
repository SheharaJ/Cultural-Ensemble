<?php
if(count($_POST)>0){
    $conn = mysqli_connect("localhost", "root", "", "ensemble");

    if (!$conn) {
        echo "Connection failed!";
    }

$query = "UPDATE customer set FirstName='" . $_POST['FirstName'] . "', LastName='" . $_POST['LastName'] . "', Email='" . $_POST['Email'] . "', Password='" . $_POST['Password'] . "',Tp='" . $_POST['Tp'] . "',Gender='" . $_POST['Gender'] . "', HouseNo='" . $_POST['HouseNo'] . "', Street='" . $_POST['Street'] . "', City='" . $_POST['City'] . "' WHERE Customer_ID='" . $_POST['Customer_ID'] . "'"; // update form data from the database
 if (mysqli_query($conn, $query)) {
    $msg = 2;
 } else {
    $msg = 4;
 }
}
header ("Location: customer.php?msg=".$msg."");
?>