<?php
include "header.php"; //file has the navigation bar to be included into every logged in page
/**
 * Created by PhpStorm.
 * User: k_ell
 * Date: 3/28/2019
 * Time: 5:31 PM
 */

require_once "../database.php";

if(isset($_GET['forumID'])){
    $f_id = $_GET['forumID']; //gets the value from the submitted form and sets it as f_id variable. Now I know the ID of the forum clicked and can use that info to display the forums comments
    ////query
    /// query to get forum and comment information
    $sql = '
    SELECT f_title, f_text, Forum.creator_username AS forum_username, parent_comment_id, comment_forum_id, Comments.creator_username AS comment_username, comment_text, c_timestamp
    FROM Comments, Forum
    WHERE Forum.f_id = Comments.comment_forum_id AND comment_forum_id = ' . $f_id . ' ORDER BY c_timestamp';
    // query to get forum information in case comments dont exist for the chosen forum
    $sql2 = '
    SELECT f_title, f_text, Forum.creator_username AS forum_username
    FROM Forum
    WHERE f_id = ' . $f_id;
    //run query
    $query = mysqli_query($dbcon, $sql);
    $query2 = mysqli_query($dbcon, $sql2);

    // Array that will hold each of the columns from the query result
    $parentComment = array();
    $commentCreator = array();
    $commentText = array();
    $forumTitle = array();
    $forumText = array();
    $forumCreator = array();

//Retrieves comment information
    while($row = mysqli_fetch_array($query)){
        //puts each column in an array
        $parentComment[] = $row['parent_comment_id'];
        $commentCreator[] = $row['comment_username'];
        $commentText[] = $row['comment_text'];
    }
    //Retrieves just forum information in case comments dont exist for the chosen forum
    while($row2 = mysqli_fetch_array($query2)){
        //puts each column in an array
        $forumTitle[] = $row2['f_title'];
        $forumText[] = $row2['f_text'];
        $forumCreator[] = $row2['forum_username'];
    }
    ?>
    <div id="selectedForumInfo">
        <div class="f_creator">
            <?php echo "Creator: $forumCreator[0]"; //these indexes are 0 because the forum ID is used in the query and the ID is a unique key so only one row is returned?>
        </div>
        <div class="f_title">
            <?php echo "$forumTitle[0]";?>
        </div>
        <div class="f_text">
            <?php echo "$forumText[0]";?>
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
} // closes the entire if
else {
    echo 'No forum found'; //used for testing to see if the forum ID was sent
}
?>
<script>
    //function to run when unregistered user tries to comment
    function noComment(){
        alert("You need to be logged in to comment");
    }
</script>
</BODY></HTML>
