<? include('db.php');
@ob_start();
@session_start();

$reklam_tur = "2";
$reklam_benzersiz = sql($_GET['r_b']);
$ref_url = $_GET['ref'];


$aysip = $_COOKIE["splash_click_user_ip"];

if ($aysip=='') {
$ip = GetIP();
setcookie("splash_click_user_ip",$ip, time()+$havuz);
} else { 
$ip = $_COOKIE["splash_click_user_ip"];
}


$dosya = "cache_splash/".$reklam_benzersiz.".txt";
$icerik = @file($dosya);

if (!$icerik) { die(""); } else {

$buldum = $icerik[0];

$k1 = explode("[k]", $buldum);
$k2 = explode("[/k]", $k1[1]);
$yayinci_kimlik = $k2[0];

$y1 = explode("[yid]", $buldum);
$y2 = explode("[/yid]", $y1[1]);
$yayinci_id = $y2[0];

$r1 = explode("[rid]", $buldum);
$r2 = explode("[/rid]", $r1[1]);
$reklam_id = $r2[0];

$rr1 = explode("[rvid]", $buldum);
$rr2 = explode("[/rvid]", $rr1[1]);
$reklam_veren_id = $rr2[0];

$rrr1 = explode("[rad]", $buldum);
$rrr2 = explode("[/rad]", $rrr1[1]);
$reklam_adresi = urldecode($rrr2[0]);


$s1 = explode("[sid]", $buldum);
$s2 = explode("[/sid]", $s1[1]);
$site_id = $s2[0];

$ss1 = explode("[sad]", $buldum);
$ss2 = explode("[/sad]", $ss1[1]);
$site_adresi = urldecode($ss2[0]);

$a1 = explode("[rk]", $buldum);
$a2 = explode("[/rk]", $a1[1]);
$reklam_kategori = $a2[0];


$cc1 = explode("[turl]", $buldum);
$cc2 = explode("[/turl]", $cc1[1]);
$tik_url = $cc2[0];




if ($yayinci_kimlik=='' or $yayinci_id=='' or $reklam_id=='' or $site_id=='' or site_adresi=='' or $reklam_kategori=='' or reklam_veren_id=='' or reklam_adresi=='') 
{ die("ERROR"); }



if ($_SESSION[$site_id] != "TRUE" and $_SESSION[$reklam_id] != "TRUE" and $_SESSION[$reklam_tur] != "TRUE" and $_SESSION[$yayinci_kimlik] != "TRUE")
{

$dosyam = "click_splash/".$reklam_benzersiz.".txt";
$verim = $verim."[dosya_adi]".$reklam_benzersiz.".txt"."[/b]";
$verim = $verim."[ref_url]".$ref_url."[/b]";
$verim = $verim."[tik_url]".$tik_url."[/b]";
$verim = $verim."[ip_adres]".$ip."[/b]";
$verim = $verim."[yayinci_kimlik]".$yayinci_kimlik."[/b]";
$verim = $verim."[yayinci_id]".$yayinci_id."[/b]";
$verim = $verim."[site_id]".$site_id."[/b]";
$verim = $verim."[site_adresi]".urlencode($site_adresi)."[/b]";
$verim = $verim."[reklam_id]".$reklam_id."[/b]";
$verim = $verim."[reklam_tur]".$reklam_tur."[/b]";
$verim = $verim."[reklam_kategori]".$reklam_kategori."[/b]";
$verim = $verim."[reklam_veren_id]".$reklam_veren_id."[/b]";
$dt = fopen($dosyam, 'w');
fwrite($dt, $verim);
fclose($dt);

$_SESSION[$site_id] = "TRUE";
$_SESSION[$reklam_id] = "TRUE";
$_SESSION[$reklam_tur] = "TRUE";
$_SESSION[$yayinci_kimlik] = "TRUE";
}




@unlink($dosya);
@header("Location: $reklam_adresi");


}
?>