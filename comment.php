<!DOCTYPE HTML>
<HTML><BODY>
<?php
/**
 * Created by PhpStorm.
 * User: k_ell
 * Date: 3/28/2019
 * Time: 5:31 PM
 */

require_once "../database.php";
//query
$sql = '
SELECT parent_comment_id, comment_forum_id, creator_username, comment_text, c_timestamp
FROM Comments 
ORDER BY c_timestamp';
$query = mysqli_query($dbcon, $sql); //performs query
$num_rows = mysqli_num_rows($query);

$creatorUsername = array(); //array where all the comment creators will be held
$commentText = array(); //array where all the comments will be held
$timestamp = array();

while($row = mysqli_fetch_array($query)) { //loop that sets the value of every column to it's array
    $creatorUsername[] = $row['creator_username'];
    $commentText[] = $row['comment_text'];
    $timestamp[] = $row['c_timestamp'];
}

echo "<div class='commentContainer'>";
for ($i=0;$i<$num_rows; $i++) {

    echo	"<DIV  class='comments'>";


    echo		"<DIV class=commentCreator> $creatorUsername[$i]";
    echo		"</DIV>	";
    echo		"<DIV class=commentText> $commentText[$i]";
    echo		"</DIV>";
    echo		"<DIV class=timestamp> $timestamp[$i] ";
    echo		"</DIV>";

    echo	"</DIV>";

}
echo "</div>";


?>
</BODY></HTML>
