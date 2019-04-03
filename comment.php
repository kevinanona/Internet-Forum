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
    echo 'We have the variable: ' . $f_id . '<br>';
    ////query
    $sql = "
    SELECT f_title, parent_comment_id, comment_forum_id, Comments.creator_username, comment_text, c_timestamp
    FROM Comments, Forum
    WHERE Forum.f_id = Comments.comment_forum_id AND comment_forum_id = $f_id ORDER BY c_timestamp";

    //run query
    $query = mysqli_query($dbcon, $sql);
    $parentComment = array();
    $commentCreator = array();
    $commentText = array();
    $commentTitle = array();

//put values in an associative array
    while($row = mysqli_fetch_array($query)){
        //puts each column in an array
        $parentComment[] = $row['parent_comment_id'];
        $commentCreator[] = $row['creator_username'];
        $commentText[] = $row['comment_text'];
        $commentTitle[] = $row['f_title'];
    }
    ?>

    <div id="selectedForumInfo">
        <?php echo "$commentTitle[0]";?>
    </div>
    <div id="selectedForumComments">

    </div>

    <?php
    //TODO query to get number of comments
    $sql = "";

    $query = "";

    for($i = 0; $i < 1; $i++) {

    }




}
else {
    echo 'No variable';
}
?>
</BODY></HTML>
