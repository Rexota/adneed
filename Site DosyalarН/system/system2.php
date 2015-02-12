<?
	function sql($veri){ 
$veri = str_replace("<","&lt;",$veri);
$veri = str_replace(">","&gt;",$veri);
$veri = str_replace("[","&#091;",$veri);
$veri = str_replace("]","&#093;",$veri);
$veri = str_replace("'","&#39;",$veri);
$veri = str_replace("‘","&lsquo;",$veri);
$veri = str_replace("’","&rsquo;",$veri);
$veri = str_replace("\n","\n",$veri);
return $veri;
}


function email_kontrol($input) {
$kontrol = preg_match('#^[a-z0-9.!\#$%&\'*+-/=?^_`{|}~]+@([0-9.]+|([^\s\'"<>]+\.+[a-z]{2,6}))$#si', $input);
if (!$kontrol) {  
die('<img src="extra/notification-exclamation.gif"> Email Adresiniz Geçersizdir !');
}
}




function tel_kontrol($input) {
$bul = str_replace(" ", "", $input);
if (!ctype_alnum($bul)) {
die('<img src="extra/notification-exclamation.gif"> Telefon Numaranız Sadece Rakamlardan Oluşabilir !');
}

if (strlen($bul) != "11") {
die('<img src="extra/notification-exclamation.gif"> Telefon Numaranız 11 Haneden Oluşmalıdır !');
}
}





function tiku_kontrol($input,$resim,$isim) {

if (strlen($input) != "6") { die($resim." ".$isim." <font color=red><b>Formatı Hatalıdır. Örn: 0.0000</b></font>"); }

$bir = substr("$input",0,1);
$iki = substr("$input",1,1);
$dort = substr("$input",2,4);


if (!ctype_alnum($bir)) { die($resim." ".$isim." <font color=red><b>İlk karakteri Rakam olmalıdır !</b></font>"); }
if ($iki!=".") { die($resim." ".$isim." <font color=red><b>İkinci karakteri Nokta Olmalıdır!</b></font>"); }
if (!ctype_alnum($dort)) { die($resim." ".$isim." <font color=red><b>Nokta'dan sonraki 4 Karakter Rakam olmalıdır !</b></font>"); }



}





function ad_kontrol($input) {
$bul = str_replace(" ", "", $input);
$bul = str_replace("ğ", "", $bul);
$bul = str_replace("ü", "", $bul);
$bul = str_replace("ö", "", $bul);
$bul = str_replace("ç", "", $bul);
$bul = str_replace("ı", "", $bul);
$bul = str_replace("Ğ", "", $bul);
$bul = str_replace("Ü", "", $bul);
$bul = str_replace("Ö", "", $bul);
$bul = str_replace("Ç", "", $bul);
$bul = str_replace("İ", "", $bul);
$bul = str_replace("Ş", "", $bul);
$bul = str_replace("ş", "", $bul);
if(!ctype_alpha($bul)) {
die('<img src="extra/notification-exclamation.gif"> Adınız ve Soyadınızda Sadece Harfler Kullanabilirsiniz !');
}
}




function user_kontrol($input) {
$aValid = array('-', '_');
if(!ctype_alnum(str_replace($aValid, '', $input))) {
die('<img src="extra/notification-exclamation.gif"> Kullanıcı Adınızda desteklenmeyen karakterler mevcut !');
}
}



function sifre_kontrol($input) {
if (strlen($input) < 5 ) {
die('<img src="extra/notification-exclamation.gif"> Şifreniz 5 Karakterden Az Olamaz !');
}

$aValid = array('-', '_');
if(!ctype_alnum(str_replace($aValid, '', $input))) {
die('<img src="extra/notification-exclamation.gif"> Şifrenizde desteklenmeyen karakterler mevcut !');
} 
}



function site_kontrol($site) {

if (mysql_num_rows(mysql_query("select * from sitelerim where adres = '$site' and onay = 1"))>0) {
die("SITE");
}

$cibabam = str_replace("http://", "", $site);
$cibabam = "http://www.".$cibabam;

if (mysql_num_rows(mysql_query("select * from sitelerim where adres = '$cibabam' and onay = 1"))>0) {
die("SITE");
}

}



