<?php
include("db.php");

$title = "Duyurular - ".$sitetitle;
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


$('#admin_duyurular').load('inc_admin/duyurular.php?mode=see');


})



function duyuru_ekle() {

  $('#duyuru_duzen_panel').html('<img src="new/loadingAnimation.gif"> Veriler yükleniyor...');
  $('#duyuru_duzen_panel').load('inc_admin/duyurular.php?mode=ekle');

}

</script>
		<div id="content-top"></div>
		<div id="content-middle">

		
		  <div class="columnz">
			<h3>Duyuruları Düzenleme Paneli</h3>
			
			  <table border="0" width="700" cellpadding="0" style="border-collapse: collapse">
			    <tr>
			<td height="45" id="duyuru_duzen_panel" colspan="3">&nbsp;</td>
		</tr>
				<tr>
					<td height="25" width="303" bordercolor="#C0C0C0" style="border: 1px solid #C0C0C0">&nbsp;Duyuru Başlığı</td>
					<td height="25" width="152" style="border: 1px solid #C0C0C0">&nbsp;Tarih</td>
					<td height="25" width="57" style="border: 1px solid #C0C0C0">&nbsp;İşlem</td>
				</tr>
				<tr>
					<td id="admin_duyurular" height="45" colspan="3">&nbsp;<img src="extra/notification-information.gif"> Başlamak için yukarıdan işlem seçiniz..</td>
				</tr>
				<tr>
					<td height="35" colspan="3">&nbsp;<input onclick="duyuru_ekle();" type="button" class="button" value="Yeni Duyuru Ekle"></td>
				</tr>
			</table>
			</div>

		
			<div class="clear"></div>
		</div>
		
		<div id="content-bottom"></div>
	
		


<?
include("alt.php"); ?>


<? } ?>