<? if(isset($_SESSION["Yonetici"])){
	$GelenID						=	SayiliIcerikleriFiltrele($_REQUEST["ID"]);
	
	if($GelenID!=""){
		$KayitGuncelle	=	$VeritabaniBaglantisi->query("UPDATE yoneticiler SET CalismaDurumu='1' WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
			if($KayitGuncelle){
				$LogKayitlariniGuncelle			=	$VeritabaniBaglantisi->query("UPDATE yoneticigirisloglari SET CalismaDurumu='1' WHERE YoneticiIDsi='$GelenID'");
		
				$GenelIstatistikleriGuncelle	=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET AktifYoneticiSayisi=AktifYoneticiSayisi+1, PasifYoneticiSayisi=PasifYoneticiSayisi-1");
					if(!$GenelIstatistikleriGuncelle){
						header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=81");
						exit();
					}
		
				header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=80");
				exit();
			}else{
				header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=81");
				exit();
			}
	}else{
		header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=81");
		exit();
	}
}else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>