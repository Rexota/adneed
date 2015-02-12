<?
ob_start();
session_start();
include("db.php"); 
include("fonksiyon.php");

$adiniz = sql($_POST['adiniz']);
$tel = sql($_POST['tel']);
$email = sql($_POST['email']);
$tur = sql($_POST['tur']);



$username = sql($_POST['username']);
$password1 = sql($_POST['password1']);
$password2 = sql($_POST['password2']);

if ($kayit_sayfasi=="0") {
die("FAILED"); 
}


if ($username=='' or $password1=='' or $password2=='' or $adiniz=='' or $tel=='' or $email=='' or $tur=='') {
die("ERROR");
}



if ($yayinci_kayit=="0" and $tur=="1") {
die("FAILED"); 
}

if ($reklamveren_kayit=="0" and $tur=="2") {
die("FAILED"); 
}

if ($tur!="1" && $tur!="2") {
die("FAILED"); 
}

ad_kontrol($adiniz);
tel_kontrol($tel);
email_kontrol($email);
user_kontrol($username);
sifre_kontrol($password1);
sifre_kontrol($password2);


$kontrol = mysql_num_rows(mysql_query("select * from user where email = '$email'"));

if ($kontrol > 0) {
die("EMAIL");
}

$kontrol = mysql_num_rows(mysql_query("select * from user where username = '$username'"));

if ($kontrol > 0) {
die("USER");
}

if ($password1!==$password2) {
die("PASS");
}

$kimlik = rand(100000, 999999);

$kontrol = mysql_num_rows(mysql_query("select * from user where kimlik = '$kimlik'"));

if ($kontrol > 0) {
die("FAILED");
}

$password1 = md5($password1);

if ($yayinci_otomatik=="1" and $tur=="1") {
$onay = 1;
}
if ($yayinci_otomatik=="0" and $tur=="1") {
$onay = 0;
}

if ($reklamveren_otomatik=="1" and $tur=="2") {
$onay = 1;
}
if ($reklamveren_otomatik=="0" and $tur=="2") {
$onay = 0;
}



$ekle = "insert into user (username, password, email, telefon, ad, kimlik, tur, login, sil, onay) values ('$username', '$password1', '$email', '$tel', '$adiniz', '$kimlik', '$tur', '1','0','$onay')";

$yali = mysql_query($ekle);

if ($yali)  {
include('sis_mail/register.php');
if ($onay=="1") {
die("SUCCESS");
} else {
die("UNSUCCESS");
}
} else {
die("FAILED");
}
?>