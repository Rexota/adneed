<?
header('Content-Type: text/javascript; charset=utf-8');
include('db.php');


$kimlik = sql($_GET['kimlik']);
$site = sql($_GET['site']);
$modul = sql($_GET['modul']);
$turl = urlencode($_GET['t']);
$reklam_tur = "4";


$ben = rand(9,9999);
$sen = rand(1,1111);
$obus = mktime();
$gubus = $ben+$sen+$obus;
$benzersiz = md5($obus);
$benzersiz = $ben."_".$benzersiz."_".$sen."_".$gubus;



if ($kimlik=='' or $site=='' or $modul=='') { die(""); }






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




$sorgu3 = "[kategori]".$websitesi_kategori."[c][modul]".$modul."[c]";
$dosya3 = @file("system/ppclist.txt");
foreach($dosya3 as $satir){ if (strstr($satir,$sorgu3)) { $bulundu = $bulundu.$satir."[item]"; $bulundusayi = $bulundusayi + 1; } }
if ($bulundu=='') { die("ERROR AD"); }

$verimbul = explode("[item]", $bulundu);
$salla = rand(0,$bulundusayi-1);
for($i=0; $i<count($verimbul); $i++) { }

$buldum3 = $verimbul[$salla];


$r_width1 = explode("[width]", $buldum3);
$r_width2 = explode("[c]", $r_width1[1]);
$reklam_width = $r_width2[0];


$r_height1 = explode("[height]", $buldum3);
$r_height2 = explode("[c]", $r_height1[1]);
$reklam_height = $r_height2[0];

$kst1 = explode("[kesinti]", $buldum3);
$kst2 = explode("[c]", $kst1[1]);
$reklam_kesinti = $kst2[0];

$rtk1 = explode("[tikbas]", $buldum3);
$rtk2 = explode("[c]", $rtk1[1]);
$reklam_tikbas = $rtk2[0];



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



$dosya = "cache_ppc/".$benzersiz.".txt";
$verim = $verim."[k]".$kimlik."[/k]";
$verim = $verim."[yid]".$yayinci_id."[/yid]";
$verim = $verim."[rid]".$reklam_id."[/rid]";
$verim = $verim."[rvid]".$reklam_veren_id."[/rvid]";
$verim = $verim."[rad]".$reklam_adresi."[/rad]";
$verim = $verim."[sid]".$site."[/sid]";
$verim = $verim."[sad]".$siteadresi."[/sad]";
$verim = $verim."[rk]".$reklam_kategori."[/rk]";
$verim = $verim."[turl]".$turl."[/turl]";
$verim = $verim."[width]".$reklam_width."[/width]";
$verim = $verim."[height]".$reklam_height."[/height]";
$verim = $verim."[kesinti]".$reklam_kesinti."[/kesinti]";
$verim = $verim."[tikbas]".$reklam_tikbas."[/tikbas]";
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




$uzanti = substr($reklam_resim ,-3);
?>

var nok_fp = encodeURIComponent(document.location);
var nok_rf = encodeURIComponent(document.referrer);
var adres<?=$benzersiz?> = '<?=$adurl?>ppc_click.php?r_b=<?=$benzersiz?>&fp=' + nok_fp + '&ref=' + nok_rf;

<? if ($uzanti=="SWF" || $uzanti=='swf') { ?>
var adres<?=$benzersiz?> = encodeURIComponent(adres<?=$benzersiz?>);
<? } ?>


function ppc_open<?=$benzersiz?>() {
var pop = window.open(adres<?=$benzersiz?>,'','left=0,top=0, width='+screen.width+', height='+screen.height+', fullscreen=no, resizable=yes, toolbar=yes, status=yes, location=yes, menubar=yes, scrollbars=yes');
pop.blur();
pop.focus();
}


