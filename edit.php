<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit and Update Data PHP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-2">
  <div class="page-header">
      <h2>Update Data From Database PHP</h2>
  </div>
    <div class="row">
        <div class="col-md-12">
            <?php
            $conn = mysqli_connect("localhost", "root", "", "ensemble");

            if (!$conn) {
                echo "Connection failed!";
            }


            $query = "SELECT * FROM customer WHERE Customer_ID='" . $_GET["Customer_ID"] . "'"; // Fetch data from the table customers using id
            $result = mysqli_query($conn, $query);
            $customer = mysqli_fetch_assoc($result);
            ?>
            <form action="update-process.php" method="POST">
              <input type="hidden" name="Customer_ID" value="<?php echo $_GET["Customer_ID"]; ?>" class="form-control" required="">
              <div class="form-group">
                <label for="FirstName">First Name</label>
                <input type="text" name="FirstName" class="form-control" value="<?php echo $customer['FirstName']; ?>" required="">
              </div>                
              <div class="form-group">
                <label for="LastName">Last Name</label>
                <input type="text" name="LastName" class="form-control" value="<?php echo $customer['LastName']; ?>" required="">
              </div>              
              <div class="form-group">
                <label for="Email">Email address</label>
                <input type="email" name="Email" class="form-control" value="<?php echo $customer['Email']; ?>" required="">
              </div>
              <div class="form-group">
                <label for="Password">Password</label>
                <input type="text" name="Password" class="form-control" value="<?php echo $customer['Password']; ?>" required="">
              </div>
              <div class="form-group">
                <label for="Tp">Tp</label>
                <input type="text" name="Tp" class="form-control" value="<?php echo $customer['Tp']; ?>" required="">
              </div>
              <div class="form-group">
                <label for="Gender">Gender</label>
                <input type="text" name="Gender" class="form-control" value="<?php echo $customer['Gender']; ?>" required="">
              </div>
              <div class="form-group">
                <label for="HouseNo">House Number</label>
                <input type="text" name="HouseNo" class="form-control" value="<?php echo $customer['HouseNo']; ?>" required="">
              </div>
              <div class="form-group">
                <label for="Street">Street</label>
                <input type="text" name="Street" class="form-control" value="<?php echo $customer['Street']; ?>" required="">
              </div>
              <div class="form-group">
                <label for="City">City</label>
                <input type="text" name="City" class="form-control" value="<?php echo $customer['City']; ?>" required="">
              </div>

              <button type="submit" class="btn btn-primary" value="submit">Submit</button>
            </form>
        </div>
    </div>        
</div>
</body>
</html>