function kod_getir($deger,$istek) {

$bizimsite = str_replace("http://","", "$deger");
$bizimsite = str_replace("www.","", "$bizimsite");
$bizimsite = str_replace("/","", "$bizimsite");


$google = "and tiklayan_site like '%$bizimsite%' and (ref_site like '%209.85.227.99%' or ref_site like '%209.85.148.99%' or ref_site like '%.google.%' or ref_site like '%74.125.230.114%' or ref_site like '%webcache.googleusercontent.com%')";

$yahoo = "and tiklayan_site like '%$bizimsite%' and (ref_site like '%yahoo.com%')";

$bing = "and tiklayan_site like '%$bizimsite%' and (ref_site like '%bing.com%' or ref_site like '%bingj.com%')";

$diger = "and tiklayan_site like '%$bizimsite%' and (ref_site like '%yandex.%' or ref_site like '%search.ultrareach.net%' or ref_site like '%search.searchcompletion.com%' or ref_site like '%search.imesh.com%' or ref_site like '%advancedsearch.virginmedia.com%' or ref_site like '%yandex.ru%' or ref_site like '%.conduit.%' or ref_site like '%.babylon.%' or ref_site like '%.rambler.ru%' or ref_site like '%search.bearshare.com%' or ref_site like '%.sweetim.%' or ref_site like '%go.mail.ru%' or ref_site like '%search.avg.com%' or ref_site like '%.incredimail.%' or ref_site like '%.iminent.%' or ref_site like '%start.facemoods.com%' or ref_site like '%rss2search.com%')";

$facebook = "and tiklayan_site like '%$bizimsite%' and (ref_site like '%facebook.com%')";

$noref = "and tiklayan_site like '%$bizimsite%' and ref_site=''";

$supeli = "and tiklayan_site NOT LIKE '%$bizimsite%'";

$hile = "and ref_site !='' and (ref_site not like '%$bizimsite%' and ref_site not like '%yandex.%' and ref_site not like '%search.ultrareach.net%' and ref_site not like '%facebook.com%' and ref_site not like '%search.searchcompletion.com%' and ref_site not like '%search.imesh.com%' and ref_site not like '%advancedsearch.virginmedia.com%' and ref_site not like '%209.85.227.99%' and ref_site not like '%209.85.148.99%' and ref_site not like '%bing.com%' and ref_site not like '%yahoo.com%' and ref_site not like '%.google.%' and ref_site not like '%74.125.230.114%' and ref_site not like '%yandex.ru%' and ref_site not like '%.conduit.%' and ref_site not like '%.babylon.%' and ref_site not like '%.rambler.ru%' and ref_site not like '%search.bearshare.com%' and ref_site not like '%bingj.com%' and ref_site not like '%.sweetim.%' and ref_site not like '%go.mail.ru%' and ref_site not like '%search.avg.com%' and ref_site not like '%.incredimail.%' and ref_site not like '%.iminent.%' and ref_site not like '%webcache.googleusercontent.com%' and ref_site not like '%start.facemoods.com%' and ref_site not like '%rss2search.com%')";

$siteici = "and tiklayan_site like '%$bizimsite%' and ref_site like '%$bizimsite%' and ref_site !='' and (ref_site not like '%yandex.%' and ref_site not like '%search.ultrareach.net%' and ref_site not like '%facebook.com%' and ref_site not like '%search.searchcompletion.com%' and ref_site not like '%search.imesh.com%' and ref_site not like '%advancedsearch.virginmedia.com%' and ref_site not like '%209.85.227.99%' and ref_site not like '%209.85.148.99%' and ref_site not like '%bing.com%' and ref_site not like '%yahoo.com%' and ref_site not like '%.google.%' and ref_site not like '%74.125.230.114%' and ref_site not like '%yandex.ru%' and ref_site not like '%.conduit.%' and ref_site not like '%.babylon.%' and ref_site not like '%.rambler.ru%' and ref_site not like '%search.bearshare.com%' and ref_site not like '%bingj.com%' and ref_site not like '%.sweetim.%' and ref_site not like '%go.mail.ru%' and ref_site not like '%search.avg.com%' and ref_site not like '%.incredimail.%' and ref_site not like '%.iminent.%' and ref_site not like '%webcache.googleusercontent.com%' and ref_site not like '%start.facemoods.com%' and ref_site not like '%rss2search.com%')";

$tumu = "";


if ($istek=="google") { 
return $google;
}
if ($istek=="yahoo") { 
return $yahoo;
}
if ($istek=="bing") { 
return $bing;
}
if ($istek=="diger") { 
return $diger;
}
if ($istek=="facebook") { 
return $facebook;
}
if ($istek=="noref") { 
return $noref;
}
if ($istek=="supeli") { 
return $supeli;
}
if ($istek=="hile") { 
return $hile;
}
if ($istek=="siteici") { 
return $siteici;
}
if ($istek=="tumu") { 
return $tumu;
}


}






function yayim_suresi($deger) {

if ($deger=="0") {
$enter = "Maximum";
} else {
$enter = "$deger Gün";
}
return $enter;
}

function kategori_bul($deger) {
$yali = @mysql_fetch_array(mysql_query("select * from kategoriler where id = '$deger'"));
return $yali[name];
}


function reklam_durum($deger) {

switch($deger) {
case "0": $yazimiz = '<font color="red">Ödeme Bekleniyor</font>'; break;
case "1": $yazimiz = '<font color="green">Gösterimde</font>'; break;
case "2": $yazimiz = '<font color="#FF9933">Bitti</font>'; break;
}

return $yazimiz;
}

function reklam_kategori($deger) {

$bul = @mysql_fetch_array(@mysql_query("select * from kategoriler where id = '$deger'"));

return $bul[name];
}



function popup_rapor($deger) {
return "";
}

function splash_rapor($deger) {
return "";
}

