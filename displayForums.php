<!DOCTYPE HTML>
<HTML><BODY>


<?php
require_once "../database.php";

$query = mysqli_query($dbcon , "SELECT creator_username, f_title, f_text, forum_subject_id, tag FROM Forum");
$row = mysqli_fetch_array($query); //puts each row of the Forum table into a separate index in an array called $row

echo "<DIV id=forumsContainer>";
echo	"<DIV id=forum1>";
echo $row[0]; //prints values from the row, just testing, needs to be changed
echo $row[1];


echo	"</DIV>";

echo	"<DIV id=forum2>";



echo	"</DIV>";

echo	"<DIV id=forum3>";



echo	"</DIV>";

echo 	"<DIV id=forum4>";



echo	"</DIV>";
echo "</DIV>";

?>

</BODY></HTML>