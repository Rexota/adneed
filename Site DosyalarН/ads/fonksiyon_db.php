<?


function set_config() {


$set = mysql_fetch_array(mysql_query("select * from config where id = 1"));

$dosyam = "system/config.txt";

$verim = "[siteurl]".$set['adres']."[c][adurl]".$set['adadres']."[c][popupyayinci]".$set['popupyayinci']."[c][splashyayinci]".$set['splashyayinci']."[c][msnpopyayinci]".$set['msnpopyayinci']."[c][havuz]".$set['havuz']."[c]";

$dt = fopen($dosyam, 'w');
fwrite($dt, $verim);
fclose($dt);

}





function user_list() {


$ulist = @mysql_query("select * from user where login = 1 and sil = 0 and onay = 1");
if (@mysql_num_rows($ulist)<1) { } else {
$dosyam = "system/userlist.txt";
while( $yaz = @mysql_fetch_array($ulist)) {

$verim = $verim."[id]".$yaz['id']."[c][username]".$yaz['username']."[c][kimlik]".$yaz['kimlik']."[c][tur]".$yaz['tur']."[c]\n";

}
$dt = fopen($dosyam, 'w');
fwrite($dt, $verim);
fclose($dt);
}



}







function site_list() {


$ulist = @mysql_query("select * from sitelerim where onay = 1");
if (@mysql_num_rows($ulist)<1) { } else {
$dosyam = "system/sitelist.txt";
while( $yaz = @mysql_fetch_array($ulist)) {

$verim = $verim."[id]".$yaz['id']."[c][user]".$yaz['user']."[c][adres]".$yaz['adres']."[c][kategori]".$yaz['kategori']."[c]\n";

}
$dt = fopen($dosyam, 'w');
fwrite($dt, $verim);
fclose($dt);
}



}














function popup_list() {


$ulist = @mysql_query("select * from popup_reklamlar where durum = 1 and gunluk > bugun");
if (@mysql_num_rows($ulist)<1) { } else {
$dosyam = "system/popuplist.txt";
while( $yaz = @mysql_fetch_array($ulist)) {

$verim = $verim."[id]".$yaz['id']."[c][kategori]".$yaz['kategori']."[c][url]".$yaz['url']."[c][veren_id]".$yaz['reklamveren_id']."[c]\n";

}
$dt = fopen($dosyam, 'w');
fwrite($dt, $verim);
fclose($dt);
}



}







function splash_list() {


$ulist = @mysql_query("select * from splash_reklamlar where durum = 1 and gunluk > bugun");
if (@mysql_num_rows($ulist)<1) { } else {
$dosyam = "system/splashlist.txt";
while( $yaz = @mysql_fetch_array($ulist)) {

$verim = $verim."[id]".$yaz['id']."[c][kategori]".$yaz['kategori']."[c][url]".$yaz['url']."[c][veren_id]".$yaz['reklamveren_id']."[c][resim]".$yaz[resim]."[c]\n";

}
$dt = fopen($dosyam, 'w');
fwrite($dt, $verim);
fclose($dt);
}



}





function msn_list() {


$ulist = @mysql_query("select * from msn_reklamlar where durum = 1 and gunluk > bugun");
if (@mysql_num_rows($ulist)<1) { } else {
$dosyam = "system/msnlist.txt";
while( $yaz = @mysql_fetch_array($ulist)) {

$verim = $verim."[id]".$yaz['id']."[c][kategori]".$yaz['kategori']."[c][url]".$yaz['url']."[c][veren_id]".$yaz['reklamveren_id']."[c][resim]".$yaz[resim]."[c]\n";

}
$dt = fopen($dosyam, 'w');
fwrite($dt, $verim);
fclose($dt);
}



}





function ppc_list() {


$ulist = @mysql_query("select * from ppc_reklamlar where durum = 1 and gunluk > bugun");
if (@mysql_num_rows($ulist)<1) { } else {
$dosyam = "system/ppclist.txt";
while( $yaz = @mysql_fetch_array($ulist)) {

$bul = @mysql_fetch_array(@mysql_query("select * from ppc_cat where id = '$yaz[modul]'"));

$verim = $verim."[id]".$yaz['id']."[c][kategori]".$yaz['kategori']."[c][modul]".$yaz[modul]."[c][url]".$yaz['url']."[c][veren_id]".$yaz['reklamveren_id']."[c][resim]".$yaz[resim]."[c]";
$verim = $verim."[width]".$bul[width]."[c][height]".$bul[height]."[c][kesinti]".$bul[kesinti]."[c][tikbas]".$yaz[tikbas]."[c]\n";
}
$dt = fopen($dosyam, 'w');
fwrite($dt, $verim);
fclose($dt);
}



}






