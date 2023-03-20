<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-2">
  <div class="page-header">
      <h2>Update</h2>
  </div>
    <div class="row">
        <div class="col-md-12">
            <?php
            $conn = mysqli_connect("localhost", "root", "", "ensemble");

            if (!$conn) {
                echo "Connection failed!";
            }


            $query = "SELECT * FROM invoice WHERE Invoice_ID='" . $_GET["Invoice_ID"] . "'"; // Fetch data from the table customers using id
            $result = mysqli_query($conn, $query);
            $invoice = mysqli_fetch_assoc($result);
            ?>
            <form action="update-process-invoice.php" method="POST">
              <input type="hidden" name="Invoice_ID" value="<?php echo $_GET["Invoice_ID"]; ?>" class="form-control" required="">
              <div class="form-group">
                <label for="Customer_ID">Customer ID</label>
                <input type="text" name="Customer_ID" class="form-control" value="<?php echo $invoice['Customer_ID']; ?>" required="">
              </div>                
              <div class="form-group">
                <label for="Reservation_ID">Reservation ID</label>
                <input type="text" name="Reservation_ID" class="form-control" value="<?php echo $invoice['Reservation_ID']; ?>" required="">
              </div>              
              <div class="form-group">
                <label for="Payment_Method">Payment Method</label>
                <input type="text" name="Payment_Method" class="form-control" value="<?php echo $invoice['Payment_Method']; ?>" required="">
              </div>
              <div class="form-group">
                <label for="Amount">Amount</label>
                <input type="text" name="Amount" class="form-control" value="<?php echo $invoice['Amount']; ?>" required="">
              </div>
              <div class="form-group">
                <label for="Date">Date</label>
                <input type="date" name="Date" class="form-control" value="<?php echo $invoice['Date']; ?>" required="">
              </div>
              <div class="form-group">
                <label for="Type">Type</label>
                <input type="text" name="Type" class="form-control" value="<?php echo $invoice['Type']; ?>" required="">
              </div>
             
              <button type="submit" class="btn btn-primary" value="submit">Submit</button>
            </form>
        </div>
    </div>        
</div>
</body>
</html>