<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
if(!isset($_SESSION['username']) && (!isset($_COOKIE['cookie_username']) && !isset($_COOKIE['cookie_session_id']))){die(header('location: ../'));}


include"../process/conn.php";

if(!isset($_SESSION['username']) && (!isset($_COOKIE['cookie_username']) && !isset($_COOKIE['cookie_session_id']))){header("Location: index.php");
die();}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
<meta name="theme-color" content="#4D045D">
  <title>IETE Blog - BIT Sindri </title>

  <!-- Bootstrap core CSS -->


  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="../vendor/style.css">
 <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
 <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">

<link rel="stylesheet" href="../vendor/style.css">
<style>
body{
 font-family: 'PT Sans', sans-serif;
}
.modal-confirm {
	color: #636363;
	width: 400px;
}
.modal-confirm .modal-content {
	padding: 20px;
	border-radius: 5px;
	border: none;
	text-align: center;
	font-size: 14px;
}
.modal-confirm .modal-header {
	border-bottom: none;
	position: relative;
}
.modal-confirm h4 {
	text-align: center;
	font-size: 26px;
	margin: 30px 0 -10px;
}
.modal-confirm .close {
	position: absolute;
	top: -5px;
	right: -2px;
}
.modal-confirm .modal-body {
	color: #999;
}
.modal-confirm .modal-footer {
	border: none;
	text-align: center;
	border-radius: 5px;
	font-size: 13px;
	padding: 10px 15px 25px;
}
.modal-confirm .modal-footer a {
	color: #999;
}
.modal-confirm .icon-box {
	width: 80px;
	height: 80px;
	margin: 0 auto;
	border-radius: 50%;
	z-index: 9;
	text-align: center;
	border: 3px solid #f15e5e;
}
.modal-confirm .icon-box i {
	color: #f15e5e;
	font-size: 46px;
	display: inline-block;
	margin-top: 13px;
}
.modal-confirm .btn, .modal-confirm .btn:active {
	color: #fff;
	border-radius: 4px;
	background: #60c7c1;
	text-decoration: none;
	transition: all 0.4s;
	line-height: normal;
	min-width: 120px;
	border: none;
	min-height: 40px;
	border-radius: 3px;
	margin: 0 5px;
}
.modal-confirm .btn-secondary {
	background: #c1c1c1;
}
.modal-confirm .btn-secondary:hover, .modal-confirm .btn-secondary:focus {
	background: #a8a8a8;
}
.modal-confirm .btn-danger {
	background: #f15e5e;
}
.modal-confirm .btn-danger:hover, .modal-confirm .btn-danger:focus {
	background: #ee3535;
}
.trigger-btn {
	display: inline-block;
	margin: 100px auto;
}
</style>
</head>

<body>
  <!-- Page Content Start-->

 <div class="topnav container-fluid" style="height:60px;">
   <div class="row">
     <div class="col-4">
       <a href="#">IETE Blogs</a>
     </div>
     <div class="col-8">
       <a href="#"><i class="fa fa-circle"></i></a>
       <a href="#"><?php echo $_COOKIE['cookie_username'] ?></a>
     </div>
   </div>
 </div>

 <br>

 <div class="dashboard-boxes container">
   <div class="row">

     <div class="col-sm-12 col-md-4 col-lg-3">
       <div class="author-square add-new" style="width:13rem;">
        <center>
          <a class="float-right" href="add-new"><i class="fa tile-icon fa-pencil"></i></a>
           <a class="plus-icon-link" style='margin:auto;padding:1px;top:0;' href="add-new"><i class="fa fa-plus"></i></a>
        </center>

       </div>

     </div>
     <div class="col-sm-12 col-md-4 col-lg-3">
       <div class="author-square">
         <div class="square-strip-1">
           <a class="square-title" href="#">OTHER INFO</a>
           <a href="#"><i class="fa tile-icon fa-thumb-tack"></i></a>
         </div>
         <div class="square-strip-2">
            <a href="#">0</a>
         </div>
       </div>
     </div>

     <div class="col-sm-12 col-md-6 col-lg-3">
       <div class="author-square">
         <div class="square-strip-1">
           <a class="square-title" href="#">TOTAL LIKES</a>
           <a href="#"><i class="fa tile-icon fa-thumbs-up"></i></a>
         </div>
         <div class="square-strip-2">
            <a href="#">0</a>
         </div>
       </div>
     </div>
     <div class="col-sm-12 col-md-6 col-lg-3">
       <div class="author-square">
         <div class="square-strip-1">
           <a class="square-title" href="#">TOTAL VIEWS</a>
           <a href="#"><i class="fa tile-icon fa-eye"></i></a>
         </div>
         <div class="square-strip-2">
            <a href="#">0</a>
         </div>
       </div>
     </div>
     <div class="col-lg-1"></div>
   </div>
 </div>
