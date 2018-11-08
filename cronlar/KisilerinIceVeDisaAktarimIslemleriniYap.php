<?php
ob_start();
header("Content-Type:text/html; charset=UTF-8");
require_once("../Ayarlar/Ayarlar.php");
require_once("../Ayarlar/Fonksiyonlar.php");

$ZamaniBesDakikaGeriAl		=	$ZamanDamgasi - ($SaniyeHesaplamaBirDakika * 5);

/* KİŞİLERİN İÇE AKTARIM İŞLEMLERİ */
$CronHatasiIcinKisilerinIceAktarimDosyaSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM kisilericeaktarimdosyalari WHERE CronunCalismaDurumu='1' AND CronunCalismaTarihiZamanDamgasi<='$ZamaniBesDakikaGeriAl' ORDER BY ID ASC");
$CronHatasiIcinKisilerinIceAktarimDosyaSorgusuKayitSayisi	=	$CronHatasiIcinKisilerinIceAktarimDosyaSorgusu->num_rows;
	if($CronHatasiIcinKisilerinIceAktarimDosyaSorgusuKayitSayisi>0){
		$CronHatasiIcinIceAktarimKaydiniGuncelle			=	$VeritabaniBaglantisi->query("UPDATE kisilericeaktarimdosyalari SET CronunCalismaDurumu='0', CronunCalismaTarihiZamanDamgasi='0', CronunCalismaTarihi='' WHERE CronunCalismaDurumu='1' AND CronunCalismaTarihiZamanDamgasi<='$ZamaniBesDakikaGeriAl' ORDER BY ID ASC");
	}

$IceAktarimDosyalariSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM kisilericeaktarimdosyalari ORDER BY ID ASC LIMIT 1");
$IceAktarimDosyalariSorgusuKayitSayisi	=	$IceAktarimDosyalariSorgusu->num_rows;
	if($IceAktarimDosyalariSorgusuKayitSayisi>0){
		$IceAktarimDosyalariSorgusuKaydi		=	$IceAktarimDosyalariSorgusu->fetch_assoc();
		$IceAktarimDosyalariSorgusuKaydiID							=	$IceAktarimDosyalariSorgusuKaydi["ID"];
		$IceAktarimDosyalariSorgusuKaydiDosyaAdi					=	$IceAktarimDosyalariSorgusuKaydi["DosyaAdi"];
		$IceAktarimDosyalariSorgusuKaydiCronunCalismaDurumu			=	$IceAktarimDosyalariSorgusuKaydi["CronunCalismaDurumu"];

		if($IceAktarimDosyalariSorgusuKaydiCronunCalismaDurumu==0){
			$IceAktarimDosyaKaydiniGuncelle			=	$VeritabaniBaglantisi->query("UPDATE kisilericeaktarimdosyalari SET CronunCalismaDurumu='1', CronunCalismaTarihiZamanDamgasi='$ZamanDamgasi', CronunCalismaTarihi='$TarihSaat' WHERE ID='$IceAktarimDosyalariSorgusuKaydiID' ORDER BY ID ASC LIMIT 1");
			
			$IceAktarimDosyasiAc					=	fopen("../Dosyalar/".$IceAktarimDosyalariSorgusuKaydiDosyaAdi, "r");
			$IceAktarimDosyasininTumunuCozumle		=	file_get_contents("../Dosyalar/".$IceAktarimDosyalariSorgusuKaydiDosyaAdi);
			$IceAktarimDosyasiSatirSayisi			=	substr_count($IceAktarimDosyasininTumunuCozumle, "\r");
			
			if($IceAktarimDosyasiAc){
				while($IceAktarimDosyasiniCsvIcinCozumle=fgetcsv($IceAktarimDosyasiAc)){
					$IceAktarimDosyasininSatirDegeriniBul		=	$IceAktarimDosyasiniCsvIcinCozumle[0];
					$IceAktarimDosyasiSatirDegeri				=	iconv("iso-8859-9", "utf-8", $IceAktarimDosyasininSatirDegeriniBul);
					$IceAktarimDosyasiSatirDegeriniDiziYap		=	explode(";", $IceAktarimDosyasiSatirDegeri);

					$IceAktarimDosyasiSatirDegeriDizisi							=	array();
					$IceAktarimDosyasiSatirDegeriAnahtarAdiIcinSiraNumarasi		=	1;
					
					foreach($IceAktarimDosyasiSatirDegeriniDiziYap as $IceAktarimDosyasiOlusanSatirDegeri){
						if($IceAktarimDosyasiSatirDegeriAnahtarAdiIcinSiraNumarasi==1){
							$IceAktarimDosyasiSatirDegeriIcinAnahtarAdi		=	"Adi";
						}elseif($IceAktarimDosyasiSatirDegeriAnahtarAdiIcinSiraNumarasi==2){
							$IceAktarimDosyasiSatirDegeriIcinAnahtarAdi		=	"Soyadi";
						}elseif($IceAktarimDosyasiSatirDegeriAnahtarAdiIcinSiraNumarasi==3){
							$IceAktarimDosyasiSatirDegeriIcinAnahtarAdi		=	"EMailAdresi";
						}elseif($IceAktarimDosyasiSatirDegeriAnahtarAdiIcinSiraNumarasi==4){
							$IceAktarimDosyasiSatirDegeriIcinAnahtarAdi		=	"Telefonu";
						}elseif($IceAktarimDosyasiSatirDegeriAnahtarAdiIcinSiraNumarasi==5){
							$IceAktarimDosyasiSatirDegeriIcinAnahtarAdi		=	"CepTelefonu";
						}elseif($IceAktarimDosyasiSatirDegeriAnahtarAdiIcinSiraNumarasi==6){
							$IceAktarimDosyasiSatirDegeriIcinAnahtarAdi		=	"Cinsiyeti";
						}elseif($IceAktarimDosyasiSatirDegeriAnahtarAdiIcinSiraNumarasi==7){
							$IceAktarimDosyasiSatirDegeriIcinAnahtarAdi		=	"VIPDurumu";
						}elseif($IceAktarimDosyasiSatirDegeriAnahtarAdiIcinSiraNumarasi==8){
							$IceAktarimDosyasiSatirDegeriIcinAnahtarAdi		=	"Adresi";
						}elseif($IceAktarimDosyasiSatirDegeriAnahtarAdiIcinSiraNumarasi==9){
							$IceAktarimDosyasiSatirDegeriIcinAnahtarAdi		=	"PostaKodu";
						}elseif($IceAktarimDosyasiSatirDegeriAnahtarAdiIcinSiraNumarasi==10){
							$IceAktarimDosyasiSatirDegeriIcinAnahtarAdi		=	"Ilcesi";
						}elseif($IceAktarimDosyasiSatirDegeriAnahtarAdiIcinSiraNumarasi==11){
							$IceAktarimDosyasiSatirDegeriIcinAnahtarAdi		=	"Sehri";
						}elseif($IceAktarimDosyasiSatirDegeriAnahtarAdiIcinSiraNumarasi==12){
							$IceAktarimDosyasiSatirDegeriIcinAnahtarAdi		=	"Ulkesi";
						}elseif($IceAktarimDosyasiSatirDegeriAnahtarAdiIcinSiraNumarasi==13){
							$IceAktarimDosyasiSatirDegeriIcinAnahtarAdi		=	"WebSitesiAdresi";
						}elseif($IceAktarimDosyasiSatirDegeriAnahtarAdiIcinSiraNumarasi==14){
							$IceAktarimDosyasiSatirDegeriIcinAnahtarAdi		=	"FacebookProfilSayfasiAdresi";
						}elseif($IceAktarimDosyasiSatirDegeriAnahtarAdiIcinSiraNumarasi==15){
							$IceAktarimDosyasiSatirDegeriIcinAnahtarAdi		=	"TwitterProfilSayfasiAdresi";
						}elseif($IceAktarimDosyasiSatirDegeriAnahtarAdiIcinSiraNumarasi==16){
							$IceAktarimDosyasiSatirDegeriIcinAnahtarAdi		=	"Aciklama";
						}
						
						$IceAktarimDosyasiSatirDegeriDizisi[$IceAktarimDosyasiSatirDegeriIcinAnahtarAdi]	=	$IceAktarimDosyasiOlusanSatirDegeri;
						$IceAktarimDosyasiSatirDegeriAnahtarAdiIcinSiraNumarasi++;
					}
					
					if($IceAktarimDosyasiSatirDegeriDizisi["Adi"]!=""){
						$IceAktarimDosyasiSatirAdiDegeri		=	HerKelimeninIlkHarfiniBuyukYap(HarfliVeSayiliIcerikleriFiltrele($IceAktarimDosyasiSatirDegeriDizisi["Adi"]));
					}else{
						$IceAktarimDosyasiSatirAdiDegeri		=	"";
					}
				
					if($IceAktarimDosyasiSatirDegeriDizisi["Soyadi"]!=""){
						$IceAktarimDosyasiSatirSoyadiDegeri			=	HerKelimeninIlkHarfiniBuyukYap(HarfliVeSayiliIcerikleriFiltrele($IceAktarimDosyasiSatirDegeriDizisi["Soyadi"]));
					}else{
						$IceAktarimDosyasiSatirSoyadiDegeri			=	"";
					}
				
					if($IceAktarimDosyasiSatirDegeriDizisi["EMailAdresi"]!=""){
						$IceAktarimDosyasiSatirEMailAdresiDegeri			=	EMailliIcerikleriFiltrele($IceAktarimDosyasiSatirDegeriDizisi["EMailAdresi"]);
							if(!filter_var($IceAktarimDosyasiSatirEMailAdresiDegeri, FILTER_VALIDATE_EMAIL)){
								$IceAktarimDosyasiSatirEMailAdresiDegeri	=	"";
							}
					}else{
						$IceAktarimDosyasiSatirEMailAdresiDegeri			=	"";
					}
				
					if($IceAktarimDosyasiSatirDegeriDizisi["Telefonu"]!=""){
						$IceAktarimDosyasiSatirTelefonuDegeri					=	TelefonluIcerikleriFiltrele($IceAktarimDosyasiSatirDegeriDizisi["Telefonu"]);
							$IceAktarimDosyasiSatirTelefonuDegeriUzunlugu		=	strlen($IceAktarimDosyasiSatirTelefonuDegeri);
								if($IceAktarimDosyasiSatirTelefonuDegeriUzunlugu!=10){
									$IceAktarimDosyasiSatirTelefonuDegeri		=	"";
								}
					}else{
						$IceAktarimDosyasiSatirTelefonuDegeri					=	"";
					}
				
					if($IceAktarimDosyasiSatirDegeriDizisi["CepTelefonu"]!=""){
						$IceAktarimDosyasiSatirCepTelefonuDegeri				=	TelefonluIcerikleriFiltrele($IceAktarimDosyasiSatirDegeriDizisi["CepTelefonu"]);
							$IceAktarimDosyasiSatirCepTelefonuDegeriUzunlugu	=	strlen($IceAktarimDosyasiSatirCepTelefonuDegeri);
								if($IceAktarimDosyasiSatirCepTelefonuDegeriUzunlugu!=10){
									$IceAktarimDosyasiSatirCepTelefonuDegeri	=	"";
								}
					}else{
						$IceAktarimDosyasiSatirCepTelefonuDegeri				=	"";
					}

					if($IceAktarimDosyasiSatirDegeriDizisi["Cinsiyeti"]!=""){
						$IceAktarimDosyasiSatirCinsiyetiDegeri				=	IceriginIlkHarfiniBuyukYap(HarfliVeSayiliIcerikleriFiltrele($IceAktarimDosyasiSatirDegeriDizisi["Cinsiyeti"]));
							if(($IceAktarimDosyasiSatirCinsiyetiDegeri!="Erkek") and ($IceAktarimDosyasiSatirCinsiyetiDegeri!="Kadın")){
								$IceAktarimDosyasiSatirCinsiyetiDegeri		=	"";
							}
					}else{
						$IceAktarimDosyasiSatirCinsiyetiDegeri				=	"";
					}

					if($IceAktarimDosyasiSatirDegeriDizisi["VIPDurumu"]!=""){
						$IceAktarimDosyasiSatirVIPDurumuDegeri		=	IngilizceyeGoreKucukHarfBuyukHarfDegistir(HarfliVeSayiliIcerikleriFiltrele($IceAktarimDosyasiSatirDegeriDizisi["VIPDurumu"]));
							if($IceAktarimDosyasiSatirVIPDurumuDegeri=="VIP"){
								$IceAktarimDosyasiSatirVIPDurumuDegeri		=	1;
							}else{
								$IceAktarimDosyasiSatirVIPDurumuDegeri		=	0;
							}
					}else{
						$IceAktarimDosyasiSatirVIPDurumuDegeri				=	0;
					}
			
					if($IceAktarimDosyasiSatirDegeriDizisi["Adresi"]!=""){
						$IceAktarimDosyasiSatirAdresiDegeri			=	IceriginIlkHarfiniBuyukYap(HarfliVeSayiliIcerikleriFiltrele($IceAktarimDosyasiSatirDegeriDizisi["Adresi"]));
					}else{
						$IceAktarimDosyasiSatirAdresiDegeri			=	"";
					}
			
					if($IceAktarimDosyasiSatirDegeriDizisi["PostaKodu"]!=""){
						$IceAktarimDosyasiSatirPostaKoduDegeri			=	SayiliIcerikleriFiltrele($IceAktarimDosyasiSatirDegeriDizisi["PostaKodu"]);
					}else{
						$IceAktarimDosyasiSatirPostaKoduDegeri			=	0;
					}
			
					if($IceAktarimDosyasiSatirDegeriDizisi["Ilcesi"]!=""){
						$IceAktarimDosyasiSatirIlcesiDegeri			=	HerKelimeninIlkHarfiniBuyukYap(HarfliVeSayiliIcerikleriFiltrele($IceAktarimDosyasiSatirDegeriDizisi["Ilcesi"]));
					}else{
						$IceAktarimDosyasiSatirIlcesiDegeri			=	"";
					}
			
					if($IceAktarimDosyasiSatirDegeriDizisi["Sehri"]!=""){
						$IceAktarimDosyasiSatirSehriDegeri			=	HerKelimeninIlkHarfiniBuyukYap(HarfliVeSayiliIcerikleriFiltrele($IceAktarimDosyasiSatirDegeriDizisi["Sehri"]));
						$IceAktarimKayitIslemiIcinSehirSorgusu					=	$VeritabaniBaglantisi->query("SELECT * FROM sehirler WHERE SehirAdi='$IceAktarimDosyasiSatirSehriDegeri' ORDER BY ID ASC LIMIT 1");
						$IceAktarimKayitIslemiIcinSehirSorgusuKayitSayisi		=	$IceAktarimKayitIslemiIcinSehirSorgusu->num_rows;
							if($IceAktarimKayitIslemiIcinSehirSorgusuKayitSayisi>0){
								$IceAktarimKayitIslemiIcinSehirSorgusuKaydi		=	$IceAktarimKayitIslemiIcinSehirSorgusu->fetch_assoc();
									$IceAktarimKayitIslemiIcinSehirSorgusuKaydiID		=	$IceAktarimKayitIslemiIcinSehirSorgusuKaydi["ID"];
										$IceAktarimDosyasiSatirSehriDegeri		=	$IceAktarimKayitIslemiIcinSehirSorgusuKaydiID;
							}else{
								$IceAktarimDosyasiSatirSehriDegeri			=	0;
							}
					}else{
						$IceAktarimDosyasiSatirSehriDegeri			=	0;
					}

					if($IceAktarimDosyasiSatirDegeriDizisi["Ulkesi"]!=""){
						$IceAktarimDosyasiSatirUlkesiDegeri			=	HerKelimeninIlkHarfiniBuyukYap(HarfliVeSayiliIcerikleriFiltrele($IceAktarimDosyasiSatirDegeriDizisi["Ulkesi"]));
						$IceAktarimKayitIslemiIcinUlkeSorgusu					=	$VeritabaniBaglantisi->query("SELECT * FROM ulkeler WHERE UlkeAdi='$IceAktarimDosyasiSatirUlkesiDegeri' ORDER BY ID ASC LIMIT 1");
						$IceAktarimKayitIslemiIcinUlkeSorgusuKayitSayisi		=	$IceAktarimKayitIslemiIcinUlkeSorgusu->num_rows;
							if($IceAktarimKayitIslemiIcinUlkeSorgusuKayitSayisi>0){
								$IceAktarimKayitIslemiIcinUlkeSorgusuKaydi		=	$IceAktarimKayitIslemiIcinUlkeSorgusu->fetch_assoc();
									$IceAktarimKayitIslemiIcinUlkeSorgusuKaydiID		=	$IceAktarimKayitIslemiIcinUlkeSorgusuKaydi["ID"];
										$IceAktarimDosyasiSatirUlkesiDegeri		=	$IceAktarimKayitIslemiIcinUlkeSorgusuKaydiID;
							}else{
								$IceAktarimDosyasiSatirUlkesiDegeri			=	0;
							}
					}else{
						$IceAktarimDosyasiSatirUlkesiDegeri			=	0;
					}
				
					if($IceAktarimDosyasiSatirDegeriDizisi["WebSitesiAdresi"]!=""){
						$IceAktarimDosyasiSatirWebSitesiAdresiDegeri			=	LinkliIcerikleriFiltrele($IceAktarimDosyasiSatirDegeriDizisi["WebSitesiAdresi"]);
						$IceAktarimDosyasiSatirWebSitesiAdresiDegeriKontrol		=	LinkDogrulugunuOnEkZorunluKontrolEt($IceAktarimDosyasiSatirWebSitesiAdresiDegeri);
							if($IceAktarimDosyasiSatirWebSitesiAdresiDegeriKontrol!=1){
								$IceAktarimDosyasiSatirWebSitesiAdresiDegeri	=	"";
							}
					}else{
						$IceAktarimDosyasiSatirWebSitesiAdresiDegeri			=	"";
					}
					
					if($IceAktarimDosyasiSatirDegeriDizisi["FacebookProfilSayfasiAdresi"]!=""){
						$IceAktarimDosyasiSatirFacebookProfilSayfasiAdresiDegeri			=	LinkliIcerikleriFiltrele($IceAktarimDosyasiSatirDegeriDizisi["FacebookProfilSayfasiAdresi"]);
						$IceAktarimDosyasiSatirFacebookProfilSayfasiAdresiDegeriKontrol		=	LinkDogrulugunuOnEkZorunluKontrolEt($IceAktarimDosyasiSatirFacebookProfilSayfasiAdresiDegeri);
							if($IceAktarimDosyasiSatirFacebookProfilSayfasiAdresiDegeriKontrol!=1){
								$IceAktarimDosyasiSatirFacebookProfilSayfasiAdresiDegeri	=	"";
							}
					}else{
						$IceAktarimDosyasiSatirFacebookProfilSayfasiAdresiDegeri			=	"";
					}
					
					if($IceAktarimDosyasiSatirDegeriDizisi["TwitterProfilSayfasiAdresi"]!=""){
						$IceAktarimDosyasiSatirTwitterProfilSayfasiAdresiDegeri				=	LinkliIcerikleriFiltrele($IceAktarimDosyasiSatirDegeriDizisi["TwitterProfilSayfasiAdresi"]);
						$IceAktarimDosyasiSatirTwitterProfilSayfasiAdresiDegeriKontrol		=	LinkDogrulugunuOnEkZorunluKontrolEt($IceAktarimDosyasiSatirTwitterProfilSayfasiAdresiDegeri);
							if($IceAktarimDosyasiSatirTwitterProfilSayfasiAdresiDegeriKontrol!=1){
								$IceAktarimDosyasiSatirTwitterProfilSayfasiAdresiDegeri		=	"";
							}
					}else{
						$IceAktarimDosyasiSatirTwitterProfilSayfasiAdresiDegeri				=	"";
					}
				
					if($IceAktarimDosyasiSatirDegeriDizisi["Aciklama"]!=""){
						$IceAktarimDosyasiSatirAciklamaDegeri			=	HarfliVeSayiliIcerikleriFiltrele($IceAktarimDosyasiSatirDegeriDizisi["Aciklama"]);
					}else{
						$IceAktarimDosyasiSatirAciklamaDegeri			=	"";
					}
					
					if(($IceAktarimDosyasiSatirEMailAdresiDegeri!="") and (filter_var($IceAktarimDosyasiSatirEMailAdresiDegeri, FILTER_VALIDATE_EMAIL))){
						$IceAktarimDosyasiIcinEsKayitKontrolSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM kisiler WHERE EMailAdresi='$IceAktarimDosyasiSatirEMailAdresiDegeri' ORDER BY ID ASC LIMIT 1");
						$IceAktarimDosyasiIcinEsKayitKontrolSorgusuKayitSayisi	=	$IceAktarimDosyasiIcinEsKayitKontrolSorgusu->num_rows;
							if($IceAktarimDosyasiIcinEsKayitKontrolSorgusuKayitSayisi<1){
								$KayitEkle		=	$VeritabaniBaglantisi->query("INSERT INTO kisiler (Adi, Soyadi, EMailAdresi, Telefonu, CepTelefonu, Cinsiyeti, VIPDurumu, Adresi, PostaKodu, Ilcesi, Sehri, Ulkesi, WebSitesiAdresi, FacebookProfilSayfasiAdresi, TwitterProfilSayfasiAdresi, Aciklama, EklenmeTuru, EklenmeTarihiZamanDamgasi, EklenmeTarihi) values ('$IceAktarimDosyasiSatirAdiDegeri', '$IceAktarimDosyasiSatirSoyadiDegeri', '$IceAktarimDosyasiSatirEMailAdresiDegeri', '$IceAktarimDosyasiSatirTelefonuDegeri', '$IceAktarimDosyasiSatirCepTelefonuDegeri', '$IceAktarimDosyasiSatirCinsiyetiDegeri', '$IceAktarimDosyasiSatirVIPDurumuDegeri', '$IceAktarimDosyasiSatirAdresiDegeri', '$IceAktarimDosyasiSatirPostaKoduDegeri', '$IceAktarimDosyasiSatirIlcesiDegeri', '$IceAktarimDosyasiSatirSehriDegeri', '$IceAktarimDosyasiSatirUlkesiDegeri', '$IceAktarimDosyasiSatirWebSitesiAdresiDegeri', '$IceAktarimDosyasiSatirFacebookProfilSayfasiAdresiDegeri', '$IceAktarimDosyasiSatirTwitterProfilSayfasiAdresiDegeri', '$IceAktarimDosyasiSatirAciklamaDegeri', 'Dosya', '$ZamanDamgasi', '$TarihSaat')");
								
								$IceAktarimDosyasiIcinGenelIstatistikleriGuncelle	=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET KisiSayisi=KisiSayisi+1");
							}
					}
					
					unset($IceAktarimDosyasiSatirAdiDegeri, $IceAktarimDosyasiSatirSoyadiDegeri, $IceAktarimDosyasiSatirEMailAdresiDegeri, $IceAktarimDosyasiSatirTelefonuDegeri, $IceAktarimDosyasiSatirCepTelefonuDegeri, $IceAktarimDosyasiSatirCinsiyetiDegeri, $IceAktarimDosyasiSatirVIPDurumuDegeri, $IceAktarimDosyasiSatirAdresiDegeri, $IceAktarimDosyasiSatirPostaKoduDegeri, $IceAktarimDosyasiSatirIlcesiDegeri, $IceAktarimDosyasiSatirSehriDegeri, $IceAktarimDosyasiSatirUlkesiDegeri, $IceAktarimDosyasiSatirWebSitesiAdresiDegeri, $IceAktarimDosyasiSatirFacebookProfilSayfasiAdresiDegeri, $IceAktarimDosyasiSatirTwitterProfilSayfasiAdresiDegeri, $IceAktarimDosyasiSatirAciklamaDegeri);
				}
				
				fclose($IceAktarimDosyasiAc);
				unlink("../Dosyalar/".$IceAktarimDosyalariSorgusuKaydiDosyaAdi);
				$IceAktarimDosyasiKaydiSil		=	$VeritabaniBaglantisi->query("DELETE FROM kisilericeaktarimdosyalari WHERE ID='$IceAktarimDosyalariSorgusuKaydiID' ORDER BY ID ASC LIMIT 1");
					if($IceAktarimDosyasiKaydiSil){
						$IceAktarimDosyasiIcinGenelIstatistikleriGuncelle		=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET BekleyenIceAktarimIslemSayisi=BekleyenIceAktarimIslemSayisi-1");
					}
					exit();
			}else{
				unlink("../Dosyalar/".$IceAktarimDosyalariSorgusuKaydiDosyaAdi);
				$IceAktarimDosyasiKaydiSil		=	$VeritabaniBaglantisi->query("DELETE FROM kisilericeaktarimdosyalari WHERE ID='$IceAktarimDosyalariSorgusuKaydiID' ORDER BY ID ASC LIMIT 1");
					if($IceAktarimDosyasiKaydiSil){
						$IceAktarimDosyasiIcinGenelIstatistikleriGuncelle		=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET BekleyenIceAktarimIslemSayisi=BekleyenIceAktarimIslemSayisi-1");
					}
			}
		}else{
			exit();
		}
	}
