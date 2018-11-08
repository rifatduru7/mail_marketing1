<? if(isset($_SESSION["Yonetici"])){
	$GelenID						=	SayiliIcerikleriFiltrele($_REQUEST["ID"]);
	$GelenUlkeIDsi					=	SayiliIcerikleriFiltrele($_REQUEST["UlkeIDsi"]);
	
	if(($GelenID!="") and ($GelenUlkeIDsi!="")){
		if($FirmaAyarlariKaydiFirmaSehri!=$GelenID){
			$KisilerKontrolSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM kisiler WHERE Sehri='$GelenID' AND Ulkesi='$GelenUlkeIDsi' LIMIT 1");
			$KisilerKontrolSorgusuKayitSayisi	=	$KisilerKontrolSorgusu->num_rows;
				if($KisilerKontrolSorgusuKayitSayisi<1){
					$KampanyalarKontrolSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM kampanyalar WHERE FiltreIcinSehri='$GelenID' LIMIT 1");
					$KampanyalarKontrolSorgusuKayitSayisi	=	$KampanyalarKontrolSorgusu->num_rows;
						if($KampanyalarKontrolSorgusuKayitSayisi<1){
							$SilinecekKaydinMevcutBilgileriSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM sehirler WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
							$SilinecekKaydinMevcutBilgileriSorgusuKayitSayisi	=	$SilinecekKaydinMevcutBilgileriSorgusu->num_rows;				
								if($SilinecekKaydinMevcutBilgileriSorgusuKayitSayisi>0){
									$SilinecekKaydinMevcutBilgileriSorgusuKaydi		=	$SilinecekKaydinMevcutBilgileriSorgusu->fetch_assoc();
										$SilinecekKaydinMevcutBilgileriSorgusuKaydiSiraNumarasi		=	$SilinecekKaydinMevcutBilgileriSorgusuKaydi["SiraNumarasi"];
	
									$KayitSil		=	$VeritabaniBaglantisi->query("DELETE FROM sehirler WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
										if($KayitSil){
											$DigerKayitlarinSiraNumaralariniGuncelle	=	$VeritabaniBaglantisi->query("UPDATE sehirler SET SiraNumarasi=SiraNumarasi-1 WHERE UlkeIDsi='$GelenUlkeIDsi' AND SiraNumarasi>'$SilinecekKaydinMevcutBilgileriSorgusuKaydiSiraNumarasi' ORDER BY ID ASC");
												if(!$DigerKayitlarinSiraNumaralariniGuncelle){
													header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=51");
													exit();
												}

											$GenelIstatistikleriGuncelle		=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET SehirSayisi=SehirSayisi-1");
												if(!$GenelIstatistikleriGuncelle){
													header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=51");
													exit();
												}
		
											header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=50");
											exit();
										}else{
											header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=51");
											exit();
										}
								}else{
									header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=51");
									exit();
								}
						}else{
							header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=52");
							exit();
						}
				}else{
					header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=52");
					exit();
				}
		}else{
			header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=52");
			exit();
		}
	}else{
		header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=51");
		exit();
	}
}else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>