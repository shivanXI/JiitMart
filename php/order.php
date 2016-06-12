<?php

include 'functions.php';

if (!empty($_POST)){

  $data['success'] = true;
  $_POST  = multiDimensionalArrayMap('cleanEvilTags', $_POST);
  $_POST  = multiDimensionalArrayMap('cleanData', $_POST);

  //your email adress 
  $emailTo ="bookrequest@jiitmart.com"; //"yourmail@yoursite.com";

  //from email adress
  $emailFrom "admin@jiitmart.com"; //"contact@yoursite.com";

  //email subject
  $emailSubject = "NEW ORDER";

  $name = $_POST["name"];
  $contact = $_POST["contact"];
  $email = $_POST["email"];
  $enroll = $_POST["enroll"];
  $hostel = $_POST["hostel"];
  $roomno = $_POST["roomno"];
  $book = $_POST["book"];
  $other = $_POST["other"];
  



 if($data['success'] == true){

  $message = "NAME: $name<br>
  CONTACT: $contact<br>
  EMAIL: $email<br>
  ENROLL: $enroll<br>
  HOSTEL: $hostel<br>
  ROOMNO: $roomno<br>
  BOOK: $book<br>
  OTHER: $other";


  $headers = "MIME-Version: 1.0" . "\r\n"; 
  $headers .= "Content-type:text/html; charset=utf-8" . "\r\n"; 
  $headers .= "From: <$emailFrom>" . "\r\n";
  mail($emailTo, $emailSubject, $message, $headers);

  $data['success'] = true;
  echo json_encode($data);
}
}