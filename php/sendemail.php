<?php

// Define some constants
define( "RECIPIENT_NAME", "ENTER_RECIPIENT_NAME_HERE" );
define( "RECIPIENT_EMAIL", "ENTER_RECIPIENT_EMAIL_HERE" );


// Read the form values
$success = false;
$senderName = isset( $_POST['yName'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['yName'] ) : "";
$senderEmail = isset( $_POST['yEmail'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['yEmail'] ) : "";
$senderPhone = isset( $_POST['yPhone'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['yPhone'] ) : "";
$subject = isset( $_POST['ySubject'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['ySubject'] ) : "";
$message = isset( $_POST['yMessage'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['yMessage'] ) : "";

// If all values exist, send the email
if ( $senderName && $senderEmail && $senderPhone && $subject && $message) {
  $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
  $headers = "From: " . $senderName . " <" . $senderEmail . ">"; 
  $msgBody = " Phone: " . $senderPhone ."\n Subject: " . $subject ."\n Message: " . $message . " ";
  $success = mail( $recipient, $headers,  $msgBody );

  //Set Location After Successsfull Submission
  header('Location: ../thankyou.html');
}

else{
	//Set Location After Unsuccesssfull Submission
  	header('Location: ../index.html?message=unsuccessfull');	
}

?>