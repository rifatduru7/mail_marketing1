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

if(isset($_REQUEST["Link"])){
	$GelenLink							=	LinkliIcerikleriFiltrele($_REQUEST["Link"]);
}else{
	$GelenLink							=	"";
}

if(($GelenKampanyaIDsi!="") and ($GelenKisiIDsi!="") and ($GelenHashKodu!="") and ($GelenLink!="")){
	$TiklananMaillereKaydet		=	$VeritabaniBaglantisi->query("INSERT INTO gorevtiklananmailler (KampanyaIDsi, KisiIDsi, HashKodu, EklenmeIPAdresi, EklenmeTarihiZamanDamgasi, EklenmeTarihi) values ('$GelenKampanyaIDsi', '$GelenKisiIDsi', '$GelenHashKodu', '$IPAdresi', '$ZamanDamgasi', '$TarihSaat')");
	
	header("Location:".$GelenLink);
	exit();
}else{
	$KampanyaSorgusu			=	$VeritabaniBaglantisi->query("SELECT * FROM kampanyalar ORDER BY RAND() LIMIT 1");
	$KampanyaSorgusuKayitSayisi	=	$KampanyaSorgusu->num_rows;
		if($KampanyaSorgusuKayitSayisi>0){
			$KampanyaSorgusuKaydiWebSitesiLinki		=	$KampanyaSorgusu["WebSitesiLinki"];
				$KampanyaSorgusuKaydiWebSitesiLinkiYaz		=	DonusumleriGeriDondur($KampanyaSorgusuKaydiWebSitesiLinki);
			
				header("Location:".$KampanyaSorgusuKaydiWebSitesiLinkiYaz);
				exit();
		}else{
			header("Location:http://www.google.com.tr");
			exit();
		}
}

ob_end_flush();
$VeritabaniBaglantisi->close();
?>