<? if(isset($_SESSION["Yonetici"])){
	$GelenIDler						=	$_REQUEST["IDler"];
	$GelenIDlerSecimSayisi			=	count($GelenIDler);
	
	if($GelenIDlerSecimSayisi>0){
		sort($GelenIDler);
		$SorguIcinIDKosulunuDuzenle	=	join("','", $GelenIDler);
		
		$SilinecekKaydinMevcutBilgileriSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM kisilerdisaaktarimdosyalari WHERE ID IN ('".$SorguIcinIDKosulunuDuzenle."') ORDER BY ID ASC");
		$SilinecekKaydinMevcutBilgileriSorgusuKayitSayisi	=	$SilinecekKaydinMevcutBilgileriSorgusu->num_rows;				
			if($SilinecekKaydinMevcutBilgileriSorgusuKayitSayisi>0){
				while($SilinecekKaydinMevcutBilgileriSorgusuKayitlari=$SilinecekKaydinMevcutBilgileriSorgusu->fetch_assoc()){
					$SilinecekKaydinMevcutBilgileriSorgusuKayitlariID			=	$SilinecekKaydinMevcutBilgileriSorgusuKayitlari["ID"];
					$SilinecekKaydinMevcutBilgileriSorgusuKayitlariDosyaAdi		=	$SilinecekKaydinMevcutBilgileriSorgusuKayitlari["DosyaAdi"];
		
					$KayitSil		=	$VeritabaniBaglantisi->query("DELETE FROM kisilerdisaaktarimdosyalari WHERE ID='$SilinecekKaydinMevcutBilgileriSorgusuKayitlariID' AND TamamlanmaDurumu='1' ORDER BY ID ASC LIMIT 1");
						if($KayitSil){
							unlink("Dosyalar/".$SilinecekKaydinMevcutBilgileriSorgusuKayitlariDosyaAdi);

							$GenelIstatistikleriGuncelle	=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET DisaAktarimDosyalariSayisi=DisaAktarimDosyalariSayisi-1");
								if(!$GenelIstatistikleriGuncelle){
									header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=182");
									exit();
								}
						}else{
							header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=182");
							exit();
						}
				}
		
				header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=181");
				exit();
			}else{
				header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=182");
				exit();
			}
	}else{
		header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=182");
		exit();
	}
}else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>