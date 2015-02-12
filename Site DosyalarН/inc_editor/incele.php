<?
ob_start();
session_start();
$mode = $_GET['mode'];

include("../db.php");
include("../sayfa_editor.php");
include('../sayfa_koruma.php');
include('../fonksiyon.php');
?>
<?
if ($mode=="") {
die("");
}

$site = $_GET['site'];
$reklam = $_GET['reklam'];

if ($site=='' or $reklam=='') {
die("");
}


$git = @$_GET["p"];
 
if(empty($git) or !is_numeric($git)) { $git = 1; }


if ($reklam=="1") { $reklamyazisi = "Popup"; }
if ($reklam=="2") { $reklamyazisi = "Splash"; }
if ($reklam=="3") { $reklamyazisi = "Msn Popup"; }
if ($reklam=="4") { $reklamyazisi = "PPC Banner"; }

?>
<title></title>
<script type="text/javascript">

function sayfa_getir(id) {

 $('#inceleme').html('<img src="new/loadingAnimation.gif"> Yükleniyor...');
 $('#inceleme').load('inc_editor/incele.php?mode=<?=$mode?>&site=<?=$site?>&reklam=<?=$reklam?>&p='+id);

}

</script>
<?	

$limit = 100;
 
$bul = mysql_fetch_array(mysql_query("select * from sitelerim where id = '$site'"));
$kbul = mysql_fetch_array(mysql_query("select * from user where id = '$bul[user]'"));



if ($mode=="siteici") {
$sorgum = kod_getir($bul[adres],"siteici");
}

if ($mode=="google") { 
$sorgum = kod_getir($bul[adres],"google");
}
if ($mode=="yahoo") { 
$sorgum = kod_getir($bul[adres],"yahoo");
}
if ($mode=="facebook") { 
$sorgum = kod_getir($bul[adres],"facebook");
}
if ($mode=="bing") { 
$sorgum = kod_getir($bul[adres],"bing");
}
if ($mode=="diger") {
$sorgum = kod_getir($bul[adres],"diger");
}
if ($mode=="noref") { 
$sorgum = kod_getir($bul[adres],"noref");
}
if ($mode=="supeli") {
$sorgum = kod_getir($bul[adres],"supeli");
}
if ($mode=="hile") {
$sorgum = kod_getir($bul[adres],"hile");
}
if ($mode=="tumu") {
$sorgum = kod_getir($bul[adres],"tumu");
}



$count = @mysql_num_rows(mysql_query("select * from reklam_kayitlar where yayinci_kimlik = '$kbul[kimlik]' and reklam_tur = '$reklam' and yayinci_site = '$bul[adres]' $sorgum"));

$toplamsayfa    = ceil($count / $limit);
$baslangic  = ($git-1)*$limit;


$result = @mysql_query("select * from reklam_kayitlar where yayinci_kimlik = '$kbul[kimlik]' and reklam_tur = '$reklam' and yayinci_site = '$bul[adres]' $sorgum order by id desc LIMIT $baslangic,$limit");


if (@mysql_num_rows($result)<1) {

if ($git > 1) {
$yenisayfa = $git-1;
?>
<script type="text/javascript">$(function() { sayfa_getir(<?=$yenisayfa?>) });</script>
<?
}
?>
 <table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
		    <tr>

			<td height="25" width="100%" style="border: 1px solid #000080;" colspan="6">
			<p>&nbsp;<img border="0" src="img/uyar232i.gif" width="14" height="16"> 
			Kayıt bulunamadı !</td>
		</tr>
		</table>


<? 
} else {

?>

 <table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
 <tr>
			<td height="35" width="100%" colspan="7" style="border: 0px solid #ccc; padding-top: 1px">&nbsp;Kayıtlar <b><?=number_format($count)?></b></td>
			</tr>
<?
	 
while(list($id, $reklam_veren_id, $yayinci_kimlik, $yayinci_site, $tiklayan_site, $tarih, $reklam_tur, $reklam_id, $tarih2, $ref_site, $kategori, $ipsee ) = @mysql_fetch_row($result))
{

$ybul = mysql_fetch_array(mysql_query("select * from user where id = '$reklam_veren_id'"));


$tiklayans_site = wordwrap($tiklayan_site, 30, "<br />",true);
$refs_site = wordwrap($ref_site, 30, "<br />",true);

?>

		    <tr>
			<td height="60" width="18%" style="border: 1px solid #ccc; padding-top: 1px">&nbsp;<a href="<?=$yayinci_site?>" target="_blank"><?=$yayinci_site?></a></td>
			<td height="30" width="18%" style="border: 1px solid #ccc; padding-top: 1px">&nbsp;<font style="font-size:10px;"><a href="<?=$tiklayan_site?>" target="_blank"><?=$tiklayans_site?></a></font></td>
			<td height="30" width="18%" style="border: 1px solid #ccc; padding-top: 1px">&nbsp;<font style="font-size:10px;"><a href="<?=$ref_site?>" target="_blank"><?=$refs_site?></a></font></td>
			<td height="30" width="9%" style="border: 1px solid #ccc; padding-top: 1px">&nbsp;<?=$reklamyazisi?></td>
			<td height="30" width="9%" style="border: 1px solid #ccc; padding-top: 1px">&nbsp;<?=$kbul['username']?></td>
			<td height="30" width="9%" style="border: 1px solid #ccc; padding-top: 1px">&nbsp;<?=$ybul['username']?></td>
			<td height="30" width="9%" style="border: 1px solid #ccc; padding-top: 1px">&nbsp;<?=$ipsee?></td>
			<td height="30" width="10%" style="border: 1px solid #ccc; padding-top: 1px">&nbsp;<?=date("d.m.Y H:i:s", $tarih)?></td>
		</tr>
		
<? } ?>
		    <tr>
			<td height="35" width="100%" colspan="7" style="border: 0px solid #ccc; padding-top: 1px">&nbsp;<font style="font-size:13px;">Sayfa: 
			<?for ($i = 1; $i <= $toplamsayfa ; $i++ ) {?>
			<? if ($git==$i) { ?>
			&nbsp;<b>[<?=$i?>]</b>
			<? } else { ?>
			&nbsp;<a onclick="sayfa_getir(<?=$i?>)" class="sayfa_tikla" style="cursor:pointer;"><?=$i?></a>
			<? } ?>
			<? } ?>
			</font></td>
		</tr>
</table>
<?  } ?>