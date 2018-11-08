<? if(isset($_SESSION["Yonetici"])){
$GelenID			=	SayiliIcerikleriFiltrele($_REQUEST["ID"]);
	if($GelenID!=""){
		$KisiBilgileriSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM kisiler WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
		$KisiBilgileriSorgusuKayitSayisi	=	$KisiBilgileriSorgusu->num_rows;
			if($KisiBilgileriSorgusuKayitSayisi>0){
				$KisiBilgileriSorgusuKaydi	=	$KisiBilgileriSorgusu->fetch_assoc();
					$KisiBilgileriSorgusuKaydiID								=	$KisiBilgileriSorgusuKaydi["ID"];
					$KisiBilgileriSorgusuKaydiAdi								=	$KisiBilgileriSorgusuKaydi["Adi"];
					$KisiBilgileriSorgusuKaydiSoyadi							=	$KisiBilgileriSorgusuKaydi["Soyadi"];
					$KisiBilgileriSorgusuKaydiEMailAdresi						=	$KisiBilgileriSorgusuKaydi["EMailAdresi"];
					$KisiBilgileriSorgusuKaydiTelefonu							=	$KisiBilgileriSorgusuKaydi["Telefonu"];
					$KisiBilgileriSorgusuKaydiCepTelefonu						=	$KisiBilgileriSorgusuKaydi["CepTelefonu"];
					$KisiBilgileriSorgusuKaydiCinsiyeti							=	$KisiBilgileriSorgusuKaydi["Cinsiyeti"];
					$KisiBilgileriSorgusuKaydiVIPDurumu							=	$KisiBilgileriSorgusuKaydi["VIPDurumu"];
					$KisiBilgileriSorgusuKaydiAdresi							=	$KisiBilgileriSorgusuKaydi["Adresi"];
					$KisiBilgileriSorgusuKaydiPostaKodu							=	$KisiBilgileriSorgusuKaydi["PostaKodu"];
						if($KisiBilgileriSorgusuKaydiPostaKodu==0){
							$KisiBilgileriSorgusuKaydiPostaKodu		=	"";
						}
					$KisiBilgileriSorgusuKaydiIlcesi							=	$KisiBilgileriSorgusuKaydi["Ilcesi"];
					$KisiBilgileriSorgusuKaydiSehri								=	$KisiBilgileriSorgusuKaydi["Sehri"];
					$KisiBilgileriSorgusuKaydiUlkesi							=	$KisiBilgileriSorgusuKaydi["Ulkesi"];
					$KisiBilgileriSorgusuKaydiWebSitesiAdresi					=	$KisiBilgileriSorgusuKaydi["WebSitesiAdresi"];
					$KisiBilgileriSorgusuKaydiFacebookProfilSayfasiAdresi		=	$KisiBilgileriSorgusuKaydi["FacebookProfilSayfasiAdresi"];
					$KisiBilgileriSorgusuKaydiTwitterProfilSayfasiAdresi		=	$KisiBilgileriSorgusuKaydi["TwitterProfilSayfasiAdresi"];
					$KisiBilgileriSorgusuKaydiAciklama							=	$KisiBilgileriSorgusuKaydi["Aciklama"];
?>
<script type="text/javascript" language="javascript">
	function UlkeyeGoreSiraNumarasiGetir(UlkeDegeri){
		var KisininMevcutUlkeBilgisi			=	"<?php echo $KisiBilgileriSorgusuKaydiUlkesi; ?>";
		var KisininMevcutSehriBilgisi			=	"<?php echo $KisiBilgileriSorgusuKaydiSehri; ?>";
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
		VeriTalepEt.open("GET", "AnlikGunceller/KisilerGuncellemeSayfasiUlkeyeGoreSehirListesi.php?UlkeIDsi=" + UlkeDegeri + "&MevcutUlkeIDsi=" + KisininMevcutUlkeBilgisi +  "&MevcutSehirIDsi=" + KisininMevcutSehriBilgisi, true);
		VeriTalepEt.send();
	}
	
	function GuncellemeFormKontrol(){
		if((document.GuncellemeFormu.Telefonu.value!="") && (document.GuncellemeFormu.Telefonu.value.length<10)){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Güncelleme formu dahilinde bulunan, \"Telefonu\" değeri geçersizdir. Lütfen geçerli bir \"Telefonu\" değeri giriniz.";
			ModalAc();
			return;
		}
	
		if((document.GuncellemeFormu.CepTelefonu.value!="") && (document.GuncellemeFormu.CepTelefonu.value.length<10)){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Güncelleme formu dahilinde bulunan, \"Cep Telefonu\" değeri geçersizdir. Lütfen geçerli bir \"Cep Telefonu\" değeri giriniz.";
			ModalAc();
			return;
		}
	
		var VIPDurumuElemani		=	document.getElementsByName("VIPDurumu");
		if((VIPDurumuElemani[0].checked==false) && (VIPDurumuElemani[1].checked==false)){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Güncelleme formu dahilinde bulunan, \"VIP Durumu\" değeri boş bırakılamaz. Lütfen geçerli bir \"VIP Durumu\" değeri seçiniz.";
			ModalAc();
			return;
		}
		
		if(document.GuncellemeFormu.WebSitesiAdresi.value!=""){
			var WebSitesiAdresiDegeri	=	document.getElementById("WebSitesiAdresi").value;
			var WebSitesiAdresiKontrol	=	LinkOnEkiZorunluKontrolEt(WebSitesiAdresiDegeri);
				if(WebSitesiAdresiKontrol==false){
					document.getElementById("ModalMetinAlani").innerHTML	=	"Güncelleme formu dahilinde bulunan, \"Web Sitesi Adresi\" geçersizdir. Lütfen geçerli bir \"Web Sitesi Adresi\" değeri giriniz.";
					ModalAc();
					return;
				}
		}
		
		if(document.GuncellemeFormu.FacebookProfilSayfasiAdresi.value!=""){
			var FacebookProfilSayfasiAdresiDegeri	=	document.getElementById("FacebookProfilSayfasiAdresi").value;
			var FacebookProfilSayfasiAdresiKontrol	=	LinkOnEkiZorunluKontrolEt(FacebookProfilSayfasiAdresiDegeri);
				if(FacebookProfilSayfasiAdresiKontrol==false){
					document.getElementById("ModalMetinAlani").innerHTML	=	"Güncelleme formu dahilinde bulunan, \"Facebook Profil Sayfası Adresi\" geçersizdir. Lütfen geçerli bir \"Facebook Profil Sayfası Adresi\" değeri giriniz.";
					ModalAc();
					return;
				}
		}
		
		if(document.GuncellemeFormu.TwitterProfilSayfasiAdresi.value!=""){
			var TwitterProfilSayfasiAdresiDegeri	=	document.getElementById("TwitterProfilSayfasiAdresi").value;
			var TwitterProfilSayfasiAdresiKontrol	=	LinkOnEkiZorunluKontrolEt(TwitterProfilSayfasiAdresiDegeri);
				if(TwitterProfilSayfasiAdresiKontrol==false){
					document.getElementById("ModalMetinAlani").innerHTML	=	"Güncelleme formu dahilinde bulunan, \"Twitter Profil Sayfası Adresi\" geçersizdir. Lütfen geçerli bir \"Twitter Profil Sayfası Adresi\" değeri giriniz.";
					ModalAc();
					return;
				}
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
	<form id="GuncellemeFormu" name="GuncellemeFormu" action="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=155&ID=<?php echo $GelenID; ?>" method="POST">
		<div class="SayfaIciBaslikAlanlariKapsayicisi">
			<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=144" target="_top">Kişiler</a> > Kayıt Güncelle
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Adi
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="Adi" name="Adi" value="<?php echo $KisiBilgileriSorgusuKaydiAdi; ?>" class="FormAlaniIciTextInputlari" maxlength="50" tabindex="1">
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Soyadi
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="Soyadi" name="Soyadi" value="<?php echo $KisiBilgileriSorgusuKaydiSoyadi; ?>" class="FormAlaniIciTextInputlari" maxlength="50" tabindex="2">
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				E-Mail Adresi (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagMetinAlanlariKapsayicisi">
				<a href="mailto:<?php echo DonusumleriGeriDondur($KisiBilgileriSorgusuKaydiEMailAdresi); ?>"><?php echo DonusumleriGeriDondur($KisiBilgileriSorgusuKaydiEMailAdresi); ?></a>
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Telefonu
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="IkiYuzPixselSinirliAlanKapsayicisi"><input type="text" id="Telefonu" name="Telefonu" value="<?php echo $KisiBilgileriSorgusuKaydiTelefonu; ?>" onKeyUp="TelefonAlanlariIcinFiltrele('Telefonu')" class="FormAlaniIciTextInputlari" maxlength="11" tabindex="3"></div>
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Cep Telefonu
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="IkiYuzPixselSinirliAlanKapsayicisi"><input type="text" id="CepTelefonu" name="CepTelefonu" value="<?php echo $KisiBilgileriSorgusuKaydiCepTelefonu; ?>" onKeyUp="TelefonAlanlariIcinFiltrele('CepTelefonu')" class="FormAlaniIciTextInputlari" maxlength="11" tabindex="4"></div>
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
							<input type="radio" id="CinsiyetiSecenekBir" name="Cinsiyeti" value="Erkek" class="FormAlanlariIciRadioInputlari" <?php if($KisiBilgileriSorgusuKaydiCinsiyeti=="Erkek"){ ?>checked="checked"<?php } ?>>
							<span class="FormAlanlariIciRadioButonAlanlariIcinBicimlendirmeAlani"></span> <span class="FormAlanlariIciRadioButonAlanlariIcinMetinAlani">Erkek</span>
						</label>
					</span>
					<span class="FormAlanlariIciRadioButonAlanlariKapsayicisi">
						<label class="FormAlanlariIciRadioButonAlani">
							<input type="radio" id="CinsiyetiSecenekIki" name="Cinsiyeti" value="Kadın" class="FormAlanlariIciRadioInputlari" <?php if($KisiBilgileriSorgusuKaydiCinsiyeti=="Kadın"){ ?>checked="checked"<?php } ?>>
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
							<input type="radio" id="VIPDurumuSecenekBir" name="VIPDurumu" value="1" class="FormAlanlariIciRadioInputlari" <?php if($KisiBilgileriSorgusuKaydiVIPDurumu==1){ ?>checked="checked"<?php } ?>>
							<span class="FormAlanlariIciRadioButonAlanlariIcinBicimlendirmeAlani"></span> <span class="FormAlanlariIciRadioButonAlanlariIcinMetinAlani">VIP</span>
						</label>
					</span>
					<span class="FormAlanlariIciRadioButonAlanlariKapsayicisi">
						<label class="FormAlanlariIciRadioButonAlani">
							<input type="radio" id="VIPDurumuSecenekIki" name="VIPDurumu" value="0" class="FormAlanlariIciRadioInputlari" <?php if($KisiBilgileriSorgusuKaydiVIPDurumu==0){ ?>checked="checked"<?php } ?>>
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
				<div class="UcYuzPixselSinirliAlanKapsayicisi"><select id="Ulkesi" name="Ulkesi" class="FormAlaniIciSelectleri" tabindex="5" onChange="UlkeyeGoreSiraNumarasiGetir(this.value)">
					<option value="" <?php if($KisiBilgileriSorgusuKaydiUlkesi==0){ ?>selected="selected"<?php } ?>></option>
					<?php
					$Ulkeler				=	$VeritabaniBaglantisi->query("SELECT * FROM ulkeler ORDER BY SiraNumarasi ASC");
					$UlkelerKayitSayisi		=	$Ulkeler->num_rows;
						if($UlkelerKayitSayisi>0){
							while($UlkelerKayitlari=$Ulkeler->fetch_assoc()){
								$UlkelerKayitlariID			=	$UlkelerKayitlari["ID"];
								$UlkelerKayitlariUlkeAdi	=	$UlkelerKayitlari["UlkeAdi"];
					?>
								<option value="<?php echo $UlkelerKayitlariID; ?>" <?php if(($KisiBilgileriSorgusuKaydiUlkesi!=0) and ($KisiBilgileriSorgusuKaydiUlkesi==$UlkelerKayitlariID)){ ?>selected="selected"<?php } ?>><?php echo DonusumleriGeriDondur($UlkelerKayitlariUlkeAdi); ?></option>	
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
				<div class="UcYuzPixselSinirliAlanKapsayicisi"><select id="Sehri" name="Sehri" class="FormAlaniIciSelectleri" tabindex="6">
					<option value="" <?php if(($KisiBilgileriSorgusuKaydiUlkesi==0) or ($KisiBilgileriSorgusuKaydiSehri==0)){ ?>selected="selected"<?php } ?>></option>
					<?php 
					$Sehirler					=	$VeritabaniBaglantisi->query("SELECT * FROM sehirler WHERE UlkeIDsi='$KisiBilgileriSorgusuKaydiUlkesi' ORDER BY SiraNumarasi ASC");
					$SehirlerKayitSayisi		=	$Sehirler->num_rows;
						if($SehirlerKayitSayisi>0){
							while($SehirlerKayitlari=$Sehirler->fetch_assoc()){
								$SehirlerKayitlariID			=	$SehirlerKayitlari["ID"];
								$SehirlerKayitlariSehirAdi		=	$SehirlerKayitlari["SehirAdi"];
					?>
								<option value="<?php echo $SehirlerKayitlariID; ?>" <?php if(($KisiBilgileriSorgusuKaydiUlkesi!="0") and ($KisiBilgileriSorgusuKaydiSehri!="0") and ($KisiBilgileriSorgusuKaydiSehri==$SehirlerKayitlariID)){ ?>selected="selected"<?php } ?>><?php echo DonusumleriGeriDondur($SehirlerKayitlariSehirAdi); ?></option>	
					<?php
							}
						}
					?>
				</select></div>
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				İlçesi
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="Ilcesi" name="Ilcesi" value="<?php echo $KisiBilgileriSorgusuKaydiIlcesi; ?>" class="FormAlaniIciTextInputlari" maxlength="100" tabindex="7">
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Posta Kodu
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="YuzPixselSinirliAlanKapsayicisi"><input type="number" id="PostaKodu" name="PostaKodu" value="<?php echo $KisiBilgileriSorgusuKaydiPostaKodu; ?>" class="FormAlaniIciTextInputlari" maxlength="5" min="0" max="99999" tabindex="8"></div>
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Adresi
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="Adresi" name="Adresi" value="<?php echo $KisiBilgileriSorgusuKaydiAdresi; ?>" class="FormAlaniIciTextInputlari" maxlength="255" tabindex="9">
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Web Sitesi Adresi
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="WebSitesiAdresi" name="WebSitesiAdresi" value="<?php echo $KisiBilgileriSorgusuKaydiWebSitesiAdresi; ?>" onKeyUp="LinkAlanlariIcinFiltrele('WebSitesiAdresi')" class="FormAlaniIciTextInputlari" maxlength="255" tabindex="10">
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Facebook Profil Sayfası Adresi
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="FacebookProfilSayfasiAdresi" name="FacebookProfilSayfasiAdresi" value="<?php echo $KisiBilgileriSorgusuKaydiFacebookProfilSayfasiAdresi; ?>" onKeyUp="LinkAlanlariIcinFiltrele('FacebookProfilSayfasiAdresi')" class="FormAlaniIciTextInputlari" maxlength="255" tabindex="11">
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Twitter Profil Sayfası Adresi
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="TwitterProfilSayfasiAdresi" name="TwitterProfilSayfasiAdresi" value="<?php echo $KisiBilgileriSorgusuKaydiTwitterProfilSayfasiAdresi; ?>" onKeyUp="LinkAlanlariIcinFiltrele('TwitterProfilSayfasiAdresi')" class="FormAlaniIciTextInputlari" maxlength="255" tabindex="12">
			</div>
		</div>
	
		<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
			<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
				Ek Açıklama
			</div>
			<div class="SayfaIciSerbestSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<textarea id="Aciklama" name="Aciklama" class="FormAlaniIciTextArealari" tabindex="13"><?php echo $KisiBilgileriSorgusuKaydiAciklama; ?></textarea>
			</div>
		</div>
		
		<div class="SayfaIciButonlarIcinSatirAlanlariKapsayicisi">
			<input type="button" value="Güncelle" class="FormAlaniIciGuncelleButonlari" onClick="GuncellemeFormKontrol()" tabindex="14">
		</div>
	</form>
</div>
<?php
			}else{
				header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=144");
				exit();
			}	
	}else{
		header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=144");
		exit();
	}		
}else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>