<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-2">
  <div class="page-header">
      <h2>Update Data</h2>
  </div>
    <div class="row">
        <div class="col-md-12">
            <?php
            $conn = mysqli_connect("localhost", "root", "", "ensemble");

            if (!$conn) {
                echo "Connection failed!";
            }


            $query = "SELECT * FROM reservation WHERE Reservation_ID='" . $_GET["Reservation_ID"] . "'"; // Fetch data from the table customers using id
            $result = mysqli_query($conn, $query);
            $reservation = mysqli_fetch_assoc($result);
            ?>
            <form action="update-process-reservation.php" method="POST">
              <input type="hidden" name="Reservation_ID" value="<?php echo $_GET["Reservation_ID"]; ?>" class="form-control" required="">
              <div class="form-group">
                <label for="Customer_ID">Customer ID</label>
                <input type="text" name="Customer_ID" class="form-control" value="<?php echo $reservation['Customer_ID']; ?>" required="">
              </div>                
              <div class="form-group">
                <label for="R_Date">R Date</label>
                <input type="date" name="R_Date" class="form-control" value="<?php echo $reservation['R_Date']; ?>" required="">
              </div>              
              <div class="form-group">
                <label for="RequestedDate">Requested Date</label>
                <input type="date" name="RequestedDate" class="form-control" value="<?php echo $reservation['RequestedDate']; ?>" required="">
              </div>
              

              <button type="submit" class="btn btn-primary" value="submit">Submit</button>
            </form>
        </div>
    </div>        
</div>
</body>
</html>