<br>

<div class="container">
  <div class="row">
    <div class="col"></div>
    <div class="col-md-12">
      <table class="table table-striped">
 <thead>
   <tr>
     <th scope="col" class="text-center">#</th>
     <th scope="col" class="">Blog Title</th>
     <th scope="col" class="text-center">Date</th>
     <th scope="col" class="text-center">Stats</th>
       <th scope="col" class="text-center">Action</th>
   </tr>
 </thead>
 <tbody>
        <tbody>
          <?php
          $sql="SELECT*FROM blogs WHERE blog_author='$_SESSION[username]'";

          $query=mysqli_query($conn,$sql);
          $count_blogs=mysqli_num_rows($query);
          if($count_blogs>0){
            $post_number_counter = 0;
        while($row = mysqli_fetch_array($query)){
          $blog_id = $row['blog_id'];
          $blog_title = $row['blog_title'];
          $blog_path = $row['blog_path'];
          $blog_published_date = date('m/d/Y', $row['time']);

          $sql_blog="SELECT*FROM views WHERE blog_id='$blog_id'";
          $query_blog=mysqli_query($conn,$sql_blog);
          $count_unique_views = mysqli_num_rows($query_blog);

          $sql_blog="SELECT*FROM like_or_dislike WHERE blog_id='$blog_id'";
          $query_blog=mysqli_query($conn,$sql_blog);
          $count_unique_likes = mysqli_num_rows($query_blog);
          $post_number_counter = $post_number_counter + 1;


          echo"
          <tr>
            <th scope='row' class='text-center'>$post_number_counter</th>
            <td><a href='../blog/$blog_path' class='theme-text'>$blog_title</a></td>
            <td class='text-center text-muted'>$blog_published_date</td>
            <td class='text-center'>
            <div class='btn-group btn-group-xs' role='group' aria-label='Stats'>
              <button type='button' class='btn btn-default' title='Views' disabled><i class='fas fa-eye text-muted'> $count_unique_views</i> </button>
              <button type='button' class='btn btn-default shadow-none' title='Likes' disabled>  <i class='fas fa-thumbs-up text-muted'> $count_unique_likes </i> </button>


                  </div>
            </td>

            <td class='text-center'>
              <div class='btn-group btn-group-xs' role='group' aria-label='action'>
                        <button type='button' class='btn btn-default' title='Edit'><a href='#'><i class='fas fa-edit theme-text'></i></a></button>
                        <button type='button' class='btn btn-default delete-post-btn' data='$blog_id' title='Delete' data-toggle='modal' data-target='#delete-confim-modal'><a href='#'><i class='fas fa-trash-alt text-danger'></i></a></button>
                    </div>
            </td>
          </tr>
          ";

        }}else{
          echo"<center>No blogs posted by you!!</center>";
        }

           ?>

  </tbody>
</table>
    </div>
    <div class="col"></div>
  </div>
</div>


<div id="delete-confim-modal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header flex-column">
				<div class="icon-box">
					<i class="fas fa-times"></i>
				</div>
				<h4 class="modal-title w-100">Are you sure?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p>This blog will be permanently deleted.</p>
        <input type='hidden' id='blog_id_input_hdn' value=''>
			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-danger confirm-delete-post-button">Delete</button>
			</div>
		</div>
	</div>
</div>
  <!-- /Page Content End-->




  <!-- Bootstrap core JavaScript -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
var blogId;
$(".delete-post-btn").click(function(){
  blogId = $(this).attr("data");
  $("#blog_id_input_hdn").val(blogId);

});
$(".confirm-delete-post-button").click(function(){
  $.post("../process/delete-post.php",{blog_id: $("#blog_id_input_hdn").val()},function(data){
if(data==1){
location.reload(true);
}
  })
});
</script>
</body>

</html>
