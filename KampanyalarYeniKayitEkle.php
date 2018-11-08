<? if(isset($_SESSION["Yonetici"])){ ?>
<script type="text/javascript" language="javascript">
	function UlkeyeGoreSehirGetir(UlkeDegeri){
		var SehirElemaninaBaglan				=	document.getElementById("FiltreIcinSehri");
		var SehirElemaniSecenekUzunlugu			=	SehirElemaninaBaglan.length;
		var BaslangicDegeri						=	0;
		var BistisDegeri						=	SehirElemaniSecenekUzunlugu-1;
		
		for(BaslangicDegeri; BaslangicDegeri<=BistisDegeri; BaslangicDegeri++){
			document.getElementById("FiltreIcinSehri").options[0].remove();
		}
		
		var VeriTalepEt			=	new XMLHttpRequest();
		VeriTalepEt.onreadystatechange		=	function(){
			if(this.readyState==4 && this.status==200){
				document.getElementById("FiltreIcinSehri").innerHTML		=	this.responseText;
			}
		};
		VeriTalepEt.open("GET", "AnlikGunceller/KampanyalarYeniKayitEkleSayfasiUlkeyeGoreSehirListesi.php?UlkeIDsi=" + UlkeDegeri, true);
		VeriTalepEt.send();
	}
	
	function KayitEklemeFormKontrol(){
		if(document.KayitEklemeFormu.KampanyaAdi.value==""){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"Kampanya Adı\" değeri boş bırakılamaz. Lütfen geçerli bir \"Kampanya Adı\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if(document.KayitEklemeFormu.TemaIDsi.value==""){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"Tema Seçimi\" değeri boş bırakılamaz. Lütfen geçerli bir \"Tema Seçimi\" değeri seçiniz.";
			ModalAc();
			return;
		}
		
		if(document.KayitEklemeFormu.WebSitesiLinki.value==""){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"Web Sitesi Adresi\" değeri boş bırakılamaz. Lütfen geçerli bir \"Web Sitesi Adresi\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if(document.KayitEklemeFormu.WebSitesiLinki.value!=""){
			var WebSitesiLinkiDegeri	=	document.getElementById("WebSitesiLinki").value;
			var WebSitesiLinkiKontrol	=	LinkOnEkiZorunluKontrolEt(WebSitesiLinkiDegeri);
				if(WebSitesiLinkiKontrol==false){
					document.getElementById("ModalMetinAlani").innerHTML	=	"Kayıt formu dahilinde bulunan, \"Web Sitesi Adresi\" geçersizdir. Lütfen geçerli bir \"Web Sitesi Adresi\" değeri giriniz.";
					ModalAc();
					return;
				}
		}
		
		if(document.KayitEklemeFormu.MailGondericiAdi.value==""){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"E-Mail Gönderici Adı\" değeri boş bırakılamaz. Lütfen geçerli bir \"E-Mail Gönderici Adı\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if(document.KayitEklemeFormu.YanitAliciAdi.value==""){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"Yanıt Alıcı Adı\" değeri boş bırakılamaz. Lütfen geçerli bir \"Yanıt Alıcı Adı\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if(document.KayitEklemeFormu.YanitEMailAdresi.value==""){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"Yanıt E-Mail Adresi\" değeri boş bırakılamaz. Lütfen geçerli bir \"Yanıt E-Mail Adresi\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if(document.KayitEklemeFormu.YanitEMailAdresi.value!=""){
			var YanitEMailAdresiDegeri	=	document.getElementById("YanitEMailAdresi").value;
			var YanitEMailAdresiKontrol	=	EMailKontrolEt(YanitEMailAdresiDegeri);
				if(YanitEMailAdresiKontrol==false){
					document.getElementById("ModalMetinAlani").innerHTML	=	"Kayıt formu dahilinde bulunan, \"Yanıt E-Mail Adresi\" geçersizdir. Lütfen geçerli bir \"Yanıt E-Mail Adresi\" değeri giriniz.";
					ModalAc();
					return;
				}
		}
		
		var OncelikDurumuElemani		=	document.getElementsByName("OncelikDurumu");
		if((OncelikDurumuElemani[0].checked==false) && (OncelikDurumuElemani[1].checked==false)){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"Öncelik Durumu\" değeri boş bırakılamaz. Lütfen geçerli bir \"Öncelik Durumu\" değeri seçiniz.";
			ModalAc();
			return;
		}
	
		if(document.KayitEklemeFormu.SiraNumarasi.value==""){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Kayıt formu dahilinde bulunan, \"Sıra Numarası\" değeri boş bırakılamaz. Lütfen geçerli bir \"Sıra Numarası\" değeri seçiniz.";
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
	<form id="KayitEklemeFormu" name="KayitEklemeFormu" action="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=215" method="POST">
		<div class="SayfaIciBaslikAlanlariKapsayicisi">
			<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=211" target="_top">Kampanyalar</a> > Yeni Kayıt Ekle
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Kampanya Adı (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="KampanyaAdi" name="KampanyaAdi" class="FormAlaniIciTextInputlari" maxlength="100" tabindex="1">
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Tema Seçimi (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="UcYuzPixselSinirliAlanKapsayicisi"><select id="TemaIDsi" name="TemaIDsi" class="FormAlaniIciSelectleri" tabindex="2">
					<option value="" selected="selected"></option>
					<?php
					$Temalar				=	$VeritabaniBaglantisi->query("SELECT * FROM temalar ORDER BY SiraNumarasi ASC");
					$TemalarKayitSayisi		=	$Temalar->num_rows;
						if($TemalarKayitSayisi>0){
							while($TemalarKayitlari=$Temalar->fetch_assoc()){
								$TemalarKayitlariID			=	$TemalarKayitlari["ID"];
								$TemalarKayitlariTemaAdi	=	$TemalarKayitlari["TemaAdi"];
					?>
								<option value="<?php echo $TemalarKayitlariID; ?>"><?php echo DonusumleriGeriDondur($TemalarKayitlariTemaAdi); ?></option>	
					<?php
							}
						}
					?>
				</select></div>
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Web Sitesi Adresi (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="WebSitesiLinki" name="WebSitesiLinki" onKeyUp="LinkAlanlariIcinFiltrele('WebSitesiLinki')" class="FormAlaniIciTextInputlari" maxlength="255" tabindex="3">
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				E-Mail Gönderici Adı (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="MailGondericiAdi" name="MailGondericiAdi" class="FormAlaniIciTextInputlari" maxlength="100" tabindex="4">
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Yanıt Alıcı Adı (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="YanitAliciAdi" name="YanitAliciAdi" class="FormAlaniIciTextInputlari" maxlength="100" tabindex="5">
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Yanıt E-Mail Adresi (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="YanitEMailAdresi" name="YanitEMailAdresi" onKeyUp="EMailAdresiAlanlariIcinFiltrele('YanitEMailAdresi')" class="FormAlaniIciTextInputlari" maxlength="100" tabindex="6">
			</div>
		</div>
	
		<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
			<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
				Öncelik Durumu (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSerbestSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="FormAlanlariIciTumRadioButonAlanlariKapsayicisi">
					<span class="FormAlanlariIciRadioButonAlanlariKapsayicisi">
						<label class="FormAlanlariIciRadioButonAlani">
							<input type="radio" id="OncelikDurumuSecenekBir" name="OncelikDurumu" value="0" class="FormAlanlariIciRadioInputlari">
							<span class="FormAlanlariIciRadioButonAlanlariIcinBicimlendirmeAlani"></span> <span class="FormAlanlariIciRadioButonAlanlariIcinMetinAlani">Normal</span>
						</label>
					</span>
					<span class="FormAlanlariIciRadioButonAlanlariKapsayicisi">
						<label class="FormAlanlariIciRadioButonAlani">
							<input type="radio" id="OncelikDurumuSecenekIki" name="OncelikDurumu" value="1" class="FormAlanlariIciRadioInputlari">
							<span class="FormAlanlariIciRadioButonAlanlariIcinBicimlendirmeAlani"></span> <span class="FormAlanlariIciRadioButonAlanlariIcinMetinAlani">Öncelikli</span>
						</label>
					</span>
				</div>
			</div>
		</div>


		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Sıra Numarası (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="UcYuzPixselSinirliAlanKapsayicisi"><select id="SiraNumarasi" name="SiraNumarasi" class="FormAlaniIciSelectleri" tabindex="7">
					<?php
					$SonSiraNumarasiSorgusu					=	$VeritabaniBaglantisi->query("SELECT * FROM kampanyalar ORDER BY SiraNumarasi DESC LIMIT 1");
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
	
		<div class="SayfaIciSatirBosluguAlanlariKapsayicisi"></div>

		<div class="SayfaIciBaslikAlanlariKapsayicisi">
			<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=211" target="_top">Kampanyalar</a> > Yeni Kayıt Ekle > Filtreler
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Adı Filtresi
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="FiltreIcinAdi" name="FiltreIcinAdi" class="FormAlaniIciTextInputlari" maxlength="50" tabindex="8">
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Soyadı Filtresi
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="FiltreIcinSoyadi" name="FiltreIcinSoyadi" class="FormAlaniIciTextInputlari" maxlength="50" tabindex="9">
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				E-Mail Adresi Filtresi
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="FiltreIcinEMailAdresi" name="FiltreIcinEMailAdresi" onKeyUp="EMailAdresiAlanlariIcinFiltrele('FiltreIcinEMailAdresi')" class="FormAlaniIciTextInputlari" maxlength="100" tabindex="10">
			</div>
		</div>

		<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
			<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
				Cinsiyet Filtresi
			</div>
			<div class="SayfaIciSerbestSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="FormAlanlariIciTumRadioButonAlanlariKapsayicisi">
				
					<span class="FormAlanlariIciRadioButonAlanlariKapsayicisi">
						<label class="FormAlanlariIciRadioButonAlani">
							<input type="radio" id="FiltreIcinCinsiyetiSecenekBir" name="FiltreIcinCinsiyeti" value="Tümü" class="FormAlanlariIciRadioInputlari" checked="checked">
							<span class="FormAlanlariIciRadioButonAlanlariIcinBicimlendirmeAlani"></span> <span class="FormAlanlariIciRadioButonAlanlariIcinMetinAlani">Tümü</span>
						</label>
					</span>
					<span class="FormAlanlariIciRadioButonAlanlariKapsayicisi">
						<label class="FormAlanlariIciRadioButonAlani">
							<input type="radio" id="FiltreIcinCinsiyetiSecenekIki" name="FiltreIcinCinsiyeti" value="Erkek" class="FormAlanlariIciRadioInputlari">
							<span class="FormAlanlariIciRadioButonAlanlariIcinBicimlendirmeAlani"></span> <span class="FormAlanlariIciRadioButonAlanlariIcinMetinAlani">Erkek</span>
						</label>
					</span>
					<span class="FormAlanlariIciRadioButonAlanlariKapsayicisi">
						<label class="FormAlanlariIciRadioButonAlani">
							<input type="radio" id="FiltreIcinCinsiyetiSecenekUc" name="FiltreIcinCinsiyeti" value="Kadın" class="FormAlanlariIciRadioInputlari">
							<span class="FormAlanlariIciRadioButonAlanlariIcinBicimlendirmeAlani"></span> <span class="FormAlanlariIciRadioButonAlanlariIcinMetinAlani">Kadın</span>
						</label>
					</span>
				</div>
			</div>
		</div>

		<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
			<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
				VIP Durumu Filtresi
			</div>
			<div class="SayfaIciSerbestSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="FormAlanlariIciTumRadioButonAlanlariKapsayicisi">
				
					<span class="FormAlanlariIciRadioButonAlanlariKapsayicisi">
						<label class="FormAlanlariIciRadioButonAlani">
							<input type="radio" id="FiltreIcinVIPDurumuSecenekBir" name="FiltreIcinVIPDurumu" value="2" class="FormAlanlariIciRadioInputlari" checked="checked">
							<span class="FormAlanlariIciRadioButonAlanlariIcinBicimlendirmeAlani"></span> <span class="FormAlanlariIciRadioButonAlanlariIcinMetinAlani">Tümü</span>
						</label>
					</span>
					<span class="FormAlanlariIciRadioButonAlanlariKapsayicisi">
						<label class="FormAlanlariIciRadioButonAlani">
							<input type="radio" id="FiltreIcinVIPDurumuSecenekIki" name="FiltreIcinVIPDurumu" value="1" class="FormAlanlariIciRadioInputlari">
							<span class="FormAlanlariIciRadioButonAlanlariIcinBicimlendirmeAlani"></span> <span class="FormAlanlariIciRadioButonAlanlariIcinMetinAlani">VIP</span>
						</label>
					</span>
					<span class="FormAlanlariIciRadioButonAlanlariKapsayicisi">
						<label class="FormAlanlariIciRadioButonAlani">
							<input type="radio" id="FiltreIcinVIPDurumuSecenekUc" name="FiltreIcinVIPDurumu" value="0" class="FormAlanlariIciRadioInputlari">
							<span class="FormAlanlariIciRadioButonAlanlariIcinBicimlendirmeAlani"></span> <span class="FormAlanlariIciRadioButonAlanlariIcinMetinAlani">Standart</span>
						</label>
					</span>
				</div>
			</div>
		</div>
		
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Ülke Filtresi
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="UcYuzPixselSinirliAlanKapsayicisi"><select id="FiltreIcinUlkesi" name="FiltreIcinUlkesi" class="FormAlaniIciSelectleri" tabindex="11" onChange="UlkeyeGoreSehirGetir(this.value)">
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
				Şehir Filtresi
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="UcYuzPixselSinirliAlanKapsayicisi"><select id="FiltreIcinSehri" name="FiltreIcinSehri" class="FormAlaniIciSelectleri" tabindex="12">
					<option value="" selected="selected">Tümü</option>
				</select></div>
			</div>
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				İlçe Filtresi
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="FiltreIcinIlcesi" name="FiltreIcinIlcesi" class="FormAlaniIciTextInputlari" maxlength="100" tabindex="13">
			</div>
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Posta Kodu Filtresi
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="YuzPixselSinirliAlanKapsayicisi"><input type="number" id="FiltreIcinPostaKodu" name="FiltreIcinPostaKodu" class="FormAlaniIciTextInputlari" maxlength="5" min="0" max="99999" tabindex="14"></div>
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