function msn_rapor($deger) {
return "";
}

function ppc_rapor($deger) {
return "";
}


function admin_popup_rapor($deger) {
return "";
}

function admin_splash_rapor($deger) {
return "";
}

function admin_msn_rapor($deger) {
return "";
}

function admin_ppc_rapor($deger) {
return "";
}

function reklam_durum_2($deger,$id) {

$bul = @mysql_fetch_array(mysql_query("select * from splash_reklamlar where id = '$id'"));

if ($bul[resim]=='') {
$yazimiz = '<font color="red">Resim Bekleniyor</font>';
} else {

switch($deger) {
case "0": $yazimiz = '<font color="red">Ödeme Bekleniyor</font>'; break;
case "1": $yazimiz = '<font color="green">Gösterimde</font>'; break;
case "2": $yazimiz = '<font color="#FF9933">Bitti</font>'; break;
}
}

return $yazimiz;
}


function reklam_durum_3($deger,$id) {

$bul = @mysql_fetch_array(mysql_query("select * from msn_reklamlar where id = '$id'"));

if ($bul[resim]=='') {
$yazimiz = '<font color="red">Resim Bekleniyor</font>';
} else {

switch($deger) {
case "0": $yazimiz = '<font color="red">Ödeme Bekleniyor</font>'; break;
case "1": $yazimiz = '<font color="green">Gösterimde</font>'; break;
case "2": $yazimiz = '<font color="#FF9933">Bitti</font>'; break;
}
}

return $yazimiz;
}


function reklam_durum_4($deger,$id) {

$bul = @mysql_fetch_array(mysql_query("select * from ppc_reklamlar where id = '$id'"));

if ($bul[resim]=='') {
$yazimiz = '<font color="red">Resim Bekleniyor</font>';
} else {

switch($deger) {
case "0": $yazimiz = '<font color="red">Ödeme Bekleniyor</font>'; break;
case "1": $yazimiz = '<font color="green">Gösterimde</font>'; break;
case "2": $yazimiz = '<font color="#FF9933">Bitti</font>'; break;
}
}

return $yazimiz;
}



function satir($veri){ 
$veri = str_replace("\n","<br />",$veri);
return $veri;
}

?>
<?



function popup_bugun_kazanc_site($id,$uid) {
$gun = date("d"); $ay = date("m"); $yil = date("Y");


if ($uid=='') {
$sor = @mysql_query("select * from popup_sayimlar where yayinci_kimlik = '$_SESSION[kimlik]' and yayinci_id = '$_SESSION[userid]' and site_id = '$id' and gun = '$gun' and ay = '$ay' and yil = '$yil'");
} else {
$sor = @mysql_query("select * from popup_sayimlar where yayinci_id = '$uid' and site_id = '$id' and gun = '$gun' and ay = '$ay' and yil = '$yil'");
}

if (@mysql_num_rows($sor) < 1) { $popup_kazanc = "0";  } else { $yaz = @mysql_fetch_array($sor); $popup_kazanc = $yaz[alacak]; }
$popup_kazanc = str_replace(",","", $popup_kazanc);
return $popup_kazanc;
}


function splash_bugun_kazanc_site($id,$uid) {
$gun = date("d"); $ay = date("m"); $yil = date("Y");

if ($uid=='') {
$sor = @mysql_query("select * from splash_sayimlar where yayinci_kimlik = '$_SESSION[kimlik]' and yayinci_id = '$_SESSION[userid]' and site_id = '$id' and gun = '$gun' and ay = '$ay' and yil = '$yil'");
} else {
$sor = @mysql_query("select * from splash_sayimlar where yayinci_id = '$uid' and site_id = '$id' and gun = '$gun' and ay = '$ay' and yil = '$yil'");
}

if (@mysql_num_rows($sor) < 1) { $popup_kazanc = "0";  } else { $yaz = @mysql_fetch_array($sor); $popup_kazanc = $yaz[alacak]; }
$popup_kazanc = str_replace(",","", $popup_kazanc);
return $popup_kazanc;
}


function msn_bugun_kazanc_site($id,$uid) {
$gun = date("d"); $ay = date("m"); $yil = date("Y");

if ($uid=='') {
$sor = @mysql_query("select * from msn_sayimlar where yayinci_kimlik = '$_SESSION[kimlik]' and yayinci_id = '$_SESSION[userid]' and site_id = '$id' and gun = '$gun' and ay = '$ay' and yil = '$yil'");
} else {
$sor = @mysql_query("select * from msn_sayimlar where yayinci_id = '$uid' and site_id = '$id' and gun = '$gun' and ay = '$ay' and yil = '$yil'");
}

if (@mysql_num_rows($sor) < 1) { $popup_kazanc = "0";  } else { $yaz = @mysql_fetch_array($sor); $popup_kazanc = $yaz[alacak]; }
$popup_kazanc = str_replace(",","", $popup_kazanc);
return $popup_kazanc;
}

