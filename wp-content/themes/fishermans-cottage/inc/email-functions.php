<?php
/**
 * Functions related to email
 *
 * @package fishermans-cottage
 * @since fishermans-cottage 0.1
 */


function send_email() {
  
  if(!isset($_POST['name']) ||
    !isset($_POST['email']) ||
    !isset($_POST['message'])) {
    died('You are missing some mandatory fields!');       
  }
  
  $name = $_POST["name"];
  $email = $_POST["email"];
  $message = $_POST["message"];
  
  $email_to = "alexwokeeffe@gmail.com";
  $email_subject = "General Enquiry";
  
  $email_message = "";
  $email_message .= "Name: ".$name."\n\n";
  $email_message .= "Message: ".$message."\n";
  
  $headers = 'From: '.$email."\r\n".
  'Reply-To: '.$email."\r\n" .
  'X-Mailer: PHP/' . phpversion();
  @mail($email_to, $email_subject, $email_message, $headers);
  
  $results = array(
    'successMessage' => "Thanks for contacting us! We'll be in touch with you soon!"
  );
  
  echo json_encode($results);
    
  return;
  die();
}

add_action('admin_post_nopriv_send_email', 'send_email'); 
add_action('admin_post_send_email', 'send_email');
