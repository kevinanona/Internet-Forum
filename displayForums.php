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
$titleCol[] = $row['f_title'];
$subjectCol[] = $row['forum_subject_id'];
$tagCol[] = $row['tag'];
$descriptionCol[] = $row['f_text'];

}	//puts each row of the Forum table into a separate index in an array called $row

//while($row1 = mysqli_fetch_array($query)){


//}
//while($row2 = mysqli_fetch_array($query)){


//}
//while($row3 = mysqli_fetch_array($query)){


//}
//while($row4 = mysqli_fetch_array($query)){


//}

//*note* the $row variable is an array with ordered values by index representing f_title then f_text then forum_subject_id then tag
echo $usernameCol[0];
echo "<br>";
echo $titleCol[0];
echo "<br>";
echo $subjectCol[0];
echo "<br>";
echo $tagCol[0];
echo "<br>";
echo $descriptionCol[0];
echo "<br>";
echo "everything below is the divs";
echo "<DIV id=forumsContainer>";
echo	"<DIV class=forums>";
 

echo		"<DIV class=creatorUsername> $usernameCol[0]";
echo		"</DIV>	";
echo		"<DIV class=forumTitle> Title: $titleCol[0]";
echo		"</DIV>";
echo		"<DIV class=subjectAndTag> Subject: $subjectCol[0] , Tag: $tagCol[0]";
echo		"</DIV>";
echo		"<DIV class=forumDescription> $descriptionCol[0] ";
echo		"</DIV>";


//this is the current version --------------------------------------------------------------------------
echo	"</DIV>";

echo	"<DIV class=forums>";
echo		"<DIV class=creatorUsername> $usernameCol[1]";
echo		"</DIV>	";
echo		"<DIV class=forumTitle> Title: $titleCol[1]";
echo		"</DIV>";
echo		"<DIV class=subjectAndTag> Subject: $subjectCol[1] , Tag: $tagCol[1]";
echo		"</DIV>";
echo		"<DIV class=forumDescription> $descriptionCol[1] ";
echo		"</DIV>";


echo	"</DIV>";

echo	"<DIV class=forums>";
echo		"<DIV class=creatorUsername> $usernameCol[2]";
echo		"</DIV>	";
echo		"<DIV class=forumTitle> Title: $titleCol[2]";
echo		"</DIV>";
echo		"<DIV class=subjectAndTag> Subject: $subjectCol[2] , Tag: $tagCol[2]";
echo		"</DIV>";
echo		"<DIV class=forumDescription> $descriptionCol[2] ";
echo		"</DIV>";


echo	"</DIV>";

echo 	"<DIV class=forums>";
echo		"<DIV class=creatorUsername> $usernameCol[3]";
echo		"</DIV>	";
echo		"<DIV class=forumTitle> Title: $titleCol[3]";
echo		"</DIV>";
echo		"<DIV class=subjectAndTag> Subject: $subjectCol[3] , Tag: $tagCol[3]";
echo		"</DIV>";
echo		"<DIV class=forumDescription> $descriptionCol[3] ";
echo		"</DIV>";


echo	"</DIV>";
echo "</DIV>";

?>

</BODY></HTML>