<?php
include("db.php");

$title = "Ödeme Talepleri - ".$sitetitle;
$keywords = "";
$description = "";

include("sayfa_koruma.php");
include("sayfa_admin.php");
include('ust.php');


?>
<script type="text/javascript">




 
 
 function onay_bekleyen() {
 
 $('#odeme_talepleri').html('<img src="new/loadingAnimation.gif"> Yükleniyor ...');
 setTimeout("$('#odeme_talepleri').load('inc_admin/odeme_talep.php?mode=bekleyen');", 500);
 }
 
 
 function onay_lanmis() {
 $('#odeme_talepleri').html('<img src="new/loadingAnimation.gif"> Yükleniyor ...');
 setTimeout("$('#odeme_talepleri').load('inc_admin/odeme_talep.php?mode=onayli');", 500);
 
 }
 
  function engel_lenmis() {
 $('#odeme_talepleri').html('<img src="new/loadingAnimation.gif"> Yükleniyor ...');
 setTimeout("$('#odeme_talepleri').load('inc_admin/odeme_talep.php?mode=engel');", 500);
 
 }


 function onay_tumu() {
 $('#odeme_talepleri').html('<img src="new/loadingAnimation.gif"> Yükleniyor ...');
 setTimeout("$('#odeme_talepleri').load('inc_admin/odeme_talep.php?mode=tumu');", 500);
 
 }


 

</script>
		<div id="content-top"></div>
		<div id="content-middle">

		
		  <div class="columnz">
			<h3>Ödeme Talepleri</h3>

			  <table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
		<tr>
		
			<td height="55" colspan="7"><input onclick="onay_bekleyen()" type="button" class="button" value="Onay Bekleyen">&nbsp;<input onclick="onay_lanmis()" type="button" class="button" value="Onaylanmış">&nbsp;<input onclick="engel_lenmis()" type="button" class="button" value="Engellenmiş">&nbsp;<input onclick="onay_tumu()" type="button" class="button" value="Tümünü Göster"></td>
		</tr>
		<tr>
			<td height="25" width="224" bordercolor="#C0C0C0" style="border: 1px solid #C0C0C0">
			&nbsp;Üye Adı</td>
			<td height="25" width="116" style="border: 1px solid #C0C0C0">&nbsp;Durum</td>
			<td height="25" width="116" style="border: 1px solid #C0C0C0">
			&nbsp;Tutar</td>
			<td height="25" width="116" style="border: 1px solid #C0C0C0">
			&nbsp;Kesinti</td>
			<td height="25" width="117" style="border: 1px solid #C0C0C0">
			&nbsp;Net Ödenecek</td>
			<td height="25" width="133" style="border: 1px solid #C0C0C0">&nbsp;Tarih</td>
			<td height="25" width="66" style="border: 1px solid #C0C0C0">&nbsp;İşlem</td>
		</tr>	
		<tr>
			<td height="32" id="odeme_talepleri" colspan="7">&nbsp;<img src="extra/notification-information.gif"> Başlamak için yukarıdan işlem seçiniz..</td>
		</tr>
		<tr>
			<td height="55" colspan="7">&nbsp;</td>
		</tr>
		<tr>
			<td height="25" colspan="7">
			<table border="0" width="100%" id="table2" cellpadding="0" style="border-collapse: collapse">
				<tr>
					<td>


					</td>
				</tr>
			</table>
			</td>
		</tr>
		</table>
			</div>

		
			<div class="clear"></div>
		</div>
		
		<div id="content-bottom"></div>
	
		


<? include("alt.php"); ?>