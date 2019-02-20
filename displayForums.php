<!DOCTYPE HTML>
<HTML><BODY>


<?php
require_once "../database.php";

$query = mysqli_query($dbcon , "SELECT creator_username, f_title, f_text, forum_subject_id, tag FROM Forum ORDER BY f_timestamp DESC");
$usernameCol = array();
$titleCol = array();
$subjectCol = array();
$tagCol = array();
$descriptionCol = array();

while($row = mysqli_fetch_array($query)){
$usernameCol[] = $row['creator_username'];

}	//puts each row of the Forum table into a separate index in an array called $row
while($row1 = mysqli_fetch_array($query)){
$titleCol[] = $row1['f_title'];

}
while($row2 = mysqli_fetch_array($query)){
$subjectCol[] = $row2['forum_subject_id'];

}
while($row3 = mysqli_fetch_array($query)){
$tagCol[] = $row3['tag'];

}
while($row4 = mysqli_fetch_array($query)){
$descriptionCol[] = $row4['f_text'];

}

//*note* the $row variable is an array with ordered values by index representing f_title then f_text then forum_subject_id then tag
echo $usernameCol[0];
echo "<br>";
echo $titleCol[0];
echo "<br>";
echo $subjectCol[0];
echo "<br>";
echo "everything below is the divs";
echo "<DIV id=forumsContainer>";
echo	"<DIV class=forums>";
 

echo		"<DIV class=creatorUsername> $usernameCol[0]";
echo		"</DIV>	";
echo		"<DIV class=forumTitle> Title is $titleCol[0]";
echo		"</DIV>";
echo		"<DIV class=subjectAndTag> Subject is $subjectCol[0] , Tag is $tagCol[0]";
echo		"</DIV>";
echo		"<DIV class=forumDescription> Forum Description is $descriptionCol[0] ";
echo		"</DIV>";


//this is the current version --------------------------------------------------------------------------
echo	"</DIV>";

echo	"<DIV class=forums>";
echo		"<DIV class=creatorUsername> $usernameCol[1]";
echo		"</DIV>	";
echo		"<DIV class=forumTitle> This is the Title";
echo		"</DIV>";
echo		"<DIV class=subjectAndTag> Subject, Tag";
echo		"</DIV>";
echo		"<DIV class=forumDescription> Forum Description ";
echo		"</DIV>";


echo	"</DIV>";

echo	"<DIV class=forums>";
echo		"<DIV class=creatorUsername> $usernameCol[2]";
echo		"</DIV>	";
echo		"<DIV class=forumTitle> This is the Title";
echo		"</DIV>";
echo		"<DIV class=subjectAndTag> Subject, Tag";
echo		"</DIV>";
echo		"<DIV class=forumDescription> Forum Description ";
echo		"</DIV>";


echo	"</DIV>";

echo 	"<DIV class=forums>";
echo		"<DIV class=creatorUsername> $usernameCol[3]";
echo		"</DIV>	";
echo		"<DIV class=forumTitle> This is the Title";
echo		"</DIV>";
echo		"<DIV class=subjectAndTag> Subject, Tag";
echo		"</DIV>";
echo		"<DIV class=forumDescription> Forum Description ";
echo		"</DIV>";


echo	"</DIV>";
echo "</DIV>";

?>

</BODY></HTML>