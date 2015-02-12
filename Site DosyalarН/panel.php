<?php
include("db.php");

$title = "Kontrol Panelim - ".$sitetitle;
$keywords = "";
$description = "";

include("sayfa_koruma.php");
include('ust.php');

?>
		<div id="content-top"></div>
		<div id="content-middle">

		<? if ($_SESSION['tur']=="1") { ?>
		<? include("alacak_guncelle.php"); ?>
		  <div class="columnz">
			<h3>Merhaba&nbsp;<?=ucwords($_SESSION['ad'])?>, Kontrol Panelinize Hoşgeldiniz.</h3>
			  
			  
			  <table border="0" width="100%" id="table1" cellpadding="0" style="border-collapse: collapse">
				<tr>
					<td width="51%" rowspan="2">
			  
			  <table border="0" width="500" cellpadding="0" style="border-collapse: collapse" id="table2">

		<tr>
			<td height="150" colspan="4">&nbsp;<div id="kazanclar">
			<span id="toplam_kazanc_tutar"><?=number_format(hesap_bakiye(),2)?></span>


			<span id="kazanc_tutar"><?=number_format(bugun_kazanc(),2)?> TL</span>
			</div></td>
		</tr>


		<tr>
			<td  width="125">
			<p align="center">
			<a href="bilgilerim.php">
			<img border="0" src="extra/Crystal_Clear_user.gif" width="35" height="35"></a></td>
			<td height="25" width="125">
			<p align="center">
			<a href="yayinci_sitelerim.php">
			<img border="0" src="mini_icon/haber.jpg" width="36" height="36"></a></td>
			<td height="25" width="125">
			<p align="center">
			<a href="banka_hesaplarim.php">
			<img border="0" src="extra/Crystal_Clear_locked.gif" width="35" height="35"></a></td>
			<td height="25" width="125">
			<p align="center">
			<a href="destek.php?mode=see">
			<img border="0" src="mini_icon/iletisim.jpg" width="35" height="35"></a></td>
		</tr>
		<tr>
			<td  width="125" height="25">
			<p align="center"><b><a href="bilgilerim.php">Bilgilerim</a></b></td>
			<td  width="125">
			<p align="center"><b><a href="yayinci_sitelerim.php">Web Sitelerim</a></b></td>
			<td  width="125">
			<p align="center"><b><a href="banka_hesaplarim.php">Banka Hesaplarım</a></b></td>
			<td  width="125">
			<p align="center"><b><a href="destek.php?mode=see">Destek</a></b></td>
		</tr>
		<tr>
			<td height="35" colspan="4">&nbsp;</td>
		</tr>
		<tr>
			<td height="25">
			<p align="center">
			<a href="odeme_taleplerim.php">
			<img border="0" src="mini_icon/add.gif" width="35" height="35"></a></td>
			<td height="25">
			<p align="center">
			<a href="yayinci_rapor.php">
			<img border="0" src="extra/Crystal_Clear_stats.gif" width="35" height="35"></a></td>
			<td height="25">
			<p align="center">
			<a href="sss.php">
			<img border="0" src="mini_icon/stats_bar.gif" width="35" height="35" lowsrc="mini_icon/11.gif"></a></td>
			<td height="25">
			<p align="center">
			<a href="logout.php">
			<img border="0" src="mini_icon/close.jpg" width="35" height="35"></a></td>
		</tr>
		<tr>
			<td height="25">
			<p align="center"><b><a href="odeme_taleplerim.php">Ödeme Taleplerim</a></b></td>
			<td height="25">
			<p align="center"><b><a href="yayinci_rapor.php">Raporlar</a></b></td>
			<td height="25">
			<p align="center"><b><a href="sss.php">Sıkça Sorulan Sorular</a></b></td>
			<td height="25">
			<p align="center"><b><a href="logout.php">Oturumu Kapat</a></b></td>
		</tr>
		</table>
					</td>
					<td height="29">&nbsp;<img border="0" src="img/topic.gif" width="12" height="13"> 
					Uyarılar</td>
				</tr>
				<tr>
					<td height="198" valign="top">
					<table border="0" width="100%" id="table3" cellpadding="0" style="border-collapse: collapse" height="56">
					
					<? if ($odeme_talep=="1") { ?>
											<tr>
							<td width="29" height="35">
							<p align="center">
					<img border="0" src="extra/notification-information.gif" width="16" height="16"></td>
							<td style="font-size:12px;">&nbsp;Ödeme Talepleri Açılmıştır. Hemen Şimdi Talep Edebilirsiniz !</td>
						</tr>
					
					<? } ?>
					
					
					
					<? $sor = mysql_num_rows(mysql_query("select * from sitelerim where user = '$_SESSION[userid]' and onay = 1"));
					
					if ($sor < 1) { ?>
						
						
						<tr>
							<td width="29" height="35">
							<p align="center">
					<img border="0" src="extra/minus-circle.gif" width="16" height="16"></td>
							<td style="font-size:12px;">&nbsp;Sistemde siteniz bulunamadı. Bu durumda kazanç sağlayamazsınız !</td>
						</tr>
						<? } ?>
						
						
						
						
					<? $sor = mysql_num_rows(mysql_query("select * from banka where user = '$_SESSION[userid]'"));
					
					if ($sor < 1) { ?>
						
						
						<tr>
							<td width="29" height="35">
							<p align="center">
					<img border="0" src="extra/minus-circle.gif" width="16" height="16"></td>
							<td style="font-size:12px;">&nbsp;Eklenmiş banka hesabınız bulunamadı. Bu 
							durumda ödeme talep edemezsiniz !</td>
						</tr>
						<? } ?>
						
						
						
					<? $sor = mysql_num_rows(mysql_query("select * from ticketler where user = '$_SESSION[userid]' and durum = 1"));
					
					if ($sor > 0) { ?>
						
						
						<tr>
							<td width="29" height="35">
							<p align="center">
					<img border="0" src="extra/notification-exclamation.gif" width="16" height="16"></td>
							<td style="font-size:12px;">&nbsp;Destek sisteminde henüz cevaplanmamış başlıklarınız bulunmaktadır.</td>
						</tr>
						<? } ?>
						
						
						
						
					</table>
					</td>
				</tr>
			</table>
			</div>

		<? } ?>
		
		<? if ($_SESSION['tur']=="2") { ?>
		
		
		
		
		
		
		 <div class="columnz">
			<h3>Merhaba&nbsp;<?=ucwords($_SESSION['ad'])?>, Kontrol Panelinize Hoşgeldiniz.</h3>
			  
			  
			  <table border="0" width="100%" id="table1" cellpadding="0" style="border-collapse: collapse">
				<tr>
					<td width="51%" rowspan="2">
			  
			  
			  <table border="0" width="500" cellpadding="0" style="border-collapse: collapse" id="table2">
		<tr>

			<td height="45" colspan="4">&nbsp;</td>
		</tr>

		<tr>
			<td  width="125">
			<p align="center">
			<a href="bilgilerim.php">
			<img border="0" src="mini_icon/gruplar1uj1.gif" width="35" height="35"></a></td>
			<td height="25" width="125">
			<p align="center">
			<a href="reklamlarim.php">
			<img border="0" src="mini_icon/konuuyeligi.jpg" width="32" height="32"></a></td>
			<td height="25" width="125">
			<p align="center">
			<a href="reklamveren_odemeleri.php">
			<img border="0" src="mini_icon/off_64.gif" width="35" height="35"></a></td>
			<td height="25" width="125">
			<p align="center">
			<a href="destek.php?mode=see">
			<img border="0" src="mini_icon/iletisim.jpg" width="35" height="35"></a></td>
		</tr>
		<tr>
			<td  width="125" height="25">
			<p align="center"><b><a href="bilgilerim.php">Bilgilerim</a></b></td>
			<td  width="125">
			<p align="center"><a href="reklamlarim.php"><b>Reklamlarım</b></a></td>
			<td  width="125">
			<p align="center"><b><a href="reklamveren_odemeleri.php">Yaptığım Ödemeler</a></b></td>
			<td  width="125">
			<p align="center"><b><a href="destek.php?mode=see">Destek</a></b></td>
		</tr>
		<tr>
			<td height="35" colspan="4">&nbsp;</td>
		</tr>
		<tr>
			<td height="25">
			<p align="center">
			<a href="sss.php">
			<img border="0" src="mini_icon/stats_bar.gif" width="35" height="35" lowsrc="mini_icon/11.gif"></a></td>
			<td height="25">
			<p align="center">
			<a href="hesaplarimiz.php">
			<img border="0" src="extra/Crystal_Clear_locked.gif" width="35" height="35"></a></td>
			<td height="25">
			<p align="center">
			<a href="Logout.php">
			<img border="0" src="mini_icon/close.jpg" width="35" height="35"></a></td>
			<td height="25">
			<p align="center">
			&nbsp;</td>
		</tr>
		<tr>
			<td height="25">
			<p align="center"><b><a href="sss.php">Sıkça Sorulan Sorular</a></b></td>
			<td height="25">
			<p align="center"><b><a href="hesaplarimiz.php">Banka Hesaplarımız</a></b></td>
			<td height="25">
			<p align="center"><b><a href="Logout.php">Oturumu Kapat</a></b></td>
			<td height="25">
			<p align="center">&nbsp;</td>
		</tr>
		</table>
					</td>
					<td height="29">&nbsp;<img border="0" src="img/topic.gif" width="12" height="13"> 
					Uyarılar</td>
				</tr>
				<tr>
					<td height="198" valign="top">
					<table border="0" width="100%" id="table3" cellpadding="0" style="border-collapse: collapse" height="56">
					
					
					
						
						
					<? $sor = mysql_num_rows(mysql_query("select * from reklam_odeme where user = '$_SESSION[userid]' and durum = 0"));
					
					if ($sor > 0) { ?>
						
						
						<tr>
							<td width="29" height="35">
							<p align="center">
					<img border="0" src="extra/notification-exclamation.gif" width="16" height="16"></td>
							<td style="font-size:12px;">&nbsp;Henüz onaylanmamış ödeme bildirimleriniz bulunmaktadır !</td>
						</tr>
						<? } ?>
						
						
						
					<? $sor = mysql_num_rows(mysql_query("select * from ticketler where user = '$_SESSION[userid]' and durum = 1"));
					
					if ($sor > 0) { ?>
						
						
						<tr>
							<td width="29" height="35">
							<p align="center">
					<img border="0" src="extra/notification-exclamation.gif" width="16" height="16"></td>
							<td style="font-size:12px;">&nbsp;Destek sisteminde henüz cevaplanmamış başlıklarınız bulunmaktadır.</td>
						</tr>
						<? } ?>
						
						
						
						
					</table>
					</td>
				</tr>
			</table>
			</div>

		
		
		
		
		
		
		
		<? } ?>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		<? if ($_SESSION['tur']=="3") { ?>
		
		
		
		
		
		
		 <div class="columnz">
			<h3>Merhaba&nbsp;<?=ucwords($_SESSION['ad'])?>, Kontrol Panelinize Hoşgeldiniz.</h3>
			  
			  
			  <table border="0" width="100%" id="table1" cellpadding="0" style="border-collapse: collapse">
				<tr>
					<td width="51%" rowspan="2">
			  
			  
			  <table border="0" width="500" cellpadding="0" style="border-collapse: collapse" id="table2">
		<tr>

			<td height="25" colspan="4">&nbsp;</td>
		</tr>

		<tr>
			<td  width="125">
			<p align="center">
			<a href="bilgilerim.php">
			<img border="0" src="mini_icon/gruplar1uj1.gif" width="35" height="35"></a></td>
			<td height="25" width="125">
			<p align="center">
			<a href="destek_biletleri.php?mode=see">
			<img border="0" src="mini_icon/iletisim.jpg" width="35" height="35"></a></td>
			<td height="25" width="125">
			<p align="center">
			<a href="yayinci_siteleri.php">
			<img border="0" src="mini_icon/haber.jpg" width="40" height="40" lowsrc="mini_icon/11.gif"></a></td>
			<td height="25" width="125">
			<p align="center">
			<a href="Logout.php">
			<img border="0" src="mini_icon/close.jpg" width="35" height="35"></a></td>
		</tr>
		<tr>
			<td  width="125" height="25">
			<p align="center"><b><a href="bilgilerim.php">Bilgilerim</a></b></td>
			<td  width="125">
			<p align="center"><b><a href="destek_biletleri.php?mode=see">Destek Biletleri</a></b></td>
			<td  width="125">
			<p align="center"><b><a href="yayinci_siteleri.php">Yayıncı Sitelerini Görüntüle</a></b></td>
			<td  width="125">
			<p align="center"><b><a href="Logout.php">Oturumu Kapat</a></b></td>
		</tr>
		<tr>
			<td height="35" colspan="4">&nbsp;</td>
		</tr>
		<tr>
			<td height="25">
			<p align="center">
			<a href="editor_uye.php">
			<img border="0" src="mini_icon/gruplar1uj1.gif" width="46" height="46"></a></td>
			<td height="25">
			<p align="center">
			&nbsp;</td>
			<td height="25">
			<p align="center">
			&nbsp;</td>
			<td height="25">
			<p align="center">
			&nbsp;</td>
		</tr>
		<tr>
			<td height="25">
			<p align="center"><b><a href="editor_uye.php">Yayıncıları Düzenleme</a></b></td>
			<td height="25">
			<p align="center">&nbsp;</td>
			<td height="25">
			<p align="center">&nbsp;</td>
			<td height="25">
			<p align="center">&nbsp;</td>
		</tr>
		</table>
					</td>
					<td height="29">&nbsp;<img border="0" src="img/topic.gif" width="12" height="13"> 
					Uyarılar</td>
				</tr>
				<tr>
					<td height="198" valign="top">
					<table border="0" width="100%" id="table3" cellpadding="0" style="border-collapse: collapse" height="56">
					
					
				
						
						
						
						
						
						
					<? $sor = mysql_num_rows(mysql_query("select * from ticketler where durum = 1"));
					
					if ($sor > 0) { ?>
						
						<tr>
							<td width="29" height="35">
							<p align="center">
					<img border="0" src="extra/notification-exclamation.gif" width="16" height="16"></td>
							<td style="font-size:12px;">&nbsp;Destek sisteminde henüz cevaplanmamış başlıklar bulunmaktadır.</td>
						</tr>
						<? } ?>
						
						
											</table>
					</td>
				</tr>
			</table>
			</div>
			
			<? } ?>



		
		
		
		
		
		
		

						
						
						
						<? if ($_SESSION['tur']=="4") { ?>
		
		
		
		
		
		
		 <div class="columnz">
			<h3>Merhaba&nbsp;<?=ucwords($_SESSION['ad'])?>, Kontrol Panelinize Hoşgeldiniz.</h3>
			  
			  
			  <table border="0" width="100%" id="table1" cellpadding="0" style="border-collapse: collapse">
				<tr>
					<td width="51%" rowspan="2">
			  
			  
			  <table border="0" width="500" cellpadding="0" style="border-collapse: collapse" id="table2">
		<tr>

			<td height="25" colspan="4">&nbsp;</td>
		</tr>

		<tr>
			<td  width="125">
			<p align="center">
			<a href="bilgilerim.php">
			<img border="0" src="mini_icon/gruplar1uj1.gif" width="35" height="35"></a></td>
			<td height="25" width="125">
			<p align="center">
			<a href="destek_biletleri.php?mode=see">
			<img border="0" src="mini_icon/iletisim.jpg" width="35" height="35"></a></td>
			<td height="25" width="125">
			<p align="center">
			<a href="banka_hesaplarimiz.php">
			<img border="0" src="extra/Crystal_Clear_locked.gif" width="35" height="35"></a></td>
			<td height="25" width="125">
			<p align="center">
			<a href="reklamlarim.php">
			<img border="0" src="mini_icon/konuuyeligi.jpg" width="32" height="32"></a></td>
		</tr>
		<tr>
			<td  width="125" height="25">
			<p align="center"><b><a href="bilgilerim.php">Bilgilerim</a></b></td>
			<td  width="125">
			<p align="center"><b><a href="destek_biletleri.php?mode=see">Destek Biletleri</a></b></td>
			<td  width="125">
			<p align="center"><b><a href="banka_hesaplarimiz.php">Banka Hesaplarımız</a></b></td>
			<td  width="125">
			<p align="center"><a href="reklamlarim.php"><b>Reklamlarım</b></a></td>
		</tr>
		<tr>
			<td height="20" colspan="4">&nbsp;</td>
		</tr>
		<tr>
			<td height="25">
			<p align="center">
			<a href="site_ayarlar.php">
			<img border="0" src="mini_icon/admin_icon.gif" width="37" height="37"></a></td>
			<td height="25">
			<p align="center">
			<a href="odeme_talepleri.php">
			<img border="0" src="mini_icon/off_64.gif" width="35" height="35"></a></td>
			<td height="25">
			<p align="center">
			<a href="odeme_bildirimleri.php">
			<img border="0" src="mini_icon/not.gif" width="42" height="42"></a></td>
			<td height="25">
			<p align="center">
			<a href="uye_listesi.php">
			<img border="0" src="mini_icon/gruplar1uj1.gif" width="46" height="46"></a></td>
		</tr>
		<tr>
			<td height="25">
			<p align="center"><b><a href="site_ayarlar.php">Sistem Ayarları</a></b></td>
			<td height="25">
			<p align="center"><b><a href="odeme_talepleri.php">Ödeme Talepleri</a></b></td>
			<td height="25">
			<p align="center"><b><a href="odeme_bildirimleri.php">Ödeme Bildirimleri</a></b></td>
			<td height="25">
			<p align="center"><b><a href="uye_listesi.php">Üyeleri Görüntüle</a></b></td>
		</tr>
		<tr>
			<td height="20" colspan="4">&nbsp;</td>
		</tr>
		<tr>
			<td height="25">
			<p align="center">
			<a href="admin_duyuru.php">
			<img border="0" src="mini_icon/ders.jpg" width="37" height="37"></a></td>
			<td height="25">
			<p align="center">
			<a href="admin_sss.php">
			<img border="0" src="mini_icon/stats_bar.gif" width="44" height="44"></a></td>
			<td height="25">
			<p align="center">
			<a href="admin_sartlar.php">
			<img border="0" src="mini_icon/yazi.gif" width="42" height="42"></a></td>
			<td height="25">
			<p align="center">
			<a href="admin_mesaj.php">
			<img border="0" src="mini_icon/Icon_Email.gif" width="46" height="46"></a></td>
		</tr>
		<tr>
			<td height="25">
			<p align="center"><b><a href="admin_duyuru.php">Duyuruları Düzenle</a></b></td>
			<td height="25">
			<p align="center"><b><a href="admin_sss.php">Sıkça Sorulan Soruları Düzenle</a></b></td>
			<td height="25">
			<p align="center"><b><a href="admin_sartlar.php">Kullanım Şartlarını Düzenle</a></b></td>
			<td height="25">
			<p align="center"><b><a href="admin_mesaj.php">İletişim Mesajları</a></b></td>
		</tr>
		<tr>
			<td height="20" colspan="4">&nbsp;</td>
		</tr>
		<tr>
			<td height="25">
			<p align="center">
			<a href="yayinci_siteleri.php">
			<img border="0" src="mini_icon/haber.jpg" width="40" height="40" lowsrc="mini_icon/11.gif"></a></td>
			<td height="25">
			<p align="center">
			<a href="admin_reklamlar.php">
			<img border="0" src="mini_icon/konuuyeligi.jpg" width="40" height="40"></a></td>
			<td height="25">
			<p align="center">
			<a href="admin_kategoriler.php">
			<img border="0" src="mini_icon/dosya.jpg" width="42" height="42"></a></td>
			<td height="25">
			<p align="center">
			<a href="Logout.php">
			<img border="0" src="mini_icon/close.jpg" width="35" height="35"></a></td>
		</tr>
		<tr>
			<td height="25">
			<p align="center"><b><a href="yayinci_siteleri.php">Yayıncı Sitelerini Görüntüle</a></b></td>
			<td height="25">
			<p align="center"><a href="admin_reklamlar.php"><b>Reklamları Görüntüle Düzenle</b></a></td>
			<td height="25">
			<p align="center"><a href="admin_kategoriler.php"><b>Kategorileri Görüntüleyin Düzenleyin</b></a></td>
			<td height="25">
			<p align="center"><b><a href="Logout.php">Oturumu Kapat</a></b></td>
		</tr>
		<tr>
			<td height="20" colspan="4">&nbsp;</td>
		</tr>
		<tr>
			<td height="25">
			<p align="center">
			<a href="admin_hit.php">
			<img border="0" src="mini_icon/anketler.gif" width="45" height="45" lowsrc="mini_icon/11.gif"></a></td>
			<td height="25">
			<p align="center">
			<a href="admin_ppc.php">
			<img border="0" src="extra/Crystal_Clear_settings.gif" width="50" height="50"></a></td>
			<td height="25">
			<p align="center">
			<a href="yayinci_kazanclari.php">
			<img border="0" src="mini_icon/dolar.jpg" width="35" height="35" lowsrc="mini_icon/11.gif"></a></td>
			<td height="25">
			<p align="center">
			&nbsp;</td>
		</tr>
		<tr>
			<td height="25">
			<p align="center"><b><a href="admin_hit.php">Tekil / Çoğul Raporlar</a></b></td>
			<td height="25">
			<p align="center"><a href="admin_ppc.php"><b>PPC Banner Modülleri</b></a></td>
			<td height="25">
			<p align="center"><b><a href="yayinci_kazanclari.php">Yayıncı Kazançlarını Görüntüle</a></b></td>
			<td height="25">
			<p align="center">&nbsp;</td>
		</tr>
		<tr>
			<td height="35" colspan="4">&nbsp;</td>
		</tr>
		</table>
					</td>
					<td height="20">&nbsp;<img border="0" src="img/topic.gif" width="12" height="13"> 
					Uyarılar</td>
				</tr>
				<tr>
					<td height="198" valign="top">
					<table border="0" width="100%" id="table3" cellpadding="0" style="border-collapse: collapse" height="56">
					
					
				
						
									<? $sor = mysql_num_rows(mysql_query("select * from kategoriler"));
					
					if ($sor < 1) { ?>
						
						<tr>
							<td width="29" height="35">
							<p align="center">
					<img border="0" src="extra/minus-circle.gif" width="16" height="16"></td>
							<td style="font-size:12px;">&nbsp;Sisteme hiç kategori eklenmemiş.</td>
						</tr>
						<? } ?>		
						
						
					<? $sor = mysql_num_rows(mysql_query("select * from user where sil = 0 and tur = 2 and login = 1 and onay = 0"));
					
					if ($sor > 0) { ?>
						
						<tr>
							<td width="29" height="35">
							<p align="center">
					<img border="0" src="extra/notification-slash.gif" width="16" height="16"></td>
							<td style="font-size:12px;">&nbsp;Henüz onaylanmamış Reklamveren hesapları bulunmaktadır.</td>
						</tr>
						<? } ?>
						
						
						
					<? $sor = mysql_num_rows(mysql_query("select * from user where sil = 0 and tur = 1 and login = 1 and onay = 0"));
					
					if ($sor > 0) { ?>
						
						<tr>
							<td width="29" height="35">
							<p align="center">
					<img border="0" src="extra/notification-slash.gif" width="16" height="16"></td>
							<td style="font-size:12px;">&nbsp;Henüz onaylanmamış Yayıncı hesapları bulunmaktadır.</td>
						</tr>
						<? } ?>
						
						
						
						
						
					<? $sor = mysql_num_rows(mysql_query("select * from ticketler where durum = 1"));
					
					if ($sor > 0) { ?>
						
						<tr>
							<td width="29" height="35">
							<p align="center">
					<img border="0" src="extra/notification-exclamation.gif" width="16" height="16"></td>
							<td style="font-size:12px;">&nbsp;Destek sisteminde henüz cevaplanmamış başlıklar bulunmaktadır.</td>
						</tr>
						<? } ?>
						
						
					<? $sor = mysql_num_rows(mysql_query("select * from iletisim where durum = 0"));
					
					if ($sor > 0) { ?>
						
						<tr>
							<td width="29" height="35">
							<p align="center">
					<img border="0" src="extra/notification-information.gif" width="16" height="16"></td>
							<td style="font-size:12px;">&nbsp;İletişim Bölümünde okunmamış mesajlar bulunmaktadır.</td>
						</tr>
						<? } ?>
						
						
					<? $sor = mysql_num_rows(mysql_query("select * from reklam_odeme where durum = 0"));
					
					if ($sor > 0) { ?>
						
						<tr>
							<td width="29" height="35">
							<p align="center">
					<img border="0" src="extra/notification-exclamation.gif" width="16" height="16"></td>
							<td style="font-size:12px;">&nbsp;Henüz onaylanmamış ödeme bildirimleri bulunmaktadır.</td>
						</tr>
						<? } ?>
						
						
						
				    <? $sor = mysql_num_rows(mysql_query("select * from yayinci_odeme where durum = 0"));
					
					if ($sor > 0) { ?>
						
						<tr>
							<td width="29" height="35">
							<p align="center">
					<img border="0" src="extra/notification-exclamation.gif" width="16" height="16"></td>
							<td style="font-size:12px;">&nbsp;Henüz onaylanmamış ödeme talepleri bulunmaktadır.</td>
						</tr>
						<? } ?>
						
						
					<? $sor = mysql_num_rows(mysql_query("select * from hesaplarimiz"));
					
					if ($sor < 1) { ?>
						
						<tr>
							<td width="29" height="35">
							<p align="center">
					<img border="0" src="extra/minus-circle.gif" width="16" height="16"></td>
							<td style="font-size:12px;">&nbsp;Sisteme banka hesabı eklenmemiş.</td>
						</tr>
						<? } ?>
						
						
						
						
					<? $sor = mysql_num_rows(mysql_query("select * from maddeler"));
					
					if ($sor < 1) { ?>
						
						<tr>
							<td width="29" height="35">
							<p align="center">
					<img border="0" src="extra/minus-circle.gif" width="16" height="16"></td>
							<td style="font-size:12px;">&nbsp;Kullanım Şartları maddeleri henüz oluşturulmamış.</td>
						</tr>
						<? } ?>
						
						
						
											<? $sor = mysql_num_rows(mysql_query("select * from sss"));
					
					if ($sor < 1) { ?>
						
						<tr>
							<td width="29" height="35">
							<p align="center">
					<img border="0" src="extra/minus-circle.gif" width="16" height="16"></td>
							<td style="font-size:12px;">&nbsp;Sıkça sorulan sorular eklenmemiş.</td>
						</tr>
						<? } ?>
						
						
					</table>
					</td>
				</tr>
			</table>
			</div>

		
		
		
		
		
		
		
		<? } ?>
			<div class="clear"></div>
		</div>
		
		<div id="content-bottom"></div>
	
		


<?
include("alt.php");	
?>