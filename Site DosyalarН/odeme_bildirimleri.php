<?php
include("db.php");

$title = "Ödeme Bildirimleri - ".$sitetitle;
$keywords = "";
$description = "";

include("sayfa_koruma.php");
include("sayfa_admin.php");
include('ust.php');
?>

<script type="text/javascript">




 
 
 function onaybekleyen() {
 
 $('#odeme_bildirimleri').html('<img src="new/loadingAnimation.gif"> Yükleniyor ...');
 setTimeout("$('#odeme_bildirimleri').load('inc_admin/odeme_bildirim.php?mode=bekleyen');", 500);
 }
 
  function onaylanmis() {
 
 $('#odeme_bildirimleri').html('<img src="new/loadingAnimation.gif"> Yükleniyor ...');
 setTimeout("$('#odeme_bildirimleri').load('inc_admin/odeme_bildirim.php?mode=onayli');", 500);
 }
 
  function tumunugoster() {
 
 $('#odeme_bildirimleri').html('<img src="new/loadingAnimation.gif"> Yükleniyor ...');
 setTimeout("$('#odeme_bildirimleri').load('inc_admin/odeme_bildirim.php?mode=tumu');", 500);
 }
 

 



 

</script>


		
		<div id="content-top"></div>
		<div id="content-middle">

		
		  <div class="columnz">
			<h3>Ödeme Bildirimleri Aşağıdadır.</h3>
			
	
			  
			  
			  
			  
			  
			  <table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
		<tr>
			<td height="55" colspan="6">&nbsp;<input onclick="onaybekleyen()" type="button" class="button" value="Onay Bekleyen">&nbsp;<input onclick="onaylanmis()" type="button" class="button" value="Onaylanmış">&nbsp;<input onclick="tumunugoster()" type="button" class="button" value="Tümünü Göster"></td>
		</tr>
		<tr>
			<td height="25" width="294" bordercolor="#C0C0C0" style="border: 1px solid #C0C0C0">
			&nbsp;Reklam</td>
			<td height="25" width="187" style="border: 1px solid #C0C0C0">&nbsp;Tarih</td>
			<td height="25" width="138" style="border: 1px solid #C0C0C0">&nbsp;Ödeme 
			Türü</td>
			<td height="25" width="187" style="border: 1px solid #C0C0C0">
			&nbsp;Durum</td>
			<td height="25" width="87" style="border: 1px solid #C0C0C0">&nbsp;Tutar</td>
			<td height="25" width="87" style="border: 1px solid #C0C0C0">&nbsp;İşlem</td>
		</tr>
		<tr>
			<td id="odeme_bildirimleri" height="40" colspan="6">&nbsp;<img src="extra/notification-information.gif"> Başlamak için yukarıdan işlem seçiniz..</td>
</tr>
		<tr>
			<td height="25" colspan="6">&nbsp;</td>
		</tr>
		</table>



			</div>

		
			<div class="clear"></div>
		</div>
		
		<div id="content-bottom"></div>
	
		


<? include("alt.php"); ?>