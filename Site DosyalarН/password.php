<?
ob_start();
session_start();
include("db.php"); 
include("fonksiyon.php");

$username = sql($_POST['username']);
$email = sql($_POST['email']);


if ($username=='' or $email=='') {
die("ERROR");
}


email_kontrol($email);
user_kontrol($username);


$sor = mysql_num_rows(mysql_query("select * from user where email = '$email' and username = '$username' and login = 1 and sil = 0"));

if ($sor < 1) {
die("NOT");
} else {

$yali = mysql_fetch_array(mysql_query("select * from user where email = '$email' and username = '$username' and login = 1 and sil = 0"));

include('sis_mail/password.php');

if ($baba) {
die("SUCCESS");
} else {
die($yali);
}


}
?>