<?php
if(count($_POST)>0)
{    
    $conn = mysqli_connect("localhost", "root", "", "ensemble");

    if (!$conn) {
        echo "Connection failed!";
    }

    
        

    
     $Customer_ID = $_POST['Customer_ID'];
     $R_Date = $_POST['R_Date'];
     $RequestedDate = $_POST['RequestedDate'];
 
     $query = "INSERT INTO reservation(Customer_ID, R_Date, RequestedDate)

     VALUES ('$Customer_ID','$R_Date','$RequestedDate')";
 
     if (mysqli_query($conn, $query)) {
        $msg = 1;
     } else {
        $msg = 4;
     }
}
  header ("Location: reservation.php?msg=".$msg."");
?>