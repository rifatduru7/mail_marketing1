<? if(isset($_SESSION["Yonetici"])){
	$GelenID						=	SayiliIcerikleriFiltrele($_REQUEST["ID"]);
	
	if($GelenID!=""){
		$SilinecekKaydinMevcutBilgileriSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM kisilerdisaaktarimdosyalari WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
		$SilinecekKaydinMevcutBilgileriSorgusuKayitSayisi	=	$SilinecekKaydinMevcutBilgileriSorgusu->num_rows;				
			if($SilinecekKaydinMevcutBilgileriSorgusuKayitSayisi>0){
				$SilinecekKaydinMevcutBilgileriSorgusuKaydi		=	$SilinecekKaydinMevcutBilgileriSorgusu->fetch_assoc();
					$SilinecekKaydinMevcutBilgileriSorgusuKaydiDosyaAdi		=	$SilinecekKaydinMevcutBilgileriSorgusuKaydi["DosyaAdi"];
		
				$KayitSil		=	$VeritabaniBaglantisi->query("DELETE FROM kisilerdisaaktarimdosyalari WHERE ID='$GelenID' AND TamamlanmaDurumu='1' ORDER BY ID ASC LIMIT 1");
					if($KayitSil){
						unlink("Dosyalar/".$SilinecekKaydinMevcutBilgileriSorgusuKaydiDosyaAdi);

						$GenelIstatistikleriGuncelle	=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET DisaAktarimDosyalariSayisi=DisaAktarimDosyalariSayisi-1");
							if(!$GenelIstatistikleriGuncelle){
								header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=179");
								exit();
							}
		
						header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=178");
						exit();
					}else{
						header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=179");
						exit();
					}
			}else{
				header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=179");
				exit();
			}
	}else{
		header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=179");
		exit();
	}
}else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>