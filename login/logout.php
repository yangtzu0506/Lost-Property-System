<?php session_start();

unset($_SESSION["level"]);
unset($_SESSION["name"]);
unset($_SESSION['account']);

echo $_SESSION["level"];

 header("Location:../index.php");
?>