document.write('<style>'
+' .reklam_pcc_ads<?=$benzersiz?> {'
+' position:relative; '
+' top:0px; left:0px; '
+' width:<?=$reklam_width?>px;'
+' height:<?=$reklam_height?>px;'
+' border:solid 0px red;'
+' }'

+ '.reklam_pcc_ads<?=$benzersiz?> a {'
+ 'text-decoration: none; color: #000;'
+ '}'
+ '.reklam_pcc_ads<?=$benzersiz?> a:hover {'
+ 'color: #000;'
+ '}'

+' .ressim<?=$benzersiz?> {'
+' position : absolute;'
+' top:0px; left:0px; '
+' display: block; '
+' z-index:1; '
+' }'


+' .power<?=$benzersiz?> { display:none; position:relative; margin-left:25px; top:3px; border:0px; } '
+' .icon<?=$benzersiz?> { display:block; position:relative; margin-left:10px; top:3px; float:left; border:0px; }'
+' .ads<?=$benzersiz?> { position:absolute; bottom:0px; right:0px; z-index:99999999999; background-image:url(<?=$adurl?>images/arka.png); height:18px; width:27px; cursor:pointer; }'


+' </style>'

+' <table width="<?=$reklam_width?>" height="<?=$reklam_height?>" style="border: solid 0px #000"><tr><td width="<?=$reklam_width?>" height="<?=$reklam_height?>">'
+' <div class="reklam_pcc_ads<?=$benzersiz?>">'

<? if ($uzanti=="SWF" || $uzanti=='swf') { ?>

+'<div class="ressim<?=$benzersiz?>"> '
+'<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="<?=$reklam_width?>" height="<?=$reklam_height?>" id="FullScreenTest" align="middle">'
+'<param name="allowScriptAccess" value="sameDomain" /> '
+'<param name="allowFullScreen" value="true" /> '
+'<param name="movie" value="<?=$reklam_resim?>?clickTAG= '
+ adres<?=$benzersiz?>
+'" />'
+'<param name="flashvars" value="Comfydesk2&clickTag='+adres<?=$benzersiz?>+'&clickTAG='+adres<?=$benzersiz?>+'" />'
+'<param name="menu" value="false" /> '
+'<param name="quality" value="high" /> '
+'<param name="bgcolor" value="transparent" /> '
+'<param name="wmode" value="transparent" /> '
+'<embed src="<?=$reklam_resim?>?clickTAG= '
+ adres<?=$benzersiz?>
+'" menu="false" quality="high" wmode="transparent" bgcolor="transparent" width="<?=$reklam_width?>" height="<?=$reklam_height?>" name="vidyo" align="middle" allowScriptAccess="sameDomain" allowFullScreen="true" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />'
+'</object> '
+'</div>'
<? } else { ?>
+' <a style="cursor:pointer;" onclick="ppc_open<?=$benzersiz?>();"><img class="ressim<?=$benzersiz?>" width="<?=$reklam_width?>" height="<?=$reklam_height?>" src="<?=$reklam_resim?>" border="0"></img></a>'
<? } ?>
+' <div id="adss<?=$benzersiz?>" class="ads<?=$benzersiz?>" onmouseover="big<?=$benzersiz?>();" onmouseout="small<?=$benzersiz?>();"><a href="<?=$siteurl?>"><img class="icon<?=$benzersiz?>" id="icon<?=$benzersiz?>" src="<?=$adurl?>images/icon.png" width="12" height="12"></img></a><a href="<?=$siteurl?>"><img class="power<?=$benzersiz?>" id="power<?=$benzersiz?>" src="<?=$adurl?>images/yazi.png" width="90" height="12"></img></a></div>'
+' </div>'
+'</td></tr></table>');


function big<?=$benzersiz?>() { document.getElementById('adss<?=$benzersiz?>').style.width='125px'; document.getElementById('power<?=$benzersiz?>').style.display='block'; }
function small<?=$benzersiz?>() { document.getElementById('adss<?=$benzersiz?>').style.width='27px'; document.getElementById('power<?=$benzersiz?>').style.display='none'; }