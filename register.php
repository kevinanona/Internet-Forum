<?php
//add passhash material
//make it so that emails have to have the right syntax
echo "<!DOCTYPE HTML>";
echo "<HTML><BODY>";
require_once "../database.php";
echo "*A*";
if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])){
echo "*B*";
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

$checkUsername = dbquery("SELECT * FROM Users WHERE 'username' = '$username'");
if($checkUsername->num_rows != 0){
	die("Username already exists");
}
//email needs to be checked
$checkEmail = dbquery("SELECT * FROM Users WHERE 'email' = '$email'");
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

echo "</BODY></HTML>";


?>