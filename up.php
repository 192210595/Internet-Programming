<?php
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbVoter_id = "";
$dbState = "";
$dbname = "login";
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbVoter_id, $dbState,  $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form data
    $username = $_POST["username"];
    $password = $_POST["password"];
    $Voter_id = $_POST["Voter_id"];
    $State = $_Post["State"];
$sql = "INSERT INTO user (username, password, Voter_id, State) VALUES ('$username', '$password','$Voter_id','$State')";
if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>