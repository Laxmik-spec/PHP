<?php
$postData = $uploadedFile = $statusMsg = '';
$msgClass = 'errordiv';
if(isset($_POST['submit'])){
    // Get the submitted form data
    $postData = $_POST;
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
    
 
     // Check whether submitted data is not empty
     if(!empty($course) && !empty($studentname) && !empty($date) && !empty($phone) && !empty($gender) && !empty($address) && !empty($fathername) && !empty($mothername) && !empty($religion) && !empty($caste) && !empty($aadhar)) {
        
 
            $uploadStatus = 1;
            
            // Upload attachment file
            if(!empty($_FILES["photo"]["name"])){
                
                // File path config
                $targetDir = "uploads/";
                $fileName = basename($_FILES["photo"]["name"]);
                $targetFilePath = $targetDir . $fileName;
                $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
                
                // Allow certain file formats
                $allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg');
                if(in_array($fileType, $allowTypes)){
                    // Upload file to the server
                    if(move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFilePath)){
                        $uploadedFile = $targetFilePath;
                    }else{
                        $uploadStatus = 0;
                        $statusMsg = "Sorry, there was an error uploading your file.";
                    }
                }else{
                    $uploadStatus = 0;
                    $statusMsg = 'Sorry, only PDF, DOC, JPG, JPEG, & PNG files are allowed to upload.';
                }
            }
            
            if($uploadStatus == 1){
                
                // Recipient
                $toEmail = 'kamtam.lakshmi2824@gmail.com';

                // Sender
                // $from = 'sender@example.com';
                // $fromName = 'CodexWorld';
                
                // Subject
                $emailSubject = 'Addmission form Submitted by '.$studentname;
                
                // Message 
                $htmlContent = '<h2>Addmission Request Submitted</h2>
                    <p><b> Student Name:</b> '.$studentname.'</p>
                    <p><b>Course:</b> '.$course.'</p>
                    <p><b>Date Of Birth:</b> '.$date.'</p>
                    <p><b>Phone number:</b>'.$phone.'</p>
                    <p><b>Gender:</b>'.$gender.'</p>
                    <p><b>Address:</b>'.$address.'</p>
                    <p><b>Father Name:</b>'.$fathername.'</p>
                    <p><b>Mother Name:</b>'.$mothername.'</p>
                    <p><b>Religion:</b>'.$religion.'</p>
                    <p><b>Caste Category:</b>'.$caste.'</p>
                    <p><b>Aadhar Number:</b><br/>'.$aadhar.'</p>';

                // Header for sender info
                $headers = "From: $fromName"." <".$studentname.">";

                if(!empty($uploadedFile) && file_exists($uploadedFile)){
                    
                    // Boundary 
                    $semi_rand = md5(time()); 
                    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 
                    
                    // Headers for attachment 
                    $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
                    
                    // Multipart boundary 
                    $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
                    "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n"; 
                    
                    // Preparing attachment
                    if(is_file($uploadedFile)){
                        $message .= "--{$mime_boundary}\n";
                        $fp =    @fopen($uploadedFile,"rb");
                        $data =  @fread($fp,filesize($uploadedFile));
                        @fclose($fp);
                        $data = chunk_split(base64_encode($data));
                        $message .= "Content-Type: application/octet-stream; name=\"".basename($uploadedFile)."\"\n" . 
                        "Content-Description: ".basename($uploadedFile)."\n" .
                        "Content-Disposition: attachment;\n" . " filename=\"".basename($uploadedFile)."\"; size=".filesize($uploadedFile).";\n" . 
                        "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
                    }
                    
                    $message .= "--{$mime_boundary}--";
                    $returnpath = "-f" . $email;
                    
                    // Send email
                    $mail = mail($toEmail, $emailSubject, $message, $headers, $returnpath);
                    
                    // Delete attachment file from the server
                    @unlink($uploadedFile);
                }else{
                     // Set content-type header for sending HTML email
                    $headers .= "\r\n". "MIME-Version: 1.0";
                    $headers .= "\r\n". "Content-type:text/html;charset=UTF-8";
                    
                    // Send email
                    $mail = mail($toEmail, $emailSubject, $htmlContent, $headers); 
                }
                
                // If mail sent
                if($mail){
                    $statusMsg = 'Your contact request has been submitted successfully !';
                    $msgClass = 'succdiv';
                    
                    $postData = '';
                }else{
                    $statusMsg = 'Your contact request submission failed, please try again.';
                }
            }
        
    }
}
?>