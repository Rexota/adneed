-- --------------------------------------------------------

-- 
-- Tablo yapısı: `banka`
-- 

CREATE TABLE `banka` (
  `id` int(11) NOT NULL auto_increment,
  `banka` text collate utf8_unicode_ci NOT NULL,
  `hesap` text collate utf8_unicode_ci NOT NULL,
  `sube` text collate utf8_unicode_ci NOT NULL,
  `ad` text collate utf8_unicode_ci NOT NULL,
  `iban` text collate utf8_unicode_ci NOT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='1' AUTO_INCREMENT=1 ;

-- 
-- Tablo döküm verisi `banka`
-- 


-- --------------------------------------------------------

-- 
-- Tablo yapısı: `config`
-- 

CREATE TABLE `config` (
  `id` int(11) NOT NULL auto_increment,
  `title` text collate utf8_unicode_ci NOT NULL,
  `popupreklam` decimal(30,4) NOT NULL,
  `splashreklam` decimal(30,4) NOT NULL,
  `msnpopreklam` decimal(30,4) NOT NULL,
  `kesinti` int(11) NOT NULL,
  `min_talep` decimal(30,2) NOT NULL,
  `adres` text collate utf8_unicode_ci NOT NULL,
  `descc` text collate utf8_unicode_ci NOT NULL,
  `keyy` text collate utf8_unicode_ci NOT NULL,
  `logo` text collate utf8_unicode_ci NOT NULL,
  `copyy` text collate utf8_unicode_ci NOT NULL,
  `popupyayinci` decimal(30,4) NOT NULL,
  `splashyayinci` decimal(30,4) NOT NULL,
  `msnpopyayinci` decimal(30,4) NOT NULL,
  `sismail` text collate utf8_unicode_ci NOT NULL,
  `bilmail` text collate utf8_unicode_ci NOT NULL,
  `uyekayit` int(11) NOT NULL,
  `odemetalep` int(11) NOT NULL,
  `odemebildir` int(11) NOT NULL,
  `iletisimmesaj` int(11) NOT NULL,
  `ticketac` int(11) NOT NULL,
  `max_talep` decimal(30,2) NOT NULL,
  `odeme_talep` int(11) NOT NULL,
  `fav` text collate utf8_unicode_ci NOT NULL,
  `havuz` int(11) NOT NULL,
  `adadres` text collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- 
-- Tablo döküm verisi `config`
-- 

INSERT INTO `config` VALUES (1, 'Ayarlanmadı', 0.0010, 0.0009, 0.0008, 0, 0.00, 'http://localhost/', 'Ayarlanmadı', 'Ayarlanmadı', 'images/logo.png', 'Bu dosya <a href=\'http://wmscripti.com/php-scriptler/adneed-reklam-yonetim-scripti.html\'>wmscripti.com</a> üzerinden indirilmiştir.', 0.0010, 0.0008, 0.0007, 'adres@domain.com', 'adres@domain.com', 0, 0, 0, 0, 0, 0.00, 0, 'http://www.tapdk.gov.tr/ebildirge/images/security_f2.png', 0, 'http://localhost/ads/');

-- --------------------------------------------------------

-- 
-- Tablo yapısı: `duyurular`
-- 

CREATE TABLE `duyurular` (
  `id` int(11) NOT NULL auto_increment,
  `baslik` text collate utf8_unicode_ci NOT NULL,
  `icerik` text collate utf8_unicode_ci NOT NULL,
  `tarih` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

-- 
-- Tablo döküm verisi `duyurular`
-- 


-- --------------------------------------------------------

-- 
-- Tablo yapısı: `extra_ayarlar`
-- 

CREATE TABLE `extra_ayarlar` (
  `id` int(11) NOT NULL auto_increment,
  `k_sayfasi` int(11) NOT NULL,
  `y_kayit` int(11) NOT NULL,
  `r_kayit` int(11) NOT NULL,
  `y_otomatik` int(11) NOT NULL,
  `r_otomatik` int(11) NOT NULL,
  `popa` int(11) NOT NULL,
  `splasha` int(11) NOT NULL,
  `msna` int(11) NOT NULL,
  `a_gosterim` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- 
-- Tablo döküm verisi `extra_ayarlar`
-- 

INSERT INTO `extra_ayarlar` VALUES (1, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

-- 
-- Tablo yapısı: `gunluk_gosterimler`
-- 

CREATE TABLE `gunluk_gosterimler` (
  `id` int(11) NOT NULL auto_increment,
  `tarih` text collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Tablo döküm verisi `gunluk_gosterimler`
-- 


-- --------------------------------------------------------

-- 
-- Tablo yapısı: `gunluk_raporlar`
-- 

CREATE TABLE `gunluk_raporlar` (
  `id` int(11) NOT NULL auto_increment,
  `tekil` decimal(30,2) NOT NULL,
  `cogul` decimal(30,2) NOT NULL,
  `tarih` text collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Tablo döküm verisi `gunluk_raporlar`
-- 


-- --------------------------------------------------------

-- 
-- Tablo yapısı: `hesaplarimiz`
-- 

CREATE TABLE `hesaplarimiz` (
  `id` int(11) NOT NULL auto_increment,
  `banka` text collate utf8_unicode_ci NOT NULL,
  `hesapno` text collate utf8_unicode_ci NOT NULL,
  `sube` text collate utf8_unicode_ci NOT NULL,
  `iban` text collate utf8_unicode_ci NOT NULL,
  `ad` text collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Tablo döküm verisi `hesaplarimiz`
-- 


-- --------------------------------------------------------

-- 
-- Tablo yapısı: `iletisim`
-- 

CREATE TABLE `iletisim` (
  `id` int(11) NOT NULL auto_increment,
  `ad` text collate utf8_unicode_ci NOT NULL,
  `soyad` text collate utf8_unicode_ci NOT NULL,
  `tel` text collate utf8_unicode_ci NOT NULL,
  `email` text collate utf8_unicode_ci NOT NULL,
  `konu` text collate utf8_unicode_ci NOT NULL,
  `mesaj` text collate utf8_unicode_ci NOT NULL,
  `durum` int(11) NOT NULL,
  `tarih` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- 
-- Tablo döküm verisi `iletisim`
-- 


-- --------------------------------------------------------

-- 
-- Tablo yapısı: `kategoriler`
-- 

CREATE TABLE `kategoriler` (
  `id` int(11) NOT NULL auto_increment,
  `name` text collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- 
-- Tablo döküm verisi `kategoriler`
-- 


-- --------------------------------------------------------

-- 
-- Tablo yapısı: `maddeler`
-- 

CREATE TABLE `maddeler` (
  `id` int(11) NOT NULL auto_increment,
  `text` text collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

-- 
-- Tablo döküm verisi `maddeler`
-- 


-- --------------------------------------------------------

-- 
-- Tablo yapısı: `msn_reklamlar`
-- 

CREATE TABLE `msn_reklamlar` (
  `id` int(11) NOT NULL auto_increment,
  `reklamveren_id` int(11) NOT NULL,
  `url` text collate utf8_unicode_ci NOT NULL,
  `toplam` decimal(30,2) NOT NULL,
  `suan` decimal(30,2) NOT NULL,
  `ucret` decimal(30,2) NOT NULL,
  `gunluk` decimal(30,2) NOT NULL,
  `bugun` decimal(30,2) NOT NULL,
  `sure` int(11) NOT NULL,
  `kategori` int(11) NOT NULL,
  `gunluk_gosterim` decimal(30,2) NOT NULL,
  `tarih` int(11) NOT NULL,
  `durum` int(11) NOT NULL,
  `resim` text collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Tablo döküm verisi `msn_reklamlar`
-- 


-- --------------------------------------------------------

-- 
-- Tablo yapısı: `msn_sayimlar`
-- 

CREATE TABLE `msn_sayimlar` (
  `id` int(11) NOT NULL auto_increment,
  `yayinci_kimlik` int(11) NOT NULL,
  `sayi` int(11) NOT NULL,
  `gun` int(11) NOT NULL,
  `ay` int(11) NOT NULL,
  `yil` int(11) NOT NULL,
  `ucret` decimal(30,4) NOT NULL,
  `alacak` decimal(30,2) NOT NULL,
  `site_id` int(11) NOT NULL,
  `yayinci_id` int(11) NOT NULL,
  `tarih` int(11) NOT NULL,
  `site_adresi` text character set latin5 NOT NULL,
  `tarih2` text collate utf8_unicode_ci NOT NULL,
  `cogul` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Tablo döküm verisi `msn_sayimlar`
-- 


-- --------------------------------------------------------

-- 
-- Tablo yapısı: `popup_reklamlar`
-- 

CREATE TABLE `popup_reklamlar` (
  `id` int(11) NOT NULL auto_increment,
  `reklamveren_id` int(11) NOT NULL,
  `url` text collate utf8_unicode_ci NOT NULL,
  `toplam` decimal(30,2) NOT NULL,
  `suan` decimal(30,2) NOT NULL,
  `ucret` decimal(30,2) NOT NULL,
  `gunluk` decimal(30,2) NOT NULL,
  `bugun` decimal(30,2) NOT NULL,
  `sure` int(11) NOT NULL,
  `kategori` int(11) NOT NULL,
  `gunluk_gosterim` decimal(30,2) NOT NULL,
  `tarih` int(11) NOT NULL,
  `durum` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Tablo döküm verisi `popup_reklamlar`
-- 


-- --------------------------------------------------------

-- 
-- Tablo yapısı: `popup_sayimlar`
-- 

CREATE TABLE `popup_sayimlar` (
  `id` int(11) NOT NULL auto_increment,
  `yayinci_kimlik` int(11) NOT NULL,
  `sayi` int(11) NOT NULL,
  `gun` int(11) NOT NULL,
  `ay` int(11) NOT NULL,
  `yil` int(11) NOT NULL,
  `ucret` decimal(30,4) NOT NULL,
  `alacak` decimal(30,2) NOT NULL,
  `site_id` int(11) NOT NULL,
  `yayinci_id` int(11) NOT NULL,
  `tarih` int(11) NOT NULL,
  `site_adresi` text character set latin5 NOT NULL,
  `tarih2` text collate utf8_unicode_ci NOT NULL,
  `cogul` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Tablo döküm verisi `popup_sayimlar`
-- 


-- --------------------------------------------------------

-- 
-- Tablo yapısı: `ppc_cat`
-- 

CREATE TABLE `ppc_cat` (
  `id` int(11) NOT NULL auto_increment,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `min` decimal(30,4) NOT NULL,
  `max` decimal(30,4) NOT NULL,
  `kesinti` decimal(30,4) NOT NULL,
  `min_tutar` decimal(30,2) NOT NULL,
  `max_tutar` decimal(30,2) NOT NULL,
  `ad` text collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Tablo döküm verisi `ppc_cat`
-- 


-- --------------------------------------------------------

-- 
-- Tablo yapısı: `ppc_reklamlar`
-- 

CREATE TABLE `ppc_reklamlar` (
  `id` int(11) NOT NULL auto_increment,
  `reklamveren_id` int(11) NOT NULL,
  `url` text collate utf8_unicode_ci NOT NULL,
  `toplam` decimal(30,2) NOT NULL,
  `suan` decimal(30,2) NOT NULL,
  `ucret` decimal(30,4) NOT NULL,
  `gunluk` decimal(30,2) NOT NULL,
  `bugun` decimal(30,2) NOT NULL,
  `sure` int(11) NOT NULL,
  `kategori` int(11) NOT NULL,
  `gunluk_gosterim` decimal(30,2) NOT NULL,
  `tarih` int(11) NOT NULL,
  `durum` int(11) NOT NULL,
  `resim` text collate utf8_unicode_ci NOT NULL,
  `modul` int(11) NOT NULL,
  `tikbas` decimal(30,4) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Tablo döküm verisi `ppc_reklamlar`
-- 


-- --------------------------------------------------------

-- 
-- Tablo yapısı: `ppc_sayimlar`
-- 

CREATE TABLE `ppc_sayimlar` (
  `id` int(11) NOT NULL auto_increment,
  `yayinci_kimlik` int(11) NOT NULL,
  `sayi` int(11) NOT NULL,
  `gun` int(11) NOT NULL,
  `ay` int(11) NOT NULL,
  `yil` int(11) NOT NULL,
  `ucret` decimal(30,4) NOT NULL,
  `alacak` decimal(30,4) NOT NULL,
  `site_id` int(11) NOT NULL,
  `yayinci_id` int(11) NOT NULL,
  `tarih` int(11) NOT NULL,
  `site_adresi` text character set latin5 NOT NULL,
  `tarih2` text collate utf8_unicode_ci NOT NULL,
  `cogul` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Tablo döküm verisi `ppc_sayimlar`
-- 


-- --------------------------------------------------------

-- 
-- Tablo yapısı: `reklam_ayarlari`
-- 

CREATE TABLE `reklam_ayarlari` (
  `id` int(11) NOT NULL auto_increment,
  `pop_min_hit` decimal(30,2) NOT NULL,
  `pop_max_hit` decimal(30,2) NOT NULL,
  `splash_min_hit` decimal(30,2) NOT NULL,
  `splash_max_hit` decimal(30,2) NOT NULL,
  `msn_min_hit` decimal(30,2) NOT NULL,
  `msn_max_hit` decimal(30,2) NOT NULL,
  `splash_min_width` int(11) NOT NULL,
  `splash_min_height` int(11) NOT NULL,
  `splash_max_width` int(11) NOT NULL,
  `splash_max_height` int(11) NOT NULL,
  `msn_min_width` int(11) NOT NULL,
  `msn_min_height` int(11) NOT NULL,
  `msn_max_width` int(11) NOT NULL,
  `msn_max_height` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- 
-- Tablo döküm verisi `reklam_ayarlari`
-- 

INSERT INTO `reklam_ayarlari` VALUES (1, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

-- 
-- Tablo yapısı: `reklam_kayitlar`
-- 

CREATE TABLE `reklam_kayitlar` (
  `id` int(11) NOT NULL auto_increment,
  `reklam_veren_id` int(11) NOT NULL,
  `yayinci_kimlik` int(11) NOT NULL,
  `yayinci_site` text character set utf8 collate utf8_unicode_ci NOT NULL,
  `tiklayan_site` text character set utf8 collate utf8_unicode_ci NOT NULL,
  `tarih` int(11) NOT NULL,
  `reklam_tur` int(11) NOT NULL,
  `reklam_id` int(11) NOT NULL,
  `tarih2` text character set utf8 collate utf8_unicode_ci NOT NULL,
  `ref_site` text NOT NULL,
  `kategori` int(11) NOT NULL,
  `ip` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin5 AUTO_INCREMENT=1 ;

-- 
-- Tablo döküm verisi `reklam_kayitlar`
-- 


-- --------------------------------------------------------

-- 
-- Tablo yapısı: `reklam_odeme`
-- 

CREATE TABLE `reklam_odeme` (
  `id` int(11) NOT NULL auto_increment,
  `user` int(11) NOT NULL,
  `reklam` int(11) NOT NULL,
  `tarih` int(11) NOT NULL,
  `durum` int(11) NOT NULL,
  `ucret` decimal(30,2) NOT NULL,
  `note` text collate utf8_unicode_ci NOT NULL,
  `odeme_turu` int(11) NOT NULL,
  `gbanka` text collate utf8_unicode_ci NOT NULL,
  `gad` text collate utf8_unicode_ci NOT NULL,
  `banka` text collate utf8_unicode_ci NOT NULL,
  `ad` text collate utf8_unicode_ci NOT NULL,
  `hesap` text collate utf8_unicode_ci NOT NULL,
  `sube` text collate utf8_unicode_ci NOT NULL,
  `iban` text collate utf8_unicode_ci NOT NULL,
  `reklam_tur` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Tablo döküm verisi `reklam_odeme`
-- 


-- --------------------------------------------------------

-- 
-- Tablo yapısı: `sitelerim`
-- 

CREATE TABLE `sitelerim` (
  `id` int(11) NOT NULL auto_increment,
  `adres` text collate utf8_unicode_ci NOT NULL,
  `onay` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `tarih` int(11) NOT NULL,
  `kategori` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Tablo döküm verisi `sitelerim`
-- 


-- --------------------------------------------------------

-- 
-- Tablo yapısı: `splash_reklamlar`
-- 

CREATE TABLE `splash_reklamlar` (
  `id` int(11) NOT NULL auto_increment,
  `reklamveren_id` int(11) NOT NULL,
  `url` text collate utf8_unicode_ci NOT NULL,
  `toplam` decimal(30,2) NOT NULL,
  `suan` decimal(30,2) NOT NULL,
  `ucret` decimal(30,2) NOT NULL,
  `gunluk` decimal(30,2) NOT NULL,
  `bugun` decimal(30,2) NOT NULL,
  `sure` int(11) NOT NULL,
  `kategori` int(11) NOT NULL,
  `gunluk_gosterim` decimal(30,2) NOT NULL,
  `tarih` int(11) NOT NULL,
  `durum` int(11) NOT NULL,
  `resim` text collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Tablo döküm verisi `splash_reklamlar`
-- 


-- --------------------------------------------------------

-- 
-- Tablo yapısı: `splash_sayimlar`
-- 

CREATE TABLE `splash_sayimlar` (
  `id` int(11) NOT NULL auto_increment,
  `yayinci_kimlik` int(11) NOT NULL,
  `sayi` int(11) NOT NULL,
  `gun` int(11) NOT NULL,
  `ay` int(11) NOT NULL,
  `yil` int(11) NOT NULL,
  `ucret` decimal(30,4) NOT NULL,
  `alacak` decimal(30,2) NOT NULL,
  `site_id` int(11) NOT NULL,
  `yayinci_id` int(11) NOT NULL,
  `tarih` int(11) NOT NULL,
  `site_adresi` text character set latin5 NOT NULL,
  `tarih2` text collate utf8_unicode_ci NOT NULL,
  `cogul` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Tablo döküm verisi `splash_sayimlar`
-- 


-- --------------------------------------------------------

-- 
-- Tablo yapısı: `sss`
-- 

CREATE TABLE `sss` (
  `id` int(11) NOT NULL auto_increment,
  `soru` text collate utf8_unicode_ci NOT NULL,
  `cevap` text collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

-- 
-- Tablo döküm verisi `sss`
-- 


-- --------------------------------------------------------

-- 
-- Tablo yapısı: `ticket_cevaplar`
-- 

CREATE TABLE `ticket_cevaplar` (
  `id` int(11) NOT NULL auto_increment,
  `ticket_id` int(11) NOT NULL,
  `yazan` text collate utf8_unicode_ci NOT NULL,
  `yazan_tur` text collate utf8_unicode_ci NOT NULL,
  `tarih` text collate utf8_unicode_ci NOT NULL,
  `mesaj` text collate utf8_unicode_ci NOT NULL,
  `yazan_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Tablo döküm verisi `ticket_cevaplar`
-- 


-- --------------------------------------------------------

-- 
-- Tablo yapısı: `ticketler`
-- 

CREATE TABLE `ticketler` (
  `id` int(11) NOT NULL auto_increment,
  `durum` int(11) NOT NULL,
  `tarih` int(11) NOT NULL,
  `baslik` text collate utf8_unicode_ci NOT NULL,
  `user` int(11) NOT NULL,
  `user_tur` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Tablo döküm verisi `ticketler`
-- 


-- --------------------------------------------------------

-- 
-- Tablo yapısı: `user`
-- 

CREATE TABLE `user` (
  `id` int(11) NOT NULL auto_increment,
  `username` text collate utf8_unicode_ci NOT NULL,
  `password` text collate utf8_unicode_ci NOT NULL,
  `email` text collate utf8_unicode_ci NOT NULL,
  `telefon` text collate utf8_unicode_ci NOT NULL,
  `ad` text collate utf8_unicode_ci NOT NULL,
  `kimlik` int(11) NOT NULL,
  `tur` int(11) NOT NULL,
  `login` int(11) NOT NULL,
  `sil` int(11) NOT NULL,
  `onay` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- 
-- Tablo döküm verisi `user`
-- 

INSERT INTO `user` VALUES (1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@domain.com', '0', 'YALÇIN CEYLAN', 681478, 4, 1, 0, 1);

-- --------------------------------------------------------

-- 
-- Tablo yapısı: `yayinci_odeme`
-- 

CREATE TABLE `yayinci_odeme` (
  `id` int(11) NOT NULL auto_increment,
  `yayinci_id` int(11) NOT NULL,
  `tutar` decimal(30,2) NOT NULL,
  `kesinti` decimal(30,2) NOT NULL,
  `odenecek_tutar` decimal(30,2) NOT NULL,
  `tarih` int(11) NOT NULL,
  `durum` int(11) NOT NULL,
  `banka_adi` text character set utf8 collate utf8_unicode_ci NOT NULL,
  `hesapno` text character set utf8 collate utf8_unicode_ci NOT NULL,
  `sube_kodu` text character set utf8 collate utf8_unicode_ci NOT NULL,
  `iban` text character set utf8 collate utf8_unicode_ci NOT NULL,
  `hesapsahibi` text character set utf8 collate utf8_unicode_ci NOT NULL,
  `durum_yazisi` text character set utf8 collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin5 AUTO_INCREMENT=3 ;

-- 
-- Tablo döküm verisi `yayinci_odeme`
-- 

