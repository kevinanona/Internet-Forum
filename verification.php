<?php
echo "<!DOCTYPE HTML>";
echo "<HTML><BODY>";

require_once "../database.php";
//echo "*A* <br>";
//if(isset($_GET['userid']) && isset($_GET['validate'])){
	//echo "*B <br>*";
	$username = ($_GET['username']);
	$verified = mysql_fix_string ($dbcon, ($_GET['verified']));
	echo "The Username is $username<br>";
	//echo $userid;
	//echo "<br>";
	//$validate = mysql_fix_string ($dbcon, ($_GET['validate']));
	//echo "$validate <br>";
	//$verified = 0;
	$result = mysqli_query($dbcon, "SELECT * FROM Users Where username = '$username' AND verified = '$verified'");
	$num_rows = mysqli_num_rows($result);
	
	if(!num_rows){
		echo $result->num_rows;
		die("User doesnt exist");
	}
	else{
		echo "succesfully verified, go to http://weblab.salemstate.edu/~csforum/Forum/login.html to log in";
		$update = dbquery("UPDATE Users SET verified = '1' WHERE username = '$username'");
	}
	
//}

function mysql_fix_string($dbcon, $string)
{
	if (get_magic_quotes_gpc()) $string = stripslashes($string);
	return $dbcon->real_escape_string($string);
}


echo "</BODY></HTML>";


?>