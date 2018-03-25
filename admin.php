<?php
	require 'connection.php';
	if(isset($_POST['submit'])){
	      $errors= array();
	      $file_name = $_FILES['image']['name'];
	      $file_size =$_FILES['image']['size'];
	      $file_tmp =$_FILES['image']['tmp_name'];
	      $file_type=$_FILES['image']['type'];
	      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
	      $extensions= array("jpeg","jpg","png");
	      
	      if(in_array($file_ext,$extensions)=== false){
		 $errors[]="extension not allowed, please choose a JPEG or PNG file.";
	      }
	      
	      if($file_size > 2097152){
		 	$errors[]='File size must be exactly 2 MB';
	      }

	      $title= $_POST["title"];
	      $desc= $_POST["description"];
	      $query = "insert into images(image_title,image_name,description) values(:title,:name,:desc)";
	      $q= $conn->prepare($query);

	      if(empty($errors)==true){
		 $target_dir = "img/";
		 if(move_uploaded_file($file_tmp,$target_dir . $file_name)){
			if($q->execute(array('title'=> $title, 'name'=> $target_dir . $file_name, 'desc'=> $desc))){	
				echo "Success";
			}
		 }
	      }else{
		 print_r($errors);
	      }
	}
	$conn = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tanna Enterprise</title>

    <!-- Bootstrap Core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]-->
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <!--[endif]-->

</head>
<body>
	<div class="header ">
		<div class="text-vertical-center">
			<div class="container">
				<div class="row">
					<div class="col-lg-7">
						

					</div>
					<div class="col-lg-5 col-xs-12">
						<h2>Upload</h2>
						<form action="admin.php" method="post" enctype="multipart/form-data" >
					      	<table>
					      		<tr>
					      			<td><label><h3>Title: </h3></label> </td><td><input type="text" name="title"></td>
					      		</tr>
					      		
						 		<tr>
						 			<td><label><h3>Description: </h3></label> </td> <td><textarea name="description" rows="5"  maxlength="600"></textarea></td>
						 		</tr>
						 		<tr>
					        		<td><label><h3>File: </h3></label> </td> <td><label class="btn btn-file  btn-primary">
										<span class="glyphicon glyphicon-folder-open">
										</span>&nbsp;&nbsp; Browse<input type="file" name="image" style="display: none;">
										</label></td>
								</tr>	
					        	<tr>
					        		<td></td><td><input type="submit" name="submit" class="btn btn-dark"/></td>
					        	</tr>
					        </table>
						</form>
						<br> <br>
					</div>
				</div>
			</div>
		</div>
	</div>	
	<div id="myModal" class="modal fade">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	                <h4 class="modal-title">Login</h4>
	            </div>
	            <div class="modal-body">
	                <form>
	                    <div class="form-group">
	                        <input type="text" class="form-control" placeholder="Name">
	                    </div>
	                    <div class="form-group">
	                        <input type="password" class="form-control" placeholder="Password">
	                    </div>
	                    <button type="submit" class="btn btn-dark">Login</button>
	                </form>
	            </div>
	        </div>
	    </div>
	</div>
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function(){
			$("#myModal").modal('show');
		});
	</script>
</body>
</html>
