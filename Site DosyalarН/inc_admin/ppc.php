<?php
$mode = $_GET['mode'];

include("../db.php");
include('../fonksiyon.php');
include("../sayfa_koruma.php");
include("../sayfa_admin.php");
?><? if ($mode=='see') { ?>
<title></title>
<script type="text/javascript">

function sayfa_getir(id) {

 $('#admin_ppc').html('<img src="new/loadingAnimation.gif"> Yükleniyor...');
 $('#admin_ppc').load('inc_admin/ppc.php?mode=see&p='+id);

}


 function modul_edit(id) {
  $('#ppc_panel').html('<img src="new/loadingAnimation.gif"> Veriler yükleniyor...');
  $('#ppc_panel').load('inc_admin/ppc.php?mode=edit&id='+id);
 }
 
 
 function ppcsil(id) {

	$.post('inc_admin/ppc.php?mode=sil', { id : id}, function(response) {
	
   $('#admin_ppc').load('inc_admin/ppc.php?mode=see');
	 });


}
</script>
<?	

$limit = 10;
 
$git = @$_GET["p"];
 
if(empty($git) or !is_numeric($git)) { $git = 1; }

$count      = mysql_num_rows(mysql_query("select * from ppc_cat"));

$toplamsayfa    = ceil($count / $limit);
$baslangic  = ($git-1)*$limit;




$result = @mysql_query("select * from ppc_cat LIMIT $baslangic,$limit");



if (mysql_num_rows($result)<1) {
?>
 <table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
		<tr>
					<td height="25" width="700" style="border: 1px solid #000080" colspan="4">
					<p>&nbsp;<img border="0" src="img/uyari.gif" width="15" height="15"> Modül Bulunamadı.</td>
				</tr>
		</table>


<? 
} else {

?>

 <table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
<?
	 
while($yaz = mysql_fetch_array($result))

{

?>
				<tr>
				<td height="25" width="16%" style="border: 1px solid #C0C0C0">&nbsp;<?=$yaz[ad]?></td>
				<td height="25" width="12%" style="border: 1px solid #C0C0C0">&nbsp;<?=$yaz[width]?>x<?=$yaz[height]?></td>
				<td height="25" width="12%" style="border: 1px solid #C0C0C0">&nbsp;<?=$yaz[min]?> TL</td>
				<td height="25" width="12%" style="border: 1px solid #C0C0C0">&nbsp;<?=$yaz[max]?> TL</td>
				<td height="25" width="12%" style="border: 1px solid #C0C0C0">&nbsp;<?=$yaz[kesinti]?> TL</td>
				<td height="25" width="12%" style="border: 1px solid #C0C0C0">&nbsp;<?=number_format($yaz[min_tutar],2)?> TL</td>
				<td height="25" width="12%" style="border: 1px solid #C0C0C0">&nbsp;<?=number_format($yaz[max_tutar],2)?> TL</td>
				<td height="25" width="12%" style="border: 1px solid #008000; padding-top: 1px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a onclick="modul_edit(<?=$yaz[id]?>)" href="javascript:void(0)" style="cursor:pointer;"><img src="img/icon_edit.gif"></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:ppcsil(<?=$yaz[id]?>);" onclick="return onay();"><img src="img/icon_delete.gif"></a></td>
				</tr>
		
<? } ?>

		    <tr>
			<td height="35" width="100%" colspan="8" style="border: 0px solid #008000; padding-top: 1px">&nbsp;<font style="font-size:13px;">Sayfa: 
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
<? } } ?>
<? if ($mode=="edit") { 
$id = sql($_GET['id']);
$yaz = mysql_fetch_array(mysql_query("select * from ppc_cat where id = '$id'"));
?>

			  
	<script type="text/javascript">
	
	function islemsbitti() {
	
	$('#ppc_panel').fadeOut();
	setTimeout("$('#ppc_panel').html('');", 500);
	$('#ppc_panel').fadeIn();
	
	$('#admin_ppc').load('inc_admin/ppc.php?mode=see');
	}
	
	
$(function() {


 
   $('#ekle_button').click(function() {
  
  
	var ad = $('#ad').val();
	var width = $('#width').val();
	var height = $('#height').val();
	var mintik = $('#mintik').val();
	var maxtik = $('#maxtik').val();
	var tikkes = $('#tikkes').val();
	var minbutce = $('#minbutce').val();
	var maxbutce = $('#maxbutce').val();
  


	$.post('inc_admin/ppc.php?mode=editsave&id=<?=$id?>', { ad : ad, width: width, height: height, mintik: mintik, maxtik : maxtik, tikkes : tikkes, minbutce: minbutce, maxbutce : maxbutce }, function(response) {

				var return_val = ajaxduzelt(response);
				
				switch (return_val) {
					case 'ERROR':
						$('#ekle_durum').html('<img src="extra/notification-slash.gif"> Gerekli Alanları Doldurmadınız !');
						break;

					case 'SUCCESS':
				    $('#ekle_durum').html('<img src="extra/notification-information.gif"> Değişiklikler Kaydedildi . . . ');
					setTimeout("islemsbitti();", 1500);	
						break;
						
					default:
                   $('#ekle_durum').html(return_val);
				}
				
				
	 });


			

 });


});



</script>		  
<table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
		<tr>
			<td height="15" colspan="2">&nbsp;</td>
		</tr>
		
				<tr>
			<td height="35" width="150">&nbsp;Modül Adı:</td>
			<td height="25" width="750">&nbsp;<input name="" id="ad" type="text" class="input" size="30" value="<?=$yaz['ad']?>" maxlength="35" />
			</td>
		</tr>
		
		<tr>
			<td height="35" width="150">&nbsp;Genişlik:</td>
			<td height="25" width="750">&nbsp;<input name="" id="width" type="text" class="input" size="4" onkeypress="return BlockNonNumbers(this, event,'',true,false);" value="<?=$yaz['width']?>" maxlength="4" /> PX
			</td>
		</tr>
		
		<tr>
			<td height="35" width="150">&nbsp;Yükseklik:</td>
			<td height="25" width="750">&nbsp;<input name="" id="height" type="text" class="input" size="4" onkeypress="return BlockNonNumbers(this, event,'',true,false);" value="<?=$yaz['height']?>" maxlength="4" /> PX
			</td>
		</tr>
		
		
		<tr>
				<td height="35" width="150">&nbsp;Min. Tık Ücreti:</td>
			<td height="25" width="250">&nbsp;<input size="4" name="" id="mintik" type="text" class="input" value="<?=$yaz['min']?>"  onkeypress="return BlockNonNumbers(this, event,'.',true,false);" maxlength="6"   /> TL</td>
		</tr>
		
		<tr>
				<td height="35" width="150">&nbsp;Max. Tık Ücreti:</td>
			<td height="25" width="250">&nbsp;<input size="4" name="" id="maxtik" type="text" class="input" value="<?=$yaz['max']?>"  onkeypress="return BlockNonNumbers(this, event,'.',true,false);" maxlength="6" /> TL</td>
		</tr>
				<tr>
				<td height="35" width="150">&nbsp;Tık Başı Kesinti:</td>
			<td height="25" width="250">&nbsp;<input size="4" name="" id="tikkes" type="text" class="input" value="<?=$yaz['kesinti']?>"  onkeypress="return BlockNonNumbers(this, event,'.',true,false);" maxlength="6"   /> TL</td>
		</tr>
		
		
		

		<tr>
			<td height="35" width="150">&nbsp;Minimum Bütçe:</td>
			<td height="25" width="750">&nbsp;<input size="15" value="<?=number_format($yaz['min_tutar'],2)?>" onblur="ExtractNumber(this,'.',',',2,false);" onkeyup="ExtractNumber(this,'.',',',2,false);" onkeypress="return BlockNonNumbers(this, event,'.',true,false);" id="minbutce" name="" type="text" class="input" /> TL
			</td>
		</tr>

		<tr>
			<td height="35" width="150">&nbsp;Maximum Bütçe:</td>
			<td height="25" width="750">&nbsp;<input size="15" value="<?=number_format($yaz['max_tutar'],2)?>" onblur="ExtractNumber(this,'.',',',2,false);" onkeyup="ExtractNumber(this,'.',',',2,false);" onkeypress="return BlockNonNumbers(this, event,'.',true,false);" id="maxbutce" name="" type="text" class="input" /> TL
			</td>
		</tr>
		

				<tr>
			<td height="35" width="">&nbsp;<input type="button"  id="ekle_button" name="ekle_button" class="button" value="   Değişiklikleri Kaydet   "></td>
			<td height="32" width="">&nbsp;<input type="button" onclick="$('#ppc_panel').html('');" class="button" value="Vazgeç"></td>
		</tr>
		
		<tr>
			<td height="35" width="100%" colspan="2">&nbsp;<span id="ekle_durum"></span></td>
		</tr>
		<tr>
			<td height="15" colspan="2">&nbsp;</td>
		</tr>
		</table>
<? } ?>
<? if ($mode=="editsave") { ?>
<?

$id = sql($_GET['id']);


$ad = sql($_POST['ad']);
$width = sql($_POST['width']);
$height = sql($_POST['height']);
$mintik = sql($_POST['mintik']);
$maxtik = sql($_POST['maxtik']);
$tikkes = sql($_POST['tikkes']);
$minbutce = sql($_POST['minbutce']);
$maxbutce = sql($_POST['maxbutce']);


if ($ad=='' or $id=='' or $width=='' or $height=='' or $mintik=='' or $maxtik=='' or $tikkes=='' or $minbutce=='' or $maxbutce=='') { die("ERROR"); }

tiku_kontrol("$mintik","<img src='extra/notification-exclamation.gif'>","Minimum Tık");
tiku_kontrol("$maxtik","<img src='extra/notification-exclamation.gif'>","Maximum Tık");
tiku_kontrol("$tikkes","<img src='extra/notification-exclamation.gif'>","Tık Kesintisi");


$minbutce = str_replace(",","", $minbutce);
$maxbutce = str_replace(",","", $maxbutce);


$ekle =  mysql_query("UPDATE ppc_cat SET ad = '$ad', width = '$width', height = '$height', min = '$mintik', max = '$maxtik', kesinti = '$tikkes', min_tutar = '$minbutce', max_tutar = '$maxbutce' where id = '$id'");
if (!$ekle) {
die(mysql_error());
}

die("SUCCESS");





?>
<? } ?>
<? if ($mode=="save") { ?>
<?

	
$ad = sql($_POST['ad']);
$width = sql($_POST['width']);
$height = sql($_POST['height']);
$mintik = sql($_POST['mintik']);
$maxtik = sql($_POST['maxtik']);
$tikkes = sql($_POST['tikkes']);
$minbutce = sql($_POST['minbutce']);
$maxbutce = sql($_POST['maxbutce']);


if ($ad=='' or $width=='' or $height=='' or $mintik=='' or $maxtik=='' or $tikkes=='' or $minbutce=='' or $maxbutce=='') { die("ERROR"); }

tiku_kontrol("$mintik","<img src='extra/notification-exclamation.gif'>","Minimum Tık");
tiku_kontrol("$maxtik","<img src='extra/notification-exclamation.gif'>","Maximum Tık");
tiku_kontrol("$tikkes","<img src='extra/notification-exclamation.gif'>","Tık Kesintisi");


$minbutce = str_replace(",","", $minbutce);
$maxbutce = str_replace(",","", $maxbutce);


$ekle =  mysql_query("insert into ppc_cat (width , height , min , max , kesinti , min_tutar , max_tutar , ad) values ('$width', '$height', '$mintik', '$maxtik', '$tikkes', '$minbutce', '$maxbutce', '$ad')");
if (!$ekle) {
die(mysql_error());
}

die("SUCCESS");


?>
<? } ?>
<? if ($mode=="ekle") { 
?>

			  
	<script type="text/javascript">
	
	function islemsbitti() {
	
	$('#ppc_panel').fadeOut();
	setTimeout("$('#ppc_panel').html('');", 500);
	$('#ppc_panel').fadeIn();
	
	$('#admin_ppc').load('inc_admin/ppc.php?mode=see');
	}
	
	
$(function() {


 
   $('#ekle_button').click(function() {
  
  
	var ad = $('#ad').val();
	var width = $('#width').val();
	var height = $('#height').val();
	var mintik = $('#mintik').val();
	var maxtik = $('#maxtik').val();
	var tikkes = $('#tikkes').val();
	var minbutce = $('#minbutce').val();
	var maxbutce = $('#maxbutce').val();
  


	$.post('inc_admin/ppc.php?mode=save', { ad : ad, width: width, height: height, mintik: mintik, maxtik : maxtik, tikkes : tikkes, minbutce: minbutce, maxbutce : maxbutce }, function(response) {

				var return_val = ajaxduzelt(response);
				
				switch (return_val) {
					case 'ERROR':
						$('#ekle_durum').html('<img src="extra/notification-slash.gif"> Gerekli Alanları Doldurmadınız !');
						break;

					case 'SUCCESS':
				    $('#ekle_durum').html('<img src="extra/notification-information.gif"> Modül Ekleme İşlemi Tamamlandı. Bekleyin . . . ');
					setTimeout("islemsbitti();", 1500);	
						break;
						
					default:
                   $('#ekle_durum').html(return_val);
				}
				
				
	 });


			

 });


});



</script>		  
<table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
		<tr>
			<td height="15" colspan="2">&nbsp;</td>
		</tr>
		
				<tr>
			<td height="35" width="150">&nbsp;Modül Adı:</td>
			<td height="25" width="750">&nbsp;<input name="" id="ad" type="text" class="input" size="30" value="" maxlength="35" />
			</td>
		</tr>
		
		<tr>
			<td height="35" width="150">&nbsp;Genişlik:</td>
			<td height="25" width="750">&nbsp;<input name="" id="width" type="text" class="input" size="4" onkeypress="return BlockNonNumbers(this, event,'',true,false);" value="" maxlength="4" /> PX
			</td>
		</tr>
		
		<tr>
			<td height="35" width="150">&nbsp;Yükseklik:</td>
			<td height="25" width="750">&nbsp;<input name="" id="height" type="text" class="input" size="4" onkeypress="return BlockNonNumbers(this, event,'',true,false);" value="" maxlength="4" /> PX
			</td>
		</tr>
		
		
		<tr>
				<td height="35" width="150">&nbsp;Min. Tık Ücreti:</td>
			<td height="25" width="250">&nbsp;<input size="4" name="" id="mintik" type="text" class="input" value="0.0000"  onkeypress="return BlockNonNumbers(this, event,'.',true,false);" maxlength="6"   /> TL</td>
		</tr>
		
		<tr>
				<td height="35" width="150">&nbsp;Max. Tık Ücreti:</td>
			<td height="25" width="250">&nbsp;<input size="4" name="" id="maxtik" type="text" class="input" value="0.0000"  onkeypress="return BlockNonNumbers(this, event,'.',true,false);" maxlength="6" /> TL</td>
		</tr>
				<tr>
				<td height="35" width="150">&nbsp;Tık Başı Kesinti:</td>
			<td height="25" width="250">&nbsp;<input size="4" name="" id="tikkes" type="text" class="input" value="0.0000"  onkeypress="return BlockNonNumbers(this, event,'.',true,false);" maxlength="6"   /> TL</td>
		</tr>
		
		
		

		<tr>
			<td height="35" width="150">&nbsp;Minimum Bütçe:</td>
			<td height="25" width="750">&nbsp;<input size="15" onblur="ExtractNumber(this,'.',',',2,false);" onkeyup="ExtractNumber(this,'.',',',2,false);" onkeypress="return BlockNonNumbers(this, event,'.',true,false);" id="minbutce" name="" type="text" class="input" /> TL
			</td>
		</tr>

		<tr>
			<td height="35" width="150">&nbsp;Maximum Bütçe:</td>
			<td height="25" width="750">&nbsp;<input size="15" onblur="ExtractNumber(this,'.',',',2,false);" onkeyup="ExtractNumber(this,'.',',',2,false);" onkeypress="return BlockNonNumbers(this, event,'.',true,false);" id="maxbutce" name="" type="text" class="input" /> TL
			</td>
		</tr>
		

				<tr>
			<td height="35" width="">&nbsp;<input type="button"  id="ekle_button" name="ekle_button" class="button" value="   Modülü Sisteme Ekle   "></td>
			<td height="32" width="">&nbsp;<input type="button" onclick="$('#ppc_panel').html('');" class="button" value="Vazgeç"></td>
		</tr>
		
		<tr>
			<td height="35" width="100%" colspan="2">&nbsp;<span id="ekle_durum"></span></td>
		</tr>
		<tr>
			<td height="15" colspan="2">&nbsp;</td>
		</tr>
		</table>
<? } ?>
<? if ($mode=="sil") {

$id = sql($_POST['id']);
$sil = "delete from ppc_cat where id = '$id'";
$yali = mysql_query($sil);


}
?>