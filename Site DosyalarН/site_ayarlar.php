<?php
include("db.php");

$title = "Sistem Ayarları - ".$sitetitle;
$keywords = "";
$description = "";

include("sayfa_koruma.php");
include("sayfa_admin.php");
include('ust.php');
?>
<script type="text/javascript">




 
 
 function genel_ayar() {
 
  $('#ayar_sayfa').html('<img src="new/loadingAnimation.gif"> Sayfa Yükleniyor ...');
  setTimeout("$('#ayar_sayfa').load('inc_admin/ayarlar.php?mode=genel');", 500);
 
 }
 

 
 
 function reklam_ucret() {
 $('#ayar_sayfa').html('<img src="new/loadingAnimation.gif"> Sayfa Yükleniyor ...');
 setTimeout("$('#ayar_sayfa').load('inc_admin/ayarlar.php?mode=genel2');", 500);
 
 }



  function email_ayar() {
 $('#ayar_sayfa').html('<img src="new/loadingAnimation.gif"> Sayfa Yükleniyor ...');
  setTimeout("$('#ayar_sayfa').load('inc_admin/ayarlar.php?mode=genel3');", 500);
 
 }

 
  function bilgi_ayar() {
 $('#ayar_sayfa').html('<img src="new/loadingAnimation.gif"> Sayfa Yükleniyor ...');
  setTimeout("$('#ayar_sayfa').load('inc_admin/ayarlar.php?mode=genel4');", 500);
 
 }
 
 
   function odeme_ayar() {
 $('#ayar_sayfa').html('<img src="new/loadingAnimation.gif"> Sayfa Yükleniyor ...');
  setTimeout("$('#ayar_sayfa').load('inc_admin/ayarlar.php?mode=genel5');", 500);
 
 }
 
    function havuz_ayar() {
 $('#ayar_sayfa').html('<img src="new/loadingAnimation.gif"> Sayfa Yükleniyor ...');
  setTimeout("$('#ayar_sayfa').load('inc_admin/ayarlar.php?mode=genel6');", 500);
 
 }
 
     function reklam_ayar() {
 $('#ayar_sayfa').html('<img src="new/loadingAnimation.gif"> Sayfa Yükleniyor ...');
  setTimeout("$('#ayar_sayfa').load('inc_admin/ayarlar.php?mode=genel7');", 500);
 
 }
 
      function diger_ayar() {
 $('#ayar_sayfa').html('<img src="new/loadingAnimation.gif"> Sayfa Yükleniyor ...');
  setTimeout("$('#ayar_sayfa').load('inc_admin/ayarlar.php?mode=genel8');", 500);
 
 }
 
</script>


		
		<div id="content-top"></div>
		<div id="content-middle">

		
		  <div class="columnz">
			<h3>Sistem Ayarları</h3>


			  <table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
				<tr>
					<td height="15" colspan="4">&nbsp;</td>
				</tr>
				<tr>
					<td height="25" colspan="4">&nbsp;<input onclick="genel_ayar()" type="button" class="button" value="Genel Ayarlar">&nbsp;<input onclick="reklam_ucret()" type="button" class="button" value="Reklam Ücretleri">&nbsp;<input onclick="email_ayar()" type="button" class="button" value="Email Ayarları">&nbsp;<input onclick="bilgi_ayar()" type="button" class="button" value="Bilgilendirme Ayarları">&nbsp;<input onclick="odeme_ayar()" type="button" class="button" value="Ödeme Ayarları">&nbsp;<input onclick="reklam_ayar()" type="button" class="button" value="Reklam Ayarları">&nbsp;<input onclick="havuz_ayar()" type="button" class="button" value="Havuz Ayarları">&nbsp;<input onclick="diger_ayar()" type="button" class="button" value="Diğer Ayarlar"></td>
				</tr>
						<tr>
					<td height="25" colspan="4">&nbsp;</td>
				</tr>
				<tr>
					<td id="ayar_sayfa" height="25" colspan="4">&nbsp;<img src="extra/notification-information.gif"> Başlamak için yukarıdan ayar seçiniz..</td>
				</tr>
				<tr>
					<td height="25" colspan="4">&nbsp;</td>
				</tr>
			</table>
		
		
			</div>

		
			<div class="clear"></div>
		</div>
		
		<div id="content-bottom"></div>
	
		


<? include("alt.php"); ?>