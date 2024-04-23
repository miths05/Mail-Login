<?php
// Your Gmail IMAP server settings
$server = '{imap.gmail.com:993/imap/ssl}INBOX';
$username = ' mithilesh.22210486@viit.ac.in '; // Update with your Gmail address
$password = 'pxbd ddch jsty xgqa'; // Update with your Gmail app password
// Attempt to connect to Gmail IMAP server
$mailbox = imap_open($server, $username, $password);
if (!$mailbox) {
die('Cannot connect to Gmail mailbox: ' . imap_last_error());
}
// Search for unread emails
$mail_ids = imap_search($mailbox, 'ALL');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail Inbox</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #fff;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #45a049;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .email {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .email a {
            text-decoration: none;
            color: #333;
        }
        .email a:hover {
            text-decoration: underline;
        }
        .compose-btn, .logout-btn {
            display: block;
            margin-bottom: 20px;
            text-align: center;
            padding: 10px 20px;
            padding-right:10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            background-color: #fff;
            color: #45a049;
            text-decoration: none;
        }
        .compose-btn:hover, .logout-btn:hover {
            background-color: #6fdb72;
        }
    </style>
    </head>
    <body>
    <div class="email-container">
        <form method='post' action='Compose.php'>
            <button class="compose-btn" type='submit'>Compose</button>
        </form>
        <a href='logout.php' class="logout-btn">Log Out</a>
        <h1>Mail Inbox</h1>
        <?php
        if ($mail_ids) {
            foreach ($mail_ids as $mail_id) {
                $header = imap_headerinfo($mailbox, $mail_id);
                $from = $header->fromaddress;
                $subject = isset($header->subject) ? $header->subject : "(No Subject)"; // Check if subject exists
                $date = date("Y-m-d H:i:s", strtotime($header->date));
                echo "<div class='email'>";
                echo "<a href='veiw_email.php?id=$mail_id' target='_blank'>From: $from <br>";
                echo "Subject: $subject <br>";
                echo "Date: $date</a>";
                echo "</div>";
            }
        } else {
            echo "No new emails found.";
        }
        ?>
    </div>
</body>
</html>

