<!DOCTYPE HTML>
<HTML><BODY>


<?php
require_once "../database.php";

$sql = "SELECT creator_username, f_title, f_text, s_title, tag FROM Forum, Subject WHERE Forum.forum_subject_id = Subject.s_id ORDER BY f_timestamp DESC";
$query = mysqli_query($dbcon , $sql);
$usernameCol = array();
$titleCol = array();
$subjectCol = array();
$tagCol = array();
$descriptionCol = array();
$num_rows = mysqli_num_rows($query);

while($row = mysqli_fetch_array($query)){
$usernameCol[] = $row['creator_username'];
$titleCol[] = $row['f_title'];
$subjectCol[] = $row['s_title'];
$tagCol[] = $row['tag'];
$descriptionCol[] = $row['f_text'];

}	//puts each row of the Forum table into a separate index in an array called $row

if($num_rows > 7){ //sets the limit of the variable to 5 so that if there are 20 forums the website wont display all 20 and only shows up to the 5 most recent posts
	$num_rows = 7;
}

//*note* the $row variable is an array with ordered values by index representing f_title then f_text then s_title then tag
echo "<DIV id=forumsContainer>";

for($i = 0; $i< $num_rows; $i++){

echo	"<DIV class=forums>";
 

echo		"<DIV class=creatorUsername> $usernameCol[$i]";
echo		"</DIV>	";
echo		"<DIV class=forumTitle> Title: $titleCol[$i]";
echo		"</DIV>";
echo		"<DIV class=subjectAndTag><DIV class=innerSubjectAndTag> $subjectCol[$i] $tagCol[$i]";
echo		"</DIV></DIV>";
echo		"<DIV class=forumDescription> $descriptionCol[$i] ";
echo		"</DIV>";

echo	"</DIV>";
}

echo "</DIV>";

?>

</BODY></HTML>