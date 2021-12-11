<?php
session_start();
$_SESSION = array();
session_destroy();
header("Location: ../admin_access/admin_login.php");
exit;
