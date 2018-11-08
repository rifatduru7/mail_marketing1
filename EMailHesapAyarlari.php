<? if(isset($_SESSION["Yonetici"])){
	$ToplamKayitSayisiSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM emailhesapayarlari");
	$ToplamKayitSayisi						=	$ToplamKayitSayisiSorgusu->num_rows;
	$SayfalamayaBaslanacakKayitSayisi		=	($GelenSayfalama*$SiteAyarlariKaydiEMailHesaplariAyarlariSayfasiListelemeLimiti)-$SiteAyarlariKaydiEMailHesaplariAyarlariSayfasiListelemeLimiti;
	$BulunanSayfaSayisi						=	ceil($ToplamKayitSayisi/$SiteAyarlariKaydiEMailHesaplariAyarlariSayfasiListelemeLimiti);
?>
<script type="text/javascript" language="javascript">
	function KayitPasifYapIcinModalAc(IDDegeri){
		document.getElementById("ModalKarartmaAlani").style.display							=	"block";
		document.getElementById("ModalAlani").style.display									=	"block";
		document.getElementById("ModalMetinAlani").innerHTML								=	"Aktif olan bir e-mail hesap kaydını pasif etmek üzeresiniz. Lütfen bu işlemi gerçekleştirmek istediğinizden emin olunuz. \"Onayla\" butonuna tıklayacak olursanız, aktif olan ilgili e-mail hesap kaydı pasif yapılacak olup, mail gönderimi yapamayacaktır. \"İptal\" butonuna tıklayacak olursanız, herhangi bir işlem gerçekleştirilmeden, istek iptal edilecektir. Veritabanı kayıt sayısına göre işlem uzun sürebileceği için lütfen işlem tamamlandı mesajı gelene kadar bekleyiniz.";
		document.getElementById("PasifYapIslemiOnaylaButonu").href							=	"?S=0&SS=136&ID=" + IDDegeri;
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
		document.getElementById("ModalMetinAlani").innerHTML								=	"Pasif olan bir e-mail hesap kaydını aktif etmek üzeresiniz. Lütfen bu işlemi gerçekleştirmek istediğinizden emin olunuz. \"Onayla\" butonuna tıklayacak olursanız, pasif olan ilgili e-mail hesap kaydı aktif yapılacak olup, mail gönderimi yapabilecektir. \"İptal\" butonuna tıklayacak olursanız, herhangi bir işlem gerçekleştirilmeden, istek iptal edilecektir. Veritabanı kayıt sayısına göre işlem uzun sürebileceği için lütfen işlem tamamlandı mesajı gelene kadar bekleyiniz.";
		document.getElementById("AktifYapIslemiOnaylaButonu").href							=	"?S=0&SS=133&ID=" + IDDegeri;
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
	
	function KayitDinlendirIcinModalAc(IDDegeri){
		document.getElementById("ModalKarartmaAlani").style.display							=	"block";
		document.getElementById("ModalAlani").style.display									=	"block";
		document.getElementById("ModalMetinAlani").innerHTML								=	"E-mail hesap kaydını dinlendirmek etmek üzeresiniz. Lütfen bu işlemi gerçekleştirmek istediğinizden emin olunuz. \"Onayla\" butonuna tıklayacak olursanız, ilgili e-mail hesap kaydı bir sonraki aşamada belirtilecek olan süre kadardinlendirilme moduna geçecek olup, mail gönderimi yapamayacaktır. \"İptal\" butonuna tıklayacak olursanız, herhangi bir işlem gerçekleştirilmeden, istek iptal edilecektir. Veritabanı kayıt sayısına göre işlem uzun sürebileceği için lütfen işlem tamamlandı mesajı gelene kadar bekleyiniz.";
		document.getElementById("DinlendirIslemiOnaylaButonu").href							=	"?S=0&SS=126&ID=" + IDDegeri;
		document.getElementById("DinlendirIslemiOnaylaButonuKapsayicisi").style.display		=	"block";
		document.getElementById("DinlendirIslemiIptalButonuKapsayicisi").style.display		=	"block";
	}
	
	function KayitDinlendirIcinModalKapat(){
		document.getElementById("ModalKarartmaAlani").style.display							=	"none";
		document.getElementById("ModalAlani").style.display									=	"none";
		document.getElementById("ModalMetinAlani").innerHTML								=	"";
		document.getElementById("DinlendirIslemiOnaylaButonu").href							=	"";
		document.getElementById("DinlendirIslemiOnaylaButonuKapsayicisi").style.display		=	"none";
		document.getElementById("DinlendirIslemiIptalButonuKapsayicisi").style.display		=	"none";
	}
	
	function KayitGeriAcIcinModalAc(IDDegeri){
		document.getElementById("ModalKarartmaAlani").style.display							=	"block";
		document.getElementById("ModalAlani").style.display									=	"block";
		document.getElementById("ModalMetinAlani").innerHTML								=	"Dinlendirilme modunda olan bir e-mail hesap kaydını geri açmak üzeresiniz. Lütfen bu işlemi gerçekleştirmek istediğinizden emin olunuz. \"Onayla\" butonuna tıklayacak olursanız, ilgili e-mail hesap kaydı geri açılacak olup, mail gönderimi yapabilecektir. \"İptal\" butonuna tıklayacak olursanız, herhangi bir işlem gerçekleştirilmeden, istek iptal edilecektir. Veritabanı kayıt sayısına göre işlem uzun sürebileceği için lütfen işlem tamamlandı mesajı gelene kadar bekleyiniz.";
		document.getElementById("GeriAcIslemiOnaylaButonu").href							=	"?S=0&SS=130&ID=" + IDDegeri;
		document.getElementById("GeriAcIslemiOnaylaButonuKapsayicisi").style.display		=	"block";
		document.getElementById("GeriAcIslemiIptalButonuKapsayicisi").style.display			=	"block";
	}
	
	function KayitGeriAcIcinModalKapat(){
		document.getElementById("ModalKarartmaAlani").style.display							=	"none";
		document.getElementById("ModalAlani").style.display									=	"none";
		document.getElementById("ModalMetinAlani").innerHTML								=	"";
		document.getElementById("GeriAcIslemiOnaylaButonu").href							=	"";
		document.getElementById("GeriAcIslemiOnaylaButonuKapsayicisi").style.display		=	"none";
		document.getElementById("GeriAcIslemiIptalButonuKapsayicisi").style.display			=	"none";
	}
	
	function KayitSilIcinModalAc(IDDegeri){
		document.getElementById("ModalKarartmaAlani").style.display							=	"block";
		document.getElementById("ModalAlani").style.display									=	"block";
		document.getElementById("ModalMetinAlani").innerHTML								=	"E-Mail hesap kaydını tamamen silmek üzeresiniz. İşlem gerçekleştirilecek olur ise, işlemin kesinlikle geri dönüşü yoktur. Lütfen bu işlemi gerçekleştirmek istediğinizden emin olunuz. \"Onayla\" butonuna tıklayacak olursanız, ilgili e-mail hesap kaydı tamamen silinecek olup, bağlantılı tüm verileri de aynı zamanda sistemden silenecektir. \"İptal\" butonuna tıklayacak olursanız, herhangi bir işlem gerçekleştirilmeden, istek iptal edilecektir. Veritabanı kayıt sayısına göre işlem uzun sürebileceği için lütfen işlem tamamlandı mesajı gelene kadar bekleyiniz.";
		document.getElementById("SilIslemiOnaylaButonu").href								=	"?S=0&SS=123&ID=" + IDDegeri;
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
			<div id="DinlendirIslemiOnaylaButonuKapsayicisi" class="ModalOnaylaButonuAlaniKapsayicisi" style="display: none;"><a id="DinlendirIslemiOnaylaButonu" href="" target="_top">Onayla</a></div>
			<span id="DinlendirIslemiIptalButonuKapsayicisi" class="ModalIptalButonuAlaniKapsayicisi" onClick="KayitDinlendirIcinModalKapat()" style="display: none;">İptal</span>
			<div id="GeriAcIslemiOnaylaButonuKapsayicisi" class="ModalOnaylaButonuAlaniKapsayicisi" style="display: none;"><a id="GeriAcIslemiOnaylaButonu" href="" target="_top">Onayla</a></div>
			<span id="GeriAcIslemiIptalButonuKapsayicisi" class="ModalIptalButonuAlaniKapsayicisi" onClick="KayitGeriAcIcinModalKapat()" style="display: none;">İptal</span>
			<div id="SilIslemiOnaylaButonuKapsayicisi" class="ModalOnaylaButonuAlaniKapsayicisi" style="display: none;"><a id="SilIslemiOnaylaButonu" href="" target="_top">Onayla</a></div>
			<span id="SilIslemiIptalButonuKapsayicisi" class="ModalIptalButonuAlaniKapsayicisi" onClick="KayitSilIcinModalKapat()" style="display: none;">İptal</span>
		</div>
	</div>
</div>

<div id="ListelemeAlaniKapsayicisi">
	<div class="SayfaIciBaslikAlanlariKapsayicisi">
		E-Mail Hesapları
		<span class="SayfaIciBaslikAlanlariIciIconlarAlaniKapsayicisi">
			<div class="SayfaIciBaslikAlanlariIciIconlarKapsayicisi">
				<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=114" target="_top"><img src="Resimler/IconIslemlerEkle.png" title="Yeni Kayıt Ekle" alt="Yeni Kayıt Ekle"></a>
			</div>
		</span>
	</div>

	<div class="ListelemeAlaniIciAramaAlaniKapsayicisi">
		<div class="ListelemeAlaniIciDetayliAramaButonAlanlariKapsayicisi"><a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=111" target="_top"></a></div>
	
		<form id="AramaFormu" name="AramaFormu" action="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=110" method="POST">
			<div class="ListelemeAlaniIciAramaAlaniButonAlanlariKapsayicisi"><input type="submit" value="" class="ListelemeAlaniIciAramaAlaniAraButonlari" tabindex="2"></div>
			<div class="ListelemeAlaniIciAramaAlaniInputAlanlariKapsayicisi"><div class="IkiYuzPixselSinirliAlanKapsayicisi"><input type="text" id="AramaIcerigi" name="AramaIcerigi" class="ListelemeAlaniIciAramaAlaniTextInputlari" tabindex="1"></div></div>
		</form>
	</div>

	<div class="ListelemeAlaniIciTabloAlaniKapsayicisi">
		<table class="ListelemeAlaniIciTablosu" align="center" cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th class="ListelemeAlaniTablolariSiraBaslikSutunu">Sıra</th>
					<th>E-Mail Adresi</th>
					<th class="ListelemeAlaniTablolariMailSayisiBaslikSutunu">Gönderilen Mail Sayısı</th>
					<th class="ListelemeAlaniTablolariGenisDurumBaslikSutunu">Durum</th>
					<th class="ListelemeAlaniTablolariTarihBaslikSutunu">Eklenme Tarihi</th>
					<th class="ListelemeAlaniTablolariAltiliBaslikSutunu">İşlemler</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$EMailHesaplari				=	$VeritabaniBaglantisi->query("SELECT * FROM emailhesapayarlari ORDER BY SiraNumarasi ASC LIMIT $SayfalamayaBaslanacakKayitSayisi, $SiteAyarlariKaydiEMailHesaplariAyarlariSayfasiListelemeLimiti");
			$EMailHesaplariKayitSayisi	=	$EMailHesaplari->num_rows;
				if($EMailHesaplariKayitSayisi>0){
					$EMailHesaplarininSonSiraNumarasiniBul		=	$VeritabaniBaglantisi->query("SELECT * FROM emailhesapayarlari ORDER BY SiraNumarasi DESC LIMIT 1");
					$EMailHesaplarininSonSiraNumarasiniBulKaydi	=	$EMailHesaplarininSonSiraNumarasiniBul->fetch_assoc();
						$EMailHesaplarininSonSiraNumarasiniBulKaydiSiraNumarasi		=	$EMailHesaplarininSonSiraNumarasiniBulKaydi["SiraNumarasi"];
			
					while($EMailHesaplariKayitlari=$EMailHesaplari->fetch_assoc()){
						$EMailHesaplariKayitlariID						=	$EMailHesaplariKayitlari["ID"];
						$EMailHesaplariKayitlariEMailAdresi				=	$EMailHesaplariKayitlari["EMailAdresi"];
						$EMailHesaplariKayitlariGonderilenMailSayisi	=	$EMailHesaplariKayitlari["GonderilenMailSayisi"];
						$EMailHesaplariKayitlariEklenmeTarihi			=	$EMailHesaplariKayitlari["EklenmeTarihi"];
						$EMailHesaplariKayitlariSiraNumarasi			=	$EMailHesaplariKayitlari["SiraNumarasi"];
						$EMailHesaplariKayitlariCalismaDurumu			=	$EMailHesaplariKayitlari["CalismaDurumu"];
						$EMailHesaplariKayitlariDinlendirmeDurumu		=	$EMailHesaplariKayitlari["DinlendirmeDurumu"];
							if($EMailHesaplariKayitlariCalismaDurumu==1){
								if($EMailHesaplariKayitlariDinlendirmeDurumu==0){
									$EMailHesaplariKayitlariCalismaDurumuYaz	=	"Aktif";
								}else{
									$EMailHesaplariKayitlariCalismaDurumuYaz	=	"Aktif / Dinlendiriliyor";
								}
							}else{
								if($EMailHesaplariKayitlariDinlendirmeDurumu==0){
									$EMailHesaplariKayitlariCalismaDurumuYaz	=	"Pasif";
								}else{
									$EMailHesaplariKayitlariCalismaDurumuYaz	=	"Pasif / Dinlendiriliyor";
								}
							}
			?>
				<tr>
					<td>
						<div class="ListelemeAlaniIciTablolariSiraSutunuRakamAlani">
							<?php if($EMailHesaplariKayitlariDinlendirmeDurumu==1){ ?><span class="MaviYazi"><?php }elseif(($EMailHesaplariKayitlariDinlendirmeDurumu==0) and ($EMailHesaplariKayitlariCalismaDurumu==0)){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($EMailHesaplariKayitlariSiraNumarasi); ?></span>
						</div>
							
						<div class="ListelemeAlaniIciTablolariSiraSutunuIconlarAlani">
							<div class="ListelemeAlaniIciTablolariSiraSutunuBirSiraYukariIconuAlani" <?php if($EMailHesaplariKayitlariSiraNumarasi==1){ ?>style="display: none;"<?php } ?>>
								<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=141&ID=<?php echo $EMailHesaplariKayitlariID; ?>&Sayfalama=<?php echo $GelenSayfalama; ?>" target="_top"><img src="Resimler/BirSiraYukari.png" width="10" height="5" title="Bir Sıra Yukarı Taşı" alt="Bir Sıra Yukarı Taşı"></a>
							</div>
							<div class="ListelemeAlaniIciTablolariSiraSutunuBirSiraAsagiIconuAlani" <?php if($EMailHesaplariKayitlariSiraNumarasi==$EMailHesaplarininSonSiraNumarasiniBulKaydiSiraNumarasi){ ?>style="display: none;"<?php } ?>>
								<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=139&ID=<?php echo $EMailHesaplariKayitlariID; ?>&Sayfalama=<?php echo $GelenSayfalama; ?>" target="_top"><img src="Resimler/BirSiraAsagi.png" width="10" height="5" title="Bir Sıra Aşağı Taşı" alt="Bir Sıra Aşağı Taşı"></a>
							</div>
						</div>
					</td>
					
					<td>
						<a href="mailto:<?php echo DonusumleriGeriDondur($EMailHesaplariKayitlariEMailAdresi); ?>"><?php if($EMailHesaplariKayitlariDinlendirmeDurumu==1){ ?><span class="MaviYazi"><?php }elseif(($EMailHesaplariKayitlariDinlendirmeDurumu==0) and ($EMailHesaplariKayitlariCalismaDurumu==0)){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($EMailHesaplariKayitlariEMailAdresi); ?></span></a>
					</td>
					
					<td class="ListelemeAlaniTablolariMailSayisiSutunu">
						<?php if($EMailHesaplariKayitlariDinlendirmeDurumu==1){ ?><span class="MaviYazi"><?php }elseif(($EMailHesaplariKayitlariDinlendirmeDurumu==0) and ($EMailHesaplariKayitlariCalismaDurumu==0)){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($EMailHesaplariKayitlariGonderilenMailSayisi); ?></span>
					</td>
					
					<td class="ListelemeAlaniTablolariGenisDurumSutunu">
						<?php if($EMailHesaplariKayitlariDinlendirmeDurumu==1){ ?><span class="MaviYazi"><?php }elseif(($EMailHesaplariKayitlariDinlendirmeDurumu==0) and ($EMailHesaplariKayitlariCalismaDurumu==0)){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($EMailHesaplariKayitlariCalismaDurumuYaz); ?></span>
					</td>
					
					<td class="ListelemeAlaniTablolariTarihSutunu">
						<?php if($EMailHesaplariKayitlariDinlendirmeDurumu==1){ ?><span class="MaviYazi"><?php }elseif(($EMailHesaplariKayitlariDinlendirmeDurumu==0) and ($EMailHesaplariKayitlariCalismaDurumu==0)){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($EMailHesaplariKayitlariEklenmeTarihi); ?></span>
					</td>

					<td class="ListelemeAlaniTablolariAltiliSutunu">
						<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=113&ID=<?php echo $EMailHesaplariKayitlariID; ?>" target="_top"><img src="Resimler/IconIslemlerDetay.png" width="20" height="20" title="Detay" alt="Detay"></a>
						<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=143&ID=<?php echo $EMailHesaplariKayitlariID; ?>" target="_top"><img src="Resimler/IconIslemlerIstatistik.png" width="20" height="20" title="İstatistik" alt="İstatistik"></a>
						<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=119&ID=<?php echo $EMailHesaplariKayitlariID; ?>" target="_top"><img src="Resimler/IconIslemlerGuncelle.png" width="20" height="20" title="Güncelle" alt="Güncelle"></a>
						<?php if($EMailHesaplariKayitlariCalismaDurumu==0){ ?>
							<a href="javascript:KayitAktifYapIcinModalAc(<?php echo $EMailHesaplariKayitlariID; ?>)"><img src="Resimler/IconIslemlerPasif.png" width="20" height="20" title="Aktif Yap" alt="Aktif Yap"></a>
						<?php }else{ ?>
							<a href="javascript:KayitPasifYapIcinModalAc(<?php echo $EMailHesaplariKayitlariID; ?>)"><img src="Resimler/IconIslemlerAktif.png" width="20" height="20" title="Pasif Yap" alt="Pasif Yap"></a>
						<?php } ?>
						<?php if($EMailHesaplariKayitlariDinlendirmeDurumu==0){ ?>
							<a href="javascript:KayitDinlendirIcinModalAc(<?php echo $EMailHesaplariKayitlariID; ?>)"><img src="Resimler/IconIslemlerDur.png" width="20" height="20" title="Dinlendir" alt="Dinlendir"></a>
						<?php }else{ ?>
							<a href="javascript:KayitGeriAcIcinModalAc(<?php echo $EMailHesaplariKayitlariID; ?>)"><img src="Resimler/IconIslemlerGeriAc.png" width="20" height="20" title="Geri Aç" alt="Geri Aç"></a>
						<?php } ?>
						<a href="javascript:KayitSilIcinModalAc(<?php echo $EMailHesaplariKayitlariID; ?>)"><img src="Resimler/IconIslemlerSil.png" width="20" height="20" title="Sil" alt="Sil"></a>
					</td>
				</tr>
			<?php
					}
				}else{
			?>	
				<tr>
					<td colspan="6">Sisteme kayıtlı e-mail hesap kaydı bulunmamaktadır.</td>
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
			echo 	"<span class=\"Pasif\"><a href=\"http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=109&Sayfalama=1\" target=\"_top\"><img src=\"Resimler/IconSayfalamaIlk.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";
			$SayfalamaIcinSayfaDegeriniBirGeriAl	=	$GelenSayfalama-1;
			echo 	"<span class=\"Pasif\"><a href=\"http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=109&Sayfalama=".$SayfalamaIcinSayfaDegeriniBirGeriAl."\" target=\"_top\"><img src=\"Resimler/IconSayfalamaBirGeri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
		}
								
		for($SayfalamaIcinSayfaIndexDegeri=$GelenSayfalama-$SayfalamaIcinSolveSagButonSayisi; $SayfalamaIcinSayfaIndexDegeri<=$GelenSayfalama+$SayfalamaIcinSolveSagButonSayisi; $SayfalamaIcinSayfaIndexDegeri++){
			if(($SayfalamaIcinSayfaIndexDegeri>0) and ($SayfalamaIcinSayfaIndexDegeri<=$BulunanSayfaSayisi)){
				if($SayfalamaIcinSayfaIndexDegeri==$GelenSayfalama){
					echo 	"<span class=\"Aktif\">".$SayfalamaIcinSayfaIndexDegeri."</span>";
				}else{
					echo 	"<span class=\"Pasif\"><a href=\"http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=109&Sayfalama=".$SayfalamaIcinSayfaIndexDegeri."\" target=\"_top\">".$SayfalamaIcinSayfaIndexDegeri."</a></span>";
				}
			}
		}

		if($GelenSayfalama!=$BulunanSayfaSayisi){
			$SayfalamaIcinSayfaDegeriniBirIleriAl	=	$GelenSayfalama+1;
			echo 	"<span class=\"Pasif\"><a href=\"http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=109&Sayfalama=".$SayfalamaIcinSayfaDegeriniBirIleriAl."\" target=\"_top\"><img src=\"Resimler/IconSayfalamaBirIleri.png\" width=\"6\" height=\"10\" title=\"\" alt=\"\"></a></span>";
			echo 	"<span class=\"Pasif\"><a href=\"http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=109&Sayfalama=".$BulunanSayfaSayisi."\" target=\"_top\"><img src=\"Resimler/IconSayfalamaSon.png\" width=\"10\" height=\"10\" title=\"\" alt=\"\"></a></span>";			
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