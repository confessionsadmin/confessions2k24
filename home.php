<!-- conf3.html -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Confessions Viewer</title>
  <style>
    body {
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
      padding: 20px;
      width: 300px;
      box-sizing: border-box;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
      text-align: center;
      font-weight: 800;
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

    .close-button:hover {
      background: #2980b9;
    }
  </style>
</head>
<body>

<?php
// Check if data is received
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $toName = $_POST["to"];
    $fromEmail = $_POST["from"];
    $message = $_POST["message"];
    ?>
    <div class="popup-container">
      <p class="popup-message">Confession Received!</p>
      <p><strong>To:</strong> <?php echo $toName; ?></p>
      <p><strong>From:</strong> <?php echo $fromEmail; ?></p>
      <p><strong>Message:</strong> <?php echo $message; ?></p>
      <button class="close-button"><a href="conf3.html">Close</a></button>
    </div>
<?php
} else {
    // If no data received, redirect to index.php
    header("Location: conf3.html");
}
?>

</body>
</html>
