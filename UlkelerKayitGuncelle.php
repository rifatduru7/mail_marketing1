<? if(isset($_SESSION["Yonetici"])){
$GelenID			=	SayiliIcerikleriFiltrele($_REQUEST["ID"]);
	if($GelenID!=""){
		$UlkelerSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM ulkeler WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
		$UlkelerSorgusuKayitSayisi	=	$UlkelerSorgusu->num_rows;
			if($UlkelerSorgusuKayitSayisi>0){
				$UlkelerSorgusuKaydi	=	$UlkelerSorgusu->fetch_assoc();
					$UlkelerSorgusuKaydiID				=	$UlkelerSorgusuKaydi["ID"];
					$UlkelerSorgusuKaydiUlkeAdi			=	$UlkelerSorgusuKaydi["UlkeAdi"];
					$UlkelerSorgusuKaydiUlkeKodu		=	$UlkelerSorgusuKaydi["UlkeKodu"];
					$UlkelerSorgusuKaydiSiraNumarasi	=	$UlkelerSorgusuKaydi["SiraNumarasi"];
?>
<script type="text/javascript" language="javascript">
	function GuncellemeFormKontrol(){	
		if(document.GuncellemeFormu.UlkeAdi.value==""){
			document.getElementById("ModalMetinAlani").innerHTML		=	"Güncelleme formu dahilinde bulunan, \"Ülke Adı\" değeri boş bırakılamaz. Lütfen geçerli bir \"Ülke Adı\" değeri giriniz.";
			ModalAc();
			return;
		}
	
		if(document.GuncellemeFormu.UlkeKodu.value==""){
			document.getElementById("ModalMetinAlani").innerHTML		=	"Güncelleme formu dahilinde bulunan, \"Ülke Kodu\" değeri boş bırakılamaz. Lütfen geçerli bir \"Ülke Kodu\" değeri giriniz.";
			ModalAc();
			return;
		}
	
		if((document.GuncellemeFormu.UlkeKodu.value=="") && (document.GuncellemeFormu.UlkeKodu.value.length!=2)){
			document.getElementById("ModalMetinAlani").innerHTML		=	"Güncelleme formu dahilinde bulunan, \"Ülke Kodu\" değeri 2 (iki) karakter olmalıdır. Lütfen geçerli bir \"Ülke Kodu\" değeri giriniz.";
			ModalAc();
			return;
		}
	
		if(document.GuncellemeFormu.SiraNumarasi.value==""){
			document.getElementById("ModalMetinAlani").innerHTML		=	"Güncelleme formu dahilinde bulunan, \"Sıra Numarası\" değeri boş bırakılamaz. Lütfen geçerli bir \"Sıra Numarası\" değeri seçiniz.";
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
	<form id="GuncellemeFormu" name="GuncellemeFormu" action="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=23&ID=<?php echo $UlkelerSorgusuKaydiID; ?>" method="POST">
		<div class="SayfaIciBaslikAlanlariKapsayicisi">
			<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=23" target="_top">Ülkeler</a> > Kayıt Güncelle
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Ülke Adı (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="UlkeAdi" name="UlkeAdi" value="<?php echo $UlkelerSorgusuKaydiUlkeAdi; ?>" class="FormAlaniIciTextInputlari" maxlength="100" tabindex="1">
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Ülke Kodu (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="YuzPixselSinirliAlanKapsayicisi"><input type="text" id="UlkeKodu" name="UlkeKodu" value="<?php echo $UlkelerSorgusuKaydiUlkeKodu; ?>" onKeyUp="UluslararasiKodAlanlariIcinFiltrele('UlkeKodu')" class="FormAlaniIciTextInputlari" maxlength="2" tabindex="2"></div>
			</div>
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Sıra Numarası (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="UcYuzPixselSinirliAlanKapsayicisi"><select id="SiraNumarasi" name="SiraNumarasi" class="FormAlaniIciSelectleri" tabindex="3">
					<?php
					$SonSiraNumarasiSorgusu					=	$VeritabaniBaglantisi->query("SELECT * FROM ulkeler ORDER BY SiraNumarasi DESC LIMIT 1");
					$SonSiraNumarasiSorgusuKayitSayisi		=	$SonSiraNumarasiSorgusu->num_rows;
						if($SonSiraNumarasiSorgusuKayitSayisi>0){
							$SonSiraNumarasiSorgusuKaydi	=	$SonSiraNumarasiSorgusu->fetch_assoc();
								$SonSiraNumarasiSorgusuKaydiSiraNumarasi	=	$SonSiraNumarasiSorgusuKaydi["SiraNumarasi"];
								$SonSiraNumarasi							=	$SonSiraNumarasiSorgusuKaydiSiraNumarasi;
						}else{
							header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=15");
							exit();
						}
				
					$DonguBaslangicDegeri	=	1;
					$DonguBitisDegeri		=	$SonSiraNumarasi;
				
					while($DonguBaslangicDegeri<=$DonguBitisDegeri){
					?>
						<option value="<?php echo $DonguBaslangicDegeri; ?>" <?php if($UlkelerSorgusuKaydiSiraNumarasi==$DonguBaslangicDegeri){ ?>selected="selected"<?php } ?>><?php echo $DonguBaslangicDegeri; ?></option>
					<?php
						$DonguBaslangicDegeri++;
					}
					?>
				</select></div>
			</div>
		</div>

		<div class="SayfaIciButonlarIcinSatirAlanlariKapsayicisi">
			<input type="button" value="Güncelle" class="FormAlaniIciGuncelleButonlari" onClick="GuncellemeFormKontrol()" tabindex="4">
		</div>
	</form>
</div>
<?php
			}else{
				header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=15");
				exit();
			}		
	}else{
		header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=15");
		exit();
	}		
}else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>