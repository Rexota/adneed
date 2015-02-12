<?
$mode = $_GET['mode'];

include("../db.php");
include("../sayfa_admin.php");
include('../sayfa_koruma.php');
include('../fonksiyon.php');
?>
<? if ($mode=='okunmamis' or $mode=='okunmus' or $mode=='tumu') { ?>
<title></title>
<script type="text/javascript">

function detaygoster(id) {$('#detay'+id).slideDown(); $('#cevap_panel_'+id).slideUp(); }
function detaygizle(id) {$('#detay'+id).slideUp(); }


function cevap_yaz(id) {
detaygizle(id);
$('#cevap_panel_'+id).load('inc_admin/iletisim.php?mode=cevap&id='+id);
$('#cevap_panel_'+id).slideDown();
}


function okunmamis_yap(id) {

	$.post('inc_admin/iletisim.php?mode=okuma', { id : id}, function(response) {
	 });
	 
    detaygizle(id);
    $('#admin_iletisim').load('inc_admin/iletisim.php?mode=<?=$mode?>');

}


function okunmus_yap(id) {

	$.post('inc_admin/iletisim.php?mode=oku', { id : id}, function(response) {
	
	detaygizle(id);
	$('#admin_iletisim').load('inc_admin/iletisim.php?mode=<?=$mode?>');
	
	 });


}




function mesajsil(id) {

	$.post('inc_admin/iletisim.php?mode=sil', { id : id}, function(response) {
    detaygizle(id);
	$('#admin_iletisim').load('inc_admin/iletisim.php?mode=<?=$mode?>');
	 });


}


</script>
<?	

if ($mode=='tumu') { $result = @mysql_query("select * from iletisim"); }
if ($mode=='okunmus') { $result = @mysql_query("select * from iletisim where durum = 1"); }
if ($mode=='okunmamis') { $result = @mysql_query("select * from iletisim where durum = 0"); }


if (@mysql_num_rows($result)<1) {
?>
 <table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
		<tr>
			<td height="25" width="626" style="border: 1px solid #000080" colspan="6">
			<p>&nbsp;<img border="0" src="extra/notification-exclamation.gif" width="14" height="14"> 
			Şuan gösterilecek bir mesaj bulunamadı.</td>
		</tr>
		</table>


<? 
} else {

?>

 <table border="0" width="100%" colspan="4" style="border-collapse: collapse">
<?
	 
while($yaz = @mysql_fetch_array($result))
{

?>
<tr>
<td height="25" width="14%" style="border: 1px solid #C0C0C0; padding-top: 1px">&nbsp;<?=$yaz[ad]?> <?=$yaz[soyad]?></td>
<td height="25" width="23%" style="border: 1px solid #C0C0C0; padding-top: 1px">&nbsp;<?=$yaz[konu]?></td>
<td height="25" width="18%" style="border: 1px solid #C0C0C0; padding-top: 1px">&nbsp;<?=$yaz[email]?></td>
<td height="25" width="15%" style="border: 1px solid #C0C0C0; padding-top: 1px">&nbsp;<?=$yaz[tel]?></td>
<td height="25" width="15%" style="border: 1px solid #C0C0C0; padding-top: 1px">&nbsp;<?=date("d.m.Y H:i:s",$yaz[tarih])?></td>
<td height="25" width="10%" style="border: 1px solid #C0C0C0; padding-top: 1px">&nbsp;<? if ($yaz[durum]=="0") { ?><font color="red">Okunmamış</font><? } else { ?>Okunmuş<? } ?></td>
			<td height="25" width="5%" style="border: 1px solid #008000; padding-top: 1px">
			<table border="0" width="100%" id="table1" cellpadding="0" style="border-collapse: collapse" height="28">
				<tr>
					<td width="43">
					<p align="center">
					<img style="cursor: pointer;" onclick="detaygoster(<?=$yaz[id]?>)" border="0" src="extra/asc.gif" width="21" height="4" align="middle" alt="Bildirim Detayları"></td>
					<td width="44">
					<p align="center">
					<a href="javascript:mesajsil('<?=$yaz[id]?>')" onclick="return onay()">
					<img border="0" src="extra/cross-on-white.gif" width="16" height="16" align="middle"></a></td>
				
				</tr>
				</table>
	</tr>	
	
	<tr>
	<td width="100%" colspan="7">
	<table border="0" height="" width="100%" cellpadding="0" style="border-collapse: collapse">
	<tr>
	<td id="cevap_panel_<?=$yaz[id]?>" height="" style="display:none;border: 1px solid #F4F3F4" colspan="6"></td>
	</tr>
	
	<tr>
			<td id="detay<?=$yaz[id]?>" style="display:none;border: 0px solid #F4F3F4" colspan="6">
			
	<table border="0" width="100%" id="table2" cellpadding="0" style="border-collapse: collapse;border: 1px solid #f4f3f4">
			<tr>
		
			<td width="100%" colspan="2" height="15" valign="top"></td>
		</tr>
		<tr>
		<td width="100%" colspan="2" style="background:#f4f3f4;" height="35">&nbsp;&nbsp;&nbsp;<b><?=$yaz[konu]?></b></td>
		</tr>
				<tr>
		
			<td width="100%" colspan="2" height="15" valign="top"></td>
		</tr>
		<tr>
		    <td width="1%"></td>
			<td width=""><?=satir($yaz[mesaj])?></td>
		</tr>
		
				<tr>
			<td width="100%" colspan="2" height="15" valign="top"></td>
		</tr>
		<tr>
		    <td width="1%"></td>
			<td width="" height="35"><? if ($yaz[durum]=="0") { ?>&nbsp;<input type="button" class="button" onclick="cevap_yaz(<?=$yaz[id]?>)" value="Mesajı Yanıtla">&nbsp;<input type="button" class="button" onclick="okunmus_yap(<?=$yaz[id]?>)" value="Okunmuş Olarak İşaretle"><? } ?><? if ($yaz[durum]=="1") { ?>&nbsp;<input type="button" class="button" onclick="okunmamis_yap(<?=$yaz[id]?>)" value="Okunmamış Olarak İşaretle"><? } ?>&nbsp;<input type="button" class="button" onclick="detaygizle(<?=$yaz[id]?>)" value="Mesajı Gizle"></td>
		</tr>
		<tr>
		
			<td width="100%" colspan="2" height="15" valign="top"></td>
		</tr>
	</table>



			
			
</td>
	</tr>
	</table>
	</td>
	</tr>
<? } ?>
</table>
<? } } ?>
<? if ($mode=='sil') {

$id = sql($_POST['id']);

$del = mysql_query("delete from iletisim where id = '$id'");

}
?>
<? if ($mode=='oku') {

$id = sql($_POST['id']);

$del = mysql_query("UPDATE iletisim SET durum = 1 where id = '$id'");

}
?>
<? if ($mode=='okuma') {

$id = sql($_POST['id']);

$del = mysql_query("UPDATE iletisim SET durum = 0 where id = '$id'");

}
?>
<? if ($mode=='send') {

$kime = $_POST['kime'];
$konu = $_POST['konu'];
$cevap = satir($_POST['cevap']);


if ($kime=='' or $konu=='' or $cevap=='') {
die("ERROR");
}

// çok sayıda alıcı
$to  = $kime;

// konu
$subject = $konu;

// ileti
$message = '
<html>
<head>
  <title>'.$konu.'</title>
</head>
<body>
  <p>'.$konu.'</p>
  <table>
    <tr>
      <td>'.$cevap.'</td>
    </tr>
  </table>
</body>
</html>
';


$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$headers .= 'To: <'.$kime.'>' . "\r\n";
$headers .= 'From: <'.$sismail.'>' . "\r\n";

// İletiyi postalayalım
$baba = mail($to, $subject, $message, $headers);

die("SUCCESS");

}?>
<? if ($mode=='cevap') {
$id = $_GET['id'];
$get = @mysql_fetch_array(mysql_query("select * from iletisim where id = '$id'"));
$cevap = "\n\n\n\n\n";
$cevap = $cevap."--------------------------------------------------------------------------\n";
$cevap = $cevap.date("d.m.Y H:i:s",$get[tarih])." Tarihinde Gönderilmiş\n";
$cevap = $cevap."--------------------------------------------------------------------------\n\n";
$cevap = $cevap.$get[mesaj]; 
?>
<script type="text/javascript">



$(function(){

   
 $('#cevapla_button').click(function() {
 
    var kime  = $('#kime').val();
	var konu  = $('#konu').val();
    var cevap = $('#cevap').val();
	

	$.post('inc_admin/iletisim.php?mode=send', { kime : kime, konu: konu, cevap : cevap }, function(response) {
	
				var return_val = ajaxduzelt(response);
				
				switch (return_val) {
					case 'ERROR':
						$('#cevapla_durum').html('&nbsp;&nbsp;<img src="new/yanlis.gif"> Zorunlu Alanları Doldurmadınız !');
						break;


					case 'FAILED':
					$('#cevapla_durum').html('&nbsp;&nbsp;<img src="new/yanlis.gif"> Kritik sistem hatası.');
						break;

					case 'SUCCESS':
						$('#cevapla_durum').html('&nbsp;&nbsp;<img src="extra/notification-information.gif"> Cevap Başarıyla Gönderildi.. Bekleyin..');
						setTimeout("$('#cevap_panel_<?=$id?>').slideUp()", 3500);
						setTimeout("okunmus_yap(<?=$id?>)", 4000);
						break;

                    default:
                   $('#cevapla_durum').html(return_val);
				}
	 });


			

 });
 

  });

</script>
		<table border="0" width="100%" id="table2" cellpadding="0" style="border-collapse: collapse;border: 1px solid #f4f3f4">
					<tr>
		
			<td width="100%" colspan="2" height="15" valign="top"></td>
		</tr>
		<tr>
		<td width="14%" colspan="2" style="background:#f4f3f4;" height="35">&nbsp;&nbsp;&nbsp;<b>İleti Cevaplama Paneli</b></td>
		</tr>
							<tr>
		
			<td width="100%" colspan="2" height="10" valign="top"></td>
		</tr>
				<tr>
		    <td width="14%" height="35">&nbsp;&nbsp;&nbsp;Kime:</td>
			<td width="" height="25"><input type="text" id="kime" value="<?=$get[email]?>" style="width:200px;" class="ninput"></td>
		</tr>
		<tr>
		    <td width="" height="35">&nbsp;&nbsp;&nbsp;Konu:</td>
			<td width="" height="25"><input type="text" id="konu" value="RE:<?=$get[konu]?>" style="width:360px;" class="ninput"></td>
		</tr>
		
				<tr>
		    <td width="" height="35">&nbsp;&nbsp;&nbsp;Cevap İletisi: </td>
			<td width="" height="25"><textarea class="ninput" id="cevap" style="width:400px;height:120px;"><?=$cevap?></textarea></td>
		</tr>
		
				<tr>
		    <td width="" height="35">&nbsp;&nbsp;&nbsp;İşlem</td>
			<td width="" height="25"><input type="button" id="cevapla_button" class="button" value="Cevapla">&nbsp;&nbsp;<input type="button" onclick="$('#cevap_panel_<?=$id?>').slideUp();" class="button" value="Vazgeç"></td>
		</tr>
		
				<tr>
		<td width="14%" id="cevapla_durum" colspan="2" height="45">&nbsp;&nbsp;&nbsp;</td>
		</tr>
		</table>
<? } ?>