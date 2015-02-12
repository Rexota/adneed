<?php
include("db.php");

$title = "Tüm Üyelerin Listesi - ".$sitetitle;
$keywords = "";
$description = "";

include("sayfa_koruma.php");
include("sayfa_admin.php");
include('ust.php');
?>
<script type="text/javascript">

 function yayinci_goster() {
 $('#uye_listesi').html('<img src="new/loadingAnimation.gif"> Yükleniyor ...');
 $('#uye_listesi').load('inc_admin/uye.php?mode=yayinci');
 
 $('#uye_duzen_panel').html('');
 }
 
 function reklamveren_goster() {
 $('#uye_listesi').html('<img src="new/loadingAnimation.gif"> Yükleniyor ...');
 $('#uye_listesi').load('inc_admin/uye.php?mode=reklamveren');
 
 $('#uye_duzen_panel').html('');
 }
 
 
 function tumunu_goster() {
 $('#uye_listesi').html('<img src="new/loadingAnimation.gif"> Yükleniyor ...');
 $('#uye_listesi').load('inc_admin/uye.php?mode=tumu');
 
 $('#uye_duzen_panel').html('');
 }
 
  function editor_goster() {
 $('#uye_listesi').html('<img src="new/loadingAnimation.gif"> Yükleniyor ...');
 $('#uye_listesi').load('inc_admin/uye.php?mode=editor');
 
 $('#uye_duzen_panel').html('');
 }
 
  function admin_goster() {
 $('#uye_listesi').html('<img src="new/loadingAnimation.gif"> Yükleniyor ...');
 $('#uye_listesi').load('inc_admin/uye.php?mode=admin');
 
 $('#uye_duzen_panel').html('');
 }

 
 function uyeduzenle(id) {
  $('#uye_duzen_panel').html('<img src="new/loadingAnimation.gif"> Bilgiler yükleniyor...');
  $('#uye_duzen_panel').load('inc_admin/uye.php?mode=edit&id='+id);
 }

 
</script>
		
		<div id="content-top"></div>
		<div id="content-middle">

		
		  <div class="columnz">
			<h3>Tüm Üyelerin Listesi</h3>
			
			  <table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
			  		    <tr>
			<td height="55" colspan="8">&nbsp;<input onclick="yayinci_goster()" type="button" class="button" value="Yayıncılar">&nbsp;<input onclick="reklamveren_goster()" type="button" class="button" value="Reklamverenler">&nbsp;<input onclick="editor_goster()" type="button" class="button" value="Editörler">&nbsp;<input onclick="admin_goster()" type="button" class="button" value="Adminler">&nbsp;<input onclick="tumunu_goster()" type="button" class="button" value="Tümünü Göster"></td>
		</tr>
		    <tr>
			<td height="35" id="uye_duzen_panel" colspan="8">&nbsp;</td>
		</tr>
		<tr>

			<td height="25" width="15%" style="border: 1px solid #C0C0C0">&nbsp;Kullanıcı Adı</td>
			<td height="25" width="25%" style="border: 1px solid #C0C0C0">&nbsp;Email</td>
			<td height="25" width="15%" style="border: 1px solid #C0C0C0">&nbsp;Adı Soyadı</td>
			<td height="25" width="13%" style="border: 1px solid #C0C0C0">&nbsp;Telefon</td>
			<td height="25" width="12%" style="border: 1px solid #C0C0C0">&nbsp;Hesap Türü</td>
			<td height="25" width="8%" style="border: 1px solid #C0C0C0">&nbsp;Onay</td>
			<td height="25" width="7%" style="border: 1px solid #C0C0C0">&nbsp;Giriş</td>
			<td height="25" width="5%" style="border: 1px solid #C0C0C0"><p align="center"><img border="0" src="extra/notification-information.gif" width="16" height="16" align="middle"></td>
		</tr>
		<tr>
		
		
	    <td id="uye_listesi" height="45" colspan="8">&nbsp;<img src="extra/notification-information.gif"> Başlamak için yukarıdan işlem seçiniz..</td>
		</tr>
		<tr>
		</table>
			
			</div>
			
			


			<div class="clear"></div>
		</div>
		
		<div id="content-bottom"></div>
	
		


<? include("alt.php"); ?>