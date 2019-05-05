<?php
session_start();
?>
<!DOCTYPE HTML>
<HTML>
<HEAD>
<link rel="stylesheet" type="text/css" href="stylesheet.css">
</HEAD>
<BODY>
<?php
include "header.php";
?>
<!-- Messages have a m_id, from_username, to_username, m_timestamp, m_text -->
<FORM METHOD=POST ACTION="messages.php"><TABLE align=center>
<TR><TD>Who is the recipient</TD><TD><input type=text name=receiver placeholder="Type the user's username" required></TD></TR>
<TR><TD>Message: </TD><TD><textarea rows=5 cols=50 name=message placeholder="Type your message" required></textarea></TD></TR>
<TR><TD><INPUT type=submit name=submit value="Send"></TD><TD><button onclick="mainPage()">Go back to home page</button></TD></TR>
</TABLE></FORM>

<?php

require_once "../database.php"; //connects to the database
if(isset($_POST['receiver']) && isset($_POST['message'])){ //makes sure values were received for both receiver and message

$receiver = $_POST['receiver'];
$message = $_POST['message'];
$_receiver = '' . dbescape($receiver); //sanitized
$_message = '' . dbescape($message); //sanitized

$user = $_SESSION['username']; //makes a variable of the session username to be used in a query

$userExist = mysqli_query($dbcon, "SELECT username FROM Users WHERE username = '$_receiver'"); //used to check if the receiver is a user
$row = mysqli_fetch_array($userExist); //puts the query object in an array

if($row){ //tests if the receiver is in the database
$sql = "INSERT INTO `Message`(`from_username`, `to_username`, `m_text`) VALUES ('$user','$_receiver','$_message')";
$query = mysqli_query($dbcon, $sql);

if($query){ //Used to test if the query was succesful
	header("Location: Home page.php"); //note: if user is logged in which he must be to be on this page anyways then he will be redirected to Loggedin.php
}
else{ //this else only works when there is an error with the query which there shouldnt be 
	echo "<SCRIPT> alert('Username doesnt exist'); </SCRIPT>"; 
}
}
else{ //if user doesnt exist
	echo "<SCRIPT> alert('User doesnt exist'); </SCRIPT>";
}
}
?>
<SCRIPT>
function mainPage(){ //function to direct user back to home page
	location.href = "http://weblab.salemstate.edu/~csforum/Forum/Loggedin.php";
}
</SCRIPT>
</BODY>
</HTML>
