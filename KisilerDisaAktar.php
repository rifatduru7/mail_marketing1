<? if(isset($_SESSION["Yonetici"])){ ?>
<script type="text/javascript" language="javascript">
	function UlkeyeGoreSehirGetir(UlkeDegeri){
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
		VeriTalepEt.open("GET", "AnlikGunceller/KisilerDisaAktarSayfasiUlkeyeGoreSehirListesi.php?UlkeIDsi=" + UlkeDegeri, true);
		VeriTalepEt.send();
	}
	
	function AktarimFormKontrol(){
		if(document.AktarimFormu.Baslik.value==""){
			document.getElementById("ModalMetinAlani").innerHTML		=	"Aktarım formu dahilinde bulunan, \"Başlık\" değeri boş bırakılamaz. Lütfen geçerli bir \"Başlık\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		document.AktarimFormu.submit();
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
	<form id="AktarimFormu" name="AktarimFormu" action="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=170" method="POST">
		<div class="SayfaIciBaslikAlanlariKapsayicisi">
			<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=144" target="_top">Kişiler</a> > Dışa Aktar
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				İşlem Başlığı (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="Baslik" name="Baslik" class="FormAlaniIciTextInputlari" onKeyUp="DosyaAlanlariIcinFiltrele('Baslik')" maxlength="100" tabindex="1">
			</div>
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Filtre İçin Ad
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="Adi" name="Adi" class="FormAlaniIciTextInputlari" maxlength="50" tabindex="2">
			</div>
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Filtre İçin Soyad
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="Soyadi" name="Soyadi" class="FormAlaniIciTextInputlari" maxlength="50" tabindex="3">
			</div>
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Filtre İçin E-Mail Adresi
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="EMailAdresi" name="EMailAdresi" onKeyUp="EMailAdresiAlanlariIcinFiltrele('EMailAdresi')" class="FormAlaniIciTextInputlari" maxlength="100" tabindex="4">
			</div>
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Filtre İçin Telefon
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="IkiYuzPixselSinirliAlanKapsayicisi"><input type="text" id="Telefonu" name="Telefonu" onKeyUp="TelefonAlanlariIcinFiltrele('Telefonu')" class="FormAlaniIciTextInputlari" maxlength="11" tabindex="5"></div>
			</div>
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Filtre İçin Cep Telefonu
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="IkiYuzPixselSinirliAlanKapsayicisi"><input type="text" id="CepTelefonu" name="CepTelefonu" onKeyUp="TelefonAlanlariIcinFiltrele('CepTelefonu')" class="FormAlaniIciTextInputlari" maxlength="11" tabindex="6"></div>
			</div>
		</div>

		<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
			<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
				Filtre İçin Cinsiyet
			</div>
			<div class="SayfaIciSerbestSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="FormAlanlariIciTumRadioButonAlanlariKapsayicisi">
				
					<span class="FormAlanlariIciRadioButonAlanlariKapsayicisi">
						<label class="FormAlanlariIciRadioButonAlani">
							<input type="radio" id="CinsiyetiSecenekBir" name="Cinsiyeti" value="Tümü" class="FormAlanlariIciRadioInputlari" checked="checked">
							<span class="FormAlanlariIciRadioButonAlanlariIcinBicimlendirmeAlani"></span> <span class="FormAlanlariIciRadioButonAlanlariIcinMetinAlani">Tümü</span>
						</label>
					</span>
					<span class="FormAlanlariIciRadioButonAlanlariKapsayicisi">
						<label class="FormAlanlariIciRadioButonAlani">
							<input type="radio" id="CinsiyetiSecenekIki" name="Cinsiyeti" value="Erkek" class="FormAlanlariIciRadioInputlari">
							<span class="FormAlanlariIciRadioButonAlanlariIcinBicimlendirmeAlani"></span> <span class="FormAlanlariIciRadioButonAlanlariIcinMetinAlani">Erkek</span>
						</label>
					</span>
					<span class="FormAlanlariIciRadioButonAlanlariKapsayicisi">
						<label class="FormAlanlariIciRadioButonAlani">
							<input type="radio" id="CinsiyetiSecenekUc" name="Cinsiyeti" value="Kadın" class="FormAlanlariIciRadioInputlari">
							<span class="FormAlanlariIciRadioButonAlanlariIcinBicimlendirmeAlani"></span> <span class="FormAlanlariIciRadioButonAlanlariIcinMetinAlani">Kadın</span>
						</label>
					</span>
				</div>
			</div>
		</div>

		<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
			<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
				Filtre İçin VIP Durumu
			</div>
			<div class="SayfaIciSerbestSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="FormAlanlariIciTumRadioButonAlanlariKapsayicisi">
				
					<span class="FormAlanlariIciRadioButonAlanlariKapsayicisi">
						<label class="FormAlanlariIciRadioButonAlani">
							<input type="radio" id="VIPDurumuSecenekBir" name="VIPDurumu" value="2" class="FormAlanlariIciRadioInputlari" checked="checked">
							<span class="FormAlanlariIciRadioButonAlanlariIcinBicimlendirmeAlani"></span> <span class="FormAlanlariIciRadioButonAlanlariIcinMetinAlani">Tümü</span>
						</label>
					</span>
					<span class="FormAlanlariIciRadioButonAlanlariKapsayicisi">
						<label class="FormAlanlariIciRadioButonAlani">
							<input type="radio" id="VIPDurumuSecenekIki" name="VIPDurumu" value="1" class="FormAlanlariIciRadioInputlari">
							<span class="FormAlanlariIciRadioButonAlanlariIcinBicimlendirmeAlani"></span> <span class="FormAlanlariIciRadioButonAlanlariIcinMetinAlani">VIP</span>
						</label>
					</span>
					<span class="FormAlanlariIciRadioButonAlanlariKapsayicisi">
						<label class="FormAlanlariIciRadioButonAlani">
							<input type="radio" id="VIPDurumuSecenekUc" name="VIPDurumu" value="0" class="FormAlanlariIciRadioInputlari">
							<span class="FormAlanlariIciRadioButonAlanlariIcinBicimlendirmeAlani"></span> <span class="FormAlanlariIciRadioButonAlanlariIcinMetinAlani">Standart</span>
						</label>
					</span>
				</div>
			</div>
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Filtre İçin Ülke
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="UcYuzPixselSinirliAlanKapsayicisi"><select id="Ulkesi" name="Ulkesi" class="FormAlaniIciSelectleri" tabindex="7" onChange="UlkeyeGoreSehirGetir(this.value)">
					<option value="" selected="selected">Tümü</option>
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
				Filtre İçin Şehir
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="UcYuzPixselSinirliAlanKapsayicisi"><select id="Sehri" name="Sehri" class="FormAlaniIciSelectleri" tabindex="8">
					<option value="" selected="selected">Tümü</option>
				</select></div>
			</div>
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Filtre İçin İlçe
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="Ilcesi" name="Ilcesi" class="FormAlaniIciTextInputlari" maxlength="100" tabindex="9">
			</div>
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Filtre İçin Posta Kodu
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="YuzPixselSinirliAlanKapsayicisi"><input type="number" id="PostaKodu" name="PostaKodu" class="FormAlaniIciTextInputlari" maxlength="5" min="0" max="99999" tabindex="10"></div>
			</div>
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Filtre İçin Adres
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="Adresi" name="Adresi" class="FormAlaniIciTextInputlari" maxlength="255" tabindex="11">
			</div>
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Filtre İçin Web Sitesi Adresi
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="WebSitesiAdresi" name="WebSitesiAdresi" onKeyUp="LinkAlanlariIcinFiltrele('WebSitesiAdresi')" class="FormAlaniIciTextInputlari" maxlength="255" tabindex="12">
			</div>
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Filtre İçin Facebook Profil Sayfası Adresi
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="FacebookProfilSayfasiAdresi" name="FacebookProfilSayfasiAdresi" onKeyUp="LinkAlanlariIcinFiltrele('FacebookProfilSayfasiAdresi')" class="FormAlaniIciTextInputlari" maxlength="255" tabindex="13">
			</div>
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Filtre İçin Twitter Profil Sayfası Adresi
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="TwitterProfilSayfasiAdresi" name="TwitterProfilSayfasiAdresi" onKeyUp="LinkAlanlariIcinFiltrele('TwitterProfilSayfasiAdresi')" class="FormAlaniIciTextInputlari" maxlength="255" tabindex="14">
			</div>
		</div>
		
		<div class="SayfaIciButonlarIcinSatirAlanlariKapsayicisi">
			<input type="button" value="Oluştur" class="FormAlaniIciOlusturButonlari" onClick="AktarimFormKontrol()" tabindex="15">
		</div>
	</form>
</div>
<?php }else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>