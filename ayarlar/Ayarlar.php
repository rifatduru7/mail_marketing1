<?php
require_once("VeritabaniBaglantisi.php");
require_once("Sayfa.php");
require_once("Sayfalar.php");

$SayfalamaIcinSolveSagButonSayisi		=	2;

if(isset($_SESSION["Yonetici"])){
	$AktifYoneticiBilgisi				=	$VeritabaniBaglantisi->query("SELECT * FROM yoneticiler WHERE YoneticiKullaniciAdi='".$_SESSION["Yonetici"]."' AND CalismaDurumu='1' ORDER BY ID ASC LIMIT 1");
	$AktifYoneticiBilgisiKayitSayisi	=	$AktifYoneticiBilgisi->num_rows;
		if($AktifYoneticiBilgisiKayitSayisi>0){
			$AktifYoneticiBilgisiKaydi	=	$AktifYoneticiBilgisi->fetch_assoc();
				$AktifYoneticiBilgisiKaydiID									=	$AktifYoneticiBilgisiKaydi["ID"];
				$AktifYoneticiBilgisiKaydiYoneticiResmi							=	$AktifYoneticiBilgisiKaydi["YoneticiResmi"];
				$AktifYoneticiBilgisiKaydiYoneticiAdi							=	$AktifYoneticiBilgisiKaydi["YoneticiAdi"];
				$AktifYoneticiBilgisiKaydiYoneticiSoyadi						=	$AktifYoneticiBilgisiKaydi["YoneticiSoyadi"];
				$AktifYoneticiBilgisiKaydiYoneticiKullaniciAdi					=	$AktifYoneticiBilgisiKaydi["YoneticiKullaniciAdi"];
				$AktifYoneticiBilgisiKaydiYoneticiKullaniciSifresi				=	$AktifYoneticiBilgisiKaydi["YoneticiKullaniciSifresi"];
				$AktifYoneticiBilgisiKaydiYoneticiEMailAdresi					=	$AktifYoneticiBilgisiKaydi["YoneticiEMailAdresi"];
				$AktifYoneticiBilgisiKaydiYoneticiTelefonu						=	$AktifYoneticiBilgisiKaydi["YoneticiTelefonu"];
				$AktifYoneticiBilgisiKaydiYoneticiCepTelefonu					=	$AktifYoneticiBilgisiKaydi["YoneticiCepTelefonu"];
				$AktifYoneticiBilgisiKaydiEklenmeTarihiZamanDamgasi				=	$AktifYoneticiBilgisiKaydi["EklenmeTarihiZamanDamgasi"];
				$AktifYoneticiBilgisiKaydiEklenmeTarihi							=	$AktifYoneticiBilgisiKaydi["EklenmeTarihi"];
				$AktifYoneticiBilgisiKaydiSiraNumarasi							=	$AktifYoneticiBilgisiKaydi["SiraNumarasi"];
				$AktifYoneticiBilgisiKaydiGirisSayisi							=	$AktifYoneticiBilgisiKaydi["GirisSayisi"];
				$AktifYoneticiBilgisiKaydiSonGirisIPsi							=	$AktifYoneticiBilgisiKaydi["SonGirisIPsi"];
				$AktifYoneticiBilgisiKaydiSonGirisTarihiZamanDamgasi			=	$AktifYoneticiBilgisiKaydi["SonGirisTarihiZamanDamgasi"];
				$AktifYoneticiBilgisiKaydiSonGirisTarihi						=	$AktifYoneticiBilgisiKaydi["SonGirisTarihi"];
				$AktifYoneticiBilgisiKaydiBirOncekiGirisIPsi					=	$AktifYoneticiBilgisiKaydi["BirOncekiGirisIPsi"];
				$AktifYoneticiBilgisiKaydiBirOncekiGirisTarihiZamanDamgasi		=	$AktifYoneticiBilgisiKaydi["BirOncekiGirisTarihiZamanDamgasi"];
				$AktifYoneticiBilgisiKaydiBirOncekiGirisTarihi					=	$AktifYoneticiBilgisiKaydi["BirOncekiGirisTarihi"];
				$AktifYoneticiBilgisiKaydiCalismaDurumu							=	$AktifYoneticiBilgisiKaydi["CalismaDurumu"];
		}else{
			header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/SonucSayfalari/TabloBaglantiHatasi.php");
			exit();
		}
}

