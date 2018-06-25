<?php
require_once "login_db.php";
if((isset($_POST['loginForm'])) || isset($_POST['registerForm']))
{
    //run the login or the registration code accordingly
    if(isset($_POST['loginForm']))
    {
        //run the login code
        //error array: trap error messages
        $errorLogin=array();
        //initiate all variables
        $regNo=$password="";
        $regNo=validateString($_POST['inputRegNo']);
        $password=validateString($_POST['inputPassword']);
        $queryLogin="select * from tb_users where regNo='$regNo'";
        $result_queryLogin=mysqli_query($conn,$queryLogin) or die(mysql_error());
        if(!$result_queryLogin){echo "Database Access Failed";}
        $row=mysqli_fetch_row($result_queryLogin);
        // $row[0]=userID;$row[1]=name;$row[2]=nationalID;$row[3]=school;
        //$row[4]=regNo;$row[5]=phone;$row[6]=password;
        $oldpass=$row[6];
        if($oldpass == $password)
        {
            //if both passwords match -> login
            session_start();
            $_SESSION['userID']=$row[0];
            $_SESSION['customername']=$row[1];
            $_SESSION['nationalID']=$row[2];
            $_SESSION['school']=$row[3];
            $_SESSION['regNo']=$row[4];
            $_SESSION['phoneNo']=$row[5];
            // $_SESSION['userIP']=$userIP;
            // print_r($_SESSION);
            header('location:votingpage.php');

        }
        else
        {
            // $errorLogin[]="Invalid Username/Password combination";
            echo "<script type='text/javascript'> alert('Invalid Username/Password combination');</script>";
        }
    }
    elseif(isset($_POST['registerForm']))
    {
        //run the registration code
        //error array(): trap error messages
        $errorReg=array();
        //initiate all variables 
        $customerName=$nationalID=$school=$regNo=$phoneNo=$password="";
        $regNo=validateString($_POST['inputRegNo']);
        $school=validateString($_POST['school']);
        //check if registration number is valid
        //TODO: ADD DETAILS TO THE REGISTRATION TABLE
        $queryReg="select * from tb_registration where regNo='$regNo' && school_id='$school'";
        $result_queryReg=mysqli_query($conn,$queryReg) or die(mysql_error());
        if(!$result_queryReg){echo "Database Access Failed";}
        if(mysqli_num_rows($result_queryReg)==1)
        {
            //user is a valid student of TUK
            $regNo=validateString($_POST['inputRegNo']);
            $school=validateString($_POST['school']);
            $customerName=validateString($_POST['inputName']);
            $nationalID=validateString($_POST['inputIDNo']);
            $phoneNo=validateString($_POST['inputPhoneNo']);
        }
        else
        {
            //user is not a registered TUK student
            $errorReg[]="Confirm your account details with the system administrator";
        }
        //validating the passwords
        if($_POST['inputPassword'] != $_POST['inputConfirmPassword'])
        {
            //passwords dont match
            $errorReg[]="passwords don\'t match";
        }
        elseif($_POST['inputPassword'] == $_POST['inputConfirmPassword'])
        {
            //passwords match
            $password=validateString($_POST['inputPassword']);
        }
        
        if(empty($errorReg))
        {
            //if no error messages..store details to the database
            $queryInsert="insert into tb_users(name,nationalID,school,regNo,phone,password)
                           values('$customerName','$nationalID','$school','$regNo','$phoneNo','$password')";
            $result_queryInsert=mysqli_query($conn,$queryInsert) or die(mysql_error());
            echo "<script type='text/javascript'>alert('Registration Successful!');</script>";
            // header('location: old.html');
        }
        else
        {
            //print out the error messages
            foreach($errorReg as $item)
            {
                echo "<script type='text/javascript'>alert('$item');</script>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>TUK Voting System</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
	<!--CSS STYLING -->
	<link href="includes/css/styles.css" rel="stylesheet" type="text/css">
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
	        			<li><a href="#">Log In</a></li>
	        			<li><a href="index.php">Results</a></li>
	        			<li><a href="#">Candindates</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="votingpage.php">Vote Now!</a></li>
	        		</ul>
	        	</nav>
            </div>
            <!-- end navBar -->
            </navBar>
            <section>
            <div id="contentLeft">
            	<p>Welcome, <?php getUser();?></p>
            </div><!-- end contentLeft -->
            	<div id="contentRight">
            		<div id="contentRight-left">
            			<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" autocomplete="off">
            				<fieldset>
            					<legend id="textgreen">Sign in to your account:</legend>
            					<p id="textgray">Please enter your username and password to log in</p>
            					<input type="text" name="inputRegNo" class="form-input" 
            					    placeholder="Registration Number" style="width: 100%;" required autofocus><br><br>
            					<input type="password" name="inputPassword" class="form-input" placeholder="Password" style="width: 100%;" required><br><br>
            					<a href="#" class="green">Forgot my password?</a>
            					<input type="submit" value="Login" class="submitButton" name="loginForm" style="float: right;"><br>
<!--             					<p>Don't have an account yet?<a href="" class="green"> Create an account</a></p>
 -->            					<!-- <button type="submit">Log-In</button> -->
            				</fieldset>
            			</form>
            		</div><!-- end contentRight-left -->
            		<div id="contentRight-right">
            			<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" autocomplete="off">
            				<fieldset>
            					<legend id="textgreen">Register a new account:</legend>
            					<p id="textgray">Enter your account details below</p>
            					<input type="text" name="inputName" class="form-input" placeholder="Student Name" style="width: 100%;"  required autofocus><br><br>
								<input type="text" name="inputIDNo" class="form-input" placeholder="National ID Number" style="width: 100%;"  required ><br><br>
                                <select name="school" size="1">
                                    <option>Select  Your School</option>
                                    <?php
                                        $querySch="select * from tb_schools";
                                        $result_querySch=mysqli_query($conn,$querySch);
                                        while($row_schools=mysqli_fetch_array($result_querySch))
                                        {
                                            $school_id=$row_schools['school_id'];
                                            $school_title=$row_schools['school_title'];
                                            echo "<option value='$school_id'>$school_title</option>";
                                        }
                                    ?>
                                </select><br><br>
								<input type="text" name="inputRegNo" class="form-input" placeholder="Registration Number" style="width: 100%;"  required><br><br>
								<input type="text" name="inputPhoneNo" class="form-input" placeholder="Phone Number" style="width: 100%;" value="<?php if(isset($errorReg)){echo $_POST['inputPhoneNo'];}?>" required><br><br>
								<input type="password" name="inputPassword" class="form-input" placeholder="Password" style="width: 100%;"  required><br><br>
								<input type="password" name="inputConfirmPassword" class="form-input" placeholder="Confirm Password" style="width: 100%;"  required><br><br>
								<input type="checkbox" checked="true">I agree to the terms &amp; conditions								
								<input type="submit" value="Register" class="submitButton" name="registerForm" style="float: right;"><br>
								<p>Already have an account?<a href="#" class="green"> Log-in</a></p>
            				</fieldset>
            			</form>
            		</div><!-- end contentRight-right-->
            	</div><!-- end contentRight -->
            </section>
        </div><!--end holder -->
        
    </div><!--end main-container -->
    <footer>
    	<p>Copyright&copy2016</p>
    </footer><!-- end footer -->
</body>
</html>