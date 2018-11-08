<? if(isset($_SESSION["Yonetici"])){
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
		if($GelenWebSitesiAdresi!=""){
			if(LinkDogrulugunuOnEkZorunluKontrolEt($GelenWebSitesiAdresi)!=1){
				$GelenWebSitesiAdresi					=	"";
			}
		}
	$GelenFacebookProfilSayfasiAdresi	=	LinkliIcerikleriFiltrele($_REQUEST["FacebookProfilSayfasiAdresi"]);
		if($GelenFacebookProfilSayfasiAdresi!=""){
			if(LinkDogrulugunuOnEkZorunluKontrolEt($GelenFacebookProfilSayfasiAdresi)!=1){
				$GelenFacebookProfilSayfasiAdresi		=	"";
			}
		}
	$GelenTwitterProfilSayfasiAdresi	=	LinkliIcerikleriFiltrele($_REQUEST["TwitterProfilSayfasiAdresi"]);
		if($GelenTwitterProfilSayfasiAdresi!=""){
			if(LinkDogrulugunuOnEkZorunluKontrolEt($GelenTwitterProfilSayfasiAdresi)!=1){
				$GelenTwitterProfilSayfasiAdresi		=	"";
			}
		}
	$GelenAciklama						=	HarfliVeSayiliIcerikleriFiltrele($_REQUEST["Aciklama"]);
		
	if(($GelenEMailAdresi!="") and (filter_var($GelenEMailAdresi, FILTER_VALIDATE_EMAIL)) and ($GelenVIPDurumu!="")){
		$EsKayitKontrolSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM kisiler WHERE EMailAdresi='$GelenEMailAdresi' ORDER BY ID ASC LIMIT 1");
		$EsKayitKontrolSorgusuKayitSayisi	=	$EsKayitKontrolSorgusu->num_rows;
			if($EsKayitKontrolSorgusuKayitSayisi<1){
				$KayitEkle		=	$VeritabaniBaglantisi->query("INSERT INTO kisiler (Adi, Soyadi, EMailAdresi, Telefonu, CepTelefonu, Cinsiyeti, VIPDurumu, Adresi, PostaKodu, Ilcesi, Sehri, Ulkesi, WebSitesiAdresi, FacebookProfilSayfasiAdresi, TwitterProfilSayfasiAdresi, Aciklama, EklenmeTuru, EklenmeTarihiZamanDamgasi, EklenmeTarihi) values ('$GelenAdi', '$GelenSoyadi', '$GelenEMailAdresi', '$GelenTelefonu', '$GelenCepTelefonu', '$GelenCinsiyeti', '$GelenVIPDurumu', '$GelenAdresi', '$GelenPostaKodu', '$GelenIlcesi', '$GelenSehri', '$GelenUlkesi', '$GelenWebSitesiAdresi', '$GelenFacebookProfilSayfasiAdresi', '$GelenTwitterProfilSayfasiAdresi', '$GelenAciklama', 'Manuel', '$ZamanDamgasi', '$TarihSaat')");
					if($KayitEkle){	
						$GenelIstatistikleriGuncelle	=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET KisiSayisi=KisiSayisi+1");
							if(!$GenelIstatistikleriGuncelle){
								header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=152");
								exit();
							}
		
						header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=151");
						exit();
					}else{
						header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=152");
						exit();
					}
			}else{
				header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=153");
				exit();
			}
	}else{
		header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=152");
		exit();
	}
}else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>