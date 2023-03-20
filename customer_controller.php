
<?php


function getCustomers($keyword)
{
    $conn = mysqli_connect("localhost", "root", "", "ensemble");

    if (!$conn) {
        echo "Connection failed!";
    }

    
        $query = "SELECT Customer_ID, FirstName, LastName, Email,Password,Tp,Gender,HouseNo,Street,City FROM customer";

    $result = mysqli_query($conn, $query);
    $output = "";

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
          
            $output = $output .
                '<tr>' .
                '<th scope="row">' . $row["Customer_ID"] . '</th>' .
                '<td>' . $row["FirstName"] . '</td>' .
                '<td>' . $row["LastName"] . '</td>' .
                '<td>' . $row["Email"] . '</td>' .
                '<td>' . $row["Password"] . '</td>' .
                '<td>' . $row["Tp"] . '</td>' .
                '<td>' . $row["Gender"] . '</td>' .
                '<td>' . $row["HouseNo"] . '</td>' .
                '<td>' . $row["Street"] . '</td>' .
                '<td>' . $row["City"] . '</td>' .
                
                
                '</tr>';
        }
    }
    return $output;
}







if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'save':
            save($_POST['data']);
            break;
        case 'update':
            update($_POST['data']);
            break;
        case 'delete':
            delete($_POST['data']);
            break;
        case 'search':
            echo getStudents($_POST['keyword']);
            break;
    }
}

















function save($data)
{
    

$conn = mysqli_connect("localhost", "root", "", "ensemble");

if (!$conn) {
    echo "Connection failed!";
}

    $query = "INSERT INTO customer(FirstName, LastName, Email, Password, Tp, Gender, HouseNo, Street, City) VALUES"
        . "('" . $data['firstName'] . "','"
        . $data['lastName']  . "','"
        . $data['email']  . "','"
        . $data['password']  . "','"
        . $data['tp']  . "','"
        . $data['gender']  . "','"
        . $data['houseNo']  . "','"
        . $data['street']  . "','"
        . $data['city']  . "','"
        . ")";

    $result = mysqli_query($conn, $query);

    header('Content-Type: application/json; charset=utf-8');
    
    echo json_encode(mysqli_insert_id($conn));
   

   

}



