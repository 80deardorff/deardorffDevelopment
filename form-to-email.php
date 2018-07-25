<?php

// CREATES THE VARIABLES FROM THE POSTED FORM
$name = $_POST['name'];
$visitor_email = $_POST['email'];
$message = $_POST['message'];

// CREATES THE MESSAGE FROM THE VARIALES GIVEN
$email_from = 'noreply@deardorffdevelopment.com';
$email_subject = "Deardorff Development Email";
$email_body = "You have received a new message from $name.\n".
                            "Here is the message:\n\n$message\n\n".

// SENDS THE EMAIL
// mail(to, subject, message, headers) IS THE FUNCTION

$to = "80deardorff@live.com";
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $visitor_email \r\n";
$headers .= "Cc: \r\n";
$headers .= "Bcc: \r\n";
mail($to,$email_subject,$email_body,$headers);

// FUNCTION FOR EMAIL VALIDATION
function IsInjected($str) {
    $injections = array('(\n+)',
           '(\r+)',
           '(\t+)',
           '(%0A+)',
           '(%0D+)',
           '(%08+)',
           '(%09+)'
           );
    $inject = join('|', $injections);
    $inject = "/$inject/i";
    if(preg_match($inject,$str)) {
      return true;
    }
    else {
      return false;
    }
}

if(IsInjected($visitor_email))
{
    echo "Bad email value!";
    exit;
}

// REDIRECTION TO HOMEPAGE
echo '<script language="javascript">alert("Thank you for your message. It has been sent successfully.")</script>';
echo '<script language="javascript">window.location = "http://www.deardorffdevelopment.com"</script>';

?>
