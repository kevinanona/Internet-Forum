<!DOCTYPE html>
<html>
<head>
    <!-- THIS PAGE IS TO BE INCLUDED INTO EVERY FILE THE USER IS GOING TO BE LOGGED IN FOR -->
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <SCRIPT type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/F9A769DF-F758-B045-8B15-7B836D5190F2/main.js" charset="UTF-8"></SCRIPT>
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
</head>
<BODY>
<?php
session_start();
?>
<!-- Top menu with the searching element as well as the forum creation, message sending and logout options -->
<DIV class=topMenu>
    <h5>Search a post</h5>
    <div id="searching">
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

    <DIV style="float: right; top: 0; right: 0;">
        <!-- Navigation bar with links to Forum creation, message sending and logout options -->
        <nav class=nav>
            <ul>
                <li><a href="http://weblab.salemstate.edu/~csforum/Forum/createForum.html">Create Forum</a></li>
                <li><a href="./messages.php">Send Message</a></li>
                <li><a href="./logout.php">Logout</a></li>
            </ul>
        </nav>
    </DIV>

</DIV>
