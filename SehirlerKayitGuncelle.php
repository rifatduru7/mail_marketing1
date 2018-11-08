<? if(isset($_SESSION["Yonetici"])){
$GelenID			=	SayiliIcerikleriFiltrele($_REQUEST["ID"]);
	if($GelenID!=""){
		$SehirlerSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM sehirler WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
		$SehirlerSorgusuKayitSayisi		=	$SehirlerSorgusu->num_rows;
			if($SehirlerSorgusuKayitSayisi>0){
				$SehirlerSorgusuKaydi	=	$SehirlerSorgusu->fetch_assoc();
					$SehirlerSorgusuKaydiID				=	$SehirlerSorgusuKaydi["ID"];
					$SehirlerSorgusuKaydiUlkeIDsi		=	$SehirlerSorgusuKaydi["UlkeIDsi"];
					$SehirlerSorgusuKaydiSehirAdi		=	$SehirlerSorgusuKaydi["SehirAdi"];
					$SehirlerSorgusuKaydiSiraNumarasi	=	$SehirlerSorgusuKaydi["SiraNumarasi"];
?>

<script type="text/javascript" language="javascript">
	function GuncellemeFormKontrol(){	
		if(document.GuncellemeFormu.SehirAdi.value==""){
			document.getElementById("ModalMetinAlani").innerHTML		=	"Güncelleme formu dahilinde bulunan, \"Şehir Adı\" değeri boş bırakılamaz. Lütfen geçerli bir \"Şehir Adı\" değeri giriniz.";
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
	<form id="GuncellemeFormu" name="GuncellemeFormu" action="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=45&ID=<?php echo $GelenID; ?>&UlkeIDsi=<?php echo $SehirlerSorgusuKaydiUlkeIDsi; ?>" method="POST">
		<div class="SayfaIciBaslikAlanlariKapsayicisi">
			<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=35" target="_top">Şehirler</a> > Kayıt Güncelle
		</div>
		
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Ülke Adı
			</div>
			<div class="SayfaIciSatirAlanlariSagMetinAlanlariKapsayicisi">
				<?php
				$UlkeAdiSorgusu					=	$VeritabaniBaglantisi->query("SELECT * FROM ulkeler WHERE ID='$SehirlerSorgusuKaydiUlkeIDsi' ORDER BY ID ASC LIMIT 1");
				$UlkeAdiSorgusuKayitSayisi		=	$UlkeAdiSorgusu->num_rows;
					if($UlkeAdiSorgusuKayitSayisi>0){
						$UlkeAdiSorgusuKayitSayisiKaydi	=	$UlkeAdiSorgusu->fetch_assoc();
							$UlkeAdiSorgusuKayitSayisiKaydiUlkeAdi		=	$UlkeAdiSorgusuKayitSayisiKaydi["UlkeAdi"];
							
						echo DonusumleriGeriDondur($UlkeAdiSorgusuKayitSayisiKaydiUlkeAdi);
					}else{
						header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=35");
						exit();
					}
				?>
			</div>
		</div>
		
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Şehir Adı (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="SehirAdi" name="SehirAdi" value="<?php echo $SehirlerSorgusuKaydiSehirAdi; ?>" class="FormAlaniIciTextInputlari" maxlength="100" tabindex="1">
			</div>
		</div>
		
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Sıra Numarası (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="UcYuzPixselSinirliAlanKapsayicisi"><select id="SiraNumarasi" name="SiraNumarasi" class="FormAlaniIciSelectleri" tabindex="2">
					<?php
					$SonSiraNumarasiSorgusu					=	$VeritabaniBaglantisi->query("SELECT * FROM sehirler WHERE UlkeIDsi='$SehirlerSorgusuKaydiUlkeIDsi' ORDER BY SiraNumarasi DESC LIMIT 1");
					$SonSiraNumarasiSorgusuKayitSayisi		=	$SonSiraNumarasiSorgusu->num_rows;
						if($SonSiraNumarasiSorgusuKayitSayisi>0){
							$SonSiraNumarasiSorgusuKaydi	=	$SonSiraNumarasiSorgusu->fetch_assoc();
								$SonSiraNumarasiSorgusuKaydiSiraNumarasi	=	$SonSiraNumarasiSorgusuKaydi["SiraNumarasi"];
								$SonSiraNumarasi							=	$SonSiraNumarasiSorgusuKaydiSiraNumarasi;
						}else{
							header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=35");
							exit();
						}
		
					$DonguBaslangicDegeri	=	1;
					$DonguBitisDegeri		=	$SonSiraNumarasi;
				
					while($DonguBaslangicDegeri<=$DonguBitisDegeri){
					?>
						<option value="<?php echo $DonguBaslangicDegeri; ?>" <?php if($SehirlerSorgusuKaydiSiraNumarasi==$DonguBaslangicDegeri){ ?>selected="selected"<?php } ?>><?php echo $DonguBaslangicDegeri; ?></option>
					<?php
						$DonguBaslangicDegeri++;
					}
					?>
				</select></div>
			</div>
		</div>

		<div class="SayfaIciButonlarIcinSatirAlanlariKapsayicisi">
			<input type="button" value="Güncelle" class="FormAlaniIciGuncelleButonlari" onClick="GuncellemeFormKontrol()" tabindex="3">
		</div>
	</form>
</div>
<?php
			}else{
				header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=35");
				exit();
			}		
	}else{
		header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=35");
		exit();
	}		
}else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>