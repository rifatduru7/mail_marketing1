<? if(isset($_SESSION["Yonetici"])){ ?>
<script type="text/javascript" language="javascript">
	function UlkeyeGoreSiraNumarasiGetir(UlkeDegeri){
		var SiraNumarasiElemaninaBaglan				=	document.getElementById("SiraNumarasi");
		var SiraNumarasiElemaniSecenekUzunlugu		=	SiraNumarasiElemaninaBaglan.length;
		var BaslangicDegeri							=	0;
		var BistisDegeri							=	SiraNumarasiElemaniSecenekUzunlugu-1;
		
		for(BaslangicDegeri; BaslangicDegeri<=BistisDegeri; BaslangicDegeri++){
			document.getElementById("SiraNumarasi").options[0].remove();
		}
		
		var VeriTalepEt			=	new XMLHttpRequest();
		VeriTalepEt.onreadystatechange		=	function(){
			if(this.readyState==4 && this.status==200){
				document.getElementById("SiraNumarasi").innerHTML		=	this.responseText;
			}
		};
		
		VeriTalepEt.open("GET", "AnlikGunceller/SehirlerYeniKayitEkleUlkeyeGoreSiraNumarasiListesi.php?UlkeIDsi=" + UlkeDegeri, true);
		VeriTalepEt.send();
	}
		
	function KayitEklemeFormKontrol(){	
		if(document.KayitEklemeFormu.Ulkesi.value==""){
			document.getElementById("ModalMetinAlani").innerHTML		=	"Kayıt formu dahilinde bulunan, \"Ülke Adı\" değeri boş bırakılamaz. Lütfen geçerli bir \"Ülke Adı\" değeri seçiniz.";
			ModalAc();
			return;
		}
		
		if(document.KayitEklemeFormu.SehirAdi.value==""){
			document.getElementById("ModalMetinAlani").innerHTML		=	"Kayıt formu dahilinde bulunan, \"Şehir Adı\" değeri boş bırakılamaz. Lütfen geçerli bir \"Şehir Adı\" değeri giriniz.";
			ModalAc();
			return;
		}
	
		if(document.KayitEklemeFormu.SiraNumarasi.value==""){
			document.getElementById("ModalMetinAlani").innerHTML		=	"Kayıt formu dahilinde bulunan, \"Sıra Numarası\" değeri boş bırakılamaz. Lütfen geçerli bir \"Sıra Numarası\" değeri seçiniz.";
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
	<form id="KayitEklemeFormu" name="KayitEklemeFormu" action="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=40" method="POST">
		<div class="SayfaIciBaslikAlanlariKapsayicisi">
			<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=35" target="_top">Şehirler</a> > Yeni Kayıt Ekle
		</div>
		
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Ülke Adı (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="UcYuzPixselSinirliAlanKapsayicisi"><select id="Ulkesi" name="Ulkesi" class="FormAlaniIciSelectleri" tabindex="1" onChange="UlkeyeGoreSiraNumarasiGetir(this.value)">
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
				Şehir Adı (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="SehirAdi" name="SehirAdi" class="FormAlaniIciTextInputlari" maxlength="100" tabindex="2">
			</div>
		</div>
		
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Sıra Numarası (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="UcYuzPixselSinirliAlanKapsayicisi"><select id="SiraNumarasi" name="SiraNumarasi" class="FormAlaniIciSelectleri" tabindex="3">
					<option value=""></option>
				</select></div>
			</div>
		</div>

		<div class="SayfaIciButonlarIcinSatirAlanlariKapsayicisi">
			<input type="button" value="Kaydet" class="FormAlaniIciKaydetButonlari" onClick="KayitEklemeFormKontrol()" tabindex="4">
		</div>
	</form>
</div>
<?php }else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>