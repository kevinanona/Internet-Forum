
<?php
include 'header.php';
require_once '../database.php';
if (isset($_GET['subjectTitle'])) {
        $s_title = $_GET['subjectTitle'];
        $sql = '
SELECT f_id, creator_username, f_title, f_text, s_title, tag 
FROM Forum, Subject 
WHERE Forum.forum_subject_id = Subject.s_id
AND s_title = "' . $s_title . '"
ORDER BY f_timestamp DESC';
        $query = mysqli_query($dbcon, $sql);
        //put the code inside an if statement to check if the result even exists and if there are no rows then do something else
        $resultsExist = mysqli_num_rows($query);

        if ($resultsExist != 0) { // If a forum was found create arrays to store the query's columns
        $f_id = array();
        $usernameCol = array();
        $titleCol = array();
        $subjectCol = array();
        $tagCol = array();
        $descriptionCol = array();
        $num_rows = mysqli_num_rows($query);
        //echo ' "' .$s_title. '"'; //testing

        while ($row = mysqli_fetch_array($query)) { // Fills in the arrays
            $f_id[] = $row['f_id'];
            $usernameCol[] = $row['creator_username'];
            $titleCol[] = '' . $row['f_title'];
            $subjectCol[] = $row['s_title'];
            $tagCol[] = $row['tag'];
            $descriptionCol[] = $row['f_text'];

        }

            //*note* the $row variable is an array with ordered values by index representing f_title then f_text then s_title then tag
            echo "<DIV id=forumsContainer>";
            echo "<h2>Recent Forums</h2>";
            for($i = 0; $i< $num_rows; $i++){
                $nameOfForum = $titleCol[$i];
                echo	"<DIV id=\"$titleCol[$i]\" onclick=\"displayComment('' . $nameOfForum)\" class=forums>";
                //echo	"<DIV id=\"$titleCol[$i]\" class=forums>";


                echo	"<DIV class=creatorUsername> $usernameCol[$i]</DIV>	";
                echo	"<DIV class=forumTitle> Title: $titleCol[$i]</DIV>";
                echo	"<DIV class=subjectAndTag><DIV class=innerSubjectAndTag> $subjectCol[$i] $tagCol[$i]</DIV></DIV>";
                echo	"<DIV class=forumDescription> $descriptionCol[$i]"; ?>
                <FORM METHOD="GET" ACTION="comment.php">
                    <input type="submit" value=<?php echo "\"$f_id[$i]\""; ?> name="forumID">
                </FORM>

                <?php
                echo "</DIV>"; //this DIV closes the forumDescription DIV
                echo	"</DIV>";

            }

            echo "</DIV>"; //closes forumsContainer
    }
    else {
        echo "There are Currently no forums with this subject";
    }
}
else {
    echo "No subject selected";
}
?>
