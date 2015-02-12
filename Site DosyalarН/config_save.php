<?
ob_start();
session_start();
include("db.php"); 
include("fonksiyon.php");
include("sayfa_admin.php");

$mode = sql($_GET['mode']);
?>
<? if ($mode=="genel") { 

$adres = sql($_POST['adres']);
$adadres = sql($_POST['adadres']);
$logos = sql($_POST['logos']);
$keyss = sql($_POST['keyss']);
$descc = sql($_POST['descc']);
$copyy = sql($_POST['copyy']);
$title = sql($_POST['title']);
$fav = sql($_POST['fav']);


if ($adres=='' or $adadres=='' or $logos=='' or $keyss=='' or $descc=='' or $copyy=='' or $title=='') {
die("ERROR");
}



$son = substr($adres , -1);

if ($son!=="/") {
$adres = $adres."/";
}


$ilk = substr($adres , 0, 7);

if ($ilk!=="http://") {
$adres = "http://".$adres;
}




$son = substr($adadres , -1);

if ($son!=="/") {
$adadres = $adadres."/";
}


$ilk = substr($adadres , 0, 7);

if ($ilk!=="http://") {
$adadres = "http://".$adadres;
}





$ekle = "UPDATE config SET adres = '$adres', adadres = '$adadres', logo = '$logos', title = '$title', descc = '$descc', keyy = '$keyss', copyy = '$copyy', fav = '$fav' where id = 1";


$yali = mysql_query($ekle);

if ($yali)  {
die("SUCCESS");
} else {
die("FAILED");
}




}
?>
<? if ($mode=="genel2") { 

$popupyayinci = $_POST['popy'];
$splashyayinci = $_POST['splashy'];
$msnpopyayinci = $_POST['msny'];

$popupreklam = $_POST['popr'];
$splashreklam = $_POST['splashr'];
$msnpopreklam = $_POST['msnr'];



if ($popupyayinci=='' or $splashyayinci=='' or $msnpopyayinci=='' or $popupreklam=='' or $splashreklam=='' or $msnpopreklam=='') {
die("ERROR");
}



$ekle = "UPDATE config SET popupyayinci = '$popupyayinci', splashyayinci = '$splashyayinci', msnpopyayinci = '$msnpopyayinci', popupreklam = '$popupreklam', splashreklam = '$splashreklam', msnpopreklam = '$msnpopreklam' where id = 1";

$yali = mysql_query($ekle);

if ($yali)  {
die("SUCCESS");
} else {
die("FAILED");
}




}
?>
<? if ($mode=="genel3") { 

$sismail = $_POST['sismail'];
$bilmail = $_POST['bilmail'];





if ($bilmail=='' or $sismail=='') {
die("ERROR");
}



$ekle = "UPDATE config SET sismail = '$sismail', bilmail = '$bilmail' where id = 1";

$yali = mysql_query($ekle);

if ($yali)  {
die("SUCCESS");
} else {
die("FAILED");
}




}
?>
<? if ($mode=="genel4") { 

$uyekayit = $_POST['uyekayit'];
$odemetalep = $_POST['odemetalep'];
$odemebildir = $_POST['odemebildir'];
$iletisimmesaj = $_POST['iletisimmesaj'];
$ticketac = $_POST['ticketac'];





if ($uyekayit=='' or $odemetalep=='' or $odemebildir=='' or $iletisimmesaj=='' or $ticketac=='') {
die("ERROR");
}



$ekle = "UPDATE config SET 
uyekayit = '$uyekayit',
odemetalep = '$odemetalep',
odemebildir = '$odemebildir',
iletisimmesaj = '$iletisimmesaj',
ticketac = '$ticketac'

 where id = 1";

$yali = mysql_query($ekle);

if ($yali)  {
die("SUCCESS");
} else {
die("FAILED");
}




}
?>
<? if ($mode=="genel5") { 

$kesinti = $_POST['kesinti'];
$min_talep = $_POST['min_talep'];
$max_talep = $_POST['max_talep'];
$odeme_talep = $_POST['odeme_talep'];


$min_talep = str_replace(",","",$min_talep);
$max_talep = str_replace(",","",$max_talep);


if ($kesinti=='' or $max_talep=='' or $min_talep=='' or $odeme_talep=='') {
die("ERROR");
}



$ekle = "UPDATE config SET 
min_talep = '$min_talep',
odeme_talep = '$odeme_talep',
max_talep = '$max_talep',
kesinti = '$kesinti'

 where id = 1";



$yali = mysql_query($ekle);

if ($yali)  {
die("SUCCESS");
} else {
die("FAILED");
}




}
?>
<? if ($mode=="genel6") { 

$havuz = $_POST['havuz'];


if ($havuz=='') {
die("ERROR");
}

$havuz = $havuz*3600;

$ekle = "UPDATE config SET 
havuz = '$havuz' where id = 1";



$yali = mysql_query($ekle);

if ($yali)  {
die("SUCCESS");
} else {
die("FAILED");
}




}
?>
<? if ($mode=="genel7") { 

$pop_min = sql($_POST['pop_min']);
$pop_max = sql($_POST['pop_max']);

$splash_min = sql($_POST['splash_min']);
$splash_max = sql($_POST['splash_max']);

$msn_min = sql($_POST['msn_min']);
$msn_max = sql($_POST['msn_max']);

$splash_min_width = sql($_POST['splash_min_width']);
$splash_min_height = sql($_POST['splash_min_height']);

$splash_max_width = sql($_POST['splash_max_width']);
$splash_max_height = sql($_POST['splash_max_height']);


$msn_min_width = sql($_POST['msn_min_width']);
$msn_min_height = sql($_POST['msn_min_height']);

$msn_max_width = sql($_POST['msn_max_width']);
$msn_max_height = sql($_POST['msn_max_height']);


$pop_min = str_replace(",","",$pop_min);
$pop_max = str_replace(",","",$pop_max);


$splash_min = str_replace(",","",$splash_min);
$splash_max = str_replace(",","",$splash_max);


$msn_min = str_replace(",","",$msn_min);
$msn_max = str_replace(",","",$msn_max);


if ($msn_min_width=='' or $msn_min_height=='' or $msn_max_width=='' or $msn_max_height=='') {
die("ERROR");
}

if ($splash_min_width=='' or $splash_min_height=='' or $splash_max_width=='' or $splash_max_height=='') {
die("ERROR");
}


if ($pop_min=='' or $pop_max=='' or $splash_min=='' or $splash_max=='' or $msn_min=='' or $msn_max=='') {
die("ERROR");
}



$ekle = "UPDATE reklam_ayarlari SET 

pop_min_hit = '$pop_min',
pop_max_hit = '$pop_max',

splash_min_hit = '$splash_min',
splash_max_hit = '$splash_max',

msn_min_hit = '$msn_min',
msn_max_hit = '$msn_max',

splash_min_width = '$splash_min_width',
splash_min_height = '$splash_min_height',

splash_max_width = '$splash_max_width',
splash_max_height = '$splash_max_height',

msn_min_width = '$msn_min_width',
msn_min_height = '$msn_min_height',

msn_max_width = '$msn_max_width',
msn_max_height = '$msn_max_height'

 where id = 1";



$yali = mysql_query($ekle);

if ($yali)  {
die("SUCCESS");
} else {
die("FAILED");
}




}
?>
<? if ($mode=="genel10") { 

$ks = $_POST['ks'];
$yk = $_POST['yk'];
$rk = $_POST['rk'];

$yo = $_POST['yo'];
$ro = $_POST['ro'];

$pm = $_POST['pm'];
$sm = $_POST['sm'];
$mm = $_POST['mm'];

$cg = $_POST['cg'];






if ($ks=='' or $yk=='' or $rk=='' or $yo=='' or $ro=='' or $pm=='' or $sm=='' or $mm=='' or $cg=='') {
die("ERROR");
}



$ekle = "UPDATE extra_ayarlar SET 
k_sayfasi = '$ks',
y_kayit = '$yk',
r_kayit = '$rk',

y_otomatik = '$yo',
r_otomatik = '$ro',

popa = '$pm',
splasha = '$sm',
msna = '$mm',

a_gosterim = '$cg'

 where id = 1";



$yali = mysql_query($ekle);

if ($yali)  {
die("SUCCESS");
} else {
die("FAILED");
}




}
?>