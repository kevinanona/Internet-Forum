<!DOCTYPE HTML>
<HTML>
<HEAD>
<link rel="stylesheet" type="text/css" href="stylesheet.css">
<SCRIPT type="text/javascript"src="https://gc.kis.v2.scr.kaspersky-labs.com/F9A769DF-F758-B045-8B15-7B836D5190F2/main.js" charset="UTF-8"></script>
<SCRIPT>
    /** These functions arent being used anymore
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
    */

</SCRIPT>
<script> //testing this script, its supposed to access php file to get forums from database and display it on the page
          function displayForums() {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                }
            };
            xmlhttp.open("GET","displayForums.php",true);
            xmlhttp.send();

         }
</script>
</HEAD>

<BODY>
<?php
session_start();
require_once "../database.php";
// check if session exists?
if(isset($_SESSION['username']) != 0){
header("Location: Loggedin.php");
}
?>
<DIV class=topMenu>

	<DIV id=registerAndLogin>
	<button class=button onclick="window.location.href='register.php'">Sign Up</button>
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
            <form METHOD="get" ACTION="searchForum.php">
                <input class=searchField type="text" name="subjectTitle" id="displayValue"
                       placeholder="Enter forum subject/tag" onfocus="this.value = this.select()">
                <input id="idValue" type="submit">
            </form>
</div>
	
	<DIV style="float: right; top: 0; right: 0;">
	<nav class=nav>
		<ul>
			<!--<li><a href="http://weblab.salemstate.edu/~csforum/Forum/createForum.html">Create Forum</a></li> dont need this code because
			since the user isnt logged in, they should not be taken to the forum creation screen as they need to be logged in to do so-->
			<li><a onclick="createForum()">Create Forum</a></li> <!-- does not link to the createForum.html file because the user is not logged in-->
			<!-- Messages not fully implemented so option was commented out <li><a onclick="sendMessage()">Send Message</a></li> does not link to the message.html file because the user is not logged in-->
		</ul>
	</nav>
	</DIV>
	
	<!--
	<DIV class=accountIcon>
	<IMG style="width: 30px;height: 30px;" onmousedown=accountInfo() class=accountIcon src="../account.png">
	</DIV>
	-->
	
	
	
</DIV>
<DIV id=txtHint>
</DIV>
<SCRIPT>displayForums();//script that calls the function to display forums</SCRIPT>
<SCRIPT>
function sendMessage(){ //user is not logged in therefore it displays a message
	alert("You need to be logged in to send a message");
}
function createForum(){ //user is not logged in therefore it displays a message
	alert("You need to be logged in to create a forum");
}
</SCRIPT>
</BODY>
<HTML>
