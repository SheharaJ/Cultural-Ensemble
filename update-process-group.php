<?php
if(count($_POST)>0){
    $conn = mysqli_connect("localhost", "root", "", "ensemble");

    if (!$conn) {
        echo "Connection failed!";
    }

$query = "UPDATE `group` set Event_ID='" . $_POST['Event_ID'] . "', Grp_Name='" . $_POST['Grp_Name'] . "', Description='" . $_POST['Description'] . "', No_Of_Members='" . $_POST['No_Of_Members'] . "' WHERE Group_ID='" . $_POST['Group_ID'] . "'"; // update form data from the database
 if (mysqli_query($conn, $query)) {
    $msg = 2;
 } else {
    $msg = 4;
 }
}
header ("Location: group.php?msg=".$msg."");
?>