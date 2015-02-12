<?
ob_start();
session_start();
include("db.php"); 
include("fonksiyon.php");

$ads = sql($_POST['ad']);
$soyad = sql($_POST['soyad']);
$tel = sql($_POST['tel']);
$email = sql($_POST['email']);

$mesaj = sql($_POST['mesaj']);
$konu = sql($_POST['konu']);



if ($ads=='' or $soyad=='' or $email=='' or $konu=='' or $mesaj=='') {
die("ERROR");
}


ad_kontrol($ads);
ad_kontrol($soyad);
tel_kontrol($tel);
email_kontrol($email);


$tarih = mktime();

$ekle = "insert into iletisim (ad,soyad,tel,email,konu,mesaj,durum,tarih) values ('$ads', '$soyad', '$tel', '$email', '$konu', '$mesaj',0,'$tarih')";

$yali = mysql_query($ekle);

if ($yali)  {
include('sis_mail/iletisim.php');
die("SUCCESS");
} else {
die("FAILED");
}
?>