/* KİŞİLERİN İÇE AKTARIM İŞLEMLERİ */

/* KİŞİLERİN DIŞA AKTARIM İŞLEMLERİ */
$CronHatasiIcinKisilerinDisaAktarimDosyaSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM kisilerdisaaktarimdosyalari WHERE CronunCalismaDurumu='1' AND CronunCalismaTarihiZamanDamgasi<='$ZamaniBesDakikaGeriAl' ORDER BY ID ASC");
$CronHatasiIcinKisilerinDisaAktarimDosyaSorgusuKayitSayisi	=	$CronHatasiIcinKisilerinDisaAktarimDosyaSorgusu->num_rows;
	if($CronHatasiIcinKisilerinDisaAktarimDosyaSorgusuKayitSayisi>0){
		$CronHatasiIcinDisaAktarimKaydiniGuncelle			=	$VeritabaniBaglantisi->query("UPDATE kisilerdisaaktarimdosyalari SET CronunCalismaDurumu='0', CronunCalismaTarihiZamanDamgasi='0', CronunCalismaTarihi='' WHERE CronunCalismaDurumu='1' AND CronunCalismaTarihiZamanDamgasi<='$ZamaniBesDakikaGeriAl' ORDER BY ID ASC");
	}

$DisaAktarimSorgusu					=	$VeritabaniBaglantisi->query("SELECT * FROM kisilerdisaaktarimdosyalari WHERE TamamlanmaDurumu='0' ORDER BY ID ASC LIMIT 1");
$DisaAktarimSorgusuKayitSayisi		=	$DisaAktarimSorgusu->num_rows;
	if($DisaAktarimSorgusuKayitSayisi>0){
		$DisaAktarimSorgusuKaydi		=	$DisaAktarimSorgusu->fetch_assoc();
		$DisaAktarimSorgusuKaydiID											=	$DisaAktarimSorgusuKaydi["ID"];
		$DisaAktarimSorgusuKaydiFiltreIcinAdi								=	$DisaAktarimSorgusuKaydi["FiltreIcinAdi"];
		$DisaAktarimSorgusuKaydiFiltreIcinSoyadi							=	$DisaAktarimSorgusuKaydi["FiltreIcinSoyadi"];
		$DisaAktarimSorgusuKaydiFiltreIcinEMailAdresi						=	$DisaAktarimSorgusuKaydi["FiltreIcinEMailAdresi"];
		$DisaAktarimSorgusuKaydiFiltreIcinTelefonu							=	$DisaAktarimSorgusuKaydi["FiltreIcinTelefonu"];
		$DisaAktarimSorgusuKaydiFiltreIcinCepTelefonu						=	$DisaAktarimSorgusuKaydi["FiltreIcinCepTelefonu"];
		$DisaAktarimSorgusuKaydiFiltreIcinCinsiyeti							=	$DisaAktarimSorgusuKaydi["FiltreIcinCinsiyeti"];
		$DisaAktarimSorgusuKaydiFiltreIcinVIPDurumu							=	$DisaAktarimSorgusuKaydi["FiltreIcinVIPDurumu"];
		$DisaAktarimSorgusuKaydiFiltreIcinFiltreIcinAdresi					=	$DisaAktarimSorgusuKaydi["FiltreIcinAdresi"];
		$DisaAktarimSorgusuKaydiFiltreIcinPostaKodu							=	$DisaAktarimSorgusuKaydi["FiltreIcinPostaKodu"];
		$DisaAktarimSorgusuKaydiFiltreIcinIlcesi							=	$DisaAktarimSorgusuKaydi["FiltreIcinIlcesi"];
		$DisaAktarimSorgusuKaydiFiltreIcinSehri								=	$DisaAktarimSorgusuKaydi["FiltreIcinSehri"];
		$DisaAktarimSorgusuKaydiFiltreIcinUlkesi							=	$DisaAktarimSorgusuKaydi["FiltreIcinUlkesi"];
		$DisaAktarimSorgusuKaydiFiltreIcinWebSitesiAdresi					=	$DisaAktarimSorgusuKaydi["FiltreIcinWebSitesiAdresi"];
		$DisaAktarimSorgusuKaydiFiltreIcinFacebookProfilSayfasiAdresi		=	$DisaAktarimSorgusuKaydi["FiltreIcinFacebookProfilSayfasiAdresi"];
		$DisaAktarimSorgusuKaydiFiltreIcinTwitterProfilSayfasiAdresi		=	$DisaAktarimSorgusuKaydi["FiltreIcinTwitterProfilSayfasiAdresi"];
		$DisaAktarimSorgusuKaydiBaslik										=	$DisaAktarimSorgusuKaydi["Baslik"];
		$DisaAktarimSorgusuKaydiDosyaAdi									=	$DisaAktarimSorgusuKaydi["DosyaAdi"];
			$DisaAktarimSorgusuKaydiDosyaAdiKes				=	substr($DisaAktarimSorgusuKaydiDosyaAdi, 0, -4);
		$DisaAktarimSorgusuKaydiDosyaKayitSayisiLimiti						=	$DisaAktarimSorgusuKaydi["DosyaKayitSayisiLimiti"];
		$DisaAktarimSorgusuKaydiDosyaSayisi									=	$DisaAktarimSorgusuKaydi["DosyaSayisi"];
		$DisaAktarimSorgusuKaydiSonIslenenKayitIDsi							=	$DisaAktarimSorgusuKaydi["SonIslenenKayitIDsi"];
		$DisaAktarimSorgusuKaydiCronunCalismaDurumu							=	$DisaAktarimSorgusuKaydi["CronunCalismaDurumu"];

		if($DisaAktarimSorgusuKaydiCronunCalismaDurumu==0){
			$DisaAktarimDosyaKaydiniGuncelle			=	$VeritabaniBaglantisi->query("UPDATE kisilerdisaaktarimdosyalari SET CronunCalismaDurumu='1', CronunCalismaTarihiZamanDamgasi='$ZamanDamgasi', CronunCalismaTarihi='$TarihSaat' WHERE ID='$DisaAktarimSorgusuKaydiID' ORDER BY ID ASC LIMIT 1");

			$DisaAktarimIcinSorguKosulu			=	"";

			if($DisaAktarimSorgusuKaydiFiltreIcinAdi!=""){
				$DisaAktarimIcinSorguKosulu		.=	" AND Adi LIKE '%$DisaAktarimSorgusuKaydiFiltreIcinAdi%'";
			}

			if($DisaAktarimSorgusuKaydiFiltreIcinSoyadi!=""){
				$DisaAktarimIcinSorguKosulu		.=	" AND Soyadi LIKE '%$DisaAktarimSorgusuKaydiFiltreIcinSoyadi%'";
			}

			if($DisaAktarimSorgusuKaydiFiltreIcinEMailAdresi!=""){
				$DisaAktarimIcinSorguKosulu		.=	" AND EMailAdresi LIKE '%$DisaAktarimSorgusuKaydiFiltreIcinEMailAdresi%'";
			}

			if($DisaAktarimSorgusuKaydiFiltreIcinTelefonu!=""){
				$DisaAktarimIcinSorguKosulu		.=	" AND Telefonu LIKE '%$DisaAktarimSorgusuKaydiFiltreIcinTelefonu%'";
			}

			if($DisaAktarimSorgusuKaydiFiltreIcinCepTelefonu!=""){
				$DisaAktarimIcinSorguKosulu		.=	" AND CepTelefonu LIKE '%$DisaAktarimSorgusuKaydiFiltreIcinCepTelefonu%'";
			}

			if($DisaAktarimSorgusuKaydiFiltreIcinCinsiyeti!="Tümü"){
				if($DisaAktarimSorgusuKaydiFiltreIcinCinsiyeti=="Erkek"){
					$DisaAktarimIcinSorguKosulu		.=	" AND Cinsiyeti='Erkek'";
				}else{
					$DisaAktarimIcinSorguKosulu		.=	" AND Cinsiyeti='Kadın'";
				}
			}

			if($DisaAktarimSorgusuKaydiFiltreIcinVIPDurumu!=2){
				if($DisaAktarimSorgusuKaydiFiltreIcinVIPDurumu==1){
					$DisaAktarimIcinSorguKosulu		.=	" AND VIPDurumu='1'";
				}else{
					$DisaAktarimIcinSorguKosulu		.=	" AND VIPDurumu='0'";
				}
			}

			if(($DisaAktarimSorgusuKaydiFiltreIcinUlkesi!="") and ($DisaAktarimSorgusuKaydiFiltreIcinUlkesi!=0)){
				$DisaAktarimIcinSorguKosulu		.=	" AND Ulkesi='$DisaAktarimSorgusuKaydiFiltreIcinUlkesi'";
			}

			if(($DisaAktarimSorgusuKaydiFiltreIcinSehri!="") and ($DisaAktarimSorgusuKaydiFiltreIcinSehri!=0)){
				$DisaAktarimIcinSorguKosulu		.=	" AND Sehri='$DisaAktarimSorgusuKaydiFiltreIcinSehri'";
			}

			if($DisaAktarimSorgusuKaydiFiltreIcinIlcesi!=""){
				$DisaAktarimIcinSorguKosulu		.=	" AND Ilcesi LIKE '%$DisaAktarimSorgusuKaydiFiltreIcinIlcesi%'";
			}

			if(($DisaAktarimSorgusuKaydiFiltreIcinPostaKodu!="") and ($DisaAktarimSorgusuKaydiFiltreIcinPostaKodu!=0)){
				$DisaAktarimIcinSorguKosulu		.=	" AND PostaKodu LIKE '%$DisaAktarimSorgusuKaydiFiltreIcinPostaKodu%'";
			}

			if($DisaAktarimSorgusuKaydiFiltreIcinFiltreIcinAdresi!=""){
				$DisaAktarimIcinSorguKosulu		.=	" AND Adresi LIKE '%$DisaAktarimSorgusuKaydiFiltreIcinFiltreIcinAdresi%'";
			}

			if($DisaAktarimSorgusuKaydiFiltreIcinWebSitesiAdresi!=""){
				$DisaAktarimIcinSorguKosulu		.=	" AND WebSitesiAdresi LIKE '%$DisaAktarimSorgusuKaydiFiltreIcinWebSitesiAdresi%'";
			}

			if($DisaAktarimSorgusuKaydiFiltreIcinFacebookProfilSayfasiAdresi!=""){
				$DisaAktarimIcinSorguKosulu		.=	" AND FacebookProfilSayfasiAdresi LIKE '%$DisaAktarimSorgusuKaydiFiltreIcinFacebookProfilSayfasiAdresi%'";
			}

			if($DisaAktarimSorgusuKaydiFiltreIcinTwitterProfilSayfasiAdresi!=""){
				$DisaAktarimIcinSorguKosulu		.=	" AND TwitterProfilSayfasiAdresi LIKE '%$DisaAktarimSorgusuKaydiFiltreIcinTwitterProfilSayfasiAdresi%'";
			}
			
			$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM kisiler WHERE ID>$DisaAktarimSorgusuKaydiSonIslenenKayitIDsi $DisaAktarimIcinSorguKosulu ORDER BY ID ASC LIMIT $SiteAyarlariKaydiKisilerSayfasiDisaAktarimKayitSayisiLimiti");
			$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitSayisi	=	$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusu->num_rows;
				if($DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitSayisi>0){
					$DisaAktarimIslemiIcinYeniDosyaYoluVeAdiOlustur		=	"../Dosyalar/".$DisaAktarimSorgusuKaydiDosyaAdiKes."_".($DisaAktarimSorgusuKaydiDosyaSayisi+1).".csv";
					
					$DisaAktarimIslemiIcinDosyaIcerigiOlustur			=	"ADI;SOYADI;EMAIL ADRESİ;TELEFONU;CEP TELEFONU;CİNSİYETİ;VIP DURUMU;ADRESİ;POSTA KODU;İLÇESİ;ŞEHRİ;ÜLKESİ;WEB SİTESİ ADRESİ;FACEBOOK PROFİL SAYFASI ADRESİ;TWITTER PROFİL SAYFASI ADRESİ;EK AÇIKLAMA\r";
					
					while($DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlari=$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusu->fetch_assoc()){
						$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariID						=	$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlari["ID"];
						$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariAdi						=	$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlari["Adi"];
							$DisaAktarimIslemiIcinDosyaIcerigiOlustur								.=	$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariAdi.";";
						$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariSoyadi					=	$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlari["Soyadi"];
							$DisaAktarimIslemiIcinDosyaIcerigiOlustur								.=	$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariSoyadi.";";
						$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariEMailAdresi				=	$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlari["EMailAdresi"];
							$DisaAktarimIslemiIcinDosyaIcerigiOlustur								.=	$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariEMailAdresi.";";
						$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariTelefonu					=	$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlari["Telefonu"];
							if($DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariTelefonu!=""){
								$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariTelefonu				=	TelefonYaz($DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariTelefonu);
							}else{
								$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariTelefonu				=	"";
							}
							$DisaAktarimIslemiIcinDosyaIcerigiOlustur								.=	$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariTelefonu.";";
						$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariCepTelefonu					=	$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlari["CepTelefonu"];
							if($DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariCepTelefonu!=""){
								$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariCepTelefonu			=	TelefonYaz($DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariCepTelefonu);
							}else{
								$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariCepTelefonu			=	"";
							}
							$DisaAktarimIslemiIcinDosyaIcerigiOlustur								.=	$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariCepTelefonu.";";
						$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariCinsiyeti				=	$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlari["Cinsiyeti"];
							$DisaAktarimIslemiIcinDosyaIcerigiOlustur								.=	$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariCinsiyeti.";";						
						$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariVIPDurumu				=	$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlari["VIPDurumu"];
							if($DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariVIPDurumu==1){
								$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariVIPDurumuYaz				=	"VIP";
							}else{
								$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariVIPDurumuYaz				=	"Standart";
							}
						
							$DisaAktarimIslemiIcinDosyaIcerigiOlustur								.=	$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariVIPDurumuYaz.";";						
						$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariAdresi					=	$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlari["Adresi"];
							$DisaAktarimIslemiIcinDosyaIcerigiOlustur								.=	$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariAdresi.";";						
						$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariPostaKodu				=	$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlari["PostaKodu"];
							if($DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariPostaKodu==0){
								$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariPostaKodu		=	"";
							}
							$DisaAktarimIslemiIcinDosyaIcerigiOlustur								.=	$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariPostaKodu.";";				
						$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariIlcesi					=	$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlari["Ilcesi"];
							$DisaAktarimIslemiIcinDosyaIcerigiOlustur								.=	$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariIlcesi.";";				
						
						$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariSehri					=	$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlari["Sehri"];
							if($DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariSehri!=0){
								$DisaAktarimIslemiIcinKisiSehirSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM sehirler WHERE ID='$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariSehri' ORDER BY ID ASC LIMIT 1");
								$DisaAktarimIslemiIcinKisiSehirSorgusuKayitSayisi	=	$DisaAktarimIslemiIcinKisiSehirSorgusu->num_rows;
									if($DisaAktarimIslemiIcinKisiSehirSorgusuKayitSayisi>0){
										$DisaAktarimIslemiIcinKisiSehirSorgusuKaydi		=	$DisaAktarimIslemiIcinKisiSehirSorgusu->fetch_assoc();
											$DisaAktarimIslemiIcinKisiSehirSorgusuKaydiSehirAdi		=	$DisaAktarimIslemiIcinKisiSehirSorgusuKaydi["SehirAdi"];
												$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariSehriYaz			=	$DisaAktarimIslemiIcinKisiSehirSorgusuKaydiSehirAdi;
									}else{
										$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariSehriYaz			=	"";
									}
							}else{
								$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariSehriYaz			=	"";
							}
							$DisaAktarimIslemiIcinDosyaIcerigiOlustur								.=	$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariSehriYaz.";";				
						$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariUlkesi					=	$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlari["Ulkesi"];
							if($DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariUlkesi!=0){
								$DisaAktarimIslemiIcinKisiUlkeSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM ulkeler WHERE ID='$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariUlkesi' ORDER BY ID ASC LIMIT 1");
								$DisaAktarimIslemiIcinKisiUlkeSorgusuKayitSayisi	=	$DisaAktarimIslemiIcinKisiUlkeSorgusu->num_rows;
									if($DisaAktarimIslemiIcinKisiUlkeSorgusuKayitSayisi>0){
										$DisaAktarimIslemiIcinKisiUlkeSorgusuKaydi		=	$DisaAktarimIslemiIcinKisiUlkeSorgusu->fetch_assoc();								
											$DisaAktarimIslemiIcinKisiUlkeSorgusuKaydiUlkeAdi		=	$DisaAktarimIslemiIcinKisiUlkeSorgusuKaydi["UlkeAdi"];
												$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariUlkesiYaz			=	$DisaAktarimIslemiIcinKisiUlkeSorgusuKaydiUlkeAdi;
									}else{
										$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariUlkesiYaz			=	"";
									}
							}else{
								$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariUlkesiYaz			=	"";
							}
							$DisaAktarimIslemiIcinDosyaIcerigiOlustur								.=	$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariUlkesiYaz.";";				
						$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariWebSitesiAdresi			=	$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlari["WebSitesiAdresi"];
							$DisaAktarimIslemiIcinDosyaIcerigiOlustur								.=	$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariWebSitesiAdresi.";";
						$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariFacebookProfilSayfasiAdresi		=	$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlari["FacebookProfilSayfasiAdresi"];
							$DisaAktarimIslemiIcinDosyaIcerigiOlustur								.=	$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariFacebookProfilSayfasiAdresi.";";
						$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariTwitterProfilSayfasiAdresi	=	$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlari["TwitterProfilSayfasiAdresi"];
							$DisaAktarimIslemiIcinDosyaIcerigiOlustur								.=	$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariTwitterProfilSayfasiAdresi.";";
						$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariAciklama						=	$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlari["Aciklama"];
							$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariAciklamaBicimlendir				=	RleriVeNleriBoslukYap($DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariAciklama);
							$DisaAktarimIslemiIcinDosyaIcerigiOlustur								.=	$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariAciklamaBicimlendir."\r";
					}
						
					$DisaAktarimIslemiIcinDosyaIcerigiBicimlendir			=	DonusumleriGeriDondur($DisaAktarimIslemiIcinDosyaIcerigiOlustur);
					$DisaAktarimIslemiIcinDosyaIcerigiKodla					=	mb_convert_encoding($DisaAktarimIslemiIcinDosyaIcerigiBicimlendir, "iso-8859-9", "auto");
					$DisaAktarimIslemiIcinDosyaIcerigi						=	$DisaAktarimIslemiIcinDosyaIcerigiKodla;
					file_put_contents($DisaAktarimIslemiIcinYeniDosyaYoluVeAdiOlustur, $DisaAktarimIslemiIcinDosyaIcerigi, FILE_TEXT | FILE_APPEND);
					chmod($DisaAktarimIslemiIcinYeniDosyaYoluVeAdiOlustur, 0644);
						
					$DisaAktarimIslemiIcinDosyaSayisiVeSonKalinanIDsiIcinGuncelle			=	$VeritabaniBaglantisi->query("UPDATE kisilerdisaaktarimdosyalari SET DosyaSayisi=DosyaSayisi+1, SonIslenenKayitIDsi='$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariID' WHERE ID='$DisaAktarimSorgusuKaydiID' ORDER BY ID ASC LIMIT 1");
							
					$DisaAktarimIslemiIcinFiltrelereGoreKalanKisilerSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM kisiler WHERE ID>$DisaAktarimIslemiIcinFiltrelereGoreKisilerSorgusuKayitlariID $DisaAktarimIcinSorguKosulu LIMIT 1");
					$DisaAktarimIslemiIcinFiltrelereGoreKalanKisilerSorgusuKayitSayisi	=	$DisaAktarimIslemiIcinFiltrelereGoreKalanKisilerSorgusu->num_rows;
						if($DisaAktarimIslemiIcinFiltrelereGoreKalanKisilerSorgusuKayitSayisi<1){
							$GuncelDisaAktarimKaydiSorgusu			=	$VeritabaniBaglantisi->query("SELECT * FROM kisilerdisaaktarimdosyalari WHERE ID='$DisaAktarimSorgusuKaydiID' LIMIT 1");
							$GuncelDisaAktarimKaydiSorgusuKaydi		=	$GuncelDisaAktarimKaydiSorgusu->fetch_assoc();
								$GuncelDisaAktarimKaydiSorgusuKaydiDosyaSayisi		=	$GuncelDisaAktarimKaydiSorgusuKaydi["DosyaSayisi"];

							$DisaAktarimIslemiIcinSonDosyaYoluVeAdiOlustur		=	"../Dosyalar/".$DisaAktarimSorgusuKaydiDosyaAdiKes."_".$GuncelDisaAktarimKaydiSorgusuKaydiDosyaSayisi.".csv";

							$DisaAktarimIslemiIcinSonDosyayiAc						=	fopen($DisaAktarimIslemiIcinSonDosyaYoluVeAdiOlustur, "r");
							$DisaAktarimIslemiIcinSonDosyaninTumunuCozumle			=	file_get_contents($DisaAktarimIslemiIcinSonDosyaYoluVeAdiOlustur);
							$DisaAktarimIslemiIcinSonDosyaninSatirSayisi			=	substr_count($DisaAktarimIslemiIcinSonDosyaninTumunuCozumle, "\r");
							
							$DisaAktarimIslemiIcinToplamKayitSayisi					=	((($GuncelDisaAktarimKaydiSorgusuKaydiDosyaSayisi-1)*$SiteAyarlariKaydiKisilerSayfasiDisaAktarimKayitSayisiLimiti)+($DisaAktarimIslemiIcinSonDosyaninSatirSayisi-1));
							
							fclose($DisaAktarimIslemiIcinSonDosyayiAc);
							
							$DisaAktarimIslemiIcinZipDosyasiOlustur				=	new PharData("../Dosyalar/".$DisaAktarimSorgusuKaydiDosyaAdi);
							$DisaAktarimIslemiIcinZiplemeIcinDonguBaslangici	=	1;
							
							while($DisaAktarimIslemiIcinZiplemeIcinDonguBaslangici<=$GuncelDisaAktarimKaydiSorgusuKaydiDosyaSayisi){
								$DisaAktarimIslemiIcinZiplemeIcinDosya			=	"../Dosyalar/".$DisaAktarimSorgusuKaydiDosyaAdiKes."_".$DisaAktarimIslemiIcinZiplemeIcinDonguBaslangici.".csv";
								
								$DisaAktarimIslemiIcinZiplemeIcinDosyaAdi		=	$DisaAktarimSorgusuKaydiDosyaAdiKes."_".$DisaAktarimIslemiIcinZiplemeIcinDonguBaslangici.".csv";
								
								$DisaAktarimIslemiIcinZipDosyasiOlustur->addFile("../Dosyalar/".$DisaAktarimIslemiIcinZiplemeIcinDosya, $DisaAktarimIslemiIcinZiplemeIcinDosyaAdi);
								
								unlink($DisaAktarimIslemiIcinZiplemeIcinDosya);
								$DisaAktarimIslemiIcinZiplemeIcinDonguBaslangici++;
							}
							
							$DisaAktarimIslemiIcinZipDosyasiBoyutu					=	filesize("../Dosyalar/".$DisaAktarimSorgusuKaydiDosyaAdi);
							$DisaAktarimIslemiIcinZipDosyasiBoyutuBicimlendir		=	DosyaBoyutuYaz($DisaAktarimIslemiIcinZipDosyasiBoyutu);
							
							$DisaAktarimSorgusuIcinKayitGuncelle			=	$VeritabaniBaglantisi->query("UPDATE kisilerdisaaktarimdosyalari SET KayitSayisi='$DisaAktarimIslemiIcinToplamKayitSayisi', DosyaBoyutu='$DisaAktarimIslemiIcinZipDosyasiBoyutuBicimlendir', TamamlanmaDurumu='1', TamamlanmaTarihiZamanDamgasi='$ZamanDamgasi', TamamlanmaTarihi='$TarihSaat', CronunCalismaDurumu='0', CronunCalismaTarihiZamanDamgasi='0', CronunCalismaTarihi='' WHERE ID='$DisaAktarimSorgusuKaydiID' ORDER BY ID ASC LIMIT 1");
								if($DisaAktarimSorgusuIcinKayitGuncelle){
									$DisaAktarimDosyasiIcinGenelIstatistikleriGuncelle		=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET BekleyenDisaAktarimIslemSayisi=BekleyenDisaAktarimIslemSayisi-1, DisaAktarimDosyalariSayisi=DisaAktarimDosyalariSayisi+1");
								}
						}else{
							$GuncelDisaAktarimKaydiSorgusu			=	$VeritabaniBaglantisi->query("SELECT * FROM kisilerdisaaktarimdosyalari WHERE ID='$DisaAktarimSorgusuKaydiID' LIMIT 1");
							$GuncelDisaAktarimKaydiSorgusuKaydi		=	$GuncelDisaAktarimKaydiSorgusu->fetch_assoc();
								$GuncelDisaAktarimKaydiSorgusuKaydiDosyaSayisi		=	$GuncelDisaAktarimKaydiSorgusuKaydi["DosyaSayisi"];
							
							$DisaAktarimIslemiIcinToplamKayitSayisi		=	($GuncelDisaAktarimKaydiSorgusuKaydiDosyaSayisi*$SiteAyarlariKaydiKisilerSayfasiDisaAktarimKayitSayisiLimiti);
							
							$DisaAktarimSorgusuIcinKayitGuncelle			=	$VeritabaniBaglantisi->query("UPDATE kisilerdisaaktarimdosyalari SET KayitSayisi='$DisaAktarimIslemiIcinToplamKayitSayisi', CronunCalismaDurumu='0', CronunCalismaTarihiZamanDamgasi='0', CronunCalismaTarihi='' WHERE ID='$DisaAktarimSorgusuKaydiID' ORDER BY ID ASC LIMIT 1");
						}
				}else{
					$DisaAktarimDosyasiKaydiSil		=	$VeritabaniBaglantisi->query("DELETE FROM kisilerdisaaktarimdosyalari WHERE ID='$DisaAktarimSorgusuKaydiID' ORDER BY ID ASC LIMIT 1");
						if($DisaAktarimDosyasiKaydiSil){
							$DisaAktarimDosyasiIcinGenelIstatistikleriGuncelle		=	$VeritabaniBaglantisi->query("UPDATE genelistatistikler SET BekleyenDisaAktarimIslemSayisi=BekleyenDisaAktarimIslemSayisi-1");
						}
					exit();
				}
		}else{
			exit();
		}
	}else{
		exit();
	}
/* KİŞİLERİN DIŞA AKTARIM İŞLEMLERİ */

ob_end_flush();
$VeritabaniBaglantisi->close();
?>