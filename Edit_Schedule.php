<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Schedule</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-2">
  <div class="page-header">
      <h2>Update Schedule</h2>
  </div>
    <div class="row">
        <div class="col-md-12">
            <?php
            $conn = mysqli_connect("localhost", "root", "", "ensemble");

            if (!$conn) {
                echo "Connection failed!";
            }


            $query = "SELECT * FROM schedule WHERE Schedule_ID='" . $_GET["Schedule_ID"] . "'"; // Fetch data from the table customers using id
            $result = mysqli_query($conn, $query);
            $inquiry = mysqli_fetch_assoc($result);
            ?>
            <form action="update-process-schedule.php" method="POST">
              <input type="hidden" name="Schedule_ID" value="<?php echo $_GET["Schedule_ID"]; ?>" class="form-control" required="">
              <div class="form-group">
                <label for="Show_ID">Show ID</label>
                <input type="text" name="Show_ID" class="form-control" value="<?php echo $inquiry['Show_ID']; ?>" required="">
              </div>                
              <div class="form-group">
                <label for="StartTime">Start Time</label>
                <input type="time" name="StartTime" class="form-control" value="<?php echo $inquiry['StartTime']; ?>" required="">
              </div>              
              <div class="form-group">
                <label for="Date">Date</label>
                <input type="date" name="Date" class="form-control" value="<?php echo $inquiry['Date']; ?>" required="">
              </div>
              <div class="form-group">
                <label for="Location">Location</label>
                <input type="text" name="Location" class="form-control" value="<?php echo $inquiry['Location']; ?>" required="">
              </div>
              

              <button type="submit" class="btn btn-primary" value="submit">Submit</button>
            </form>
        </div>
    </div>        
</div>
</body>
</html>