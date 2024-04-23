<?php
// Ensure that a POST request is made
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the email ID is provided
    if (isset($_POST['mail_id'])) {
        // Retrieve the email ID
        $mail_id = $_POST['mail_id'];

        // Connect to the IMAP server
        $server = '{imap.gmail.com:993/imap/ssl}INBOX';
        $username = 'mithilesh.22210486@viit.ac.in'; // Replace with your email username
        $password = 'pxbd ddch jsty xgqa'; // Replace with your email password
        $mailbox = imap_open($server, $username, $password);

        if (!$mailbox) {
            die('Cannot connect to Gmail mailbox: ' . imap_last_error());
        }

        // Delete the email
        if (imap_delete($mailbox, $mail_id)) {
            echo "Email deleted successfully.";
        } else {
            echo "Failed to delete email.";
        }

        // Close the mailbox connection
        imap_close($mailbox);
    } else {
        echo "Email ID not provided.";
    }
} else {
    echo "Invalid request method.";
}
?>
