<?php
// This file is used to kill the current session
session_start();
session_destroy();
header("Location: Home page.php");
?>
