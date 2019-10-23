<?php
// // error_reporting(1);
// ini_set('display_errors',1);

// $uname1 = $_POST['uname1'];
// $email  = $_POST['email'];
// $upswd1 = $_POST['upswd1'];
// $upswd2 = $_POST['upswd2'];
$postdata = $_POST['data'];
// // print_r($postdata); die;
$uname1 =$postdata['name'];
$email  =$postdata['email'];
$upswd1 =$postdata['password'];
$upswd2 =$postdata['password1'];

// print_r($_POST['data']); die;

if (!empty($uname1) || !empty($email) || !empty($upswd1) || !empty($upswd2) )
{

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "project1";



// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $SELECT = "SELECT email From register Where email = ? Limit 1";
  $INSERT = "INSERT Into register (uname1 , email ,upswd1, upswd2 )values(?,?,?,?)";

//Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     //checking username
      if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
  print_r($stmt); die;

      $stmt->bind_param("ssss", $uname1,$email,$upswd1,$upswd2);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>