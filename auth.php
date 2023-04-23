<?php

require_once('auth.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $server = "localhost";
    // $user_id="root";
    $username = "root";
    $password = "";
    $dbname = "internship";
    $conn = mysqli_connect($server, $username, $password, $dbname);

    if (!$conn) {
        die("connection to this database failed due to" .
            mysqli_connect_error());
    }
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user_type = $_POST['user_type'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $enter = $_POST['enter'];
    $sql = "INSERT INTO rosx_users (rosx_user_id,rosx_username, rosx_password, Rosx_user_type) 
        VALUES ('$user_id','$username','$hashed_password','$user_type')";
    if (mysqli_query($conn, $sql) && $user_type === 'VENDOR') {
        header("location: login.html");
    } 
    else {
        // if ($_SERVER["REQUEST_METHOD"] == "POST")
        // Redirect to auth.html
        // $enter
        header("location: auth.html");
    }
}
?>






