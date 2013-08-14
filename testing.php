// <?php
// $to = "haji_bauman@hotmail.com";
// $subject = "Test mail";
// $message = "Hello! This is a simple email message.";
// $from = "haji_bauman@hotmail.com";
// $headers = "From:" . $from;
// mail($to,$subject,$message,$headers);
// echo "Mail Sent.";
// ?>

<?php
$to      = 'haji_bauman@hotmail.com';
$subject = 'the subject';
$message = 'hello';
$headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
?>