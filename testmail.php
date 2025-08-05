<?php
if (mail("vikasdhiman1008@gmail.com", "Test Email", "This is a test message", "From: test@vikasdhiman.shop")) {
    echo "Mail sent successfully.";
} else {
    echo "Mail failed.";
}
?>
