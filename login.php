<?php
session_start();
?>

<?php
// Connects to database to be able to query the database
require_once "../database.php";

echo "<!DOCTYPE html>";
echo "<HTML><BODY>";
// Makes sure the variables needed exist
if(isset($_POST['username']) && isset($_POST['password'])){
echo "*A* <br>";
$username = $_POST['username'];
$_username = '' . dbescape($username); // Sanitizes the variable to prevent SQL injections
$password = $_POST['password'];

$checkUsernameExists = dbquery("SELECT * FROM Users WHERE username = '$_username'");
//$checksPasswordExists = dbquery("SELECT password FROM Users WHERE password = '$password'");
$checksvalidation = dbquery("SELECT verified FROM Users WHERE username = '$_username' AND verified = '1'");
$num_rows1 = mysqli_num_rows($checkUsernameExists); // Gets the number of rows from performing the select username query to see if the username given exists
$num_rows2 = mysqli_num_rows($checksvalidation);

if(!$num_rows1 || $_username == " "){ //if the username typed was a space or if the number of rows for the username returned empty then username is invalid and return to the login page
	//
	die(header("Location: http://weblab.salemstate.edu/~csforum/Forum/login.html?loginFailed=true&reason=username"));
}
	
$result = mysqli_query($dbcon, "SELECT password FROM Users WHERE username = '$_username'");
		while ($row = mysqli_fetch_array($result)) 
		{
			$text = $row['password'];  
		}
		//checks for password
		$passhash = $text;//passhash($password);
		$passtest = passtest ($password, $passhash);
		if(!$passtest){ // If invalid password, return to log in page
			die(header("Location: http://weblab.salemstate.edu/~csforum/Forum/login.html?loginFailed=true&reason=password"));
		}
		
if(!$num_rows2){ // By the time the code gets to this line it would have already checked for username and password so all thats left is validation.
				// If the variable with the number of rows for the query that selects the username with a validated value for its column is empty then the username is not validated
	die(header("Location: http://weblab.salemstate.edu/~csforum/Forum/login.html?loginFailed=true&reason=Validation"));
}

$_SESSION['username'] = $_username;
header("Location: Loggedin.php");
exit;
}
echo "</BODY></HTML>"
?>
