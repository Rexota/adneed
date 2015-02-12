<?php
include("db.php");

$title = "Yayıncıları Görüntüleme Paneli - ".$sitetitle;
$keywords = "";
$description = "";

include("sayfa_koruma.php");
include("sayfa_editor.php");
include('ust.php');
?>
<script type="text/javascript">


 function tumunu_goster() {
 $('#uye_listesi').html('<img src="new/loadingAnimation.gif"> Yükleniyor ...');
 $('#uye_listesi').load('inc_editor/uye.php?mode=tumu');
 
 $('#uye_duzen_panel').html('');
 }
 
  function banli_goster() {
 $('#uye_listesi').html('<img src="new/loadingAnimation.gif"> Yükleniyor ...');
 $('#uye_listesi').load('inc_editor/uye.php?mode=banli');
 
 $('#uye_duzen_panel').html('');
 }
 
  function bansiz_goster() {
 $('#uye_listesi').html('<img src="new/loadingAnimation.gif"> Yükleniyor ...');
 $('#uye_listesi').load('inc_editor/uye.php?mode=bansiz');
 
 $('#uye_duzen_panel').html('');
 }

 
 function uyeduzenle(id) {
  $('#uye_duzen_panel').html('<img src="new/loadingAnimation.gif"> Bilgiler yükleniyor...');
  $('#uye_duzen_panel').load('inc_editor/uye.php?mode=edit&id='+id);
 }

 
</script>
		
		<div id="content-top"></div>
		<div id="content-middle">

		
		  <div class="columnz">
			<h3>Yayıncıları Görüntüleme Paneli</h3>
			
			  <table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
			  		    <tr>
			<td height="55" colspan="8">&nbsp;<input onclick="tumunu_goster()" type="button" class="button" value="Tümünü Göster">&nbsp;<input onclick="banli_goster()" type="button" class="button" value="Banlı">&nbsp;<input onclick="bansiz_goster()" type="button" class="button" value="Bansız"></td>
		</tr>
		    <tr>
			<td height="15" id="uye_duzen_panel" colspan="8">&nbsp;</td>
		</tr>
		<tr>
			<td height="25" width="15%" bordercolor="#C0C0C0" style="border: 1px solid #C0C0C0">&nbsp;Adı Soyadı</td>
			<td height="25" width="15%" bordercolor="#C0C0C0" style="border: 1px solid #C0C0C0">&nbsp;Telefon</td>
			<td height="25" width="10%" bordercolor="#C0C0C0" style="border: 1px solid #C0C0C0">&nbsp;Kullanıcı Adı</td>
			<td height="25" width="10%" style="border: 1px solid #C0C0C0">&nbsp;Kimlik No</td>
			<td height="25" width="20%" style="border: 1px solid #C0C0C0">&nbsp;Email</td>
			<td height="25" width="13%" style="border: 1px solid #C0C0C0">&nbsp;Hesap Türü</td>
			<td height="25" width="10%" style="border: 1px solid #C0C0C0">&nbsp;Durum</td>
			<td height="25" width="7%" style="border: 1px solid #C0C0C0">
			<p align="center">
			<img border="0" src="extra/notification-information.gif" width="16" height="16" align="middle"></td>
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