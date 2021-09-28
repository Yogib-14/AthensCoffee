<?php
session_start();
session_unset();
// session_destroy();
$_SESSION['role'] = "none";

header("Location: index.php");
?>