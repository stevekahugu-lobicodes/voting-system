<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="includes/css/styles.css" rel="stylesheet" type="text/css">
	 <link rel="stylesheet" type="text/css" href="votingpage.css">
	<link href="newcandidate.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet"> 
	<title>New Candindate</title>
</head>

<body>
<div id="main" class="container">
        <div id="holder">
        <div class="logoholder">
            <a href="#"><img src="images/tuk.png" id="logo" alt="TUK"> </a>
            <h1>TECHNICAL UNI. ONLINE VOTING SYSTEM</h1>
            </div>
            <navBar>
            <div id="navBar">
	        	<nav>
	        		<ul>
	        			<li><a href="index.php">Home</a></li>
	        			<li><a href="index.php">Results</a></li>
	        			<li><a href="#">Candindates</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="logout.php">Logout</a></li>4
	        		</ul>
	        	</nav>
            </div>
            <!-- end navBar -->
            </navBar>
<div class="cand_reg_container">
	<div class="col1">
	<fieldset>
	<legend id="legendtextcolor">Enter Candindates Details</legend>
		<form action="" method="post" enctype="multipart/form-data">
	<div class="forminput">

	<div id="upload_img">

				Browse file for upload:<br>

				<input type="File" name="File" id="img_upload" style="padding:0px;">
					

		</div><!--End upload image-->

		<input type="text" name="Firstname" placeholder="Firstname">
	</div>

	<div class="forminput">
		<input type="text" name="Surname" placeholder="Surname">
	</div>

	<div class="forminput"><!--Various schools available for the candindates to select from-->
		<input type="text" name="School" placeholder="School">
	</div>

	<div class="forminput"><!--Various schools available for the candindates to select from-->
		<input type="text" name="Post" placeholder="Post">
	</div>


	<div class="forminput">
		<input type="text" name="Registration No." placeholder="Registration No.">
	</div>

	
	</fieldset>
   
	<div id="submit">
		<input type="submit" name="submit" value="Submit">
	</div>
	</div><!--end column 1-->

	</form><!--end form-->

</div><!--End container-->
	</body>

	
</html>