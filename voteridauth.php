<?php
// Database connection details
$servername = "localhost"; // Use your server details
$username = "root";        // Use your MySQL username
$password = "";            // Use your MySQL password
$dbname = "login";         // The database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the submitted voter ID from the form
    $voterID = $_POST['voterID'];

    // Sanitize the voter ID input to prevent SQL Injection
    $voterid = mysqli_real_escape_string($conn, $voterID);

    // SQL query to check if the voter ID exists in the 'user' table
    $sql = "SELECT * FROM user WHERE voterID = '$voterID'";
    $result = $conn->query($sql);

    // Check if the voter ID exists in the database
    if ($result->num_rows > 0) {
        // Voter ID found, fetch user details
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $state = $row['voter_state'];
        $constituency = $row['voter_constituency'];
        $mobile = $row['mobile'];

        echo "<h3>Voter ID Validated Successfully</h3>";
        echo "<p>Name: " . $name . "</p>";
        echo "<p>State: " . $state . "</p>";
        echo "<p>Constituency: " . $constituency . "</p>";
        echo "<p>mobile: " . $mobile . "</p>";

        // You can redirect to a different page or allow further actions
    } else {
        // Voter ID not found
        echo "<h3 style='color: red;'>Invalid Voter ID. Please try again.</h3>";
    }
}
?>