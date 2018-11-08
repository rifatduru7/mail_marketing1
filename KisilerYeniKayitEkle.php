<? if(isset($_SESSION["Yonetici"])){ ?>
<script type="text/javascript" language="javascript">
	function UlkeyeGoreSiraNumarasiGetir(UlkeDegeri){
		var SehirElemaninaBaglan				=	document.getElementById("Sehri");
		var SehirElemaniSecenekUzunlugu			=	SehirElemaninaBaglan.length;
		var BaslangicDegeri						=	0;
		var BistisDegeri						=	SehirElemaniSecenekUzunlugu-1;
		
		for(BaslangicDegeri; BaslangicDegeri<=BistisDegeri; BaslangicDegeri++){
			document.getElementById("Sehri").options[0].remove();
		}
		
		var VeriTalepEt			=	new XMLHttpRequest();
		VeriTalepEt.onreadystatechange		=	function(){
			if(this.readyState==4 && this.status==200){
				document.getElementById("Sehri").innerHTML		=	this.responseText;
			}
		};
		VeriTalepEt.open("GET", "AnlikGunceller/KisilerSayfasiYeniKayitEkleUlkeyeGoreSehirListesi.php?UlkeIDsi=" + UlkeDegeri, true);
		VeriTalepEt.send();
	}
	
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
		
		if((document.KayitEklemeFormu.Telefonu.value!="") && (document.KayitEklemeFormu.Telefonu.value.length<10)){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"Telefonu\" değeri geçersizdir. Lütfen geçerli bir \"Telefonu\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if((document.KayitEklemeFormu.CepTelefonu.value!="") && (document.KayitEklemeFormu.CepTelefonu.value.length<10)){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"Cep Telefonu\" değeri geçersizdir. Lütfen geçerli bir \"Cep Telefonu\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		var VIPDurumuElemani		=	document.getElementsByName("VIPDurumu");
		if((VIPDurumuElemani[0].checked==false) && (VIPDurumuElemani[1].checked==false)){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"VIP Durumu\" değeri boş bırakılamaz. Lütfen geçerli bir \"VIP Durumu\" değeri seçiniz.";
			ModalAc();
			return;
		}
		
		if(document.KayitEklemeFormu.WebSitesiAdresi.value!=""){
			var WebSitesiAdresiDegeri	=	document.getElementById("WebSitesiAdresi").value;
			var WebSitesiAdresiKontrol	=	LinkOnEkiZorunluKontrolEt(WebSitesiAdresiDegeri);
				if(WebSitesiAdresiKontrol==false){
					document.getElementById("ModalMetinAlani").innerHTML	=	"Kayıt formu dahilinde bulunan, \"Web Sitesi Adresi\" geçersizdir. Lütfen geçerli bir \"Web Sitesi Adresi\" değeri giriniz.";
					ModalAc();
					return;
				}
		}
		
		if(document.KayitEklemeFormu.FacebookProfilSayfasiAdresi.value!=""){
			var FacebookProfilSayfasiAdresiDegeri	=	document.getElementById("FacebookProfilSayfasiAdresi").value;
			var FacebookProfilSayfasiAdresiKontrol	=	LinkOnEkiZorunluKontrolEt(FacebookProfilSayfasiAdresiDegeri);
				if(FacebookProfilSayfasiAdresiKontrol==false){
					document.getElementById("ModalMetinAlani").innerHTML	=	"Kayıt formu dahilinde bulunan, \"Facebook Profil Sayfası Adresi\" geçersizdir. Lütfen geçerli bir \"Facebook Profil Sayfası Adresi\" değeri giriniz.";
					ModalAc();
					return;
				}
		}
		
		if(document.KayitEklemeFormu.TwitterProfilSayfasiAdresi.value!=""){
			var TwitterProfilSayfasiAdresiDegeri	=	document.getElementById("TwitterProfilSayfasiAdresi").value;
			var TwitterProfilSayfasiAdresiKontrol	=	LinkOnEkiZorunluKontrolEt(TwitterProfilSayfasiAdresiDegeri);
				if(TwitterProfilSayfasiAdresiKontrol==false){
					document.getElementById("ModalMetinAlani").innerHTML	=	"Kayıt formu dahilinde bulunan, \"Twitter Profil Sayfası Adresi\" geçersizdir. Lütfen geçerli bir \"Twitter Profil Sayfası Adresi\" değeri giriniz.";
					ModalAc();
					return;
				}
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
	<form id="KayitEklemeFormu" name="KayitEklemeFormu" action="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=150" method="POST">
		<div class="SayfaIciBaslikAlanlariKapsayicisi">
			<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=144" target="_top">Kişiler</a> > Yeni Kayıt Ekle
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Adı
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="Adi" name="Adi" class="FormAlaniIciTextInputlari" maxlength="50" tabindex="1">
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Soyadı
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="Soyadi" name="Soyadi" class="FormAlaniIciTextInputlari" maxlength="50" tabindex="2">
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				E-Mail Adresi (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="EMailAdresi" name="EMailAdresi" onKeyUp="EMailAdresiAlanlariIcinFiltrele('EMailAdresi')" class="FormAlaniIciTextInputlari" maxlength="100" tabindex="3">
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Telefonu
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="IkiYuzPixselSinirliAlanKapsayicisi"><input type="text" id="Telefonu" name="Telefonu" onKeyUp="TelefonAlanlariIcinFiltrele('Telefonu')" class="FormAlaniIciTextInputlari" maxlength="11" tabindex="4"></div>
			</div>
		</div>
		
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Cep Telefonu
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="IkiYuzPixselSinirliAlanKapsayicisi"><input type="text" id="CepTelefonu" name="CepTelefonu" onKeyUp="TelefonAlanlariIcinFiltrele('CepTelefonu')" class="FormAlaniIciTextInputlari" maxlength="11" tabindex="5"></div>
			</div>
		</div>
	
		<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
			<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
				Cinsiyeti
			</div>
			<div class="SayfaIciSerbestSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="FormAlanlariIciTumRadioButonAlanlariKapsayicisi">
					<span class="FormAlanlariIciRadioButonAlanlariKapsayicisi">
						<label class="FormAlanlariIciRadioButonAlani">
							<input type="radio" id="CinsiyetiSecenekBir" name="Cinsiyeti" value="Erkek" class="FormAlanlariIciRadioInputlari">
							<span class="FormAlanlariIciRadioButonAlanlariIcinBicimlendirmeAlani"></span> <span class="FormAlanlariIciRadioButonAlanlariIcinMetinAlani">Erkek</span>
						</label>
					</span>
					<span class="FormAlanlariIciRadioButonAlanlariKapsayicisi">
						<label class="FormAlanlariIciRadioButonAlani">
							<input type="radio" id="CinsiyetiSecenekIki" name="Cinsiyeti" value="Kadın" class="FormAlanlariIciRadioInputlari">
							<span class="FormAlanlariIciRadioButonAlanlariIcinBicimlendirmeAlani"></span> <span class="FormAlanlariIciRadioButonAlanlariIcinMetinAlani">Kadın</span>
						</label>
					</span>
				</div>
			</div>
		</div>
	
		<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
			<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
				VIP Durumu (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSerbestSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="FormAlanlariIciTumRadioButonAlanlariKapsayicisi">
					<span class="FormAlanlariIciRadioButonAlanlariKapsayicisi">
						<label class="FormAlanlariIciRadioButonAlani">
							<input type="radio" id="VIPDurumuSecenekBir" name="VIPDurumu" value="1" class="FormAlanlariIciRadioInputlari">
							<span class="FormAlanlariIciRadioButonAlanlariIcinBicimlendirmeAlani"></span> <span class="FormAlanlariIciRadioButonAlanlariIcinMetinAlani">VIP</span>
						</label>
					</span>
					<span class="FormAlanlariIciRadioButonAlanlariKapsayicisi">
						<label class="FormAlanlariIciRadioButonAlani">
							<input type="radio" id="VIPDurumuSecenekIki" name="VIPDurumu" value="0" class="FormAlanlariIciRadioInputlari">
							<span class="FormAlanlariIciRadioButonAlanlariIcinBicimlendirmeAlani"></span> <span class="FormAlanlariIciRadioButonAlanlariIcinMetinAlani">Standart</span>
						</label>
					</span>
				</div>
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Ülkesi
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="UcYuzPixselSinirliAlanKapsayicisi"><select id="Ulkesi" name="Ulkesi" class="FormAlaniIciSelectleri" tabindex="6" onChange="UlkeyeGoreSiraNumarasiGetir(this.value)">
					<option value="" selected="selected"></option>
					<?php
					$Ulkeler				=	$VeritabaniBaglantisi->query("SELECT * FROM ulkeler ORDER BY SiraNumarasi ASC");
					$UlkelerKayitSayisi		=	$Ulkeler->num_rows;
						if($UlkelerKayitSayisi>0){
							while($UlkelerKayitlari=$Ulkeler->fetch_assoc()){
								$UlkelerKayitlariID			=	$UlkelerKayitlari["ID"];
								$UlkelerKayitlariUlkeAdi	=	$UlkelerKayitlari["UlkeAdi"];
					?>
								<option value="<?php echo $UlkelerKayitlariID; ?>"><?php echo DonusumleriGeriDondur($UlkelerKayitlariUlkeAdi); ?></option>	
					<?php
							}
						}
					?>
				</select></div>
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Şehri
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="UcYuzPixselSinirliAlanKapsayicisi"><select id="Sehri" name="Sehri" class="FormAlaniIciSelectleri" tabindex="7">
					<option value="" selected="selected"></option>
				</select></div>
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				İlçesi
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="Ilcesi" name="Ilcesi" class="FormAlaniIciTextInputlari" maxlength="100" tabindex="8">
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Posta Kodu
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="YuzPixselSinirliAlanKapsayicisi"><input type="number" id="PostaKodu" name="PostaKodu" class="FormAlaniIciTextInputlari" maxlength="5" min="0" max="99999" tabindex="9"></div>
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Adresi
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="Adresi" name="Adresi" class="FormAlaniIciTextInputlari" maxlength="255" tabindex="10">
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Web Sitesi Adresi
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="WebSitesiAdresi" name="WebSitesiAdresi" onKeyUp="LinkAlanlariIcinFiltrele('WebSitesiAdresi')" class="FormAlaniIciTextInputlari" maxlength="255" tabindex="11">
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Facebook Profil Sayfası Adresi
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="FacebookProfilSayfasiAdresi" name="FacebookProfilSayfasiAdresi" onKeyUp="LinkAlanlariIcinFiltrele('FacebookProfilSayfasiAdresi')" class="FormAlaniIciTextInputlari" maxlength="255" tabindex="12">
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Twitter Profil Sayfası Adresi
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="TwitterProfilSayfasiAdresi" name="TwitterProfilSayfasiAdresi" onKeyUp="LinkAlanlariIcinFiltrele('TwitterProfilSayfasiAdresi')" class="FormAlaniIciTextInputlari" maxlength="255" tabindex="13">
			</div>
		</div>
	
		<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
			<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
				Ek Açıklama
			</div>
			<div class="SayfaIciSerbestSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<textarea id="Aciklama" name="Aciklama" class="FormAlaniIciTextArealari" tabindex="14"></textarea>
			</div>
		</div>
		
		<div class="SayfaIciButonlarIcinSatirAlanlariKapsayicisi">
			<input type="button" value="Kaydet" class="FormAlaniIciKaydetButonlari" onClick="KayitEklemeFormKontrol()" tabindex="15">
		</div>
	</form>
</div>
<?php }else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>