<?
include('db_db.php');

set_config();
user_list();
site_list();
popup_list();
splash_list();
msn_list();
ppc_list();

$tarihs = date("d.m.Y");
$sorbakem = mysql_num_rows(mysql_query("select * from gunluk_gosterimler where tarih = '$tarihs'"));

if ( $sorbakem < 1 ) {
$ekleeee = mysql_query("insert into gunluk_gosterimler (tarih) values ('$tarihs')");

$btekil = anasayfa_gosterim_tekil();
$bcogul = anasayfa_gosterim();

$btekil = str_replace(",","", $btekil);
$bcogul = str_replace(",","", $bcogul);

$day = date("d")-1;
$ay = date("m");
$yil = date("Y");

$newt = $day.".".$ay.".".$yil;
$ekle = mysql_query("insert into gunluk_raporlar (tekil,cogul,tarih) values ('$btekil', '$bcogul', '$newt')");


$guncelle = mysql_query("UPDATE popup_reklamlar SET bugun = 0 , gunluk_gosterim = 0");
$guncelle = mysql_query("UPDATE splash_reklamlar SET bugun = 0 , gunluk_gosterim = 0");
$guncelle = mysql_query("UPDATE msn_reklamlar SET bugun = 0 , gunluk_gosterim = 0");
$guncelle = mysql_query("UPDATE ppc_reklamlar SET bugun = 0 , gunluk_gosterim = 0");

popup_cache_temizle();
splash_cache_temizle();
msn_cache_temizle();
ppc_cache_temizle();

}


popup_kapat();
splash_kapat();
msn_kapat();
ppc_kapat();













$dizin='people/';
$limit = 9999;

$files = glob("$dizin*.ads");
if(count($files) > 0) {

for ($i = 0; $i <= $limit; $i++ ) {
$dosya = $files[$i];
if ($dosya!="") {

$icerik = @file($dosya);
$buldum = $icerik[0];


$v1 = explode("[v]", $buldum);
$v2 = explode("[/v]", $v1[1]);
$value = $v2[0];

$a1 = explode("[a]", $buldum);
$a2 = explode("[/a]", $a1[1]);
$reklam_id = $a2[0];

$o1 = explode("[o]", $buldum);
$o2 = explode("[/o]", $o1[1]);
$reklam_tur = $o2[0];

if ($reklam_tur=="4") {
$yali = @mysql_query("Update ppc_reklamlar set gunluk_gosterim = gunluk_gosterim + $value where id = '$reklam_id'");
}
if ($reklam_tur=="3") {
$yali = @mysql_query("Update msn_reklamlar set gunluk_gosterim = gunluk_gosterim + $value where id = '$reklam_id'");
}
if ($reklam_tur=="2") {
$yali = @mysql_query("Update splash_reklamlar set gunluk_gosterim = gunluk_gosterim + $value where id = '$reklam_id'");
}
if ($reklam_tur=="1") {
$yali = @mysql_query("Update popup_reklamlar set gunluk_gosterim = gunluk_gosterim + $value where id = '$reklam_id'");
}

@unlink($dosya);
}}

}






$dizin='people/';
$limit = 9999;

$files = glob("$dizin*.sys");
if(count($files) > 0) {

for ($i = 0; $i <= $limit; $i++ ) {
$dosya = $files[$i];
if ($dosya!="") {

$icerik = @file($dosya);
$buldum = $icerik[0];


$v1 = explode("[v]", $buldum);
$v2 = explode("[/v]", $v1[1]);
$value = $v2[0];

$a1 = explode("[y]", $buldum);
$a2 = explode("[/y]", $a1[1]);
$yayinci_id = $a2[0];

$o1 = explode("[o]", $buldum);
$o2 = explode("[/o]", $o1[1]);
$reklam_tur = $o2[0];

$k1 = explode("[k]", $buldum);
$k2 = explode("[/k]", $k1[1]);
$yayinci_kimlik = $k2[0];

$s1 = explode("[s]", $buldum);
$s2 = explode("[/s]", $s1[1]);
$site_id = $s2[0];


$d1 = explode("[d]", $buldum);
$d2 = explode("[/d]", $d1[1]);
$tarih = $d2[0];

$tarihs = explode(".", $tarih);

$gun = $tarihs[0];
$ay = $tarihs[1];
$yil = $tarihs[2];


if ($reklam_tur=="4") {
$puanver = @mysql_query("UPDATE ppc_sayimlar SET cogul = cogul + $value where gun = '$gun' and ay = '$ay' and yil = '$yil' and site_id = '$site_id' and yayinci_kimlik = '$yayinci_kimlik'");
}
if ($reklam_tur=="3") {
$puanver = @mysql_query("UPDATE msn_sayimlar SET cogul = cogul + $value where gun = '$gun' and ay = '$ay' and yil = '$yil' and site_id = '$site_id' and yayinci_kimlik = '$yayinci_kimlik'");
}
if ($reklam_tur=="2") {
$puanver = @mysql_query("UPDATE splash_sayimlar SET cogul = cogul + $value where gun = '$gun' and ay = '$ay' and yil = '$yil' and site_id = '$site_id' and yayinci_kimlik = '$yayinci_kimlik'");
}
if ($reklam_tur=="1") {
$puanver = @mysql_query("UPDATE popup_sayimlar SET cogul = cogul + $value where gun = '$gun' and ay = '$ay' and yil = '$yil' and site_id = '$site_id' and yayinci_kimlik = '$yayinci_kimlik'");
}

@unlink($dosya);

}}
}




















mysql_close($sqlconnect);
?>