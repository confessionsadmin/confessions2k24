
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "confessions_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$response = ["success" => false];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $toName = $_POST["to"];
    $fromEmail = $_POST["from"];
    $message = $_POST["message"];

    $sql = "INSERT INTO confessions (to_name, from_email, message) VALUES ('$toName', '$fromEmail', '$message')";

    if ($conn->query($sql) === TRUE) {
        ?>
        
        <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Popup Message</title>
  <style>
    body {
      background-color: aquamarine;
      margin: 0;
      padding: 20px;
      font-family: 'Arial', sans-serif;
      background: #f0f0f0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .popup-container {
      background: #85fffb;
      border: 2px solid rgb(21, 0, 255);
      border-radius: 20px;
      padding: 40px;
      box-sizing: border-box;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
      text-align: center;
      font-weight: 900;

      
    }

    .popup-message {
      margin: 10px 0;
    }

    .close-button {
      background: #3498db;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
      transition: background 0.3s ease;
    }
    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }

    .close-button:hover {
      background: #2980b9;
    }
    
  </style>
</head>
<body>
  <div class="popup-container">
    <p class="popup-message">Thank you for your confession! <br>
        We Will Post It as soon as possible..
    </p>
    <button ><a href="index.html">Close</a></button>
    
  </div>

  
</body>
</html>

        
        <?php
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        
            $conn->close();
        } else {
            header("location : index.php");
        }