$SiteAyarlari				=	$VeritabaniBaglantisi->query("SELECT * FROM siteayarlari");
$SiteAyarlariKayitSayisi	=	$SiteAyarlari->num_rows;
	if($SiteAyarlariKayitSayisi>0){
		$SiteAyarlariKaydi	=	$SiteAyarlari->fetch_assoc();
			$SiteAyarlariKaydiID												=	$SiteAyarlariKaydi["ID"];
			$SiteAyarlariKaydiSiteAdi											=	$SiteAyarlariKaydi["SiteAdi"];
			$SiteAyarlariKaydiSiteTitle											=	$SiteAyarlariKaydi["SiteTitle"];
			$SiteAyarlariKaydiSiteCopyrightMetni								=	$SiteAyarlariKaydi["SiteCopyrightMetni"];
			$SiteAyarlariKaydiSiteFaviconu										=	$SiteAyarlariKaydi["SiteFaviconu"];
			$SiteAyarlariKaydiSiteAnaLogosu										=	$SiteAyarlariKaydi["SiteAnaLogosu"];
			$SiteAyarlariKaydiGirisFormuLogosu									=	$SiteAyarlariKaydi["GirisFormuLogosu"];
			$SiteAyarlariKaydiSiteAnaEMailAdresi								=	$SiteAyarlariKaydi["SiteAnaEMailAdresi"];
			$SiteAyarlariKaydiSiteAnaEMailAdresiSifresi							=	$SiteAyarlariKaydi["SiteAnaEMailAdresiSifresi"];
			$SiteAyarlariKaydiSiteAnaEMailAdresiPOP3SunucuBaglantiTuru			=	$SiteAyarlariKaydi["SiteAnaEMailAdresiPOP3SunucuBaglantiTuru"];
			$SiteAyarlariKaydiSiteAnaEMailAdresiPOP3SunucuAdresi				=	$SiteAyarlariKaydi["SiteAnaEMailAdresiPOP3SunucuAdresi"];
			$SiteAyarlariKaydiSiteAnaEMailAdresiPOP3SunucusuSSLPortu			=	$SiteAyarlariKaydi["SiteAnaEMailAdresiPOP3SunucusuSSLPortu"];
			$SiteAyarlariKaydiSiteAnaEMailAdresiPOP3SunucusuTLSPortu			=	$SiteAyarlariKaydi["SiteAnaEMailAdresiPOP3SunucusuTLSPortu"];
			$SiteAyarlariKaydiSiteAnaEMailAdresiSMTPSunucuBaglantiTuru			=	$SiteAyarlariKaydi["SiteAnaEMailAdresiSMTPSunucuBaglantiTuru"];
			$SiteAyarlariKaydiSiteAnaEMailAdresiSMTPSunucuAdresi				=	$SiteAyarlariKaydi["SiteAnaEMailAdresiSMTPSunucuAdresi"];
			$SiteAyarlariKaydiSiteAnaEMailAdresiSMTPSunucusuSSLPortu			=	$SiteAyarlariKaydi["SiteAnaEMailAdresiSMTPSunucusuSSLPortu"];
			$SiteAyarlariKaydiSiteAnaEMailAdresiSMTPSunucusuTLSPortu			=	$SiteAyarlariKaydi["SiteAnaEMailAdresiSMTPSunucusuTLSPortu"];
			$SiteAyarlariKaydiIslemBasinaGonderilecekMailSayisi					=	$SiteAyarlariKaydi["IslemBasinaGonderilecekMailSayisi"];
			$SiteAyarlariKaydiPanoSayfasiListelemeLimiti						=	$SiteAyarlariKaydi["PanoSayfasiListelemeLimiti"];
			$SiteAyarlariKaydiKisilerSayfasiListelemeLimiti						=	$SiteAyarlariKaydi["KisilerSayfasiListelemeLimiti"];
			$SiteAyarlariKaydiKisilerSayfasiIceAktarimKayitSayisiLimiti			=	$SiteAyarlariKaydi["KisilerSayfasiIceAktarimKayitSayisiLimiti"];
			$SiteAyarlariKaydiKisilerSayfasiDisaAktarimKayitSayisiLimiti		=	$SiteAyarlariKaydi["KisilerSayfasiDisaAktarimKayitSayisiLimiti"];
			$SiteAyarlariKaydiKisiBildirimleriSayfasiListelemeLimiti			=	$SiteAyarlariKaydi["KisiBildirimleriSayfasiListelemeLimiti"];
			$SiteAyarlariKaydiKampanyalarSayfasiListelemeLimiti					=	$SiteAyarlariKaydi["KampanyalarSayfasiListelemeLimiti"];
			$SiteAyarlariKaydiTemalarSayfasiListelemeLimiti						=	$SiteAyarlariKaydi["TemalarSayfasiListelemeLimiti"];
			$SiteAyarlariKaydiEMailHesaplariAyarlariSayfasiListelemeLimiti		=	$SiteAyarlariKaydi["EMailHesaplariAyarlariSayfasiListelemeLimiti"];
			$SiteAyarlariKaydiSosyalAglarSayfasiListelemeLimiti					=	$SiteAyarlariKaydi["SosyalAglarSayfasiListelemeLimiti"];
			$SiteAyarlariKaydiUlkelerSayfasiListelemeLimiti						=	$SiteAyarlariKaydi["UlkelerSayfasiListelemeLimiti"];
			$SiteAyarlariKaydiSehirlerSayfasiListelemeLimiti					=	$SiteAyarlariKaydi["SehirlerSayfasiListelemeLimiti"];
			$SiteAyarlariKaydiYoneticilerSayfasiListelemeLimiti					=	$SiteAyarlariKaydi["YoneticilerSayfasiListelemeLimiti"];
	}else{
		header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/SonucSayfalari/TabloBaglantiHatasi.php");
		exit();
	}

