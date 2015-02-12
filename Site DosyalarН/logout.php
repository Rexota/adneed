<?
ob_start();
session_start();

$_SESSION['username'] = '';
$_SESSION['email'] = '';
$_SESSION['ad'] = '';
$_SESSION['kimlik'] = '';
$_SESSION['tur'] = '';
$_SESSION['login'] = "False"; 

@header("Location: index.php");

?>