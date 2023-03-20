<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Inquiry</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-2">
  <div class="page-header">
      <h2>Update Inquiry</h2>
  </div>
    <div class="row">
        <div class="col-md-12">
            <?php
            $conn = mysqli_connect("localhost", "root", "", "ensemble");

            if (!$conn) {
                echo "Connection failed!";
            }


            $query = "SELECT * FROM inquiry WHERE Inquiry_ID='" . $_GET["Inquiry_ID"] . "'"; // Fetch data from the table customers using id
            $result = mysqli_query($conn, $query);
            $inquiry = mysqli_fetch_assoc($result);
            ?>
            <form action="update-process-inquiry.php" method="POST">
              <input type="hidden" name="Inquiry_ID" value="<?php echo $_GET["Inquiry_ID"]; ?>" class="form-control" required="">
              <div class="form-group">
                <label for="FirstName">Customer_ID</label>
                <input type="text" name="Customer_ID" class="form-control" value="<?php echo $inquiry['Customer_ID']; ?>" required="">
              </div>                
              <div class="form-group">
                <label for="LastName">Subject</label>
                <input type="text" name="Subject" class="form-control" value="<?php echo $inquiry['Subject']; ?>" required="">
              </div>              
              <div class="form-group">
                <label for="Email">Message</label>
                <input type="text" name="Message" class="form-control" value="<?php echo $inquiry['Message']; ?>" required="">
              </div>
              <div class="form-group">
                <label for="Password">Date</label>
                <input type="date" name="Date" class="form-control" value="<?php echo $inquiry['Date']; ?>" required="">
              </div>
              

              <button type="submit" class="btn btn-primary" value="submit">Submit</button>
            </form>
        </div>
    </div>        
</div>
</body>
</html>