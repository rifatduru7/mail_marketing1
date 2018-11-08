<? if(isset($_SESSION["Yonetici"])){
	$GelenBaslik						=	HerKelimeninIlkHarfiniBuyukYap(HarfliVeSayiliIcerikleriFiltrele($_REQUEST["Baslik"]));
	$DosyaAdi							=	DosyaAdiOlustur($GelenBaslik);
	$DosyaAdiOlustur					=	$DosyaAdi.".zip";
	$GelenAdi							=	HerKelimeninIlkHarfiniBuyukYap(HarfliVeSayiliIcerikleriFiltrele($_REQUEST["Adi"]));
	$GelenSoyadi						=	HerKelimeninIlkHarfiniBuyukYap(HarfliVeSayiliIcerikleriFiltrele($_REQUEST["Soyadi"]));
	$GelenEMailAdresi					=	EMailliIcerikleriFiltrele($_REQUEST["EMailAdresi"]);
	$GelenTelefonu						=	TelefonluIcerikleriFiltrele($_REQUEST["Telefonu"]);
	$GelenCepTelefonu					=	TelefonluIcerikleriFiltrele($_REQUEST["CepTelefonu"]);
	$GelenCinsiyeti						=	HarfliVeSayiliIcerikleriFiltrele($_REQUEST["Cinsiyeti"]);	
	$GelenVIPDurumu						=	SayiliIcerikleriFiltrele($_REQUEST["VIPDurumu"]);
	$GelenUlkesi						=	SayiliIcerikleriFiltrele($_REQUEST["Ulkesi"]);
	$GelenSehri							=	SayiliIcerikleriFiltrele($_REQUEST["Sehri"]);
	$GelenIlcesi						=	HerKelimeninIlkHarfiniBuyukYap(HarfliVeSayiliIcerikleriFiltrele($_REQUEST["Ilcesi"]));
	$GelenPostaKodu						=	SayiliIcerikleriFiltrele($_REQUEST["PostaKodu"]);
	$GelenAdresi						=	IceriginIlkHarfiniBuyukYap(HarfliVeSayiliIcerikleriFiltrele($_REQUEST["Adresi"]));
	$GelenWebSitesiAdresi				=	LinkliIcerikleriFiltrele($_REQUEST["WebSitesiAdresi"]);
	$GelenFacebookProfilSayfasiAdresi	=	LinkliIcerikleriFiltrele($_REQUEST["FacebookProfilSayfasiAdresi"]);
	$GelenTwitterProfilSayfasiAdresi	=	LinkliIcerikleriFiltrele($_REQUEST["TwitterProfilSayfasiAdresi"]);
	
	if($GelenAdi!=""){
		$SorguKosulu		=	"WHERE Adi LIKE '%$GelenAdi%'";
	}else{
		$SorguKosulu		=	"";
	}
	
	if($GelenSoyadi!=""){
		if($SorguKosulu!=""){
			$SorguKosulu		.=	" AND Soyadi LIKE '%$GelenSoyadi%'";
		}else{
			$SorguKosulu		=	"WHERE Soyadi LIKE '%$GelenSoyadi%'";
		}
	}
	
	if($GelenEMailAdresi!=""){
		if($SorguKosulu!=""){
			$SorguKosulu		.=	" AND EMailAdresi LIKE '%$GelenEMailAdresi%'";
		}else{
			$SorguKosulu		=	"WHERE EMailAdresi LIKE '%$GelenEMailAdresi%'";
		}
	}
	
	if($GelenTelefonu!=""){
		if($SorguKosulu!=""){
			$SorguKosulu		.=	" AND Telefonu LIKE '%$GelenTelefonu%'";
		}else{
			$SorguKosulu		=	"WHERE Telefonu LIKE '%$GelenTelefonu%'";
		}
	}
	
	if($GelenCepTelefonu!=""){
		if($SorguKosulu!=""){
			$SorguKosulu		.=	" AND CepTelefonu LIKE '%$GelenCepTelefonu%'";
		}else{
			$SorguKosulu		=	"WHERE CepTelefonu LIKE '%$GelenCepTelefonu%'";
		}
	}
	
	if($GelenCinsiyeti!="Tümü"){
		if($SorguKosulu!=""){
			if($GelenCinsiyeti=="Erkek"){
				$SorguKosulu		.=	" AND Cinsiyeti='Erkek'";
			}else{
				$SorguKosulu		.=	" AND Cinsiyeti='Kadın'";
			}
		}else{
			if($GelenCinsiyeti=="Erkek"){
				$SorguKosulu		=	"WHERE Cinsiyeti='Erkek'";
			}else{
				$SorguKosulu		=	"WHERE Cinsiyeti='Kadın'";
			}
		}
	}
	
	if($GelenVIPDurumu!=2){
		if($SorguKosulu!=""){
			if($GelenVIPDurumu==1){
				$SorguKosulu		.=	" AND VIPDurumu='1'";
			}else{
				$SorguKosulu		.=	" AND VIPDurumu='0'";
			}
		}else{
			if($GelenVIPDurumu==1){
				$SorguKosulu		=	"WHERE VIPDurumu='1'";
			}else{
				$SorguKosulu		=	"WHERE VIPDurumu='0'";
			}
		}
	}
	
	if($GelenUlkesi!=""){
		if($SorguKosulu!=""){
			$SorguKosulu		.=	" AND Ulkesi='$GelenUlkesi'";
		}else{
			$SorguKosulu		=	"WHERE Ulkesi='$GelenUlkesi'";
		}
	}
	
	if($GelenSehri!=""){
		if($SorguKosulu!=""){
			$SorguKosulu		.=	" AND Sehri='$GelenSehri'";
		}else{
			$SorguKosulu		=	"WHERE Sehri='$GelenSehri'";
		}
	}
	
	if($GelenIlcesi!=""){
		if($SorguKosulu!=""){
			$SorguKosulu		.=	" AND Ilcesi LIKE '%$GelenIlcesi%'";
		}else{
			$SorguKosulu		=	"WHERE Ilcesi LIKE '%$GelenIlcesi%'";
		}
	}
	
	if($GelenPostaKodu!=""){
		if($SorguKosulu!=""){
			$SorguKosulu		.=	" AND PostaKodu LIKE '%$GelenPostaKodu%'";
		}else{
			$SorguKosulu		=	"WHERE PostaKodu LIKE '%$GelenPostaKodu%'";
		}
	}
	
	if($GelenAdresi!=""){
		if($SorguKosulu!=""){
			$SorguKosulu		.=	" AND Adresi LIKE '%$GelenAdresi%'";
		}else{
			$SorguKosulu		=	"WHERE Adresi LIKE '%$GelenAdresi%'";
		}
	}
	
	if($GelenWebSitesiAdresi!=""){
		if($SorguKosulu!=""){
			$SorguKosulu		.=	" AND WebSitesiAdresi LIKE '%$GelenWebSitesiAdresi%'";
		}else{
			$SorguKosulu		=	"WHERE WebSitesiAdresi LIKE '%$GelenWebSitesiAdresi%'";
		}
	}
	
	if($GelenFacebookProfilSayfasiAdresi!=""){
		if($SorguKosulu!=""){
			$SorguKosulu		.=	" AND FacebookProfilSayfasiAdresi LIKE '%$GelenFacebookProfilSayfasiAdresi%'";
		}else{
			$SorguKosulu		=	"WHERE FacebookProfilSayfasiAdresi LIKE '%$GelenFacebookProfilSayfasiAdresi%'";
		}
	}
	
	if($GelenFacebookProfilSayfasiAdresi!=""){
		if($SorguKosulu!=""){
			$SorguKosulu		.=	" AND TwitterProfilSayfasiAdresi LIKE '%$GelenTwitterProfilSayfasiAdresi%'";
		}else{
			$SorguKosulu		=	"WHERE TwitterProfilSayfasiAdresi LIKE '%$GelenTwitterProfilSayfasiAdresi%'";
		}
	}
	
	$ToplamKayitSayisiSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM kisiler $SorguKosulu LIMIT 1");
	$ToplamKayitSayisiSorgusuKayitSayisi	=	$ToplamKayitSayisiSorgusu->num_rows;	
	
	if(($GelenBaslik!="") and ($DosyaAdi!="") and ($GelenCinsiyeti!="") and ($GelenVIPDurumu!="")){
		if($ToplamKayitSayisiSorgusuKayitSayisi>0){
			$EsKayitKontrolSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM kisilerdisaaktarimdosyalari WHERE DosyaAdi='$DosyaAdiOlustur' ORDER BY ID ASC LIMIT 1");
			$EsKayitKontrolSorgusuKayitSayisi	=	$EsKayitKontrolSorgusu->num_rows;				
				if($EsKayitKontrolSorgusuKayitSayisi<1){
					$KayitEkle		=	$VeritabaniBaglantisi->query("INSERT INTO kisilerdisaaktarimdosyalari (FiltreIcinAdi, FiltreIcinSoyadi, FiltreIcinEMailAdresi, FiltreIcinTelefonu, FiltreIcinCepTelefonu, FiltreIcinCinsiyeti, FiltreIcinVIPDurumu, FiltreIcinAdresi, FiltreIcinPostaKodu, FiltreIcinIlcesi, FiltreIcinSehri, FiltreIcinUlkesi, FiltreIcinWebSitesiAdresi, FiltreIcinFacebookProfilSayfasiAdresi, FiltreIcinTwitterProfilSayfasiAdresi, Baslik, DosyaAdi, DosyaKayitSayisiLimiti, EklenmeTarihiZamanDamgasi, EklenmeTarihi) values ('$GelenAdi', '$GelenSoyadi', '$GelenEMailAdresi', '$GelenTelefonu', '$GelenCepTelefonu', '$GelenCinsiyeti', '$GelenVIPDurumu', '$GelenAdresi', '$GelenPostaKodu', '$GelenIlcesi', '$GelenSehri', '$GelenUlkesi', '$GelenWebSitesiAdresi', '$GelenFacebookProfilSayfasiAdresi', '$GelenTwitterProfilSayfasiAdresi', '$GelenBaslik', '$DosyaAdiOlustur', '$SiteAyarlariKaydiKisilerSayfasiDisaAktarimKayitSayisiLimiti', '$ZamanDamgasi', '$TarihSaat')");
						if($KayitEkle){
							$GenelIstatistikleriGuncelle	=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET BekleyenDisaAktarimIslemSayisi=BekleyenDisaAktarimIslemSayisi+1");
								if(!$GenelIstatistikleriGuncelle){
									header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=172");
									exit();
								}

							header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=171");
							exit();
						}else{
							header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=172");
							exit();
						}
				}else{
					header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=173");
					exit();
				}
		}else{
			header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=174");
			exit();
		}
	}else{
		header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=172");
		exit();
	}
}else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>