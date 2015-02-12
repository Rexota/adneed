<?
header('Content-Type: text/javascript; charset=utf-8');
include('db.php');


$kimlik = sql($_GET['kimlik']);
$site = sql($_GET['site']);
$turl = urlencode($_GET['t']);
$reklam_tur = "2";




$ben = rand(9,9999);
$sen = rand(1,1111);
$obus = mktime();
$gubus = $ben+$sen+$obus;
$benzersiz = md5($obus);
$benzersiz = $ben."_".$benzersiz."_".$sen."_".$gubus;



if ($kimlik=='' or $site=='') { die(""); }






$sorgu1 = "[kimlik]".$kimlik."[c]";
$dosya1 = @file("system/userlist.txt");
foreach($dosya1 as $satir){ if (strstr($satir,$sorgu1)) { $buldum1 = $satir; break; } }
if ($buldum1=='') { die("ERROR USER"); }


$yk1 = explode("[id]", $buldum1);
$yk2 = explode("[c]", $yk1[1]);
$yayinci_id = $yk2[0];










$sorgu2 = "[id]".$site."[c][user]".$yayinci_id."[c]";
$dosya2 = @file("system/sitelist.txt");
foreach($dosya2 as $satir){ if (strstr($satir,$sorgu2)) { $buldum2 = $satir; break; } }
if ($buldum2=='') { die("ERROR SITE"); }

$aa1 = explode("[adres]", $buldum2);
$aa2 = explode("[c]", $aa1[1]);
$websitesi_adres = $aa2[0];

$kk1 = explode("[kategori]", $buldum2);
$kk2 = explode("[c]", $kk1[1]);
$websitesi_kategori = $kk2[0];








$siteadresi = urlencode($websitesi_adres);
tik_kontrol($siteadresi, $turl);




$sorgu3 = "[kategori]".$websitesi_kategori."[c]";
$dosya3 = @file("system/splashlist.txt");
foreach($dosya3 as $satir){ if (strstr($satir,$sorgu3)) { $bulundu = $bulundu.$satir."[item]"; $bulundusayi = $bulundusayi + 1; } }
if ($bulundu=='') { die("ERROR AD"); }

$verimbul = explode("[item]", $bulundu);
$salla = rand(0,$bulundusayi-1);
for($i=0; $i<count($verimbul); $i++) { }

$buldum3 = $verimbul[$salla];






$rr1 = explode("[url]", $buldum3);
$rr2 = explode("[c]", $rr1[1]);
$reklam_url = $rr2[0];

$rb1 = explode("[veren_id]", $buldum3);
$rb2 = explode("[c]", $rb1[1]);
$reklam_veren_id = $rb2[0];

$rk1 = explode("[id]", $buldum3);
$rk2 = explode("[c]", $rk1[1]);
$reklam_id = $rk2[0];

$rc1 = explode("[resim]", $buldum3);
$rc2 = explode("[c]", $rc1[1]);
$reklam_resim = $rc2[0];


$reklam_kategori = $websitesi_kategori;
$reklam_adresi = urlencode($reklam_url);



$dosya = "cache_splash/".$benzersiz.".txt";
$verim = $verim."[k]".$kimlik."[/k]";
$verim = $verim."[yid]".$yayinci_id."[/yid]";
$verim = $verim."[rid]".$reklam_id."[/rid]";
$verim = $verim."[rvid]".$reklam_veren_id."[/rvid]";
$verim = $verim."[rad]".$reklam_adresi."[/rad]";
$verim = $verim."[sid]".$site."[/sid]";
$verim = $verim."[sad]".$siteadresi."[/sad]";
$verim = $verim."[rk]".$reklam_kategori."[/rk]";
$verim = $verim."[turl]".$turl."[/turl]";
$dt = fopen($dosya, 'w');
fwrite($dt, $verim);
fclose($dt);









$peoplename = $yayinci_id."__".$site."__".$kimlik."__".$reklam_tur;
$people = "people/".$peoplename.".sys";
$peoplecache = @file($people);

if (!$peoplecache) {
$sys_text = "[v]1[/v][y]".$yayinci_id."[/y][o]".$reklam_tur."[/o][s]".$site."[/s][k]".$kimlik."[/k][d]".date("d.m.Y")."[/d]";
$sys_yaz = fopen($people, 'w'); fwrite($sys_yaz, $sys_text); fclose($sys_yaz);
} else {
$buldum = $peoplecache[0];
$veri = explode("[v]",$buldum);
$veris = explode("[/v]", $veri[1]);
$sayim = $veris[0]+1;

$sys_text = "[v]".$sayim."[/v][y]".$yayinci_id."[/y][o]".$reklam_tur."[/o][s]".$site."[/s][k]".$kimlik."[/k][d]".date("d.m.Y")."[/d]";
$sys_yaz = fopen($people, 'w'); fwrite($sys_yaz, $sys_text); fclose($sys_yaz);
}






