<?php
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "login";
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form data
    $username = $_POST["username"];
    $password = $_POST["password"];
    $state = $_POST["state"];
$sql = "INSERT INTO voter (username, password, state) VALUES ('$username', '$password','$state')";
if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>