<? include('db_db.php');
set_time_limit(10000);

$dizin='click_msn/';
$limit = $_GET['limit'];

if ($limit=='') {
$limit="2500";
}


$files = glob("$dizin*.txt");
if(count($files) > 0) {








for ($i = 0; $i <= $limit; $i++ ) {
$dosya = $files[$i];
if ($dosya!="") {



$icerik = @file($dosya);
$buldum = $icerik[0];



$ak1 = explode("[ref_url]", $buldum);
$ak2 = explode("[/b]", $ak1[1]);
$ref = urldecode($ak2[0]);


$bk1 = explode("[tik_url]", $buldum);
$bk2 = explode("[/b]", $bk1[1]);
$yurl = urldecode($bk2[0]);

$ck1 = explode("[ip_adres]", $buldum);
$ck2 = explode("[/b]", $ck1[1]);
$ip = $ck2[0];

$dk1 = explode("[yayinci_kimlik]", $buldum);
$dk2 = explode("[/b]", $dk1[1]);
$yayinci_kimlik = $dk2[0];

$qdk1 = explode("[yayinci_id]", $buldum);
$qdk2 = explode("[/b]", $qdk1[1]);
$yayinci_id = $qdk2[0];

$ek1 = explode("[site_id]", $buldum);
$ek2 = explode("[/b]", $ek1[1]);
$site_id = $ek2[0];

$fk1 = explode("[site_adresi]", $buldum);
$fk2 = explode("[/b]", $fk1[1]);
$site_adresi = urldecode($fk2[0]);


$gk1 = explode("[reklam_id]", $buldum);
$gk2 = explode("[/b]", $gk1[1]);
$reklam_id = $gk2[0];


$hk1 = explode("[reklam_tur]", $buldum);
$hk2 = explode("[/b]", $hk1[1]);
$reklam_tur = $hk2[0];

$ik1 = explode("[reklam_kategori]", $buldum);
$ik2 = explode("[/b]", $ik1[1]);
$reklam_kategori = $ik2[0];

$kk1 = explode("[reklam_veren_id]", $buldum);
$kk2 = explode("[/b]", $kk1[1]);
$reklam_veren_id = $kk2[0];




$gun = date("d");
$ay = date("m");
$yil = date("Y");
$tarih1 = mktime();
$tarih2 = date("d.m.Y");
$havuztarih = mktime()+$havuz;
$ucret = $msnpopyayinci;





$dip = str_replace(".","_", $ip);
$disims1 = $dip."__".$yayinci_kimlik."__".$reklam_tur."__".$site_id;
$dosyax1 = "ip_cache/".$disims1.".txt";
$icerik1 = @file($dosyax1);

if ($icerik1) {
$buldum = $icerik1[0];
$veri = str_replace("[value]TRUE[/value][time]", "", $buldum);
$veri = str_replace("[/time]", "", $veri);
$htarih = $veri;
$btarih = mktime();
if ($htarih < $btarih) { @unlink($dosyax1); }
}






$dip = str_replace(".","_", $ip);
$disims1 = $dip."__".$yayinci_kimlik."__".$reklam_tur."__".$site_id;
$dosyax1 = "ip_cache/".$disims1.".txt";
$icerik1 = @file($dosyax1);

if (!$icerik1) {
$verim1 = "[value]TRUE[/value][time]".$havuztarih."[/time]";
$dt = fopen($dosyax1, 'w');
fwrite($dt, $verim1);
fclose($dt);



$sys_ad = "system_cache/".$gun."_".$ay."_".$yil."_".$yayinci_kimlik."_".$site_id."_".$reklam_tur.".sys";
$sys_sorgu = @file($sys_ad);
if (!$sys_sorgu) { $sys_text = "TRUE"; $sys_yaz = fopen($sys_ad, 'w'); fwrite($sys_yaz, $sys_text); fclose($sys_yaz);

$sor = @mysql_num_rows(mysql_query("select * from msn_sayimlar where gun = '$gun' and ay = '$ay' and yil = '$yil' and yayinci_kimlik = '$yayinci_kimlik' and  site_id = '$site_id'"));
if ($sor < 1) { $yali = @mysql_query("insert into msn_sayimlar (yayinci_kimlik, sayi, gun, ay, yil , ucret, alacak, site_id, yayinci_id, tarih, site_adresi, tarih2 ) values ('$yayinci_kimlik', '0', '$gun', '$ay', '$yil', '$ucret', '0', '$site_id', '$yayinci_id', '$tarih1', '$site_adresi', '$tarih2')"); }
}



$puanver = @mysql_query("UPDATE msn_sayimlar SET sayi = sayi+1 where gun = '$gun' and ay = '$ay' and yil = '$yil' and site_id = '$site_id' and yayinci_kimlik = '$yayinci_kimlik'");

}







$dip = str_replace(".","_", $ip);
$disims2 = $dip."__".$yayinci_kimlik."__".$reklam_id."__".$reklam_tur."__".$site_id;
$dosyax2 = "ip_cache_2/".$disims2.".txt";
$icerik2 = @file($dosyax2);

if ($icerik2) {
$buldum = $icerik2[0];
$veri = str_replace("[value]TRUE[/value][time]", "", $buldum);
$veri = str_replace("[/time]", "", $veri);
$htarih = $veri;
$btarih = mktime();
if ($htarih < $btarih) { @unlink($dosyax2); }
}






$dip = str_replace(".","_", $ip);
$disims2 = $dip."__".$yayinci_kimlik."__".$reklam_id."__".$reklam_tur."__".$site_id;
$dosyax2 = "ip_cache_2/".$disims2.".txt";
$icerik2 = @file($dosyax2);

if (!$icerik2) {


$verim2 = "[value]TRUE[/value][time]".$havuztarih."[/time]";
$dt = fopen($dosyax2, 'w');
fwrite($dt, $verim2);
fclose($dt);

$guncelle1 = @mysql_query("UPDATE msn_reklamlar SET suan = suan+1, bugun = bugun+1 where id = '$reklam_id'");
$ekle2 = @mysql_query("insert into reklam_kayitlar (reklam_veren_id, yayinci_kimlik, yayinci_site, tiklayan_site, tarih, reklam_tur, reklam_id, tarih2,ref_site, kategori, ip) values ('$reklam_veren_id', '$yayinci_kimlik', '$site_adresi', '$yurl', '$tarih1', '$reklam_tur', '$reklam_id', '$tarih2', '$ref', '$reklam_kategori', '$ip')");
}










@unlink($dosya);


}}



















}
mysql_close($sqlconnect);
?>