<? if(isset($_SESSION["Yonetici"])){ ?>
<script type="text/javascript" language="javascript">
	function UlkeyeGoreSehirGetir(UlkeDegeri){
		var FirmaSehriElemaninaBaglan				=	document.getElementById("FirmaSehri");
		var FirmaSehriElemaniSecenekUzunlugu		=	FirmaSehriElemaninaBaglan.length;
		var BaslangicDegeri							=	0;
		var BistisDegeri							=	FirmaSehriElemaniSecenekUzunlugu-1;
		
		for(BaslangicDegeri; BaslangicDegeri<=BistisDegeri; BaslangicDegeri++){
			document.getElementById("FirmaSehri").options[0].remove();
		}
		
		var VeriTalepEt			=	new XMLHttpRequest();
		VeriTalepEt.onreadystatechange		=	function(){
			if(this.readyState==4 && this.status==200){
				document.getElementById("FirmaSehri").innerHTML		=	this.responseText;
			}
		};
		VeriTalepEt.open("GET", "AnlikGunceller/FirmaAyarlariUlkeyeGoreSehirListesi.php?UlkeIDsi=" + UlkeDegeri, true);
		VeriTalepEt.send();
	}

	function FirmaAyarlariFormKontrol(){
		if(document.FirmaAyarlariFormu.FirmaAdi.value==""){
			document.getElementById("ModalMetinAlani").innerHTML		=	"Firma ayarları formu dahilinde bulunan, \"Firma Bilgileri\" başlığı içerisindeki \"Firma Adı\" değeri boş bırakılamaz. Lütfen geçerli bir \"Firma Adı\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if(document.FirmaAyarlariFormu.FirmaUnvani.value==""){
			document.getElementById("ModalMetinAlani").innerHTML		=	"Firma ayarları formu dahilinde bulunan, \"Firma Bilgileri\" başlığı içerisindeki \"Firma Ünvanı\" değeri boş bırakılamaz. Lütfen geçerli bir \"Firma Ünvanı\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if(document.FirmaAyarlariFormu.FirmaUlkesi.value==""){
			document.getElementById("ModalMetinAlani").innerHTML		=	"Firma ayarları formu dahilinde bulunan, \"Firma Bilgileri\" başlığı içerisindeki \"Firma Ülkesi\" değeri boş bırakılamaz. Lütfen geçerli bir \"Firma Ülkesi\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if(document.FirmaAyarlariFormu.FirmaSehri.value==""){
			document.getElementById("ModalMetinAlani").innerHTML		=	"Firma ayarları formu dahilinde bulunan, \"Firma Bilgileri\" başlığı içerisindeki \"Firma Şehri\" değeri boş bırakılamaz. Lütfen geçerli bir \"Firma Şehri\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if(document.FirmaAyarlariFormu.FirmaIlcesi.value==""){
			document.getElementById("ModalMetinAlani").innerHTML		=	"Firma ayarları formu dahilinde bulunan, \"Firma Bilgileri\" başlığı içerisindeki \"Firma İlçesi\" değeri boş bırakılamaz. Lütfen geçerli bir \"Firma İlçesi\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if(document.FirmaAyarlariFormu.FirmaAdresi.value==""){
			document.getElementById("ModalMetinAlani").innerHTML		=	"Firma ayarları formu dahilinde bulunan, \"Firma Bilgileri\" başlığı içerisindeki \"Firma Adresi\" değeri boş bırakılamaz. Lütfen geçerli bir \"Firma Adresi\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if(document.FirmaAyarlariFormu.FirmaPostaKodu.value==""){
			document.getElementById("ModalMetinAlani").innerHTML		=	"Firma ayarları formu dahilinde bulunan, \"Firma Bilgileri\" başlığı içerisindeki \"Firma Posta Kodu\" değeri boş bırakılamaz. Lütfen geçerli bir \"Firma Posta Kodu\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if((document.FirmaAyarlariFormu.FirmaTelefonu.value=="") || (document.FirmaAyarlariFormu.FirmaTelefonu.value.length<10)){
			document.getElementById("ModalMetinAlani").innerHTML		=	"Firma ayarları formu dahilinde bulunan, \"Firma Bilgileri\" başlığı içerisindeki \"Firma Telefonu\" değeri boş bırakılamaz. Lütfen geçerli bir \"Firma Telefonu\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		document.FirmaAyarlariFormu.submit();
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
	<form id="FirmaAyarlariFormu" name="FirmaAyarlariFormu" action="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=12" method="POST">
		<div class="SayfaIciBaslikAlanlariKapsayicisi">
			Firma Bilgileri
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Firma Adı (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="FirmaAdi" name="FirmaAdi" value="<?php echo $FirmaAyarlariKaydiFirmaAdi; ?>" class="FormAlaniIciTextInputlari" maxlength="100" tabindex="1">
			</div>
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Firma Ünvanı (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="FirmaUnvani" name="FirmaUnvani" value="<?php echo $FirmaAyarlariKaydiFirmaUnvani; ?>" class="FormAlaniIciTextInputlari" maxlength="255" tabindex="2">
			</div>
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Firma Ülkesi (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="UcYuzPixselSinirliAlanKapsayicisi"><select id="FirmaUlkesi" name="FirmaUlkesi" class="FormAlaniIciSelectleri" tabindex="3" onChange="UlkeyeGoreSehirGetir(this.value)">
					<?php if($FirmaAyarlariKaydiFirmaUlkesi==0){ ?>
						<option value="" selected="selected"></option>
					<?php }
					$Ulkeler				=	$VeritabaniBaglantisi->query("SELECT * FROM ulkeler ORDER BY SiraNumarasi ASC");
					$UlkelerKayitSayisi		=	$Ulkeler->num_rows;
						if($UlkelerKayitSayisi>0){
							while($UlkelerKayitlari=$Ulkeler->fetch_assoc()){
								$UlkelerKayitlariID			=	$UlkelerKayitlari["ID"];
								$UlkelerKayitlariUlkeAdi	=	$UlkelerKayitlari["UlkeAdi"];
					?>
								<option value="<?php echo $UlkelerKayitlariID; ?>" <?php if(($FirmaAyarlariKaydiFirmaUlkesi!="0") and ($FirmaAyarlariKaydiFirmaUlkesi==$UlkelerKayitlariID)){ ?>selected="selected"<?php } ?>><?php echo DonusumleriGeriDondur($UlkelerKayitlariUlkeAdi); ?></option>	
					<?php
							}
						}
					?>
				</select></div>
			</div>
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Firma Şehri (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="UcYuzPixselSinirliAlanKapsayicisi"><select id="FirmaSehri" name="FirmaSehri" class="FormAlaniIciSelectleri" tabindex="4">
					<?php if(($FirmaAyarlariKaydiFirmaUlkesi==0) or ($FirmaAyarlariKaydiFirmaSehri==0)){ ?>
						<option value="" selected="selected"></option>
					<?php }
					$Sehirler					=	$VeritabaniBaglantisi->query("SELECT * FROM sehirler WHERE UlkeIDsi='$FirmaAyarlariKaydiFirmaUlkesi' ORDER BY SiraNumarasi ASC");
					$SehirlerKayitSayisi		=	$Sehirler->num_rows;
						if($SehirlerKayitSayisi>0){
							while($SehirlerKayitlari=$Sehirler->fetch_assoc()){
								$SehirlerKayitlariID			=	$SehirlerKayitlari["ID"];
								$SehirlerKayitlariSehirAdi		=	$SehirlerKayitlari["SehirAdi"];
					?>
								<option value="<?php echo $SehirlerKayitlariID; ?>" <?php if(($FirmaAyarlariKaydiFirmaUlkesi!="0") and ($FirmaAyarlariKaydiFirmaSehri!="0") and ($FirmaAyarlariKaydiFirmaSehri==$SehirlerKayitlariID)){ ?>selected="selected"<?php } ?>><?php echo DonusumleriGeriDondur($SehirlerKayitlariSehirAdi); ?></option>	
					<?php
							}
						}
					?>
				</select></div>
			</div>
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Firma İlçesi (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="FirmaIlcesi" name="FirmaIlcesi" value="<?php echo $FirmaAyarlariKaydiFirmaIlcesi; ?>" class="FormAlaniIciTextInputlari" maxlength="100" tabindex="5">
			</div>
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Firma Adresi (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="FirmaAdresi" name="FirmaAdresi" value="<?php echo $FirmaAyarlariKaydiFirmaAdresi; ?>" class="FormAlaniIciTextInputlari" maxlength="255" tabindex="6">
			</div>
		</div>
		
		<?php
		if($FirmaAyarlariKaydiFirmaPostaKodu==0){
			$FirmaAyarlariKaydiFirmaPostaKodu	=	"";
		}
		?>
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Firma Posta Kodu (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="YuzPixselSinirliAlanKapsayicisi"><input type="number" id="FirmaPostaKodu" name="FirmaPostaKodu" value="<?php echo $FirmaAyarlariKaydiFirmaPostaKodu; ?>" class="FormAlaniIciTextInputlari" maxlength="5" min="0" max="99999" tabindex="7"></div>
			</div>
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Firma Telefonu (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="IkiYuzPixselSinirliAlanKapsayicisi"><input type="text" id="FirmaTelefonu" name="FirmaTelefonu" value="<?php echo $FirmaAyarlariKaydiFirmaTelefonu; ?>" onKeyUp="TelefonAlanlariIcinFiltrele('FirmaTelefonu')" class="FormAlaniIciTextInputlari" maxlength="11" tabindex="8"></div>
			</div>
		</div>

		<div class="SayfaIciButonlarIcinSatirAlanlariKapsayicisi">
			<input type="button" value="Güncelle" class="FormAlaniIciGuncelleButonlari" onClick="FirmaAyarlariFormKontrol()" tabindex="9">
		</div>
	</form>
</div>
<?php }else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>