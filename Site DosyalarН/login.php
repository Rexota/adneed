<?
ob_start();
session_start();
include("db.php"); 
include("fonksiyon.php");


$username = sql($_POST['username']);
$password = sql($_POST['password']);


if ($username=='' or $password=='') {
die("ERROR");
}

$password = md5($password);

$kontrol = mysql_num_rows(mysql_query("select * from user where username = '$username' and password = '$password' and sil = 0"));

if ($kontrol < 1) {

die("FAILED");

}else {

$yaz = mysql_fetch_array(mysql_query("select * from user where username = '$username' and password = '$password' and sil = 0"));

if ($yaz[login]!=1) { 
die("BANNED");
}

if ($yaz[onay]!=1) { 
die("CLOSED");
}


$_SESSION['userid']=$yaz['id'];
$_SESSION['username'] = $yaz['username'];
$_SESSION['password'] = $yaz['password'];
$_SESSION['email'] = $yaz['email'];
$_SESSION['ad'] = $yaz['ad'];
$_SESSION['kimlik'] = $yaz['kimlik'];
$_SESSION['tur'] = $yaz['tur'];
$_SESSION['login'] = "True"; 

if ($_SESSION['tur']=="1") {
include("alacak_guncelle.php");
}


die("SUCCESS");
}


?>