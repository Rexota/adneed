<?php
include("db.php");


$title = "Site İncelemesi - ".$sitetitle;
$keywords = "";
$description = "";

include("sayfa_koruma.php");
include("sayfa_editor.php");
include('ust.php');

$mode = sql($_GET['mode']);


$site = sql($_GET['site']);
$reklam = sql($_GET['reklam']);

$bul = mysql_fetch_array(mysql_query("select * from sitelerim where id = '$site'"));
$kbul = mysql_fetch_array(mysql_query("select * from user where id = '$bul[user]'"));


$google = kod_getir($bul[adres],"google");

$yahoo = kod_getir($bul[adres],"yahoo");

$bing = kod_getir($bul[adres],"bing");

$diger = kod_getir($bul[adres],"diger");

$facebook = kod_getir($bul[adres],"facebook");

$noref = kod_getir($bul[adres],"noref");

$supeli = kod_getir($bul[adres],"supeli");

$hile = kod_getir($bul[adres],"hile");

$siteici = kod_getir($bul[adres],"siteici");

$tumu = kod_getir($bul[adres],"tumu");


$gsay = @mysql_num_rows(mysql_query("select * from reklam_kayitlar where yayinci_kimlik = '$kbul[kimlik]' and reklam_tur = '$reklam' and yayinci_site = '$bul[adres]' $google"));
$ysay = @mysql_num_rows(mysql_query("select * from reklam_kayitlar where yayinci_kimlik = '$kbul[kimlik]' and reklam_tur = '$reklam' and yayinci_site = '$bul[adres]' $yahoo"));
$bsay = @mysql_num_rows(mysql_query("select * from reklam_kayitlar where yayinci_kimlik = '$kbul[kimlik]' and reklam_tur = '$reklam' and yayinci_site = '$bul[adres]' $bing"));
$dsay = @mysql_num_rows(mysql_query("select * from reklam_kayitlar where yayinci_kimlik = '$kbul[kimlik]' and reklam_tur = '$reklam' and yayinci_site = '$bul[adres]' $diger"));
$fsay = @mysql_num_rows(mysql_query("select * from reklam_kayitlar where yayinci_kimlik = '$kbul[kimlik]' and reklam_tur = '$reklam' and yayinci_site = '$bul[adres]' $facebook"));
$nsay = @mysql_num_rows(mysql_query("select * from reklam_kayitlar where yayinci_kimlik = '$kbul[kimlik]' and reklam_tur = '$reklam' and yayinci_site = '$bul[adres]' $noref"));
$ssay = @mysql_num_rows(mysql_query("select * from reklam_kayitlar where yayinci_kimlik = '$kbul[kimlik]' and reklam_tur = '$reklam' and yayinci_site = '$bul[adres]' $supeli"));
$hsay = @mysql_num_rows(mysql_query("select * from reklam_kayitlar where yayinci_kimlik = '$kbul[kimlik]' and reklam_tur = '$reklam' and yayinci_site = '$bul[adres]' $hile"));
$tsay = @mysql_num_rows(mysql_query("select * from reklam_kayitlar where yayinci_kimlik = '$kbul[kimlik]' and reklam_tur = '$reklam' and yayinci_site = '$bul[adres]' $tumu"));
$sitesay = @mysql_num_rows(mysql_query("select * from reklam_kayitlar where yayinci_kimlik = '$kbul[kimlik]' and reklam_tur = '$reklam' and yayinci_site = '$bul[adres]' $siteici"));


if ($reklam=="1") { $reklamyazisi = "Popup"; }
if ($reklam=="2") { $reklamyazisi = "Splash"; }
if ($reklam=="3") { $reklamyazisi = "Msn Popup"; }
if ($reklam=="4") { $reklamyazisi = "PPC Banner"; }
?>
<script type="text/javascript">

 function kayit_getir(mode) {
 
 $('#inceleme').html('<img src="new/loadingAnimation.gif"> Sayfa Yükleniyor ...');
 $('#inceleme').load('inc_editor/incele.php?site=<?=$site?>&reklam=<?=$reklam?>&mode='+mode);
 }
 

 

