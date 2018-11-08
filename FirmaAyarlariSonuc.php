<? if(isset($_SESSION["Yonetici"])){
	$GelenFirmaAdi							=	HerKelimeninIlkHarfiniBuyukYap(HarfliVeSayiliIcerikleriFiltrele($_REQUEST["FirmaAdi"]));
	$GelenFirmaUnvani						=	HerKelimeninIlkHarfiniBuyukYap(HarfliVeSayiliIcerikleriFiltrele($_REQUEST["FirmaUnvani"]));
	$GelenFirmaUlkesi						=	SayiliIcerikleriFiltrele($_REQUEST["FirmaUlkesi"]);
	$GelenFirmaSehri						=	SayiliIcerikleriFiltrele($_REQUEST["FirmaSehri"]);
	$GelenFirmaIlcesi						=	HerKelimeninIlkHarfiniBuyukYap(HarfliVeSayiliIcerikleriFiltrele($_REQUEST["FirmaIlcesi"]));
	$GelenFirmaAdresi						=	IceriginIlkHarfiniBuyukYap(HarfliVeSayiliIcerikleriFiltrele($_REQUEST["FirmaAdresi"]));
	$GelenFirmaPostaKodu					=	SayiliIcerikleriFiltrele($_REQUEST["FirmaPostaKodu"]);
	$GelenFirmaTelefonu						=	TelefonluIcerikleriFiltrele($_REQUEST["FirmaTelefonu"]);
	
	if(($GelenFirmaAdi!="") and ($GelenFirmaUnvani!="") and ($GelenFirmaUlkesi!="") and ($GelenFirmaSehri!="") and ($GelenFirmaIlcesi!="") and ($GelenFirmaAdresi!="") and ($GelenFirmaPostaKodu!="") and ($GelenFirmaTelefonu!="")){
		$KayitGuncelle		=	$VeritabaniBaglantisi->query("UPDATE firmaayarlari SET FirmaAdi='$GelenFirmaAdi', FirmaUnvani='$GelenFirmaUnvani', FirmaAdresi='$GelenFirmaAdresi', FirmaPostaKodu='$GelenFirmaPostaKodu', FirmaIlcesi='$GelenFirmaIlcesi', FirmaSehri='$GelenFirmaSehri', FirmaUlkesi='$GelenFirmaUlkesi', FirmaTelefonu='$GelenFirmaTelefonu'");
			if($KayitGuncelle){	
				header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=13");
				exit();
			}else{
				header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=14");
				exit();
			}
	}else{
		header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=14");
		exit();
	}
}else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>