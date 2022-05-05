<?php session_start();

unset($_SESSION["level"]);
unset($_SESSION["name"]);

echo $_SESSION["level"];

 header("Location:../index.php");
?>