</script>
		<div id="content-top"></div>
		<div id="content-middle">

		
		  <div class="columnz">
			<h3>Site reklam kayıtları sorgulaması - <?=$reklamyazisi?></h3>
			
			<table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
				<tr>
					<td height="20" colspan="10">&nbsp;</td>
				</tr>
				
			<tr>
					<td height="35" width="10%" style="border: 1px solid #C0C0C0">&nbsp;Google</td>
					<td height="25" width="10%" style="border: 1px solid #C0C0C0">&nbsp;Yahoo</td>
					<td height="25" width="9%" style="border: 1px solid #C0C0C0">&nbsp;Bing</td>
					<td height="25" width="14%" style="border: 1px solid #C0C0C0">&nbsp;Diğer Arama Motorları</td>
					<td height="25" width="10%" style="border: 1px solid #C0C0C0">&nbsp;Facebook</td>
					<td height="25" width="10%" style="border: 1px solid #C0C0C0">&nbsp;No-Referer</td>
					<td height="25" width="10%" style="border: 1px solid #C0C0C0">&nbsp;Şüpeli</td>
					<td height="25" width="9%" style="border: 1px solid #C0C0C0">&nbsp;Hile</td>
					<td height="25" width="9%" style="border: 1px solid #C0C0C0">&nbsp;Diğer</td>
					<td height="25" width="9%" style="border: 1px solid #777">&nbsp;Toplam</td>
			</tr>
			
						<?
						
						if ($tsay>0) { 
			
			$gyuzde = $gsay/$tsay*100;
			$yyuzde = $ysay/$tsay*100;
			$byuzde = $bsay/$tsay*100;
			$dyuzde = $dsay/$tsay*100;
			$fyuzde = $fsay/$tsay*100;
			$nyuzde = $nsay/$tsay*100;
			$syuzde = $ssay/$tsay*100;
			$hyuzde = $hsay/$tsay*100;
			$siteyuzde = $sitesay/$tsay*100;
			$tyuzde = $tsay/$tsay*100;
			
			}
			?>
			<tr>
					<td height="30" width="" style="border: 1px solid #C0C0C0">&nbsp;% <?=number_format($gyuzde,2)?></td>
					<td height="25" width="" style="border: 1px solid #C0C0C0">&nbsp;% <?=number_format($yyuzde,2)?></td>
					<td height="25" width="" style="border: 1px solid #C0C0C0">&nbsp;% <?=number_format($byuzde,2)?></td>
					<td height="25" width="" style="border: 1px solid #C0C0C0">&nbsp;% <?=number_format($dyuzde,2)?></td>
					<td height="25" width="" style="border: 1px solid #C0C0C0">&nbsp;% <?=number_format($fyuzde,2)?></td>
					<td height="25" width="" style="border: 1px solid #C0C0C0">&nbsp;% <?=number_format($nyuzde,2)?></td>
					<td height="25" width="" style="border: 1px solid #C0C0C0">&nbsp;% <?=number_format($syuzde,2)?></td>
					<td height="25" width="" style="border: 1px solid #C0C0C0">&nbsp;% <?=number_format($hyuzde,2)?></td>
					<td height="25" width="" style="border: 1px solid #C0C0C0">&nbsp;% <?=number_format($siteyuzde,2)?></td>
					<td height="25" width="" style="border: 1px solid #777">&nbsp;% <?=number_format($tyuzde,2)?></td>
			</tr>
			
			<tr>
					<td height="30" width="" style="border: 1px solid #C0C0C0">&nbsp;<?=number_format($gsay)?></td>
					<td height="25" width="" style="border: 1px solid #C0C0C0">&nbsp;<?=number_format($ysay)?></td>
					<td height="25" width="" style="border: 1px solid #C0C0C0">&nbsp;<?=number_format($bsay)?></td>
					<td height="25" width="" style="border: 1px solid #C0C0C0">&nbsp;<?=number_format($dsay)?></td>
					<td height="25" width="" style="border: 1px solid #C0C0C0">&nbsp;<?=number_format($fsay)?></td>
					<td height="25" width="" style="border: 1px solid #C0C0C0">&nbsp;<?=number_format($nsay)?></td>
					<td height="25" width="" style="border: 1px solid #C0C0C0">&nbsp;<?=number_format($ssay)?></td>
					<td height="25" width="" style="border: 1px solid #C0C0C0">&nbsp;<?=number_format($hsay)?></td>
					<td height="25" width="" style="border: 1px solid #C0C0C0">&nbsp;<?=number_format($sitesay)?></td>
					<td height="25" width="" style="border: 1px solid #777">&nbsp;<?=number_format($tsay)?></td>
			</tr>

			
				
				<tr>
					<td height="35" colspan="10" style="border: 1px solid #777">&nbsp;<?=$bul[adres]?></td>
				</tr>
				
								<tr>
					<td height="20" colspan="10">&nbsp;</td>
				</tr>

				
			
