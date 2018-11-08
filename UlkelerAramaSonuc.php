<? if(isset($_SESSION["Yonetici"])){
	$GelenAramaIcerigi		=	HarfliVeSayiliIcerikleriFiltrele(html_entity_decode(urldecode($_REQUEST["AramaIcerigi"]), ENT_QUOTES, "UTF-8"));
	
	$ToplamKayitSayisiSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM ulkeler WHERE UlkeAdi LIKE '%$GelenAramaIcerigi%'");
	$ToplamKayitSayisi						=	$ToplamKayitSayisiSorgusu->num_rows;
	$SayfalamayaBaslanacakKayitSayisi		=	($GelenSayfalama*$SiteAyarlariKaydiUlkelerSayfasiListelemeLimiti)-$SiteAyarlariKaydiUlkelerSayfasiListelemeLimiti;
	$BulunanSayfaSayisi						=	ceil($ToplamKayitSayisi/$SiteAyarlariKaydiUlkelerSayfasiListelemeLimiti);
?>
<script type="text/javascript" language="javascript">
	function KayitSilIcinModalAc(IDDegeri){
		document.getElementById("ModalKarartmaAlani").style.display						=	"block";
		document.getElementById("ModalAlani").style.display								=	"block";
		document.getElementById("ModalMetinAlani").innerHTML							=	"Ülke kaydını tamamen silmek üzeresiniz. İşlem gerçekleştirilecek olur ise, işlemin kesinlikle geri dönüşü yoktur. Lütfen bu işlemi gerçekleştirmek istediğinizden emin olunuz. \"Onayla\" butonuna tıklayacak olursanız, ilgili ülke kaydı tamamen silinecek olup, bağlantılı tüm verileri de aynı zamanda sistemden silenecektir. \"İptal\" butonuna tıklayacak olursanız, herhangi bir işlem gerçekleştirilmeden, istek iptal edilecektir. Veritabanı kayıt sayısına göre işlem uzun sürebileceği için lütfen işlem tamamlandı mesajı gelene kadar bekleyiniz.";
		document.getElementById("SilIslemiOnaylaButonu").href							=	"?S=0&SS=27&ID=" + IDDegeri;
		document.getElementById("SilIslemiOnaylaButonuKapsayicisi").style.display		=	"block";
		document.getElementById("SilIslemiIptalButonuKapsayicisi").style.display		=	"block";
	}
	
	function KayitSilIcinModalKapat(){
		document.getElementById("ModalKarartmaAlani").style.display						=	"none";
		document.getElementById("ModalAlani").style.display								=	"none";
		document.getElementById("ModalMetinAlani").innerHTML							=	"";
		document.getElementById("SilIslemiOnaylaButonu").href							=	"";
		document.getElementById("SilIslemiOnaylaButonuKapsayicisi").style.display		=	"none";
		document.getElementById("SilIslemiIptalButonuKapsayicisi").style.display		=	"none";
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
		</div>
	</div>
</div>

<div id="ListelemeAlaniKapsayicisi">
	<div class="SayfaIciBaslikAlanlariKapsayicisi">
		<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=15" target="_top">Ülkeler</a> > Arama Sonuç
		<span class="SayfaIciBaslikAlanlariIciIconlarAlaniKapsayicisi">
			<div class="SayfaIciBaslikAlanlariIciIconlarKapsayicisi">
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=17" target="_top"><img src="Resimler/IconIslemlerEkle.png" title="Yeni Kayıt Ekle" alt="Yeni Kayıt Ekle"></a>
			</div>
		</span>
	</div>

	<div class="ListelemeAlaniIciAramaAlaniKapsayicisi">
		<form id="AramaFormu" name="AramaFormu" action="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=16" method="POST">
			<div class="ListelemeAlaniIciAramaAlaniButonAlanlariKapsayicisi"><input type="submit" value="" class="ListelemeAlaniIciAramaAlaniAraButonlari" tabindex="2"></div>
			<div class="ListelemeAlaniIciAramaAlaniInputAlanlariKapsayicisi"><div class="IkiYuzPixselSinirliAlanKapsayicisi"><input type="text" id="AramaIcerigi" name="AramaIcerigi" value="<?php echo $GelenAramaIcerigi; ?>" class="ListelemeAlaniIciAramaAlaniTextInputlari" tabindex="1"></div></div>
		</form>
	</div>

	<div class="ListelemeAlaniIciTabloAlaniKapsayicisi">
		<table class="ListelemeAlaniIciTablosu" align="center" cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th class="ListelemeAlaniTablolariSiraBaslikSutunu">Sıra</th>
					<th>Ülke Adı</th>
					<th>Ülke Kodu</th>
					<th class="ListelemeAlaniTablolariTarihBaslikSutunu">Eklenme Tarihi</th>
					<th class="ListelemeAlaniTablolariUcluIkiliTekliBaslikSutunu">İşlemler</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$UlkelerSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM ulkeler WHERE UlkeAdi LIKE '%$GelenAramaIcerigi%' ORDER BY SiraNumarasi ASC LIMIT $SayfalamayaBaslanacakKayitSayisi, $SiteAyarlariKaydiUlkelerSayfasiListelemeLimiti");
			$UlkelerSorgusuKayitSayisi	=	$UlkelerSorgusu->num_rows;
				if($UlkelerSorgusuKayitSayisi>0){
					while($UlkelerSorgusuKayitlari=$UlkelerSorgusu->fetch_assoc()){
						$UlkelerSorgusuKayitlariID					=	$UlkelerSorgusuKayitlari["ID"];
						$UlkelerSorgusuKayitlariUlkeAdi				=	$UlkelerSorgusuKayitlari["UlkeAdi"];
						$UlkelerSorgusuKayitlariUlkeKodu			=	$UlkelerSorgusuKayitlari["UlkeKodu"];
						$UlkelerSorgusuKayitlariEklenmeTarihi		=	$UlkelerSorgusuKayitlari["EklenmeTarihi"];
						$UlkelerSorgusuKayitlariSiraNumarasi		=	$UlkelerSorgusuKayitlari["SiraNumarasi"];
			?>
				<tr>
					<td>
						<div class="ListelemeAlaniIciTablolariSiraSutunuRakamAlani">
							<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($UlkelerSorgusuKayitlariSiraNumarasi); ?>
						</div>
					</td>

					<td>
						<?php echo DonusumleriGeriDondur($UlkelerSorgusuKayitlariUlkeAdi); ?>
					</td>

					<td>
						<?php echo DonusumleriGeriDondur($UlkelerSorgusuKayitlariUlkeKodu); ?>
					</td>
					
					<td class="ListelemeAlaniTablolariTarihSutunu">
						<?php echo DonusumleriGeriDondur($UlkelerSorgusuKayitlariEklenmeTarihi); ?>
					</td>
					
					<td class="ListelemeAlaniTablolariUcluIkiliTekliSutunu">
						<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=22&ID=<?php echo $UlkelerSorgusuKayitlariID; ?>" target="_top"><img src="Resimler/IconIslemlerGuncelle.png" width="20" height="20" title="Güncelle" alt="Güncelle"></a>
						<a href="javascript:KayitSilIcinModalAc(<?php echo $UlkelerSorgusuKayitlariID; ?>)"><img src="Resimler/IconIslemlerSil.png" width="20" height="20" title="Sil" alt="Sil"></a>
					</td>
				</tr>
			<?php
					}
				}else{
			?>	
				<tr>
					<td colspan="5">Arama kriterlerine uygun sisteme kayıtlı ülke kaydı bulunmamaktadır.</td>
				</tr>
			<?php
				}
			?>	
			</tbody>
		</table>
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
			echo 	"<span class=\"Pasif\"><a href=\"http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=16&Sayfalama=1&AramaIcerigi=".urlencode($GelenAramaIcerigi)."\" target=\"_top\"><img src=\"Resimler/IconSayfalamaIlk.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";
			$SayfalamaIcinSayfaDegeriniBirGeriAl	=	$GelenSayfalama-1;
			echo 	"<span class=\"Pasif\"><a href=\"http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=16&Sayfalama=".$SayfalamaIcinSayfaDegeriniBirGeriAl."&AramaIcerigi=".urlencode($GelenAramaIcerigi)."\" target=\"_top\"><img src=\"Resimler/IconSayfalamaBirGeri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
		}
								
		for($SayfalamaIcinSayfaIndexDegeri=$GelenSayfalama-$SayfalamaIcinSolveSagButonSayisi; $SayfalamaIcinSayfaIndexDegeri<=$GelenSayfalama+$SayfalamaIcinSolveSagButonSayisi; $SayfalamaIcinSayfaIndexDegeri++){
			if(($SayfalamaIcinSayfaIndexDegeri>0) and ($SayfalamaIcinSayfaIndexDegeri<=$BulunanSayfaSayisi)){
				if($SayfalamaIcinSayfaIndexDegeri==$GelenSayfalama){
					echo 	"<span class=\"Aktif\">".$SayfalamaIcinSayfaIndexDegeri."</span>";
				}else{
					echo 	"<span class=\"Pasif\"><a href=\"http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=16&Sayfalama=".$SayfalamaIcinSayfaIndexDegeri."&AramaIcerigi=".urlencode($GelenAramaIcerigi)."\" target=\"_top\">".$SayfalamaIcinSayfaIndexDegeri."</a></span>";
				}
			}
		}

		if($GelenSayfalama!=$BulunanSayfaSayisi){
			$SayfalamaIcinSayfaDegeriniBirIleriAl	=	$GelenSayfalama+1;
			echo 	"<span class=\"Pasif\"><a href=\"http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=16&Sayfalama=".$SayfalamaIcinSayfaDegeriniBirIleriAl."&AramaIcerigi=".urlencode($GelenAramaIcerigi)."\" target=\"_top\"><img src=\"Resimler/IconSayfalamaBirIleri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
			echo 	"<span class=\"Pasif\"><a href=\"http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=16&Sayfalama=".$BulunanSayfaSayisi."&AramaIcerigi=".urlencode($GelenAramaIcerigi)."\" target=\"_top\"><img src=\"Resimler/IconSayfalamaSon.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";			
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