<?php
include("db.php");

$title = "Tekil - Çoğul Gösterim Raporları - ".$sitetitle;
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
rapor_yenile();
})



function rapor_yenile() {

  $('#admin_hit').html('<img src="new/loadingAnimation.gif"> Veriler yükleniyor...');
  $('#admin_hit').load('inc_admin/hit.php');

}

</script>
		<div id="content-top"></div>
		<div id="content-middle">

		
		  <div class="columnz">
			<h3>Tekil - Çoğul Gösterim Raporları</h3>
			
			  <table border="0" width="500" cellpadding="0" style="border-collapse: collapse">
			    <tr>
			<td height="25" colspan="3">&nbsp;</td>
		       </tr>
			   
				<tr>
					<td height="35" width="150" style="border: 1px solid #777">&nbsp;Tekil Hit</td>
					<td height="" width="150" style="border: 1px solid #777">&nbsp;Çoğul Hit</td>
					<td height="" width="200" style="border: 1px solid #777">&nbsp;Tarih</td>
				</tr>
				
				<tr>
					<td height="35" width="150" style="border: 1px solid #c0c0c0">&nbsp;<?=number_format(anasayfa_gosterim_tekil())?></td>
					<td height="" width="150" style="border: 1px solid #c0c0c0">&nbsp;<?=number_format(anasayfa_gosterim())?></td>
					<td height="" width="200" style="border: 1px solid #c0c0c0">&nbsp;Bugün</td>
				</tr>
			   
			   
			   
			  <tr>
			<td height="25" colspan="3">&nbsp;</td>
		       </tr>
			   
			   
			   
				<tr>
					<td height="35" width="150" style="border: 1px solid #777">&nbsp;Tekil Hit</td>
					<td height="" width="150" style="border: 1px solid #777">&nbsp;Çoğul Hit</td>
					<td height="" width="200" style="border: 1px solid #777">&nbsp;Tarih</td>
				</tr>
				
				
				<tr>
					<td id="admin_hit" height="45" colspan="3">&nbsp;<img src="extra/notification-information.gif"> Başlamak için yukarıdan işlem seçiniz..</td>
				</tr>
				<tr>
					<td height="35" colspan="3">&nbsp;<input onclick="rapor_yenile();" type="button" class="button" value="Raporları Yenile"></td>
				</tr>
			</table>
			</div>

		
			<div class="clear"></div>
		</div>
		
		<div id="content-bottom"></div>
	
		


<?
include("alt.php"); ?>


<? } ?>