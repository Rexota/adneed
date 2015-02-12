<?
if(!($sqlconnect = @mysql_connect($db_host, $db_username, $db_password)) or !($sqlconnect = @mysql_pconnect($db_host, $db_username, $db_password)))
	{
	die ("Could not connect to server. Please Contact the Administrator.");
	}
else
	{
	@mysql_select_db ($db_name, $sqlconnect);
	@mysql_query("SET NAMES 'utf8'");
    @mysql_query("SET CHARACTER SET utf8");
    @mysql_query("SET COLLATION_CONNECTION = 'utf8_unicode_ci'");
	}
	

	$set = mysql_fetch_array(mysql_query("select * from config where id = 1"));
	
	$sitetitle = $set['title'];
	$siteurl = $set['adres']; 
	$sitelogo = $set['logo'];
	$sitecopy = $set['copyy']; 
	$sitekey = $set['keyy']; 
	$sitedesc =$set['descc']; 
	$sitefav =$set['fav']; 
	$adurl = $set['adadres'];
	
	
	$popupyayinci = $set['popupyayinci'];
	$splashyayinci = $set['splashyayinci'];
	$msnpopyayinci = $set['msnpopyayinci'];


	$popupreklam = $set['popupreklam'];
	$splashreklam = $set['splashreklam'];
	$msnpopreklam = $set['msnpopreklam'];
	
	
	$sismail = $set['sismail'];  
	$bilmail = $set['bilmail']; 

	
	
	$kesinti = $set['kesinti'];
	$min_talep = $set['min_talep'];
	$max_talep = $set['max_talep'];
	$odeme_talep = $set['odeme_talep'];
	
	
	$uyekayit = $set['uyekayit']; 
	$odemetalep = $set['odemetalep']; 
	$odemebildir = $set['odemebildir']; 
	$iletisimmesaj = $set['iletisimmesaj']; 
	$ticketac = $set['ticketac']; 
	
	$havuz = $set['havuz'];
	
	
	$ra = @mysql_fetch_array(@mysql_query("select * from reklam_ayarlari where id = 1"));
	
	$pop_min_hit = $ra[pop_min_hit];
	$pop_max_hit = $ra[pop_max_hit];
	
	$splash_min_hit = $ra[splash_min_hit];
	$splash_max_hit = $ra[splash_max_hit];
	
	$msn_min_hit = $ra[msn_min_hit];
	$msn_max_hit = $ra[msn_max_hit];
	
	$splash_min_width = $ra[splash_min_width];
	$splash_min_height = $ra[splash_min_height];
	
	$splash_max_width = $ra[splash_max_width];
	$splash_max_height = $ra[splash_max_height];


	$msn_min_width = $ra[msn_min_width];
	$msn_min_height = $ra[msn_min_height];
	
	$msn_max_width = $ra[msn_max_width];
	$msn_max_height = $ra[msn_max_height];	
	
	$init2 = mysql_fetch_array(mysql_query("select * from extra_ayarlar where id = 1"));
	
	
	$kayit_sayfasi = $init2[k_sayfasi];
	$yayinci_kayit = $init2[y_kayit];
	$reklamveren_kayit = $init2[r_kayit];
	
	$yayinci_otomatik = $init2[y_otomatik];
	$reklamveren_otomatik = $init2[r_otomatik];
	
	$popupactive = $init2[popa];
	$splashactive = $init2[splasha];
	$msnpopactive = $init2[msna];
	
	$anasayfa_gosterim = $init2[a_gosterim];
?>