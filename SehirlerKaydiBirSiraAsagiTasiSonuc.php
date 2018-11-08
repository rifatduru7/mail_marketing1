<? if(isset($_SESSION["Yonetici"])){
	$GelenID				=	SayiliIcerikleriFiltrele($_REQUEST["ID"]);
	$GelenUlkeIDsi			=	SayiliIcerikleriFiltrele($_REQUEST["UlkeIDsi"]);
	$GelenSayfalama			=	SayiliIcerikleriFiltrele($_REQUEST["Sayfalama"]);

	if(($GelenID!="") and ($GelenUlkeIDsi!="") and ($GelenSayfalama!="")){
		$SonSiraNumarasiSorgusu					=	$VeritabaniBaglantisi->query("SELECT * FROM sehirler WHERE UlkeIDsi='$GelenUlkeIDsi' ORDER BY SiraNumarasi DESC LIMIT 1");
		$SonSiraNumarasiSorgusuKayitSayisi		=	$SonSiraNumarasiSorgusu->num_rows;				
			if($SonSiraNumarasiSorgusuKayitSayisi>0){
				$SonSiraNumarasiSorgusuKaydi	=	$SonSiraNumarasiSorgusu->fetch_assoc();
					$SonSiraNumarasiSorgusuKaydiSiraNumarasi	=	$SonSiraNumarasiSorgusuKaydi["SiraNumarasi"];
						$SonSiraNumarasi	=	$SonSiraNumarasiSorgusuKaydiSiraNumarasi;
		
				$GuncellenecekKaydinMevcutBilgileriSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM sehirler WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
				$GuncellenecekKaydinMevcutBilgileriSorgusuKayitSayisi	=	$GuncellenecekKaydinMevcutBilgileriSorgusu->num_rows;				
					if($GuncellenecekKaydinMevcutBilgileriSorgusuKayitSayisi>0){
						$GuncellenecekKaydinMevcutBilgileriSorgusuKaydi		=	$GuncellenecekKaydinMevcutBilgileriSorgusu->fetch_assoc();
							$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiSiraNumarasi		=	$GuncellenecekKaydinMevcutBilgileriSorgusuKaydi["SiraNumarasi"];
		
						if($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiSiraNumarasi<$SonSiraNumarasi){
							$KaydinGelecegiYeniSiraNumarasi		=	$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiSiraNumarasi+1;
		
							$KayitGuncelle		=	$VeritabaniBaglantisi->query("UPDATE sehirler SET SiraNumarasi='$KaydinGelecegiYeniSiraNumarasi' WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
								if($KayitGuncelle){
									$DigerKaydinSiraNumarasiniGuncelle	=	$VeritabaniBaglantisi->query("UPDATE sehirler SET SiraNumarasi='$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiSiraNumarasi' WHERE ID!='$GelenID' AND UlkeIDsi='$GelenUlkeIDsi' AND SiraNumarasi='$KaydinGelecegiYeniSiraNumarasi' ORDER BY ID ASC LIMIT 1");
										if($DigerKaydinSiraNumarasiniGuncelle){
											header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=35&Sayfalama=".$GelenSayfalama);
											exit();
										}else{
											header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=54");
											exit();
										}
								}else{
									header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=54");
									exit();
								}
						}else{
							header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=54");
							exit();
						}
					}else{
						header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=54");
						exit();
					}
			}else{
				header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=54");
				exit();
			}
	}else{
		header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=54");
		exit();
	}
}else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>