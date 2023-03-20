<?php
if(count($_POST)>0)
{    
    $conn = mysqli_connect("localhost", "root", "", "ensemble");

    if (!$conn) {
        echo "Connection failed!";
    }

    
        

    
     $Customer_ID = $_POST['Customer_ID'];
     $Reservation_ID = $_POST['Reservation_ID'];
     $Payment_Method = $_POST['Payment_Method'];
     $Amount = $_POST['Amount'];
     $Date = $_POST['Date'];
     $Type = $_POST['Type'];
     
 
     $query = "INSERT INTO invoice(Customer_ID, Reservation_ID, Payment_Method,Amount,Date,Type)

     VALUES ('$Customer_ID','$Reservation_ID','$Payment_Method','$Amount','$Date','$Type')";
 
     if (mysqli_query($conn, $query)) {
        $msg = 1;
     } else {
        $msg = 4;
     }
}
  header ("Location: invoice.php?msg=".$msg."");
?>