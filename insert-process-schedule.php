<?php
if(count($_POST)>0)
{    
    $conn = mysqli_connect("localhost", "root", "", "ensemble");

    if (!$conn) {
        echo "Connection failed!";
    }

    
        

    
     $Show_ID = $_POST['Show_ID'];
     $StartTime = $_POST['StartTime'];
     $Date = $_POST['Date'];
     $Location = $_POST['Location'];
    
 
     $query = "INSERT INTO schedule(Show_ID, StartTime, Date,Location)

     VALUES ('$Show_ID','$StartTime','$Date','$Location')";
 
     if (mysqli_query($conn, $query)) {
        $msg = 1;
     } else {
        $msg = 4;
     }
}
  header ("Location: schedule.php?msg=".$msg."");
?>