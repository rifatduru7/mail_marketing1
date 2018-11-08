<? if(isset($_SESSION["Yonetici"])){ ?>
<script type="text/javascript" language="javascript">
	function SistemAyarlariFormKontrol(){
		if(document.SistemAyarlariFormu.SiteAdi.value==""){
			document.getElementById("ModalMetinAlani").innerHTML		=	"Site ayarları formu dahilinde bulunan, \"Genel Ayarlar\" başlığı içerisindeki \"Site Adı\" değeri boş bırakılamaz. Lütfen geçerli bir \"Site Adı\" değeri giriniz.";
			ModalAc();
			return;
		}

		if(document.SistemAyarlariFormu.SiteTitle.value==""){
			document.getElementById("ModalMetinAlani").innerHTML		=	"Site ayarları formu dahilinde bulunan, \"Genel Ayarlar\" başlığı içerisindeki \"Site Title\" değeri boş bırakılamaz. Lütfen geçerli bir \"Site Title\" değeri giriniz.";
			ModalAc();
			return;
		}

		if(document.SistemAyarlariFormu.SiteCopyrightMetni.value==""){
			document.getElementById("ModalMetinAlani").innerHTML		=	"Site ayarları formu dahilinde bulunan, \"Genel Ayarlar\" başlığı içerisindeki \"Site Copyright Metni\" değeri boş bırakılamaz. Lütfen geçerli bir \"Site Copyright Metni\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if(document.SistemAyarlariFormu.SiteFaviconu.value!=""){
			if((document.SistemAyarlariFormu.SiteFaviconu.value.indexOf(".ico")==-1) && (document.SistemAyarlariFormu.SiteFaviconu.value.indexOf(".ICO")==-1)){
				document.getElementById("ModalMetinAlani").innerHTML		=	"Site ayarları formu dahilinde bulunan, \"Genel Ayarlar\" başlığı içerisindeki \"Site Faviconu\" alanı için seçilen dosya formatı uygun değildir. Lütfen geçerli bir dosya seçiniz. Sistem tarafından desteklenen \"Site Faviconu\" dosya formatı .ico'dur.";
				ModalAc();
				return;
			}
		}
		
		if(document.SistemAyarlariFormu.SiteAnaLogosu.value!=""){
			if((document.SistemAyarlariFormu.SiteAnaLogosu.value.indexOf(".png")==-1) && (document.SistemAyarlariFormu.SiteAnaLogosu.value.indexOf(".PNG")==-1)){
				document.getElementById("ModalMetinAlani").innerHTML		=	"Site ayarları formu dahilinde bulunan, \"Genel Ayarlar\" başlığı içerisindeki \"Site Ana Logosu\" alanı için seçilen dosya formatı uygun değildir. Lütfen geçerli bir dosya seçiniz. Sistem tarafından desteklenen \"Site Ana Logosu\" dosya formatı .png'dir.";
				ModalAc();
				return;
			}
		}
		
		if(document.SistemAyarlariFormu.GirisFormuLogosu.value!=""){
			if((document.SistemAyarlariFormu.GirisFormuLogosu.value.indexOf(".jpg")==-1) && (document.SistemAyarlariFormu.GirisFormuLogosu.value.indexOf(".JPG")==-1) && (document.SistemAyarlariFormu.GirisFormuLogosu.value.indexOf(".jpeg")==-1) && (document.SistemAyarlariFormu.GirisFormuLogosu.value.indexOf(".JPEG")==-1) && (document.SistemAyarlariFormu.GirisFormuLogosu.value.indexOf(".png")==-1) && (document.SistemAyarlariFormu.GirisFormuLogosu.value.indexOf(".PNG")==-1) && (document.SistemAyarlariFormu.GirisFormuLogosu.value.indexOf(".gif")==-1) && (document.SistemAyarlariFormu.GirisFormuLogosu.value.indexOf(".GIF")==-1) && (document.SistemAyarlariFormu.GirisFormuLogosu.value.indexOf(".bmp")==-1) && (document.SistemAyarlariFormu.GirisFormuLogosu.value.indexOf(".BMP")==-1)){
				document.getElementById("ModalMetinAlani").innerHTML		=	"Site ayarları formu dahilinde bulunan, \"Genel Ayarlar\" başlığı içerisindeki \"Giriş Formları Logosu\" alanı için seçilen dosya formatı uygun değildir. Lütfen geçerli bir dosya seçiniz. Sistem tarafından desteklenen \"Giriş Formları Logosu\" dosya formatları .jpg, .jpeg, .png, gif ve bmp'dir.";
				ModalAc();
				return;
			}
		}

		if(document.SistemAyarlariFormu.SiteAnaEMailAdresi.value==""){
			document.getElementById("ModalMetinAlani").innerHTML		=	"Site ayarları formu dahilinde bulunan, \"Ana E-Mail Ayarları\" başlığı içerisindeki \"E-Mail Adresi\" değeri boş bırakılamaz. Lütfen geçerli bir \"E-Mail Adresi\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if(document.SistemAyarlariFormu.SiteAnaEMailAdresi.value!=""){
			var SiteAnaEMailAdresiDegeri	=	document.getElementById("SiteAnaEMailAdresi").value;
			var SiteAnaEMailAdresiKontrol	=	EMailKontrolEt(SiteAnaEMailAdresiDegeri);
				if(SiteAnaEMailAdresiKontrol==false){
					document.getElementById("ModalMetinAlani").innerHTML		=	"Site ayarları formu dahilinde bulunan, \"Ana E-Mail Ayarları\" başlığı içerisindeki \"E-Mail Adresi\" geçersizdir. Lütfen geçerli bir \"E-Mail Adresi\" değeri giriniz.";
					ModalAc();
					return;
				}
		}

		if(document.SistemAyarlariFormu.SiteAnaEMailAdresiSifresi.value==""){
			document.getElementById("ModalMetinAlani").innerHTML		=	"Site ayarları formu dahilinde bulunan, \"Ana E-Mail Ayarları\" başlığı içerisindeki \"E-Mail Adresi Şifresi\" değeri boş bırakılamaz. Lütfen geçerli bir \"E-Mail Adresi Şifresi\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		var SiteAnaEMailAdresiPOP3SunucuBaglantiTuruElemani		=	document.getElementsByName("SiteAnaEMailAdresiPOP3SunucuBaglantiTuru");
		if((SiteAnaEMailAdresiPOP3SunucuBaglantiTuruElemani[0].checked==false) && (SiteAnaEMailAdresiPOP3SunucuBaglantiTuruElemani[1].checked==false)){
			document.getElementById("ModalMetinAlani").innerHTML		=	"Site ayarları formu dahilinde bulunan, \"Ana E-Mail Ayarları\" başlığı içerisindeki \"POP3 Sunucu Bağlantı Türü\" değeri boş bırakılamaz. Lütfen geçerli bir \"POP3 Sunucu Bağlantı Türü\" değeri seçiniz.";
			ModalAc();
			return;
		}
		
		if(document.SistemAyarlariFormu.SiteAnaEMailAdresiPOP3SunucuAdresi.value==""){
			document.getElementById("ModalMetinAlani").innerHTML		=	"Site ayarları formu dahilinde bulunan, \"Ana E-Mail Ayarları\" başlığı içerisindeki \"POP3 Sunucu Adresi\" değeri boş bırakılamaz. Lütfen geçerli bir \"POP3 Sunucu Adresi\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if(document.SistemAyarlariFormu.SiteAnaEMailAdresiPOP3SunucuAdresi.value!=""){
			var SiteAnaEMailAdresiPOP3SunucuAdresiDegeri	=	document.getElementById("SiteAnaEMailAdresiPOP3SunucuAdresi").value;
			var SiteAnaEMailAdresiPOP3SunucuAdresiKontrol	=	LinkKontrolEt(SiteAnaEMailAdresiPOP3SunucuAdresiDegeri);
				if(SiteAnaEMailAdresiPOP3SunucuAdresiKontrol==false){
					document.getElementById("ModalMetinAlani").innerHTML		=	"Site ayarları formu dahilinde bulunan, \"Ana E-Mail Ayarları\" başlığı içerisindeki \"POP3 Sunucu Adresi\" geçersizdir. Lütfen geçerli bir \"POP3 Sunucu Adresi\" değeri giriniz.";
					ModalAc();
					return;
				}
		}
		
		if((document.SistemAyarlariFormu.SiteAnaEMailAdresiPOP3SunucusuSSLPortu.value=="") || (document.SistemAyarlariFormu.SiteAnaEMailAdresiPOP3SunucusuSSLPortu.value==0)){
			document.getElementById("ModalMetinAlani").innerHTML		=	"Site ayarları formu dahilinde bulunan, \"Ana E-Mail Ayarları\" başlığı içerisindeki \"POP3 Sunucu SSL Portu\" değeri boş bırakılamaz. Lütfen geçerli bir \"POP3 Sunucu SSL Portu\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if((document.SistemAyarlariFormu.SiteAnaEMailAdresiPOP3SunucusuTLSPortu.value=="") || (document.SistemAyarlariFormu.SiteAnaEMailAdresiPOP3SunucusuTLSPortu.value==0)){
			document.getElementById("ModalMetinAlani").innerHTML		=	"Site ayarları formu dahilinde bulunan, \"Ana E-Mail Ayarları\" başlığı içerisindeki \"POP3 Sunucu TLS Portu\" değeri boş bırakılamaz. Lütfen geçerli bir \"POP3 Sunucu TLS Portu\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		var SiteAnaEMailAdresiSMTPSunucuBaglantiTuruElemani		=	document.getElementsByName("SiteAnaEMailAdresiSMTPSunucuBaglantiTuru");
		if((SiteAnaEMailAdresiSMTPSunucuBaglantiTuruElemani[0].checked==false) && (SiteAnaEMailAdresiSMTPSunucuBaglantiTuruElemani[1].checked==false)){
			document.getElementById("ModalMetinAlani").innerHTML		=	"Site ayarları formu dahilinde bulunan, \"Ana E-Mail Ayarları\" başlığı içerisindeki \"SMTP Sunucu Bağlantı Türü\" değeri boş bırakılamaz. Lütfen geçerli bir \"SMTP Sunucu Bağlantı Türü\" değeri seçiniz.";
			ModalAc();
			return;
		}
		
		if(document.SistemAyarlariFormu.SiteAnaEMailAdresiSMTPSunucuAdresi.value==""){
			document.getElementById("ModalMetinAlani").innerHTML		=	"Site ayarları formu dahilinde bulunan, \"Ana E-Mail Ayarları\" başlığı içerisindeki \"SMTP Sunucu Adresi\" değeri boş bırakılamaz. Lütfen geçerli bir \"SMTP Sunucu Adresi\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if(document.SistemAyarlariFormu.SiteAnaEMailAdresiSMTPSunucuAdresi.value!=""){
			var SiteAnaEMailAdresiSMTPSunucuAdresiDegeri	=	document.getElementById("SiteAnaEMailAdresiSMTPSunucuAdresi").value;
			var SiteAnaEMailAdresiSMTPSunucuAdresiKontrol	=	LinkKontrolEt(SiteAnaEMailAdresiSMTPSunucuAdresiDegeri);
				if(SiteAnaEMailAdresiSMTPSunucuAdresiKontrol==false){
					document.getElementById("ModalMetinAlani").innerHTML		=	"Site ayarları formu dahilinde bulunan, \"Ana E-Mail Ayarları\" başlığı içerisindeki \"SMTP Sunucu Adresi\" geçersizdir. Lütfen geçerli bir \"SMTP Sunucu Adresi\" değeri giriniz.";
					ModalAc();
					return;
				}
		}
		
		if((document.SistemAyarlariFormu.SiteAnaEMailAdresiSMTPSunucusuSSLPortu.value=="") || (document.SistemAyarlariFormu.SiteAnaEMailAdresiSMTPSunucusuSSLPortu.value==0)){
			document.getElementById("ModalMetinAlani").innerHTML		=	"Site ayarları formu dahilinde bulunan, \"Ana E-Mail Ayarları\" başlığı içerisindeki \"SMTP Sunucu SSL Portu\" değeri boş bırakılamaz. Lütfen geçerli bir \"SMTP Sunucu SSL Portu\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if((document.SistemAyarlariFormu.SiteAnaEMailAdresiSMTPSunucusuTLSPortu.value=="") || (document.SistemAyarlariFormu.SiteAnaEMailAdresiSMTPSunucusuTLSPortu.value==0)){
			document.getElementById("ModalMetinAlani").innerHTML		=	"Site ayarları formu dahilinde bulunan, \"Ana E-Mail Ayarları\" başlığı içerisindeki \"SMTP Sunucu TLS Portu\" değeri boş bırakılamaz. Lütfen geçerli bir \"SMTP Sunucu TLS Portu\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if((document.SistemAyarlariFormu.IslemBasinaGonderilecekMailSayisi.value=="") || (document.SistemAyarlariFormu.IslemBasinaGonderilecekMailSayisi.value==0)){
			document.getElementById("ModalMetinAlani").innerHTML		=	"Site ayarları formu dahilinde bulunan, \"Listeleme ve Limit Ayarları\" başlığı içerisindeki \"İşlem Başına Gönderilecek Mail Sayısı\" değeri boş bırakılamaz. Lütfen geçerli bir \"İşlem Başına Gönderilecek Mail Sayısı\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if((document.SistemAyarlariFormu.KisilerSayfasiIceAktarimKayitSayisiLimiti.value=="") || (document.SistemAyarlariFormu.KisilerSayfasiIceAktarimKayitSayisiLimiti.value==0)){
			document.getElementById("ModalMetinAlani").innerHTML		=	"Site ayarları formu dahilinde bulunan, \"Listeleme ve Limit Ayarları\" başlığı içerisindeki \"İçe Aktarım Dosyası Kayıt Sayısı\" değeri boş bırakılamaz. Lütfen geçerli bir \"İçe Aktarım Dosyası Kayıt Sayısı\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if((document.SistemAyarlariFormu.KisilerSayfasiDisaAktarimKayitSayisiLimiti.value=="") || (document.SistemAyarlariFormu.KisilerSayfasiDisaAktarimKayitSayisiLimiti.value==0)){
			document.getElementById("ModalMetinAlani").innerHTML		=	"Site ayarları formu dahilinde bulunan, \"Listeleme ve Limit Ayarları\" başlığı içerisindeki \"Dışa Aktarım Dosyası Kayıt Sayısı\" değeri boş bırakılamaz. Lütfen geçerli bir \"Dışa Aktarım Dosyası Kayıt Sayısı\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if((document.SistemAyarlariFormu.PanoSayfasiListelemeLimiti.value=="") || (document.SistemAyarlariFormu.PanoSayfasiListelemeLimiti.value==0)){
			document.getElementById("ModalMetinAlani").innerHTML		=	"Site ayarları formu dahilinde bulunan, \"Listeleme ve Limit Ayarları\" başlığı içerisindeki \"Pano Sayfası Kayıt Sayısı\" değeri boş bırakılamaz. Lütfen geçerli bir \"Pano Sayfası Kayıt Sayısı\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if((document.SistemAyarlariFormu.KisilerSayfasiListelemeLimiti.value=="") || (document.SistemAyarlariFormu.KisilerSayfasiListelemeLimiti.value==0)){
			document.getElementById("ModalMetinAlani").innerHTML		=	"Site ayarları formu dahilinde bulunan, \"Listeleme ve Limit Ayarları\" başlığı içerisindeki \"Kişiler Sayfası Kayıt Sayısı\" değeri boş bırakılamaz. Lütfen geçerli bir \"Kişiler Sayfası Kayıt Sayısı\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if((document.SistemAyarlariFormu.KisiBildirimleriSayfasiListelemeLimiti.value=="") || (document.SistemAyarlariFormu.KisiBildirimleriSayfasiListelemeLimiti.value==0)){
			document.getElementById("ModalMetinAlani").innerHTML		=	"Site ayarları formu dahilinde bulunan, \"Listeleme ve Limit Ayarları\" başlığı içerisindeki \"Kişi Bildirimleri Sayfası Kayıt Sayısı\" değeri boş bırakılamaz. Lütfen geçerli bir \"Kişi Bildirimleri Sayfası Kayıt Sayısı\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if((document.SistemAyarlariFormu.KampanyalarSayfasiListelemeLimiti.value=="") || (document.SistemAyarlariFormu.KampanyalarSayfasiListelemeLimiti.value==0)){
			document.getElementById("ModalMetinAlani").innerHTML		=	"Site ayarları formu dahilinde bulunan, \"Listeleme ve Limit Ayarları\" başlığı içerisindeki \"Kampanyalar Sayfası Kayıt Sayısı\" değeri boş bırakılamaz. Lütfen geçerli bir \"Kampanyalar Sayfası Kayıt Sayısı\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if((document.SistemAyarlariFormu.TemalarSayfasiListelemeLimiti.value=="") || (document.SistemAyarlariFormu.TemalarSayfasiListelemeLimiti.value==0)){
			document.getElementById("ModalMetinAlani").innerHTML		=	"Site ayarları formu dahilinde bulunan, \"Listeleme ve Limit Ayarları\" başlığı içerisindeki \"Temalar Sayfası Kayıt Sayısı\" değeri boş bırakılamaz. Lütfen geçerli bir \"Temalar Sayfası Kayıt Sayısı\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if((document.SistemAyarlariFormu.EMailHesaplariAyarlariSayfasiListelemeLimiti.value=="") || (document.SistemAyarlariFormu.EMailHesaplariAyarlariSayfasiListelemeLimiti.value==0)){
			document.getElementById("ModalMetinAlani").innerHTML		=	"Site ayarları formu dahilinde bulunan, \"Listeleme ve Limit Ayarları\" başlığı içerisindeki \"E-Mail Hesap Ayarları Sayfası Kayıt Sayısı\" değeri boş bırakılamaz. Lütfen geçerli bir \"E-Mail Hesap Ayarları Sayfası Kayıt Sayısı\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if((document.SistemAyarlariFormu.SosyalAglarSayfasiListelemeLimiti.value=="") || (document.SistemAyarlariFormu.SosyalAglarSayfasiListelemeLimiti.value==0)){
			document.getElementById("ModalMetinAlani").innerHTML		=	"Site ayarları formu dahilinde bulunan, \"Listeleme ve Limit Ayarları\" başlığı içerisindeki \"Sosyal Ağ Ayarları Sayfası Kayıt Sayısı\" değeri boş bırakılamaz. Lütfen geçerli bir \"Sosyal Ağ Ayarları Sayfası Kayıt Sayısı\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if((document.SistemAyarlariFormu.UlkelerSayfasiListelemeLimiti.value=="") || (document.SistemAyarlariFormu.UlkelerSayfasiListelemeLimiti.value==0)){
			document.getElementById("ModalMetinAlani").innerHTML		=	"Site ayarları formu dahilinde bulunan, \"Listeleme ve Limit Ayarları\" başlığı içerisindeki \"Ülkeler Sayfası Kayıt Sayısı\" değeri boş bırakılamaz. Lütfen geçerli bir \"Ülkeler Sayfası Kayıt Sayısı\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if((document.SistemAyarlariFormu.SehirlerSayfasiListelemeLimiti.value=="") || (document.SistemAyarlariFormu.SehirlerSayfasiListelemeLimiti.value==0)){
			document.getElementById("ModalMetinAlani").innerHTML		=	"Site ayarları formu dahilinde bulunan, \"Listeleme ve Limit Ayarları\" başlığı içerisindeki \"Şehirler Sayfası Kayıt Sayısı\" değeri boş bırakılamaz. Lütfen geçerli bir \"Şehirler Sayfası Kayıt Sayısı\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if((document.SistemAyarlariFormu.YoneticilerSayfasiListelemeLimiti.value=="") || (document.SistemAyarlariFormu.YoneticilerSayfasiListelemeLimiti.value==0)){
			document.getElementById("ModalMetinAlani").innerHTML		=	"Site ayarları formu dahilinde bulunan, \"Listeleme ve Limit Ayarları\" başlığı içerisindeki \"Yöneticiler Sayfası Kayıt Sayısı\" değeri boş bırakılamaz. Lütfen geçerli bir \"Yöneticiler Sayfası Kayıt Sayısı\" değeri giriniz.";
			ModalAc();
			return;
		}

		document.SistemAyarlariFormu.submit();
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
	<form id="SistemAyarlariFormu" name="SistemAyarlariFormu" action="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=8" method="POST" enctype="multipart/form-data">
		<div class="SayfaIciBaslikAlanlariKapsayicisi">
			Genel Ayarlar
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Site Adı (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="SiteAdi" name="SiteAdi" value="<?php echo $SiteAyarlariKaydiSiteAdi; ?>" class="FormAlaniIciTextInputlari" maxlength="100" tabindex="1">
			</div>
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Site Title (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="SiteTitle" name="SiteTitle" value="<?php echo $SiteAyarlariKaydiSiteTitle; ?>" class="FormAlaniIciTextInputlari" maxlength="100" tabindex="2">
			</div>
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Site Copyright Metni (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="SiteCopyrightMetni" name="SiteCopyrightMetni" value="<?php echo $SiteAyarlariKaydiSiteCopyrightMetni; ?>" class="FormAlaniIciTextInputlari" maxlength="255" tabindex="3">
			</div>
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Site Faviconu [16px * 16px]
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="FormAlaniIciUploadAlanlariIciDosyaAdiYazdirmaAlani"><img src="Resimler/IconDosyaYuklemeSiyah.png"><span id="SiteFaviconuDosyaAdiAlani" class="FormAlaniIciUploadAlanlariIciPathYazdirmaAlani"></span></div>
				<label class="FormAlaniIciUploadAlanlari">
					<input type="file" id="SiteFaviconu" name="SiteFaviconu" class="FormAlaniIciUploadInputlari" onChange="DosyaAdiYazdir('SiteFaviconu', 'SiteFaviconuDosyaAdiAlani', 'SiteFaviconuSecimIptalAlani')">
					<span class="FormAlaniIciUploadAlanlariIciGozAtAlani"><img src="Resimler/IconUploadSiyah.png"><span class="FormAlaniIciUploadAlanlariIciGozAtMetniAlani">Gözat</span></span>
				</label>
				<div id="SiteFaviconuSecimIptalAlani" class="FormAlaniIciUploadAlanlariIciIptalAlani" onClick="DosyaAdiSifirla('SiteFaviconu', 'SiteFaviconuDosyaAdiAlani', 'SiteFaviconuSecimIptalAlani')" style="display: none;">İptal</div>
			</div>
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Site Ana Logosu [196px * 54px]
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="FormAlaniIciUploadAlanlariIciDosyaAdiYazdirmaAlani"><img src="Resimler/IconDosyaYuklemeSiyah.png"><span id="SiteAnaLogosuDosyaAdiAlani" class="FormAlaniIciUploadAlanlariIciPathYazdirmaAlani"></span></div>
				<label class="FormAlaniIciUploadAlanlari">
					<input type="file" id="SiteAnaLogosu" name="SiteAnaLogosu" class="FormAlaniIciUploadInputlari" onChange="DosyaAdiYazdir('SiteAnaLogosu', 'SiteAnaLogosuDosyaAdiAlani', 'SiteAnaLogosuSecimIptalAlani')">
					<span class="FormAlaniIciUploadAlanlariIciGozAtAlani"><img src="Resimler/IconUploadSiyah.png"><span class="FormAlaniIciUploadAlanlariIciGozAtMetniAlani">Gözat</span></span>
				</label>
				<div id="SiteAnaLogosuSecimIptalAlani" class="FormAlaniIciUploadAlanlariIciIptalAlani" onClick="DosyaAdiSifirla('SiteAnaLogosu', 'SiteAnaLogosuDosyaAdiAlani', 'SiteAnaLogosuSecimIptalAlani')" style="display: none;">İptal</div>
			</div>
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Giriş Formları Logosu [75px * 75px]
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="FormAlaniIciUploadAlanlariIciDosyaAdiYazdirmaAlani"><img src="Resimler/IconDosyaYuklemeSiyah.png"><span id="GirisFormuLogosuDosyaAdiAlani" class="FormAlaniIciUploadAlanlariIciPathYazdirmaAlani"></span></div>
				<label class="FormAlaniIciUploadAlanlari">
					<input type="file" id="GirisFormuLogosu" name="GirisFormuLogosu" class="FormAlaniIciUploadInputlari" onChange="DosyaAdiYazdir('GirisFormuLogosu', 'GirisFormuLogosuDosyaAdiAlani', 'GirisFormuLogosuSecimIptalAlani')">
					<span class="FormAlaniIciUploadAlanlariIciGozAtAlani"><img src="Resimler/IconUploadSiyah.png"><span class="FormAlaniIciUploadAlanlariIciGozAtMetniAlani">Gözat</span></span>
				</label>
				<div id="GirisFormuLogosuSecimIptalAlani" class="FormAlaniIciUploadAlanlariIciIptalAlani" onClick="DosyaAdiSifirla('GirisFormuLogosu', 'GirisFormuLogosuDosyaAdiAlani', 'GirisFormuLogosuSecimIptalAlani')" style="display: none;">İptal</div>
			</div>
		</div>

		<div class="SayfaIciSatirBosluguAlanlariKapsayicisi"></div>

		<div class="SayfaIciBaslikAlanlariKapsayicisi">
			Ana E-Mail Ayarları
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				E-Mail Adresi (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="SiteAnaEMailAdresi" name="SiteAnaEMailAdresi" value="<?php echo $SiteAyarlariKaydiSiteAnaEMailAdresi; ?>" onKeyUp="EMailAdresiAlanlariIcinFiltrele('SiteAnaEMailAdresi')" class="FormAlaniIciTextInputlari" maxlength="100" tabindex="4">
			</div>
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				E-Mail Adresi Şifresi (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="SiteAnaEMailAdresiSifresi" name="SiteAnaEMailAdresiSifresi" value="<?php echo $SiteAyarlariKaydiSiteAnaEMailAdresiSifresi; ?>" class="FormAlaniIciTextInputlari" maxlength="50" tabindex="5">
			</div>
		</div>

		<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
			<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
				POP3 Sunucu Bağlantı Türü (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSerbestSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="FormAlanlariIciTumRadioButonAlanlariKapsayicisi">
					<span class="FormAlanlariIciRadioButonAlanlariKapsayicisi">
						<label class="FormAlanlariIciRadioButonAlani">
							<input type="radio" id="SiteAnaEMailAdresiPOP3SunucuBaglantiTuruSecenekBir" name="SiteAnaEMailAdresiPOP3SunucuBaglantiTuru" value="SSL" class="FormAlanlariIciRadioInputlari" <?php if($SiteAyarlariKaydiSiteAnaEMailAdresiPOP3SunucuBaglantiTuru=="SSL"){ ?>checked="checked"<?php } ?>>
							<span class="FormAlanlariIciRadioButonAlanlariIcinBicimlendirmeAlani"></span> <span class="FormAlanlariIciRadioButonAlanlariIcinMetinAlani">SSL</span>
						</label>
					</span>
					<span class="FormAlanlariIciRadioButonAlanlariKapsayicisi">
						<label class="FormAlanlariIciRadioButonAlani">
							<input type="radio" id="SiteAnaEMailAdresiPOP3SunucuBaglantiTuruSecenekIki" name="SiteAnaEMailAdresiPOP3SunucuBaglantiTuru" value="TLS" class="FormAlanlariIciRadioInputlari" <?php if($SiteAyarlariKaydiSiteAnaEMailAdresiPOP3SunucuBaglantiTuru=="TLS"){ ?>checked="checked"<?php } ?>>
							<span class="FormAlanlariIciRadioButonAlanlariIcinBicimlendirmeAlani"></span> <span class="FormAlanlariIciRadioButonAlanlariIcinMetinAlani">TLS</span>
						</label>
					</span>
				</div>
			</div>
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				POP3 Sunucu Adresi (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="SiteAnaEMailAdresiPOP3SunucuAdresi" name="SiteAnaEMailAdresiPOP3SunucuAdresi" onKeyUp="LinkAlanlariIcinFiltrele('SiteAnaEMailAdresiPOP3SunucuAdresi')" value="<?php echo $SiteAyarlariKaydiSiteAnaEMailAdresiPOP3SunucuAdresi; ?>" class="FormAlaniIciTextInputlari" maxlength="100" tabindex="6">
			</div>
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				POP3 Sunucu SSL Portu (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="YuzPixselSinirliAlanKapsayicisi"><input type="number" id="SiteAnaEMailAdresiPOP3SunucusuSSLPortu" name="SiteAnaEMailAdresiPOP3SunucusuSSLPortu" value="<?php echo $SiteAyarlariKaydiSiteAnaEMailAdresiPOP3SunucusuSSLPortu; ?>" class="FormAlaniIciTextInputlari" maxlength="3" min="0" max="999" tabindex="7"></div>
			</div>
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				POP3 Sunucu TLS Portu (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="YuzPixselSinirliAlanKapsayicisi"><input type="number" id="SiteAnaEMailAdresiPOP3SunucusuTLSPortu" name="SiteAnaEMailAdresiPOP3SunucusuTLSPortu" value="<?php echo $SiteAyarlariKaydiSiteAnaEMailAdresiPOP3SunucusuTLSPortu; ?>" class="FormAlaniIciTextInputlari" maxlength="3" min="0" max="999" tabindex="8"></div>
			</div>
		</div>

		<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
			<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
				SMTP Sunucu Bağlantı Türü (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSerbestSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="FormAlanlariIciTumRadioButonAlanlariKapsayicisi">
					<span class="FormAlanlariIciRadioButonAlanlariKapsayicisi">
						<label class="FormAlanlariIciRadioButonAlani">
							<input type="radio" id="SiteAnaEMailAdresiSMTPSunucuBaglantiTuruSecenekBir" name="SiteAnaEMailAdresiSMTPSunucuBaglantiTuru" value="SSL" class="FormAlanlariIciRadioInputlari" <?php if($SiteAyarlariKaydiSiteAnaEMailAdresiSMTPSunucuBaglantiTuru=="SSL"){ ?>checked="checked"<?php } ?>>
							<span class="FormAlanlariIciRadioButonAlanlariIcinBicimlendirmeAlani"></span> <span class="FormAlanlariIciRadioButonAlanlariIcinMetinAlani">SSL</span>
						</label>
					</span>
					<span class="FormAlanlariIciRadioButonAlanlariKapsayicisi">
						<label class="FormAlanlariIciRadioButonAlani">
							<input type="radio" id="SiteAnaEMailAdresiSMTPSunucuBaglantiTuruSecenekIki" name="SiteAnaEMailAdresiSMTPSunucuBaglantiTuru" value="TLS" class="FormAlanlariIciRadioInputlari" <?php if($SiteAyarlariKaydiSiteAnaEMailAdresiSMTPSunucuBaglantiTuru=="TLS"){ ?>checked="checked"<?php } ?>>
							<span class="FormAlanlariIciRadioButonAlanlariIcinBicimlendirmeAlani"></span> <span class="FormAlanlariIciRadioButonAlanlariIcinMetinAlani">TLS</span>
						</label>
					</span>
				</div>
			</div>
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				SMTP Sunucu Adresi (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="SiteAnaEMailAdresiSMTPSunucuAdresi" name="SiteAnaEMailAdresiSMTPSunucuAdresi" onKeyUp="LinkAlanlariIcinFiltrele('SiteAnaEMailAdresiSMTPSunucuAdresi')" value="<?php echo $SiteAyarlariKaydiSiteAnaEMailAdresiSMTPSunucuAdresi; ?>" class="FormAlaniIciTextInputlari" maxlength="100" tabindex="9">
			</div>
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				SMTP Sunucu SSL Portu (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="YuzPixselSinirliAlanKapsayicisi"><input type="number" id="SiteAnaEMailAdresiSMTPSunucusuSSLPortu" name="SiteAnaEMailAdresiSMTPSunucusuSSLPortu" value="<?php echo $SiteAyarlariKaydiSiteAnaEMailAdresiSMTPSunucusuSSLPortu; ?>" class="FormAlaniIciTextInputlari" maxlength="3" min="0" max="999" tabindex="10"></div>
			</div>
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				SMTP Sunucu TLS Portu (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="YuzPixselSinirliAlanKapsayicisi"><input type="number" id="SiteAnaEMailAdresiSMTPSunucusuTLSPortu" name="SiteAnaEMailAdresiSMTPSunucusuTLSPortu" value="<?php echo $SiteAyarlariKaydiSiteAnaEMailAdresiSMTPSunucusuTLSPortu; ?>" class="FormAlaniIciTextInputlari" maxlength="3" min="0" max="999" tabindex="11"></div>
			</div>
		</div>
		
		<div class="SayfaIciSatirBosluguAlanlariKapsayicisi"></div>

		<div class="SayfaIciBaslikAlanlariKapsayicisi">
			Listeleme ve Limit Ayarları
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				İşlem Başına Gönderilecek Mail Sayısı (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="YuzPixselSinirliAlanKapsayicisi"><input type="number" id="IslemBasinaGonderilecekMailSayisi" name="IslemBasinaGonderilecekMailSayisi" value="<?php echo $SiteAyarlariKaydiIslemBasinaGonderilecekMailSayisi; ?>" class="FormAlaniIciTextInputlari" maxlength="3" min="0" max="999" tabindex="12"></div>
			</div>
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				İçe Aktarım Dosyası Kayıt Sayısı (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="YuzPixselSinirliAlanKapsayicisi"><input type="number" id="KisilerSayfasiIceAktarimKayitSayisiLimiti" name="KisilerSayfasiIceAktarimKayitSayisiLimiti" value="<?php echo $SiteAyarlariKaydiKisilerSayfasiIceAktarimKayitSayisiLimiti; ?>" class="FormAlaniIciTextInputlari" maxlength="7" min="0" max="1000000" tabindex="13"></div>
			</div>
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Dışa Aktarım Dosyası Kayıt Sayısı (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="YuzPixselSinirliAlanKapsayicisi"><input type="number" id="KisilerSayfasiDisaAktarimKayitSayisiLimiti" name="KisilerSayfasiDisaAktarimKayitSayisiLimiti" value="<?php echo $SiteAyarlariKaydiKisilerSayfasiDisaAktarimKayitSayisiLimiti; ?>" class="FormAlaniIciTextInputlari" maxlength="7" min="0" max="1000000" tabindex="14"></div>
			</div>
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Pano Sayfası Kayıt Sayısı (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="YuzPixselSinirliAlanKapsayicisi"><input type="number" id="PanoSayfasiListelemeLimiti" name="PanoSayfasiListelemeLimiti" value="<?php echo $SiteAyarlariKaydiPanoSayfasiListelemeLimiti; ?>" class="FormAlaniIciTextInputlari" maxlength="3" min="0" max="999" tabindex="15"></div>
			</div>
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Kişiler Sayfası Kayıt Sayısı (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="YuzPixselSinirliAlanKapsayicisi"><input type="number" id="KisilerSayfasiListelemeLimiti" name="KisilerSayfasiListelemeLimiti" value="<?php echo $SiteAyarlariKaydiKisilerSayfasiListelemeLimiti; ?>" class="FormAlaniIciTextInputlari" maxlength="3" min="0" max="999" tabindex="16"></div>
			</div>
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Kişi Bildirimleri Sayfası Kayıt Sayısı (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="YuzPixselSinirliAlanKapsayicisi"><input type="number" id="KisiBildirimleriSayfasiListelemeLimiti" name="KisiBildirimleriSayfasiListelemeLimiti" value="<?php echo $SiteAyarlariKaydiKisiBildirimleriSayfasiListelemeLimiti; ?>" class="FormAlaniIciTextInputlari" maxlength="3" min="0" max="999" tabindex="17"></div>
			</div>
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Kampanyalar Sayfası Kayıt Sayısı (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="YuzPixselSinirliAlanKapsayicisi"><input type="number" id="KampanyalarSayfasiListelemeLimiti" name="KampanyalarSayfasiListelemeLimiti" value="<?php echo $SiteAyarlariKaydiKampanyalarSayfasiListelemeLimiti; ?>" class="FormAlaniIciTextInputlari" maxlength="3" min="0" max="999" tabindex="18"></div>
			</div>
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Temalar Sayfası Kayıt Sayısı (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="YuzPixselSinirliAlanKapsayicisi"><input type="number" id="TemalarSayfasiListelemeLimiti" name="TemalarSayfasiListelemeLimiti" value="<?php echo $SiteAyarlariKaydiTemalarSayfasiListelemeLimiti; ?>" class="FormAlaniIciTextInputlari" maxlength="3" min="0" max="999" tabindex="19"></div>
			</div>
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				E-Mail Hesap Ayarları Sayfası Kayıt Sayısı (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="YuzPixselSinirliAlanKapsayicisi"><input type="number" id="EMailHesaplariAyarlariSayfasiListelemeLimiti" name="EMailHesaplariAyarlariSayfasiListelemeLimiti" value="<?php echo $SiteAyarlariKaydiEMailHesaplariAyarlariSayfasiListelemeLimiti; ?>" class="FormAlaniIciTextInputlari" maxlength="3" min="0" max="999" tabindex="20"></div>
			</div>
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Sosyal Ağ Ayarları Sayfası Kayıt Sayısı (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="YuzPixselSinirliAlanKapsayicisi"><input type="number" id="SosyalAglarSayfasiListelemeLimiti" name="SosyalAglarSayfasiListelemeLimiti" value="<?php echo $SiteAyarlariKaydiSosyalAglarSayfasiListelemeLimiti; ?>" class="FormAlaniIciTextInputlari" maxlength="3" min="0" max="999" tabindex="21"></div>
			</div>
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Ülkeler Sayfası Kayıt Sayısı (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="YuzPixselSinirliAlanKapsayicisi"><input type="number" id="UlkelerSayfasiListelemeLimiti" name="UlkelerSayfasiListelemeLimiti" value="<?php echo $SiteAyarlariKaydiUlkelerSayfasiListelemeLimiti; ?>" class="FormAlaniIciTextInputlari" maxlength="3" min="0" max="999" tabindex="22"></div>
			</div>
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Şehirler Sayfası Kayıt Sayısı (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="YuzPixselSinirliAlanKapsayicisi"><input type="number" id="SehirlerSayfasiListelemeLimiti" name="SehirlerSayfasiListelemeLimiti" value="<?php echo $SiteAyarlariKaydiSehirlerSayfasiListelemeLimiti; ?>" class="FormAlaniIciTextInputlari" maxlength="3" min="0" max="999" tabindex="23"></div>
			</div>
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Yöneticiler Sayfası Kayıt Sayısı (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="YuzPixselSinirliAlanKapsayicisi"><input type="number" id="YoneticilerSayfasiListelemeLimiti" name="YoneticilerSayfasiListelemeLimiti" value="<?php echo $SiteAyarlariKaydiYoneticilerSayfasiListelemeLimiti; ?>" class="FormAlaniIciTextInputlari" maxlength="3" min="0" max="999" tabindex="24"></div>
			</div>
		</div>

		<div class="SayfaIciButonlarIcinSatirAlanlariKapsayicisi">
			<input type="button" value="Güncelle" class="FormAlaniIciGuncelleButonlari" onClick="SistemAyarlariFormKontrol()" tabindex="25">
		</div>
	</form>
</div>
<?php }else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>