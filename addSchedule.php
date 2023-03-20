<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Schedule</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-2">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h2>Add Schedule</h2>
            </div>
           
            <form action="insert-process-schedule.php" method="post">
                <div class="form-group">
                    <label>Show ID*</label>
                    <input type="text" class="form-control" id="Show_ID" name="Show_ID" required>
                </div>
                <div class="form-group">
                    <label>Start Time*</label>
                    <input type="time" class="form-control" id="StartTime" name="StartTime" required>
                </div>
                <div class="form-group">
                    <label>Date*</label>
                    <input type="date" class="form-control" id="Date" name="Date" required>
                </div>
                <div class="form-group">
                    <label>Location*</label>
                    <input type="text" class="form-control" id="Location" name="Location" required>
                </div>
                
                <input type="submit" class="btn btn-primary" name="submit" value="save">
            </form>
        </div>
    </div>        
</div>
</body>
</html>