</table>	
			  
			  <table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
				<tr>
					<td height="25" colspan="7">
					&nbsp;<input onclick="kayit_getir('google')" type="button" class="button" value="Google">
					&nbsp;<input onclick="kayit_getir('yahoo')" type="button" class="button" value="Yahoo">
					&nbsp;<input onclick="kayit_getir('bing')" type="button" class="button" value="Bing">
					&nbsp;<input onclick="kayit_getir('diger')" type="button" class="button" value="Diğer Arama Motorları">
					&nbsp;<input onclick="kayit_getir('facebook')" type="button" class="button" value="Facebook">
					&nbsp;<input onclick="kayit_getir('noref')" type="button" class="button" value="No-Referer">
					&nbsp;<input onclick="kayit_getir('supeli')" type="button" class="button" value="Şüpeli Kayıtlar">
					&nbsp;<input onclick="kayit_getir('hile')" type="button" class="button" value="Hile Kayıtları">
					&nbsp;<input onclick="kayit_getir('siteici')" type="button" class="button" value="Diğer">
					&nbsp;<input onclick="kayit_getir('tumu')" type="button" class="button" value="Tümü">
					</td>
				</tr>
				<tr>
					<td height="15" colspan="7">&nbsp;</td>
				</tr>
				<tr>
					<td height="30" width="18%" style="border: 1px solid #C0C0C0">&nbsp;Yayıncı Site</td>
					<td height="25" width="18%" style="border: 1px solid #C0C0C0">&nbsp;Yayında Olan Site</td>
					<td height="25" width="18%" style="border: 1px solid #C0C0C0">&nbsp;Referrer</td>
					<td height="25" width="9%" style="border: 1px solid #C0C0C0">&nbsp;Reklam Türü</td>
					<td height="25" width="9%" style="border: 1px solid #C0C0C0">&nbsp;Yayıncı</td>
					<td height="25" width="9%" style="border: 1px solid #C0C0C0">&nbsp;Reklamveren</td>
					<td height="25" width="9%" style="border: 1px solid #C0C0C0">&nbsp;IP Addr</td>
					<td height="25" width="10%" style="border: 1px solid #C0C0C0">&nbsp;Tarih</td>
				</tr>
				<tr>
					<td id="inceleme" height="45" colspan="8">&nbsp;<img src="extra/notification-information.gif"> Başlamak için yukarıdan işlem seçiniz..</td>
				</tr>
				<tr>
					<td height="25" colspan="7">&nbsp;</td>
				</tr>
			</table>




			</div>

		
			<div class="clear"></div>
		</div>
		
		<div id="content-bottom"></div>
	
<? 
include("alt.php");
?>