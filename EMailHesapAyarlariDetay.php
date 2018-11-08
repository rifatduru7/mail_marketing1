<? if(isset($_SESSION["Yonetici"])){
	$GelenID		=	SayiliIcerikleriFiltrele($_REQUEST["ID"]);

	if($GelenID!=""){
		$EMailHesapBilgileriSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM emailhesapayarlari WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
		$EMailHesapBilgileriSorgusuKayitSayisi	=	$EMailHesapBilgileriSorgusu->num_rows;
			if($EMailHesapBilgileriSorgusuKayitSayisi>0){
				$EMailHesapBilgileriSorgusuKaydi	=	$EMailHesapBilgileriSorgusu->fetch_assoc();
					$EMailHesapBilgileriSorgusuKaydiID											=	$EMailHesapBilgileriSorgusuKaydi["ID"];
					$EMailHesapBilgileriSorgusuKaydiEMailAdresi										=	$EMailHesapBilgileriSorgusuKaydi["EMailAdresi"];
					$EMailHesapBilgileriSorgusuKaydiEMailAdresiSifresi								=	$EMailHesapBilgileriSorgusuKaydi["EMailAdresiSifresi"];
					$EMailHesapBilgileriSorgusuKaydiPOP3SunucuBaglantiTuru							=	$EMailHesapBilgileriSorgusuKaydi["POP3SunucuBaglantiTuru"];
					$EMailHesapBilgileriSorgusuKaydiPOP3SunucuAdresi								=	$EMailHesapBilgileriSorgusuKaydi["POP3SunucuAdresi"];
					$EMailHesapBilgileriSorgusuKaydiPOP3SunucusuSSLPortu							=	$EMailHesapBilgileriSorgusuKaydi["POP3SunucusuSSLPortu"];
					$EMailHesapBilgileriSorgusuKaydiPOP3SunucusuTLSPortu							=	$EMailHesapBilgileriSorgusuKaydi["POP3SunucusuTLSPortu"];
					$EMailHesapBilgileriSorgusuKaydiSMTPSunucuBaglantiTuru							=	$EMailHesapBilgileriSorgusuKaydi["SMTPSunucuBaglantiTuru"];
					$EMailHesapBilgileriSorgusuKaydiSMTPSunucuAdresi								=	$EMailHesapBilgileriSorgusuKaydi["SMTPSunucuAdresi"];
					$EMailHesapBilgileriSorgusuKaydiSMTPSunucusuSSLPortu							=	$EMailHesapBilgileriSorgusuKaydi["SMTPSunucusuSSLPortu"];
					$EMailHesapBilgileriSorgusuKaydiSMTPSunucusuTLSPortu							=	$EMailHesapBilgileriSorgusuKaydi["SMTPSunucusuTLSPortu"];
					$EMailHesapBilgileriSorgusuKaydiIMAPSunucuBaglantiTuru							=	$EMailHesapBilgileriSorgusuKaydi["IMAPSunucuBaglantiTuru"];
					$EMailHesapBilgileriSorgusuKaydiIMAPSunucuAdresi								=	$EMailHesapBilgileriSorgusuKaydi["IMAPSunucuAdresi"];
					$EMailHesapBilgileriSorgusuKaydiIMAPSunucusuSSLPortu							=	$EMailHesapBilgileriSorgusuKaydi["IMAPSunucusuSSLPortu"];
					$EMailHesapBilgileriSorgusuKaydiIMAPSunucusuTLSPortu							=	$EMailHesapBilgileriSorgusuKaydi["IMAPSunucusuTLSPortu"];
					$EMailHesapBilgileriSorgusuKaydiGunlukMaksimumMailGonderimSayisi				=	$EMailHesapBilgileriSorgusuKaydi["GunlukMaksimumMailGonderimSayisi"];
					$EMailHesapBilgileriSorgusuKaydiYeniGonderimIcinHazirOlmaZamanAraligiSuresi		=	$EMailHesapBilgileriSorgusuKaydi["YeniGonderimIcinHazirOlmaZamanAraligiSuresi"];
					$EMailHesapBilgileriSorgusuKaydiSonGonderimTarihi								=	$EMailHesapBilgileriSorgusuKaydi["SonGonderimTarihi"];
					$EMailHesapBilgileriSorgusuKaydiYeniGonderimYapabilecegiTarih					=	$EMailHesapBilgileriSorgusuKaydi["YeniGonderimYapabilecegiTarih"];
					$EMailHesapBilgileriSorgusuKaydiPostaKutusuSonKontrolTarihi						=	$EMailHesapBilgileriSorgusuKaydi["PostaKutusuSonKontrolTarihi"];
					$EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi					=	$EMailHesapBilgileriSorgusuKaydi["DinlendirmeZamanAraligiSuresi"];
					$EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu								=	$EMailHesapBilgileriSorgusuKaydi["DinlendirmeDurumu"];
						if($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==1){
							$EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumuYaz		=	"Dinlendiriliyor";
						}else{
							$EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumuYaz		=	"Açık";
						}
					$EMailHesapBilgileriSorgusuKaydiDinlendirmeBaslangicTarihi						=	$EMailHesapBilgileriSorgusuKaydi["DinlendirmeBaslangicTarihi"];
					$EMailHesapBilgileriSorgusuKaydiDinlendirmeBitisTarihi							=	$EMailHesapBilgileriSorgusuKaydi["DinlendirmeBitisTarihi"];
					$EMailHesapBilgileriSorgusuKaydiEklenmeTarihi									=	$EMailHesapBilgileriSorgusuKaydi["EklenmeTarihi"];
					$EMailHesapBilgileriSorgusuKaydiSiraNumarasi									=	$EMailHesapBilgileriSorgusuKaydi["SiraNumarasi"];
					$EMailHesapBilgileriSorgusuKaydiGonderilenMailSayisi							=	$EMailHesapBilgileriSorgusuKaydi["GonderilenMailSayisi"];
					$EMailHesapBilgileriSorgusuKaydiCalismaDurumu									=	$EMailHesapBilgileriSorgusuKaydi["CalismaDurumu"];
						if($EMailHesapBilgileriSorgusuKaydiCalismaDurumu==1){
							$EMailHesapBilgileriSorgusuKaydiCalismaDurumuYaz			=	"Aktif";
						}else{
							$EMailHesapBilgileriSorgusuKaydiCalismaDurumuYaz			=	"Pasif";
						}
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

<div id="DetayAlaniKapsayacisi">
	<div class="SayfaIciBaslikAlanlariKapsayicisi">
		<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=109" target="_top">E-Mail Hesapları</a> > Detay
	</div>

	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			E-Mail Adresi
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			<a href="mailto:<?php echo DonusumleriGeriDondur($EMailHesapBilgileriSorgusuKaydiEMailAdresi); ?>"><?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==1){ ?><span class="MaviYazi"><?php }elseif(($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==0) and ($EMailHesapBilgileriSorgusuKaydiCalismaDurumu==0)){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($EMailHesapBilgileriSorgusuKaydiEMailAdresi); ?></span></a>
		</div>
	</div>

	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			E-Mail Şifresi
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			<?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==1){ ?><span class="MaviYazi"><?php }elseif(($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==0) and ($EMailHesapBilgileriSorgusuKaydiCalismaDurumu==0)){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($EMailHesapBilgileriSorgusuKaydiEMailAdresiSifresi); ?></span>
		</div>
	</div>

	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			POP3 Sunucusu Bağlantı Türü
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			<?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==1){ ?><span class="MaviYazi"><?php }elseif(($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==0) and ($EMailHesapBilgileriSorgusuKaydiCalismaDurumu==0)){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($EMailHesapBilgileriSorgusuKaydiPOP3SunucuBaglantiTuru); ?></span>
		</div>
	</div>

	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			POP3 Sunucusu Bağlantı Adresi
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			<?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==1){ ?><span class="MaviYazi"><?php }elseif(($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==0) and ($EMailHesapBilgileriSorgusuKaydiCalismaDurumu==0)){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($EMailHesapBilgileriSorgusuKaydiPOP3SunucuAdresi); ?></span>
		</div>
	</div>

	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			POP3 Sunucusu SSL / TLS Portu
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			<?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==1){ ?><span class="MaviYazi"><?php }elseif(($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==0) and ($EMailHesapBilgileriSorgusuKaydiCalismaDurumu==0)){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo $EMailHesapBilgileriSorgusuKaydiPOP3SunucusuSSLPortu; ?> / <?php echo $EMailHesapBilgileriSorgusuKaydiPOP3SunucusuTLSPortu; ?></span>
		</div>
	</div>


	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			SMTP Sunucusu Bağlantı Türü
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			<?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==1){ ?><span class="MaviYazi"><?php }elseif(($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==0) and ($EMailHesapBilgileriSorgusuKaydiCalismaDurumu==0)){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($EMailHesapBilgileriSorgusuKaydiSMTPSunucuBaglantiTuru); ?></span>
		</div>
	</div>

	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			SMTP Sunucusu Bağlantı Adresi
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			<?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==1){ ?><span class="MaviYazi"><?php }elseif(($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==0) and ($EMailHesapBilgileriSorgusuKaydiCalismaDurumu==0)){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($EMailHesapBilgileriSorgusuKaydiSMTPSunucuAdresi); ?></span>
		</div>
	</div>

	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			SMTP Sunucusu SSL / TLS Portu
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			<?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==1){ ?><span class="MaviYazi"><?php }elseif(($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==0) and ($EMailHesapBilgileriSorgusuKaydiCalismaDurumu==0)){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo $EMailHesapBilgileriSorgusuKaydiSMTPSunucusuSSLPortu; ?> / <?php echo $EMailHesapBilgileriSorgusuKaydiSMTPSunucusuTLSPortu; ?></span>
		</div>
	</div>

	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			IMAP Sunucusu Bağlantı Türü
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			<?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==1){ ?><span class="MaviYazi"><?php }elseif(($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==0) and ($EMailHesapBilgileriSorgusuKaydiCalismaDurumu==0)){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($EMailHesapBilgileriSorgusuKaydiIMAPSunucuBaglantiTuru); ?></span>
		</div>
	</div>

	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			IMAP Sunucusu Bağlantı Adresi
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			<?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==1){ ?><span class="MaviYazi"><?php }elseif(($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==0) and ($EMailHesapBilgileriSorgusuKaydiCalismaDurumu==0)){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($EMailHesapBilgileriSorgusuKaydiIMAPSunucuAdresi); ?></span>
		</div>
	</div>

	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			IMAP Sunucusu SSL / TLS Portu
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			<?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==1){ ?><span class="MaviYazi"><?php }elseif(($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==0) and ($EMailHesapBilgileriSorgusuKaydiCalismaDurumu==0)){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo $EMailHesapBilgileriSorgusuKaydiIMAPSunucusuSSLPortu; ?> / <?php echo $EMailHesapBilgileriSorgusuKaydiIMAPSunucusuTLSPortu; ?></span>
		</div>
	</div>

	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			Gönderilen Mail Sayısı
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			<?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==1){ ?><span class="MaviYazi"><?php }elseif(($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==0) and ($EMailHesapBilgileriSorgusuKaydiCalismaDurumu==0)){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($EMailHesapBilgileriSorgusuKaydiGonderilenMailSayisi); ?></span>
		</div>
	</div>

	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			Günlük Maksimum Gönderim Sayısı
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			<?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==1){ ?><span class="MaviYazi"><?php }elseif(($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==0) and ($EMailHesapBilgileriSorgusuKaydiCalismaDurumu==0)){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($EMailHesapBilgileriSorgusuKaydiGunlukMaksimumMailGonderimSayisi); ?></span>
		</div>
	</div>

	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			Yeni Gönderimler İçin Zaman Aralığı
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			<?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==1){ ?><span class="MaviYazi"><?php }elseif(($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==0) and ($EMailHesapBilgileriSorgusuKaydiCalismaDurumu==0)){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($EMailHesapBilgileriSorgusuKaydiYeniGonderimIcinHazirOlmaZamanAraligiSuresi); ?></span>
		</div>
	</div>

	<?php if($EMailHesapBilgileriSorgusuKaydiSonGonderimTarihi!=""){ ?>
	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			Son Gönderim Tarihi
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			<?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==1){ ?><span class="MaviYazi"><?php }elseif(($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==0) and ($EMailHesapBilgileriSorgusuKaydiCalismaDurumu==0)){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($EMailHesapBilgileriSorgusuKaydiSonGonderimTarihi); ?></span>
		</div>
	</div>
	<?php } ?>
	
	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			Yeni Gönderim Yapabileceği Tarih
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			<?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==1){ ?><span class="MaviYazi"><?php }elseif(($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==0) and ($EMailHesapBilgileriSorgusuKaydiCalismaDurumu==0)){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($EMailHesapBilgileriSorgusuKaydiYeniGonderimYapabilecegiTarih); ?></span>
		</div>
	</div>
										
	<?php if($EMailHesapBilgileriSorgusuKaydiPostaKutusuSonKontrolTarihi!=""){ ?>
	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			Posta Kutuları Son Kontrol Tarihi
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			<?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==1){ ?><span class="MaviYazi"><?php }elseif(($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==0) and ($EMailHesapBilgileriSorgusuKaydiCalismaDurumu==0)){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($EMailHesapBilgileriSorgusuKaydiPostaKutusuSonKontrolTarihi); ?></span>
		</div>
	</div>
	<?php } ?>
	
	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			Dinlendirilmeler İçin Zaman Aralığı
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			<?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==1){ ?><span class="MaviYazi"><?php }elseif(($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==0) and ($EMailHesapBilgileriSorgusuKaydiCalismaDurumu==0)){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi); ?></span>
		</div>
	</div>
	
	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			Dinlendirilme Durumu
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			<?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==1){ ?><span class="MaviYazi"><?php }elseif(($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==0) and ($EMailHesapBilgileriSorgusuKaydiCalismaDurumu==0)){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumuYaz); ?></span>
		</div>
	</div>
	
	<?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==1){ ?>
	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			Dinlendirilme Başlangıç Tarihi
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			<?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==1){ ?><span class="MaviYazi"><?php }elseif(($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==0) and ($EMailHesapBilgileriSorgusuKaydiCalismaDurumu==0)){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($EMailHesapBilgileriSorgusuKaydiDinlendirmeBaslangicTarihi); ?></span>
		</div>
	</div>
	
	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			Dinlendirilme Bitiş Tarihi
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			<?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==1){ ?><span class="MaviYazi"><?php }elseif(($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==0) and ($EMailHesapBilgileriSorgusuKaydiCalismaDurumu==0)){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($EMailHesapBilgileriSorgusuKaydiDinlendirmeBitisTarihi); ?></span>
		</div>
	</div>
	<?php } ?>
	
	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			Eklenme Tarihi
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			<?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==1){ ?><span class="MaviYazi"><?php }elseif(($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==0) and ($EMailHesapBilgileriSorgusuKaydiCalismaDurumu==0)){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($EMailHesapBilgileriSorgusuKaydiEklenmeTarihi); ?></span>
		</div>
	</div>
	
	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			Listelerde Sıra Numarası
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			<?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==1){ ?><span class="MaviYazi"><?php }elseif(($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==0) and ($EMailHesapBilgileriSorgusuKaydiCalismaDurumu==0)){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($EMailHesapBilgileriSorgusuKaydiSiraNumarasi); ?></span>
		</div>
	</div>

	<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
		<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
			Çalışma Durumu
		</div>
		<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
			<?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==1){ ?><span class="MaviYazi"><?php }elseif(($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==0) and ($EMailHesapBilgileriSorgusuKaydiCalismaDurumu==0)){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($EMailHesapBilgileriSorgusuKaydiCalismaDurumuYaz); ?></span>
		</div>
	</div>
</div>		
	
<div class="SayfaIciSatirBosluguAlanlariKapsayicisi"></div>	
	
<div class="DetayAlaniButonAlaniKapsayicisi">
	<span class="DetayAlaniGuncelleButonuAlaniKapsayicisi"><a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=119&ID=<?php echo $GelenID; ?>" target="_top">Güncelle</a></span>
	<?php if($EMailHesapBilgileriSorgusuKaydiCalismaDurumu==0){ ?>
		<span class="DetayAlaniAktifYapButonuAlaniKapsayicisi"><a href="javascript:KayitAktifYapIcinModalAc(<?php echo $GelenID; ?>)">Aktif Yap</a></span>
	<?php }else{ ?>
		<span class="DetayAlaniPasifYapButonuAlaniKapsayicisi"><a href="javascript:KayitPasifYapIcinModalAc(<?php echo $GelenID; ?>)">Pasif Yap</a></span>
	<?php } ?>
	<?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==0){ ?>
		<span class="DetayAlaniDinlendirButonuAlaniKapsayicisi"><a href="javascript:KayitDinlendirIcinModalAc(<?php echo $GelenID; ?>)">Dinlendir</a></span>
	<?php }else{ ?>
		<span class="DetayAlaniGeriAcButonuAlaniKapsayicisi"><a href="javascript:KayitGeriAcIcinModalAc(<?php echo $GelenID; ?>)">Geri Aç</a></span>
	<?php } ?>
	<span class="DetayAlaniSilButonuAlaniKapsayicisi"><a href="javascript:KayitSilIcinModalAc(<?php echo $GelenID; ?>)">Sil</a></span>
</div>
<?php
			}else{
				header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=109");
				exit();
			}	
	}else{
		header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=109");
		exit();
	}
}else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>