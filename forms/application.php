<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace with your real receiving email address
  $receiving_email_address = 'advantagecareservices123@gmail.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;

  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = 'Online Job Application';

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  $contact->add_message( $_POST['name'], 'Name');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['phone'], 'Phone');
  isset($_POST['city']) && $contact->add_message($_POST['city'], 'City');
  isset($_POST['zip']) && $contact->add_message($_POST['zip'], 'ZIP Code');
  isset($_POST['position']) && $contact->add_message($_POST['position'], 'Position');
  isset($_POST['availability']) && $contact->add_message($_POST['availability'], 'Availability');
  isset($_POST['start_date']) && $contact->add_message($_POST['start_date'], 'Earliest Start Date');
  isset($_POST['experience']) && $contact->add_message($_POST['experience'], 'Years of Experience');
  isset($_POST['counties']) && $contact->add_message(implode(', ', (array) $_POST['counties']), 'Counties Willing to Work');
  isset($_POST['languages']) && $contact->add_message(implode(', ', (array) $_POST['languages']), 'Languages Spoken');
  isset($_POST['certifications']) && $contact->add_message($_POST['certifications'], 'Certifications');
  isset($_POST['work_authorized']) && $contact->add_message($_POST['work_authorized'], 'Authorized to Work in the U.S.');
  isset($_POST['transportation']) && $contact->add_message($_POST['transportation'], 'Driver\'s License & Transportation');
  isset($_POST['background_consent']) && $contact->add_message('Yes', 'Acknowledges Screening & Background Check');
  $contact->add_message( $_POST['message'], 'About the Applicant');

  echo $contact->send();
?>
