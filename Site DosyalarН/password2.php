<?
ob_start();
session_start();
include("db.php"); 
include("fonksiyon.php");

$sifre1 = sql($_POST['sifre1']);
$sifre2 = sql($_POST['sifre2']);
$uid = sql($_POST['uid']);
$cid = sql($_POST['cid']);



if ($sifre1=='' or $sifre2=='' or $uid=='' or $cid=='') {
die("ERROR");
}


sifre_kontrol($sifre1);
sifre_kontrol($sifre2);


if ($sifre1!=$sifre2) {
die("PASS");
}


$yali = @mysql_num_rows(@mysql_query("select * from user where id = '$uid' and password = '$cid'"));
if ($yali < 1 ) { die("FAILED"); }


$new = md5($sifre1);

$guncelle = @mysql_query("UPDATE user SET password = '$new' where id = '$uid' and password = '$cid'");
if ($guncelle) {
die("SUCCESS");
} else {
die("FAILED");
}


?>