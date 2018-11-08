<? if(isset($_SESSION["Yonetici"])){ ?>
<script type="text/javascript" language="javascript">
	function KayitEklemeFormKontrol(){
		if(document.KayitEklemeFormu.YoneticiResmi.value==""){
			document.getElementById("ModalMetinAlani").innerHTML		=	"Kayıt formu dahilinde bulunan, \"Yönetici Resmi\" değeri boş bırakılamaz. Lütfen geçerli bir \"Yönetici Resmi\" değeri seçiniz.";
			ModalAc();
			return;
		}
		
		if(document.KayitEklemeFormu.YoneticiResmi.value!=""){
			if((document.KayitEklemeFormu.YoneticiResmi.value.indexOf(".jpg")==-1) && (document.KayitEklemeFormu.YoneticiResmi.value.indexOf(".JPG")==-1) && (document.KayitEklemeFormu.YoneticiResmi.value.indexOf(".jpeg")==-1) && (document.KayitEklemeFormu.YoneticiResmi.value.indexOf(".JPEG")==-1) && (document.KayitEklemeFormu.YoneticiResmi.value.indexOf(".png")==-1) && (document.KayitEklemeFormu.YoneticiResmi.value.indexOf(".PNG")==-1) && (document.KayitEklemeFormu.YoneticiResmi.value.indexOf(".gif")==-1) && (document.KayitEklemeFormu.YoneticiResmi.value.indexOf(".GIF")==-1) && (document.KayitEklemeFormu.YoneticiResmi.value.indexOf(".bmp")==-1) && (document.KayitEklemeFormu.YoneticiResmi.value.indexOf(".BMP")==-1)){
				document.getElementById("ModalMetinAlani").innerHTML		=	"Kayıt formu dahilinde bulunan, \"Yönetici Resmi\" alanı için seçilen dosya formatı uygun değildir. Lütfen geçerli bir dosya seçiniz. Sistem tarafından desteklenen \"Yönetici Resmi\" dosya formatları .jpg, .jpeg, .png, gif ve bmp'dir.";
				ModalAc();
				return;
			}
		}
		
		if(document.KayitEklemeFormu.YoneticiKullaniciAdi.value==""){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"Yönetici Kullanıcı Adı\" değeri boş bırakılamaz. Lütfen geçerli bir \"Yönetici Kullanıcı Adı\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if((document.KayitEklemeFormu.YoneticiKullaniciAdi.value!="") && (document.KayitEklemeFormu.YoneticiKullaniciAdi.value.length<4)){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"Yönetici Kullanıcı Adı\" en az 4 (dört) karakter içermelidir. Lütfen geçerli bir \"Yönetici Kullanıcı Adı\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if(document.KayitEklemeFormu.YoneticiKullaniciSifresi.value==""){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"Yönetici Kullanıcı Şifresi\" değeri boş bırakılamaz. Lütfen geçerli bir \"Yönetici Kullanıcı Şifresi\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if((document.KayitEklemeFormu.YoneticiKullaniciSifresi.value!="") && (document.KayitEklemeFormu.YoneticiKullaniciSifresi.value.length<4)){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"Yönetici Kullanıcı Şifresi\" en az 4 (dört) karakter içermelidir. Lütfen geçerli bir \"Yönetici Kullanıcı Şifresi\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if(document.KayitEklemeFormu.YoneticiAdi.value==""){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"Yönetici Adı\" değeri boş bırakılamaz. Lütfen geçerli bir \"Yönetici Adı\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if(document.KayitEklemeFormu.YoneticiSoyadi.value==""){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"Yönetici Soyadı\" değeri boş bırakılamaz. Lütfen geçerli bir \"Yönetici Soyadı\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if(document.KayitEklemeFormu.YoneticiEMailAdresi.value==""){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"Yönetici E-Mail Adresi\" değeri boş bırakılamaz. Lütfen geçerli bir \"Yönetici E-Mail Adresi\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if(document.KayitEklemeFormu.YoneticiEMailAdresi.value!=""){
			var YoneticiEMailAdresiDegeri	=	document.getElementById("YoneticiEMailAdresi").value;
			var YoneticiEMailAdresiKontrol	=	EMailKontrolEt(YoneticiEMailAdresiDegeri);
				if(YoneticiEMailAdresiKontrol==false){
					document.getElementById("ModalMetinAlani").innerHTML	=	"Kayıt formu dahilinde bulunan, \"Yönetici E-Mail Adresi\" geçersizdir. Lütfen geçerli bir \"Yönetici E-Mail Adresi\" değeri giriniz.";
					ModalAc();
					return;
				}
		}
		
		if((document.KayitEklemeFormu.YoneticiTelefonu.value!="") && (document.KayitEklemeFormu.YoneticiTelefonu.value.length<10)){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"Yönetici Telefonu\" geçersizdir. Lütfen geçerli bir \"Yönetici Telefonu\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if((document.KayitEklemeFormu.YoneticiCepTelefonu.value=="") || (document.KayitEklemeFormu.YoneticiCepTelefonu.value.length<10)){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"Yönetici Cep Telefonu\" değeri boş bırakılamaz. Lütfen geçerli bir \"Yönetici Cep Telefonu\" değeri giriniz.";
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
	<form id="KayitEklemeFormu" name="KayitEklemeFormu" action="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=65" method="POST" enctype="multipart/form-data">
		<div class="SayfaIciBaslikAlanlariKapsayicisi">
			<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=57" target="_top">Yöneticiler</a> > Yeni Kayıt Ekle
		</div>
		
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Yönetici Resmi (<span class="KirmiziYazi">*</span>) [35px * 35px]
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="FormAlaniIciUploadAlanlariIciDosyaAdiYazdirmaAlani"><img src="Resimler/IconDosyaYuklemeSiyah.png"><span id="YoneticiResmiDosyaAdiAlani" class="FormAlaniIciUploadAlanlariIciPathYazdirmaAlani"></span></div>
				<label class="FormAlaniIciUploadAlanlari">
					<input type="file" id="YoneticiResmi" name="YoneticiResmi" class="FormAlaniIciUploadInputlari" onChange="DosyaAdiYazdir('YoneticiResmi', 'YoneticiResmiDosyaAdiAlani', 'YoneticiResmiSecimIptalAlani')">
					<span class="FormAlaniIciUploadAlanlariIciGozAtAlani"><img src="Resimler/IconUploadSiyah.png"><span class="FormAlaniIciUploadAlanlariIciGozAtMetniAlani">Gözat</span></span>
				</label>
				<div id="YoneticiResmiSecimIptalAlani" class="FormAlaniIciUploadAlanlariIciIptalAlani" onClick="DosyaAdiSifirla('YoneticiResmi', 'YoneticiResmiDosyaAdiAlani', 'YoneticiResmiSecimIptalAlani')" style="display: none;">İptal</div>
			</div>
		</div>
		
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Yönetici Kullanıcı Adı (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="YoneticiKullaniciAdi" name="YoneticiKullaniciAdi" onKeyUp="KullaniciAdiAlanlariIcinFiltrele('YoneticiKullaniciAdi')" class="FormAlaniIciTextInputlari" maxlength="50" tabindex="1">
			</div>
		</div>
		
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Yönetici Kullanıcı Şifresi (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="YoneticiKullaniciSifresi" name="YoneticiKullaniciSifresi" onKeyUp="KullaniciSifresiAlanlariIcinFiltrele('YoneticiKullaniciSifresi')" class="FormAlaniIciTextInputlari" maxlength="50" tabindex="2">
			</div>
		</div>
		
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Yönetici Adı (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="YoneticiAdi" name="YoneticiAdi" class="FormAlaniIciTextInputlari" maxlength="50" tabindex="3">
			</div>
		</div>
		
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Yönetici Soyadı (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="YoneticiSoyadi" name="YoneticiSoyadi" class="FormAlaniIciTextInputlari" maxlength="50" tabindex="4">
			</div>
		</div>
		
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Yönetici E-Mail Adresi (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="YoneticiEMailAdresi" name="YoneticiEMailAdresi" onKeyUp="EMailAdresiAlanlariIcinFiltrele('YoneticiEMailAdresi')" class="FormAlaniIciTextInputlari" maxlength="100" tabindex="5">
			</div>
		</div>
		
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Yönetici Telefonu
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="IkiYuzPixselSinirliAlanKapsayicisi"><input type="text" id="YoneticiTelefonu" name="YoneticiTelefonu" onKeyUp="TelefonAlanlariIcinFiltrele('YoneticiTelefonu')" class="FormAlaniIciTextInputlari" maxlength="11" tabindex="6"></div>
			</div>
		</div>
		
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Yönetici Cep Telefonu (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="IkiYuzPixselSinirliAlanKapsayicisi"><input type="text" id="YoneticiCepTelefonu" name="YoneticiCepTelefonu" onKeyUp="TelefonAlanlariIcinFiltrele('YoneticiCepTelefonu')" class="FormAlaniIciTextInputlari" maxlength="11" tabindex="7"></div>
			</div>
		</div>
		
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Sıra Numarası (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="UcYuzPixselSinirliAlanKapsayicisi"><select id="SiraNumarasi" name="SiraNumarasi" class="FormAlaniIciSelectleri" tabindex="8">
					<?php
					$SonSiraNumarasiSorgusu					=	$VeritabaniBaglantisi->query("SELECT * FROM yoneticiler ORDER BY SiraNumarasi DESC LIMIT 1");
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
			<input type="button" value="Kaydet" class="FormAlaniIciKaydetButonlari" onClick="KayitEklemeFormKontrol()" tabindex="9">
		</div>
	</form>
</div>
<?php }else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>