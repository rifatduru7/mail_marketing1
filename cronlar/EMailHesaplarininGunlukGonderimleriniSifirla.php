<?php
ob_start();
header("Content-Type:text/html; charset=UTF-8");
require_once("../Ayarlar/Ayarlar.php");
require_once("../Ayarlar/Fonksiyonlar.php");

$EMailHesapBilgileriSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM emailhesapayarlari ORDER BY ID ASC");
$EMailHesapBilgileriSorgusuKayitSayisi	=	$EMailHesapBilgileriSorgusu->num_rows;
	if($EMailHesapBilgileriSorgusuKayitSayisi>0){
		$GunlukMaksimumMailGonderimSayisiDegeri			=	0;
		
		while($EMailHesapBilgileriSorgusuKayitlari=$EMailHesapBilgileriSorgusu->fetch_assoc()){
			$EMailHesapBilgileriSorgusuKayitlariID										=	$EMailHesapBilgileriSorgusuKayitlari["ID"];
			$EMailHesapBilgileriSorgusuKayitlariGunlukMaksimumMailGonderimSayisi		=	$EMailHesapBilgileriSorgusuKayitlari["GunlukMaksimumMailGonderimSayisi"];
			$EMailHesapBilgileriSorgusuKayitlariCalismaDurumu							=	$EMailHesapBilgileriSorgusuKayitlari["CalismaDurumu"];
			$EMailHesapBilgileriSorgusuKayitlariDinlendirmeDurumu						=	$EMailHesapBilgileriSorgusuKayitlari["DinlendirmeDurumu"];
			
			if(($EMailHesapBilgileriSorgusuKayitlariCalismaDurumu==1) and ($EMailHesapBilgileriSorgusuKayitlariDinlendirmeDurumu==0)){
				$GunlukMaksimumMailGonderimSayisiDegeri		+=	$EMailHesapBilgileriSorgusuKayitlariGunlukMaksimumMailGonderimSayisi;
			}
			
			$EMailHesapKaydiniGuncelle		=	$VeritabaniBaglantisi->query("UPDATE emailhesapayarlari SET GunlukGonderilenMailSayisi='0', GunlukKalanMailGonderimSayisi='$EMailHesapBilgileriSorgusuKayitlariGunlukMaksimumMailGonderimSayisi' WHERE ID='$EMailHesapBilgileriSorgusuKayitlariID' ORDER BY ID ASC LIMIT 1");
		}
		
		$GenelIstatistikleriGuncelle	=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET GunlukMaksimumMailGonderimSayisi='$GunlukMaksimumMailGonderimSayisiDegeri', GunlukGonderilenMailSayisi='0', GunlukKalanMailGonderimSayisi='$GunlukMaksimumMailGonderimSayisiDegeri'");
	}else{
		$GenelIstatistikleriGuncelle	=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET GunlukMaksimumMailGonderimSayisi='0', GunlukGonderilenMailSayisi='0', GunlukKalanMailGonderimSayisi='0'");
	}

ob_end_flush();
$VeritabaniBaglantisi->close();
?>