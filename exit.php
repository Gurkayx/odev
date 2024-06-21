<?php 
session_start();
ob_start();
ob_clean();
session_destroy();

header("location:./index.php");