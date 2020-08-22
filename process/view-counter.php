<?php
include_once("conn.php");


function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
$user_ip =  get_client_ip();
  $is_proxy = 0;

  $proxy_ports = array(80,81,8080,443,1080,6588,3128);
	foreach($proxy_ports as $test_port) {
		if(@fsockopen($user_ip, $test_port, $errno, $errstr, 5)) {
      $is_proxy = 1;
			exit();
		}
	}


$sql = "SELECT*FROM views WHERE (ip = '$user_ip' AND blog_id='$blog_id')";
$query=mysqli_query($conn,$sql);
$count=mysqli_num_rows($query);
$row_view = mysqli_fetch_array($query);

if($is_proxy==0){
if($count==0){
$sql = "INSERT INTO views (blog_id, ip, hit) VALUES ('$blog_id', '$user_ip', 1)";
mysqli_query($conn,$sql);
}
else{
$hits = $row_view['hit'] + 1;
  $sql = "UPDATE views SET hit = $hits";
  mysqli_query($conn,$sql);
}
}
?>
