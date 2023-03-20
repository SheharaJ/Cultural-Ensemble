<?php
if(count($_POST)>0)
{    
    $conn = mysqli_connect("localhost", "root", "", "ensemble");

    if (!$conn) {
        echo "Connection failed!";
    }

    
        

    
     $firstName = $_POST['firstName'];
     $lastName = $_POST['lastName'];
     $email = $_POST['email'];
     $password = $_POST['password'];
     $tp = $_POST['tp'];
     $gender = $_POST['gender'];
     $houseNo = $_POST['houseNo'];
     $street = $_POST['street'];
     $city = $_POST['city'];
 
     $query = "INSERT INTO customer(FirstName, LastName, Email,Password,Tp,Gender,HouseNo,Street,City)

     VALUES ('$firstName','$lastName','$email','$password','$tp','$gender','$houseNo','$street','$city')";
 
     if (mysqli_query($conn, $query)) {
        $msg = 1;
     } else {
        $msg = 4;
     }
}
  header ("Location: customer.php?msg=".$msg."");
?>