$FirmaAyarlari				=	$VeritabaniBaglantisi->query("SELECT * FROM firmaayarlari");
$FirmaAyarlariKayitSayisi	=	$FirmaAyarlari->num_rows;
	if($FirmaAyarlariKayitSayisi>0){
		$FirmaAyarlariKaydi	=	$FirmaAyarlari->fetch_assoc();
			$FirmaAyarlariKaydiID					=	$FirmaAyarlariKaydi["ID"];
			$FirmaAyarlariKaydiFirmaAdi				=	$FirmaAyarlariKaydi["FirmaAdi"];
			$FirmaAyarlariKaydiFirmaUnvani			=	$FirmaAyarlariKaydi["FirmaUnvani"];
			$FirmaAyarlariKaydiFirmaAdresi			=	$FirmaAyarlariKaydi["FirmaAdresi"];
			$FirmaAyarlariKaydiFirmaPostaKodu		=	$FirmaAyarlariKaydi["FirmaPostaKodu"];
			$FirmaAyarlariKaydiFirmaIlcesi			=	$FirmaAyarlariKaydi["FirmaIlcesi"];
			$FirmaAyarlariKaydiFirmaSehri			=	$FirmaAyarlariKaydi["FirmaSehri"];
			$FirmaAyarlariKaydiFirmaUlkesi			=	$FirmaAyarlariKaydi["FirmaUlkesi"];
			$FirmaAyarlariKaydiFirmaTelefonu		=	$FirmaAyarlariKaydi["FirmaTelefonu"];
	}else{
		header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/SonucSayfalari/TabloBaglantiHatasi.php");
		exit();
	}

