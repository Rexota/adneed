<?php
include("db.php");

$title = "Kategorileri Yönetin - ".$sitetitle;
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


$('#admin_kategoriler').load('inc_admin/kategoriler.php?mode=see');


})



function kategori_ekle() {

  $('#kategori_duzen_panel').html('<img src="new/loadingAnimation.gif"> Veriler yükleniyor...');
  $('#kategori_duzen_panel').load('inc_admin/kategoriler.php?mode=ekle');

}

</script>
		<div id="content-top"></div>
		<div id="content-middle">

		
		  <div class="columnz">
			<h3>Kategorileri Yönetin</h3>
			
			  <table border="0" width="700" cellpadding="0" style="border-collapse: collapse">
			    <tr>
			<td height="45" id="kategori_duzen_panel" colspan="2">&nbsp;</td>
		</tr>
				<tr>
					<td height="25" width="455" bordercolor="#C0C0C0" style="border: 1px solid #C0C0C0">&nbsp;Kategori Adı</td>
					<td height="25" width="57" style="border: 1px solid #C0C0C0">&nbsp;İşlem</td>
				</tr>
				<tr>
					<td id="admin_kategoriler" height="45" colspan="2">&nbsp;<img src="extra/notification-information.gif"> Başlamak için yukarıdan işlem seçiniz..</td>
				</tr>
				<tr>
					<td height="35" colspan="2">&nbsp;<input onclick="kategori_ekle();" type="button" class="button" value="Yeni Kategori Ekle"></td>
				</tr>
			</table>
			</div>

		
			<div class="clear"></div>
		</div>
		
		<div id="content-bottom"></div>
	
		


<?
include("alt.php"); ?>


<? } ?>