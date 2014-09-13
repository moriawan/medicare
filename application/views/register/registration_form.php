<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Register</title>
</head>

<?php echo validation_errors(); ?>

<?php echo form_open('register/start') ?>

	<label for="title">F Name</label> 
	<input type="input" name="fname" /><br />

	<label for="title">L Name</label> 
	<input type="input" name="lname" /><br />
    <label for="title">Password</label> 
	<input type="input" name="pass" /><br />
    <label for="title">Email</label> 
	<input type="input" name="email" /><br />
    <label for="title">Mobiles</label> 
	<input type="input" name="mobile" /><br />
	
	<input type="submit" name="submit" value="Create news item" /> 

</form>


<body>
</body>
</html>