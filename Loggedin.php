<?php
session_start();
?>

<?php
echo <<<END
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="stylesheet.css">
<SCRIPT type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/F9A769DF-F758-B045-8B15-7B836D5190F2/main.js" charset="UTF-8"></SCRIPT>
<SCRIPT type="text/javascript">

function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.accountIcon')) {
    var dropdowns = document.getElementsByClassName("accountContent");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</SCRIPT>
</head>
<BODY>
<DIV class=topMenu>

	<DIV id=logout>
	<FORM METHOD=GET ACTION=logout.php>
	<input type=submit value=logout name=logout>
	</FORM>
	</DIV>
	
	<DIV id=searchField><button onmouseover=subjectList()>Tags</button> <input name="searchBar" placeholder="Enter forum tag"></DIV>
	
	
	<div class="dropdown">
  <IMG style="width:25px;height:25px;float:right;"onclick="myFunction()" class="accountIcon" src="../account.png">
  <div id="myDropdown" class="accountContent">
    <a href="http://weblab.salemstate.edu/~csforum/Forum/createForum.html">Create a Forum</a>
    <a href="#about">About</a>
    <a href="#contact">Contact</a>
  </div>
	</div>
	
	
	
</DIV>

<DIV id=forumsContainer>
	<DIV id=forum1>
	</DIV>
	<DIV id=forum2>
	</DIV>
	<DIV id=forum3>
	</DIV>
	<DIV id=forum4>
	</DIV>
</DIV>

</BODY>
<HTML>
END;
require_once "../database.php";

if(isset($_SESSION['username']) != 0){

}
?>