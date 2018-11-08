<? if(isset($_SESSION["Yonetici"])){
	$ToplamKayitSayisiSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM yoneticiler");
	$ToplamKayitSayisi						=	$ToplamKayitSayisiSorgusu->num_rows;
	$SayfalamayaBaslanacakKayitSayisi		=	($GelenSayfalama*$SiteAyarlariKaydiYoneticilerSayfasiListelemeLimiti)-$SiteAyarlariKaydiYoneticilerSayfasiListelemeLimiti;
	$BulunanSayfaSayisi						=	ceil($ToplamKayitSayisi/$SiteAyarlariKaydiYoneticilerSayfasiListelemeLimiti);
?>
<script type="text/javascript" language="javascript">
	function KayitPasifYapIcinModalAc(IDDegeri){
		document.getElementById("ModalKarartmaAlani").style.display							=	"block";
		document.getElementById("ModalAlani").style.display									=	"block";
		document.getElementById("ModalMetinAlani").innerHTML								=	"Aktif olan bir yönetici kaydını pasif etmek üzeresiniz. Lütfen bu işlemi gerçekleştirmek istediğinizden emin olunuz. \"Onayla\" butonuna tıklayacak olursanız, aktif olan ilgili yönetici kaydı pasif yapılacak olup, sisteme giriş yapamayacaktır. \"İptal\" butonuna tıklayacak olursanız, herhangi bir işlem gerçekleştirilmeden, istek iptal edilecektir. Veritabanı kayıt sayısına göre işlem uzun sürebileceği için lütfen işlem tamamlandı mesajı gelene kadar bekleyiniz.";
		document.getElementById("PasifYapIslemiOnaylaButonu").href							=	"?S=0&SS=82&ID=" + IDDegeri;
		document.getElementById("PasifYapIslemiOnaylaButonuKapsayicisi").style.display		=	"block";
		document.getElementById("PasifYapIslemiIptalButonuKapsayicisi").style.display		=	"block";
	}
	
	function KayitPasifYapIcinModalKapat(){
		document.getElementById("ModalKarartmaAlani").style.display							=	"none";
		document.getElementById("ModalAlani").style.display									=	"none";
		document.getElementById("ModalMetinAlani").innerHTML								=	"";
		document.getElementById("PasifYapIslemiOnaylaButonu").href							=	"";
		document.getElementById("PasifYapIslemiOnaylaButonuKapsayicisi").style.display		=	"none";
		document.getElementById("PasifYapIslemiIptalButonuKapsayicisi").style.display		=	"none";
	}
	
	function KayitAktifYapIcinModalAc(IDDegeri){
		document.getElementById("ModalKarartmaAlani").style.display							=	"block";
		document.getElementById("ModalAlani").style.display									=	"block";
		document.getElementById("ModalMetinAlani").innerHTML								=	"Pasif olan bir yönetici kaydını aktif etmek üzeresiniz. Lütfen bu işlemi gerçekleştirmek istediğinizden emin olunuz. \"Onayla\" butonuna tıklayacak olursanız, pasif olan ilgili yönetici kaydı aktif yapılacak olup, sisteme giriş yapabilecek ve işlem gerçekleştirilebilecektir. \"İptal\" butonuna tıklayacak olursanız, herhangi bir işlem gerçekleştirilmeden, istek iptal edilecektir. Veritabanı kayıt sayısına göre işlem uzun sürebileceği için lütfen işlem tamamlandı mesajı gelene kadar bekleyiniz.";
		document.getElementById("AktifYapIslemiOnaylaButonu").href							=	"?S=0&SS=79&ID=" + IDDegeri;
		document.getElementById("AktifYapIslemiOnaylaButonuKapsayicisi").style.display		=	"block";
		document.getElementById("AktifYapIslemiIptalButonuKapsayicisi").style.display		=	"block";
	}
	
	function KayitAktifYapIcinModalKapat(){
		document.getElementById("ModalKarartmaAlani").style.display							=	"none";
		document.getElementById("ModalAlani").style.display									=	"none";
		document.getElementById("ModalMetinAlani").innerHTML								=	"";
		document.getElementById("AktifYapIslemiOnaylaButonu").href							=	"";
		document.getElementById("AktifYapIslemiOnaylaButonuKapsayicisi").style.display		=	"none";
		document.getElementById("AktifYapIslemiIptalButonuKapsayicisi").style.display		=	"none";
	}
	
	function KayitSilIcinModalAc(IDDegeri){
		document.getElementById("ModalKarartmaAlani").style.display							=	"block";
		document.getElementById("ModalAlani").style.display									=	"block";
		document.getElementById("ModalMetinAlani").innerHTML								=	"Yönetici kaydını tamamen silmek üzeresiniz. İşlem gerçekleştirilecek olur ise, işlemin kesinlikle geri dönüşü yoktur. Lütfen bu işlemi gerçekleştirmek istediğinizden emin olunuz. \"Onayla\" butonuna tıklayacak olursanız, ilgili yönetici kaydı tamamen silinecek olup, bağlantılı tüm verileri de aynı zamanda sistemden silenecektir. \"İptal\" butonuna tıklayacak olursanız, herhangi bir işlem gerçekleştirilmeden, istek iptal edilecektir. Veritabanı kayıt sayısına göre işlem uzun sürebileceği için lütfen işlem tamamlandı mesajı gelene kadar bekleyiniz.";
		document.getElementById("SilIslemiOnaylaButonu").href								=	"?S=0&SS=75&ID=" + IDDegeri;
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
</script>

<div id="ModalKarartmaAlani" class="ModalKarartmaAlaniKapsayicisi" style="display: none;">
	<div id="ModalAlani" class="ModalAlaniKapsayicisi" style="display: none;">
		<div class="ModalBaslikAlaniKapsayicisi">
			Dikkat! Önemli Uyarı!
		</div>
		<div id="ModalMetinAlani" class="ModalMetinAlaniKapsayicisi"></div>
		<div id="ModalButonAlani" class="ModalButonAlaniKapsayicisi">
			<div id="PasifYapIslemiOnaylaButonuKapsayicisi" class="ModalOnaylaButonuAlaniKapsayicisi" style="display: none;"><a id="PasifYapIslemiOnaylaButonu" href="" target="_top">Onayla</a></div>
			<span id="PasifYapIslemiIptalButonuKapsayicisi" class="ModalIptalButonuAlaniKapsayicisi" onClick="KayitPasifYapIcinModalKapat()" style="display: none;">İptal</span>
			<div id="AktifYapIslemiOnaylaButonuKapsayicisi" class="ModalOnaylaButonuAlaniKapsayicisi" style="display: none;"><a id="AktifYapIslemiOnaylaButonu" href="" target="_top">Onayla</a></div>
			<span id="AktifYapIslemiIptalButonuKapsayicisi" class="ModalIptalButonuAlaniKapsayicisi" onClick="KayitAktifYapIcinModalKapat()" style="display: none;">İptal</span>
			<div id="SilIslemiOnaylaButonuKapsayicisi" class="ModalOnaylaButonuAlaniKapsayicisi" style="display: none;"><a id="SilIslemiOnaylaButonu" href="" target="_top">Onayla</a></div>
			<span id="SilIslemiIptalButonuKapsayicisi" class="ModalIptalButonuAlaniKapsayicisi" onClick="KayitSilIcinModalKapat()" style="display: none;">İptal</span>
		</div>
	</div>
</div>

<div id="ListelemeAlaniKapsayicisi">
	<div class="SayfaIciBaslikAlanlariKapsayicisi">
		Yöneticiler
		<span class="SayfaIciBaslikAlanlariIciIconlarAlaniKapsayicisi">
			<div class="SayfaIciBaslikAlanlariIciIconlarKapsayicisi">
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=64" target="_top"><img src="Resimler/IconIslemlerEkle.png" title="Yeni Kayıt Ekle" alt="Yeni Kayıt Ekle"></a>
			</div>
		</span>
	</div>

	<div class="ListelemeAlaniIciAramaAlaniKapsayicisi">
		<div class="ListelemeAlaniIciDetayliAramaButonAlanlariKapsayicisi"><a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=59" target="_top"></a></div>
	
		<form id="AramaFormu" name="AramaFormu" action="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=58" method="POST">
			<div class="ListelemeAlaniIciAramaAlaniButonAlanlariKapsayicisi"><input type="submit" value="" class="ListelemeAlaniIciAramaAlaniAraButonlari" tabindex="2"></div>
			<div class="ListelemeAlaniIciAramaAlaniInputAlanlariKapsayicisi"><div class="IkiYuzPixselSinirliAlanKapsayicisi"><input type="text" id="AramaIcerigi" name="AramaIcerigi" class="ListelemeAlaniIciAramaAlaniTextInputlari" tabindex="1"></div></div>
		</form>
	</div>

	<div class="ListelemeAlaniIciTabloAlaniKapsayicisi">
		<table class="ListelemeAlaniIciTablosu" align="center" cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th class="ListelemeAlaniTablolariSiraBaslikSutunu">Sıra</th>
					<th>Kullanıcı Adı</th>
					<th>Adı</th>
					<th>Soyadı</th>
					<th class="ListelemeAlaniTablolariStandartDurumBaslikSutunu">Durum</th>
					<th class="ListelemeAlaniTablolariTarihBaslikSutunu">Eklenme Tarihi</th>
					<th class="ListelemeAlaniTablolariBesliBaslikSutunu">İşlemler</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$YoneticilerSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM yoneticiler ORDER BY SiraNumarasi ASC LIMIT $SayfalamayaBaslanacakKayitSayisi, $SiteAyarlariKaydiYoneticilerSayfasiListelemeLimiti");
			$YoneticilerSorgusuKayitSayisi	=	$YoneticilerSorgusu->num_rows;
				if($YoneticilerSorgusuKayitSayisi>0){
					$YoneticilerinSonSiraNumarasiniBul		=	$VeritabaniBaglantisi->query("SELECT * FROM yoneticiler ORDER BY SiraNumarasi DESC LIMIT 1");
					$YoneticilerinSonSiraNumarasiniBulKaydi	=	$YoneticilerinSonSiraNumarasiniBul->fetch_assoc();
						$YoneticilerinSonSiraNumarasiniBulKaydiSiraNumarasi		=	$YoneticilerinSonSiraNumarasiniBulKaydi["SiraNumarasi"];
			
					while($YoneticilerSorgusuKayitlari=$YoneticilerSorgusu->fetch_assoc()){
						$YoneticilerSorgusuKayitlariID						=	$YoneticilerSorgusuKayitlari["ID"];
						$YoneticilerSorgusuKayitlariYoneticiKullaniciAdi	=	$YoneticilerSorgusuKayitlari["YoneticiKullaniciAdi"];
						$YoneticilerSorgusuKayitlariYoneticiAdi				=	$YoneticilerSorgusuKayitlari["YoneticiAdi"];
						$YoneticilerSorgusuKayitlariYoneticiSoyadi			=	$YoneticilerSorgusuKayitlari["YoneticiSoyadi"];
						$YoneticilerSorgusuKayitlariEklenmeTarihi			=	$YoneticilerSorgusuKayitlari["EklenmeTarihi"];
						$YoneticilerSorgusuKayitlariSiraNumarasi			=	$YoneticilerSorgusuKayitlari["SiraNumarasi"];
						$YoneticilerSorgusuKayitlariCalismaDurumu			=	$YoneticilerSorgusuKayitlari["CalismaDurumu"];
							if($YoneticilerSorgusuKayitlariCalismaDurumu==1){
								$YoneticilerSorgusuKayitlariCalismaDurumuYaz	=	"Aktif";
							}else{
								$YoneticilerSorgusuKayitlariCalismaDurumuYaz	=	"Pasif";
							}
			?>
				<tr>
					<td>
						<div class="ListelemeAlaniIciTablolariSiraSutunuRakamAlani">
							<?php if($YoneticilerSorgusuKayitlariCalismaDurumu==0){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($YoneticilerSorgusuKayitlariSiraNumarasi); ?></span>
						</div>
						
						<div class="ListelemeAlaniIciTablolariSiraSutunuIconlarAlani">
							<div class="ListelemeAlaniIciTablolariSiraSutunuBirSiraYukariIconuAlani" <?php if($YoneticilerSorgusuKayitlariSiraNumarasi==1){ ?>style="display: none;"<?php } ?>>
								<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=88&ID=<?php echo $YoneticilerSorgusuKayitlariID; ?>&Sayfalama=<?php echo $GelenSayfalama; ?>" target="_top"><img src="Resimler/BirSiraYukari.png" width="10" height="5" title="Bir Sıra Yukarı Taşı" alt="Bir Sıra Yukarı Taşı"></a>
							</div>
							<div class="ListelemeAlaniIciTablolariSiraSutunuBirSiraAsagiIconuAlani" <?php if($YoneticilerSorgusuKayitlariSiraNumarasi==$YoneticilerinSonSiraNumarasiniBulKaydiSiraNumarasi){ ?>style="display: none;"<?php } ?>>
								<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=86&ID=<?php echo $YoneticilerSorgusuKayitlariID; ?>&Sayfalama=<?php echo $GelenSayfalama; ?>" target="_top"><img src="Resimler/BirSiraAsagi.png" width="10" height="5" title="Bir Sıra Aşağı Taşı" alt="Bir Sıra Aşağı Taşı"></a>
							</div>
						</div>
					</td>
					
					<td>
						<?php if($YoneticilerSorgusuKayitlariCalismaDurumu==0){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($YoneticilerSorgusuKayitlariYoneticiKullaniciAdi); ?></span>
					</td>
					
					<td>
						<?php if($YoneticilerSorgusuKayitlariCalismaDurumu==0){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($YoneticilerSorgusuKayitlariYoneticiAdi); ?></span>
					</td>
					
					<td>
						<?php if($YoneticilerSorgusuKayitlariCalismaDurumu==0){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($YoneticilerSorgusuKayitlariYoneticiSoyadi); ?></span>
					</td>
					
					<td class="ListelemeAlaniTablolariStandartDurumSutunu">
						<?php if($YoneticilerSorgusuKayitlariCalismaDurumu==0){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($YoneticilerSorgusuKayitlariCalismaDurumuYaz); ?></span>
					</td>
					
					<td class="ListelemeAlaniTablolariTarihSutunu">
						<?php if($YoneticilerSorgusuKayitlariCalismaDurumu==0){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($YoneticilerSorgusuKayitlariEklenmeTarihi); ?></span>
					</td>
					
					<td class="ListelemeAlaniTablolariBesliSutunu">
						<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=63&ID=<?php echo $YoneticilerSorgusuKayitlariID; ?>" target="_top"><img src="Resimler/IconIslemlerDetay.png" width="20" height="20" title="Detay" alt="Detay"></a>
						<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=61&ID=<?php echo $YoneticilerSorgusuKayitlariID; ?>" target="_top"><img src="Resimler/IconIslemlerLog.png" width="20" height="20" title="Giriş Logları" alt="Giriş Logları"></a>
						<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=69&ID=<?php echo $YoneticilerSorgusuKayitlariID; ?>" target="_top"><img src="Resimler/IconIslemlerGuncelle.png" width="20" height="20" title="Güncelle" alt="Güncelle"></a>
						<?php if($YoneticilerSorgusuKayitlariCalismaDurumu==0){ ?>
							<a href="javascript:KayitAktifYapIcinModalAc(<?php echo $YoneticilerSorgusuKayitlariID; ?>)"><img src="Resimler/IconIslemlerPasif.png" width="20" height="20" title="Aktif Yap" alt="Aktif Yap"></a>
						<?php }else{ ?>
							<a href="javascript:KayitPasifYapIcinModalAc(<?php echo $YoneticilerSorgusuKayitlariID; ?>)"><img src="Resimler/IconIslemlerAktif.png" width="20" height="20" title="Pasif Yap" alt="Pasif Yap"></a>
						<?php } ?>
						<a href="javascript:KayitSilIcinModalAc(<?php echo $YoneticilerSorgusuKayitlariID; ?>)"><img src="Resimler/IconIslemlerSil.png" width="20" height="20" title="Sil" alt="Sil"></a>
					</td>
				</tr>
			<?php
					}
				}else{
			?>	
				<tr>
					<td colspan="7">Sisteme kayıtlı yönetici kaydı bulunmamaktadır.</td>
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
			echo 	"<span class=\"Pasif\"><a href=\"http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=57&Sayfalama=1\" target=\"_top\"><img src=\"Resimler/IconSayfalamaIlk.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";
			$SayfalamaIcinSayfaDegeriniBirGeriAl	=	$GelenSayfalama-1;
			echo 	"<span class=\"Pasif\"><a href=\"http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=57&Sayfalama=".$SayfalamaIcinSayfaDegeriniBirGeriAl."\" target=\"_top\"><img src=\"Resimler/IconSayfalamaBirGeri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
		}
								
		for($SayfalamaIcinSayfaIndexDegeri=$GelenSayfalama-$SayfalamaIcinSolveSagButonSayisi; $SayfalamaIcinSayfaIndexDegeri<=$GelenSayfalama+$SayfalamaIcinSolveSagButonSayisi; $SayfalamaIcinSayfaIndexDegeri++){
			if(($SayfalamaIcinSayfaIndexDegeri>0) and ($SayfalamaIcinSayfaIndexDegeri<=$BulunanSayfaSayisi)){
				if($SayfalamaIcinSayfaIndexDegeri==$GelenSayfalama){
					echo 	"<span class=\"Aktif\">".$SayfalamaIcinSayfaIndexDegeri."</span>";
				}else{
					echo 	"<span class=\"Pasif\"><a href=\"http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=57&Sayfalama=".$SayfalamaIcinSayfaIndexDegeri."\" target=\"_top\">".$SayfalamaIcinSayfaIndexDegeri."</a></span>";
				}
			}
		}

		if($GelenSayfalama!=$BulunanSayfaSayisi){
			$SayfalamaIcinSayfaDegeriniBirIleriAl	=	$GelenSayfalama+1;
			echo 	"<span class=\"Pasif\"><a href=\"http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=57&Sayfalama=".$SayfalamaIcinSayfaDegeriniBirIleriAl."\" target=\"_top\"><img src=\"Resimler/IconSayfalamaBirIleri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
			echo 	"<span class=\"Pasif\"><a href=\"http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=57&Sayfalama=".$BulunanSayfaSayisi."\" target=\"_top\"><img src=\"Resimler/IconSayfalamaSon.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";			
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