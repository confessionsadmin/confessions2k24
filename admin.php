<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "confessions_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all confessions from the database
$sql = "SELECT * FROM confessions";
$result = $conn->query($sql);

// Store fetched confessions in an array
$confessions = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $confessions[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Confessions Viewer</title>
    <style>
        body {
            margin: 0;
            padding: 20px;
            font-family: 'Arial', sans-serif;
            background: #f0f0f0;
        }

        .confession-box {
            background: #fff;
            border: 2px solid #ddd;
            border-radius: 10px;
            margin-bottom: 20px;
            padding: 20px;
            box-sizing: border-box;
        }

        .confession-box p {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <h1>Admin Confessions Viewer</h1>

    <?php foreach ($confessions as $confession) : ?>
        <div class="confession-box">
            
            <p> <?php echo $confession['message']; ?></p>
            <p><strong>To:</strong> <?php echo $confession['to_name']; ?></p>
            <p><strong>From:</strong> <?php echo $confession['from_email']; ?></p>
            
            
            
            
        </div>
    <?php endforeach; ?>
</body>
</html>
