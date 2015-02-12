<?php
include("db.php");
include("sayfa_koruma.php");

$title = "Banka Hesaplarımız - ".$sitetitle;
$keywords = "";
$description = "";

include('ust.php');
?>
<script type="text/javascript">


  function hesapyenile() {

 $('#hesaplarimiz').load('inc/hesap.php?mode=see');

 }



$(function(){
hesapyenile();
});



</script>
		
		<div id="content-top"></div>
		<div id="content-middle">

		
		  <div class="columnz">
			<h3>Banka Hesap Bilgilerimiz Aşağıdadır</h3>
			
			  <table border="0" width="920" cellpadding="0" style="border-collapse: collapse">
		    <tr>
			<td height="25" colspan="6">&nbsp;</td>
		</tr>
		<tr>
			<td height="25" width="227" bordercolor="#C0C0C0" style="border: 1px solid #C0C0C0">
			&nbsp;Banka</td>
			<td height="25" width="206" bordercolor="#C0C0C0" style="border: 1px solid #C0C0C0">
			&nbsp;Hesap sahibi</td>
			<td height="25" width="65" style="border: 1px solid #C0C0C0">&nbsp;Şube</td>
			<td height="25" width="110" style="border: 1px solid #C0C0C0">
			&nbsp;Hesap No</td>
			<td height="25" width="285" style="border: 1px solid #C0C0C0">&nbsp;IBAN</td>
			<td height="25" width="26" style="border: 1px solid #C0C0C0">
			<p align="center">
			<img border="0" src="extra/notification-information.gif" width="16" height="16" align="middle"></td>
		</tr>
		<tr>
		
		
	    <td id="hesaplarimiz" colspan="6">&nbsp;</td>
		</tr>
		<tr>
		

			<td height="25" colspan="6">&nbsp;</td>
		</tr>
		<tr>
			<td height="25" colspan="6">&nbsp;<input type="button" onclick="hesapyenile();"  class="button" value="Listeyi Yenile"></td>
		</tr>
		</table>
			
			</div>
			
	
			<div class="clear"></div>
		</div>
		
		<div id="content-bottom"></div>
	
		


<? include("alt.php"); ?>