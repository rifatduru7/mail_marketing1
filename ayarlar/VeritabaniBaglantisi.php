<?php
ini_set("max_execution_time", 86400);
date_default_timezone_set("Europe/Istanbul");
header("Content-Type:text/html; charset=UTF-8");

$VeritabaniHostAdresi			=	""; /* 000.000.000.000 */
$VeritabaniAdi					=	""; /* localhost */
$VeritabaniKullaniciAdi			=	""; /* root*/
$VeritabaniKullaniciSifresi		=	""; /* 1234567890 */

$VeritabaniBaglantisi			=	new mysqli($VeritabaniHostAdresi, $VeritabaniKullaniciAdi, $VeritabaniKullaniciSifresi);
$VeritabaniBaglantisi->set_charset("UTF8");

define("SITEDOMAINI", ""); /* dogruyer.com) */
define("SITEDIZINI", ""); /* /mail_marketing) */
define("SITEKOKDIZINI", ""); //home//public_html/mail_marketing) */

if(mysqli_connect_errno()){
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/SonucSayfalari/VeritabaniBaglantiHatasi.php");
	exit();
}else{
	$VeritabaniBaglantisi->select_db($VeritabaniAdi);
}
?>