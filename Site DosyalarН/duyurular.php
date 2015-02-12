<?php
include("db.php");

$title = "Duyurular - ".$sitetitle;
$keywords = "";
$description = "";

include('ust.php');

$mode = sql($_GET['mode']);
?>
		<div id="content-top"></div>
		<div id="content-middle">
<?
if ($mode=='') { ?>
		
		  <div class="columnz">
			<h3>Duyurular</h3>
			  
			</div>
			<div class="clear">
			
<?	
$result = @mysql_query("select * from duyurular order by id desc");

if (mysql_num_rows($result)<1) {
?>
<p>&nbsp;</p>
			<li style="list-style:none;font-size:13px;font-weight:bold;border-bottom: solid 1px #c0c0c0;width:95%;padding-bottom:10px;border-top: solid 1px #c0c0c0;width:auto;padding-top:10px;"">Şuanda duyuru yok !</li></p>
<? 
} else {
?>
<p>&nbsp;</p>
<?
	 
while(list($id, $baslik, $mesaj, $tarih ) = @mysql_fetch_row($result))
{
?>
<p>&nbsp;</p>
			<a href="duyurular.php?mode=read&id=<?=$id?>"><li style="list-style:none;font-size:13px;font-weight:bold;border-bottom: solid 1px #c0c0c0;width:95%;padding-bottom:10px;border-top: solid 1px #c0c0c0;width:auto;padding-top:10px;"><?=$baslik?> - <?=date("d.m.Y", $tarih)?></li></a></p>


		
<? } } ?>

<? } ?>

<? if ($mode=='read') {
$id = sql($_GET['id']);
$yaz = mysql_fetch_array(mysql_query("select * from duyurular where id = '$id'"));
?>
			
					  <div class="columnz">
			<h3><?=$yaz['baslik']?> - <?=date("d.m.Y H:i:s",$yaz[tarih])?></h3>
			  
			</div>
			<div class="clear">
			
<p>&nbsp;</p>

<p>&nbsp;</p>
			<li style="list-style:none;font-size:13px;font-weight:none;border-bottom: solid 1px #c0c0c0;width:auto;padding-bottom:10px;border-top: solid 1px #c0c0c0;width:auto;padding-top:10px;"><?=satir($yaz['icerik'])?></li></p>


		

			
			<? } ?>
			
			
			</div>
		</div>
		
		<div id="content-bottom"></div>
	
		


<? include("alt.php"); ?>