$peoplename = $reklam_id."__".$reklam_tur;
$people = "people/".$peoplename.".ads";
$peoplecache = @file($people);

if (!$peoplecache) {
$sys_text = "[v]1[/v][a]".$reklam_id."[/a][o]".$reklam_tur."[/o]";
$sys_yaz = fopen($people, 'w'); fwrite($sys_yaz, $sys_text); fclose($sys_yaz);
} else {
$buldum = $peoplecache[0];
$veri = explode("[v]",$buldum);
$veris = explode("[/v]", $veri[1]);
$sayim = $veris[0]+1;

$sys_text = "[v]".$sayim."[/v][a]".$reklam_id."[/a][o]".$reklam_tur."[/o]";
$sys_yaz = fopen($people, 'w'); fwrite($sys_yaz, $sys_text); fclose($sys_yaz);
}



?>
var ver = navigator.appVersion;
if (ver.indexOf('MSIE') != -1) {
 // IE 
document.write('<div id="PopWin" style="top:100px;">'
+' <table width="468" height="80" cellspacing="0" cellpadding="0" style="border: 2px double black; background-color: #FFFFFF;">'
+' <tr height="20">'
+' <td bgcolor="#FFFFFF" width="100%" style="padding-right: 3px; background-color: #FFFFFF;" align="right">'
+' <b><a style="font-size: 13px; color: #000000;  font-family: Arial; text-decoration:none;"'
+' href="javascript:void(0)" onclick="javascript:PopShow();DivOff();" title="Pencereyi Kapat">KAPAT</a></b></td></tr>'
+' <tr><td height="60" width="468" colspan="2" bgcolor="#FFFFFF">'
+' <center><a href="javascript:void(0)" onclick="javascript:PopShow();DivOff();"><img src="<?=$reklam_resim?>" border=0></a></center></tr>'
+' </tr></table>'
+' <div style="position:absolute; bottom:0px; right:0px;">'
+' <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,0,0" width="95" height="25" id="hr" align="middle">'
+' <param name="allowScriptAccess" value="sameDomain" />'
+' <param name="allowFullScreen" value="false" />'
+' <param name="movie" value="" /><param name="quality" value="high" /><param name="wmode" value="transparent" />'
+' <embed src="" wmode="transparent" quality="high" width="95" height="25" name="hr" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/go/getflashplayer" />'
+' </object>'
+'</div>'
+'</div>');
if (document.all['PopWin'].style)
window.setInterval("MovePop()", 5);
window.onerror=null;
document.body.scrollTop=10;
}
 else 
{
 // FF, Opera
document.write('<div id="PopWin" style="position:fixed; top:20%;">'
+' <table width="468" height="80" cellspacing="0" cellpadding="0" style="border: 2px double black; background-color: #FFFFFF;">'
+' <tr height="20">'
+' <td bgcolor="#FFFFFF" width="100%" style="padding-right: 3px; background-color: #FFFFFF;" align="right">'
+' <b><a style="font-size: 13px; color: #000000;  font-family: Arial; text-decoration:none;"'
+' href="javascript:void(0)" onclick="javascript:PopShow();DivOff();" title="Pencereyi Kapat">KAPAT</a></b></td></tr>'
+' <tr><td height="60" width="468" colspan="2" bgcolor="#FFFFFF">'
+' <center><a href="javascript:void(0)" onclick="javascript:PopShow();DivOff();"><img src="<?=$reklam_resim?>" border=0></a></center></tr>'
+' </tr></table>'
+' <div style="position:absolute; bottom:0px; right:0px;">'
+' <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,0,0" width="95" height="25" id="hr" align="middle">'
+' <param name="allowScriptAccess" value="sameDomain" />'
+' <param name="allowFullScreen" value="false" />'
+' <param name="movie" value="" /><param name="quality" value="high" /><param name="wmode" value="transparent" />'
+' <embed src="" wmode="transparent" quality="high" width="95" height="25" name="hr" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/go/getflashplayer" />'
+' </object>'
+'</div>'
+'</div>');
}

document.write('<style type="text/css">#PopWin{width:%100;height:%100;cursor:pointer;'
+'z-index:9999999999;position:absolute; left:30%;}</style>');

function DivOff()
{ 
 document.getElementById('PopWin').style.display='none';
}

function PopShow()
{ 

var nok_fp = encodeURIComponent(document.location);
var nok_rf = encodeURIComponent(document.referrer);
var pop = window.open('<?=$adurl?>splash_click.php?r_b=<?=$benzersiz?>&fp=' + nok_fp + '&ref=' + nok_rf,'','left=0,top=0, width='+screen.width+', height='+screen.height+', fullscreen=no, resizable=yes, toolbar=yes, status=yes, location=yes, menubar=yes, scrollbars=yes');
pop.blur();
pop.focus();

 DivOff();
}

function MovePop() {
if (document.body.scrollTop==0) 
 document.all['PopWin'].style.top=document.documentElement.scrollTop+100; else
document.all['PopWin'].style.top=document.body.scrollTop+100;
}