<? if(isset($_SESSION["Yonetici"])){
	$GelenID						=	SayiliIcerikleriFiltrele($_REQUEST["ID"]);
	
	if($GelenID!=""){
		$SilinecekKaydinMevcutBilgileriSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM kisiler WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
		$SilinecekKaydinMevcutBilgileriSorgusuKayitSayisi	=	$SilinecekKaydinMevcutBilgileriSorgusu->num_rows;				
			if($SilinecekKaydinMevcutBilgileriSorgusuKayitSayisi>0){
				$SilinecekKaydinMevcutBilgileriSorgusuKaydi		=	$SilinecekKaydinMevcutBilgileriSorgusu->fetch_assoc();
					$SilinecekKaydinMevcutBilgileriSorgusuKaydiEMailAdresi		=	$SilinecekKaydinMevcutBilgileriSorgusuKaydi["EMailAdresi"];

				$KayitSil		=	$VeritabaniBaglantisi->query("DELETE FROM kisiler WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
					if($KayitSil){
						$GenelIstatistikleriGuncelle	=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET KisiSayisi=KisiSayisi-1");
							if(!$GenelIstatistikleriGuncelle){
								header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=160");
								exit();
							}
						
						$GoreviEkle		=	$VeritabaniBaglantisi->query("INSERT INTO gorevsilinenkisiler (KisiIDsi, KisiEMailAdresi) values ('$GelenID', '$SilinecekKaydinMevcutBilgileriSorgusuKaydiEMailAdresi')");
							if(!$GoreviEkle){
								header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=160");
								exit();
							}
		
						header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=159");
						exit();
					}else{
						header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=160");
						exit();
					}
			}else{
				header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=160");
				exit();
			}
	}else{
		header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=160");
		exit();
	}
}else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>