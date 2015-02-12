<?php
include("../db.php");
include('../fonksiyon.php');
include("../sayfa_koruma.php");
include("../sayfa_editor.php");


$id = sql($_GET['id']);
?>
<title></title>
<?	
$result = @mysql_query("select * from ticket_cevaplar where ticket_id = '$id'");
?>
		<table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
		<tr>
			<td>&nbsp;</td>
		</tr>
		</table>
<?
while(list($id, $ticket_id, $yazan, $yazan_tur, $tarih, $mesaj, $yazan_id ) = @mysql_fetch_row($result))
{
?>
<table border="0" width="100%" cellpadding="0" style="border-collapse: collapse" height="200">
	<tr>
		<td width="195" valign="top">
		<? if ($yazan_id == $_SESSION['userid']) { ?>
		<div style="width:100%;height:100%;border: solid 1px #f4f3f4;border-radius:8px;background-color:#f4f3f4;">
		<? } else { ?>
		<div style="width:100%;height:100%;border: solid 1px #FFEED9;border-radius:8px;background-color:#FFEED9;">
		<? } ?>
		<div align="center">
		<table border="0" width="90%" cellpadding="0" style="border-collapse: collapse">
	<tr>
		<td height="30">&nbsp;Yazan:</td>
	</tr>
	<tr>
		<td height="32" bgcolor="#FFFFFF" style="border: 1px dashed #fff;">&nbsp;<?=$yazan?></td>
	</tr>
	<tr>
		<td height="30">&nbsp;Kimlik:</td>
	</tr>
	<tr>
		<td height="32" bgcolor="#FFFFFF" style="border: 1px dashed #fff;">&nbsp;<?=$yazan_tur?></td>
	</tr>
	<tr>
		<td height="30">&nbsp;Tarih:</td>
	</tr>
	<tr>
		<td height="32" bgcolor="#FFFFFF" style="border: 1px dashed #fff;">&nbsp;<?=date("d.m.Y H:i:s",$tarih)?></td>
	</tr>
	</table>
		</div>
		</div>
		
		
		
		</td>
		<td valign="top">
		
		
		
				<? if ($yazan_id == $_SESSION['userid']) { ?>
		<div style="width:99%;margin-left:5px;height:100%;border: solid 1px #f4f3f4;border-radius:8px;background-color:#f4f3f4;">
		<? } else { ?>
		<div style="width:99%;margin-left:5px;height:100%;border: solid 1px #FFEED9;border-radius:8px;background-color:#FFEED9;">
		<? } ?>
		<div align="center">
		<table border="0" width="95%" cellpadding="0" style="border-collapse: collapse">
	<tr>
		<td height="30">&nbsp;Mesaj:</td>
	</tr>
	<tr>
		<td height="156" bgcolor="#FFFFFF" style="border: 1px dashed #fff;" valign="top">&nbsp;<?=$mesaj?></td>
	</tr>
	</table>
		</div>
		</div>
		</td>
	</tr>
</table>
		<table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
		<tr>
			<td>&nbsp;</td>
		</tr>
		</table>
		
<? } ?>