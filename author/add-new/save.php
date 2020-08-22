<?php

if (session_status() == PHP_SESSION_NONE) {session_start();}
if(!isset($_SESSION['username']) && (!isset($_COOKIE['cookie_username']) && !isset($_COOKIE['cookie_session_id']))){die(header('location: ../'));}


include"../../process/conn.php";

if(!isset($_SESSION['username']) && (!isset($_COOKIE['cookie_username']) && !isset($_COOKIE['cookie_session_id']))){header("Location: index.php");
die();}


if (session_status() == PHP_SESSION_NONE) {session_start();}
if(!isset($_SESSION['username'])){die();}


$username=$_SESSION['username'];
$username_hashed=md5($username);

$valid_extensions = array('jpeg', 'jpg', 'png'); // valid extensions
$path = '../../blog/images/'; // upload directory

if(!empty($_FILES['blog_image']) && ($_FILES['blog_image']['size']<4194280))
{

$img = $_FILES['blog_image']['name'];
$tmp = $_FILES['blog_image']['tmp_name'];
// get uploaded file's extension
$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
// can upload same image using rand function
$time=time();
$rand=rand(1000,1000000);
$final_image = $rand.$username_hashed.$time.'.'.$ext;
// check's valid format
if(in_array($ext, $valid_extensions))
{
$path = $path.strtolower($final_image);
if(move_uploaded_file($tmp,$path))
{
$image_path="/blog/images/$final_image";
}
}
}

$blog_title = htmlentities(stripslashes(trim($_POST['blog_title'])));
$blog_description = htmlentities(stripslashes(trim($_POST['blog_desc'])));
$blog_body = htmlentities(stripslashes(trim($_POST['blog_body'])));
$blog_author = htmlentities(stripslashes(trim($_SESSION['username'])));
$blog_tags = htmlentities(stripslashes(trim($_POST['blog_tags'])));
$blog_category = htmlentities(stripslashes(trim($_POST['blog_category'])));


$blog_id=md5(time().$blog_title.$blog_author.rand());
$blog_id_ = "'".$blog_id."'";
$image = $final_image;

$string = $blog_title;

function slugify($text)
{
  $text = preg_replace('~[^\pL\d]+~u', '-', $text);
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
  $text = preg_replace('~[^-\w]+~', '', $text);
  $text = trim($text, '-');
  $text = preg_replace('~-+~', '-', $text);
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }
  return $text;
}


$slug = slugify($blog_title);
$blog_path = $slug;
if(is_dir("../../blog/".$slug)){$blog_path = $slug."_".rand()."_".time();}else{$blog_path = $slug;}

$generated_tags="";


$time_published = time();
$sql = "INSERT INTO blogs (blog_id, blog_title, blog_description, blog_body, blog_author, blog_path, image, published, time, category, tags_by_user, generated_tags)
values('$blog_id', '$blog_title', '$blog_description', '$blog_body','$blog_author', '$blog_path', '$image', 1, '$time_published', '$blog_category', '$blog_tags','$generated_tags')";
if(mysqli_query($conn,$sql))
{
	mkdir("../../blog/".$blog_path);

$id='$id';

	$content = "<?php $id=$blog_id_;".file_get_contents("temp.txt");



	$fp = fopen("../../blog/".$blog_path."/index.php","w+");
if( $fp == false ){
    echo "file not created error";
}else{
    fwrite($fp,$content);
    fclose($fp);
}

	echo"1";
}
else{echo mysqli_error($conn);}
?>
