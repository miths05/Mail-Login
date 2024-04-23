<?php
session_start();

// Check if user is already logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
?>
    <!DOCTYPE html>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail Inbox</title>
    <style>
        /* CSS styles go here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
        }
        .email {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #fff;
        }
        .email div {
            margin-bottom: 5px;
        }
        .email-body {
            display: none;
            margin-top: 10px;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
        .compose-btn {
            display: block;
            text-align: center;
            margin-bottom: 20px;
        }
        .logout-btn {
            display: block;
            margin-top: 20px;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>
    <h1>Mail Inbox</h1>
    <a href="compose.php" class="compose-btn">Compose</a>
    <?php
    // Your PHP code goes here
    ?>
    <form action="logout.php" method="post">
        <input type="submit" value="Logout">
    </form>
</body>
<script>
function toggleBody(mailId) {
    var emailBody = document.getElementById('email-body-' + mailId);
    if (emailBody.style.display === 'none') {
        emailBody.style.display = 'block';
    } else {
        emailBody.style.display = 'none';
    }
}
</script>
</html>
    <h1>Mail Inbox</h1>
    <a href="compose.php" class="compose-btn">Compose</a>
    <?php
// Your Gmail IMAP server settings
$server = '{imap.gmail.com:993/imap/ssl}INBOX';
$username = 'mithilesh.22210486@viit.ac.in'; // Update with your Gmail address
$password = 'pxbd ddch jsty xgqa'; // Update with your Gmail app password

// Attempt to connect to Gmail IMAP server
$mailbox = imap_open($server, $username, $password);
if (!$mailbox) {
    die('Cannot connect to Gmail mailbox: ' . imap_last_error());
}

// Search for unread emails
$mail_ids = imap_search($mailbox, 'ALL');

// Display inbox
echo "<h1>Mail Inbox</h1>";

if ($mail_ids) {
    // Reverse the array to get the latest emails first
    $mail_ids = array_reverse($mail_ids);
    
    // Limit to 10 emails if more than 10
    $mail_ids = array_slice($mail_ids, 0, 10);

    // Loop through each unread email
    foreach ($mail_ids as $mail_id) {
        // Fetch email header
        $header = imap_headerinfo($mailbox, $mail_id);

        // Extract relevant details (e.g., sender, subject, date)
        $from = $header->fromaddress;
        $subject = mb_decode_mimeheader($header->subject); // Decode non-English subjects
        $date = date("Y-m-d H:i:s", strtotime($header->date));

        // Print or process the email details
        echo "<div class='email'>";
        echo "<div><a href='javascript:void(0);' onclick='toggleBody($mail_id)'>From: $from</a></div>";
        echo "<div>Subject: $subject</div>";
        echo "<div>Date: $date</div>";
        // echo "<button class='delete-btn' onclick=\"location.href='delete_mail.php?mail_id=$mail_id'\">Delete</button>";
        // echo "<button class='view-body-btn' onclick='toggleBody($mail_id)'>View Body</button>";
        echo "<div id='email-body-$mail_id' class='email-body' style='display: none;'>"; // initially hidden
        $body = imap_fetchbody($mailbox, $mail_id, 1); // Fetch body in English
        echo nl2br(htmlspecialchars($body)); // Display email body
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "No unread emails found.";
}

// Close the mailbox connection
imap_close($mailbox);
?> 



<form action="logout.php" method="post">
    <input type="submit" value="Logout">
</form>


 