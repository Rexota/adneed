<?php
include("db.php");

$title = "Yayıncı Siteleri - ".$sitetitle;
$keywords = "";
$description = "";

include("sayfa_koruma.php");
include("sayfa_editor.php");
include('ust.php');

$ara = $_GET['ara'];
?>
<script type="text/javascript">


function siteleri_goster() {
$('#siteler').html('<img src="new/loadingAnimation.gif"> Yükleniyor ...');
$('#siteler').load('inc_editor/siteler.php?mode=see&ara=<?=$ara?>');
}

function ara_abi() {
var veri = $('#arama').val();

if (veri!='') {
$('#siteler').html('<img src="new/loadingAnimation.gif"> Arama Sonuçları Yükleniyor ...');
$('#siteler').load('inc_editor/siteler.php?mode=see&ara='+veri);
}
}


 function sitesil(id) {
 
 	$.post('inc_editor/siteler.php?mode=sil', {id: id}, function(response) {
	
     siteleri_goster();
			
	 });
 
 }
 
 
 
  function siteduzelt(id) {
 
  $('#site_duzen_panel').html('<img src="new/loadingAnimation.gif"> Bilgiler yükleniyor...');
  $('#site_duzen_panel').load('inc_editor/siteler.php?mode=edit&id='+id);
 
 }
 
 
 


$(function() {
siteleri_goster();
});

</script>
		
		<div id="content-top"></div>
		<div id="content-middle">

		
		  <div class="columnz">
			<h3>Yayıncı Siteleri Aşağıdadır</h3>
			
			  <table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
			  
		<tr>
			<td height="35" id="site_duzen_panel" colspan="9">&nbsp;</td>
		</tr>
		
				<tr>
			<td height="35" colspan="9">&nbsp;Site Adresi yada Kullanıcı adı Girin:&nbsp;<input type="text" class="ninput" value="<?=$ara?>" id="arama" name="arama">&nbsp;<input type="button" id="ara_button" onclick="ara_abi();" class="button" value="Aramaya Başla"></td>
		</tr>
		
		<tr>
			<td height="35" width="20%" style="border: 1px solid #C0C0C0">&nbsp;Site Adresi</td>
			<td height="25" width="15%" style="border: 1px solid #C0C0C0">&nbsp;Eklenme Tarihi</td>
			<td height="25" width="10%" style="border: 1px solid #C0C0C0">&nbsp;Kategori</td>
			<td height="25" width="10%" style="border: 1px solid #C0C0C0">&nbsp;Yayıncı Kullanıcı</td>
			<td height="25" width="8%" style="border: 1px solid #C0C0C0">&nbsp;Popup</td>
			<td height="25" width="8%" style="border: 1px solid #C0C0C0">&nbsp;Splash</td>
			<td height="25" width="9%" style="border: 1px solid #C0C0C0">&nbsp;Msn Popup</td>
			<td height="25" width="10%" style="border: 1px solid #C0C0C0">&nbsp;PPC Banner</td>
			<td height="25" width="5%" style="border: 1px solid #C0C0C0"><p align="center"><img border="0" src="extra/notification-information.gif" width="16" height="16" align="middle"></td>
		</tr>
		
		<tr>
	    <td id="siteler" height="45" colspan="9">&nbsp;</td>
		</tr>
		
		
		<tr>
          <td height="25" colspan="9">&nbsp;</td>
		</tr>
		
		<tr>
			<td height="25" colspan="9">&nbsp;<input type="button" onclick="siteleri_goster();"  class="button" value="Siteleri Yenile"></td>
		</tr>
		
		</table>
			
			</div>
			
			


			<div class="clear"></div>
		</div>
		
		<div id="content-bottom"></div>
	
		


<? include("alt.php"); ?>