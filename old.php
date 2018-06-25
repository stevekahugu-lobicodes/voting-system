<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
	#form-radio{
		height: 20px;
		width: 20px;
	}
	</style>
</head>
<body>
<div id='main'>
<form method="post" action="" autocomplete="off">
	<table >
        <tr>
            <th>IMAGE</th>
            <th>CANDIDATE NAME</th>
            <th>RADIO BUTTON</th>
        </tr>
        <tr>
            <td><img src="images/tuk.png" style="width:180px;height:100px;"></td>
            <td><b>TECHNICAL UNIVERSITY OF KENYA</b></td>
            <td><center><input type="radio" id="form-radio" name="candidate" value="1"></center></td>
        </tr>
        <tr>
            <td><img src="images/tuk.png" style="width:180px;height:100px;"></td>
            <td>TECHNICAL UNIVERSITY OF MOMBASA</td>
            <td><center><input type="radio" id="form-radio" name="candidate" value="1"></center></td>
        </tr>
    </table>
</form><!--end form-->
</body>
</html>