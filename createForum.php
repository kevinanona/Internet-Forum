<?php
session_start();
?>

<?php
require_once "../database.php";
echo "<!DOCTYPE HTML>";
echo "<HTML><BODY>";

//Makes sure the variables were retrieved
if(isset($_POST['title']) && isset($_POST['description']) && isset($_POST['subject']) && isset($_POST['tag'])){
    // dbescape sanitizes all of the variables
$title = $_POST['title'];
$_title = '' . dbescape($title);
$description = $_POST['description'];
$_description = '' . dbescape($description);
$subject = $_POST['subject'];
$_subject = '' . dbescape($subject);
$tag = $_POST['tag'];
$_tag = '' . dbescape($tag);

//$username = $_SESSION['username'];
//echo $_SESSION['username'];
$username = $_SESSION['username'];
// Puts the subject ID from the selected subject into a variable
$findSubjectID = mysqli_query($dbcon, "SELECT s_id FROM Subject WHERE s_title = '$_subject'");
$resultID = mysqli_fetch_row($findSubjectID); //fetches the ID from the database of the subject that the user entered

$resultAsString = $resultID[0]; //the data was fetched as an array of the row results, this puts the first index in a variable which is the subject_id to be used in the query

//the insert query
mysqli_query($dbcon, "INSERT INTO `Forum`(`creator_username`, `f_title`, `f_text`, `forum_subject_id`, `tag`) VALUES ('$username','$_title','$_description','$resultAsString','$_tag')");

header("Location: Loggedin.php");
exit;
	
}

echo "</BODY></HTML>";
?>
