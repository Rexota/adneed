<?php
$mode = $_GET['mode'];

include("../db.php");
include('../fonksiyon.php');
include("../sayfa_koruma.php");
include("../sayfa_editor.php");
?><? if ($mode=='acik' or $mode=='kapali' or $mode=='tumu') { 


$git = @$_GET["p"];
 
if(empty($git) or !is_numeric($git)) { $git = 1; }


?>
<title></title>
<script type="text/javascript">

function sayfa_getir(id) {

 $('#desteklerim').html('<img src="new/loadingAnimation.gif"> Yükleniyor...');
 $('#desteklerim').load('inc_editor/destek.php?mode=<?=$mode?>&p='+id);

}

 function desteksil(id) {

	$.post('inc_editor/destek.php?mode=sil', { id : id}, function(response) {
	$('#desteklerim').load('inc_editor/destek.php?mode=<?=$mode?>&p=<?=$git?>');
	 });


}


</script>
<?	

$limit = 15;
 


if ($mode=='acik') { $count      = mysql_num_rows(mysql_query("select * from ticketler where durum = 1")); }
if ($mode=='kapali') { $count      = mysql_num_rows(mysql_query("select * from ticketler where durum = 0")); }
if ($mode=='tumu') { $count      = mysql_num_rows(mysql_query("select * from ticketler")); }

$toplamsayfa    = ceil($count / $limit);
$baslangic  = ($git-1)*$limit;




if ($mode=='acik') { $result = @mysql_query("select * from ticketler where durum = 1 LIMIT $baslangic,$limit"); }
if ($mode=='kapali') { $result = @mysql_query("select * from ticketler where durum = 0 LIMIT $baslangic,$limit"); }
if ($mode=='tumu') { $result = @mysql_query("select * from ticketler LIMIT $baslangic,$limit"); }



if (@mysql_num_rows($result)<1) {

if ($git > 1) {
$yenisayfa = $git-1;
?>
<script type="text/javascript">$(function() { sayfa_getir(<?=$yenisayfa?>) });</script>
<?
}
?>
 <table border="0" width="515" cellpadding="0" style="border-collapse: collapse">
		<tr>
					<td height="25" width="513" style="border: 1px solid #000080" colspan="4">
					<p>&nbsp;<img border="0" src="img/uyari.gif" width="15" height="15"> Ticket bulunmuyor.</td>
				</tr>
		</table>


<? 
} else {

?>

 <table border="0" width="515" cellpadding="0" style="border-collapse: collapse">
<?
	 
while(list($id, $durum, $tarih, $baslik, $user, $user_tur ) = @mysql_fetch_row($result))
{

$say = mysql_num_rows(mysql_query("select * from ticket_cevaplar where ticket_id = '$id'"));
$say = $say-1 ;
?>

          <tr>
					<td height="25" width="224" style="border: 1px solid #008000; padding-top: 1px">&nbsp;<b><a href="destek_biletleri.php?mode=read&id=<?=$id?>"><?=$baslik?></a></b></td>
					<td height="25" width="79" style="border: 1px solid #008000; padding-top: 1px">&nbsp;<b><? if ($durum=="1"){ ?></b><font color="#008000">Açık</font><b><? } else { ?></b><font color="#FF0000">Kapalı</font><b><? } ?></b></td>
					<td height="25" width="57" style="border: 1px solid #008000; padding-top: 1px">&nbsp;<?=$say?></td>

					<td height="25" width="122" style="border: 1px solid #008000; padding-top: 1px"><p>&nbsp;<?=date("d.m.Y H:i:s", $tarih)?></td>
					<td height="25" width="30" align="center" style="border: 1px solid #008000; padding-top: 1px"><a href="javascript:desteksil('<?=$id?>')" onclick="return onay()">
					<img border="0" src="extra/cross-on-white.gif" width="16" height="16" align="middle" title="İptal Et / Kaldır" alt="İptal Et / Kaldır"></a></td>
				</tr>
		
<? } ?>

		    <tr>
			<td height="35" width="100%" colspan="8" style="border: 0px solid #008000; padding-top: 1px">&nbsp;<font style="font-size:13px;">Sayfa: 
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
<? if ($mode=="cevap") { 


$mesaj = sql($_POST['mesaj']);
$ticket = sql($_POST['ticket']);

if ($mesaj=='' or $ticket=='') {
die("ERROR");
}

$sql = "select * from ticketler where id = '$ticket'";
$yali = mysql_fetch_array(mysql_query($sql));



$tarih = mktime();

if ($_SESSION[tur]=="1") {
$yazarkimlik = "Yayıncı";
}
if ($_SESSION[tur]=="2") {
$yazarkimlik = "Reklamveren";
}
if ($_SESSION[tur]=="3") {
$yazarkimlik = "Sistem Editörü";
}

if ($_SESSION[tur]=="4") {
$yazarkimlik = "Sistem Admini";
}

$guncelle = mysql_query("UPDATE ticketler SET durum = 0 where id = '$ticket'");


$ekle = "insert into ticket_cevaplar (ticket_id, yazan, yazan_tur, tarih,  mesaj, yazan_id) values ('$ticket', '$_SESSION[ad]', '$yazarkimlik', '$tarih', '$mesaj', '$_SESSION[userid]')";
$yaliss = mysql_query($ekle);


$bulk = @mysql_fetch_array(mysql_query("select * from user where id = '$yali[user]'"));

// çok sayıda alıcı
$to  = $bulk[email];

// konu
$subject = 'Destek Biletiniz Cevaplandi';

// ileti
$message = '
<html>
<head>
  <title>Destek Biletiniz Cevaplanmistir</title>
</head>
<body>
  <p>Merhaba, '.$bulk[ad].'</p>
  <table>
    <tr>
      <td>Sistemimizde açtığınız destek bileti cevaplanmıştır.</td>
    </tr>
    <tr>
      <td>Eğer sorununuz çözüme ulaşmadıysa Lütfen bileti yanıtlayın.</td>
    </tr>
  </table>
</body>
</html>
';


$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$headers .= 'To: <'.$bulk[email].'>' . "\r\n";
$headers .= 'From: <'.$sismail.'>' . "\r\n";

// İletiyi postalayalım
$baba = mail($to, $subject, $message, $headers);



if ($yaliss) {
die("SUCCESS");
} else {
die("FAILED");
}


} ?>
<? if ($mode=="sil") {

$id = sql($_POST['id']);


$del = mysql_query("delete from ticket_cevaplar where ticket_id = '$id'");
$del2 = mysql_query("delete from ticketler where id = '$id'");

}?>