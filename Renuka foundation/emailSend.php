<?php

$to = "kamtam.lakshmi2824@gmail.com";
// $from = $_POST['email'];

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

/* GET File Variables */ 
$tmpName = $_FILES['attachment']['tmp_name']; 
$fileType = $_FILES['attachment']['type']; 
$fileName = $_FILES['attachment']['name']; 

/* Start of headers */ 
$headers = "From: $studentname"; 

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
  "--{$mimeBoundary}--\n"; 

  $headers = "From: $studentname";
$headers = "From: " . $studentname . "\r\n";
$headers .= "Reply-To: ". $studentname . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$subject = "You have a message ";

// $logo = 'assets/images/logo.png';
// $link = '#';

$message .= '<h2>Addmission Request Submitted</h2>
<p><b> Student Name:</b> '.$studentname.'</p>
<p><b>Course:</b> '.$course.'</p>
<p><b>Date Of Birth:</b>  '.$date.'</p>
<p><b>Phone number:</b>  '.$phone.'</p>
<p><b>Gender:</b>  '.$gender.'</p>
<p><b>Address:</b>  '.$address.'</p>
<p><b>Father Name:</b>  '.$fathername.'</p>
<p><b>Mother Name:</b>  '.$mothername.'</p>
<p><b>Religion:</b>  '.$religion.'</p>
<p><b>Caste Category:</b>  '.$caste.'</p>
<p><b>Aadhar Number:</b><br/>  '.$aadhar.'</p>';
// <p><b>Photo:</b><br/>  '.$imgEncoded.'</p>';



// $body .= "<td style='border:none;'><strong>Email:</strong> {$studentname}</td><br>";
$message .= "</tr>";
// $body .= "<tr><td style='border:none;'><strong>Subject:</strong> {$subject}</td></tr>";
$message .= "<tr><td></td></tr>";
// $body .= "<tr><td colspan='2' style='border:none;'>{$no}</td></tr>";
$message .= "</tbody></table>";
$message .= "</body></html>";

}
$send = mail($to, $subject, $message, $headers);
if($send)
{

?>

<script>
alert("Form Submitted");
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
 

// $flgchk = mail ("$to", "$subject", "$message", "$headers"); 

// if($flgchk){
//   echo "A email has been sent to: $to";
//  }
// else{
//   echo "Error in Email sending";
// }
?>