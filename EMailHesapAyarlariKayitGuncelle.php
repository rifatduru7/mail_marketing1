<? if(isset($_SESSION["Yonetici"])){
$GelenID			=	SayiliIcerikleriFiltrele($_REQUEST["ID"]);
	if($GelenID!=""){
		$EMailHesapBilgileriSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM emailhesapayarlari WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
		$EMailHesapBilgileriSorgusuKayitSayisi	=	$EMailHesapBilgileriSorgusu->num_rows;
			if($EMailHesapBilgileriSorgusuKayitSayisi>0){
				$EMailHesapBilgileriSorgusuKaydi	=	$EMailHesapBilgileriSorgusu->fetch_assoc();
					$EMailHesapBilgileriSorgusuKaydiID												=	$EMailHesapBilgileriSorgusuKaydi["ID"];
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
					$EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu								=	$EMailHesapBilgileriSorgusuKaydi["DinlendirmeDurumu"];
					$EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi					=	$EMailHesapBilgileriSorgusuKaydi["DinlendirmeZamanAraligiSuresi"];
					$EMailHesapBilgileriSorgusuKaydiSiraNumarasi									=	$EMailHesapBilgileriSorgusuKaydi["SiraNumarasi"];
					$EMailHesapBilgileriSorgusuKaydiCalismaDurumu									=	$EMailHesapBilgileriSorgusuKaydi["CalismaDurumu"];
?>
<script type="text/javascript" language="javascript">
	function GuncellemeFormKontrol(){
		if(document.GuncellemeFormu.EMailAdresiSifresi.value==""){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Güncelleme formu dahilinde bulunan, \"E-Mail Adresi Şifresi\" değeri boş bırakılamaz. Lütfen geçerli bir \"E-Mail Adresi Şifresi\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		var POP3SunucuBaglantiTuruElemani		=	document.getElementsByName("POP3SunucuBaglantiTuru");
		if((POP3SunucuBaglantiTuruElemani[0].checked==false) && (POP3SunucuBaglantiTuruElemani[1].checked==false)){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Güncelleme formu dahilinde bulunan, \"POP3 Sunucusu Bağlantı Türü\" değeri boş bırakılamaz. Lütfen geçerli bir \"POP3 Sunucusu Bağlantı Türü\" değeri seçiniz.";
			ModalAc();
			return;
		}
		
		if(document.GuncellemeFormu.POP3SunucuAdresi.value==""){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Güncelleme formu dahilinde bulunan, \"POP3 Sunucusu Bağlantı Adresi\" değeri boş bırakılamaz. Lütfen geçerli bir \"POP3 Sunucusu Bağlantı Adresi\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if(document.GuncellemeFormu.POP3SunucuAdresi.value!=""){
			var POP3SunucuAdresiDegeri	=	document.getElementById("POP3SunucuAdresi").value;
			var POP3SunucuAdresiKontrol	=	LinkKontrolEt(POP3SunucuAdresiDegeri);
				if(POP3SunucuAdresiKontrol==false){
					document.getElementById("ModalMetinAlani").innerHTML	=	"Güncelleme formu dahilinde bulunan, \"POP3 Sunucusu Bağlantı Adresi\" geçersizdir. Lütfen geçerli bir \"POP3 Sunucusu Bağlantı Adresi\" değeri giriniz.";
					ModalAc();
					return;
				}
		}
		
		if((document.GuncellemeFormu.POP3SunucusuSSLPortu.value=="") || (document.GuncellemeFormu.POP3SunucusuSSLPortu.value==0)){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Güncelleme formu dahilinde bulunan, \"POP3 Sunucusu SSL Portu\" değeri boş bırakılamaz. Lütfen geçerli bir \"POP3 Sunucusu SSL Portu\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if((document.GuncellemeFormu.POP3SunucusuTLSPortu.value=="") || (document.GuncellemeFormu.POP3SunucusuTLSPortu.value==0)){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Güncelleme formu dahilinde bulunan, \"POP3 Sunucusu TLS Portu\" değeri boş bırakılamaz. Lütfen geçerli bir \"POP3 Sunucusu TLS Portu\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		var SMTPSunucuBaglantiTuruElemani		=	document.getElementsByName("SMTPSunucuBaglantiTuru");
		if((SMTPSunucuBaglantiTuruElemani[0].checked==false) && (SMTPSunucuBaglantiTuruElemani[1].checked==false)){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Güncelleme formu dahilinde bulunan, \"SMTP Sunucusu Bağlantı Türü\" değeri boş bırakılamaz. Lütfen geçerli bir \"SMTP Sunucusu Bağlantı Türü\" değeri seçiniz.";
			ModalAc();
			return;
		}
		
		if(document.GuncellemeFormu.SMTPSunucuAdresi.value==""){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Güncelleme formu dahilinde bulunan, \"SMTP Sunucu Adresi\" değeri boş bırakılamaz. Lütfen geçerli bir \"SMTP Sunucu Adresi\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if(document.GuncellemeFormu.SMTPSunucuAdresi.value!=""){
			var SMTPSunucuAdresiDegeri	=	document.getElementById("SMTPSunucuAdresi").value;
			var SMTPSunucuAdresiKontrol	=	LinkKontrolEt(SMTPSunucuAdresiDegeri);
				if(SMTPSunucuAdresiKontrol==false){
					document.getElementById("ModalMetinAlani").innerHTML	=	"Güncelleme formu dahilinde bulunan, \"SMTP Sunucu Adresi\" geçersizdir. Lütfen geçerli bir \"SMTP Sunucu Adresi\" değeri giriniz.";
					ModalAc();
					return;
				}
		}
		
		if((document.GuncellemeFormu.SMTPSunucusuSSLPortu.value=="") || (document.GuncellemeFormu.SMTPSunucusuSSLPortu.value==0)){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Güncelleme formu dahilinde bulunan, \"SMTP Sunucusu SSL Portu\" değeri boş bırakılamaz. Lütfen geçerli bir \"SMTP Sunucusu SSL Portu\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if((document.GuncellemeFormu.SMTPSunucusuTLSPortu.value=="") || (document.GuncellemeFormu.SMTPSunucusuTLSPortu.value==0)){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Güncelleme formu dahilinde bulunan, \"SMTP Sunucusu TLS Portu\" değeri boş bırakılamaz. Lütfen geçerli bir \"SMTP Sunucusu TLS Portu\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		var IMAPSunucuBaglantiTuruElemani		=	document.getElementsByName("IMAPSunucuBaglantiTuru");
		if((IMAPSunucuBaglantiTuruElemani[0].checked==false) && (IMAPSunucuBaglantiTuruElemani[1].checked==false)){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Güncelleme formu dahilinde bulunan, \"IMAP Sunucusu Bağlantı Türü\" değeri boş bırakılamaz. Lütfen geçerli bir \"IMAP Sunucusu Bağlantı Türü\" değeri seçiniz.";
			ModalAc();
			return;
		}
		
		if(document.GuncellemeFormu.IMAPSunucuAdresi.value==""){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Güncelleme formu dahilinde bulunan, \"IMAP Sunucu Adresi\" değeri boş bırakılamaz. Lütfen geçerli bir \"IMAP Sunucu Adresi\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if(document.GuncellemeFormu.IMAPSunucuAdresi.value!=""){
			var IMAPSunucuAdresiDegeri	=	document.getElementById("IMAPSunucuAdresi").value;
			var IMAPSunucuAdresiKontrol	=	LinkKontrolEt(IMAPSunucuAdresiDegeri);
				if(IMAPSunucuAdresiKontrol==false){
					document.getElementById("ModalMetinAlani").innerHTML	=	"Güncelleme formu dahilinde bulunan, \"IMAP Sunucu Adresi\" geçersizdir. Lütfen geçerli bir \"IMAP Sunucu Adresi\" değeri giriniz.";
					ModalAc();
					return;
				}
		}
		
		if((document.GuncellemeFormu.IMAPSunucusuSSLPortu.value=="") || (document.GuncellemeFormu.IMAPSunucusuSSLPortu.value==0)){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Güncelleme formu dahilinde bulunan, \"IMAP Sunucusu SSL Portu\" değeri boş bırakılamaz. Lütfen geçerli bir \"IMAP Sunucusu SSL Portu\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if((document.GuncellemeFormu.IMAPSunucusuTLSPortu.value=="") || (document.GuncellemeFormu.IMAPSunucusuTLSPortu.value==0)){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Güncelleme formu dahilinde bulunan, \"IMAP Sunucusu TLS Portu\" değeri boş bırakılamaz. Lütfen geçerli bir \"IMAP Sunucusu TLS Portu\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if((document.GuncellemeFormu.GunlukMaksimumMailGonderimSayisi.value=="") || (document.GuncellemeFormu.GunlukMaksimumMailGonderimSayisi.value==0)){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Güncelleme formu dahilinde bulunan, \"Günlük Maksimum Gönderim Sayısı\" değeri boş bırakılamaz. Lütfen geçerli bir \"Günlük Maksimum Gönderim Sayısı\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if(document.GuncellemeFormu.YeniGonderimIcinHazirOlmaZamanAraligiSuresi.value==""){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Güncelleme formu dahilinde bulunan, \"Yeni Gönderimler İçin Zaman Aralığı\" değeri boş bırakılamaz. Lütfen geçerli bir \"Yeni Gönderimler İçin Zaman Aralığı\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if(document.GuncellemeFormu.DinlendirmeZamanAraligiSuresi.value==""){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Güncelleme formu dahilinde bulunan, \"Dinlendirilmeler İçin Zaman Aralığı\" değeri boş bırakılamaz. Lütfen geçerli bir \"Dinlendirilmeler İçin Zaman Aralığı\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		
		if(document.GuncellemeFormu.SiraNumarasi.value==""){
			document.getElementById("ModalMetinAlani").innerHTML		=	"Güncelleme formu dahilinde bulunan, \"Sıra Numarası\" değeri boş bırakılamaz. Lütfen geçerli bir \"Sıra Numarası\" değeri seçiniz.";
			ModalAc();
			return;
		}
		
		var CalismaDurumuElemani		=	document.getElementsByName("CalismaDurumu");
		if((CalismaDurumuElemani[0].checked==false) && (CalismaDurumuElemani[1].checked==false)){
			document.getElementById("ModalMetinAlani").innerHTML		=	"Güncelleme formu dahilinde bulunan, \"Çalışma Durumu\" değeri boş bırakılamaz. Lütfen geçerli bir \"Çalışma Durumu\" değeri seçiniz.";
			ModalAc();
			return;
		}
	
		document.GuncellemeFormu.submit();
	}
</script>	
	
<div id="ModalKarartmaAlani" class="ModalKarartmaAlaniKapsayicisi" style="display: none;">
	<div id="ModalAlani" class="ModalAlaniKapsayicisi" style="display: none;">
		<div class="ModalBaslikAlaniKapsayicisi">
			Eksik Bilgi Girişi Tespit Edildi!
			<span class="ModalKapatmaAlaniKapsayicisi" onClick="ModalKapat()">&times;</span>
		</div>
		<div id="ModalMetinAlani" class="ModalMetinAlaniKapsayicisi"></div>
	</div>
</div>
	
<div id="FormAlaniKapsayicisi">
	<form id="GuncellemeFormu" name="GuncellemeFormu" action="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=120&ID=<?php echo $GelenID; ?>" method="POST">
		<div class="SayfaIciBaslikAlanlariKapsayicisi">
			<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=109" target="_top">E-Mail Hesapları</a> > Kayıt Güncelle
		</div>
	
		<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
			<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
				E-Mail Adresi
			</div>
			<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
				<a href="mailto:<?php echo DonusumleriGeriDondur($EMailHesapBilgileriSorgusuKaydiEMailAdresi); ?>"><?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==1){ ?><span class="MaviYazi"><?php }elseif(($EMailHesapBilgileriSorgusuKaydiDinlendirmeDurumu==0) and ($EMailHesapBilgileriSorgusuKaydiCalismaDurumu==0)){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($EMailHesapBilgileriSorgusuKaydiEMailAdresi); ?></span></a>
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				E-Mail Adresi Şifresi (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="EMailAdresiSifresi" name="EMailAdresiSifresi" onKeyUp="KullaniciSifresiAlanlariIcinFiltrele('EMailAdresiSifresi')" value="<?php echo $EMailHesapBilgileriSorgusuKaydiEMailAdresiSifresi; ?>" class="FormAlaniIciTextInputlari" maxlength="50" tabindex="1">
			</div>
		</div>
	
		<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
			<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
				POP3 Sunucusu Bağlantı Türü (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSerbestSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="FormAlanlariIciTumRadioButonAlanlariKapsayicisi">
					<span class="FormAlanlariIciRadioButonAlanlariKapsayicisi">
						<label class="FormAlanlariIciRadioButonAlani">
							<input type="radio" id="POP3SunucuBaglantiTuruSecenekBir" name="POP3SunucuBaglantiTuru" value="SSL" class="FormAlanlariIciRadioInputlari" <?php if($EMailHesapBilgileriSorgusuKaydiPOP3SunucuBaglantiTuru=="SSL"){ ?>checked="checked"<?php } ?>>
							<span class="FormAlanlariIciRadioButonAlanlariIcinBicimlendirmeAlani"></span> <span class="FormAlanlariIciRadioButonAlanlariIcinMetinAlani">SSL</span>
						</label>
					</span>
					<span class="FormAlanlariIciRadioButonAlanlariKapsayicisi">
						<label class="FormAlanlariIciRadioButonAlani">
							<input type="radio" id="POP3SunucuBaglantiTuruSecenekIki" name="POP3SunucuBaglantiTuru" value="TLS" class="FormAlanlariIciRadioInputlari" <?php if($EMailHesapBilgileriSorgusuKaydiPOP3SunucuBaglantiTuru=="TLS"){ ?>checked="checked"<?php } ?>>
							<span class="FormAlanlariIciRadioButonAlanlariIcinBicimlendirmeAlani"></span> <span class="FormAlanlariIciRadioButonAlanlariIcinMetinAlani">TLS</span>
						</label>
					</span>
				</div>
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				POP3 Sunucusu Bağlantı Adresi (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="POP3SunucuAdresi" name="POP3SunucuAdresi" onKeyUp="LinkAlanlariIcinFiltrele('POP3SunucuAdresi')" value="<?php echo $EMailHesapBilgileriSorgusuKaydiPOP3SunucuAdresi; ?>" class="FormAlaniIciTextInputlari" maxlength="100" tabindex="2">
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				POP3 Sunucusu SSL Portu (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="YuzPixselSinirliAlanKapsayicisi"><input type="number" id="POP3SunucusuSSLPortu" name="POP3SunucusuSSLPortu" value="<?php echo $EMailHesapBilgileriSorgusuKaydiPOP3SunucusuSSLPortu; ?>" class="FormAlaniIciTextInputlari" maxlength="3" min="0" max="999" tabindex="3"></div>
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				POP3 Sunucusu TLS Portu (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="YuzPixselSinirliAlanKapsayicisi"><input type="number" id="POP3SunucusuTLSPortu" name="POP3SunucusuTLSPortu" value="<?php echo $EMailHesapBilgileriSorgusuKaydiPOP3SunucusuTLSPortu; ?>" class="FormAlaniIciTextInputlari" maxlength="3" min="0" max="999" tabindex="4"></div>
			</div>
		</div>
	
		<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
			<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
				SMTP Sunucusu Bağlantı Türü (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSerbestSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="FormAlanlariIciTumRadioButonAlanlariKapsayicisi">
					<span class="FormAlanlariIciRadioButonAlanlariKapsayicisi">
						<label class="FormAlanlariIciRadioButonAlani">
							<input type="radio" id="SMTPSunucuBaglantiTuruSecenekBir" name="SMTPSunucuBaglantiTuru" value="SSL" class="FormAlanlariIciRadioInputlari" <?php if($EMailHesapBilgileriSorgusuKaydiSMTPSunucuBaglantiTuru=="SSL"){ ?>checked="checked"<?php } ?>>
							<span class="FormAlanlariIciRadioButonAlanlariIcinBicimlendirmeAlani"></span> <span class="FormAlanlariIciRadioButonAlanlariIcinMetinAlani">SSL</span>
						</label>
					</span>
					<span class="FormAlanlariIciRadioButonAlanlariKapsayicisi">
						<label class="FormAlanlariIciRadioButonAlani">
							<input type="radio" id="SMTPSunucuBaglantiTuruSecenekIki" name="SMTPSunucuBaglantiTuru" value="TLS" class="FormAlanlariIciRadioInputlari" <?php if($EMailHesapBilgileriSorgusuKaydiSMTPSunucuBaglantiTuru=="TLS"){ ?>checked="checked"<?php } ?>>
							<span class="FormAlanlariIciRadioButonAlanlariIcinBicimlendirmeAlani"></span> <span class="FormAlanlariIciRadioButonAlanlariIcinMetinAlani">TLS</span>
						</label>
					</span>
				</div>
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				SMTP Sunucusu Bağlantı Adresi (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="SMTPSunucuAdresi" name="SMTPSunucuAdresi" onKeyUp="LinkAlanlariIcinFiltrele('SMTPSunucuAdresi')" value="<?php echo $EMailHesapBilgileriSorgusuKaydiSMTPSunucuAdresi; ?>" class="FormAlaniIciTextInputlari" maxlength="100" tabindex="5">
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				SMTP Sunucusu SSL Portu (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="YuzPixselSinirliAlanKapsayicisi"><input type="number" id="SMTPSunucusuSSLPortu" name="SMTPSunucusuSSLPortu" value="<?php echo $EMailHesapBilgileriSorgusuKaydiSMTPSunucusuSSLPortu; ?>" class="FormAlaniIciTextInputlari" maxlength="3" min="0" max="999" tabindex="6"></div>
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				SMTP Sunucusu TLS Portu (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="YuzPixselSinirliAlanKapsayicisi"><input type="number" id="SMTPSunucusuTLSPortu" name="SMTPSunucusuTLSPortu" value="<?php echo $EMailHesapBilgileriSorgusuKaydiSMTPSunucusuTLSPortu; ?>" class="FormAlaniIciTextInputlari" maxlength="3" min="0" max="999" tabindex="7"></div>
			</div>
		</div>
	
		<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
			<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
				IMAP Sunucusu Bağlantı Türü (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSerbestSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="FormAlanlariIciTumRadioButonAlanlariKapsayicisi">
					<span class="FormAlanlariIciRadioButonAlanlariKapsayicisi">
						<label class="FormAlanlariIciRadioButonAlani">
							<input type="radio" id="IMAPSunucuBaglantiTuruSecenekBir" name="IMAPSunucuBaglantiTuru" value="SSL" class="FormAlanlariIciRadioInputlari" <?php if($EMailHesapBilgileriSorgusuKaydiIMAPSunucuBaglantiTuru=="SSL"){ ?>checked="checked"<?php } ?>>
							<span class="FormAlanlariIciRadioButonAlanlariIcinBicimlendirmeAlani"></span> <span class="FormAlanlariIciRadioButonAlanlariIcinMetinAlani">SSL</span>
						</label>
					</span>
					<span class="FormAlanlariIciRadioButonAlanlariKapsayicisi">
						<label class="FormAlanlariIciRadioButonAlani">
							<input type="radio" id="IMAPSunucuBaglantiTuruSecenekIki" name="IMAPSunucuBaglantiTuru" value="TLS" class="FormAlanlariIciRadioInputlari" <?php if($EMailHesapBilgileriSorgusuKaydiIMAPSunucuBaglantiTuru=="TLS"){ ?>checked="checked"<?php } ?>>
							<span class="FormAlanlariIciRadioButonAlanlariIcinBicimlendirmeAlani"></span> <span class="FormAlanlariIciRadioButonAlanlariIcinMetinAlani">TLS</span>
						</label>
					</span>
				</div>
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				IMAP Sunucusu Bağlantı Adresi (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="IMAPSunucuAdresi" name="IMAPSunucuAdresi" onKeyUp="LinkAlanlariIcinFiltrele('IMAPSunucuAdresi')" value="<?php echo $EMailHesapBilgileriSorgusuKaydiIMAPSunucuAdresi; ?>" class="FormAlaniIciTextInputlari" maxlength="100" tabindex="8">
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				IMAP Sunucusu SSL Portu (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="YuzPixselSinirliAlanKapsayicisi"><input type="number" id="IMAPSunucusuSSLPortu" name="IMAPSunucusuSSLPortu" value="<?php echo $EMailHesapBilgileriSorgusuKaydiIMAPSunucusuSSLPortu; ?>" class="FormAlaniIciTextInputlari" maxlength="3" min="0" max="999" tabindex="9"></div>
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				IMAP Sunucusu TLS Portu (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="YuzPixselSinirliAlanKapsayicisi"><input type="number" id="IMAPSunucusuTLSPortu" name="IMAPSunucusuTLSPortu" value="<?php echo $EMailHesapBilgileriSorgusuKaydiIMAPSunucusuTLSPortu; ?>" class="FormAlaniIciTextInputlari" maxlength="3" min="0" max="999" tabindex="10"></div>
			</div>
		</div>	
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Günlük Maksimum Gönderim Sayısı (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="YuzPixselSinirliAlanKapsayicisi"><input type="number" id="GunlukMaksimumMailGonderimSayisi" name="GunlukMaksimumMailGonderimSayisi" value="<?php echo $EMailHesapBilgileriSorgusuKaydiGunlukMaksimumMailGonderimSayisi; ?>" class="FormAlaniIciTextInputlari" maxlength="5" min="0" max="99999" tabindex="11"></div>
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Yeni Gönderimler İçin Zaman Aralığı (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="UcYuzPixselSinirliAlanKapsayicisi"><select id="YeniGonderimIcinHazirOlmaZamanAraligiSuresi" name="YeniGonderimIcinHazirOlmaZamanAraligiSuresi" class="FormAlaniIciSelectleri" tabindex="12">
					<option value="1 Dakika" <?php if($EMailHesapBilgileriSorgusuKaydiYeniGonderimIcinHazirOlmaZamanAraligiSuresi=="1 Dakika"){ ?>selected="selected"<?php } ?>>1 Dakika</option>
					<option value="2 Dakika" <?php if($EMailHesapBilgileriSorgusuKaydiYeniGonderimIcinHazirOlmaZamanAraligiSuresi=="2 Dakika"){ ?>selected="selected"<?php } ?>>2 Dakika</option>
					<option value="3 Dakika" <?php if($EMailHesapBilgileriSorgusuKaydiYeniGonderimIcinHazirOlmaZamanAraligiSuresi=="3 Dakika"){ ?>selected="selected"<?php } ?>>3 Dakika</option>
					<option value="4 Dakika" <?php if($EMailHesapBilgileriSorgusuKaydiYeniGonderimIcinHazirOlmaZamanAraligiSuresi=="4 Dakika"){ ?>selected="selected"<?php } ?>>4 Dakika</option>
					<option value="5 Dakika" <?php if($EMailHesapBilgileriSorgusuKaydiYeniGonderimIcinHazirOlmaZamanAraligiSuresi=="5 Dakika"){ ?>selected="selected"<?php } ?>>5 Dakika</option>
					<option value="10 Dakika" <?php if($EMailHesapBilgileriSorgusuKaydiYeniGonderimIcinHazirOlmaZamanAraligiSuresi=="10 Dakika"){ ?>selected="selected"<?php } ?>>10 Dakika</option>
					<option value="15 Dakika" <?php if($EMailHesapBilgileriSorgusuKaydiYeniGonderimIcinHazirOlmaZamanAraligiSuresi=="15 Dakika"){ ?>selected="selected"<?php } ?>>15 Dakika</option>
					<option value="30 Dakika" <?php if($EMailHesapBilgileriSorgusuKaydiYeniGonderimIcinHazirOlmaZamanAraligiSuresi=="30 Dakika"){ ?>selected="selected"<?php } ?>>30 Dakika</option>
					<option value="45 Dakika" <?php if($EMailHesapBilgileriSorgusuKaydiYeniGonderimIcinHazirOlmaZamanAraligiSuresi=="45 Dakika"){ ?>selected="selected"<?php } ?>>45 Dakika</option>
					<option value="1 Saat" <?php if($EMailHesapBilgileriSorgusuKaydiYeniGonderimIcinHazirOlmaZamanAraligiSuresi=="1 Saat"){ ?>selected="selected"<?php } ?>>1 Saat</option>
					<option value="2 Saat" <?php if($EMailHesapBilgileriSorgusuKaydiYeniGonderimIcinHazirOlmaZamanAraligiSuresi=="2 Saat"){ ?>selected="selected"<?php } ?>>2 Saat</option>
					<option value="3 Saat" <?php if($EMailHesapBilgileriSorgusuKaydiYeniGonderimIcinHazirOlmaZamanAraligiSuresi=="3 Saat"){ ?>selected="selected"<?php } ?>>3 Saat</option>
					<option value="4 Saat" <?php if($EMailHesapBilgileriSorgusuKaydiYeniGonderimIcinHazirOlmaZamanAraligiSuresi=="4 Saat"){ ?>selected="selected"<?php } ?>>4 Saat</option>
					<option value="5 Saat" <?php if($EMailHesapBilgileriSorgusuKaydiYeniGonderimIcinHazirOlmaZamanAraligiSuresi=="5 Saat"){ ?>selected="selected"<?php } ?>>5 Saat</option>
					<option value="6 Saat" <?php if($EMailHesapBilgileriSorgusuKaydiYeniGonderimIcinHazirOlmaZamanAraligiSuresi=="6 Saat"){ ?>selected="selected"<?php } ?>>6 Saat</option>
					<option value="7 Saat" <?php if($EMailHesapBilgileriSorgusuKaydiYeniGonderimIcinHazirOlmaZamanAraligiSuresi=="7 Saat"){ ?>selected="selected"<?php } ?>>7 Saat</option>
					<option value="8 Saat" <?php if($EMailHesapBilgileriSorgusuKaydiYeniGonderimIcinHazirOlmaZamanAraligiSuresi=="8 Saat"){ ?>selected="selected"<?php } ?>>8 Saat</option>
					<option value="9 Saat" <?php if($EMailHesapBilgileriSorgusuKaydiYeniGonderimIcinHazirOlmaZamanAraligiSuresi=="9 Saat"){ ?>selected="selected"<?php } ?>>9 Saat</option>
					<option value="10 Saat" <?php if($EMailHesapBilgileriSorgusuKaydiYeniGonderimIcinHazirOlmaZamanAraligiSuresi=="10 Saat"){ ?>selected="selected"<?php } ?>>10 Saat</option>
					<option value="11 Saat" <?php if($EMailHesapBilgileriSorgusuKaydiYeniGonderimIcinHazirOlmaZamanAraligiSuresi=="11 Saat"){ ?>selected="selected"<?php } ?>>11 Saat</option>
					<option value="12 Saat" <?php if($EMailHesapBilgileriSorgusuKaydiYeniGonderimIcinHazirOlmaZamanAraligiSuresi=="12 Saat"){ ?>selected="selected"<?php } ?>>12 Saat</option>
					<option value="13 Saat" <?php if($EMailHesapBilgileriSorgusuKaydiYeniGonderimIcinHazirOlmaZamanAraligiSuresi=="13 Saat"){ ?>selected="selected"<?php } ?>>13 Saat</option>
					<option value="14 Saat" <?php if($EMailHesapBilgileriSorgusuKaydiYeniGonderimIcinHazirOlmaZamanAraligiSuresi=="14 Saat"){ ?>selected="selected"<?php } ?>>14 Saat</option>
					<option value="15 Saat" <?php if($EMailHesapBilgileriSorgusuKaydiYeniGonderimIcinHazirOlmaZamanAraligiSuresi=="15 Saat"){ ?>selected="selected"<?php } ?>>15 Saat</option>
					<option value="16 Saat" <?php if($EMailHesapBilgileriSorgusuKaydiYeniGonderimIcinHazirOlmaZamanAraligiSuresi=="16 Saat"){ ?>selected="selected"<?php } ?>>16 Saat</option>
					<option value="17 Saat" <?php if($EMailHesapBilgileriSorgusuKaydiYeniGonderimIcinHazirOlmaZamanAraligiSuresi=="17 Saat"){ ?>selected="selected"<?php } ?>>17 Saat</option>
					<option value="18 Saat" <?php if($EMailHesapBilgileriSorgusuKaydiYeniGonderimIcinHazirOlmaZamanAraligiSuresi=="18 Saat"){ ?>selected="selected"<?php } ?>>18 Saat</option>
					<option value="19 Saat" <?php if($EMailHesapBilgileriSorgusuKaydiYeniGonderimIcinHazirOlmaZamanAraligiSuresi=="19 Saat"){ ?>selected="selected"<?php } ?>>19 Saat</option>
					<option value="20 Saat" <?php if($EMailHesapBilgileriSorgusuKaydiYeniGonderimIcinHazirOlmaZamanAraligiSuresi=="20 Saat"){ ?>selected="selected"<?php } ?>>20 Saat</option>
					<option value="21 Saat" <?php if($EMailHesapBilgileriSorgusuKaydiYeniGonderimIcinHazirOlmaZamanAraligiSuresi=="21 Saat"){ ?>selected="selected"<?php } ?>>21 Saat</option>
					<option value="22 Saat" <?php if($EMailHesapBilgileriSorgusuKaydiYeniGonderimIcinHazirOlmaZamanAraligiSuresi=="22 Saat"){ ?>selected="selected"<?php } ?>>22 Saat</option>
					<option value="23 Saat" <?php if($EMailHesapBilgileriSorgusuKaydiYeniGonderimIcinHazirOlmaZamanAraligiSuresi=="23 Saat"){ ?>selected="selected"<?php } ?>>23 Saat</option>
					<option value="1 Gün" <?php if($EMailHesapBilgileriSorgusuKaydiYeniGonderimIcinHazirOlmaZamanAraligiSuresi=="1 Gün"){ ?>selected="selected"<?php } ?>>1 Gün</option>
				</select></div>
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Dinlendirilmeler İçin Zaman Aralığı (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="UcYuzPixselSinirliAlanKapsayicisi"><select id="DinlendirmeZamanAraligiSuresi" name="DinlendirmeZamanAraligiSuresi" class="FormAlaniIciSelectleri" tabindex="13">
					<option value="1 Saat" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="1 Saat"){ ?>selected="selected"<?php } ?>>1 Saat</option>
					<option value="2 Saat" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="2 Saat"){ ?>selected="selected"<?php } ?>>2 Saat</option>
					<option value="3 Saat" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="3 Saat"){ ?>selected="selected"<?php } ?>>3 Saat</option>
					<option value="4 Saat" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="4 Saat"){ ?>selected="selected"<?php } ?>>4 Saat</option>
					<option value="5 Saat" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="5 Saat"){ ?>selected="selected"<?php } ?>>5 Saat</option>
					<option value="6 Saat" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="6 Saat"){ ?>selected="selected"<?php } ?>>6 Saat</option>
					<option value="7 Saat" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="7 Saat"){ ?>selected="selected"<?php } ?>>7 Saat</option>
					<option value="8 Saat" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="8 Saat"){ ?>selected="selected"<?php } ?>>8 Saat</option>
					<option value="9 Saat" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="9 Saat"){ ?>selected="selected"<?php } ?>>9 Saat</option>
					<option value="10 Saat" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="10 Saat"){ ?>selected="selected"<?php } ?>>10 Saat</option>
					<option value="11 Saat" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="11 Saat"){ ?>selected="selected"<?php } ?>>11 Saat</option>
					<option value="12 Saat" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="12 Saat"){ ?>selected="selected"<?php } ?>>12 Saat</option>
					<option value="13 Saat" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="13 Saat"){ ?>selected="selected"<?php } ?>>13 Saat</option>
					<option value="14 Saat" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="14 Saat"){ ?>selected="selected"<?php } ?>>14 Saat</option>
					<option value="15 Saat" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="15 Saat"){ ?>selected="selected"<?php } ?>>15 Saat</option>
					<option value="16 Saat" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="16 Saat"){ ?>selected="selected"<?php } ?>>16 Saat</option>
					<option value="17 Saat" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="17 Saat"){ ?>selected="selected"<?php } ?>>17 Saat</option>
					<option value="18 Saat" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="18 Saat"){ ?>selected="selected"<?php } ?>>18 Saat</option>
					<option value="19 Saat" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="19 Saat"){ ?>selected="selected"<?php } ?>>19 Saat</option>
					<option value="20 Saat" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="20 Saat"){ ?>selected="selected"<?php } ?>>20 Saat</option>
					<option value="21 Saat" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="21 Saat"){ ?>selected="selected"<?php } ?>>21 Saat</option>
					<option value="22 Saat" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="22 Saat"){ ?>selected="selected"<?php } ?>>22 Saat</option>
					<option value="23 Saat" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="23 Saat"){ ?>selected="selected"<?php } ?>>23 Saat</option>
					<option value="1 Gün" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="1 Gün"){ ?>selected="selected"<?php } ?>>1 Gün</option>
					<option value="2 Gün" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="2 Gün"){ ?>selected="selected"<?php } ?>>2 Gün</option>
					<option value="3 Gün" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="3 Gün"){ ?>selected="selected"<?php } ?>>3 Gün</option>
					<option value="4 Gün" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="4 Gün"){ ?>selected="selected"<?php } ?>>4 Gün</option>
					<option value="5 Gün" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="5 Gün"){ ?>selected="selected"<?php } ?>>5 Gün</option>
					<option value="6 Gün" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="6 Gün"){ ?>selected="selected"<?php } ?>>6 Gün</option>
					<option value="7 Gün" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="7 Gün"){ ?>selected="selected"<?php } ?>>7 Gün</option>
					<option value="8 Gün" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="8 Gün"){ ?>selected="selected"<?php } ?>>8 Gün</option>
					<option value="9 Gün" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="9 Gün"){ ?>selected="selected"<?php } ?>>9 Gün</option>
					<option value="10 Gün" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="10 Gün"){ ?>selected="selected"<?php } ?>>10 Gün</option>
					<option value="11 Gün" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="11 Gün"){ ?>selected="selected"<?php } ?>>11 Gün</option>
					<option value="12 Gün" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="12 Gün"){ ?>selected="selected"<?php } ?>>12 Gün</option>
					<option value="13 Gün" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="13 Gün"){ ?>selected="selected"<?php } ?>>13 Gün</option>
					<option value="14 Gün" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="14 Gün"){ ?>selected="selected"<?php } ?>>14 Gün</option>
					<option value="15 Gün" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="15 Gün"){ ?>selected="selected"<?php } ?>>15 Gün</option>
					<option value="16 Gün" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="16 Gün"){ ?>selected="selected"<?php } ?>>16 Gün</option>
					<option value="17 Gün" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="17 Gün"){ ?>selected="selected"<?php } ?>>17 Gün</option>
					<option value="18 Gün" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="18 Gün"){ ?>selected="selected"<?php } ?>>18 Gün</option>
					<option value="19 Gün" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="19 Gün"){ ?>selected="selected"<?php } ?>>19 Gün</option>
					<option value="20 Gün" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="20 Gün"){ ?>selected="selected"<?php } ?>>20 Gün</option>
					<option value="21 Gün" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="21 Gün"){ ?>selected="selected"<?php } ?>>21 Gün</option>
					<option value="22 Gün" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="22 Gün"){ ?>selected="selected"<?php } ?>>22 Gün</option>
					<option value="23 Gün" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="23 Gün"){ ?>selected="selected"<?php } ?>>23 Gün</option>
					<option value="24 Gün" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="24 Gün"){ ?>selected="selected"<?php } ?>>24 Gün</option>
					<option value="25 Gün" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="25 Gün"){ ?>selected="selected"<?php } ?>>25 Gün</option>
					<option value="26 Gün" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="26 Gün"){ ?>selected="selected"<?php } ?>>26 Gün</option>
					<option value="27 Gün" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="27 Gün"){ ?>selected="selected"<?php } ?>>27 Gün</option>
					<option value="28 Gün" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="28 Gün"){ ?>selected="selected"<?php } ?>>28 Gün</option>
					<option value="29 Gün" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="29 Gün"){ ?>selected="selected"<?php } ?>>29 Gün</option>
					<option value="1 Ay" <?php if($EMailHesapBilgileriSorgusuKaydiDinlendirmeZamanAraligiSuresi=="1 Ay"){ ?>selected="selected"<?php } ?>>1 Ay</option>
				</select></div>
			</div>
		</div>	
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Sıra Numarası (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="UcYuzPixselSinirliAlanKapsayicisi"><select id="SiraNumarasi" name="SiraNumarasi" class="FormAlaniIciSelectleri" tabindex="14">
					<?php
					$SonSiraNumarasiSorgusu					=	$VeritabaniBaglantisi->query("SELECT * FROM emailhesapayarlari ORDER BY SiraNumarasi DESC LIMIT 1");
					$SonSiraNumarasiSorgusuKayitSayisi		=	$SonSiraNumarasiSorgusu->num_rows;
						if($SonSiraNumarasiSorgusuKayitSayisi>0){
							$SonSiraNumarasiSorgusuKaydi	=	$SonSiraNumarasiSorgusu->fetch_assoc();
								$SonSiraNumarasiSorgusuKaydiSiraNumarasi	=	$SonSiraNumarasiSorgusuKaydi["SiraNumarasi"];
								$SonSiraNumarasi							=	$SonSiraNumarasiSorgusuKaydiSiraNumarasi;
						}else{
							header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=109");
							exit();
						}
				
					$DonguBaslangicDegeri	=	1;
					$DonguBitisDegeri		=	$SonSiraNumarasi;
				
					while($DonguBaslangicDegeri<=$DonguBitisDegeri){
					?>
						<option value="<?php echo $DonguBaslangicDegeri; ?>" <?php if($EMailHesapBilgileriSorgusuKaydiSiraNumarasi==$DonguBaslangicDegeri){ ?>selected="selected"<?php } ?>><?php echo $DonguBaslangicDegeri; ?></option>
					<?php
						$DonguBaslangicDegeri++;
					}
					?>
				</select></div>
			</div>
		</div>
	
		<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
			<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
				Çalışma Durumu (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSerbestSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="FormAlanlariIciTumRadioButonAlanlariKapsayicisi">
					<span class="FormAlanlariIciRadioButonAlanlariKapsayicisi">
						<label class="FormAlanlariIciRadioButonAlani">
							<input type="radio" id="CalismaDurumuSecenekBir" name="CalismaDurumu" value="1" class="FormAlanlariIciRadioInputlari" <?php if($EMailHesapBilgileriSorgusuKaydiCalismaDurumu==1){ ?>checked="checked"<?php } ?>>
							<span class="FormAlanlariIciRadioButonAlanlariIcinBicimlendirmeAlani"></span> <span class="FormAlanlariIciRadioButonAlanlariIcinMetinAlani">Aktif</span>
						</label>
					</span>
					<span class="FormAlanlariIciRadioButonAlanlariKapsayicisi">
						<label class="FormAlanlariIciRadioButonAlani">
							<input type="radio" id="CalismaDurumuSecenekIki" name="CalismaDurumu" value="0" class="FormAlanlariIciRadioInputlari" <?php if($EMailHesapBilgileriSorgusuKaydiCalismaDurumu==0){ ?>checked="checked"<?php } ?>>
							<span class="FormAlanlariIciRadioButonAlanlariIcinBicimlendirmeAlani"></span> <span class="FormAlanlariIciRadioButonAlanlariIcinMetinAlani">Pasif</span>
						</label>
					</span>
				</div>
			</div>
		</div>
		
		<div class="SayfaIciButonlarIcinSatirAlanlariKapsayicisi">
			<input type="button" value="Güncelle" class="FormAlaniIciGuncelleButonlari" onClick="GuncellemeFormKontrol()" tabindex="15">
		</div>
	</form>
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