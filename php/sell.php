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
  $emailSubject = "OLD BOOK FOR SALE";

  $name = $_POST["name"];
  $contact = $_POST["contact"];
  $email = $_POST["email"];
  $book = $_POST["book"];
  $edition = $_POST["edition"];
  $bookprice = $_POST["bookprice"];
  $comments = $_POST["comments"];
  



 if($data['success'] == true){

  $message = "NAME: $name<br>
  CONTACT: $contact<br>
  EMAIL: $email<br>
  BOOK: $book<br>
  EDITION: $edition<br>
  BOOKPRICE: $bookprice<br>
  COMMENT: $comment";


  $headers = "MIME-Version: 1.0" . "\r\n"; 
  $headers .= "Content-type:text/html; charset=utf-8" . "\r\n"; 
  $headers .= "From: <$emailFrom>" . "\r\n";
  mail($emailTo, $emailSubject, $message, $headers);

  $data['success'] = true;
  echo json_encode($data);
}
}