
<?php
require_once "../database.php";

$sql = '
SELECT f_id, creator_username, f_title, f_text, s_title, tag 
FROM Forum, Subject 
WHERE Forum.forum_subject_id = Subject.s_id 
ORDER BY f_timestamp DESC';
$query = mysqli_query($dbcon , $sql);
$f_id = array();
$usernameCol = array();
$titleCol = array();
$subjectCol = array();
$tagCol = array();
$descriptionCol = array();
$num_rows = mysqli_num_rows($query);

while($row = mysqli_fetch_array($query)){
    $f_id[] = $row['f_id'];
    $usernameCol[] = $row['creator_username'];
    $titleCol[] = '' . $row['f_title'];
    $subjectCol[] = $row['s_title'];
    $tagCol[] = $row['tag'];
    $descriptionCol[] = $row['f_text'];

}	//puts each row of the Forum table into a separate index in an array called $row

if($num_rows > 7){ //sets the limit of the variable to 7 so that if there are more than 7 forums the website wont display all of them and only shows up to the 7 most recent posts
	$num_rows = 7;
}

//*note* the $row variable is an array with ordered values by index representing f_title then f_text then s_title then tag
echo "<DIV id=forumsContainer>";
echo "<h2>Recent Forums</h2>";
for($i = 0; $i< $num_rows; $i++){
    $nameOfForum = $titleCol[$i];
echo	"<DIV id=\"$titleCol[$i]\" onclick=\"displayComment('' . $nameOfForum)\" class=forums>";
//echo	"<DIV id=\"$titleCol[$i]\" class=forums>";


echo		"<DIV class=creatorUsername> $usernameCol[$i]</DIV>	";
echo		"<DIV class=forumTitle> Title: $titleCol[$i]</DIV>";
echo		"<DIV class=subjectAndTag><DIV class=innerSubjectAndTag> $subjectCol[$i] $tagCol[$i]</DIV></DIV>";
echo		"<DIV class=forumDescription> $descriptionCol[$i]"; ?>
    <FORM METHOD="GET" ACTION="comment.php">
        <input type="submit" value=<?php echo "\"$f_id[$i]\""; ?> name="forumID">
    </FORM>

<?php
echo "</DIV>"; //this DIV closes the forumDescription DIV
echo	"</DIV>";

//print_r($usernameCol); testing
}

echo "</DIV>"; //closes forumsContainer

?>
<div onclick="displayComment(23)" id="testing">s</div>
<script>
    function displayComment(str) {
        //str = name.toString();
        document.getElementById("testing").innerHTML = str;

    }

//   document.getElementById("kevin").onclick = function() {
//       string = document.getElementById("kevin").value;
//       document.getElementById("testing").innerHTML = string;
//   }

</script>
