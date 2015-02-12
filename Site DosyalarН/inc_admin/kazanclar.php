<?
$mode = $_GET['mode'];

include("../db.php");
include("../sayfa_koruma.php");
include("../sayfa_admin.php");
include('../fonksiyon.php');
?><?

$git = @$_GET["p"];
 
if(empty($git) or !is_numeric($git)) { $git = 1; }

?>
<title></title>
<script type="text/javascript">



function sayfa_getir(id) {

 $('#yayincilar').html('<img src="new/loadingAnimation.gif"> Yükleniyor...');
 $('#yayincilar').load('inc_admin/kazanclar.php?p='+id);

}
</script>
<?	

$limit = 10;



$count      = mysql_num_rows(mysql_query("select * from user where sil = 0 and tur = 1"));

$toplamsayfa    = ceil($count / $limit);
$baslangic  = ($git-1)*$limit;

$result = @mysql_query("select * from user where sil = 0 and tur = 1 order by onay asc LIMIT $baslangic,$limit"); 


if (@mysql_num_rows($result)<1) {

if ($git > 1) {
$yenisayfa = $git-1;
?>
<script type="text/javascript">$(function() { sayfa_getir(<?=$yenisayfa?>) });</script>
<?
}
?>
 <table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
		    <tr>

			<td height="25" width="100%" style="border: 1px solid #C0C0C0;" colspan="6">
			<p>&nbsp;<img border="0" src="img/uyar232i.gif" width="14" height="16" align="middle"> 
			Sistemde Üye Bulunamadı !</td>
		</tr>
		</table>


<? 
} else {

?>

 <table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
<?
	 
while(list($id, $usernames, $passwords, $emails , $telefons, $ads, $kimliks, $turs, $logins, $sil, $onay) = @mysql_fetch_row($result))
{


?>

		<tr>
			<td height="35" width="15%" style="border: 1px solid #C0C0C0">&nbsp;<?=$usernames?></td>
			<td height="25" width="15%" style="border: 1px solid #C0C0C0">&nbsp;<?=number_format(admin_toplam_kazanc($kimliks, $id),2)?> TL</td>
			<td height="25" width="15%" style="border: 1px solid #C0C0C0">&nbsp;<?=number_format(admin_toplam_alinan($kimliks, $id),2)?> TL</td>
			<td height="25" width="15%" style="border: 1px solid #C0C0C0">&nbsp;<?=number_format(admin_bakiye($kimliks, $id),2)?> TL</td>
			<td height="25" width="10%" style="border: 1px solid #C0C0C0">&nbsp;<?=admin_site_say($kimliks, $id)?></td>
			<td height="25" width="15%" style="border: 1px solid #C0C0C0">&nbsp;<?=number_format(bugun_kazanc_admin($kimliks, $id),2)?> TL</td>
			<td height="25" width="15%" style="border: 1px solid #C0C0C0">&nbsp;<input type="button" class="button" onclick="location.href='yy_incele.php?uid=<?=$id?>';" value="Sitelerini İncele" /></td>
		</tr>
		
		
<? } ?>
		    <tr>
			<td height="35" width="100%" colspan="7" style="border: 0px solid #C0C0C0; padding-top: 1px">&nbsp;<font style="font-size:13px;">Sayfa: 
			<?for ($i = 1; $i <= $toplamsayfa ; $i++ ) {?>
			<? if ($git==$i) { ?>
			&nbsp;<b>[<?=$i?>]</b>
			<? } else { ?>
			&nbsp;<a onclick="sayfa_getir(<?=$i?>)" style="cursor:pointer;"><?=$i?></a>
			<? } ?>
			<? } ?>
			</font></td>
		</tr>
</table>
<? }  ?>
