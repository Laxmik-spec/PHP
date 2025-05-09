<?php

$to ="kamtam.lakshmi2824@gmail.com";
// $fromEmail = $_POST['fieldFormEmail']; 
// $fromName = $_POST['fieldFormName']; 
// $subject = $_POST['fieldSubject']; 
// $message = $_POST['fieldDescription'];

$course = $_POST['course'];
$studentname = $_POST['studentname'];
$date = $_POST['date'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$fathername = $_POST['fathername'];
$mothername = $_POST['mothername'];
$religion = $_POST['religion'];
$caste = $_POST['caste'];
$aadhar = $_POST['aadhar'];

/* Start of headers */ 
$headers = "From: $studentname"; 
$message .='Admission Request Submitted' . "\n\n";
$message .= 'Student Name:   '.$studentname."\n";
$message .= 'Date of Birth:   '.$date."\n";
$message .= 'Contact Number:   '.$phone."\n";
$message .= 'Course:   '.$course."\n";
$message .= 'Address:   '.$address."\n";
$message .= 'Gender:   '.$gender."\n";
$message .= 'Religion:   '.$religion."\n";
$message .= 'Mother Name:   '.$mothername."\n";
$message .= 'Father Name:   '.$fathername."\n";
$message .= 'Caste Category:   '.$caste."\n";
$message .= 'Aadhar Card Number:   '.$aadhar."\n";
// $message .= 'Message: '.$field_message."\n";

/* GET File Variables */ 
$tmpName = $_FILES['attachment']['tmp_name']; 
$fileType = $_FILES['attachment']['type']; 
$fileName = $_FILES['attachment']['name']; 



if (file($tmpName)) { 
  /* Reading file ('rb' = read binary)  */
  $file = fopen($tmpName,'rb'); 
  $data = fread($file,filesize($tmpName)); 
  fclose($file); 

  /* a boundary string */
  $randomVal = md5(time()); 
  $mimeBoundary = "==Multipart_Boundary_x{$randomVal}x"; 

  /* Header for File Attachment */
  $headers .= "\nMIME-Version: 1.0\n"; 
  $headers .= "Content-Type: multipart/mixed;\n" ;
  $headers .= " boundary=\"{$mimeBoundary}\""; 

  /* Multipart Boundary above message */
  $message = "This is a multi-part message in MIME format.\n\n" . 
  "--{$mimeBoundary}\n" . 
  "Content-Type: text/plain; charset=\"iso-8859-1\"\n" . 
  "Content-Transfer-Encoding: 7bit\n\n" . 
  $message . "\n\n"; 

  /* Encoding file data */
  $data = chunk_split(base64_encode($data)); 

  /* Adding attchment-file to message*/
  $message .= "--{$mimeBoundary}\n" . 
  "Content-Type: {$fileType};\n" . 
  " name=\"{$fileName}\"\n" . 
  "Content-Transfer-Encoding: base64\n\n" . 
  $data . "\n\n" . 
  "--{$mimeBoundary}--\n" ;

} 


$send = mail ("$to", "$subject", "$message", "$headers"); 

if($send){
  ?>

  <script>
  alert("Your Admission form has been recieved. We will contact you shortly.");
  window.location.href = "admission.php";
  </script>
  
  <?php
  
  }
  else{
      ?>
  
  <script>
  alert("Something went wrong");
  window.location.href = "admission.php";
  </script>
  
      <?php
  
  }
?>