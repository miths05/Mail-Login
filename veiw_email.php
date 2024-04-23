<!DOCTYPE html>
<html lang="en">
<head>
    <title>Email Message</title>
    <link rel="icon" href=".\logo.png" type="image/icon type">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="top">
    <header>
        <center>
        <h1>Email Message</h1>
        </center>
    </header>
</div>

    <div class="mainbody">
        <section class="last-section">
            <?php
            $server = '{imap.gmail.com:993/imap/ssl}INBOX'; // Corrected IMAP server and mailbox
            $username = 'mithilesh.22210486@viit.ac.in'; // Replace with your email username
            $password = 'pxbd ddch jsty xgqa'; // Replace with your email password
            // Get the email ID from the URL parameter
            $mail_id = $_GET['id'];
            // Attempt to connect to Gmail IMAP server
            $mailbox = imap_open($server, $username, $password);
            if (!$mailbox) {
                die('Cannot connect to Gmail mailbox: ' . imap_last_error());
            }
            // Fetch the email body
            $body = imap_fetchbody($mailbox, $mail_id, 1);
            // Close the mailbox connection
            imap_close($mailbox);
            // Display the email body
            echo nl2br(htmlspecialchars($body)); // Convert newline characters to <br> tags and escape HTML entities
            echo "<form method='post' action='delete_email.php'><input type='hidden' name='mail_id' value='$mail_id'><button type='submit'>Delete</button></form>";
            ?>
        </section>
    </div>
</body>
</html>

