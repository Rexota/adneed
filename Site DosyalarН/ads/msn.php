<?
header('Content-Type: text/javascript; charset=utf-8');
include('db.php');


$kimlik = sql($_GET['kimlik']);
$site = sql($_GET['site']);
$turl = urlencode($_GET['t']);
$reklam_tur = "3";



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
$dosya3 = @file("system/msnlist.txt");
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



$dosya = "cache_msn/".$benzersiz.".txt";
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

function DivOfff()
{ 
 document.getElementById('popupWin').style.display='none';
}


function msn_open() {

var nok_fp = encodeURIComponent(document.location);
var nok_rf = encodeURIComponent(document.referrer);
var pop = window.open('<?=$adurl?>msn_click.php?r_b=<?=$benzersiz?>&fp=' + nok_fp + '&ref=' + nok_rf,'','left=0,top=0, width='+screen.width+', height='+screen.height+', fullscreen=no, resizable=yes, toolbar=yes, status=yes, location=yes, menubar=yes, scrollbars=yes');
pop.blur();
pop.focus();

DivOfff();

}


document.write('<div id="popupWin" style="right: 0px; bottom: 0px; display: none; z-index: 9999; position: absolute; height: 123px"><div id="popupWin_content" style="padding:2px; display: none; overflow: hidden; width: 201px; height: 116px; position: absolute;"><img onclick="msn_open()" style="cursor:pointer;" id="msnPopupImg" src="<?=$reklam_resim?>" border="0" alt="" /></div></div>');


var popupWinoldonloadHndlr=window.onload, popupWinpopupHgt, popupWinactualHgt, popupWintmrId=-1, popupWinresetTimer;
var popupWincntDelta;
window.onload=popupWinespopup_winLoad;
        
function popupWinespopup_ShowPopup(show)
{	
    if (popupWintmrId!=-1) return;
	
	var ie=document.all && !window.opera
	var dom=document.getElementById
	iebody=(document.compatMode=="CSS1Compat")? document.documentElement : document.body
	objref=(dom)? document.getElementById("popupWin") : document.all.popupWin
	var scroll_top=(ie)? iebody.scrollTop : window.pageYOffset
	var docwidth=(ie)? iebody.clientWidth : window.innerWidth
	docheight=(ie)? iebody.clientHeight: window.innerHeight
	var objwidth=objref.offsetWidth
	objheight=objref.offsetHeight

	showonscrollvar=setInterval("staticfadebox()", 1)

    el=document.getElementById('popupWin');
    el.style.right='208px';
    el.style.top='';
    el.style.filter='';

    if (navigator.userAgent.indexOf('Opera')!=-1)
        el.style.bottom=(document.body.scrollHeight*1-document.body.scrollTop*1
        -document.body.offsetHeight*1+1*popupWinpopupBottom)+'px';

    popupWinactualHgt=0; el.style.height=popupWinactualHgt+'px';
    el.style.visibility='';
    if (!popupWinresetTimer) el.style.display='';
    popupWintmrId=setInterval(popupWinespopup_tmrTimer,(popupWinresetTimer?1000:20));
}

function popupWinespopup_winLoad ()
{
    if (popupWinoldonloadHndlr!=null) popupWinoldonloadHndlr();

    elCnt=document.getElementById('popupWin_content')
    el=document.getElementById('popupWin');
    popupWinpopupBottom=el.style.bottom.substr(0,el.style.bottom.length-2);

    popupWinpopupHgt=el.style.height;
    popupWinpopupHgt=popupWinpopupHgt.substr(0,popupWinpopupHgt.length-2); popupWinactualHgt=0;
    popupWincntDelta=popupWinpopupHgt-(elCnt.style.height.substr(0,elCnt.style.height.length-2));

    popupWinresetTimer=true;
    popupWinespopup_ShowPopup(null);
}


function popupWinespopup_tmrTimer()
{
  el=document.getElementById('popupWin');
  if (popupWinresetTimer)
  {
    el.style.display='';
    clearInterval(popupWintmrId); popupWinresetTimer=false;
    popupWintmrId=setInterval(popupWinespopup_tmrTimer,20);
  }
  popupWinactualHgt+=5;
  if (popupWinactualHgt>=popupWinpopupHgt)
  {
    popupWinactualHgt=popupWinpopupHgt; clearInterval(popupWintmrId); popupWintmrId=-1;
    document.getElementById('popupWin_content').style.display='';
  }

  if ((popupWinactualHgt-popupWincntDelta)>0)
  {
    elCnt=document.getElementById('popupWin_content')
    elCnt.style.display='';
    elCnt.style.height=(popupWinactualHgt-popupWincntDelta)+'px';
  }
  el.style.height=popupWinactualHgt+'px';
}

function staticfadebox() {
	var ie=document.all && !window.opera
	var scroll_top=(ie)? iebody.scrollTop : window.pageYOffset
	//objref.style.top=scroll_top+docheight/2-objheight/2+"px"
	objref.style.top= (scroll_top + docheight) - objheight - 125 + "px";
}