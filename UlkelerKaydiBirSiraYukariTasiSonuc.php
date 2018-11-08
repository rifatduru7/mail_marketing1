<? if(isset($_SESSION["Yonetici"])){
	$GelenID				=	SayiliIcerikleriFiltrele($_REQUEST["ID"]);
	$GelenSayfalama			=	SayiliIcerikleriFiltrele($_REQUEST["Sayfalama"]);

	if(($GelenID!="") and ($GelenSayfalama!="")){
		$GuncellenecekKaydinMevcutBilgileriSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM ulkeler WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
		$GuncellenecekKaydinMevcutBilgileriSorgusuKayitSayisi	=	$GuncellenecekKaydinMevcutBilgileriSorgusu->num_rows;				
			if($GuncellenecekKaydinMevcutBilgileriSorgusuKayitSayisi>0){
				$GuncellenecekKaydinMevcutBilgileriSorgusuKaydi		=	$GuncellenecekKaydinMevcutBilgileriSorgusu->fetch_assoc();
					$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiSiraNumarasi		=	$GuncellenecekKaydinMevcutBilgileriSorgusuKaydi["SiraNumarasi"];
		
				if($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiSiraNumarasi>1){
					$KaydinGelecegiYeniSiraNumarasi		=	$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiSiraNumarasi-1;
		
					$KayitGuncelle		=	$VeritabaniBaglantisi->query("UPDATE ulkeler SET SiraNumarasi='$KaydinGelecegiYeniSiraNumarasi' WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
						if($KayitGuncelle){
							$DigerKaydinSiraNumarasiniGuncelle	=	$VeritabaniBaglantisi->query("UPDATE ulkeler SET SiraNumarasi='$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiSiraNumarasi' WHERE ID!='$GelenID' AND SiraNumarasi='$KaydinGelecegiYeniSiraNumarasi' ORDER BY ID ASC LIMIT 1");
								if($DigerKaydinSiraNumarasiniGuncelle){
									header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=15&Sayfalama=".$GelenSayfalama);
									exit();
								}else{
									header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=34");
									exit();
								}
						}else{
							header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=34");
							exit();
						}
				}else{
					header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=34");
					exit();
				}
			}else{
				header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=34");
				exit();
			}
	}else{
		header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=34");
		exit();
	}
}else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>