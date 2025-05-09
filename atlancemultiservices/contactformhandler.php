<?php
error_reporting(0);

$name = $_POST['name'];
$visitor_email = $_POST['email'];
$message = $_POST['message'];
$subject = $_POST['subject'];

$email_subject = "new form submission";
$email_body = "Name:$name.\n"."Email: $visitor_email.\n"."Message:$message.\n"."Subject:$subject\n";


$to="test@equireitpark.com";

$headers="From:$visitor_email\r\n";
$headers="Reply-To:$visitor_email\r\n";
mail($to,$email_subject,$email_body,$headers);


?>
<script>
					alert("Form submitted..!");
					window.location.href="contact.php";
				</script>
