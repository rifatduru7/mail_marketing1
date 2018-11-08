<?php
ob_start();
header("Content-Type:text/html; charset=UTF-8");
require_once("Ayarlar/Ayarlar.php");
require_once("Ayarlar/Fonksiyonlar.php");

$GelenID			=	SayiliIcerikleriFiltrele($_REQUEST["ID"]);
	if($GelenID){
		$TemalarSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM temalar WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
		$TemalarSorgusuKayitSayisi	=	$TemalarSorgusu->num_rows;
			if($TemalarSorgusuKayitSayisi>0){
				$TemalarSorgusuKaydi	=	$TemalarSorgusu->fetch_assoc();
					$TemalarSorgusuKaydiID							=	$TemalarSorgusuKaydi["ID"];
					$TemalarSorgusuKaydiTemaTaslakDosyasi			=	$TemalarSorgusuKaydi["TemaTaslakDosyasi"];
					$TemalarSorgusuKaydiTemaTaslakDosyasiYolu		=	"Temalar/".$TemalarSorgusuKaydiTemaTaslakDosyasi.".html";

					$DosyaAc						=	file_get_contents($TemalarSorgusuKaydiTemaTaslakDosyasiYolu);
					$DosyaIceriginiDonustur			=	DosyaliIcerikleriniFiltrele($DosyaAc);
					$DosyaIceriginiDuzenle			=	TemaOnIzlemeIcinDuzenle($TemalarSorgusuKaydiID, $DosyaIceriginiDonustur);
					$DosyaIceriginiGeriDonustur		=	DonusumleriGeriDondur($DosyaIceriginiDuzenle);
					$DosyaYaz						=	$DosyaIceriginiGeriDonustur;

					echo $DosyaYaz;
			}else{
				header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=190");
				exit();
			}
	}else{
		header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=190");
		exit();
	}

ob_end_flush();
$VeritabaniBaglantisi->close();
?>