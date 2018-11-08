<? if(isset($_SESSION["Yonetici"])){
	$GelenAramaIcerigi		=	HarfliVeSayiliIcerikleriFiltrele(html_entity_decode(urldecode($_REQUEST["AramaIcerigi"]), ENT_QUOTES, "UTF-8"));

	$ToplamKayitSayisiSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM kisilerdisaaktarimdosyalari WHERE Baslik LIKE '%$GelenAramaIcerigi%'");
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
		document.getElementById("ModalMetinAlani").innerHTML								=	"Dosya kaydını tamamen silmek üzeresiniz. İşlem gerçekleştirilecek olur ise, işlemin kesinlikle geri dönüşü yoktur. Lütfen bu işlemi gerçekleştirmek istediğinizden emin olunuz. \"Onayla\" butonuna tıklayacak olursanız, ilgili dosya kaydı sistemden tamamen silenecektir. \"İptal\" butonuna tıklayacak olursanız, herhangi bir işlem gerçekleştirilmeden, istek iptal edilecektir. Veritabanı kayıt sayısına göre işlem uzun sürebileceği için lütfen işlem tamamlandı mesajı gelene kadar bekleyiniz.";
		document.getElementById("SilIslemiOnaylaButonu").href								=	"?S=0&SS=177&ID=" + IDDegeri;
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
		document.getElementById("ModalMetinAlani").innerHTML								=	"Seçilen dosya kayıtlarını tamamen silmek üzeresiniz. İşlem gerçekleştirilecek olur ise, işlemin kesinlikle geri dönüşü yoktur. Lütfen bu işlemi gerçekleştirmek istediğinizden emin olunuz. \"Onayla\" butonuna tıklayacak olursanız, seçili dosya kayıtları sistemden tamamen silenecektir. \"İptal\" butonuna tıklayacak olursanız, herhangi bir işlem gerçekleştirilmeden, istek iptal edilecektir. Veritabanı kayıt sayısına göre işlem uzun sürebileceği için lütfen işlem tamamlandı mesajı gelene kadar bekleyiniz.";
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
		<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=144" target="_top">Kişiler</a> > <a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=175" target="_top">Dışa Aktarım Klasörü</a> > Arama Sonuç
		<span class="SayfaIciBaslikAlanlariIciIconlarAlaniKapsayicisi">
			<div class="SayfaIciBaslikAlanlariIciIconlarKapsayicisi">
				<a href="javascript:TopluKayitSilIcinModalAc()"><img src="Resimler/IconIslemlerTopluSil.png" title="Toplu Sil" alt="Toplu Sil"></a>
			</div>
		</span>
	</div>
			
	<div class="ListelemeAlaniIciAramaAlaniKapsayicisi">
		<form id="AramaFormu" name="AramaFormu" action="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=176" method="POST">
			<div class="ListelemeAlaniIciAramaAlaniButonAlanlariKapsayicisi"><input type="submit" value="" class="ListelemeAlaniIciAramaAlaniAraButonlari" tabindex="2"></div>
			<div class="ListelemeAlaniIciAramaAlaniInputAlanlariKapsayicisi"><div class="IkiYuzPixselSinirliAlanKapsayicisi"><input type="text" id="AramaIcerigi" name="AramaIcerigi" value="<?php echo $GelenAramaIcerigi; ?>" class="ListelemeAlaniIciAramaAlaniTextInputlari" tabindex="1"></div></div>
		</form>
	</div>
			
	<div class="ListelemeAlaniIciTabloAlaniKapsayicisi">
		<form id="TopluKayitSilmeFormu" name="TopluKayitSilmeFormu" action="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=180" method="POST">
			<table class="ListelemeAlaniIciTablosu" align="center" cellpadding="0" cellspacing="0">
				<thead>
					<tr>
						<th class="ListelemeAlaniTablolariSecIptalBaslikSutunu"><span id="SecIptalMetinAlani" onClick="SecIptalAlaniDegistir('IDler[]')">Seç</span></th>
						<th>Başlık</th>
						<th class="ListelemeAlaniTablolariKayitSayisiBaslikSutunu">Kayıt Sayısı</th>
						<th class="ListelemeAlaniTablolariDosyaSayisiBaslikSutunu">Dosya Sayısı</th>
						<th class="ListelemeAlaniTablolariDosyaBoyutuBaslikSutunu">Dosya Boyutu</th>
						<th class="ListelemeAlaniTablolariTarihBaslikSutunu">Eklenme Tarihi</th>
						<th class="ListelemeAlaniTablolariTarihBaslikSutunu">Tamamlanma Tarihi</th>
						<th class="ListelemeAlaniTablolariUcluIkiliTekliBaslikSutunu">İşlemler</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$DisaAktarimKlasoruSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM kisilerdisaaktarimdosyalari WHERE Baslik LIKE '%$GelenAramaIcerigi%' ORDER BY EklenmeTarihiZamanDamgasi DESC LIMIT $SayfalamayaBaslanacakKayitSayisi, $SiteAyarlariKaydiKisilerSayfasiListelemeLimiti");
				$DisaAktarimKlasoruSorgusuKayitSayisi	=	$DisaAktarimKlasoruSorgusu->num_rows;
					if($DisaAktarimKlasoruSorgusuKayitSayisi>0){
						while($DisaAktarimKlasoruSorgusuKayitlari=$DisaAktarimKlasoruSorgusu->fetch_assoc()){
							$DisaAktarimKlasoruSorgusuKayitlariID						=	$DisaAktarimKlasoruSorgusuKayitlari["ID"];
							$DisaAktarimKlasoruSorgusuKayitlariBaslik					=	$DisaAktarimKlasoruSorgusuKayitlari["Baslik"];
							$DisaAktarimKlasoruSorgusuKayitlariDosyaAdi					=	$DisaAktarimKlasoruSorgusuKayitlari["DosyaAdi"];
							$DisaAktarimKlasoruSorgusuKayitlariKayitSayisi				=	$DisaAktarimKlasoruSorgusuKayitlari["KayitSayisi"];							
							$DisaAktarimKlasoruSorgusuKayitlariDosyaSayisi				=	$DisaAktarimKlasoruSorgusuKayitlari["DosyaSayisi"];
							$DisaAktarimKlasoruSorgusuKayitlariDosyaBoyutu				=	$DisaAktarimKlasoruSorgusuKayitlari["DosyaBoyutu"];
							$DisaAktarimKlasoruSorgusuKayitlariEklenmeTarihi			=	$DisaAktarimKlasoruSorgusuKayitlari["EklenmeTarihi"];
							$DisaAktarimKlasoruSorgusuKayitlariTamamlanmaDurumu			=	$DisaAktarimKlasoruSorgusuKayitlari["TamamlanmaDurumu"];
							$DisaAktarimKlasoruSorgusuKayitlariTamamlanmaTarihi			=	$DisaAktarimKlasoruSorgusuKayitlari["TamamlanmaTarihi"];
				?>
					<tr>
						<td>
							<?php if($DisaAktarimKlasoruSorgusuKayitlariTamamlanmaDurumu==1){ ?>
							<div class="ListelemeAlaniIciTablolariSecIptalSutunuCheckBoxAlanlari">
								<div class="ListelemeAlaniIciTumCheckboxAlanlariKapsayicisi">
									<label class="ListelemeAlaniIciCheckboxAlanlari">
										<input type="checkbox" id="IDler[<?php echo $DisaAktarimKlasoruSorgusuKayitlariID; ?>]" name="IDler[]" value="<?php echo $DisaAktarimKlasoruSorgusuKayitlariID; ?>" class="ListelemeAlaniIciCheckboxInputlari">
										<span class="ListelemeAlaniIciCheckboxAlanlariIcinBicimlendirmeAlani"></span>
									</label>
								</div>
							</div>
							<?php }else{ ?>
								&nbsp;
							<?php } ?>
						</td>
						
						<td>
							<?php if($DisaAktarimKlasoruSorgusuKayitlariTamamlanmaDurumu==0){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($DisaAktarimKlasoruSorgusuKayitlariBaslik); ?></span>
						</td>
						
						<td class="ListelemeAlaniTablolariKayitSayisiSutunu">
							<?php if($DisaAktarimKlasoruSorgusuKayitlariTamamlanmaDurumu==0){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($DisaAktarimKlasoruSorgusuKayitlariKayitSayisi); ?></span>
						</td>
						
						<td class="ListelemeAlaniTablolariDosyaSayisiSutunu">
							<?php if($DisaAktarimKlasoruSorgusuKayitlariTamamlanmaDurumu==0){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($DisaAktarimKlasoruSorgusuKayitlariDosyaSayisi); ?></span>
						</td>
						
						<td class="ListelemeAlaniTablolariDosyaBoyutuSutunu">
							<?php if($DisaAktarimKlasoruSorgusuKayitlariTamamlanmaDurumu==0){ ?><span class="TuruncuYazi">0 B</span><?php }else{ ?><?php echo DonusumleriGeriDondur($DisaAktarimKlasoruSorgusuKayitlariDosyaBoyutu); ?><?php } ?>
						</td>
						
						<td class="ListelemeAlaniTablolariTarihSutunu">
							<?php if($DisaAktarimKlasoruSorgusuKayitlariTamamlanmaDurumu==0){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($DisaAktarimKlasoruSorgusuKayitlariEklenmeTarihi); ?></span>
						</td>
						
						<td class="ListelemeAlaniTablolariTarihSutunu">
							<?php if($DisaAktarimKlasoruSorgusuKayitlariTamamlanmaDurumu==0){ ?><span class="TuruncuYazi">Hazırlanıyor</span><?php }else{ ?><?php echo DonusumleriGeriDondur($DisaAktarimKlasoruSorgusuKayitlariTamamlanmaTarihi); ?><?php } ?>
						</td>
						
						<td class="ListelemeAlaniTablolariUcluIkiliTekliSutunu">
							<?php if($DisaAktarimKlasoruSorgusuKayitlariTamamlanmaDurumu==1){ ?>
								<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/Dosyalar/<?php echo DonusumleriGeriDondur($DisaAktarimKlasoruSorgusuKayitlariDosyaAdi); ?>" download><img src="Resimler/IconIslemlerIndir.png" width="20" height="20" title="İndir" alt="İndir"></a>
								<a href="javascript:KayitSilIcinModalAc(<?php echo $DisaAktarimKlasoruSorgusuKayitlariID; ?>)"><img src="Resimler/IconIslemlerSil.png" width="20" height="20" title="Sil" alt="Sil"></a>
							<?php }else{ ?>
								&nbsp;
							<?php } ?>
						</td>
					</tr>
				<?php
						}
					}else{
				?>	
					<tr>
						<td colspan="8">Arama kriterlerine uygun sisteme kayıtlı dışa aktarım dosya kaydı bulunmamaktadır.</td>
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
			echo 	"<span class=\"Pasif\"><a href=\"http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=176&Sayfalama=1&AramaIcerigi=".urlencode($GelenAramaIcerigi)."\" target=\"_top\"><img src=\"Resimler/IconSayfalamaIlk.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";
			$SayfalamaIcinSayfaDegeriniBirGeriAl	=	$GelenSayfalama-1;
			echo 	"<span class=\"Pasif\"><a href=\"http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=176&Sayfalama=".$SayfalamaIcinSayfaDegeriniBirGeriAl."&AramaIcerigi=".urlencode($GelenAramaIcerigi)."\" target=\"_top\"><img src=\"Resimler/IconSayfalamaBirGeri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
		}
								
		for($SayfalamaIcinSayfaIndexDegeri=$GelenSayfalama-$SayfalamaIcinSolveSagButonSayisi; $SayfalamaIcinSayfaIndexDegeri<=$GelenSayfalama+$SayfalamaIcinSolveSagButonSayisi; $SayfalamaIcinSayfaIndexDegeri++){
			if(($SayfalamaIcinSayfaIndexDegeri>0) and ($SayfalamaIcinSayfaIndexDegeri<=$BulunanSayfaSayisi)){
				if($SayfalamaIcinSayfaIndexDegeri==$GelenSayfalama){
					echo 	"<span class=\"Aktif\">".$SayfalamaIcinSayfaIndexDegeri."</span>";
				}else{
					echo 	"<span class=\"Pasif\"><a href=\"http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=176&Sayfalama=".$SayfalamaIcinSayfaIndexDegeri."&AramaIcerigi=".urlencode($GelenAramaIcerigi)."\" target=\"_top\">".$SayfalamaIcinSayfaIndexDegeri."</a></span>";
				}
			}
		}

		if($GelenSayfalama!=$BulunanSayfaSayisi){
			$SayfalamaIcinSayfaDegeriniBirIleriAl	=	$GelenSayfalama+1;
			echo 	"<span class=\"Pasif\"><a href=\"http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=176&Sayfalama=".$SayfalamaIcinSayfaDegeriniBirIleriAl."&AramaIcerigi=".urlencode($GelenAramaIcerigi)."\" target=\"_top\"><img src=\"Resimler/IconSayfalamaBirIleri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
			echo 	"<span class=\"Pasif\"><a href=\"http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=176&Sayfalama=".$BulunanSayfaSayisi."&AramaIcerigi=".urlencode($GelenAramaIcerigi)."\" target=\"_top\"><img src=\"Resimler/IconSayfalamaSon.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";			
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