function anasayfa_gosterim() {

$hepsi = @mysql_query("select * from popup_reklamlar");
if (@mysql_num_rows($hepsi) < 1) { $popupsayi = 0; } else {
while($bul = @mysql_fetch_array($hepsi)) {

$popupsayi = $popupsayi + $bul[gunluk_gosterim];

} }
$hepsi = @mysql_query("select * from splash_reklamlar");
if (@mysql_num_rows($hepsi) < 1) { $splashsayi = 0; } else {
while($bul = @mysql_fetch_array($hepsi)) {

$splashsayi = $splashsayi + $bul[gunluk_gosterim];

} }
$hepsi = @mysql_query("select * from msn_reklamlar");
if (@mysql_num_rows($hepsi) < 1) { $msnsayi = 0; } else {
while($bul = @mysql_fetch_array($hepsi)) {

$msnsayi = $msnsayi + $bul[gunluk_gosterim];

} }

$hepsi = @mysql_query("select * from ppc_reklamlar");
if (@mysql_num_rows($hepsi) < 1) { $ppcsayi = 0; } else {
while($bul = @mysql_fetch_array($hepsi)) {

$ppcsayi = $ppcsayi + $bul[gunluk_gosterim];

} }

$sonuc = $popupsayi + $splashsayi + $msnsayi + $ppcsayi;
return $sonuc;
}
?>
<?

function anasayfa_gosterim_tekil() {

$hepsi = @mysql_query("select * from popup_reklamlar");
if (@mysql_num_rows($hepsi) < 1) { $popupsayi = 0; } else {
while($bul = @mysql_fetch_array($hepsi)) {

$popupsayi = $popupsayi + $bul[bugun];

} }
$hepsi = @mysql_query("select * from splash_reklamlar");
if (@mysql_num_rows($hepsi) < 1) { $splashsayi = 0; } else {
while($bul = @mysql_fetch_array($hepsi)) {

$splashsayi = $splashsayi + $bul[bugun];

} }
$hepsi = @mysql_query("select * from msn_reklamlar");
if (@mysql_num_rows($hepsi) < 1) { $msnsayi = 0; } else {
while($bul = @mysql_fetch_array($hepsi)) {

$msnsayi = $msnsayi + $bul[bugun];

} }

$hepsi = @mysql_query("select * from ppc_reklamlar");
if (@mysql_num_rows($hepsi) < 1) { $ppcsayi = 0; } else {
while($bul = @mysql_fetch_array($hepsi)) {

$ppcsayi = $ppcsayi + $bul[bugun];

} }

$sonuc = $popupsayi + $splashsayi + $msnsayi + $ppcsayi;
return $sonuc;
}
?>
<?

function popup_kapat() {

$hepsi1 = @mysql_query("select * from popup_reklamlar where suan > toplam and durum = 1");
if (@mysql_num_rows($hepsi1)<1) { } else {
while( $yaz = @mysql_fetch_array($hepsi1)) {
$reklamkapat = mysql_query("Update popup_reklamlar SET durum = 2 where id = '$yaz[id]' and kategori = '$yaz[kategori]'");
}}

}

function splash_kapat() {

$hepsi1 = @mysql_query("select * from splash_reklamlar where suan > toplam and durum = 1");
if (@mysql_num_rows($hepsi1)<1) { } else {
while( $yaz = @mysql_fetch_array($hepsi1)) {
$reklamkapat = mysql_query("Update splash_reklamlar SET durum = 2 where id = '$yaz[id]' and kategori = '$yaz[kategori]'");
}}

}

function msn_kapat() {

$hepsi1 = @mysql_query("select * from msn_reklamlar where suan > toplam and durum = 1");
if (@mysql_num_rows($hepsi1)<1) { } else {
while( $yaz = @mysql_fetch_array($hepsi1)) {
$reklamkapat = mysql_query("Update msn_reklamlar SET durum = 2 where id = '$yaz[id]' and kategori = '$yaz[kategori]'");
}}

}



function ppc_kapat() {

$hepsi1 = @mysql_query("select * from ppc_reklamlar where suan > toplam and durum = 1");
if (@mysql_num_rows($hepsi1)<1) { } else {
while( $yaz = @mysql_fetch_array($hepsi1)) {
$reklamkapat = mysql_query("Update ppc_reklamlar SET durum = 2 where id = '$yaz[id]' and kategori = '$yaz[kategori]'");
}}

}

?>