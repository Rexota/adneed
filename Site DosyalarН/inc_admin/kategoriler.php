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

 $('#admin_kategoriler').html('<img src="new/loadingAnimation.gif"> Yükleniyor...');
 $('#admin_kategoriler').load('inc_admin/kategoriler.php?mode=see&p='+id);

}


 function kategoriduzenle(id) {
  $('#kategori_duzen_panel').html('<img src="new/loadingAnimation.gif"> Veriler yükleniyor...');
  $('#kategori_duzen_panel').load('inc_admin/kategoriler.php?mode=edit&id='+id);
 }
 
 
 function kategorisil(id) {

	$.post('inc_admin/kategoriler.php?mode=sil', { id : id}, function(response) {
	
   $('#admin_kategoriler').load('inc_admin/kategoriler.php?mode=see');
	 });


}
</script>
<?	

$limit = 10;
 
$git = @$_GET["p"];
 
if(empty($git) or !is_numeric($git)) { $git = 1; }

$count      = mysql_num_rows(mysql_query("select * from kategoriler"));

$toplamsayfa    = ceil($count / $limit);
$baslangic  = ($git-1)*$limit;




$result = @mysql_query("select * from kategoriler LIMIT $baslangic,$limit");



if (mysql_num_rows($result)<1) {
?>
 <table border="0" width="700" cellpadding="0" style="border-collapse: collapse">
		<tr>
					<td height="25" width="700" style="border: 1px solid #000080" colspan="4">
					<p>&nbsp;<img border="0" src="img/uyari.gif" width="15" height="15"> Kategori Bulunamadı.</td>
				</tr>
		</table>


<? 
} else {

?>

 <table border="0" width="700" cellpadding="0" style="border-collapse: collapse">
<?
	 
while($yaz = mysql_fetch_array($result))

{

?>

          <tr>
					<td height="25" width="455" style="border: 1px solid #008000; padding-top: 1px">&nbsp;<?=$yaz[name]?></td>
							
					<td height="25" width="57" style="border: 1px solid #008000; padding-top: 1px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a onclick="kategoriduzenle(<?=$yaz[id]?>)" href="javascript:void(0)" style="cursor:pointer;"><img src="img/icon_edit.gif"></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:kategorisil(<?=$yaz[id]?>);" onclick="return onay();"><img src="img/icon_delete.gif"></a></td>

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
$yaz = mysql_fetch_array(mysql_query("select * from kategoriler where id = '$id'"));
?>
			  
	<script type="text/javascript">
	
	function islembitti() {
	
	$('#kategori_duzen_panel').fadeOut();
	setTimeout("$('#kategori_duzen_panel').html('');", 500);
	$('#kategori_duzen_panel').fadeIn();
	}
	
	
$(function() {


 
   $('#duzenle_button').click(function() {
  
  
    var id = <?=$id?>;
	var icerik = $('#ad').val();


	

	$.post('inc_admin/kategoriler.php?mode=editsave', {icerik: icerik, id : id}, function(response) {

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
			<td height="25" colspan="2">&nbsp;</td>
		</tr>
		
		
		<tr>
			<td height="35" width="16%">&nbsp;Kategori Adı:</td>
			<td height="25" width="85%">&nbsp;<input type="text" name="ad" id="ad" value="<?=$yaz[name]?>" class="form-login"></td>
		</tr>
		
		
		<tr>
			<td height="35" width="">&nbsp;<input type="button"  id="duzenle_button" name="duzenle_button" class="button" value="Düzenle Kaydet"></td>
			<td height="32" width="">&nbsp;<input type="button" onclick="$('#kategori_duzen_panel').html('');" class="button" value="Vazgeç"></td>
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
	
$icerik = sql($_POST['icerik']);
$id = sql($_POST['id']);



if ($id=='' or $icerik=='') {
die("ERROR");
}

$yali = "UPDATE kategoriler SET name = '$icerik' where id = '$id'";
$yali = mysql_query($yali);


die("SUCCESS");


?>
<? } ?>
<? if ($mode=="save") { ?>
<?
	
$icerik = sql($_POST['icerik']);



if ($icerik=='') {
die("ERROR");
}

$tarih = mktime();

$yali = "insert into kategoriler (name) values ('$icerik')";
$yali = mysql_query($yali);


die("SUCCESS");


?>
<? } ?>
<? if ($mode=="ekle") { 
?>

			  
	<script type="text/javascript">
	
	function islemsbitti() {
	
	$('#kategori_duzen_panel').fadeOut();
	setTimeout("$('#kategori_duzen_panel').html('');", 500);
	$('#kategori_duzen_panel').fadeIn();
	
	$('#admin_kategoriler').load('inc_admin/kategoriler.php?mode=see');
	}
	
	
$(function() {


 
   $('#ekle_button').click(function() {
  
  
	var icerik = $('#ad').val();


	

	$.post('inc_admin/kategoriler.php?mode=save', {icerik: icerik}, function(response) {

				var return_val = ajaxduzelt(response);
				
				switch (return_val) {
					case 'ERROR':
						$('#ekle_durum').html('<img src="extra/notification-slash.gif"> Zorunlu alanları doldurmadınız !');
						break;

					case 'SUCCESS':
				    $('#ekle_durum').html('<img src="extra/notification-information.gif"> Kategori başarıyla eklendi.');
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
			<td height="35" width="15%">&nbsp;Kategori Adı:</td>
			<td height="25" width="85%">&nbsp;<input type="text" name="ad" id="ad" class="form-login"></td>
		</tr>
		
				<tr>
			<td height="35" width="">&nbsp;<input type="button"  id="ekle_button" name="ekle_button" class="button" value="  Kategori Ekle  "></td>
			<td height="32" width="">&nbsp;<input type="button" onclick="$('#kategori_duzen_panel').html('');" class="button" value="Vazgeç"></td>
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
$sil = "delete from kategoriler where id = '$id'";
$yali = mysql_query($sil);


}
?>