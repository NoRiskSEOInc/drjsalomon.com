<?php if(!$_REQUEST) exit;
	$id 		= $_REQUEST['gift-id'];
	$to 		= $_REQUEST['to'];
	$email 		= $_REQUEST['email'];
	$name 		= $_REQUEST['name'];
	$date 		= $_REQUEST['date'];
	$message	= $_REQUEST['message'];
	
	$subject 	= "You've been contacted by someone";
	
	$content 	= "$name sent you a message from your enquiry form:\r\n\n";
	$content   .= "Gift ID: $id \r\n\n";
	$content   .= "Contact Reason: $message \n\nEmail: $email \n\n";

	if(@mail($to, $subject, $content, "From: $email \r\n Reply-To: $email \r\nReturn-Path: $email\r\n")) {
		echo "<div class='dt-sc-success-box'><h5>Message Sent</h5>";
        echo "<p>Thank you <strong>$name</strong>, your message has been submitted and someone will contact you shortly.</p>";
	}else{
		echo "<h5 class='dt-sc-error-box'>Sorry, Try again Later.</h5>";
	}
?>