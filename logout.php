<?php
session_start();
session_destroy();
header("Location: Home page.php");
?>