function ppc_bugun_kazanc_site($id,$uid) {
$gun = date("d"); $ay = date("m"); $yil = date("Y");

if ($uid=='') {
$sor = @mysql_query("select * from ppc_sayimlar where yayinci_kimlik = '$_SESSION[kimlik]' and yayinci_id = '$_SESSION[userid]' and site_id = '$id' and gun = '$gun' and ay = '$ay' and yil = '$yil'");
} else {
$sor = @mysql_query("select * from ppc_sayimlar where yayinci_id = '$uid' and site_id = '$id' and gun = '$gun' and ay = '$ay' and yil = '$yil'");
}

if (@mysql_num_rows($sor) < 1) { $ppc_kazanc = "0";  } else { $yaz = @mysql_fetch_array($sor); $ppc_kazanc = $yaz[alacak]; }
$ppc_kazanc = str_replace(",","", $ppc_kazanc);
return $ppc_kazanc;
}












function popup_bugun_sayim_site($id,$uid) {
$gun = date("d"); $ay = date("m"); $yil = date("Y");

if ($uid=='') {
$sor = @mysql_query("select * from popup_sayimlar where yayinci_kimlik = '$_SESSION[kimlik]' and yayinci_id = '$_SESSION[userid]' and site_id = '$id' and gun = '$gun' and ay = '$ay' and yil = '$yil'");
} else {
$sor = @mysql_query("select * from popup_sayimlar where yayinci_id = '$uid' and site_id = '$id' and gun = '$gun' and ay = '$ay' and yil = '$yil'");
}

if (@mysql_num_rows($sor) < 1) { $sonuc_sayim = "0";  } else { $yaz = @mysql_fetch_array($sor); $sonuc_sayim = $yaz[sayi]; }
$sonuc_sayim = str_replace(",","", $sonuc_sayim);
return $sonuc_sayim;
}




function splash_bugun_sayim_site($id,$uid) {
$gun = date("d"); $ay = date("m"); $yil = date("Y");


if ($uid=='') {
$sor = @mysql_query("select * from splash_sayimlar where yayinci_kimlik = '$_SESSION[kimlik]' and yayinci_id = '$_SESSION[userid]' and site_id = '$id' and gun = '$gun' and ay = '$ay' and yil = '$yil'");
} else {
$sor = @mysql_query("select * from splash_sayimlar where yayinci_id = '$uid' and site_id = '$id' and gun = '$gun' and ay = '$ay' and yil = '$yil'");
}

if (@mysql_num_rows($sor) < 1) { $sonuc_sayim = "0";  } else { $yaz = @mysql_fetch_array($sor); $sonuc_sayim = $yaz[sayi]; }
$sonuc_sayim = str_replace(",","", $sonuc_sayim);
return $sonuc_sayim;
}





function msn_bugun_sayim_site($id,$uid) {
$gun = date("d"); $ay = date("m"); $yil = date("Y");

if ($uid=='') {
$sor = @mysql_query("select * from msn_sayimlar where yayinci_kimlik = '$_SESSION[kimlik]' and yayinci_id = '$_SESSION[userid]' and site_id = '$id' and gun = '$gun' and ay = '$ay' and yil = '$yil'");
} else {
$sor = @mysql_query("select * from msn_sayimlar where yayinci_id = '$uid' and site_id = '$id' and gun = '$gun' and ay = '$ay' and yil = '$yil'");
}


if (@mysql_num_rows($sor) < 1) { $sonuc_sayim = "0";  } else { $yaz = @mysql_fetch_array($sor); $sonuc_sayim = $yaz[sayi]; }
$sonuc_sayim = str_replace(",","", $sonuc_sayim);
return $sonuc_sayim;
}

function ppc_bugun_sayim_site($id,$uid) {
$gun = date("d"); $ay = date("m"); $yil = date("Y");

if ($uid=='') {
$sor = @mysql_query("select * from ppc_sayimlar where yayinci_kimlik = '$_SESSION[kimlik]' and yayinci_id = '$_SESSION[userid]' and site_id = '$id' and gun = '$gun' and ay = '$ay' and yil = '$yil'");
} else {
$sor = @mysql_query("select * from ppc_sayimlar where yayinci_id = '$uid' and site_id = '$id' and gun = '$gun' and ay = '$ay' and yil = '$yil'");
}


if (@mysql_num_rows($sor) < 1) { $sonuc_sayim = "0";  } else { $yaz = @mysql_fetch_array($sor); $sonuc_sayim = $yaz[sayi]; }
$sonuc_sayim = str_replace(",","", $sonuc_sayim);
return $sonuc_sayim;
}









function popup_bugun_sayim_site_cogul($id,$uid) {
$gun = date("d"); $ay = date("m"); $yil = date("Y");


if ($uid=='') {
$sor = @mysql_query("select * from popup_sayimlar where yayinci_kimlik = '$_SESSION[kimlik]' and yayinci_id = '$_SESSION[userid]' and site_id = '$id' and gun = '$gun' and ay = '$ay' and yil = '$yil'");
} else {
$sor = @mysql_query("select * from popup_sayimlar where yayinci_id = '$uid' and site_id = '$id' and gun = '$gun' and ay = '$ay' and yil = '$yil'");
}

if (@mysql_num_rows($sor) < 1) { $sonuc_sayim = "0";  } else { $yaz = @mysql_fetch_array($sor); $sonuc_sayim = $yaz[cogul]; }
$sonuc_sayim = str_replace(",","", $sonuc_sayim);
return $sonuc_sayim;
}


