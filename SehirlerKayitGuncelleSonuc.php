<? if(isset($_SESSION["Yonetici"])){
	$GelenID						=	SayiliIcerikleriFiltrele($_REQUEST["ID"]);
	$GelenUlkeIDsi					=	SayiliIcerikleriFiltrele($_REQUEST["UlkeIDsi"]);
	$GelenSehirAdi					=	HerKelimeninIlkHarfiniBuyukYap(HarfliVeSayiliIcerikleriFiltrele($_REQUEST["SehirAdi"]));
	$GelenSiraNumarasi				=	SayiliIcerikleriFiltrele($_REQUEST["SiraNumarasi"]);
	
	if(($GelenID!="") and ($GelenUlkeIDsi!="") and ($GelenSehirAdi!="") and ($GelenSiraNumarasi!="")){
		$EsKayitKontrolSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM sehirler WHERE ID!='$GelenID' AND UlkeIDsi='$GelenUlkeIDsi' AND SehirAdi='$GelenSehirAdi' ORDER BY ID ASC LIMIT 1");
		$EsKayitKontrolSorgusuKayitSayisi	=	$EsKayitKontrolSorgusu->num_rows;
			if($EsKayitKontrolSorgusuKayitSayisi<1){
				$GuncellenecekKaydinMevcutBilgileriSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM sehirler WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
				$GuncellenecekKaydinMevcutBilgileriSorgusuKayitSayisi	=	$GuncellenecekKaydinMevcutBilgileriSorgusu->num_rows;				
					if($GuncellenecekKaydinMevcutBilgileriSorgusuKayitSayisi>0){
						$GuncellenecekKaydinMevcutBilgileriSorgusuKaydi		=	$GuncellenecekKaydinMevcutBilgileriSorgusu->fetch_assoc();
							$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiSiraNumarasi		=	$GuncellenecekKaydinMevcutBilgileriSorgusuKaydi["SiraNumarasi"];
	
						$KayitGuncelle		=	$VeritabaniBaglantisi->query("UPDATE sehirler SET SehirAdi='$GelenSehirAdi', SiraNumarasi='$GelenSiraNumarasi' WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
							if($KayitGuncelle){
								if($GelenSiraNumarasi!=$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiSiraNumarasi){
									if($GelenSiraNumarasi<=$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiSiraNumarasi){
										$DigerKayitlarinSiraNumaralariniGuncelle	=	$VeritabaniBaglantisi->query("UPDATE sehirler SET SiraNumarasi=SiraNumarasi+1 WHERE ID!='$GelenID' AND UlkeIDsi='$GelenUlkeIDsi' AND SiraNumarasi>='$GelenSiraNumarasi' AND SiraNumarasi<'$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiSiraNumarasi' ORDER BY ID ASC");
											if(!$DigerKayitlarinSiraNumaralariniGuncelle){
												header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=47");
												exit();
											}
									}
									
									if($GelenSiraNumarasi>=$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiSiraNumarasi){
										$DigerKayitlarinSiraNumaralariniGuncelle	=	$VeritabaniBaglantisi->query("UPDATE sehirler SET SiraNumarasi=SiraNumarasi-1 WHERE ID!='$GelenID' AND UlkeIDsi='$GelenUlkeIDsi' AND SiraNumarasi<='$GelenSiraNumarasi' AND SiraNumarasi>'$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiSiraNumarasi' ORDER BY ID ASC");
											if(!$DigerKayitlarinSiraNumaralariniGuncelle){
												header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=47");
												exit();
											}
									}
								}
								
								header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=46");
								exit();
							}else{
								header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=47");
								exit();
							}
					}else{
						header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=47");
						exit();
					}
			}else{
				header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=48");
				exit();
			}
	}else{
		header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=47");
		exit();
	}
}else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>