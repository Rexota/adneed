<?php
include("db.php");

$title = "İletişim Mesajları - ".$sitetitle;
$keywords = "";
$description = "";

include("sayfa_koruma.php");
include("sayfa_admin.php");
include('ust.php');
?>

<script type="text/javascript">




 
 
 function okunmamis() {
 
 $('#admin_iletisim').html('<img src="new/loadingAnimation.gif"> Yükleniyor ...');
 setTimeout("$('#admin_iletisim').load('inc_admin/iletisim.php?mode=okunmamis');", 500);
 }
 
  function okunmus() {
 
 $('#admin_iletisim').html('<img src="new/loadingAnimation.gif"> Yükleniyor ...');
 setTimeout("$('#admin_iletisim').load('inc_admin/iletisim.php?mode=okunmus');", 500);
 }
 
  function tumunugoster() {
 
 $('#admin_iletisim').html('<img src="new/loadingAnimation.gif"> Yükleniyor ...');
 setTimeout("$('#admin_iletisim').load('inc_admin/iletisim.php?mode=tumu');", 500);
 }
 

 



 

</script>


		
		<div id="content-top"></div>
		<div id="content-middle">

		
		  <div class="columnz">
			<h3>İletişim Mesajları Aşağıdadır.</h3>
			
	
			  
			  
			  
			  
			  
			  <table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
		<tr>
			<td height="55" colspan="7">&nbsp;<input onclick="okunmamis()" type="button" class="button" value="Okunmamış">&nbsp;<input onclick="okunmus()" type="button" class="button" value="Okunmuş">&nbsp;<input onclick="tumunugoster()" type="button" class="button" value="Tümünü Göster"></td>
		</tr>
		<tr>
			<td height="25" width="14%" bordercolor="#C0C0C0" style="border: 1px solid #C0C0C0">&nbsp;Adı ve Soyadı</td>
			<td height="25" width="23%" style="border: 1px solid #C0C0C0">&nbsp;Konu</td>
			<td height="25" width="18%" style="border: 1px solid #C0C0C0">&nbsp;Email</td>
			<td height="25" width="15%" style="border: 1px solid #C0C0C0">&nbsp;Telefon</td>
			<td height="25" width="15%" style="border: 1px solid #C0C0C0">&nbsp;Tarih</td>
			<td height="25" width="10%" style="border: 1px solid #C0C0C0">&nbsp;Durum</td>
			<td height="25" width="5%" style="border: 1px solid #C0C0C0">&nbsp;İşlem</td>
		</tr>
		<tr>
			<td id="admin_iletisim" height="40" colspan="7">&nbsp;<img src="extra/notification-information.gif"> Başlamak için yukarıdan işlem seçiniz..</td>
</tr>
		<tr>
			<td height="25" colspan="7">&nbsp;</td>
		</tr>
		</table>



			</div>

		
			<div class="clear"></div>
		</div>
		
		<div id="content-bottom"></div>
	
		


<? include("alt.php"); ?>