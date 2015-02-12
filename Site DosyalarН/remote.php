<?
ob_start();
session_start();
include("db.php"); 
include("fonksiyon.php");
include("sayfa_admin.php");

$mode = $_GET['mode'];
$username = $_POST['username'];
$password = $_POST['password'];


$git = $adurl."clean.php";
$sonuc = "mode=$mode&username=$username&password=$password";


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$git);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,$sonuc);
curl_exec ($ch);
curl_close ($ch);




?>