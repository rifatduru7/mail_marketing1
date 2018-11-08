<? if(isset($_SESSION["Yonetici"])){
	$GelenID						=	SayiliIcerikleriFiltrele($_REQUEST["ID"]);
	
	if($GelenID!=""){
		$SilinecekKaydinMevcutBilgileriSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM sosyalagayarlari WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
		$SilinecekKaydinMevcutBilgileriSorgusuKayitSayisi	=	$SilinecekKaydinMevcutBilgileriSorgusu->num_rows;				
			if($SilinecekKaydinMevcutBilgileriSorgusuKayitSayisi>0){
				$SilinecekKaydinMevcutBilgileriSorgusuKaydi		=	$SilinecekKaydinMevcutBilgileriSorgusu->fetch_assoc();
					$SilinecekKaydinMevcutBilgileriSorgusuKaydiSosyalAgLogosu		=	$SilinecekKaydinMevcutBilgileriSorgusuKaydi["SosyalAgLogosu"];
					$SilinecekKaydinMevcutBilgileriSorgusuKaydiSiraNumarasi			=	$SilinecekKaydinMevcutBilgileriSorgusuKaydi["SiraNumarasi"];

				$KayitSil		=	$VeritabaniBaglantisi->query("DELETE FROM sosyalagayarlari WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
					if($KayitSil){
						unlink("Resimler/".$SilinecekKaydinMevcutBilgileriSorgusuKaydiSosyalAgLogosu);
		
						$DigerKayitlarinSiraNumaralariniGuncelle	=	$VeritabaniBaglantisi->query("UPDATE sosyalagayarlari SET SiraNumarasi=SiraNumarasi-1 WHERE SiraNumarasi>'$SilinecekKaydinMevcutBilgileriSorgusuKaydiSiraNumarasi' ORDER BY ID ASC");
							if(!$DigerKayitlarinSiraNumaralariniGuncelle){
								header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=104");
								exit();
							}

						$GenelIstatistikleriGuncelle	=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET SosyalAgSayisi=SosyalAgSayisi-1");
							if(!$GenelIstatistikleriGuncelle){
								header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=104");
								exit();
							}
		
						header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=103");
						exit();
					}else{
						header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=104");
						exit();
					}
			}else{
				header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=104");
				exit();
			}
	}else{
		header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=104");
		exit();
	}
}else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>