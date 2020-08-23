<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
if(!isset($_SESSION['username']) && (!isset($_COOKIE['cookie_username']) && !isset($_COOKIE['cookie_session_id']))){die(header('location: ../'));}


include"../../process/conn.php";

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


  <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="../../vendor/style.css">
  <link rel="stylesheet" href="../../vendor/bootstrap/css/bootstrap-tagsinput.css">
  <script src="./ckeditor/ckeditor.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">


<style>
body{
    font-family: 'PT Sans', sans-serif;
	background:#ccc;
}
.bootstrap-tagsinput .tag{
  background: #8501A2;
  border-radius:5px;
  padding:2px 2px 2px 10px;

  margin:2px auto;
}
input{width:100%;}
</style>
</head>

<body>
  <!-- Page Content Start-->

 <div class="topnav container-fluid" style="box-shadow: 0 1px 2px 0 rgba(60,64,67,.3), 0 1px 3px 1px rgba(60,64,67,.15);height:150px;">
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
<div class="container" style="margin-top:-60px;z-index:5;border-radius:5px;background:#fff;box-shadow: 0 1px 2px 0 rgba(60,64,67,.3), 0 1px 3px 1px rgba(60,64,67,.15);padding:40px">
<span class='text-center text-muted text-uppercase'><h4>Add new blog</h4></span>
<div class="form-group">
    <label for="blog-title" class="theme-text"><h5>Title of the blog</h5></label>
    <input type="text" class="form-control shadow-none" id="blog-title" placeholder="Title of the blog">
  </div>
  <br>
  <div class="form-group">
    <label for="blog-desc" class="theme-text"><h5>Short Description</h5></label>
    <input type="text" class="form-control shadow-none" id="blog-desc" placeholder="Short Description of the blog">
  </div>
  <br>
    <div class="form-group">
    <label for="blog-thumnail" class="theme-text"><h5>Blog Thumbnail</h5></label>
     <div class="custom-file">
    <input type="file" class="custom-file-input " id="blog-thumnail">
    <label class="custom-file-label" for="blog-thumnail">Choose file</label>
  </div>
  </div>
  <br>
  <div class="form-group">
    <label for="blog-desc" class="theme-text"><h5>Write your blog here</h5></label>

            <textarea name="editor1" id="editor1">
                Your main blog content goes here...
            </textarea>

</div>
<br>
  <div class="form-group">
  <label for="blog-tags" class="theme-text"><h5>Add tags</h5></label><br>
<input type="text" id="blog-tags" class="form-control shadow-none" value=""
style="width:100%;" data-role="tagsinput"
placeholder="Add tags for post"/>
</div>

<br>
  <div class="form-group">
  <label for="blog-thumnail" class="theme-text"><h5>Select Category</h5></label><br>

    <select class="custom-select my-1 mr-sm-2" id="blog-category">
      <option>Choose...</option>
      <option value="1">Computer and Mobile Development</option>
      <option value="2">Blockchain and Cryptocurrency</option>
      <option value="3">Computer Networking and Cybersecurity</option>
      <option value="4">Automobile and Machinery</option>
      <option value="5">Data Science, AI, IOT</option>
      <option value="6">Space Science</option>
      <option value="7">Nano Technology</option>
      <option value="8">Others</option>
    </select>
</div>

  <button type="button" class="btn btn-outline-theme m-2 rounded-pill"> Save as Draft </button>
  <button type="button" class="btn btn-theme float-right m-2 rounded-pill publish-blog-button"> Publish Blog </button>
  <button type="button" class="btn btn-outline-theme float-right m-2 rounded-pill preview"> Preview </button>

</div>
<br>
<br>

  <!-- /Page Content End-->




  <!-- Bootstrap core JavaScript -->

  <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap-tagsinput.js"></script>
<script>
CKEDITOR.replace( 'editor1', {
    extraPlugins: 'easyimage',
    removePlugins: 'image',
    cloudServices_tokenUrl: 'https://74111.cke-cs.com/token/dev/9bcb3b86f0f696115142ad6a7ff14c6dd6923194a5215d855da3b0463d6b',
    cloudServices_uploadUrl: 'https://74111.cke-cs.com/easyimage/upload/'
} );

 $('.publish-blog-button').click(function(){
   var blog_body = CKEDITOR.instances.editor1.getData();


	var data = new FormData();
    data.append('blog_image', $('#blog-thumnail').prop('files')[0]);
	  data.append('blog_title', $('#blog-title').val());
    data.append('blog_desc', $('#blog-desc').val());
    data.append('blog_body', blog_body);
    data.append('blog_tags', $('#blog-tags').val());
    data.append('blog_category', $('#blog-category').val());

    $.ajax({
  xhr: function() {
    var xhr = new window.XMLHttpRequest();

    xhr.upload.addEventListener("progress", function(evt) {
      if (evt.lengthComputable) {
        var percentComplete = evt.loaded / evt.total;
        percentComplete = parseInt(percentComplete * 100);
        $('#upload_image_confirm_btn').text('Uploading...('+percentComplete+'%)');

        if (percentComplete === 100) {

        }

      }
    }, false);

    return xhr;
  },
        type: 'POST',
        processData: false,
        contentType: false,
        data: data,
        url: 'save.php',
        dataType : 'json',

        success: function(output){
          if(output==1){
            location.replace("../");
          }else{}
		}

    });



 });

</script>
			</body>

</html>
