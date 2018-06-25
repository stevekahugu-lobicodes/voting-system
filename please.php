<!DOCTYPE html>
<html>
<body>

<?php
// Variable to check
$email = "john.doeexample";

// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    echo("$email is a valid email address");
} else {
    echo("$email is not a valid email address");
}
?>

</body>
</html>
<?php
$evans=array();
$evans="my name is skrillex";
echo "<script>alert('$evans');</script>";

?>