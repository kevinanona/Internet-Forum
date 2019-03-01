<?php
session_start();
?>

<?php
require_once "../database.php";
echo "<!DOCTYPE HTML>";
echo "<HTML><BODY>";
echo "*A*";

if(isset($_POST['title']) && isset($_POST['description']) && isset($_POST['subject']) && isset($_POST['tag'])){
echo "*B*";
$title = $_POST['title'];
$_title = dbescape($title);
$description = $_POST['description'];
$_description = dbescape($description);
$subject = $_POST['subject'];
$_subject = dbescape($subject);
$tag = $_POST['tag'];
$_tag = dbescape($tag);
	
//get the username of the person logged in, as in session username
//$username = $_SESSION['username'];
echo $_SESSION['username'];
$username = $_SESSION['username'];


//figure out subject id
$findSubjectID = mysqli_query($dbcon, "SELECT s_id FROM Subject WHERE s_title = '$_subject'");
$resultID = mysqli_fetch_row($findSubjectID); //fetches the ID from the database of the subject that the user entered
echo "The result ID is ";
echo $resultID['s_id'];
$resultAsString = $resultID[0]; //the data was fetched as an array, this turns it into a string to be used in the query
	
echo "*C*";	
//the insert query
echo "*D*";
mysqli_query($dbcon, "INSERT INTO `Forum`(`creator_username`, `f_title`, `f_text`, `forum_subject_id`, `tag`) VALUES ('$username','$_title','$_description','$resultAsString','$_tag')");

echo "*E*";
header("Location: Loggedin.php");
exit;
	
}


echo "</BODY></HTML>";
?>