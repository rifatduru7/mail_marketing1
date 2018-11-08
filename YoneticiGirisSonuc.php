<? if(empty($_SESSION["Yonetici"])){
	$GelenKullaniciAdi			=	KullaniciAdiVeSifresiIcerikleriniFiltrele($_POST["KullaniciAdi"]);
	$GelenKullaniciSifresi		=	KullaniciAdiVeSifresiIcerikleriniFiltrele($_POST["KullaniciSifresi"]);
	
	if(($GelenKullaniciAdi!="") and ($GelenKullaniciSifresi!="")){
		$Kontrol				=	$VeritabaniBaglantisi->query("SELECT * FROM yoneticiler WHERE YoneticiKullaniciAdi='$GelenKullaniciAdi' AND YoneticiKullaniciSifresi='$GelenKullaniciSifresi' ORDER BY ID ASC LIMIT 1");
		$KontrolKayitSayisi		=	$Kontrol->num_rows;
			if($KontrolKayitSayisi>0){		
				$KontrolKaydi		=	$Kontrol->fetch_assoc();
					$KontrolKaydiID								=	$KontrolKaydi["ID"];
					$KontrolKaydiSonGirisIPsi					=	$KontrolKaydi["SonGirisIPsi"];
					$KontrolKaydiSonGirisTarihiZamanDamgasi		=	$KontrolKaydi["SonGirisTarihiZamanDamgasi"];
					$KontrolKaydiSonGirisTarihi					=	$KontrolKaydi["SonGirisTarihi"];
					$KontrolKaydiCalismaDurumu					=	$KontrolKaydi["CalismaDurumu"];
		
					if($KontrolKaydiCalismaDurumu==1){
						$KayitGuncelle		=	$VeritabaniBaglantisi->query("UPDATE yoneticiler SET GirisSayisi=GirisSayisi+1, SonGirisIPsi='$IPAdresi', SonGirisTarihiZamanDamgasi='$ZamanDamgasi', SonGirisTarihi='$TarihSaat', BirOncekiGirisIPsi='$KontrolKaydiSonGirisIPsi', BirOncekiGirisTarihiZamanDamgasi='$KontrolKaydiSonGirisTarihiZamanDamgasi', BirOncekiGirisTarihi='$KontrolKaydiSonGirisTarihi' WHERE ID='$KontrolKaydiID' AND YoneticiKullaniciAdi='$GelenKullaniciAdi' ORDER BY ID ASC LIMIT 1");
							if($KayitGuncelle){
								$_SESSION["Yonetici"]	=	$GelenKullaniciAdi;
								
								$YoneticiLoguKaydiEkle		=	$VeritabaniBaglantisi->query("INSERT INTO yoneticigirisloglari (YoneticiIDsi, GirisIPsi, GirisTarihiZamanDamgasi, GirisTarihi, CalismaDurumu) values ('$KontrolKaydiID', '$IPAdresi', '$ZamanDamgasi', '$TarihSaat', '1')");
									if($YoneticiLoguKaydiEkle){
										header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=1");
										exit();
									}else{
										header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=4");
										exit();
									}
							}else{
								header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=4");
								exit();
							}
					}else{
						header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=3");
						exit();
					}
			}else{
				header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=4");
				exit();
			}
	}else{
		header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=4");
		exit();
	}
}else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=1");
	exit();
} ?>