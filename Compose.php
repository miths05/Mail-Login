<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compose Mail</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        h2 {
            color: #333;
        }
        form {
            background-color: #fff;
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            font-weight: bold;
            color: #333;
        }
        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        textarea {
            resize: vertical;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Compose your Mail</h2>
    <form action="send_email.php" method="post">
        <label for="to_email">Recipient Email (To):</label>
        <input type="email" id="to_email" name="to_email" required><br><br>
        <label for="name">Your Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject" required><br><br>
        <label for="message">Your Message:</label>
        <textarea id="message" name="message" rows="4" required></textarea><br><br>
        <input type="submit" value="Send">
    </form>
</body>
</html>
