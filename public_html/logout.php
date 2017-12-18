<?php
 session_start();
 unset($_SESSION['adminusername']);
 unset($_SESSION['empusername']);
 unset($_SESSION['cisfusername']);
 session_destroy();
 header("location: index.php");
?>