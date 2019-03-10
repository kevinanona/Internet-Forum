<!DOCTYPE HTML>
<HTML>
<HEAD>
<LINK rel="stylesheet" type="text/css" href="stylesheet.css">
<SCRIPT>
	function redirectToLogin(){
		window.location.href = "http://weblab.salemstate.edu/~csforum/Forum/login.html";
	}
	function redirectToRegister(){
		window.location.href = "http://weblab.salemstate.edu/~csforum/Forum/login.html";
	}
</SCRIPT>
<HEAD>
<BODY>



<?php
//make it so that emails have to have the right syntax

require_once "../database.php"; //connects to the database
if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])){
//dbescape sanitizes every variables to prevent sql injections
$firstname = $_POST['firstname'];
$_firstname = dbescape($firstname);
$_firtname = '' . $_firstname;
$lastname = $_POST['lastname'];
$_lastname = dbescape($lastname);
$_lastname = ''. $_lastname;
$username = $_POST['username'];
$_username = dbescape($username);
$_username = '' . $_username;
$email = $_POST['email'];
$_email = dbescape($email);
$_email = ''. $_email;
$password = $_POST['password'];
$passhash = passhash($password); //dbescape the password for now, in the future change to hashing
$date = date();

//checks the username is unique
$checkUsername = dbquery("SELECT * FROM Users WHERE 'username' = '$_username'");
if($checkUsername->num_rows != 0){
	die("Username already exists");
}
//checks the email is unique
$checkEmail = dbquery("SELECT * FROM Users WHERE 'email' = '$_email'");
if($checkEmail->num_rows != 0){
	die("There is already an account with this email");
}


//query to insert a new user
dbquery("INSERT INTO Users SET username = '$_username', firstname = '$_firstname', 
lastname = '$_lastname', email = '$_email', password = '$passhash'");
	
//$dbcon -> insert_id;
//$userid =  $dbcon -> insert_id;
//$_email = "k_elloco@hotmail.com"; was for testing purposes
$theurl = "http://weblab.salemstate.edu/~csforum/Forum/verification.php?username=$_username";
mail($_email, "Verification Link", $theurl);
echo "Please check email for verification link <br>";
echo "URL: http://weblab.salemstate.edu/~csforum/Forum/login.html";
}
else{
	echo "Invalid Information"; //code shouldnt get to this else statement because javascript already checks that the user has inputed values in each textbox
}
?>
<center><button onclick="redirectToRegister()">Return to Register screen</button><button onclick="redirectToLogin()">Return to Log in screen</button></center>

</BODY>
</HTML>

