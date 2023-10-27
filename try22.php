<?php

  if($_SERVER["REQUEST_METHOD"]!== "POST"){
    exit("Not requested");
  }

  if(isset($_POST["submit"])){

    $pdfclassname = "";
    $imgclassname = "";

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
    echo($message."\r\n"); //return remove
    
    $subject = $email;
    $fromname ="Registration";
    $fromemail = 'register@imaginetheworldorg.com';  
    $mailto = 'amanueltzb@gmail.com'; //return change

    $pdfmime=["application/pdf"];
    $imagesmime=["image/jpg","image/png","image/jpeg","image/webp"];

    if($_FILES['transcript']['error'] == UPLOAD_ERR_OK){
      if(! in_array($_FILES['transcript']['type'], $pdfmime)){
        $classname = "errorformat";
        echo ($classname);
      }
      else{
        $content = file_get_contents($fileName);
        $content = chunk_split(base64_encode($content));
      }
      
    }

    if($_FILES['id']['error'] == UPLOAD_ERR_OK){
      if(! in_array($_FILES['id']['type'], $pdfmime)){
        $classname = "errorformat";
        echo ($classname);
      }
      else{
        $idcontent = file_get_contents($idfileName);
        $idcontent = chunk_split(base64_encode($idcontent));
      }
      
    }

    if($_FILES['receipt']['error'] == UPLOAD_ERR_OK){
      if(! in_array($_FILES['receipt']['type'], $pdfmime)){
        $classname = "errorformat";
        echo ($classname);
      }
      else{
        $receiptcontent = file_get_contents($receiptfileName);
        $receiptcontent = chunk_split(base64_encode($receiptcontent));
      }
      
    }

    $separator = md5(time());
    $eol = "\r\n";

    
    


    print_r($_POST);//return remove
    print_r($_FILES);//return remove
  }

  