<?php
echo "<!DOCTYPE HTML>";
echo "<HTML><BODY>";
require_once "../database.php";
echo "*A*";
if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])){
echo "*B*";
$firstname = $_POST['firstname'];
$_firstname = dbescape($firstname);
$lastname = $_POST['lastname'];
$_lastname = dbescape($lastname);
$username = $_POST['username'];
$_username = dbescape($username);
$email = $_POST['email'];
$_email = dbescape($email);
$password = $_POST['password'];
$_password = dbescape($password); //dbescape the password for now, in the future change to hashing
$date = date();

//First name does not have to be checked, does not need to be unique
//Last name does not have to be checked as it does not need to be unique
//username needs to be checked
$checkUsername = dbquery("SELECT * FROM Users WHERE 'username' = '$username'");
if($checkUsername->num_rows != 0){
	die("Username already exists");
}
//email needs to be checked
$checkEmail = dbquery("SELECT * FROM Users WHERE 'email' = '$email'");
if($checkEmail->num_rows != 0){
	die("There is already an account with this email");
}
//need to hash password-----------


//end of hash password code-------

//query to insert a new user
dbquery("INSERT INTO Users SET username = '$_username', firstname = '$_firstname', 
lastname = '$_lastname', email = '$_email', date = '$date'");
	
$dbcon -> insert_id;
$userid =  $dbcon -> insert_id;
}
echo "</BODY></HTML>";
?>