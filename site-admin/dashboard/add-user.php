<?php
if((!isset($_POST['username'])) || (!isset($_POST['name'])) || (!isset($_POST['email'])) || ($_POST['name'] == "")|| ($_POST['username'] == "")|| ($_POST['email'] == "")){die();}else{
if (session_status() == PHP_SESSION_NONE) {session_start();}
if(!isset($_SESSION['admin_username'])){die(header('location: ../'));}


include"../../process/conn.php";

$add_username=htmlentities(stripslashes(trim($_POST['username'])));
$add_email=htmlentities(stripslashes(trim($_POST['email'])));
$add_name = htmlentities(stripslashes(trim($_POST['name'])));

function randomText() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array();
    $alphaLength = strlen($alphabet) - 1;
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass);
}

$pass = md5(randomText());
$time_aaded = time();
$otp = md5(randomText());

function send_email($sending_email){
  //send email
}

$sql = "INSERT INTO users (name, username, password, email, level, otp, verified, time)
values('$add_name', '$add_username', '$pass', '$add_email', 3, '$otp', 0, '$time_aaded')";
if(mysqli_query($conn,$sql)){

echo"1";

}
}
