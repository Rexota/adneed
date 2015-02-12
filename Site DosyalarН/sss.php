<?php
include("db.php");

$title = "Sıkça Sorulan Sorular - ".$sitetitle;
$keywords = "";
$description = "";


include('ust.php');
?>
		<div id="content-top"></div>
		<div id="content-middle">

		
		  <div class="columnz">
			<h3>Sıkça Sorulan Sorular</h3>
			  
			</div>
			<div class="clear">
			
<?	
$result = @mysql_query("select * from sss");

if (mysql_num_rows($result)<1) {
?>
<p>&nbsp;</p>
			<li style="list-style:none;font-size:13px;font-weight:bold;border-bottom: solid 1px #c0c0c0;width:95%;padding-bottom:10px;border-top: solid 1px #c0c0c0;width:auto;padding-top:10px;"">Herhangi bir soru bulunamadı !</li></p>
<? 
} else {
?>
<p>&nbsp;</p>
<?
	 
while(list($id, $soru, $cevap ) = @mysql_fetch_row($result))
{
?>
<p>&nbsp;</p>
			<li style="list-style:none;color:#6796CE;font-size:13px;font-weight:bold;border-bottom: solid 1px #c0c0c0;width:auto;padding-bottom:10px;border-top: solid 1px #c0c0c0;width:auto;padding-top:10px;">Soru: <?=$soru?></li></p>
<p>&nbsp;</p>

           <li style="list-style:none;font-size:12px;">Cevap: <?=$cevap?></li></p>


		
<? } } ?>


			
			
			
			</div>
		</div>
		
		<div id="content-bottom"></div>
	
		


<? include("alt.php"); ?>