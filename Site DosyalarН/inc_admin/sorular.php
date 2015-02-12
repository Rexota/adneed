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

 $('#admin_sorular').html('<img src="new/loadingAnimation.gif"> Yükleniyor...');
 $('#admin_sorular').load('inc_admin/sorular.php?mode=see&p='+id);

}


 function soruduzenle(id) {
  $('#soru_duzen_panel').html('<img src="new/loadingAnimation.gif"> Veriler yükleniyor...');
  $('#soru_duzen_panel').load('inc_admin/sorular.php?mode=edit&id='+id);
 }
 
 
 function sorusil(id) {

	$.post('inc_admin/sorular.php?mode=sil', { id : id}, function(response) {
	
   $('#admin_sorular').load('inc_admin/sorular.php?mode=see');
	 });


}
</script>
<?	

$limit = 10;
 
$git = @$_GET["p"];
 
if(empty($git) or !is_numeric($git)) { $git = 1; }

$count      = mysql_num_rows(mysql_query("select * from sss"));

$toplamsayfa    = ceil($count / $limit);
$baslangic  = ($git-1)*$limit;




$result = @mysql_query("select * from sss LIMIT $baslangic,$limit");



if (mysql_num_rows($result)<1) {
?>
 <table border="0" width="700" cellpadding="0" style="border-collapse: collapse">
		<tr>
					<td height="25" width="700" style="border: 1px solid #000080" colspan="4">
					<p>&nbsp;<img border="0" src="img/uyari.gif" width="15" height="15"> Soru yada Cevap Bulunamadı.</td>
				</tr>
		</table>


<? 
} else {

?>

 <table border="0" width="700" cellpadding="0" style="border-collapse: collapse">
<?
	 
while(list($id, $soru, $cevap) = @mysql_fetch_row($result))
{

?>

          <tr>
					<td height="25" width="455" style="border: 1px solid #008000; padding-top: 1px">&nbsp;<b><?=$soru?></b></td>
					
					<td height="25" width="57" style="border: 1px solid #008000; padding-top: 1px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a onclick="soruduzenle(<?=$id?>)" href="javascript:void(0)" style="cursor:pointer;"><img src="img/icon_edit.gif"></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:sorusil(<?=$id?>);" onclick="return onay();"><img src="img/icon_delete.gif"></a></td>

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
?>
<?
$yaz = mysql_fetch_array(mysql_query("select * from sss where id = '$id'"));
?>
			  
	<script type="text/javascript">
	
	function islembitti() {
	
	$('#soru_duzen_panel').fadeOut();
	setTimeout("$('#soru_duzen_panel').html('');", 500);
	$('#soru_duzen_panel').fadeIn();
	}
	
	
$(function() {


 
   $('#duzenle_button').click(function() {
  
  
    var id = <?=$id?>;
	var soru = $('#soru').val();
	var cevap = $('#cevap').val();


	

	$.post('inc_admin/sorular.php?mode=editsave', { soru: soru, cevap: cevap, id : id}, function(response) {

				var return_val = ajaxduzelt(response);
				
				switch (return_val) {
					case 'ERROR':
						$('#duzenle_durum').html('<img src="extra/notification-slash.gif"> Zorunlu alanları doldurmadınız !');
						break;

					case 'SUCCESS':
				    $('#duzenle_durum').html('<img src="extra/notification-information.gif"> Değişiklikler kaydedildi.');
					setTimeout("islembitti();", 1500);	
						break;
						
					default:
                   $('#duzenle_durum').html(return_val);
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
			<td height="35" width="16%">&nbsp;Soru:</td>
			<td height="25" width="">&nbsp;<input name="soru" id="soru" class="form-login" title="Password" value="<?=$yaz['soru']?>" style="width:400px;" maxlength="2048" /></td>
		</tr>
		<tr>
			<td height="35" width="">&nbsp;Cevap:</td>
			<td height="25" width="">&nbsp;<textarea id="cevap" name="cevap" class="form-login" style="width:400px;height:150px;"><?=$yaz['cevap']?></textarea></td>
		</tr>
		
				<tr>
			<td height="35" width="">&nbsp;<input type="button"  id="duzenle_button" name="duzenle_button" class="button" value=" Düzenle Kaydet "></td>
			<td height="32" width="">&nbsp;<input type="button" onclick="$('#soru_duzen_panel').html('');" class="button" value="Vazgeç"></td>
		</tr>
		
		<tr>
			<td height="35" width="100%" colspan="2">&nbsp;<span id="duzenle_durum"></span></td>
		</tr>
		<tr>
			<td height="15" colspan="2">&nbsp;</td>
		</tr>
		</table>
<? } ?>
<? if ($mode=="editsave") { ?>
<?
	
$soru = sql($_POST['soru']);
$cevap = sql($_POST['cevap']);
$id = sql($_POST['id']);



if ($id=='' or $soru=='' or $cevap=='') {
die("ERROR");
}

$yali = "UPDATE sss SET soru = '$soru', cevap = '$cevap' where id = '$id'";
$yali = mysql_query($yali);


die("SUCCESS");


?>
<? } ?>
<? if ($mode=="save") { ?>
<?
	
$soru = sql($_POST['soru']);
$cevap = sql($_POST['cevap']);



if ($soru=='' or $cevap=='') {
die("ERROR");
}

$tarih = mktime();

$yali = "insert into sss (soru,cevap) values ('$soru', '$cevap')";
$yali = mysql_query($yali);


die("SUCCESS");


?>
<? } ?>
<? if ($mode=="ekle") { 
?>

			  
	<script type="text/javascript">
	
	function islemsbitti() {
	
	$('#soru_duzen_panel').fadeOut();
	setTimeout("$('#soru_duzen_panel').html('');", 500);
	$('#soru_duzen_panel').fadeIn();
	
	$('#admin_sorular').load('inc_admin/sorular.php?mode=see');
	}
	
	
$(function() {


 
   $('#ekle_button').click(function() {
  
  
	var soru = $('#soru').val();
	var cevap = $('#cevap').val();


	

	$.post('inc_admin/sorular.php?mode=save', {soru: soru, cevap: cevap}, function(response) {

				var return_val = ajaxduzelt(response);
				
				switch (return_val) {
					case 'ERROR':
						$('#ekle_durum').html('<img src="extra/notification-slash.gif"> Zorunlu alanları doldurmadınız !');
						break;

					case 'SUCCESS':
				    $('#ekle_durum').html('<img src="extra/notification-information.gif"> Soru ve Cevap başarıyla eklendi.');
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
			<td height="35" width="14%">&nbsp;Soru:</td>
			<td height="25" width="">&nbsp;<input name="soru" id="soru" class="form-login" title="Password" value="" style="width:400px;" maxlength="2048" /></td>
		</tr>
		<tr>
			<td height="35" width="">&nbsp;Cevap:</td>
			<td height="25" width="">&nbsp;<textarea id="cevap" name="cevap" class="form-login" style="width:400px;height:150px;"></textarea></td>
		</tr>
		
				<tr>
			<td height="35" width="">&nbsp;<input type="button"  id="ekle_button" name="ekle_button" class="button" value="  Soruyu Ekle  "></td>
			<td height="32" width="">&nbsp;<input type="button" onclick="$('#soru_duzen_panel').html('');" class="button" value="Vazgeç"></td>
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
$sil = "delete from sss where id = '$id'";
$yali = mysql_query($sil);


}
?>