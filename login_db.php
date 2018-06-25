<?php
//***login details for the database administrator
$db_hostname='localhost';
$db_username='root';
$db_password='walter007';
$db_database='db_voting';

//***connecting to the database server
$conn=@mysqli_connect($db_hostname,$db_username,$db_password,$db_database) or die("could not connect to the database server");

//validating user input
function validateString($variable)
{
    return htmlentities(mysql_fix_string($variable));
}
function mysql_fix_string($variable)
{
	if(get_magic_quotes_gpc()) $variable=stripslashes($variable);
	return mysql_real_escape_string($variable);
}
function getUser()
{
	if(isset($_SESSION) && isset($_SESSION['customername']))
	{
		echo $_SESSION['customername'];
	}
	else
	{
		echo "Guest";
	}
}
function logoutUser(){
	session_start();
	$_SESSION=array();
	session_unset();
	session_destroy();
	// echo "<script type='text/javascript'> alert('please log in to view the voting page');</script>";
	header('location:index.php');
}

?>