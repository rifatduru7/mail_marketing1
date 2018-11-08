<? if(isset($_SESSION["Yonetici"])){
	$GelenAdiIcerigi								=	HarfliVeSayiliIcerikleriFiltrele(html_entity_decode(urldecode($_REQUEST["Adi"]), ENT_QUOTES, "UTF-8"));
	$GelenSoyadiIcerigi								=	HarfliVeSayiliIcerikleriFiltrele(html_entity_decode(urldecode($_REQUEST["Soyadi"]), ENT_QUOTES, "UTF-8"));	
	$GelenEMailAdresiIcerigi						=	EMailliIcerikleriFiltrele(html_entity_decode(urldecode($_REQUEST["EMailAdresi"]), ENT_QUOTES, "UTF-8"));
	$GelenTelefonuIcerigi							=	TelefonluIcerikleriFiltrele(html_entity_decode(urldecode($_REQUEST["Telefonu"]), ENT_QUOTES, "UTF-8"));
	$GelenCepTelefonuIcerigi						=	TelefonluIcerikleriFiltrele(html_entity_decode(urldecode($_REQUEST["CepTelefonu"]), ENT_QUOTES, "UTF-8"));	
	$GelenCinsiyetiIcerigi							=	HarfliVeSayiliIcerikleriFiltrele(html_entity_decode(urldecode($_REQUEST["Cinsiyeti"]), ENT_QUOTES, "UTF-8"));
	$GelenVIPDurumuIcerigi							=	SayiliIcerikleriFiltrele(html_entity_decode(urldecode($_REQUEST["VIPDurumu"]), ENT_QUOTES, "UTF-8"));
	$GelenUlkesiIcerigi								=	SayiliIcerikleriFiltrele(html_entity_decode(urldecode($_REQUEST["Ulkesi"]), ENT_QUOTES, "UTF-8"));	
	$GelenSehriIcerigi								=	SayiliIcerikleriFiltrele(html_entity_decode(urldecode($_REQUEST["Sehri"]), ENT_QUOTES, "UTF-8"));
	$GelenIlcesiIcerigi								=	HarfliVeSayiliIcerikleriFiltrele(html_entity_decode(urldecode($_REQUEST["Ilcesi"]), ENT_QUOTES, "UTF-8"));
	$GelenPostaKoduIcerigi							=	SayiliIcerikleriFiltrele(html_entity_decode(urldecode($_REQUEST["PostaKodu"]), ENT_QUOTES, "UTF-8"));
	$GelenAdresiIcerigi								=	HarfliVeSayiliIcerikleriFiltrele(html_entity_decode(urldecode($_REQUEST["Adresi"]), ENT_QUOTES, "UTF-8"));
	$GelenWebSitesiAdresiIcerigi					=	LinkliIcerikleriFiltrele(html_entity_decode(urldecode($_REQUEST["WebSitesiAdresi"]), ENT_QUOTES, "UTF-8"));
	$GelenFacebookProfilSayfasiAdresiIcerigi		=	LinkliIcerikleriFiltrele(html_entity_decode(urldecode($_REQUEST["FacebookProfilSayfasiAdresi"]), ENT_QUOTES, "UTF-8"));
	$GelenTwitterProfilSayfasiAdresiIcerigi			=	LinkliIcerikleriFiltrele(html_entity_decode(urldecode($_REQUEST["TwitterProfilSayfasiAdresi"]), ENT_QUOTES, "UTF-8"));
	
	if($GelenAdiIcerigi!=""){
		$SorguKosulu		=	"WHERE Adi LIKE '%$GelenAdiIcerigi%'";
	}else{
		$SorguKosulu		=	"";
	}
	
	if($GelenSoyadiIcerigi!=""){
		if($SorguKosulu!=""){
			$SorguKosulu		.=	" AND Soyadi LIKE '%$GelenSoyadiIcerigi%'";
		}else{
			$SorguKosulu		=	"WHERE Soyadi LIKE '%$GelenSoyadiIcerigi%'";
		}
	}
	
	if($GelenEMailAdresiIcerigi!=""){
		if($SorguKosulu!=""){
			$SorguKosulu		.=	" AND EMailAdresi LIKE '%$GelenEMailAdresiIcerigi%'";
		}else{
			$SorguKosulu		=	"WHERE EMailAdresi LIKE '%$GelenEMailAdresiIcerigi%'";
		}
	}
	
	if($GelenTelefonuIcerigi!=""){
		if($SorguKosulu!=""){
			$SorguKosulu		.=	" AND Telefonu LIKE '%$GelenTelefonuIcerigi%'";
		}else{
			$SorguKosulu		=	"WHERE Telefonu LIKE '%$GelenTelefonuIcerigi%'";
		}
	}
	
	if($GelenCepTelefonuIcerigi!=""){
		if($SorguKosulu!=""){
			$SorguKosulu		.=	" AND CepTelefonu LIKE '%$GelenCepTelefonuIcerigi%'";
		}else{
			$SorguKosulu		=	"WHERE CepTelefonu LIKE '%$GelenCepTelefonuIcerigi%'";
		}
	}
	
	if($GelenCinsiyetiIcerigi!="Tümü"){
		if($SorguKosulu!=""){
			if($GelenCinsiyetiIcerigi=="Erkek"){
				$SorguKosulu		.=	" AND Cinsiyeti='Erkek'";
			}else{
				$SorguKosulu		.=	" AND Cinsiyeti='Kadın'";
			}
		}else{
			if($GelenCinsiyetiIcerigi=="Erkek"){
				$SorguKosulu		=	"WHERE Cinsiyeti='Erkek'";
			}else{
				$SorguKosulu		=	"WHERE Cinsiyeti='Kadın'";
			}
		}
	}
	
	if($GelenVIPDurumuIcerigi!=2){
		if($SorguKosulu!=""){
			if($GelenVIPDurumuIcerigi==1){
				$SorguKosulu		.=	" AND VIPDurumu='1'";
			}else{
				$SorguKosulu		.=	" AND VIPDurumu='0'";
			}
		}else{
			if($GelenVIPDurumuIcerigi==1){
				$SorguKosulu		=	"WHERE VIPDurumu='1'";
			}else{
				$SorguKosulu		=	"WHERE VIPDurumu='0'";
			}
		}
	}
	
	if($GelenUlkesiIcerigi!=""){
		if($SorguKosulu!=""){
			$SorguKosulu		.=	" AND Ulkesi='$GelenUlkesiIcerigi'";
		}else{
			$SorguKosulu		=	"WHERE Ulkesi='$GelenUlkesiIcerigi'";
		}
	}
	
	if($GelenSehriIcerigi!=""){
		if($SorguKosulu!=""){
			$SorguKosulu		.=	" AND Sehri='$GelenSehriIcerigi'";
		}else{
			$SorguKosulu		=	"WHERE Sehri='$GelenSehriIcerigi'";
		}
	}
	
	if($GelenIlcesiIcerigi!=""){
		if($SorguKosulu!=""){
			$SorguKosulu		.=	" AND Ilcesi LIKE '%$GelenIlcesiIcerigi%'";
		}else{
			$SorguKosulu		=	"WHERE Ilcesi LIKE '%$GelenIlcesiIcerigi%'";
		}
	}
	
	if($GelenPostaKoduIcerigi!=""){
		if($SorguKosulu!=""){
			$SorguKosulu		.=	" AND PostaKodu LIKE '%$GelenPostaKoduIcerigi%'";
		}else{
			$SorguKosulu		=	"WHERE PostaKodu LIKE '%$GelenPostaKoduIcerigi%'";
		}
	}
	
	if($GelenAdresiIcerigi!=""){
		if($SorguKosulu!=""){
			$SorguKosulu		.=	" AND Adresi LIKE '%$GelenAdresiIcerigi%'";
		}else{
			$SorguKosulu		=	"WHERE Adresi LIKE '%$GelenAdresiIcerigi%'";
		}
	}
	
	if($GelenWebSitesiAdresiIcerigi!=""){
		if($SorguKosulu!=""){
			$SorguKosulu		.=	" AND WebSitesiAdresi LIKE '%$GelenWebSitesiAdresiIcerigi%'";
		}else{
			$SorguKosulu		=	"WHERE WebSitesiAdresi LIKE '%$GelenWebSitesiAdresiIcerigi%'";
		}
	}
	
	if($GelenFacebookProfilSayfasiAdresiIcerigi!=""){
		if($SorguKosulu!=""){
			$SorguKosulu		.=	" AND FacebookProfilSayfasiAdresi LIKE '%$GelenFacebookProfilSayfasiAdresiIcerigi%'";
		}else{
			$SorguKosulu		=	"WHERE FacebookProfilSayfasiAdresi LIKE '%$GelenFacebookProfilSayfasiAdresiIcerigi%'";
		}
	}
	
	if($GelenFacebookProfilSayfasiAdresiIcerigi!=""){
		if($SorguKosulu!=""){
			$SorguKosulu		.=	" AND TwitterProfilSayfasiAdresi LIKE '%$GelenTwitterProfilSayfasiAdresiIcerigi%'";
		}else{
			$SorguKosulu		=	"WHERE TwitterProfilSayfasiAdresi LIKE '%$GelenTwitterProfilSayfasiAdresiIcerigi%'";
		}
	}

	$ToplamKayitSayisiSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM kisiler $SorguKosulu");
	$ToplamKayitSayisi						=	$ToplamKayitSayisiSorgusu->num_rows;
	$SayfalamayaBaslanacakKayitSayisi		=	($GelenSayfalama*$SiteAyarlariKaydiKisilerSayfasiListelemeLimiti)-$SiteAyarlariKaydiKisilerSayfasiListelemeLimiti;
	$BulunanSayfaSayisi						=	ceil($ToplamKayitSayisi/$SiteAyarlariKaydiKisilerSayfasiListelemeLimiti);
?>
<script type="text/javascript" language="javascript">
	function SecIptalAlaniDegistir(CheckBoxAdi){
		var SecIptalAlaniDivi	=	document.getElementById("SecIptalMetinAlani").innerHTML;
		var CheckBoxAdiDegeri	=	document.getElementsByName(CheckBoxAdi);
		var CheckBoxKacTane		=	CheckBoxAdiDegeri.length;
		
		if(SecIptalAlaniDivi == "Seç"){
			document.getElementById("SecIptalMetinAlani").innerHTML		=	"İptal";
			for(var Baslangic=0; Baslangic<CheckBoxKacTane; Baslangic++){
				if(CheckBoxAdiDegeri[Baslangic].type == "checkbox"){
					CheckBoxAdiDegeri[Baslangic].checked	=	true;
				}
			}
		}else{
			document.getElementById("SecIptalMetinAlani").innerHTML		=	"Seç";
			for(var Baslangic=0; Baslangic<CheckBoxKacTane; Baslangic++){
				if(CheckBoxAdiDegeri[Baslangic].type == "checkbox"){
					CheckBoxAdiDegeri[Baslangic].checked	=	false;
				}
			}
		}
	}
	
	function KayitSilIcinModalAc(IDDegeri){
		document.getElementById("ModalKarartmaAlani").style.display							=	"block";
		document.getElementById("ModalAlani").style.display									=	"block";
		document.getElementById("ModalMetinAlani").innerHTML								=	"Kişi kaydını tamamen silmek üzeresiniz. İşlem gerçekleştirilecek olur ise, işlemin kesinlikle geri dönüşü yoktur. Lütfen bu işlemi gerçekleştirmek istediğinizden emin olunuz. \"Onayla\" butonuna tıklayacak olursanız, ilgili kişi kaydı tamamen silinecek olup, bağlantılı tüm verileri de aynı zamanda sistemden silenecektir. \"İptal\" butonuna tıklayacak olursanız, herhangi bir işlem gerçekleştirilmeden, istek iptal edilecektir. Veritabanı kayıt sayısına göre işlem uzun sürebileceği için lütfen işlem tamamlandı mesajı gelene kadar bekleyiniz.";
		document.getElementById("SilIslemiOnaylaButonu").href								=	"?S=0&SS=158&ID=" + IDDegeri;
		document.getElementById("SilIslemiOnaylaButonuKapsayicisi").style.display			=	"block";
		document.getElementById("SilIslemiIptalButonuKapsayicisi").style.display			=	"block";
	}
	
	function KayitSilIcinModalKapat(){
		document.getElementById("ModalKarartmaAlani").style.display							=	"none";
		document.getElementById("ModalAlani").style.display									=	"none";
		document.getElementById("ModalMetinAlani").innerHTML								=	"";
		document.getElementById("SilIslemiOnaylaButonu").href								=	"";
		document.getElementById("SilIslemiOnaylaButonuKapsayicisi").style.display			=	"none";
		document.getElementById("SilIslemiIptalButonuKapsayicisi").style.display			=	"none";
	}
	
	function TopluKayitSilIcinModalAc(){
		document.getElementById("ModalKarartmaAlani").style.display							=	"block";
		document.getElementById("ModalAlani").style.display									=	"block";
		document.getElementById("ModalMetinAlani").innerHTML								=	"Seçilen kişi kayıtlarını tamamen silmek üzeresiniz. İşlem gerçekleştirilecek olur ise, işlemin kesinlikle geri dönüşü yoktur. Lütfen bu işlemi gerçekleştirmek istediğinizden emin olunuz. \"Onayla\" butonuna tıklayacak olursanız, seçili kişi kayıtları tamamen silinecek olup, bağlantılı tüm verileri de aynı zamanda sistemden silenecektir. \"İptal\" butonuna tıklayacak olursanız, herhangi bir işlem gerçekleştirilmeden, istek iptal edilecektir. Veritabanı kayıt sayısına göre işlem uzun sürebileceği için lütfen işlem tamamlandı mesajı gelene kadar bekleyiniz.";
		document.getElementById("TopluSilIslemiOnaylaButonuKapsayicisi").style.display		=	"block";
		document.getElementById("TopluSilIslemiIptalButonuKapsayicisi").style.display		=	"block";
	}
	
	function TopluKayitSilIcinModalKapat(){
		document.getElementById("ModalKarartmaAlani").style.display							=	"none";
		document.getElementById("ModalAlani").style.display									=	"none";
		document.getElementById("ModalMetinAlani").innerHTML								=	"";
		document.getElementById("TopluSilIslemiOnaylaButonuKapsayicisi").style.display		=	"none";
		document.getElementById("TopluSilIslemiIptalButonuKapsayicisi").style.display		=	"none";
	}
	
	function TopluKayitSilmeFormuGonder(){
		document.getElementById("TopluKayitSilmeFormu").submit();
	}
</script>

<div id="ModalKarartmaAlani" class="ModalKarartmaAlaniKapsayicisi" style="display: none;">
	<div id="ModalAlani" class="ModalAlaniKapsayicisi" style="display: none;">
		<div class="ModalBaslikAlaniKapsayicisi">
			Dikkat! Önemli Uyarı!
		</div>
		<div id="ModalMetinAlani" class="ModalMetinAlaniKapsayicisi"></div>
		<div id="ModalButonAlani" class="ModalButonAlaniKapsayicisi">
			<div id="SilIslemiOnaylaButonuKapsayicisi" class="ModalOnaylaButonuAlaniKapsayicisi" style="display: none;"><a id="SilIslemiOnaylaButonu" href="" target="_top">Onayla</a></div>
			<span id="SilIslemiIptalButonuKapsayicisi" class="ModalIptalButonuAlaniKapsayicisi" onClick="KayitSilIcinModalKapat()" style="display: none;">İptal</span>
			<div id="TopluSilIslemiOnaylaButonuKapsayicisi" class="ModalOnaylaButonuAlaniKapsayicisi" style="display: none;"><a href="javascript:TopluKayitSilmeFormuGonder()" target="_top">Onayla</a></div>
			<span id="TopluSilIslemiIptalButonuKapsayicisi" class="ModalIptalButonuAlaniKapsayicisi" onClick="TopluKayitSilIcinModalKapat()" style="display: none;">İptal</span>
		</div>
	</div>
</div>

<div id="ListelemeAlaniKapsayicisi">
	<div class="SayfaIciBaslikAlanlariKapsayicisi">
		<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=144" target="_top">Kişiler</a> > Detaylı Arama Sonuç
		<span class="SayfaIciBaslikAlanlariIciIconlarAlaniKapsayicisi">
			<div class="SayfaIciBaslikAlanlariIciIconlarKapsayicisi">
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=149" target="_top"><img src="Resimler/IconIslemlerEkle.png" title="Yeni Kayıt Ekle" alt="Yeni Kayıt Ekle"></a>
			</div>
			
			<div class="SayfaIciBaslikAlanlariIciIconlarKapsayicisi">
				<a href="javascript:TopluKayitSilIcinModalAc()"><img src="Resimler/IconIslemlerTopluSil.png" title="Toplu Sil" alt="Toplu Sil"></a>
			</div>
			
			<div class="SayfaIciBaslikAlanlariIciIconlarKapsayicisi">
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=175" target="_top"><img src="Resimler/IconIslemlerKlasor.png" title="Dışa Aktarım Klasörü" alt="Dışa Aktarım Klasörü"></a>
			</div>
			
			<div class="SayfaIciBaslikAlanlariIciIconlarKapsayicisi">
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=169" target="_top"><img src="Resimler/IconIslemlerDisaAktar.png" title="Dışa Aktar" alt="Dışa Aktar"></a>
			</div>
			
			<div class="SayfaIciBaslikAlanlariIciIconlarKapsayicisi">
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=164" target="_top"><img src="Resimler/IconIslemlerIceAktar.png" title="İçe Aktar" alt="İçe Aktar"></a>
			</div>
		</span>
	</div>
			
	<div class="ListelemeAlaniIciAramaAlaniKapsayicisi">
		<div class="ListelemeAlaniIciDetayliAramaButonAlanlariKapsayicisi"><a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=146" target="_top"></a></div>
	
		<form id="AramaFormu" name="AramaFormu" action="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=145" method="POST">
			<div class="ListelemeAlaniIciAramaAlaniButonAlanlariKapsayicisi"><input type="submit" value="" class="ListelemeAlaniIciAramaAlaniAraButonlari" tabindex="2"></div>
			<div class="ListelemeAlaniIciAramaAlaniInputAlanlariKapsayicisi"><div class="IkiYuzPixselSinirliAlanKapsayicisi"><input type="text" id="AramaIcerigi" name="AramaIcerigi" class="ListelemeAlaniIciAramaAlaniTextInputlari" tabindex="1"></div></div>
		</form>
	</div>
			
	<div class="ListelemeAlaniIciTabloAlaniKapsayicisi">
		<form id="TopluKayitSilmeFormu" name="TopluKayitSilmeFormu" action="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=161" method="POST">
			<table class="ListelemeAlaniIciTablosu" align="center" cellpadding="0" cellspacing="0">
				<thead>
					<tr>
						<th class="ListelemeAlaniTablolariSecIptalBaslikSutunu"><span id="SecIptalMetinAlani" onClick="SecIptalAlaniDegistir('IDler[]')">Seç</span></th>
						<th>Adı</th>
						<th>Soyadı</th>
						<th>E-Mail Adresi</th>
						<th class="ListelemeAlaniTablolariVIPDurumuBaslikSutunu">VIP Durumu</th>
						<th class="ListelemeAlaniTablolariRatingDurumuBaslikSutunu">Rating Durumu</th>
						<th class="ListelemeAlaniTablolariTarihBaslikSutunu">Eklenme Tarihi</th>
						<th class="ListelemeAlaniTablolariDortluBaslikSutunu">İşlemler</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$KisilerSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM kisiler $SorguKosulu ORDER BY EklenmeTarihiZamanDamgasi DESC LIMIT $SayfalamayaBaslanacakKayitSayisi, $SiteAyarlariKaydiKisilerSayfasiListelemeLimiti");
				$KisilerSorgusuKayitSayisi	=	$KisilerSorgusu->num_rows;
					if($KisilerSorgusuKayitSayisi>0){
						while($KisilerSorgusuKayitlari=$KisilerSorgusu->fetch_assoc()){
							$KisilerSorgusuKayitlariID						=	$KisilerSorgusuKayitlari["ID"];
							$KisilerSorgusuKayitlariAdi						=	$KisilerSorgusuKayitlari["Adi"];
							$KisilerSorgusuKayitlariSoyadi					=	$KisilerSorgusuKayitlari["Soyadi"];
							$KisilerSorgusuKayitlariEMailAdresi				=	$KisilerSorgusuKayitlari["EMailAdresi"];
							$KisilerSorgusuKayitlariVIPDurumu				=	$KisilerSorgusuKayitlari["VIPDurumu"];
								if($KisilerSorgusuKayitlariVIPDurumu==1){
									$KisilerSorgusuKayitlariVIPDurumuYaz		=	"VIP";
								}else{
									$KisilerSorgusuKayitlariVIPDurumuYaz		=	"Standart";
								}
							$KisilerSorgusuKayitlariRatingDegeri			=	$KisilerSorgusuKayitlari["RatingDegeri"];
								if($KisilerSorgusuKayitlariRatingDegeri==0){
									$KisilerSorgusuKayitlariRatingDegeriYaz		=	"<img src=\"Resimler/Yildiz0.png\" width=\"100\" height=\"20\" title=\"\" alt=\"\" style=\"border:none;\">";
								}elseif(($KisilerSorgusuKayitlariRatingDegeri>0) and ($KisilerSorgusuKayitlariRatingDegeri<=10)){
									$KisilerSorgusuKayitlariRatingDegeriYaz		=	"<img src=\"Resimler/Yildiz1.png\" width=\"100\" height=\"20\" title=\"\" alt=\"\" style=\"border:none;\">";
								}elseif(($KisilerSorgusuKayitlariRatingDegeri>10) and ($KisilerSorgusuKayitlariRatingDegeri<=20)){
									$KisilerSorgusuKayitlariRatingDegeriYaz		=	"<img src=\"Resimler/Yildiz2.png\" width=\"100\" height=\"20\" title=\"\" alt=\"\" style=\"border:none;\">";
								}elseif(($KisilerSorgusuKayitlariRatingDegeri>20) and ($KisilerSorgusuKayitlariRatingDegeri<=30)){
									$KisilerSorgusuKayitlariRatingDegeriYaz		=	"<img src=\"Resimler/Yildiz3.png\" width=\"100\" height=\"20\" title=\"\" alt=\"\" style=\"border:none;\">";
								}elseif(($KisilerSorgusuKayitlariRatingDegeri>30) and ($KisilerSorgusuKayitlariRatingDegeri<=40)){
									$KisilerSorgusuKayitlariRatingDegeriYaz		=	"<img src=\"Resimler/Yildiz4.png\" width=\"100\" height=\"20\" title=\"\" alt=\"\" style=\"border:none;\">";
								}elseif(($KisilerSorgusuKayitlariRatingDegeri>40) and ($KisilerSorgusuKayitlariRatingDegeri<=50)){
									$KisilerSorgusuKayitlariRatingDegeriYaz		=	"<img src=\"Resimler/Yildiz5.png\" width=\"100\" height=\"20\" title=\"\" alt=\"\" style=\"border:none;\">";
								}elseif(($KisilerSorgusuKayitlariRatingDegeri>50) and ($KisilerSorgusuKayitlariRatingDegeri<=60)){
									$KisilerSorgusuKayitlariRatingDegeriYaz		=	"<img src=\"Resimler/Yildiz6.png\" width=\"100\" height=\"20\" title=\"\" alt=\"\" style=\"border:none;\">";
								}elseif(($KisilerSorgusuKayitlariRatingDegeri>60) and ($KisilerSorgusuKayitlariRatingDegeri<=70)){
									$KisilerSorgusuKayitlariRatingDegeriYaz		=	"<img src=\"Resimler/Yildiz7.png\" width=\"100\" height=\"20\" title=\"\" alt=\"\" style=\"border:none;\">";
								}elseif(($KisilerSorgusuKayitlariRatingDegeri>70) and ($KisilerSorgusuKayitlariRatingDegeri<=80)){
									$KisilerSorgusuKayitlariRatingDegeriYaz		=	"<img src=\"Resimler/Yildiz8.png\" width=\"100\" height=\"20\" title=\"\" alt=\"\" style=\"border:none;\">";
								}elseif(($KisilerSorgusuKayitlariRatingDegeri>80) and ($KisilerSorgusuKayitlariRatingDegeri<=90)){
									$KisilerSorgusuKayitlariRatingDegeriYaz		=	"<img src=\"Resimler/Yildiz9.png\" width=\"100\" height=\"20\" title=\"\" alt=\"\" style=\"border:none;\">";
								}elseif($KisilerSorgusuKayitlariRatingDegeri>90){
									$KisilerSorgusuKayitlariRatingDegeriYaz		=	"<img src=\"Resimler/Yildiz10.png\" width=\"100\" height=\"20\" title=\"\" alt=\"\" style=\"border:none;\">";
								}
							$KisilerSorgusuKayitlariEklenmeTarihi			=	$KisilerSorgusuKayitlari["EklenmeTarihi"];
				?>
					<tr>
						<td>
							<div class="ListelemeAlaniIciTablolariSecIptalSutunuCheckBoxAlanlari">
								<div class="ListelemeAlaniIciTumCheckboxAlanlariKapsayicisi">
									<label class="ListelemeAlaniIciCheckboxAlanlari">
										<input type="checkbox" id="IDler[<?php echo $KisilerSorgusuKayitlariID; ?>]" name="IDler[]" value="<?php echo $KisilerSorgusuKayitlariID; ?>" class="ListelemeAlaniIciCheckboxInputlari">
										<span class="ListelemeAlaniIciCheckboxAlanlariIcinBicimlendirmeAlani"></span>
									</label>
								</div>
							</div>
						</td>
						
						<td>
							<?php echo DonusumleriGeriDondur($KisilerSorgusuKayitlariAdi); ?>
						</td>
						
						<td>
							<?php echo DonusumleriGeriDondur($KisilerSorgusuKayitlariSoyadi); ?>
						</td>
						
						<td>
							<a href="mailto:<?php echo DonusumleriGeriDondur($KisilerSorgusuKayitlariEMailAdresi); ?>"><?php echo DonusumleriGeriDondur($KisilerSorgusuKayitlariEMailAdresi); ?></a>
						</td>
						
						<td class="ListelemeAlaniTablolariVIPDurumuSutunu">
							<?php echo DonusumleriGeriDondur($KisilerSorgusuKayitlariVIPDurumuYaz); ?>
						</td>
						
						<td>
							<div class="ListelemeAlaniIciTablolariRatingSutunuYildizAlani"><?php echo DonusumleriGeriDondur($KisilerSorgusuKayitlariRatingDegeriYaz); ?></div>
						</td>
						
						<td class="ListelemeAlaniTablolariTarihSutunu">
							<?php echo DonusumleriGeriDondur($KisilerSorgusuKayitlariEklenmeTarihi); ?>
						</td>
						
						<td class="ListelemeAlaniTablolariDortluSutunu">
							<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=148&ID=<?php echo $KisilerSorgusuKayitlariID; ?>" target="_top"><img src="Resimler/IconIslemlerDetay.png" width="20" height="20" title="Detay" alt="Detay"></a>
							<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=183&ID=<?php echo $KisilerSorgusuKayitlariID; ?>" target="_top"><img src="Resimler/IconIslemlerIstatistik.png" width="20" height="20" title="İstatistik" alt="İstatistik"></a>
							<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=154&ID=<?php echo $KisilerSorgusuKayitlariID; ?>" target="_top"><img src="Resimler/IconIslemlerGuncelle.png" width="20" height="20" title="Güncelle" alt="Güncelle"></a>
							<a href="javascript:KayitSilIcinModalAc(<?php echo $KisilerSorgusuKayitlariID; ?>)"><img src="Resimler/IconIslemlerSil.png" width="20" height="20" title="Sil" alt="Sil"></a>
						</td>
					</tr>
				<?php
						}
					}else{
				?>	
					<tr>
						<td colspan="8">Arama kriterlerine uygun sisteme kayıtlı kişi kaydı bulunmamaktadır.</td>
					</tr>
				<?php
					}
				?>	
				</tbody>
			</table>
		</form>	
	</div>
</div>

<?php if($BulunanSayfaSayisi>1){ ?>
<div id="SayfalamaAlaniKapsayicisi">
	<div class="SayfalamaAlaniIciMetinAlaniKapsayicisi">
		Toplam <?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($BulunanSayfaSayisi); ?> sayfada, <?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($ToplamKayitSayisi); ?> kayıt bulunmaktadır.
	</div>

	<div class="SayfalamaAlaniIciNumaralandirmaAlaniKapsayicisi">
		<?php
		if($GelenSayfalama>1){
			echo 	"<span class=\"Pasif\"><a href=\"http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=147&Sayfalama=1&Adi=".urlencode($GelenAdiIcerigi)."&Soyadi=".urlencode($GelenSoyadiIcerigi)."&EMailAdresi=".urlencode($GelenEMailAdresiIcerigi)."&Telefonu=".urlencode($GelenTelefonuIcerigi)."&CepTelefonu=".urlencode($GelenCepTelefonuIcerigi)."&Cinsiyeti=".urlencode($GelenCinsiyetiIcerigi)."&VIPDurumu=".urlencode($GelenVIPDurumuIcerigi)."&Ulkesi=".urlencode($GelenUlkesiIcerigi)."&Sehri=".urlencode($GelenSehriIcerigi)."&Ilcesi=".urlencode($GelenIlcesiIcerigi)."&PostaKodu=".urlencode($GelenPostaKoduIcerigi)."&Adresi=".urlencode($GelenAdresiIcerigi)."&WebSitesiAdresi=".urlencode($GelenWebSitesiAdresiIcerigi)."&FacebookProfilSayfasiAdresi=".urlencode($GelenFacebookProfilSayfasiAdresiIcerigi)."&TwitterProfilSayfasiAdresi=".urlencode($GelenTwitterProfilSayfasiAdresiIcerigi)."\" target=\"_top\"><img src=\"Resimler/IconSayfalamaIlk.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";
			$SayfalamaIcinSayfaDegeriniBirGeriAl	=	$GelenSayfalama-1;
			echo 	"<span class=\"Pasif\"><a href=\"http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=147&Sayfalama=".$SayfalamaIcinSayfaDegeriniBirGeriAl."&Adi=".urlencode($GelenAdiIcerigi)."&Soyadi=".urlencode($GelenSoyadiIcerigi)."&EMailAdresi=".urlencode($GelenEMailAdresiIcerigi)."&Telefonu=".urlencode($GelenTelefonuIcerigi)."&CepTelefonu=".urlencode($GelenCepTelefonuIcerigi)."&Cinsiyeti=".urlencode($GelenCinsiyetiIcerigi)."&VIPDurumu=".urlencode($GelenVIPDurumuIcerigi)."&Ulkesi=".urlencode($GelenUlkesiIcerigi)."&Sehri=".urlencode($GelenSehriIcerigi)."&Ilcesi=".urlencode($GelenIlcesiIcerigi)."&PostaKodu=".urlencode($GelenPostaKoduIcerigi)."&Adresi=".urlencode($GelenAdresiIcerigi)."&WebSitesiAdresi=".urlencode($GelenWebSitesiAdresiIcerigi)."&FacebookProfilSayfasiAdresi=".urlencode($GelenFacebookProfilSayfasiAdresiIcerigi)."&TwitterProfilSayfasiAdresi=".urlencode($GelenTwitterProfilSayfasiAdresiIcerigi)."\" target=\"_top\"><img src=\"Resimler/IconSayfalamaBirGeri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
		}
								
		for($SayfalamaIcinSayfaIndexDegeri=$GelenSayfalama-$SayfalamaIcinSolveSagButonSayisi; $SayfalamaIcinSayfaIndexDegeri<=$GelenSayfalama+$SayfalamaIcinSolveSagButonSayisi; $SayfalamaIcinSayfaIndexDegeri++){
			if(($SayfalamaIcinSayfaIndexDegeri>0) and ($SayfalamaIcinSayfaIndexDegeri<=$BulunanSayfaSayisi)){
				if($SayfalamaIcinSayfaIndexDegeri==$GelenSayfalama){
					echo 	"<span class=\"Aktif\">".$SayfalamaIcinSayfaIndexDegeri."</span>";
				}else{
					echo 	"<span class=\"Pasif\"><a href=\"http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=147&Sayfalama=".$SayfalamaIcinSayfaIndexDegeri."&Adi=".urlencode($GelenAdiIcerigi)."&Soyadi=".urlencode($GelenSoyadiIcerigi)."&EMailAdresi=".urlencode($GelenEMailAdresiIcerigi)."&Telefonu=".urlencode($GelenTelefonuIcerigi)."&CepTelefonu=".urlencode($GelenCepTelefonuIcerigi)."&Cinsiyeti=".urlencode($GelenCinsiyetiIcerigi)."&VIPDurumu=".urlencode($GelenVIPDurumuIcerigi)."&Ulkesi=".urlencode($GelenUlkesiIcerigi)."&Sehri=".urlencode($GelenSehriIcerigi)."&Ilcesi=".urlencode($GelenIlcesiIcerigi)."&PostaKodu=".urlencode($GelenPostaKoduIcerigi)."&Adresi=".urlencode($GelenAdresiIcerigi)."&WebSitesiAdresi=".urlencode($GelenWebSitesiAdresiIcerigi)."&FacebookProfilSayfasiAdresi=".urlencode($GelenFacebookProfilSayfasiAdresiIcerigi)."&TwitterProfilSayfasiAdresi=".urlencode($GelenTwitterProfilSayfasiAdresiIcerigi)."\" target=\"_top\">".$SayfalamaIcinSayfaIndexDegeri."</a></span>";
				}
			}
		}

		if($GelenSayfalama!=$BulunanSayfaSayisi){
			$SayfalamaIcinSayfaDegeriniBirIleriAl	=	$GelenSayfalama+1;
			echo 	"<span class=\"Pasif\"><a href=\"http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=147&Sayfalama=".$SayfalamaIcinSayfaDegeriniBirIleriAl."&Adi=".urlencode($GelenAdiIcerigi)."&Soyadi=".urlencode($GelenSoyadiIcerigi)."&EMailAdresi=".urlencode($GelenEMailAdresiIcerigi)."&Telefonu=".urlencode($GelenTelefonuIcerigi)."&CepTelefonu=".urlencode($GelenCepTelefonuIcerigi)."&Cinsiyeti=".urlencode($GelenCinsiyetiIcerigi)."&VIPDurumu=".urlencode($GelenVIPDurumuIcerigi)."&Ulkesi=".urlencode($GelenUlkesiIcerigi)."&Sehri=".urlencode($GelenSehriIcerigi)."&Ilcesi=".urlencode($GelenIlcesiIcerigi)."&PostaKodu=".urlencode($GelenPostaKoduIcerigi)."&Adresi=".urlencode($GelenAdresiIcerigi)."&WebSitesiAdresi=".urlencode($GelenWebSitesiAdresiIcerigi)."&FacebookProfilSayfasiAdresi=".urlencode($GelenFacebookProfilSayfasiAdresiIcerigi)."&TwitterProfilSayfasiAdresi=".urlencode($GelenTwitterProfilSayfasiAdresiIcerigi)."\" target=\"_top\"><img src=\"Resimler/IconSayfalamaBirIleri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
			echo 	"<span class=\"Pasif\"><a href=\"http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=147&Sayfalama=".$BulunanSayfaSayisi."&Adi=".urlencode($GelenAdiIcerigi)."&Soyadi=".urlencode($GelenSoyadiIcerigi)."&EMailAdresi=".urlencode($GelenEMailAdresiIcerigi)."&Telefonu=".urlencode($GelenTelefonuIcerigi)."&CepTelefonu=".urlencode($GelenCepTelefonuIcerigi)."&Cinsiyeti=".urlencode($GelenCinsiyetiIcerigi)."&VIPDurumu=".urlencode($GelenVIPDurumuIcerigi)."&Ulkesi=".urlencode($GelenUlkesiIcerigi)."&Sehri=".urlencode($GelenSehriIcerigi)."&Ilcesi=".urlencode($GelenIlcesiIcerigi)."&PostaKodu=".urlencode($GelenPostaKoduIcerigi)."&Adresi=".urlencode($GelenAdresiIcerigi)."&WebSitesiAdresi=".urlencode($GelenWebSitesiAdresiIcerigi)."&FacebookProfilSayfasiAdresi=".urlencode($GelenFacebookProfilSayfasiAdresiIcerigi)."&TwitterProfilSayfasiAdresi=".urlencode($GelenTwitterProfilSayfasiAdresiIcerigi)."\" target=\"_top\"><img src=\"Resimler/IconSayfalamaSon.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";			
		}
		?>
	</div>
</div>
<?php
	}
}else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>