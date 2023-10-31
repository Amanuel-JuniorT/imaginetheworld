<?php
// if($_FILES["degree"]["error"] == '0'){
//   echo "Hello";
// }
// else{
//   echo "No";
// }

// $pathinfo = pathinfo($_FILES["degree"]["name"]);
// $base = $pathinfo["filename"];
// $ext = $pathinfo["extension"];

// $data = str_replace( array( '.'), '_' , $_POST["email"]);
// trim($_POST["email"]);
// $data = stripslashes($data);
// $data = htmlspecialchars($data);
// $data = $_POST["email"] . '.txt';
// echo $data;

// echo $ext;

// echo isset($_FILES["degree"]);
// print_r($_FILES["transcript"]);

// if($_FILES['transcript']['type'] === 0 && !in_array($_FILES['transcript']['type'], $pdfmime)){
//   header("Location: form.php?error=Transcript not in pdf file");
//   exit();
// }

// print_r($_POST["status"]);

// if($_POST["status"] === "Masters"){
//   echo "Hello\n";
//   print_r($_FILES["degree"]);
// }
// else{
//   echo "No";
// }
// $open = fopen("upload/css.txt", "w");
// fwrite($open, "Hello");
// fclose($open);

$today = date("Y-m-d");
// $name = $_POST["email"].$today;
// $try = fopen("upload/". $name, "w");
// fclose($try);
// // echo $try;

$date1 ="2023-10-24";
// $date2 = "2023-09-22";


// // echo $date1-$date2;
// $diff = abs(strtotime($today)-strtotime($date1));
// echo floor($diff/(60*60*24))."\t\n";

// $day = substr($name, strlen($_POST["email"]));
// echo $day;
// echo strlen($_POST["email"])-5;

// echo file("upload/hello.txt")."\r\n";

$file = fopen("upload/hello.txt", "r");
$date = fread($file, filesize("upload/hello.txt"));
// echo $date;
fclose($file);

$write = fopen("upload/amanueltzb@gmail.com.txt", "w");
fwrite($write, $date1);
fclose($write);

$files = fopen("upload/amanueltzb@gmail.com", "r");
$dates = fread($files, filesize("upload/amanueltzb@gmail.com.txt"));
echo $dates;
fclose($files);



