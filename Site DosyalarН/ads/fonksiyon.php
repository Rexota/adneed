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

function GetIP(){
    if(getenv("HTTP_CLIENT_IP")) {
        $ip = getenv("HTTP_CLIENT_IP");
    } elseif(getenv("HTTP_X_FORWARDED_FOR")) {
        $ip = getenv("HTTP_X_FORWARDED_FOR");
        if (strstr($ip, ',')) {
            $tmp = explode (',', $ip);
            $ip = trim($tmp[0]);
        }
    } else {
        $ip = getenv("REMOTE_ADDR");
    }
    return $ip;
}





function popup_cache_temizle() {
$dizin='cache_pop/';
$dir=scandir($dizin);
foreach($dir as $file){ clearstatcache(); if (is_file($dizin.$file)) unlink($dizin.$file); }
}

function splash_cache_temizle() {
$dizin='cache_splash/';
$dir=scandir($dizin);
foreach($dir as $file){ clearstatcache(); if (is_file($dizin.$file)) unlink($dizin.$file); }
}

function msn_cache_temizle() {
$dizin='cache_msn/';
$dir=scandir($dizin);
foreach($dir as $file){ clearstatcache(); if (is_file($dizin.$file)) unlink($dizin.$file); }
}

function ppc_cache_temizle() {
$dizin='cache_ppc/';
$dir=scandir($dizin);
foreach($dir as $file){ clearstatcache(); if (is_file($dizin.$file)) unlink($dizin.$file); }
}



function tik_kontrol($siteadresi, $turl) {

$tikurl = urldecode($turl);
$bizimurl = urldecode($siteadresi);

$surl1 = explode("http://", $tikurl);
$surl2 = explode("/", $surl1[1]);
$sorurl = $surl2[0];

$burl = str_replace("http://","", $bizimurl);
$burl = str_replace("www.","", $burl);
$burl = str_replace("/","", $burl);

if (!strstr($sorurl,$burl)){
Die("INVALID WEB SITE");
}
}

?>