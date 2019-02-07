<?php
session_start();
?>

<?php

if(isset($_POST['title']) && isset($_POST['description'])){

$title = $_POST['title'];
$description = $_POST['description'];
$_title = dbescape($title);
$_description = dbescape($description);
	
//get the username of the person logged in, as in session username


//figure out subject id


//figure out tag
	
	
//the insert query	
dbquery("INSERT INTO TABLE Forum SET creator_username = , f_title = '$_title', f_text = '$_description', forum_subject_id = '', tag = ''");
	
	
}



?>