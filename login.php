<?php
session_start();
?>

<?php
require_once "../database.php";

echo "<!DOCTYPE html>";
echo "<HTML><BODY>";

if(isset($_POST['username']) && isset($_POST['password'])){
echo "*A* <br>";
$username = $_POST['username'];
$_username = dbescape($username);
//echo " username is $_username";
echo "<br>";
$password = $_POST['password'];
//echo "The password entered was $password";
echo "<br>";

$checkUsernameExists = dbquery("SELECT * FROM Users WHERE username = '$_username'");
$checksPasswordExists = dbquery("SELECT password FROM Users WHERE password = '$password'"); //this isnt right, check for password being in the db
$checksvalidation = dbquery("SELECT verified FROM Users WHERE username = '$_username' AND verified = '1'");
$num_rows1 = mysqli_num_rows($checkUsernameExists);
$num_rows2 = mysqli_num_rows($checksvalidation);

if(!$num_rows1){
	echo "*B*";
	die("Username not found");
}
	
$result = mysqli_query($dbcon, "SELECT password FROM Users WHERE username = '$_username'");
		while ($row = mysqli_fetch_array($result)) 
		{
			$text = $row['password'];  
		}
		//checks for password
		$passhash = $text;//passhash($password);
		$passtest = passtest ($password, $passhash);
		if(!$passtest){
			die('Bad Password ' . mysqli_error());
		}
	
		//check for validation
//$numberValidation = $checksValidation->num_rows;
//echo $numberValidation;
//echo "<br>";
		
if(!$num_rows2){
	echo "*G* <br>";
	die("Not validated");
}
		
//start session stuff

			
$_SESSION['username'] = $_username;
echo "*E*";	
header("Location: Loggedin.php");
exit;

echo "*F*";
	

}


echo "</BODY></HTML>"
?>