$GeneleIstatistikBilgisi				=	$VeritabaniBaglantisi->query("SELECT * FROM genelistatistikler");
$GeneleIstatistikBilgisiKayitSayisi		=	$GeneleIstatistikBilgisi->num_rows;
	if($GeneleIstatistikBilgisiKayitSayisi>0){
		$GeneleIstatistikBilgisiKaydi	=	$GeneleIstatistikBilgisi->fetch_assoc();
			$GeneleIstatistikBilgisiKaydiID										=	$GeneleIstatistikBilgisiKaydi["ID"];
			$GeneleIstatistikBilgisiKaydiKisiSayisi								=	$GeneleIstatistikBilgisiKaydi["KisiSayisi"];
			$GeneleIstatistikBilgisiKaydiBekleyenIceAktarimIslemSayisi			=	$GeneleIstatistikBilgisiKaydi["BekleyenIceAktarimIslemSayisi"];
			$GeneleIstatistikBilgisiKaydiBekleyenDisaAktarimIslemSayisi			=	$GeneleIstatistikBilgisiKaydi["BekleyenDisaAktarimIslemSayisi"];
			$GeneleIstatistikBilgisiKaydiDisaAktarimDosyalariSayisi				=	$GeneleIstatistikBilgisiKaydi["DisaAktarimDosyalariSayisi"];
			$GeneleIstatistikBilgisiKaydiKampanyaSayisi							=	$GeneleIstatistikBilgisiKaydi["KampanyaSayisi"];
			$GeneleIstatistikBilgisiKaydiTemaSayisi								=	$GeneleIstatistikBilgisiKaydi["TemaSayisi"];
			$GeneleIstatistikBilgisiKaydiEMailHesapSayisi						=	$GeneleIstatistikBilgisiKaydi["EMailHesapSayisi"];
			$GeneleIstatistikBilgisiKaydiAktifEMailHesabiSayisi					=	$GeneleIstatistikBilgisiKaydi["AktifEMailHesabiSayisi"];
			$GeneleIstatistikBilgisiKaydiPasifEMailHesabiSayisi					=	$GeneleIstatistikBilgisiKaydi["PasifEMailHesabiSayisi"];
			$GeneleIstatistikBilgisiKaydiDinlendirilenEMailHesabiSayisi			=	$GeneleIstatistikBilgisiKaydi["DinlendirilenEMailHesabiSayisi"];
			$GeneleIstatistikBilgisiKaydiGunlukMaksimumMailGonderimSayisi		=	$GeneleIstatistikBilgisiKaydi["GunlukMaksimumMailGonderimSayisi"];
			$GeneleIstatistikBilgisiKaydiGunlukGonderilenMailSayisi				=	$GeneleIstatistikBilgisiKaydi["GunlukGonderilenMailSayisi"];
			$GeneleIstatistikBilgisiKaydiGunlukKalanMailGonderimSayisi			=	$GeneleIstatistikBilgisiKaydi["GunlukKalanMailGonderimSayisi"];
			$GeneleIstatistikBilgisiKaydiSosyalAgSayisi							=	$GeneleIstatistikBilgisiKaydi["SosyalAgSayisi"];
			$GeneleIstatistikBilgisiKaydiUlkeSayisi								=	$GeneleIstatistikBilgisiKaydi["UlkeSayisi"];
			$GeneleIstatistikBilgisiKaydiSehirSayisi							=	$GeneleIstatistikBilgisiKaydi["SehirSayisi"];
			$GeneleIstatistikBilgisiKaydiYoneticiSayisi							=	$GeneleIstatistikBilgisiKaydi["YoneticiSayisi"];
			$GeneleIstatistikBilgisiKaydiAktifYoneticiSayisi					=	$GeneleIstatistikBilgisiKaydi["AktifYoneticiSayisi"];
			$GeneleIstatistikBilgisiKaydiPasifYoneticiSayisi					=	$GeneleIstatistikBilgisiKaydi["PasifYoneticiSayisi"];
			$GeneleIstatistikBilgisiKaydiGonderimBekleyenMailSayisi				=	$GeneleIstatistikBilgisiKaydi["GonderimBekleyenMailSayisi"];
			$GeneleIstatistikBilgisiKaydiGonderilenMailSayisi					=	$GeneleIstatistikBilgisiKaydi["GonderilenMailSayisi"];
			$GeneleIstatistikBilgisiKaydiGeriDonenGecersizMailSayisi			=	$GeneleIstatistikBilgisiKaydi["GeriDonenGecersizMailSayisi"];
			$GeneleIstatistikBilgisiKaydiAcilanMailSayisi						=	$GeneleIstatistikBilgisiKaydi["AcilanMailSayisi"];
			$GeneleIstatistikBilgisiKaydiMailAcilmaSayisi						=	$GeneleIstatistikBilgisiKaydi["MailAcilmaSayisi"];
			$GeneleIstatistikBilgisiKaydiIcerigineTiklananMailSayisi			=	$GeneleIstatistikBilgisiKaydi["IcerigineTiklananMailSayisi"];
			$GeneleIstatistikBilgisiKaydiMailIcerigineTiklanmaSayisi			=	$GeneleIstatistikBilgisiKaydi["MailIcerigineTiklanmaSayisi"];
			$GeneleIstatistikBilgisiKaydiIzinsizGonderimBildirenKisiSayisi		=	$GeneleIstatistikBilgisiKaydi["IzinsizGonderimBildirenKisiSayisi"];
	}else{
		header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/SonucSayfalari/TabloBaglantiHatasi.php");
		exit();
	}
?>