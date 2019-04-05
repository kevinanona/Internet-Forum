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
    $sql = '
    SELECT f_title, f_text, parent_comment_id, comment_forum_id, Comments.creator_username, comment_text, c_timestamp
    FROM Comments, Forum
    WHERE Forum.f_id = Comments.comment_forum_id AND comment_forum_id = ' . $f_id . ' ORDER BY c_timestamp';

    //run query
    $query = mysqli_query($dbcon, $sql);
    $parentComment = array();
    $commentCreator = array();
    $commentText = array();
    $forumTitle = array();
    $forumText = array();

//put values in an associative array
    while($row = mysqli_fetch_array($query)){
        //puts each column in an array
        $parentComment[] = $row['parent_comment_id'];
        $commentCreator[] = $row['creator_username'];
        $commentText[] = $row['comment_text'];
        $forumTitle[] = $row['f_title'];
        $forumText[] = $row['f_text'];
    }
    ?>

    <div id="selectedForumInfo">
        <div class="commentCreator">
            <?php echo "$commentCreator[0]";?>
        </div>
        <div class="f_title">
            <?php echo "$forumTitle[0]";?>
        </div>
        <div class="f_text">
            <?php echo "$forumText[0]";?>
        </div>
    </div>
<?php

    //query successfully retrieves count based on forum ID
    $sql = 'SELECT COUNT(c_id) AS "Comment Count"
FROM Comments
WHERE comment_forum_id = ' . $f_id . '
GROUP BY comment_forum_id';

    $query = mysqli_query($dbcon, $sql);

    $commentCount = mysqli_fetch_row($query);
    echo "comment count is $commentCount[0]";
    for($i = 0; $i < 1; $i++) {

    }

?>
    <div class="commentContainer">
            <?php
            for($i = 0; $i < $commentCount; $i++){ //this loop keeps creating DIV blocks for each comment?>
                <div class="comment">
                    <!-- TODO - WRITE ALL OF THE COMMENT INFO -->
                </div>
            <?php } //this page block just to close the for loop ?>
    </div>

<?php
} // closes the entire if
else {
    echo 'No variable'; //used for testing to see if the forum ID was sent
}
?>
</BODY></HTML>
