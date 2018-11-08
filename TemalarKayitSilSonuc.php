<? if(isset($_SESSION["Yonetici"])){
	$GelenID						=	SayiliIcerikleriFiltrele($_REQUEST["ID"]);
	
	if($GelenID!=""){
		$SilinecekKaydinMevcutBilgileriSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM temalar WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
		$SilinecekKaydinMevcutBilgileriSorgusuKayitSayisi	=	$SilinecekKaydinMevcutBilgileriSorgusu->num_rows;				
			if($SilinecekKaydinMevcutBilgileriSorgusuKayitSayisi>0){
				$SilinecekKaydinMevcutBilgileriSorgusuKaydi		=	$SilinecekKaydinMevcutBilgileriSorgusu->fetch_assoc();
					$SilinecekKaydinMevcutBilgileriSorgusuKaydiID						=	$SilinecekKaydinMevcutBilgileriSorgusuKaydi["ID"];
					$SilinecekKaydinMevcutBilgileriSorgusuKaydiLogosu					=	$SilinecekKaydinMevcutBilgileriSorgusuKaydi["Logosu"];
					$SilinecekKaydinMevcutBilgileriSorgusuKaydiBirinciResimDosyasiAdi	=	$SilinecekKaydinMevcutBilgileriSorgusuKaydi["BirinciResimDosyasiAdi"];
					$SilinecekKaydinMevcutBilgileriSorgusuKaydiIkinciResimDosyasiAdi	=	$SilinecekKaydinMevcutBilgileriSorgusuKaydi["IkinciResimDosyasiAdi"];
					$SilinecekKaydinMevcutBilgileriSorgusuKaydiSiraNumarasi				=	$SilinecekKaydinMevcutBilgileriSorgusuKaydi["SiraNumarasi"];
		
		
				$KampanyaSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM kampanyalar WHERE TemaIDsi='$GelenID' ORDER BY ID ASC LIMIT 1");
				$KampanyaSorgusuKayitSayisi	=	$KampanyaSorgusu->num_rows;				
					if($KampanyaSorgusuKayitSayisi<1){
						$KayitSil		=	$VeritabaniBaglantisi->query("DELETE FROM temalar WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
							if($KayitSil){
								unlink("Resimler/".$SilinecekKaydinMevcutBilgileriSorgusuKaydiLogosu);
								if($SilinecekKaydinMevcutBilgileriSorgusuKaydiBirinciResimDosyasiAdi!=""){
									unlink("Resimler/".$SilinecekKaydinMevcutBilgileriSorgusuKaydiBirinciResimDosyasiAdi);
								}
								if($SilinecekKaydinMevcutBilgileriSorgusuKaydiIkinciResimDosyasiAdi!=""){
									unlink("Resimler/".$SilinecekKaydinMevcutBilgileriSorgusuKaydiIkinciResimDosyasiAdi);
								}
								
								$DigerKayitlarinSiraNumaralariniGuncelle	=	$VeritabaniBaglantisi->query("UPDATE temalar SET SiraNumarasi=SiraNumarasi-1 WHERE SiraNumarasi>'$SilinecekKaydinMevcutBilgileriSorgusuKaydiSiraNumarasi' ORDER BY ID ASC");
									if(!$DigerKayitlarinSiraNumaralariniGuncelle){
										header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=205");
										exit();
									}
								
								$GenelIstatistikleriGuncelle	=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET TemaSayisi=TemaSayisi-1");
									if(!$GenelIstatistikleriGuncelle){
										header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=205");
										exit();
									}
		
								header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=204");
								exit();
							}else{
								header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=205");
								exit();
							}
					}else{
						header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=206");
						exit();
					}
			}else{
				header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=205");
				exit();
			}
	}else{
		header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=205");
		exit();
	}
}else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>