function splash_bugun_sayim_site_cogul($id,$uid) {
$gun = date("d"); $ay = date("m"); $yil = date("Y");

if ($uid=='') {
$sor = @mysql_query("select * from splash_sayimlar where yayinci_kimlik = '$_SESSION[kimlik]' and yayinci_id = '$_SESSION[userid]' and site_id = '$id' and gun = '$gun' and ay = '$ay' and yil = '$yil'");
} else {
$sor = @mysql_query("select * from splash_sayimlar where yayinci_id = '$uid' and site_id = '$id' and gun = '$gun' and ay = '$ay' and yil = '$yil'");
}

if (@mysql_num_rows($sor) < 1) { $sonuc_sayim = "0";  } else { $yaz = @mysql_fetch_array($sor); $sonuc_sayim = $yaz[cogul]; }
$sonuc_sayim = str_replace(",","", $sonuc_sayim);
return $sonuc_sayim;
}


function msn_bugun_sayim_site_cogul($id,$uid) {
$gun = date("d"); $ay = date("m"); $yil = date("Y");

if ($uid=='') {
$sor = @mysql_query("select * from msn_sayimlar where yayinci_kimlik = '$_SESSION[kimlik]' and yayinci_id = '$_SESSION[userid]' and site_id = '$id' and gun = '$gun' and ay = '$ay' and yil = '$yil'");
} else {
$sor = @mysql_query("select * from msn_sayimlar where yayinci_id = '$uid' and site_id = '$id' and gun = '$gun' and ay = '$ay' and yil = '$yil'");
}

if (@mysql_num_rows($sor) < 1) { $sonuc_sayim = "0";  } else { $yaz = @mysql_fetch_array($sor); $sonuc_sayim = $yaz[cogul]; }
$sonuc_sayim = str_replace(",","", $sonuc_sayim);
return $sonuc_sayim;
}

function ppc_bugun_sayim_site_cogul($id,$uid) {
$gun = date("d"); $ay = date("m"); $yil = date("Y");

if ($uid=='') {
$sor = @mysql_query("select * from ppc_sayimlar where yayinci_kimlik = '$_SESSION[kimlik]' and yayinci_id = '$_SESSION[userid]' and site_id = '$id' and gun = '$gun' and ay = '$ay' and yil = '$yil'");
} else {
$sor = @mysql_query("select * from ppc_sayimlar where yayinci_id = '$uid' and site_id = '$id' and gun = '$gun' and ay = '$ay' and yil = '$yil'");
}

if (@mysql_num_rows($sor) < 1) { $sonuc_sayim = "0";  } else { $yaz = @mysql_fetch_array($sor); $sonuc_sayim = $yaz[cogul]; }
$sonuc_sayim = str_replace(",","", $sonuc_sayim);
return $sonuc_sayim;
}












function bugun_kazanc() {

$gun = date("d");
$ay = date("m");
$yil = date("Y");


$hepsi1 = @mysql_query("select * from popup_sayimlar where yayinci_kimlik = '$_SESSION[kimlik]' and yayinci_id = '$_SESSION[userid]' and gun = '$gun' and ay = '$ay' and yil = '$yil'");
if (@mysql_num_rows($hepsi1)<1) { $popup_kazanc = "0"; } else {
while( $yaz1 = @mysql_fetch_array($hepsi1)) {
$popup_kazanc = $popup_kazanc+$yaz1[alacak];
}
$popup_kazanc = str_replace(",","", $popup_kazanc);
}


$hepsi2 = @mysql_query("select * from splash_sayimlar where yayinci_kimlik = '$_SESSION[kimlik]' and yayinci_id = '$_SESSION[userid]' and gun = '$gun' and ay = '$ay' and yil = '$yil'");
if (@mysql_num_rows($hepsi2)<1) { $splash_kazanc = "0"; } else {
while( $yaz2 = @mysql_fetch_array($hepsi2)) {
$splash_kazanc = $splash_kazanc+$yaz2[alacak];
}
$splash_kazanc = str_replace(",","", $splash_kazanc);
}


$hepsi3 = @mysql_query("select * from msn_sayimlar where yayinci_kimlik = '$_SESSION[kimlik]' and yayinci_id = '$_SESSION[userid]' and gun = '$gun' and ay = '$ay' and yil = '$yil'");
if (@mysql_num_rows($hepsi3)<1) { $msn_kazanc = "0"; } else {
while( $yaz3 = @mysql_fetch_array($hepsi3)) {
$msn_kazanc = $msn_kazanc+$yaz3[alacak];
}
$msn_kazanc = str_replace(",","", $msn_kazanc);
}

$hepsi4 = @mysql_query("select * from ppc_sayimlar where yayinci_kimlik = '$_SESSION[kimlik]' and yayinci_id = '$_SESSION[userid]' and gun = '$gun' and ay = '$ay' and yil = '$yil'");
if (@mysql_num_rows($hepsi4)<1) { $ppc_kazanc = "0"; } else {
while( $yaz4 = @mysql_fetch_array($hepsi4)) {
$ppc_kazanc = $ppc_kazanc+$yaz4[alacak];
}
$ppc_kazanc = str_replace(",","", $ppc_kazanc);
}

$bugun_kazanc = $popup_kazanc+$splash_kazanc+$msn_kazanc+$ppc_kazanc;
$bugun_kazanc = str_replace(",","", $bugun_kazanc);

return $bugun_kazanc;
}



