<? if(isset($_SESSION["Yonetici"])){
	$GelenID						=	SayiliIcerikleriFiltrele($_REQUEST["ID"]);
	
	if($GelenID!="") {
		if($FirmaAyarlariKaydiFirmaUlkesi!=$GelenID){
			$KisilerKontrolSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM kisiler WHERE Ulkesi='$GelenID' LIMIT 1");
			$KisilerKontrolSorgusuKayitSayisi	=	$KisilerKontrolSorgusu->num_rows;
				if($KisilerKontrolSorgusuKayitSayisi<1){
					$KampanyalarKontrolSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM kampanyalar WHERE FiltreIcinUlkesi='$GelenID' LIMIT 1");
					$KampanyalarKontrolSorgusuKayitSayisi	=	$KampanyalarKontrolSorgusu->num_rows;
						if($KampanyalarKontrolSorgusuKayitSayisi<1){
							$SilinecekKaydinMevcutBilgileriSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM ulkeler WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
							$SilinecekKaydinMevcutBilgileriSorgusuKayitSayisi	=	$SilinecekKaydinMevcutBilgileriSorgusu->num_rows;				
								if($SilinecekKaydinMevcutBilgileriSorgusuKayitSayisi>0){
									$SilinecekKaydinMevcutBilgileriSorgusuKaydi		=	$SilinecekKaydinMevcutBilgileriSorgusu->fetch_assoc();
										$SilinecekKaydinMevcutBilgileriSorgusuKaydiSiraNumarasi		=	$SilinecekKaydinMevcutBilgileriSorgusuKaydi["SiraNumarasi"];

									$KayitSil		=	$VeritabaniBaglantisi->query("DELETE FROM ulkeler WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
										if($KayitSil){
											$DigerKayitlarinSiraNumaralariniGuncelle	=	$VeritabaniBaglantisi->query("UPDATE ulkeler SET SiraNumarasi=SiraNumarasi-1 WHERE SiraNumarasi>'$SilinecekKaydinMevcutBilgileriSorgusuKaydiSiraNumarasi' ORDER BY ID ASC");
												if(!$DigerKayitlarinSiraNumaralariniGuncelle){
													header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=29");
													exit();
												}

											$UlkelerIcinGenelIstatistikleriGuncelle		=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET UlkeSayisi=UlkeSayisi-1");
												if(!$UlkelerIcinGenelIstatistikleriGuncelle){
													header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=29");
													exit();
												}

											$UlkeninSehirleriKontrolSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM sehirler WHERE UlkeIDsi='$GelenID'");
											$UlkeninSehirleriKontrolSorgusuKayitSayisi	=	$UlkeninSehirleriKontrolSorgusu->num_rows;
												if($UlkeninSehirleriKontrolSorgusuKayitSayisi>0){
													$SehirIcinKayitSil		=	$VeritabaniBaglantisi->query("DELETE FROM sehirler WHERE UlkeIDsi='$GelenID' ORDER BY ID ASC");
														if($SehirIcinKayitSil){
															$SehirlerIcinGenelIstatistikleriGuncelle		=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET SehirSayisi=SehirSayisi-$UlkeninSehirleriKontrolSorgusuKayitSayisi");
																if(!$SehirlerIcinGenelIstatistikleriGuncelle){
																	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=29");
																	exit();
																}
														}else{
															header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=29");
															exit();
														}
												}

											header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=28");
											exit();
										}else{
											header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=29");
											exit();
										}
								}else{
									header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=29");
									exit();
								}
						}else{
							header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=30");
							exit();
						}
				}else{
					header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=30");
					exit();
				}
		}else{
			header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=30");
			exit();
		}
	}else{
		header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=29");
		exit();
	}
}else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>