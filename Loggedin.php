<?php
include "header.php"; //file has the navigation bar to be included into every logged in page
//require_once "../database.php";
//if statement not working, header wont send location
if(isset($_SESSION['username']) != 0){
//echo "Youre logged in as ";
//echo $_SESSION['username'];
}
else{
header("Location: Home page.php"); //redirect not working
//die("You're not Logged in");	
//echo "No username";
}
?>
	<DIV id=userMenu>
	<?php //code that displays user menu needs to get user info from database so its put inside php tags
	require_once "../database.php";
	echo "<div style=\"text-align: center;\">" . $_SESSION['username'] . "</div>";
	
	echo "<DIV contenteditable=false id=userBio>";
	//sql query to get the users bio, might scratch this feature
	$user = $_SESSION['username'];
	$query = mysqli_query($dbcon, "SELECT bio FROM Users WHERE username = '$user'");
	$row = mysqli_fetch_array($query);
	$result = $row['bio'];
	echo "<div style=\"text-align: center;\">" . $result . "</div>"; //displays the users bio
	
	echo "</DIV>";
	?>
	<button class=button id=bioButton onclick="editBio()">Edit Bio</button> <button class=button id=userForums>View Created Forums</button>
	
	</DIV>
<DIV style="float: left;" id=txtHint>
</DIV>
<?php
include "displayForums.php"; //realized I could include the code from displayForums.php instead of having to call the file by using AJAX
?>
<SCRIPT>//displayForums();//script that calls the function to display forums</SCRIPT>
<SCRIPT>
    //Javascript function lets user edit their bio but it is not finished as the new bio is not saved in the database, might scratch feature
function editBio(){
	if(document.getElementById("userBio").contentEditable == "false"){
	document.getElementById("userBio").contentEditable = "true"; //Lets the user edit their bio straight on the div in which it exists
	}
	else{
	document.getElementById("userBio").contentEditable = "false";
	
	}
}
</SCRIPT>
</BODY>
<HTML>
