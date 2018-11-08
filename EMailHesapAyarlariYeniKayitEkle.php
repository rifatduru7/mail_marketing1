<? if(isset($_SESSION["Yonetici"])){ ?>
<script type="text/javascript" language="javascript">
	function KayitEklemeFormKontrol(){
		if(document.KayitEklemeFormu.EMailAdresi.value==""){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"E-Mail Adresi\" değeri boş bırakılamaz. Lütfen geçerli bir \"E-Mail Adresi\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if(document.KayitEklemeFormu.EMailAdresi.value!=""){
			var EMailAdresiDegeri	=	document.getElementById("EMailAdresi").value;
			var EMailAdresiKontrol	=	EMailKontrolEt(EMailAdresiDegeri);
				if(EMailAdresiKontrol==false){
					document.getElementById("ModalMetinAlani").innerHTML	=	"Kayıt formu dahilinde bulunan, \"E-Mail Adresi\" geçersizdir. Lütfen geçerli bir \"E-Mail Adresi\" değeri giriniz.";
					ModalAc();
					return;
				}
		}
		
		if(document.KayitEklemeFormu.EMailAdresiSifresi.value==""){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"E-Mail Adresi Şifresi\" değeri boş bırakılamaz. Lütfen geçerli bir \"E-Mail Adresi Şifresi\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		var POP3SunucuBaglantiTuruElemani		=	document.getElementsByName("POP3SunucuBaglantiTuru");
		if((POP3SunucuBaglantiTuruElemani[0].checked==false) && (POP3SunucuBaglantiTuruElemani[1].checked==false)){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"POP3 Sunucusu Bağlantı Türü\" değeri boş bırakılamaz. Lütfen geçerli bir \"POP3 Sunucusu Bağlantı Türü\" değeri seçiniz.";
			ModalAc();
			return;
		}
		
		if(document.KayitEklemeFormu.POP3SunucuAdresi.value==""){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"POP3 Sunucusu Bağlantı Adresi\" değeri boş bırakılamaz. Lütfen geçerli bir \"POP3 Sunucusu Bağlantı Adresi\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if(document.KayitEklemeFormu.POP3SunucuAdresi.value!=""){
			var POP3SunucuAdresiDegeri	=	document.getElementById("POP3SunucuAdresi").value;
			var POP3SunucuAdresiKontrol	=	LinkKontrolEt(POP3SunucuAdresiDegeri);
				if(POP3SunucuAdresiKontrol==false){
					document.getElementById("ModalMetinAlani").innerHTML	=	"Kayıt formu dahilinde bulunan, \"POP3 Sunucusu Bağlantı Adresi\" geçersizdir. Lütfen geçerli bir \"POP3 Sunucusu Bağlantı Adresi\" değeri giriniz.";
					ModalAc();
					return;
				}
		}
		
		if((document.KayitEklemeFormu.POP3SunucusuSSLPortu.value=="") || (document.KayitEklemeFormu.POP3SunucusuSSLPortu.value==0)){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"POP3 Sunucusu SSL Portu\" değeri boş bırakılamaz. Lütfen geçerli bir \"POP3 Sunucusu SSL Portu\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if((document.KayitEklemeFormu.POP3SunucusuTLSPortu.value=="") || (document.KayitEklemeFormu.POP3SunucusuTLSPortu.value==0)){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"POP3 Sunucusu TLS Portu\" değeri boş bırakılamaz. Lütfen geçerli bir \"POP3 Sunucusu TLS Portu\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		var SMTPSunucuBaglantiTuruElemani		=	document.getElementsByName("SMTPSunucuBaglantiTuru");
		if((SMTPSunucuBaglantiTuruElemani[0].checked==false) && (SMTPSunucuBaglantiTuruElemani[1].checked==false)){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"SMTP Sunucusu Bağlantı Türü\" değeri boş bırakılamaz. Lütfen geçerli bir \"SMTP Sunucusu Bağlantı Türü\" değeri seçiniz.";
			ModalAc();
			return;
		}
		
		if(document.KayitEklemeFormu.SMTPSunucuAdresi.value==""){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"SMTP Sunucu Adresi\" değeri boş bırakılamaz. Lütfen geçerli bir \"SMTP Sunucu Adresi\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if(document.KayitEklemeFormu.SMTPSunucuAdresi.value!=""){
			var SMTPSunucuAdresiDegeri	=	document.getElementById("SMTPSunucuAdresi").value;
			var SMTPSunucuAdresiKontrol	=	LinkKontrolEt(SMTPSunucuAdresiDegeri);
				if(SMTPSunucuAdresiKontrol==false){
					document.getElementById("ModalMetinAlani").innerHTML	=	"Kayıt formu dahilinde bulunan, \"SMTP Sunucu Adresi\" geçersizdir. Lütfen geçerli bir \"SMTP Sunucu Adresi\" değeri giriniz.";
					ModalAc();
					return;
				}
		}
		
		if((document.KayitEklemeFormu.SMTPSunucusuSSLPortu.value=="") || (document.KayitEklemeFormu.SMTPSunucusuSSLPortu.value==0)){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"SMTP Sunucusu SSL Portu\" değeri boş bırakılamaz. Lütfen geçerli bir \"SMTP Sunucusu SSL Portu\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if((document.KayitEklemeFormu.SMTPSunucusuTLSPortu.value=="") || (document.KayitEklemeFormu.SMTPSunucusuTLSPortu.value==0)){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"SMTP Sunucusu TLS Portu\" değeri boş bırakılamaz. Lütfen geçerli bir \"SMTP Sunucusu TLS Portu\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		var IMAPSunucuBaglantiTuruElemani		=	document.getElementsByName("IMAPSunucuBaglantiTuru");
		if((IMAPSunucuBaglantiTuruElemani[0].checked==false) && (IMAPSunucuBaglantiTuruElemani[1].checked==false)){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"IMAP Sunucusu Bağlantı Türü\" değeri boş bırakılamaz. Lütfen geçerli bir \"IMAP Sunucusu Bağlantı Türü\" değeri seçiniz.";
			ModalAc();
			return;
		}
		
		if(document.KayitEklemeFormu.IMAPSunucuAdresi.value==""){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"IMAP Sunucu Adresi\" değeri boş bırakılamaz. Lütfen geçerli bir \"IMAP Sunucu Adresi\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if(document.KayitEklemeFormu.IMAPSunucuAdresi.value!=""){
			var IMAPSunucuAdresiDegeri	=	document.getElementById("IMAPSunucuAdresi").value;
			var IMAPSunucuAdresiKontrol	=	LinkKontrolEt(IMAPSunucuAdresiDegeri);
				if(IMAPSunucuAdresiKontrol==false){
					document.getElementById("ModalMetinAlani").innerHTML	=	"Kayıt formu dahilinde bulunan, \"IMAP Sunucu Adresi\" geçersizdir. Lütfen geçerli bir \"IMAP Sunucu Adresi\" değeri giriniz.";
					ModalAc();
					return;
				}
		}
		
		if((document.KayitEklemeFormu.IMAPSunucusuSSLPortu.value=="") || (document.KayitEklemeFormu.IMAPSunucusuSSLPortu.value==0)){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"IMAP Sunucusu SSL Portu\" değeri boş bırakılamaz. Lütfen geçerli bir \"IMAP Sunucusu SSL Portu\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if((document.KayitEklemeFormu.IMAPSunucusuTLSPortu.value=="") || (document.KayitEklemeFormu.IMAPSunucusuTLSPortu.value==0)){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"IMAP Sunucusu TLS Portu\" değeri boş bırakılamaz. Lütfen geçerli bir \"IMAP Sunucusu TLS Portu\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if((document.KayitEklemeFormu.GunlukMaksimumMailGonderimSayisi.value=="") || (document.KayitEklemeFormu.GunlukMaksimumMailGonderimSayisi.value==0)){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"Günlük Maksimum Gönderim Sayısı\" değeri boş bırakılamaz. Lütfen geçerli bir \"Günlük Maksimum Gönderim Sayısı\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if(document.KayitEklemeFormu.YeniGonderimIcinHazirOlmaZamanAraligiSuresi.value==""){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"Yeni Gönderimler İçin Zaman Aralığı\" değeri boş bırakılamaz. Lütfen geçerli bir \"Yeni Gönderimler İçin Zaman Aralığı\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if(document.KayitEklemeFormu.DinlendirmeZamanAraligiSuresi.value==""){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"Dinlendirilmeler İçin Zaman Aralığı\" değeri boş bırakılamaz. Lütfen geçerli bir \"Dinlendirilmeler İçin Zaman Aralığı\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		
		if(document.KayitEklemeFormu.SiraNumarasi.value==""){
			document.getElementById("ModalMetinAlani").innerHTML		=	"Kayıt formu dahilinde bulunan, \"Sıra Numarası\" değeri boş bırakılamaz. Lütfen geçerli bir \"Sıra Numarası\" değeri seçiniz.";
			ModalAc();
			return;
		}
		
		var CalismaDurumuElemani		=	document.getElementsByName("CalismaDurumu");
		if((CalismaDurumuElemani[0].checked==false) && (CalismaDurumuElemani[1].checked==false)){
			document.getElementById("ModalMetinAlani").innerHTML		=	"Kayıt formu dahilinde bulunan, \"Çalışma Durumu\" değeri boş bırakılamaz. Lütfen geçerli bir \"Çalışma Durumu\" değeri seçiniz.";
			ModalAc();
			return;
		}
	
		document.KayitEklemeFormu.submit();
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
	<form id="KayitEklemeFormu" name="KayitEklemeFormu" action="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=115" method="POST">
		<div class="SayfaIciBaslikAlanlariKapsayicisi">
			<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=109" target="_top">E-Mail Hesapları</a> > Yeni Kayıt Ekle
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				E-Mail Adresi (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="EMailAdresi" name="EMailAdresi" onKeyUp="EMailAdresiAlanlariIcinFiltrele('EMailAdresi')" class="FormAlaniIciTextInputlari" maxlength="100" tabindex="1">
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				E-Mail Adresi Şifresi (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="EMailAdresiSifresi" name="EMailAdresiSifresi" onKeyUp="KullaniciSifresiAlanlariIcinFiltrele('EMailAdresiSifresi')" class="FormAlaniIciTextInputlari" maxlength="50" tabindex="2">
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
							<input type="radio" id="POP3SunucuBaglantiTuruSecenekBir" name="POP3SunucuBaglantiTuru" value="SSL" class="FormAlanlariIciRadioInputlari">
							<span class="FormAlanlariIciRadioButonAlanlariIcinBicimlendirmeAlani"></span> <span class="FormAlanlariIciRadioButonAlanlariIcinMetinAlani">SSL</span>
						</label>
					</span>
					<span class="FormAlanlariIciRadioButonAlanlariKapsayicisi">
						<label class="FormAlanlariIciRadioButonAlani">
							<input type="radio" id="POP3SunucuBaglantiTuruSecenekIki" name="POP3SunucuBaglantiTuru" value="TLS" class="FormAlanlariIciRadioInputlari">
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
				<input type="text" id="POP3SunucuAdresi" name="POP3SunucuAdresi" onKeyUp="LinkAlanlariIcinFiltrele('POP3SunucuAdresi')" class="FormAlaniIciTextInputlari" maxlength="100" tabindex="3">
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				POP3 Sunucusu SSL Portu (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="YuzPixselSinirliAlanKapsayicisi"><input type="number" id="POP3SunucusuSSLPortu" name="POP3SunucusuSSLPortu" class="FormAlaniIciTextInputlari" maxlength="3" min="0" max="999" tabindex="4"></div>
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				POP3 Sunucusu TLS Portu (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="YuzPixselSinirliAlanKapsayicisi"><input type="number" id="POP3SunucusuTLSPortu" name="POP3SunucusuTLSPortu" class="FormAlaniIciTextInputlari" maxlength="3" min="0" max="999" tabindex="5"></div>
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
							<input type="radio" id="SMTPSunucuBaglantiTuruSecenekBir" name="SMTPSunucuBaglantiTuru" value="SSL" class="FormAlanlariIciRadioInputlari">
							<span class="FormAlanlariIciRadioButonAlanlariIcinBicimlendirmeAlani"></span> <span class="FormAlanlariIciRadioButonAlanlariIcinMetinAlani">SSL</span>
						</label>
					</span>
					<span class="FormAlanlariIciRadioButonAlanlariKapsayicisi">
						<label class="FormAlanlariIciRadioButonAlani">
							<input type="radio" id="SMTPSunucuBaglantiTuruSecenekIki" name="SMTPSunucuBaglantiTuru" value="TLS" class="FormAlanlariIciRadioInputlari">
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
				<input type="text" id="SMTPSunucuAdresi" name="SMTPSunucuAdresi" onKeyUp="LinkAlanlariIcinFiltrele('SMTPSunucuAdresi')" class="FormAlaniIciTextInputlari" maxlength="100" tabindex="6">
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				SMTP Sunucusu SSL Portu (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="YuzPixselSinirliAlanKapsayicisi"><input type="number" id="SMTPSunucusuSSLPortu" name="SMTPSunucusuSSLPortu" class="FormAlaniIciTextInputlari" maxlength="3" min="0" max="999" tabindex="7"></div>
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				SMTP Sunucusu TLS Portu (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="YuzPixselSinirliAlanKapsayicisi"><input type="number" id="SMTPSunucusuTLSPortu" name="SMTPSunucusuTLSPortu" class="FormAlaniIciTextInputlari" maxlength="3" min="0" max="999" tabindex="8"></div>
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
							<input type="radio" id="IMAPSunucuBaglantiTuruSecenekBir" name="IMAPSunucuBaglantiTuru" value="SSL" class="FormAlanlariIciRadioInputlari">
							<span class="FormAlanlariIciRadioButonAlanlariIcinBicimlendirmeAlani"></span> <span class="FormAlanlariIciRadioButonAlanlariIcinMetinAlani">SSL</span>
						</label>
					</span>
					<span class="FormAlanlariIciRadioButonAlanlariKapsayicisi">
						<label class="FormAlanlariIciRadioButonAlani">
							<input type="radio" id="IMAPSunucuBaglantiTuruSecenekIki" name="IMAPSunucuBaglantiTuru" value="TLS" class="FormAlanlariIciRadioInputlari">
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
				<input type="text" id="IMAPSunucuAdresi" name="IMAPSunucuAdresi" onKeyUp="LinkAlanlariIcinFiltrele('IMAPSunucuAdresi')" class="FormAlaniIciTextInputlari" maxlength="100" tabindex="9">
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				IMAP Sunucusu SSL Portu (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="YuzPixselSinirliAlanKapsayicisi"><input type="number" id="IMAPSunucusuSSLPortu" name="IMAPSunucusuSSLPortu" class="FormAlaniIciTextInputlari" maxlength="3" min="0" max="999" tabindex="10"></div>
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				IMAP Sunucusu TLS Portu (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="YuzPixselSinirliAlanKapsayicisi"><input type="number" id="IMAPSunucusuTLSPortu" name="IMAPSunucusuTLSPortu" class="FormAlaniIciTextInputlari" maxlength="3" min="0" max="999" tabindex="11"></div>
			</div>
		</div>	
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Günlük Maksimum Gönderim Sayısı (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="YuzPixselSinirliAlanKapsayicisi"><input type="number" id="GunlukMaksimumMailGonderimSayisi" name="GunlukMaksimumMailGonderimSayisi" class="FormAlaniIciTextInputlari" maxlength="5" min="0" max="99999" tabindex="12"></div>
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Yeni Gönderimler İçin Zaman Aralığı (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="UcYuzPixselSinirliAlanKapsayicisi"><select id="YeniGonderimIcinHazirOlmaZamanAraligiSuresi" name="YeniGonderimIcinHazirOlmaZamanAraligiSuresi" class="FormAlaniIciSelectleri" tabindex="13">
					<option value="" selected="selected"></option>
					<option value="1 Dakika">1 Dakika</option>
					<option value="2 Dakika">2 Dakika</option>
					<option value="3 Dakika">3 Dakika</option>
					<option value="4 Dakika">4 Dakika</option>
					<option value="5 Dakika">5 Dakika</option>
					<option value="10 Dakika">10 Dakika</option>
					<option value="15 Dakika">15 Dakika</option>
					<option value="30 Dakika">30 Dakika</option>
					<option value="45 Dakika">45 Dakika</option>
					<option value="1 Saat">1 Saat</option>
					<option value="2 Saat">2 Saat</option>
					<option value="3 Saat">3 Saat</option>
					<option value="4 Saat">4 Saat</option>
					<option value="5 Saat">5 Saat</option>
					<option value="6 Saat">6 Saat</option>
					<option value="7 Saat">7 Saat</option>
					<option value="8 Saat">8 Saat</option>
					<option value="9 Saat">9 Saat</option>
					<option value="10 Saat">10 Saat</option>
					<option value="11 Saat">11 Saat</option>
					<option value="12 Saat">12 Saat</option>
					<option value="13 Saat">13 Saat</option>
					<option value="14 Saat">14 Saat</option>
					<option value="15 Saat">15 Saat</option>
					<option value="16 Saat">16 Saat</option>
					<option value="17 Saat">17 Saat</option>
					<option value="18 Saat">18 Saat</option>
					<option value="19 Saat">19 Saat</option>
					<option value="20 Saat">20 Saat</option>
					<option value="21 Saat">21 Saat</option>
					<option value="22 Saat">22 Saat</option>
					<option value="23 Saat">23 Saat</option>
					<option value="1 Gün">1 Gün</option>
				</select></div>
			</div>
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Dinlendirilmeler İçin Zaman Aralığı (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="UcYuzPixselSinirliAlanKapsayicisi"><select id="DinlendirmeZamanAraligiSuresi" name="DinlendirmeZamanAraligiSuresi" class="FormAlaniIciSelectleri" tabindex="14">
					<option value="" selected="selected"></option>
					<option value="1 Saat">1 Saat</option>
					<option value="2 Saat">2 Saat</option>
					<option value="3 Saat">3 Saat</option>
					<option value="4 Saat">4 Saat</option>
					<option value="5 Saat">5 Saat</option>
					<option value="6 Saat">6 Saat</option>
					<option value="7 Saat">7 Saat</option>
					<option value="8 Saat">8 Saat</option>
					<option value="9 Saat">9 Saat</option>
					<option value="10 Saat">10 Saat</option>
					<option value="11 Saat">11 Saat</option>
					<option value="12 Saat">12 Saat</option>
					<option value="13 Saat">13 Saat</option>
					<option value="14 Saat">14 Saat</option>
					<option value="15 Saat">15 Saat</option>
					<option value="16 Saat">16 Saat</option>
					<option value="17 Saat">17 Saat</option>
					<option value="18 Saat">18 Saat</option>
					<option value="19 Saat">19 Saat</option>
					<option value="20 Saat">20 Saat</option>
					<option value="21 Saat">21 Saat</option>
					<option value="22 Saat">22 Saat</option>
					<option value="23 Saat">23 Saat</option>
					<option value="1 Gün">1 Gün</option>
					<option value="2 Gün">2 Gün</option>
					<option value="3 Gün">3 Gün</option>
					<option value="4 Gün">4 Gün</option>
					<option value="5 Gün">5 Gün</option>
					<option value="6 Gün">6 Gün</option>
					<option value="7 Gün">7 Gün</option>
					<option value="8 Gün">8 Gün</option>
					<option value="9 Gün">9 Gün</option>
					<option value="10 Gün">10 Gün</option>
					<option value="11 Gün">11 Gün</option>
					<option value="12 Gün">12 Gün</option>
					<option value="13 Gün">13 Gün</option>
					<option value="14 Gün">14 Gün</option>
					<option value="15 Gün">15 Gün</option>
					<option value="16 Gün">16 Gün</option>
					<option value="17 Gün">17 Gün</option>
					<option value="18 Gün">18 Gün</option>
					<option value="19 Gün">19 Gün</option>
					<option value="20 Gün">20 Gün</option>
					<option value="21 Gün">21 Gün</option>
					<option value="22 Gün">22 Gün</option>
					<option value="23 Gün">23 Gün</option>
					<option value="24 Gün">24 Gün</option>
					<option value="25 Gün">25 Gün</option>
					<option value="26 Gün">26 Gün</option>
					<option value="27 Gün">27 Gün</option>
					<option value="28 Gün">28 Gün</option>
					<option value="29 Gün">29 Gün</option>
					<option value="1 Ay">1 Ay</option>
				</select></div>
			</div>
		</div>	
		
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Sıra Numarası (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="UcYuzPixselSinirliAlanKapsayicisi"><select id="SiraNumarasi" name="SiraNumarasi" class="FormAlaniIciSelectleri" tabindex="15">
					<?php
					$SonSiraNumarasiSorgusu					=	$VeritabaniBaglantisi->query("SELECT * FROM emailhesapayarlari ORDER BY SiraNumarasi DESC LIMIT 1");
					$SonSiraNumarasiSorgusuKayitSayisi		=	$SonSiraNumarasiSorgusu->num_rows;
						if($SonSiraNumarasiSorgusuKayitSayisi>0){
							$SonSiraNumarasiSorgusuKaydi	=	$SonSiraNumarasiSorgusu->fetch_assoc();
							$SonSiraNumarasiSorgusuKaydiSiraNumarasi	=	$SonSiraNumarasiSorgusuKaydi["SiraNumarasi"];
								$SonSiraNumarasi	=	$SonSiraNumarasiSorgusuKaydiSiraNumarasi;
						}else{
							$SonSiraNumarasi		=	0;
						}
				
					$DonguBaslangicDegeri	=	1;
					$DonguBitisDegeri		=	$SonSiraNumarasi+1;
					while($DonguBaslangicDegeri<=$DonguBitisDegeri){
					?>
						<option value="<?php echo $DonguBaslangicDegeri; ?>" <?php if($DonguBaslangicDegeri==$DonguBitisDegeri){ ?>selected="selected"<?php } ?>><?php echo $DonguBaslangicDegeri; ?></option>
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
							<input type="radio" id="CalismaDurumuSecenekBir" name="CalismaDurumu" value="1" class="FormAlanlariIciRadioInputlari">
							<span class="FormAlanlariIciRadioButonAlanlariIcinBicimlendirmeAlani"></span> <span class="FormAlanlariIciRadioButonAlanlariIcinMetinAlani">Aktif</span>
						</label>
					</span>
					<span class="FormAlanlariIciRadioButonAlanlariKapsayicisi">
						<label class="FormAlanlariIciRadioButonAlani">
							<input type="radio" id="CalismaDurumuSecenekIki" name="CalismaDurumu" value="0" class="FormAlanlariIciRadioInputlari">
							<span class="FormAlanlariIciRadioButonAlanlariIcinBicimlendirmeAlani"></span> <span class="FormAlanlariIciRadioButonAlanlariIcinMetinAlani">Pasif</span>
						</label>
					</span>
				</div>
			</div>
		</div>
		
		<div class="SayfaIciButonlarIcinSatirAlanlariKapsayicisi">
			<input type="button" value="Kaydet" class="FormAlaniIciKaydetButonlari" onClick="KayitEklemeFormKontrol()" tabindex="16">
		</div>
	</form>
</div>
<?php }else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>