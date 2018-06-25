<?php
require_once 'db_voting.php';
session_start();
if(empty($_SESSION['customername'])){
    header("location:index.php");
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
    <link rel="stylesheet" type="text/css" href="votingpage.css">
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
            <div class="container" id="votingpagecontainer">
            	<section id="candindates">
                    <div id="contentLeft">
                        <fieldset>
                            <legend>
                                <?php getUser();?>
                            </legend>
                            <p>you vote,your choice!</p>
                        </fieldset>
                    </div><!--end contentLeft-->
                    <div id="contentRight">
                       <div id="contentRightVoteForm">
                           <fieldset>
                               <legend id="textgreen1">Please pick one candidate:</legend>
                               <form method="post" action="" autocomplete="off">
                                <table >
                                    <tr>
                                        <th id="textgreen1">Image</th>
                                        <th id="textgreen1">Candidate Name</th>
                                        <th id="textgreen1">Vote</th>
                                    </tr>
                                    <tr>
                                        <td><img src="images/sido.jpg" style="width:160px;height:90px;"></td>
                                        <td><b>SIDNEY OMONDI OCHIENG'</b></td>
                                        <td><center><input type="radio" id="form-radio" name="candidate" value="1"></center></td>
                                    </tr>
                                    <tr>
                                        <td><img src="images/phil.jpg" style="width:160px;height:90px;"></td>
                                        <td><b>KIPKEMBOI PHIL KEMEI</b></td>
                                        <td><center><input type="radio" id="form-radio" name="candidate" value="2"></center></td>
                                    </tr>
                                    <tr>
                                        <td><img src="images/stevo.jpg" style="width:160px;height:90px;"></td>
                                        <td><b>STEVEN KAHUGU NJUKI</b></td>
                                        <td><center><input type="radio" id="form-radio" name="candidate" value="3"></center></td>
                                    </tr>
                                    <tr>
                                        <td><img src="images/jose.jpg" style="width:160px;height:90px;"></td>
                                        <td><b>JOSEPH MWANGI MUGO</b></td>
                                        <td><center><input type="radio" id="form-radio" name="candidate" value="4"></center></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><center><input type="submit" id="cand1Button" name="candForm1" value="Vote for Chairman"></center></td>
                                    </tr>
                                </table>
                           </fieldset>
                        </div>
                    </div><!--end contentRight-->
            	</section>
            </div><!--end container-->
</body>
</html>
<?php
if(isset($_POST['candForm1'])){
    if(empty($_POST['candidate'])){
        echo "<script>alert('you are proceeding without voting for the chairman...');</script>";
    }else{
        echo "<script>alert('the candidate 1 form has been updated');</script>";
    }
}
?>