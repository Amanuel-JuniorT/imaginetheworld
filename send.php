<?php

    if($_SERVER["REQUEST_METHOD"] !== 'POST'){
        echo ('No Request');
    }
    else{

    // Files

    $ok = false;

    $filenameee =  $_FILES['transcript']['name'];
    $fileName = $_FILES['transcript']['tmp_name'];
    $idfilenameee =  $_FILES['id']['name'];
    $idfileName = $_FILES['id']['tmp_name'];
    $receiptfilenameee =  $_FILES['receipt']['name'];
    $receiptfileName = $_FILES['receipt']['tmp_name'];
    
    $fname = $_POST['fName'];
    $lname = $_POST['lName'];
    $name = $fname. " " .$lname;
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $apply = $_POST['status'];
    $dep = $_POST['department'];

    $message ="Name= ". $name . "\r\nEmail= " . $email . "\r\nDate of Birth= " . $dob . "\r\nPhone= " . $phone . "\r\nGender= " . $gender . "\r\nApply for= " . $apply . "\r\nDepartment= ". $dep; 

    $subject = $email;
    $fromname ="Registration";
    $fromemail = 'register@imaginetheworldorg.com';  //if u dont have an email create one on your cpanel

    $mailto = 'imaginetheworldorg@gmail.com';  //the email which u want to recv this email

    $pdfmime=["application/pdf"];
    $imagesmime=["image/jpg","image/png","image/jpeg","image/webp"];

    if($_FILES['transcript']['error'] === 0 && !in_array($_FILES['transcript']['type'], $pdfmime)){
      header("Location: form.php?error=Transcript not in pdf file");
      exit();
    }

    else if($_FILES['id']['error'] === 0 && !in_array($_FILES['id']['type'], $pdfmime)){
      header("Location: form.php?error=ID not in pdf file");
      exit();
    }

    else if($_FILES['passport']['error'] === 0 && !in_array($_FILES['passport']['type'], $pdfmime)){
      header("Location: form.php?error=Passport not in pdf file");
      exit();
    }

    else if($_FILES['degree']['error'] === 0 && !in_array($_FILES['degree']['type'], $pdfmime)){
      header("Location: form.php?error=Degree File not in pdf file");
      exit();
    }    
    
    else if($_FILES['receipt']['error'] === 0 && !in_array($_FILES['receipt']['type'], $imagesmime)){
      header("Location: form.php?error=Receipt not an image file");
      exit();
    }

    else{

    


    $content = file_get_contents($fileName);
    $content = chunk_split(base64_encode($content));

    $idcontent = file_get_contents($idfileName);
    $idcontent = chunk_split(base64_encode($idcontent));

    $receiptcontent = file_get_contents($receiptfileName);
    $receiptcontent = chunk_split(base64_encode($receiptcontent));

    // a random hash will be necessary to send mixed content
    $separator = md5(time());

    // carriage return type (RFC)
    $eol = "\r\n";

    // main header (multipart mandatory)
    $headers = "From: ".$fromname." <".$fromemail.">" . $eol;
    $headers .= "MIME-Version: 1.0" . $eol;
    $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;
    $headers .= "Content-Transfer-Encoding: 7bit" . $eol;
    $headers .= "This is a MIME encoded message." . $eol;

    // message
    $body = "--" . $separator . $eol;
    $body .= "Content-Type: text/plain; charset=\"iso-8859-1\"" . $eol;
    $body .= "Content-Transfer-Encoding: 8bit" . $eol;
    $body .= $message . $eol;

    // Transcript
    $body .= "--" . $separator . $eol;
    $body .= "Content-Type: application/octet-stream; name=\"" . $filenameee . "\"" . $eol;
    //$body .= "Content-Type: application/octet-stream; name=\"" . $idfilenameee . "\"" . $eol;
    $body .= "Content-Transfer-Encoding: base64" . $eol;
    $body .= "Content-Disposition: attachment" . $eol;
    $body .= $content . $eol;
    // $body .= "--" . $separator . "--";
    
    // ID
    $body .= "--" . $separator . $eol;
    $body .= "Content-Type: application/octet-stream; name=\"" . $idfilenameee . "\"" . $eol;
    $body .= "Content-Transfer-Encoding: base64" . $eol;
    $body .= "Content-Disposition: attachment" . $eol;
    $body .= $idcontent . $eol;
    //$body .= "--" . $separator . "--";

    // Receipt
    $body .= "--" . $separator . $eol;
    $body .= "Content-Type: application/octet-stream; name=\"" . $receiptfilenameee . "\"" . $eol;
    $body .= "Content-Transfer-Encoding: base64" . $eol;
    $body .= "Content-Disposition: attachment" . $eol;
    $body .= $receiptcontent . $eol;
    //$body .= "--" . $separator . "--";

    if($_FILES['passport']['error'] === 0 && $_FILES['degree']['error'] !== 0){

        // Passport

        $passfilenameee =  $_FILES['passport']['name'];
        $passfileName = $_FILES['passport']['tmp_name'];

        $passcontent = file_get_contents($passfileName);
        $passcontent = chunk_split(base64_encode($passcontent));

        $body .= "--" . $separator . $eol;
        $body .= "Content-Type: application/octet-stream; name=\"" . $passfilenameee . "\"" . $eol;
        $body .= "Content-Transfer-Encoding: base64" . $eol;
        $body .= "Content-Disposition: attachment" . $eol;
        $body .= $receiptcontent . $eol;
        $body .= "--" . $separator . "--";

    }
    else if($_FILES['passport']['error'] !== 0 && $_FILES['degree']['error'] === 0){
        // Degree
        
        $degfilenameee =  $_FILES['degree']['name'];
        $degfileName = $_FILES['degree']['tmp_name'];

        $degcontent = file_get_contents($degfileName);
        $degcontent = chunk_split(base64_encode($degcontent));

        $body .= "--" . $separator . $eol;
        $body .= "Content-Type: application/octet-stream; name=\"" . $degfilenameee . "\"" . $eol;
        $body .= "Content-Transfer-Encoding: base64" . $eol;
        $body .= "Content-Disposition: attachment" . $eol;
        $body .= $receiptcontent . $eol;
        $body .= "--" . $separator . "--";
    }
    else if($_FILES['passport']['error'] === 0 && $_FILES['degree']['error'] === 0){

        // Passport

        $passfilenameee =  $_FILES['passport']['name'];
        $passfileName = $_FILES['passport']['tmp_name'];

        $passcontent = file_get_contents($passfileName);
        $passcontent = chunk_split(base64_encode($passcontent));

        $body .= "--" . $separator . $eol;
        $body .= "Content-Type: application/octet-stream; name=\"" . $passfilenameee . "\"" . $eol;
        $body .= "Content-Transfer-Encoding: base64" . $eol;
        $body .= "Content-Disposition: attachment" . $eol;
        $body .= $receiptcontent . $eol;
        // $body .= "--" . $separator . "--";

        // Degree

        $degfilenameee =  $_FILES['degree']['name'];
        $degfileName = $_FILES['degree']['tmp_name'];

        $degcontent = file_get_contents($degfileName);
        $degcontent = chunk_split(base64_encode($degcontent));

        $body .= "--" . $separator . $eol;
        $body .= "Content-Type: application/octet-stream; name=\"" . $degfilenameee . "\"" . $eol;
        $body .= "Content-Transfer-Encoding: base64" . $eol;
        $body .= "Content-Disposition: attachment" . $eol;
        $body .= $receiptcontent . $eol;
        $body .= "--" . $separator . "--";

    }
    else{
        $body .= "--" . $separator . "--";
    }

    
    $ok = true;

    if($ok){

      header("Location: return.html");

    //SEND Mail

    // if (mail($mailto, $subject, $body, $headers)) {
    // echo "mail send ... OK"; // do what you want after sending the email
    // header("Location: return.html");


    } else {
    echo "mail send ... ERROR!";
    print_r( error_get_last() );
    }
}
}