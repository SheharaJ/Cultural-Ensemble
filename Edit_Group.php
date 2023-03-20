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


            $query = "SELECT * FROM `group` WHERE Group_ID='" . $_GET["Group_ID"] . "'"; // Fetch data from the table customers using id
            $result = mysqli_query($conn, $query);
            $group = mysqli_fetch_assoc($result);
            ?>
            <form action="update-process-group.php" method="POST">
              <input type="hidden" name="Group_ID" value="<?php echo $_GET["Group_ID"]; ?>" class="form-control" required="">
              <div class="form-group">
                <label for="Event_ID">Event ID</label>
                <input type="text" name="Event_ID" class="form-control" value="<?php echo $group['Event_ID']; ?>" required="">
              </div>                
              <div class="form-group">
                <label for="Grp_Name">Group Name</label>
                <input type="text" name="Grp_Name" class="form-control" value="<?php echo $group['Grp_Name']; ?>" required="">
              </div>              
              <div class="form-group">
                <label for="Description">Description</label>
                <input type="text" name="Description" class="form-control" value="<?php echo $group['Description']; ?>" required="">
              </div>
              <div class="form-group">
                <label for="No_Of_Members">No Of Members</label>
                <input type="text" name="No_Of_Members" class="form-control" value="<?php echo $group['No_Of_Members']; ?>" required="">
              </div>
              
              <button type="submit" class="btn btn-primary" value="submit">Submit</button>
            </form>
        </div>
    </div>        
</div>
</body>
</html>