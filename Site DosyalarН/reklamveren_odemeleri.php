<?php
include("db.php");

$title = "Yaptığım Ödemeler - ".$sitetitle;
$keywords = "";
$description = "";

include("sayfa_koruma.php");
include("sayfa_reklamveren.php");
include('ust.php');
?>

<script type="text/javascript">


 function odemesil(id) {
 
 	$.post('inc_reklam/odeme.php?mode=sil', {id: id}, function(response) {
	
	var return_val = ajaxduzelt(response);
			
	 });
 
 odemeyenile();
 }
 
 



function odemeyenile() { $('#yaptigim_odemeler').load('inc_reklam/odeme.php?mode=see'); }


$(function(){
odemeyenile();
});


</script>


		
		<div id="content-top"></div>
		<div id="content-middle">

		
		  <div class="columnz">
			<h3>Yapmış olduğunuz ödemeler aşağıdadır.</h3>
			
	
			  
			  
			  
			  
			  
			  <table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
		<tr>
			<td height="25" colspan="6">&nbsp;</td>
		</tr>
		<tr>
			<td height="25" width="294" bordercolor="#C0C0C0" style="border: 1px solid #C0C0C0">
			&nbsp;Reklam</td>
			<td height="25" width="187" style="border: 1px solid #C0C0C0">&nbsp;Tarih</td>
			<td height="25" width="138" style="border: 1px solid #C0C0C0">&nbsp;Ödeme 
			Türü</td>
			<td height="25" width="187" style="border: 1px solid #C0C0C0">
			&nbsp;Durum</td>
			<td height="25" width="87" style="border: 1px solid #C0C0C0">&nbsp;Tutar</td>
			<td height="25" width="87" style="border: 1px solid #C0C0C0">&nbsp;İşlem</td>
		</tr>
		<tr>
			<td id="yaptigim_odemeler" height="25" colspan="6">&nbsp;</td>
		</tr>
				<tr>
			<td id="" height="25" colspan="6">&nbsp;</td>
		</tr>
				<tr>
			<td height="25" colspan="6">&nbsp;<input type="button" onclick="odemeyenile();"  class="button" value="Listeyi Yenile"></td>
		</tr>
		</table>



			</div>

		
			<div class="clear"></div>
		</div>
		
		<div id="content-bottom"></div>
	
		


<? include("alt.php"); ?>