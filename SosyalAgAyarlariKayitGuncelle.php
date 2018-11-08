<? if(isset($_SESSION["Yonetici"])){
$GelenID			=	SayiliIcerikleriFiltrele($_REQUEST["ID"]);
	if($GelenID!=""){
		$SosyalAgBilgileriSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM sosyalagayarlari WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
		$SosyalAgBilgileriSorgusuKayitSayisi	=	$SosyalAgBilgileriSorgusu->num_rows;
			if($SosyalAgBilgileriSorgusuKayitSayisi>0){
				$SosyalAgBilgileriSorgusuKaydi	=	$SosyalAgBilgileriSorgusu->fetch_assoc();
					$SosyalAgBilgileriSorgusuKaydiID							=	$SosyalAgBilgileriSorgusuKaydi["ID"];
					$SosyalAgBilgileriSorgusuKaydiSosyalAgAdi					=	$SosyalAgBilgileriSorgusuKaydi["SosyalAgAdi"];
					$SosyalAgBilgileriSorgusuKaydiSosyalAgSayfasiLinki			=	$SosyalAgBilgileriSorgusuKaydi["SosyalAgSayfasiLinki"];
					$SosyalAgBilgileriSorgusuKaydiSiraNumarasi					=	$SosyalAgBilgileriSorgusuKaydi["SiraNumarasi"];
?>
<script type="text/javascript" language="javascript">
	function GuncellemeFormKontrol(){
		if(document.GuncellemeFormu.SosyalAgLogosu.value!=""){
			if((document.GuncellemeFormu.SosyalAgLogosu.value.indexOf(".png")==-1) && (document.GuncellemeFormu.SosyalAgLogosu.value.indexOf(".PNG")==-1)){
				document.getElementById("ModalMetinAlani").innerHTML		=	"Güncelleme formu dahilinde bulunan, \"Sosyal Ağ Logosu\" alanı için seçilen dosya formatı uygun değildir. Lütfen geçerli bir dosya seçiniz. Sistem tarafından desteklenen \"Sosyal Ağ Logosu\" dosya formatı .png'dir.";
				ModalAc();
				return;
			}
		}
		
		if(document.GuncellemeFormu.SosyalAgAdi.value==""){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Güncelleme formu dahilinde bulunan, \"Sosyal Ağ Adı\" değeri boş bırakılamaz. Lütfen geçerli bir \"Sosyal Ağ Adı\" değeri giriniz.";
			ModalAc();
			return;
		}
	
	
		if(document.GuncellemeFormu.SosyalAgSayfasiLinki.value==""){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Güncelleme formu dahilinde bulunan, \"Sosyal Ağ Sayfası Linki\" değeri boş bırakılamaz. Lütfen geçerli bir \"Sosyal Ağ Sayfası Linki\" değeri giriniz.";
			ModalAc();
			return;
		}
		
		if(document.GuncellemeFormu.SosyalAgSayfasiLinki.value!=""){
			var SosyalAgSayfasiLinkiDegeri	=	document.getElementById("SosyalAgSayfasiLinki").value;
			var SosyalAgSayfasiLinkiKontrol	=	LinkOnEkiZorunluKontrolEt(SosyalAgSayfasiLinkiDegeri);
				if(SosyalAgSayfasiLinkiKontrol==false){
					document.getElementById("ModalMetinAlani").innerHTML	=	"Güncelleme formu dahilinde bulunan, \"Sosyal Ağ Sayfası Linki\" geçersizdir. Lütfen geçerli bir \"Sosyal Ağ Sayfası Linki\" değeri giriniz.";
					ModalAc();
					return;
				}
		}
	
		if(document.GuncellemeFormu.SiraNumarasi.value==""){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Güncelleme formu dahilinde bulunan, \"Sıra Numarası\" değeri boş bırakılamaz. Lütfen geçerli bir \"Sıra Numarası\" değeri seçiniz.";
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
	<form id="GuncellemeFormu" name="GuncellemeFormu" action="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=98&ID=<?php echo $GelenID; ?>" method="POST" enctype="multipart/form-data">
		<div class="SayfaIciBaslikAlanlariKapsayicisi">
			<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=90" target="_top">Sosyal Ağ Ağarları</a> > Kayıt Güncelle
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Sosyal Ağ Logosu [24px * 24px]
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="FormAlaniIciUploadAlanlariIciDosyaAdiYazdirmaAlani"><img src="Resimler/IconDosyaYuklemeSiyah.png"><span id="SosyalAgLogosuDosyaAdiAlani" class="FormAlaniIciUploadAlanlariIciPathYazdirmaAlani"></span></div>
				<label class="FormAlaniIciUploadAlanlari">
					<input type="file" id="SosyalAgLogosu" name="SosyalAgLogosu" class="FormAlaniIciUploadInputlari" onChange="DosyaAdiYazdir('SosyalAgLogosu', 'SosyalAgLogosuDosyaAdiAlani', 'SosyalAgLogosuSecimIptalAlani')">
					<span class="FormAlaniIciUploadAlanlariIciGozAtAlani"><img src="Resimler/IconUploadSiyah.png"><span class="FormAlaniIciUploadAlanlariIciGozAtMetniAlani">Gözat</span></span>
				</label>
				<div id="SosyalAgLogosuSecimIptalAlani" class="FormAlaniIciUploadAlanlariIciIptalAlani" onClick="DosyaAdiSifirla('SosyalAgLogosu', 'SosyalAgLogosuDosyaAdiAlani', 'SosyalAgLogosuSecimIptalAlani')" style="display: none;">İptal</div>
			</div>
		</div>
	
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Sosyal Ağ Adı (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="SosyalAgAdi" name="SosyalAgAdi" value="<?php echo $SosyalAgBilgileriSorgusuKaydiSosyalAgAdi; ?>" class="FormAlaniIciTextInputlari" maxlength="100" tabindex="1">
			</div>
		</div>
		
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Sosyal Ağ Sayfası Linki (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<input type="text" id="SosyalAgSayfasiLinki" name="SosyalAgSayfasiLinki" onKeyUp="LinkAlanlariIcinFiltrele('SosyalAgSayfasiLinki')" value="<?php echo $SosyalAgBilgileriSorgusuKaydiSosyalAgSayfasiLinki; ?>" class="FormAlaniIciTextInputlari" maxlength="255" tabindex="2">
			</div>
		</div>

		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Sıra Numarası (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="UcYuzPixselSinirliAlanKapsayicisi"><select id="SiraNumarasi" name="SiraNumarasi" class="FormAlaniIciSelectleri" tabindex="3">
					<?php
					$SonSiraNumarasiSorgusu					=	$VeritabaniBaglantisi->query("SELECT * FROM sosyalagayarlari ORDER BY SiraNumarasi DESC LIMIT 1");
					$SonSiraNumarasiSorgusuKayitSayisi		=	$SonSiraNumarasiSorgusu->num_rows;
						if($SonSiraNumarasiSorgusuKayitSayisi>0){
							$SonSiraNumarasiSorgusuKaydi	=	$SonSiraNumarasiSorgusu->fetch_assoc();
								$SonSiraNumarasiSorgusuKaydiSiraNumarasi	=	$SonSiraNumarasiSorgusuKaydi["SiraNumarasi"];
								$SonSiraNumarasi							=	$SonSiraNumarasiSorgusuKaydiSiraNumarasi;
						}else{
							header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=90");
							exit();
						}
				
					$DonguBaslangicDegeri	=	1;
					$DonguBitisDegeri		=	$SonSiraNumarasi;
				
					while($DonguBaslangicDegeri<=$DonguBitisDegeri){
					?>
						<option value="<?php echo $DonguBaslangicDegeri; ?>" <?php if($SosyalAgBilgileriSorgusuKaydiSiraNumarasi==$DonguBaslangicDegeri){ ?>selected="selected"<?php } ?>><?php echo $DonguBaslangicDegeri; ?></option>
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
				header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=90");
				exit();
			}	
	}else{
		header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=90");
		exit();
	}		
}else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>