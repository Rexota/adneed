<?php
include("db.php");

$title = "PPC Modüllerini Yönetin - ".$sitetitle;
$keywords = "";
$description = "";

include("sayfa_koruma.php");
include("sayfa_admin.php");
include('ust.php');

$mode = sql($_GET['mode']);
?>
		
<? if ($mode=="") { ?>
<script type="text/javascript">

$(function() {


$('#admin_ppc').load('inc_admin/ppc.php?mode=see');


})



function modul_ekle() {

  $('#ppc_panel').html('<img src="new/loadingAnimation.gif"> Veriler yükleniyor...');
  $('#ppc_panel').load('inc_admin/ppc.php?mode=ekle');

}

</script>
		<div id="content-top"></div>
		<div id="content-middle">

		
		  <div class="columnz">
			<h3>Modülleri Yönetin</h3>
			
			  <table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
			    <tr>
			<td height="25" id="ppc_panel" colspan="8">&nbsp;</td>
		</tr>
				<tr>
				<td height="25" width="16%" style="border: 1px solid #C0C0C0">&nbsp;Modül Adı</td>
				<td height="25" width="12%" style="border: 1px solid #C0C0C0">&nbsp;Boyutlar</td>
				<td height="25" width="12%" style="border: 1px solid #C0C0C0">&nbsp;Min.Tık</td>
				<td height="25" width="12%" style="border: 1px solid #C0C0C0">&nbsp;Max.Tık</td>
				<td height="25" width="12%" style="border: 1px solid #C0C0C0">&nbsp;Kesinti</td>
				<td height="25" width="12%" style="border: 1px solid #C0C0C0">&nbsp;Min.Bütçe</td>
				<td height="25" width="12%" style="border: 1px solid #C0C0C0">&nbsp;Max.Bütçe</td>
				<td height="25" width="12%" style="border: 1px solid #C0C0C0">&nbsp;İşlem</td>
				</tr>
				<tr>
					<td id="admin_ppc" height="45" colspan="8">&nbsp;<img src="extra/notification-information.gif"> Başlamak için yukarıdan işlem seçiniz..</td>
				</tr>
				<tr>
					<td height="35" colspan="8">&nbsp;<input onclick="modul_ekle();" type="button" class="button" value="Yeni Modül Ekle"></td>
				</tr>
			</table>
			</div>

		
			<div class="clear"></div>
		</div>
		
		<div id="content-bottom"></div>
	
		


<?
include("alt.php"); ?>


<? } ?>