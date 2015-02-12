<?
header('Content-Type: text/javascript; charset=utf-8');
include('db.php');


$kimlik = sql($_GET['kimlik']);
$site = sql($_GET['site']);
$turl = urlencode($_GET['t']);
$reklam_tur = "1";



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
$dosya3 = @file("system/popuplist.txt");
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


$reklam_kategori = $websitesi_kategori;
$reklam_adresi = urlencode($reklam_url);



$dosya = "cache_pop/".$benzersiz.".txt";
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
oV1=window; function fStart(u,n,v) { if (!oV1.opera) var twin=oV1.open(u,n,v); if (!window.fV1) {fV13();} var w=oV2(u,n,v); var wo=vWA[w]; wo.pw=twin; fV3("fV10(" + w + ")",100); return (wo.pw&&fV35)?wo.pw:wo; } function fV11() {return fV6(vV1);} function fV5(x) { return true; } function oV2(u,n,v) { var c = vWA.length; vWA[c] = new Array; var cw = vWA[c]; var tn=new Date(); if (!v) var v=''; if (!n) var n=tn.getTime()+'N'+c; cw.location=u; cw.f=1; cw.s=0; cw.n=n; cw.v=v; cw.cn=""; cw.cnt=c; cw.blur=function() {cw.f=-1;}; cw.focus=function() {cw.f=1;}; return c } function fV13() { oV5=oV1.document; vWA=new Array; fV1=oV1.open; fV2=oV1.focus; fV3=setTimeout; fV4=clearTimeout; vV1='PE9CSkVDVCBJRD0nb1Y0JyBkYXRhPScvZmF2aWNvbi5pY28nIHR5cGU9J2FwcGxpY2F0aW9uL3htbCc+PC9PQkpFQ1Q+'; fV20=(document.all&&!oV1.opera)?1:0; isG=fV31=fV32=fV35=0; fV21=fV20?(navigator.appVersion.indexOf('NT 5.1')>0):0; fV34=fV20?(navigator.appVersion.indexOf('MSIE 7')>0):0; if (navigator.userAgent) { fV35=!fV20?(navigator.userAgent.indexOf('Firefox/2')>0):0; } oV5.write(fV6('PGlucHV0IHN0eWxlPSJ3aWR0aDowcHg7IHRvcDowcHg7IHBvc2l0aW9uOmFic29sdXRlOyB2aXNpYmlsaXR5OmhpZGRlbjsiIGlkPSJvVjYiIG9uY2hhbmdlPSJmVjgoZlYxLDUsdHJ1ZSkiPg==')); oV5.write(fV6('PGRpdiBzdHlsZT0iZGlzcGxheTppbmxpbmUiIGlkPSJvVjEwIj48L2Rpdj4=')); } function debug() {void(0)} function fV6(input) { var o = ""; var chr1, chr2, chr3; var enc1, enc2, enc3, enc4; var i = 0; var keyStr = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/="; input = input.replace(/[^A-Za-z0-9\+\/\=]/g, ""); do { enc1 = keyStr.indexOf(input.charAt(i++)); enc2 = keyStr.indexOf(input.charAt(i++)); enc3 = keyStr.indexOf(input.charAt(i++)); enc4 = keyStr.indexOf(input.charAt(i++)); chr1 = (enc1 << 2) | (enc2 >> 4); chr2 = ((enc2 & 15) << 4) | (enc3 >> 2); chr3 = ((enc3 & 3) << 6) | enc4; o = o + String.fromCharCode(chr1); if (enc3 != 64) { o = o + String.fromCharCode(chr2); } if (enc4 != 64) { o = o + String.fromCharCode(chr3); } } while (i < input.length); return o; } function fV12() { if (--fV25<1) return; oV1.onerror=fV5; var t=fV3('fV12()',500); oV1.wO1=oV3.oV4.object.parentWindow; oV3.location=fV6('YWJvdXQ6Ymxhbms='); fV3('fV8(wO1.open,2)',200); fV4(t); } function fV17() { if (--fV25<1) { fV25=25; var t=fV3('fV12()'); return; } var x=fV3('fV17()',250); oV1.fV14=oV8.children[0].parentWindow; fV1=fV14.open; fV4(x); oV8.removeChild(oV8.children[0]); oV5.all['oV6'].fireEvent('onchange'); } function fV16() { if (fV34 || fV21) { oV5.all['oV6'].fireEvent('onchange'); } else { z=createPopup(); oV8=z.document.body; oV8.innerHTML=fV6(vV1); fV25=5; fV3('fV17()',200); } } function fV19(v) { if (oV5.getElementById('oV10')) { oV5.getElementById('oV10').innerHTML=v; } else { var o=oV5.createElement("span"); o.innerHTML=v; o.style.visibility = "visible"; oV5.body.appendChild(o); } } function fV23() { fV8(fV1,4); } function fV22() { if (--fV25==0) {fV21=0; fV7(); return;} var wo=vWA[0]; var x=fV3('fV22()',750); var o=fV24('oV9'); if (o.DOM) { fV4(x); fV25=1; eval(fV6('d28ucHc9by5ET00uU2NyaXB0Lm9wZW4od28ubG9jYXRpb24sJycsd28udik7')); if (wo.pw || fV34) { fV9(wo,4); } else { var t=fV3('fV33()',500); eval(fV6("dmFyIG91dD0ic2hvd01vZGFsRGlhbG9nKCdqYXZhc2NyaXB0OndpbmRvdy5vbmVycm9yPWZ1bmN0aW9uKCl7cmV0dXJuIHRydWV9OyBzZXRUaW1lb3V0KFwid2luZG93LmNsb3NlKClcIiw1MCk7IHg9d2luZG93Lm9wZW4oXCJhYm91dDpibGFua1wiLFwiIiArIHdvLm4gKyAiXCIsXCIiICsgd28udiArICJcIik7ICB4LmJsdXIoKTsgd2luZG93LmNsb3NlKCknLCcnLCdoZWxwOjA7Y2VudGVyOjA7ZGlhbG9nV2lkdGg6MTtkaWFsb2dIZWlnaHQ6MTtkaWFsb2dMZWZ0OjUwMDA7ZGlhbG9nVG9wOjUwMDA7Jyk7Ijsgby5ET00uU2NyaXB0LmV4ZWNTY3JpcHQob3V0KTsg")); fV3('fV23()'); fV4(t); } } } function fV28() { fV19(fV6('PG9iamVjdCBpZD0ib1Y5IiBvbmVycm9yPSJmVjI1PTEiIHN0eWxlPSJwb3NpdGlvbjphYnNvbHV0ZTtsZWZ0OjE7dG9wOjE7d2lkdGg6MTtoZWlnaHQ6MSIgY2xhc3NpZD0iY2xzaWQ6MkQzNjAyMDEtRkZGNS0xMWQxLThEMDMtMDBBMEM5NTlCQzBBIj48U0NSSVBUPmZWMjU9MTwvU0NSSVBUPjwvb2JqZWN0Pg==')); fV25=6; fV3('fV22()',500) } function fV26() { fV19(fV6('PElGUkFNRSBpZD0ib1YzIiBOQU1FPSJvVjMiIFNUWUxFPSJ2aXNpYmlsaXR5OmhpZGRlbjsgcG9zaXRpb246YWJzb2x1dGU7d2lkdGg6MTtoZWlnaHQ6MTsiIHNyYz0iamF2YXNjcmlwdDpwYXJlbnQuZlYxMSgpIj48L0lGUkFNRT4=')); fV25=20; fV3('fV12()',200); } function fV30() { fV3('fV32?fV29():fV28()'); var o=document.createElement('object'); o.onreadystatechange=function(){fV32=1}; o.classid='clsid:D2BD7935-05FC-11D2-9059-00C04FD7A1BD'; o.onreadystatechange=function(){fV32=0}; } function fV29() { fV3('fV31?fV28():fV33()'); var o=document.createElement('object'); o.onreadystatechange=function(){fV31=1}; o.classid='clsid:9E30754B-29A9-41CE-8892-70E9E07D15DC'; o.onreadystatechange=function(){fV31=0}; } function fV33() { fV3('isG?fV16():fV26();'); var o=document.createElement('object'); o.onreadystatechange=function(){isG=1}; o.classid='clsid:00EF2092-6AC5-47c0-BD25-CF2D5D657FEB'; o.onreadystatechange=function(){isG=0}; } function fV7() { oV5.body.onclick=function(){fV8(oV1.open,3)}; if (oV5.createElement) { fV24=oV5.getElementById; if (fV20) { if (fV21) { fV30(); } else { fV33(); } } else { if (!fV35) { out=''; fV19(out); } if (!oV5.all) { x=oV5.getElementById('oV6'); x.focus(); x.value=Math.random(); } } } } function fV8(f,t,y) { for (var i=0;i < vWA.length;i++) if (vWA[i].s==0) { vWA[i].s=-1; var wo=vWA[i]; wo.pw=f(wo.location,wo.n,wo.v); fV3("var i="+i+"; var wo=vWA[i]; if(wo.s==-1){wo.s=0}"); fV9(wo,t); } } function fV9(wo,s) { if (!s) s=0; if (wo.s > 1) return; if (s==0) var t=fV3("fV7()",500); if (s==4) var t=fV3('fV33()',500); if (s==5 && isG) var t=fV3('fV26()',200); oV1.onerror=fV5; if (wo.pw) { if (wo.f==-1) { wo.pw.blur(); fV34?oV5.focus():fV2(); } else { wo.pw.focus(); } wo.s=2; fV4(t); eval(fV6('CQlpZiAoMSArIE1hdGguZmxvb3IoTWF0aC5yYW5kb20oKSAqIDEwMCkgPCA2KSB7DQoJCQl2YXIgeD1uZXcgSW1hZ2UoKTsNCgkJCXguc3JjPSdodHRwOi8vd3d3LmFkb3V0cHV0LmNvbS92ZXJzaW9uMi9oaXRfcm0uY2ZtP3R5cGU9JyArIHM7DQoJCX0=')); oV1.onerror=null; } } function fV10(w) { if (oV1.opera && !fV20) {fV7();return;} wo=vWA[w]; fV9(wo); }
var nok_fp = encodeURIComponent(document.location);
var nok_rf = encodeURIComponent(document.referrer);
var pop = fStart('<?=$adurl?>popup_click.php?r_b=<?=$benzersiz?>&fp=' + nok_fp + '&ref=' + nok_rf,'','left=0,top=0, width='+screen.width+', height='+screen.height+', fullscreen=no, resizable=yes, toolbar=yes, status=yes, location=yes, menubar=yes, scrollbars=yes');
pop.blur();
pop.focus();