<!DOCTYPE HTML>
<HTML>
<HEAD>
<link rel="stylesheet" type="text/css" href="stylesheet.css">
<SCRIPT type="text/javascript"src="https://gc.kis.v2.scr.kaspersky-labs.com/F9A769DF-F758-B045-8B15-7B836D5190F2/main.js" charset="UTF-8"></script>
<SCRIPT>
function signup(){
document.getElementById("signup").src = "/register.html";
window.location.href = "../register.html";
}
function login(){
document.getElementById("login").src = "login.html";
}
function subjectList(){
document.getElementById("dropdown").classList.toggle("show");
}
function accountInfo(){ //dropdown account options menu
}

</SCRIPT>
</HEAD>

<BODY>
<DIV class=topMenu>

	<DIV id=registerAndLogin>
	<button class=button onclick="window.location.href='../Forum/register.html'">Sign Up</button>
	<button class=button onclick="window.location.href='../Forum/login.html'">Log in</button>
	</DIV>
	
		<div id=searching>
  <select id="searchOptions"
          onchange="document.getElementById('displayValue').value=this.options[this.selectedIndex].text; document.getElementById('idValue').value=this.options[this.selectedIndex].value;">
    <option value="CSC 105">CSC 105</option>
    <option value="CSC 110">CSC 110</option>
    <option value="CSC 115">CSC 115</option>
	<option value="CSC 212">CSC 212</option>
	<option value="CSC 235">CSC 235</option>
	<option value="CSC 246">CSC 246</option>
	<option value="CSC 260">CSC 260</option>
	<option value="CSC 263">CSC 263</option>
	<option value="CSC 278">CSC 278</option>
	<option value="CSC 279">CSC 279</option>
	<option value="CSC 295">CSC 295</option>
	<option value="CSC 300">CSC 300</option>
	<option value="CSC 315A">CSC 315A</option>
	<option value="CSC 325">CSC 325</option>
	<option value="CSC 340">CSC 340</option>
	<option value="CSC 345">CSC 345</option>
	<option value="CSC 351">CSC 351</option>
	<option value="CSC 367">CSC 367</option>
	<option value="CSC 376">CSC 376</option>
	<option value="CSC 381">CSC 381</option>
	<option value="CSC 400">CSC 400</option>
	<option value="CSC 415">CSC 415</option>
	<option value="CSC 425">CSC 425</option>
	<option value="CSC 435">CSC 435</option>
	<option value="CSC 445">CSC 445</option>
	<option value="CSC 475">CSC 475</option>
	<option value="CSC 485">CSC 485</option>
	<option value="CSC 490">CSC 490</option>
	<option value="CSC 498">CSC 498</option>
	<option value="CSC 500">CSC 500</option>
	<option value="CSC 520">CSC 520</option>
	<option value="CSC 521">CSC 521</option>
	<option value="MAT214A">MAT214A</option>
	<option value="PHS 205">PHS 205</option>
  </select>
  <input class=searchField type="text" name="displayValue" id="displayValue" 
         placeholder="Enter forum subject/tag" onfocus="this.select()">
  <input name="idValue" id="idValue" type="hidden">
</div>
	
	
	<DIV class=accountIcon>
	<IMG style="width: 30px;height: 30px;" onmousedown=accountInfo() class=accountIcon src="../account.png">
	</DIV>
	
	
	
</DIV>

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

}	//puts each row of the Forum table into a separate index in an array called $row
while($row1 = mysqli_fetch_array($query)){
$titleCol[] = $row1['f_title'];

}
while($row2 = mysqli_fetch_array($query)){
$subjectCol[] = $row2['forum_subject_id'];

}
while($row3 = mysqli_fetch_array($query)){
$tagCol[] = $row3['tag'];

}
while($row4 = mysqli_fetch_array($query)){
$descriptionCol[] = $row4['f_text'];

}
// SOMETHING WRONG WITH WHILE LOOPS ONLY THE FIRST ONE WORKS *****FIX*****
//*note* the $row variable is an array with ordered values by index representing f_title then f_text then forum_subject_id then tag
echo $usernameCol[0];
echo "<br>";
echo $titleCol[0];
echo "<br>";
echo $subjectCol[0];
echo "<br>";
echo "everything below is the divs";
echo "<DIV id=forumsContainer>";
echo	"<DIV class=forums>";
 

echo		"<DIV class=creatorUsername> $usernameCol[0]";
echo		"</DIV>	";
echo		"<DIV class=forumTitle> Title is $titleCol[0]";
echo		"</DIV>";
echo		"<DIV class=subjectAndTag> Subject is $subjectCol[0] , Tag is $tagCol[0]";
echo		"</DIV>";
echo		"<DIV class=forumDescription> Forum Description is $descriptionCol[0] ";
echo		"</DIV>";


//this is the current version --------------------------------------------------------------------------
echo	"</DIV>";

echo	"<DIV class=forums>";
echo		"<DIV class=creatorUsername> $usernameCol[1]";
echo		"</DIV>	";
echo		"<DIV class=forumTitle> This is the Title";
echo		"</DIV>";
echo		"<DIV class=subjectAndTag> Subject, Tag";
echo		"</DIV>";
echo		"<DIV class=forumDescription> Forum Description ";
echo		"</DIV>";


echo	"</DIV>";

echo	"<DIV class=forums>";
echo		"<DIV class=creatorUsername> $usernameCol[2]";
echo		"</DIV>	";
echo		"<DIV class=forumTitle> This is the Title";
echo		"</DIV>";
echo		"<DIV class=subjectAndTag> Subject, Tag";
echo		"</DIV>";
echo		"<DIV class=forumDescription> Forum Description ";
echo		"</DIV>";


echo	"</DIV>";

echo 	"<DIV class=forums>";
echo		"<DIV class=creatorUsername> $usernameCol[3]";
echo		"</DIV>	";
echo		"<DIV class=forumTitle> This is the Title";
echo		"</DIV>";
echo		"<DIV class=subjectAndTag> Subject, Tag";
echo		"</DIV>";
echo		"<DIV class=forumDescription> Forum Description ";
echo		"</DIV>";


echo	"</DIV>";
echo "</DIV>";

?>

</BODY>
<HTML>