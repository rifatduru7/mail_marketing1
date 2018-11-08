<? if(isset($_SESSION["Yonetici"])){
	$GelenID							=	SayiliIcerikleriFiltrele($_REQUEST["ID"]);
	$GelenAdi							=	HerKelimeninIlkHarfiniBuyukYap(HarfliVeSayiliIcerikleriFiltrele($_REQUEST["Adi"]));
	$GelenSoyadi						=	HerKelimeninIlkHarfiniBuyukYap(HarfliVeSayiliIcerikleriFiltrele($_REQUEST["Soyadi"]));	
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
	
	if(($GelenID!="") and ($GelenVIPDurumu!="")){
		$KayitGuncelle		=	$VeritabaniBaglantisi->query("UPDATE kisiler SET Adi='$GelenAdi', Soyadi='$GelenSoyadi', Telefonu='$GelenTelefonu', CepTelefonu='$GelenCepTelefonu', Cinsiyeti='$GelenCinsiyeti', VIPDurumu='$GelenVIPDurumu', Adresi='$GelenAdresi', PostaKodu='$GelenPostaKodu', Ilcesi='$GelenIlcesi', Sehri='$GelenSehri', Ulkesi='$GelenUlkesi', WebSitesiAdresi='$GelenWebSitesiAdresi', FacebookProfilSayfasiAdresi='$GelenFacebookProfilSayfasiAdresi', TwitterProfilSayfasiAdresi='$GelenTwitterProfilSayfasiAdresi', Aciklama='$GelenAciklama' WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
			if($KayitGuncelle){	
				header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=156");
				exit();
			}else{
				header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=157");
				exit();
			}
	}else{
		header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=157");
		exit();
	}
}else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>