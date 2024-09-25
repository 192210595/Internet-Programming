<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch political parties
$sql = "SELECT voterID, name, voter_state, voter_constituency, mobile FROM user";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Political Parties</title>
    <style>
        /* Basic styling for the table */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #2980b9;
            color: white;
        }
        td {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>

    <h1>List of Political Parties</h1>

    <?php
    if ($result->num_rows > 0) {
        echo "<table>
                <thead>
                    <tr>
                        <th>VoterID</th>
                        <th>Name</th>
                        <th>State</th>
                        <th>Constituency</th>
                        <th>Mobile No.</th>
                    </tr>
                </thead>
                <tbody>";
        
        // Fetch and display each party's details
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['voterID'] . "</td>
                    <td>" . $row['name'] . "</td>
                    <td>" . $row['voter_state'] . "</td>
                    <td>" . $row['voter_constituency'] . "</td>
                    <td>" . $row['mobile'] . "</td>

                  </tr>";
        }
        
        echo "</tbody></table>";
    } else {
        echo "<p>No voters found in the database.</p>";
    }

    // Close the database connection
    $conn->close();
    ?>

</body>
</html>