function u_pop($kimlik, $yayinci_id, $site) {
$hepsi1 = @mysql_query("select * from popup_sayimlar where yayinci_kimlik = '$kimlik' and yayinci_id = '$yayinci_id' and site_id = '$site'");
if (@mysql_num_rows($hepsi1)<1) { $popup_kazanc = "0"; } else {
while( $yaz1 = @mysql_fetch_array($hepsi1)) {
$popup_kazanc = $popup_kazanc+$yaz1[alacak];
}
$popup_kazanc = str_replace(",","", $popup_kazanc);
return $popup_kazanc;
}
}

function u_splash($kimlik, $yayinci_id, $site) {
$hepsi1 = @mysql_query("select * from splash_sayimlar where yayinci_kimlik = '$kimlik' and yayinci_id = '$yayinci_id' and site_id = '$site'");
if (@mysql_num_rows($hepsi1)<1) { $splash_kazanc = "0"; } else {
while( $yaz1 = @mysql_fetch_array($hepsi1)) {
$splash_kazanc = $splash_kazanc+$yaz1[alacak];
}
$splash_kazanc = str_replace(",","", $splash_kazanc);
return $splash_kazanc;
}
}

function u_msn($kimlik, $yayinci_id, $site) {
$hepsi1 = @mysql_query("select * from msn_sayimlar where yayinci_kimlik = '$kimlik' and yayinci_id = '$yayinci_id' and site_id = '$site'");
if (@mysql_num_rows($hepsi1)<1) { $msn_kazanc = "0"; } else {
while( $yaz1 = @mysql_fetch_array($hepsi1)) {
$msn_kazanc = $msn_kazanc+$yaz1[alacak];
}
$msn_kazanc = str_replace(",","", $msn_kazanc);
return $msn_kazanc;
}
}






function hesap_bakiye() {

$hepsi1 = @mysql_query("select * from popup_sayimlar where yayinci_kimlik = '$_SESSION[kimlik]' and yayinci_id = '$_SESSION[userid]'");
if (@mysql_num_rows($hepsi1)<1) { $popup_kazanc = "0"; } else {
while( $yaz1 = @mysql_fetch_array($hepsi1)) {
$popup_kazanc = $popup_kazanc+$yaz1[alacak];
}
$popup_kazanc = str_replace(",","", $popup_kazanc);
}


$hepsi2 = @mysql_query("select * from splash_sayimlar where yayinci_kimlik = '$_SESSION[kimlik]' and yayinci_id = '$_SESSION[userid]'");
if (@mysql_num_rows($hepsi2)<1) { $splash_kazanc = "0"; } else {
while( $yaz2 = @mysql_fetch_array($hepsi2)) {
$splash_kazanc = $splash_kazanc+$yaz2[alacak];
}
$splash_kazanc = str_replace(",","", $splash_kazanc);
}


$hepsi3 = @mysql_query("select * from msn_sayimlar where yayinci_kimlik = '$_SESSION[kimlik]' and yayinci_id = '$_SESSION[userid]'");
if (@mysql_num_rows($hepsi3)<1) { $msn_kazanc = "0"; } else {
while( $yaz3 = @mysql_fetch_array($hepsi3)) {
$msn_kazanc = $msn_kazanc+$yaz3[alacak];
}
$msn_kazanc = str_replace(",","", $msn_kazanc);
}

$hepsi4 = @mysql_query("select * from ppc_sayimlar where yayinci_kimlik = '$_SESSION[kimlik]' and yayinci_id = '$_SESSION[userid]'");
if (@mysql_num_rows($hepsi4)<1) { $ppc_kazanc = "0"; } else {
while( $yaz4 = @mysql_fetch_array($hepsi4)) {
$ppc_kazanc = $ppc_kazanc+$yaz4[alacak];
}
$ppc_kazanc = str_replace(",","", $ppc_kazanc);
}


$toplam_kazanc = $popup_kazanc+$splash_kazanc+$msn_kazanc+$ppc_kazanc;
$toplam_kazanc = str_replace(",","", $toplam_kazanc);


$hepsi5 = @mysql_query("select * from yayinci_odeme where yayinci_id = '$_SESSION[userid]'");
if (@mysql_num_rows($hepsi5)<1) { $alinan = "0"; } else {
while( $bul2 = @mysql_fetch_array($hepsi5)) {
$alinan = $alinan+$bul2[tutar];
}
$alinan = str_replace(",","", $alinan);
}

$sonuc_kazanc = $toplam_kazanc-$alinan;
$sonuc_kazanc = str_replace(",","", $sonuc_kazanc);

return $sonuc_kazanc;

}






