<?
$mode = $_GET['mode'];

include("../db.php");
include('../fonksiyon.php');
include('../sayfa_koruma.php');
?><? if ($mode=='save') {

$email = sql($_POST['email']);
$telefon = sql($_POST['telefon']);
$eski = sql($_POST['eski']);
$parola = sql($_POST['parola']);

email_kontrol($email);
tel_kontrol($telefon);

if ($eski!='') {
sifre_kontrol($eski);
}

if ($parola!='') {
sifre_kontrol($parola);
}


if ($email=='' or $telefon=='') {
die("ET");
}

$kontrol = mysql_num_rows(mysql_query("select * from user where email = '$email' and id != '$_SESSION[userid]'"));

if ($kontrol > 0) {
die("EM");
}


if ($eski!=='' and $parola=='') {
die("PA");
}


if ($eski=='' and $parola!=='') {
die("AP");
}

if ($eski!=='') {
$eski = md5($eski);
if (mysql_num_rows(mysql_query("select * from user where password = '$eski' and id = '$_SESSION[userid]'"))<1) {
die("PASS");
}}


if ($eski!=='' and $parola!=='') {
$eski = md5($eski);
$parola = md5($parola);
$yali1 = mysql_query("UPDATE user SET password = '$parola' where id = '$_SESSION[userid]'");
}




$yali2 = mysql_query("UPDATE user SET telefon = '$telefon', email = '$email' where id = '$_SESSION[userid]'");

die("SUCCESS");

}
?>