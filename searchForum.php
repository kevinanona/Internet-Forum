
<?php
include 'header.php';
require_once '../database.php';
echo '*A*';
if (isset($_GET['subjectTitle'])) {
    $s_title = $_GET['subjectTitle'];
    echo $s_title;
    $sql = '
SELECT f_id, creator_username, f_title, f_text, s_title, tag 
FROM Forum, Subject 
WHERE Forum.forum_subject_id = Subject.s_id
AND s_title = "' . $s_title . '"
ORDER BY f_timestamp DESC';
    $query = mysqli_query($dbcon , $sql);
    $f_id = array();
    $usernameCol = array();
    $titleCol = array();
    $subjectCol = array();
    $tagCol = array();
    $descriptionCol = array();
    $num_rows = mysqli_num_rows($query);
    echo ' "' .$s_title. '"'; //testing

    while($row = mysqli_fetch_array($query)){
        $f_id[] = $row['f_id'];
        $usernameCol[] = $row['creator_username'];
        $titleCol[] = '' . $row['f_title'];
        $subjectCol[] = $row['s_title'];
        $tagCol[] = $row['tag'];
        $descriptionCol[] = $row['f_text'];

    }	//puts each row of the Forum table into a separate index in an array called $row
    ?>
<div id="selectedForumInfo">
    <div class="f_creator">
        <?php echo "Creator: $usernameCol[0]";?>
    </div>
    <div class="f_title">
        <?php echo "$titleCol[0]";?>
    </div>
    <div class="f_text">
        <?php echo "$descriptionCol[0]";?>
    </div>
</div>
    <!-- div for creating comments -->
    <div class="newComment">
        <form METHOD="POST" ACTION="comment.php?forumID=<?php echo "$f_id"; //this ACTION resends the forum ID parameter to the page so as to still display the forum being looked at?>">
            <textarea placeholder="Contribute to the discussion.." id="comment" name="comment" required
                <?php if(empty($_SESSION['username'])){echo "onclick=\"noComment()\"";}?>></textarea>
            <input type="submit" id="submitComment">
        </form>
    </div>
    <?php
    //inserts the entered comment
    if(isset($_POST['comment'])){
        if(isset($_SESSION['username'])){
            $newComment = $_POST['comment'];
            $username = $_SESSION['username'];
            $sql = 'INSERT INTO Comments (comment_forum_id, creator_username, comment_text) VALUES (\'' . $f_id . '\',\'' . $username . '\',\'' . $newComment . '\')';
            $query = mysqli_query($dbcon, $sql);
        }
        else {
            echo "<script>noComment()</script>";
        }
    }
    ?>

    <?php

    //query successfully retrieves count based on forum ID
    $sql = 'SELECT COUNT(c_id) AS "Comment Count"
FROM Comments
WHERE comment_forum_id = ' . $f_id . '
GROUP BY comment_forum_id';

    $query = mysqli_query($dbcon, $sql);

    $commentCount = mysqli_fetch_row($query);
    //echo "comment count is $commentCount[0]"; //used for testing

    ?>
    <div class="commentContainer">
        <?php
        for($i = 0; $i < $commentCount[0]; $i++){ //this loop keeps creating DIV blocks for each comment?>
            <div class="comment">
                <div class="c_creator">
                    <!-- Comment Creator -->
                    <?php echo "Comment creator: $commentCreator[$i]"; ?>
                </div>
                <div class="c_text">
                    <!-- Comment Text -->
                    <?php echo "$commentText[$i]"; ?>
                </div>
            </div>
        <?php } //this page block just to close the for loop ?>
    </div>
<?php
    }
else {
    echo "No subject selected";
}
?>