function admin_bakiye($kimlik, $uid) {

$hepsi1 = @mysql_query("select * from popup_sayimlar where yayinci_kimlik = '$kimlik' and yayinci_id = '$uid'");
if (@mysql_num_rows($hepsi1)<1) { $popup_kazanc = "0"; } else {
while( $yaz1 = @mysql_fetch_array($hepsi1)) {
$popup_kazanc = $popup_kazanc+$yaz1[alacak];
}
$popup_kazanc = str_replace(",","", $popup_kazanc);
}


$hepsi2 = @mysql_query("select * from splash_sayimlar where yayinci_kimlik = '$kimlik' and yayinci_id = '$uid'");
if (@mysql_num_rows($hepsi2)<1) { $splash_kazanc = "0"; } else {
while( $yaz2 = @mysql_fetch_array($hepsi2)) {
$splash_kazanc = $splash_kazanc+$yaz2[alacak];
}
$splash_kazanc = str_replace(",","", $splash_kazanc);
}


$hepsi3 = @mysql_query("select * from msn_sayimlar where yayinci_kimlik = '$kimlik' and yayinci_id = '$uid'");
if (@mysql_num_rows($hepsi3)<1) { $msn_kazanc = "0"; } else {
while( $yaz3 = @mysql_fetch_array($hepsi3)) {
$msn_kazanc = $msn_kazanc+$yaz3[alacak];
}
$msn_kazanc = str_replace(",","", $msn_kazanc);
}

$hepsi4 = @mysql_query("select * from ppc_sayimlar where yayinci_kimlik = '$kimlik' and yayinci_id = '$uid'");
if (@mysql_num_rows($hepsi4)<1) { $ppc_kazanc = "0"; } else {
while( $yaz4 = @mysql_fetch_array($hepsi4)) {
$ppc_kazanc = $ppc_kazanc+$yaz4[alacak];
}
$ppc_kazanc = str_replace(",","", $ppc_kazanc);
}


$toplam_kazanc = $popup_kazanc+$splash_kazanc+$msn_kazanc+$ppc_kazanc;
$toplam_kazanc = str_replace(",","", $toplam_kazanc);


$hepsi5 = @mysql_query("select * from yayinci_odeme where yayinci_id = '$uid'");
if (@mysql_num_rows($hepsi5)<1) { $alinan = "0"; } else {
while( $bul2 = @mysql_fetch_array($hepsi5)) {
$alinan = $alinan+$bul2[tutar];
}
$alinan = str_replace(",","", $alinan);
}

$sonuc_kazanc = $toplam_kazanc-$alinan;
$sonuc_kazanc = str_replace(",","", $sonuc_kazanc);

return $sonuc_kazanc;

}
















function admin_toplam_kazanc($kimlik, $uid) {

$hepsi1 = @mysql_query("select * from popup_sayimlar where yayinci_kimlik = '$kimlik' and yayinci_id = '$uid'");
if (@mysql_num_rows($hepsi1)<1) { $popup_kazanc = "0"; } else {
while( $yaz1 = @mysql_fetch_array($hepsi1)) {
$popup_kazanc = $popup_kazanc+$yaz1[alacak];
}
$popup_kazanc = str_replace(",","", $popup_kazanc);
}


$hepsi2 = @mysql_query("select * from splash_sayimlar where yayinci_kimlik = '$kimlik' and yayinci_id = '$uid'");
if (@mysql_num_rows($hepsi2)<1) { $splash_kazanc = "0"; } else {
while( $yaz2 = @mysql_fetch_array($hepsi2)) {
$splash_kazanc = $splash_kazanc+$yaz2[alacak];
}
$splash_kazanc = str_replace(",","", $splash_kazanc);
}


$hepsi3 = @mysql_query("select * from msn_sayimlar where yayinci_kimlik = '$kimlik' and yayinci_id = '$uid'");
if (@mysql_num_rows($hepsi3)<1) { $msn_kazanc = "0"; } else {
while( $yaz3 = @mysql_fetch_array($hepsi3)) {
$msn_kazanc = $msn_kazanc+$yaz3[alacak];
}
$msn_kazanc = str_replace(",","", $msn_kazanc);
}

$hepsi4 = @mysql_query("select * from ppc_sayimlar where yayinci_kimlik = '$kimlik' and yayinci_id = '$uid'");
if (@mysql_num_rows($hepsi4)<1) { $ppc_kazanc = "0"; } else {
while( $yaz4 = @mysql_fetch_array($hepsi4)) {
$ppc_kazanc = $ppc_kazanc+$yaz4[alacak];
}
$ppc_kazanc = str_replace(",","", $ppc_kazanc);
}


$toplam_kazanc = $popup_kazanc+$splash_kazanc+$msn_kazanc+$ppc_kazanc;
$toplam_kazanc = str_replace(",","", $toplam_kazanc);



$sonuc_kazanc = $toplam_kazanc;
$sonuc_kazanc = str_replace(",","", $sonuc_kazanc);

return $sonuc_kazanc;

}








