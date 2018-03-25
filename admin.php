<?php
   include('session.php');
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
	<div class="header">
		<div class="text-vertical-center" id="main">
			<div class="container">
				<div class="row">
					<div class="pull-right">
						<ul id="topbar">
		                	<li><h3>Welcome <?php echo $user_check; ?>: <a href="logout.php" class="btn btn-primary btn-primary">Sign Out</a></h3> <h4></h4></li>
		            	</ul>
		    		</div>	
		    	</div>
			</div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-10 col-lg-offset-1">
						<div class="row">
							<div class="col-md-6 col-sm-6" id="upload" >
								<h2>Upload</h2>
								<form action="admin.php" method="post" enctype="multipart/form-data" autocomplete="off">
							      	<table>
							      		<tr>
							      			<td><label><h3>Title: </h3></label> </td><td><input type="text" name="title" autocomplete="off"></td>
							      		</tr>
							      		
								 		<tr>
								 			<td><label><h3>Description: </h3></label> </td> <td><textarea name="description" rows="5"  maxlength="600" autocomplete="off"></textarea></td>
								 		</tr>
								 		<tr>
							        		<td><label><h3>File: </h3></label> </td> <td>
												
												<input type="file" name="image[]" multiple="" id="imageupload"  class="btn btn-light btn-md" >
												</td>
										</tr>	
							        	<tr>
							        		<td></td><td><input type="submit" name="submit" class="btn btn-dark"/></td>
							        	</tr>
							        </table>
							        <output id='result'/ >
								</form>
								<br> <br>
							</div>
							<div class="col-md-6 col-sm-6" id="preview">
								
								<h2>Preview</h2>
								<div id="preview-image">
									<img src="images/blank.png">
								</div>			
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php 
		if (isset($_POST['submit']))
		{
			//require 'connection.php';
		    $title= $_POST["title"];
		    $desc= $_POST["description"];
		    $img = $_FILES["image"];

		    if (!empty($img)) {
			    $uploads_dir = 'uploads/';
			    foreach ($img["error"] as $key => $error) {
			    	$file_size =$img['size'][$key];
			    	$file_ext=strtolower(end(explode('.',$img['name'][$key])));
		    		$extensions= array("jpeg","jpg","png");
		      
				    if(in_array($file_ext,$extensions)=== true && $file_size < 2097152){
				        if ($error == UPLOAD_ERR_OK) {
				            $tmp_name = $img["tmp_name"][$key];
				            $name = $uploads_dir . md5(uniqid()) . "." . $file_ext;
				            if(move_uploaded_file($tmp_name, $name)){
				            	$name_array = $name;
				            	$value_insert[] = $name_array;
				            	$success= true;
				            }
				        }
				    }
				    else{
				    	print("Please choose a JPEG, JPG or PNG file or file size must be exactly 2 MB.");
					 	exit;
				    }
			    }

			    if($success){
			    	$values_insert = implode(',', $value_insert);
			    	$query = "insert into images(image_title,image_name,description) values(?,?,?)";
		    		$stmt= mysqli_prepare($conn,$query);
			    	$q= mysqli_stmt_bind_param($stmt, "sss", $title, $values_insert, $desc);
			    	if(mysqli_stmt_execute($stmt)){	
						print("Success! Data stored in database.");
					}
				}
				else{
					print("Oops! something is not right.. Please try again.");
				}	
			}
		}
	?>
	
	<script>
	</script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type='text/javascript' src='//code.jquery.com/jquery-1.9.1.js'></script>
	<script type="text/javascript">
		$("#imageupload").on('change', function () {
		    var countFiles = $(this)[0].files.length;
		    var imgPath = $(this)[0].value;
		    var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
		    var image_holder = $("#preview-image");
		    image_holder.empty();
		 
		    if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
		        if (typeof (FileReader) != "undefined") {
		            for (var i = 0; i < countFiles; i++) {
		                var reader = new FileReader();
		                reader.onload = function (e) {
		                    $("<img />", {
		                        "src": e.target.result,
		                            "class": "thumbimage"
		                    }).appendTo(image_holder);
		                }
		                image_holder.show();
		                reader.readAsDataURL($(this)[0].files[i]);
		            }
		        } else {
		            alert("It doesn't supports");
		        }
		    } 
		    else {
		        alert("Select only images");
		    }
		});
	</script>
</body>
</html>
