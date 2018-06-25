<?php
$message="The mail message was sent with the following mail";
$headers = "From: braincells.em@gmail.com";
mail('braincells.em@gmail.com',"Testing",$message,$headers);
echo "the test message is sent to:braincells.em@gmail.com...<br/>";

?>