function admin_toplam_alinan($kimlik, $uid) {


$hepsi5 = @mysql_query("select * from yayinci_odeme where yayinci_id = '$uid'");
if (@mysql_num_rows($hepsi5)<1) { $alinan = "0"; } else {
while( $bul2 = @mysql_fetch_array($hepsi5)) {
$alinan = $alinan+$bul2[tutar];
}
$alinan = str_replace(",","", $alinan);
}

$sonuc_kazanc = $alinan;
$sonuc_kazanc = str_replace(",","", $sonuc_kazanc);

return $sonuc_kazanc;

}

















function bugun_kazanc_admin($kimlik, $uid) {

$gun = date("d");
$ay = date("m");
$yil = date("Y");


$hepsi1 = @mysql_query("select * from popup_sayimlar where yayinci_id = '$uid' and gun = '$gun' and ay = '$ay' and yil = '$yil'");
if (@mysql_num_rows($hepsi1)<1) { $popup_kazanc = "0"; } else {
while( $yaz1 = @mysql_fetch_array($hepsi1)) {
$popup_kazanc = $popup_kazanc+$yaz1[alacak];
}
$popup_kazanc = str_replace(",","", $popup_kazanc);
}


$hepsi2 = @mysql_query("select * from splash_sayimlar where yayinci_id = '$uid' and gun = '$gun' and ay = '$ay' and yil = '$yil'");
if (@mysql_num_rows($hepsi2)<1) { $splash_kazanc = "0"; } else {
while( $yaz2 = @mysql_fetch_array($hepsi2)) {
$splash_kazanc = $splash_kazanc+$yaz2[alacak];
}
$splash_kazanc = str_replace(",","", $splash_kazanc);
}


$hepsi3 = @mysql_query("select * from msn_sayimlar where yayinci_id = '$uid' and gun = '$gun' and ay = '$ay' and yil = '$yil'");
if (@mysql_num_rows($hepsi3)<1) { $msn_kazanc = "0"; } else {
while( $yaz3 = @mysql_fetch_array($hepsi3)) {
$msn_kazanc = $msn_kazanc+$yaz3[alacak];
}
$msn_kazanc = str_replace(",","", $msn_kazanc);
}

$hepsi4 = @mysql_query("select * from ppc_sayimlar where yayinci_id = '$uid' and gun = '$gun' and ay = '$ay' and yil = '$yil'");
if (@mysql_num_rows($hepsi4)<1) { $ppc_kazanc = "0"; } else {
while( $yaz4 = @mysql_fetch_array($hepsi4)) {
$ppc_kazanc = $ppc_kazanc+$yaz4[alacak];
}
$ppc_kazanc = str_replace(",","", $ppc_kazanc);
}

$bugun_kazanc = $popup_kazanc+$splash_kazanc+$msn_kazanc+$ppc_kazanc;
$bugun_kazanc = str_replace(",","", $bugun_kazanc);

return $bugun_kazanc;
}













function admin_site_say($kimlik, $uid) {

$yali = @mysql_query("select * from sitelerim where user = '$uid'");
$yalibaba = @mysql_num_rows($yali);

return $yalibaba;

}




?>
<?

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

$sonuc = $popupsayi + $splashsayi + $msnsayi +$ppcsayi;
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

$sonuc = $popupsayi + $splashsayi + $msnsayi +$ppcsayi;
return $sonuc;
}
?>
<?
function alacak_guncelle() {

$hepsi = @mysql_query("select * from popup_sayimlar");
if (@mysql_num_rows($hepsi) < 1) { } else {
while($bul = @mysql_fetch_array($hepsi)) {

$yeni = $bul[sayi]*$bul[ucret];
$yeni = str_replace(",","", $yeni);

$guncelle = mysql_query("UPDATE popup_sayimlar SET alacak = '$yeni' where id = '$bul[id]'");
} }
$hepsi = @mysql_query("select * from splash_sayimlar");
if (@mysql_num_rows($hepsi) < 1) { } else {
while($bul = @mysql_fetch_array($hepsi)) {

$yeni = $bul[sayi]*$bul[ucret];
$yeni = str_replace(",","", $yeni);

$guncelle = mysql_query("UPDATE splash_sayimlar SET alacak = '$yeni' where id = '$bul[id]'");
} }
$hepsi = @mysql_query("select * from msn_sayimlar");
if (@mysql_num_rows($hepsi) < 1) { } else {
while($bul = @mysql_fetch_array($hepsi)) {

$yeni = $bul[sayi]*$bul[ucret];
$yeni = str_replace(",","", $yeni);

$guncelle = mysql_query("UPDATE msn_sayimlar SET alacak = '$yeni' where id = '$bul[id]'");

} }

}
?>