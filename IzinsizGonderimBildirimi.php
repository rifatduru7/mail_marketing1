<?php
ob_start();
header("Content-Type:text/html; charset=UTF-8");
require_once("Ayarlar/Ayarlar.php");
require_once("Ayarlar/Fonksiyonlar.php");

if(isset($_REQUEST["KampanyaIDsi"])){
	$GelenKampanyaIDsi					=	SayiliIcerikleriFiltrele($_REQUEST["KampanyaIDsi"]);
}else{
	$GelenKampanyaIDsi					=	"";
}

if(isset($_REQUEST["KisiIDsi"])){
	$GelenKisiIDsi						=	SayiliIcerikleriFiltrele($_REQUEST["KisiIDsi"]);
}else{
	$GelenKisiIDsi						=	"";
}

if(isset($_REQUEST["HashKodu"])){
	$GelenHashKodu						=	HarfliVeSayiliIcerikleriFiltrele($_REQUEST["HashKodu"]);
}else{
	$GelenHashKodu						=	"";
}

if(($GelenKampanyaIDsi!="") and ($GelenKisiIDsi!="") and ($GelenHashKodu!="")){
	$IzinsizGonderimBildirenaillereKaydet		=	$VeritabaniBaglantisi->query("INSERT INTO gorevizinsizgonderimbildirenmailler (KampanyaIDsi, KisiIDsi, HashKodu, EklenmeIPAdresi, EklenmeTarihiZamanDamgasi, EklenmeTarihi) values ('$GelenKampanyaIDsi', '$GelenKisiIDsi', '$GelenHashKodu', '$IPAdresi', '$ZamanDamgasi', '$TarihSaat')");
	
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/IzinsizGonderimBildirimiTamam.php");
	exit();
}else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/IzinsizGonderimBildirimiTamam.php");
	exit();
}

ob_end_flush();
$VeritabaniBaglantisi->close();
?>