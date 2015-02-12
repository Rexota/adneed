<?
@ob_start();
@session_start();

include('config.php');
include('fonksiyon.php');
include('fonksiyon_db.php');


if(!($sqlconnect = @mysql_connect($db_host, $db_username, $db_password)) or !($sqlconnect = @mysql_pconnect($db_host, $db_username, $db_password)))
	{
	die ("");
	}
else
	{
	@mysql_select_db ($db_name, $sqlconnect);
	@mysql_query("SET NAMES 'utf8'");
    @mysql_query("SET CHARACTER SET utf8");
    @mysql_query("SET COLLATION_CONNECTION = 'utf8_unicode_ci'");
	}
	
include("ayar_oku.php");

?>