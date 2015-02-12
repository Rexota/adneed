<?php
$mode = $_GET['mode'];

include("../db.php");
include('../fonksiyon.php');
include("../sayfa_koruma.php");
include("../sayfa_admin.php");
?><? if ($mode=='') { ?>
<title></title>
<script type="text/javascript">

function sayfa_getir(id) {

 $('#admin_hit').html('<img src="new/loadingAnimation.gif"> Yükleniyor...');
 $('#admin_hit').load('inc_admin/hit.php?p='+id);

}


</script>
<?	

$limit = 30;
 
$git = @$_GET["p"];
 
if(empty($git) or !is_numeric($git)) { $git = 1; }

$count      = mysql_num_rows(mysql_query("select * from gunluk_raporlar"));

$toplamsayfa    = ceil($count / $limit);
$baslangic  = ($git-1)*$limit;




$result = @mysql_query("select * from gunluk_raporlar order by id desc LIMIT $baslangic,$limit");



if (mysql_num_rows($result)<1) {
?>
 <table border="0" width="500" cellpadding="0" style="border-collapse: collapse">
		<tr>
					<td height="25" width="" style="border: 1px solid #000080" colspan="4">
					<p>&nbsp;<img border="0" src="img/uyari.gif" width="15" height="15"> Geçmiş Tarih Verisi Bulunamadı.</td>
				</tr>
		</table>


<? 
} else {

?>

 <table border="0" width="500" cellpadding="0" style="border-collapse: collapse">
<?
	 
while($yaz = mysql_fetch_array($result))

{

?>

          <tr>
					<td height="30" width="150" style="border: 1px solid #c0c0c0; padding-top: 1px">&nbsp;<?=number_format($yaz[tekil])?></td>
					<td height="" width="150" style="border: 1px solid #c0c0c0; padding-top: 1px">&nbsp;<?=number_format($yaz[cogul])?></td>
					<td height="" width="200" style="border: 1px solid #c0c0c0; padding-top: 1px">&nbsp;<?=$yaz[tarih]?></td>

				</tr>
		
<? } ?>

		    <tr>
			<td height="35" width="500" colspan="3" style="border: 0px solid #008000; padding-top: 1px">&nbsp;<font style="font-size:13px;">Sayfa: 
			<?for ($i = 1; $i <= $toplamsayfa ; $i++ ) {?>
			<? if ($git==$i) { ?>
			&nbsp;<b>[<?=$i?>]</b>
			<? } else { ?>
			&nbsp;<a onclick="sayfa_getir(<?=$i?>)" class="sayfa_tikla" style="cursor:pointer;"><?=$i?></a>
			<? } ?>
			<? } ?>
			</font></td>
		</tr>
		
		
</table>
<? } } ?>