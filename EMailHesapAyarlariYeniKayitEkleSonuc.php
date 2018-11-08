<? if(isset($_SESSION["Yonetici"])){
	$GelenEMailAdresi										=	EMailliIcerikleriFiltrele($_REQUEST["EMailAdresi"]);
	$GelenEMailAdresiSifresi								=	KullaniciAdiVeSifresiIcerikleriniFiltrele($_REQUEST["EMailAdresiSifresi"]);
	$GelenPOP3SunucuBaglantiTuru							=	HarfliVeSayiliIcerikleriFiltrele($_REQUEST["POP3SunucuBaglantiTuru"]);	
	$GelenPOP3SunucuAdresi									=	LinkliIcerikleriFiltrele($_REQUEST["POP3SunucuAdresi"]);
	$GelenPOP3SunucusuSSLPortu								=	SayiliIcerikleriFiltrele($_REQUEST["POP3SunucusuSSLPortu"]);
	$GelenPOP3SunucusuTLSPortu								=	SayiliIcerikleriFiltrele($_REQUEST["POP3SunucusuTLSPortu"]);
	$GelenSMTPSunucuBaglantiTuru							=	HarfliVeSayiliIcerikleriFiltrele($_REQUEST["SMTPSunucuBaglantiTuru"]);	
	$GelenSMTPSunucuAdresi									=	LinkliIcerikleriFiltrele($_REQUEST["SMTPSunucuAdresi"]);
	$GelenSMTPSunucusuSSLPortu								=	SayiliIcerikleriFiltrele($_REQUEST["SMTPSunucusuSSLPortu"]);
	$GelenSMTPSunucusuTLSPortu								=	SayiliIcerikleriFiltrele($_REQUEST["SMTPSunucusuTLSPortu"]);
	$GelenIMAPSunucuBaglantiTuru							=	HarfliVeSayiliIcerikleriFiltrele($_REQUEST["IMAPSunucuBaglantiTuru"]);	
	$GelenIMAPSunucuAdresi									=	LinkliIcerikleriFiltrele($_REQUEST["IMAPSunucuAdresi"]);
	$GelenIMAPSunucusuSSLPortu								=	SayiliIcerikleriFiltrele($_REQUEST["IMAPSunucusuSSLPortu"]);
	$GelenIMAPSunucusuTLSPortu								=	SayiliIcerikleriFiltrele($_REQUEST["IMAPSunucusuTLSPortu"]);
	$GelenGunlukMaksimumMailGonderimSayisi					=	SayiliIcerikleriFiltrele($_REQUEST["GunlukMaksimumMailGonderimSayisi"]);
	$GelenYeniGonderimIcinHazirOlmaZamanAraligiSuresi		=	HarfliVeSayiliIcerikleriFiltrele($_REQUEST["YeniGonderimIcinHazirOlmaZamanAraligiSuresi"]);		
	$GelenDinlendirmeZamanAraligiSuresi						=	HarfliVeSayiliIcerikleriFiltrele($_REQUEST["DinlendirmeZamanAraligiSuresi"]);		
	$GelenSiraNumarasi										=	SayiliIcerikleriFiltrele($_REQUEST["SiraNumarasi"]);
	$GelenCalismaDurumu										=	SayiliIcerikleriFiltrele($_REQUEST["CalismaDurumu"]);
	
	if(($GelenEMailAdresi!="") and (filter_var($GelenEMailAdresi, FILTER_VALIDATE_EMAIL)) and ($GelenEMailAdresiSifresi!="") and ($GelenPOP3SunucuBaglantiTuru!="") and ($GelenPOP3SunucuAdresi!="") and (LinkDogrulugunuKontrolEt($GelenPOP3SunucuAdresi)==1) and ($GelenPOP3SunucusuSSLPortu!="") and ($GelenPOP3SunucusuSSLPortu!=0) and  ($GelenPOP3SunucusuTLSPortu!="") and ($GelenPOP3SunucusuTLSPortu!=0) and ($GelenSMTPSunucuBaglantiTuru!="") and ($GelenSMTPSunucuAdresi!="") and (LinkDogrulugunuKontrolEt($GelenSMTPSunucuAdresi)==1) and ($GelenSMTPSunucusuSSLPortu!="") and ($GelenSMTPSunucusuSSLPortu!=0) and  ($GelenSMTPSunucusuTLSPortu!="") and ($GelenSMTPSunucusuTLSPortu!=0) and ($GelenIMAPSunucuBaglantiTuru!="") and ($GelenIMAPSunucuAdresi!="") and (LinkDogrulugunuKontrolEt($GelenIMAPSunucuAdresi)==1) and ($GelenIMAPSunucusuSSLPortu!="") and ($GelenIMAPSunucusuSSLPortu!=0) and  ($GelenIMAPSunucusuTLSPortu!="") and ($GelenIMAPSunucusuTLSPortu!=0) and ($GelenGunlukMaksimumMailGonderimSayisi!="") and ($GelenGunlukMaksimumMailGonderimSayisi!=0) and ($GelenYeniGonderimIcinHazirOlmaZamanAraligiSuresi!="") and ($GelenDinlendirmeZamanAraligiSuresi!="") and ($GelenSiraNumarasi!="") and ($GelenCalismaDurumu!="")){
		$EsKayitKontrolSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM emailhesapayarlari WHERE EMailAdresi='$GelenEMailAdresi' ORDER BY ID ASC LIMIT 1");
		$EsKayitKontrolSorgusuKayitSayisi	=	$EsKayitKontrolSorgusu->num_rows;
			if($EsKayitKontrolSorgusuKayitSayisi<1){
				$SonSiraNumarasiSorgusu					=	$VeritabaniBaglantisi->query("SELECT * FROM emailhesapayarlari ORDER BY SiraNumarasi DESC LIMIT 1");
				$SonSiraNumarasiSorgusuKayitSayisi		=	$SonSiraNumarasiSorgusu->num_rows;				
					if($SonSiraNumarasiSorgusuKayitSayisi>0){
						$SonSiraNumarasiSorgusuKaydi	=	$SonSiraNumarasiSorgusu->fetch_assoc();
						$SonSiraNumarasiSorgusuKaydiSiraNumarasi	=	$SonSiraNumarasiSorgusuKaydi["SiraNumarasi"];
							$SonSiraNumarasi	=	$SonSiraNumarasiSorgusuKaydiSiraNumarasi;
					}else{
						$SonSiraNumarasi		=	0;
					}
	
				$KayitEkle		=	$VeritabaniBaglantisi->query("INSERT INTO emailhesapayarlari (EMailAdresi, EMailAdresiSifresi, POP3SunucuBaglantiTuru, POP3SunucuAdresi, POP3SunucusuSSLPortu, POP3SunucusuTLSPortu, SMTPSunucuBaglantiTuru, SMTPSunucuAdresi, SMTPSunucusuSSLPortu, SMTPSunucusuTLSPortu, IMAPSunucuBaglantiTuru, IMAPSunucuAdresi, IMAPSunucusuSSLPortu, IMAPSunucusuTLSPortu, GunlukMaksimumMailGonderimSayisi, GunlukKalanMailGonderimSayisi, YeniGonderimIcinHazirOlmaZamanAraligiSuresi, YeniGonderimYapabilecegiTarihZamanDamgasi, YeniGonderimYapabilecegiTarih, DinlendirmeZamanAraligiSuresi, EklenmeTarihiZamanDamgasi, EklenmeTarihi, SiraNumarasi, CalismaDurumu) values ('$GelenEMailAdresi', '$GelenEMailAdresiSifresi', '$GelenPOP3SunucuBaglantiTuru', '$GelenPOP3SunucuAdresi', '$GelenPOP3SunucusuSSLPortu', '$GelenPOP3SunucusuTLSPortu', '$GelenSMTPSunucuBaglantiTuru', '$GelenSMTPSunucuAdresi', '$GelenSMTPSunucusuSSLPortu', '$GelenSMTPSunucusuTLSPortu', '$GelenIMAPSunucuBaglantiTuru', '$GelenIMAPSunucuAdresi', '$GelenIMAPSunucusuSSLPortu', '$GelenIMAPSunucusuTLSPortu', '$GelenGunlukMaksimumMailGonderimSayisi', '$GelenGunlukMaksimumMailGonderimSayisi', '$GelenYeniGonderimIcinHazirOlmaZamanAraligiSuresi', '$ZamanDamgasi', '$TarihSaat', '$GelenDinlendirmeZamanAraligiSuresi', '$ZamanDamgasi', '$TarihSaat', '$GelenSiraNumarasi', '$GelenCalismaDurumu')");
					if($KayitEkle){	
						if($GelenSiraNumarasi<=$SonSiraNumarasi){
							$DigerKayitlarinSiraNumaralariniGuncelle	=	$VeritabaniBaglantisi->query("UPDATE emailhesapayarlari SET SiraNumarasi=SiraNumarasi+1 WHERE EMailAdresi!='$GelenEMailAdresiSifresi' AND SiraNumarasi>='$GelenSiraNumarasi' ORDER BY ID ASC");
								if(!$DigerKayitlarinSiraNumaralariniGuncelle){
									header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=117");
									exit();
								}
						}
	
						if($GelenCalismaDurumu==1){
							$GenelIstatistikleriGuncelle	=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET EMailHesapSayisi=EMailHesapSayisi+1, AktifEMailHesabiSayisi=AktifEMailHesabiSayisi+1, GunlukMaksimumMailGonderimSayisi=GunlukMaksimumMailGonderimSayisi+$GelenGunlukMaksimumMailGonderimSayisi, GunlukKalanMailGonderimSayisi=GunlukKalanMailGonderimSayisi+$GelenGunlukMaksimumMailGonderimSayisi");
								if(!$GenelIstatistikleriGuncelle){
									header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=117");
									exit();
								}
						}else{
							$GenelIstatistikleriGuncelle	=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET EMailHesapSayisi=EMailHesapSayisi+1, PasifEMailHesabiSayisi=PasifEMailHesabiSayisi+1");
								if(!$GenelIstatistikleriGuncelle){
									header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=117");
									exit();
								}
						}
		
						header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=116");
						exit();
					}else{
						header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=117");
						exit();
					}
			}else{
				header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=118");
				exit();
			}
	}else{
		header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=117");
		exit();
	}
}else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>