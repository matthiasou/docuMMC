<?php
/**
 * Created by PhpStorm.
 * User: Lola
 * Date: 02/12/14
 * Time: 15:16
 */
?>

<html>
<head>
    <title>My Form</title>
</head>
<body>

<?php echo validation_errors(); ?>

<?php echo form_open('form'); ?>

<h5>Login</h5>
<input type="text" name="username" value="" size="50" />

<h5>Password</h5>
<input type="text" name="password" value="" size="50" />

<div><input type="submit" value="Submit" /></div>

</form>

</body>
</html>