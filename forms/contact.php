<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  
  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'tem.uk@capgemini.com';
  if( file_exists($php_email_form = '../assets/vendor/php-email-form/PHPMailer/PHPMailer.php' )) {
    include( $php_email_form );
	include( '../assets/vendor/php-email-form/PHPMailer/Exception.php' );
	include( '../assets/vendor/php-email-form/PHPMailer/SMTP.php' );
	
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }
  use PHPMailer\PHPMailer\PHPMailer;

  $mail = new PHPMailer();
  $mail->IsSMTP();
  $mail->SMTPDebug = 0;
  $mail->SMTPAuth = TRUE;
  $mail->SMTPSecure = "tls";
  $mail->Port     = 587;  
  $mail->Username = "tem.uk@capgemini.com";
  $mail->Password = "";
  $mail->Host     = "mx1.capgemini.com";
  $mail->Mailer   = "smtp";
  $mail->SetFrom($_POST["email"], $_POST["name"]);
  $mail->AddReplyTo($_POST["email"], $_POST["name"]);
  $mail->AddAddress($receiving_email_address);	
  $mail->Subject = $_POST["subject"];
  $mail->WordWrap   = 80;
  $mail->MsgHTML($_POST["message"]);

  $mail->IsHTML(true);

  if(!$mail->Send()) {
		echo "<p class='error'>Problem in Sending Mail.</p>";
	} else {
		echo "<p class='success'>Contact Mail Sent.</p>";
	}	
 /*  $contact = new PHPMailer();
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

 /* $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send(); */
?>
