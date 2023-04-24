<?php
    // session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "internship";
// Create connection
$conn = mysqli_connect($servername,$username,$password,$dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$vendor_id = $_POST['vendor_id'];
$username = $_POST['username'];
$rosx_vendor_address= $_POST['rosx_vendor_address'];


// Select all vendors and their associated users
// $sql = "SELECT * FROM rosx_vendor
//         LEFT JOIN rosx_users ON rosx_vendor.rosx_vendor_id = rosx_users.rosx_user_id
//         WHERE Rosx_user_type = 'VENDOR'";

$sql = "INSERT INTO rosx_vendor (rosx_vendor_id,rosx_vendor_name,rosx_vendor_address)
 VALUES ('$vendor_id','$username','$rosx_vendor_address')";

if(mysqli_query($conn, $sql)){
    header("location: prod category.html");
}else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>

    