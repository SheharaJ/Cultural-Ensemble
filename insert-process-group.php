<?php
if(count($_POST)>0)
{    
    $conn = mysqli_connect("localhost", "root", "", "ensemble");

    if (!$conn) {
        echo "Connection failed!";
    }

    
        

    
     $Event_ID = $_POST['Event_ID'];
     $Grp_Name = $_POST['Grp_Name'];
     $Description = $_POST['Description'];
     $No_Of_Members = $_POST['No_Of_Members'];
 
     $query = "INSERT INTO `group`(Event_ID, Grp_Name, Description,No_Of_Members)

     VALUES ('$Event_ID','$Grp_Name','$Description','$No_Of_Members')";
 
     if (mysqli_query($conn, $query)) {
        $msg = 1;
     } else {
        $msg = 4;
     }
}
  header ("Location: group.php?msg=".$msg."");
?>