<?php
if(count($_POST)>0)
{    
    $conn = mysqli_connect("localhost", "root", "", "ensemble");

    if (!$conn) {
        echo "Connection failed!";
    }

    
        

    
     $Customer_ID = $_POST['Customer_ID'];
     $Subject = $_POST['Subject'];
     $Message = $_POST['Message'];
     $Date = $_POST['Date'];
    
 
     $query = "INSERT INTO inquiry(Customer_ID, Subject, Message,Date)

     VALUES ('$Customer_ID','$Subject','$Message','$Date')";
 
     if (mysqli_query($conn, $query)) {
        $msg = 1;
     } else {
        $msg = 4;
     }
}
  header ("Location: inquiry.php?msg=".$msg."");
?>