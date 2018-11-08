<? if(isset($_SESSION["Yonetici"])){
	$GelenID												=	SayiliIcerikleriFiltrele($_REQUEST["ID"]);

	if($GelenID!=""){
		$EMailHesapBilgileriSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM emailhesapayarlari WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
		$EMailHesapBilgileriSorgusuKayitSayisi	=	$EMailHesapBilgileriSorgusu->num_rows;
			if($EMailHesapBilgileriSorgusuKayitSayisi>0){
				$EMailHesapBilgileriSorgusuKaydi	=	$EMailHesapBilgileriSorgusu->fetch_assoc();
					$EMailHesapBilgileriSorgusuKaydiEMailAdresi			=	$EMailHesapBilgileriSorgusuKaydi["EMailAdresi"];
					$EMailHesapBilgileriSorgusuKaydiCalismaDurumu		=	$EMailHesapBilgileriSorgusuKaydi["CalismaDurumu"];
?>
<script type="text/javascript" language="javascript">
	function DinlendirilmeFormKontrol(){
		if(document.DinlendirilmeFormu.DinlendirmeSuresi.value==""){
			document.getElementById("ModalMetinAlani").innerHTML			=	"Dinlendirme formu dahilinde bulunan, \"Dinlendirilmeler Süresi\" değeri boş bırakılamaz. Lütfen geçerli bir \"Dinlendirilmeler Süresi\" değeri seçiniz.";
			ModalAc();
			return;
		}
	
		document.DinlendirilmeFormu.submit();
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
	<form id="DinlendirilmeFormu" name="DinlendirilmeFormu" action="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=127&ID=<?php echo $GelenID; ?>" method="POST">
		<div class="SayfaIciBaslikAlanlariKapsayicisi">
			<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=109" target="_top">E-Mail Hesapları</a> > Kayıt Dinlendir
		</div>

		<div class="SayfaIciSerbestSatirAlanlariKapsayicisi">
			<div class="SayfaIciSerbestSatirAlanlariSolMetinAlanlariKapsayicisi">
				E-Mail Adresi
			</div>
			<div class="SayfaIciSerbestSatirAlanlariSagMetinAlanlariKapsayicisi">
				<a href="mailto:<?php echo DonusumleriGeriDondur($EMailHesapBilgileriSorgusuKaydiEMailAdresi); ?>"><?php if($EMailHesapBilgileriSorgusuKaydiCalismaDurumu==0){ ?><span class="TuruncuYazi"><?php }else{ ?><span><?php } ?><?php echo DonusumleriGeriDondur($EMailHesapBilgileriSorgusuKaydiEMailAdresi); ?></span></a>
			</div>
		</div>
			
		<div class="SayfaIciSatirAlanlariKapsayicisi">
			<div class="SayfaIciSatirAlanlariSolMetinAlanlariKapsayicisi">
				Dinlendirilmeler Süresi (<span class="KirmiziYazi">*</span>)
			</div>
			<div class="SayfaIciSatirAlanlariSagFormElemanlariAlanlariKapsayicisi">
				<div class="UcYuzPixselSinirliAlanKapsayicisi"><select id="DinlendirmeSuresi" name="DinlendirmeSuresi" class="FormAlaniIciSelectleri" tabindex="1">
					<option value=""></option>
					<option value="1 Saat">1 Saat</option>
					<option value="2 Saat">2 Saat</option>
					<option value="3 Saat">3 Saat</option>
					<option value="4 Saat">4 Saat</option>
					<option value="5 Saat">5 Saat</option>
					<option value="6 Saat">6 Saat</option>
					<option value="7 Saat">7 Saat</option>
					<option value="8 Saat">8 Saat</option>
					<option value="9 Saat">9 Saat</option>
					<option value="10 Saat">10 Saat</option>
					<option value="11 Saat">11 Saat</option>
					<option value="12 Saat">12 Saat</option>
					<option value="13 Saat">13 Saat</option>
					<option value="14 Saat">14 Saat</option>
					<option value="15 Saat">15 Saat</option>
					<option value="16 Saat">16 Saat</option>
					<option value="17 Saat">17 Saat</option>
					<option value="18 Saat">18 Saat</option>
					<option value="19 Saat">19 Saat</option>
					<option value="20 Saat">20 Saat</option>
					<option value="21 Saat">21 Saat</option>
					<option value="22 Saat">22 Saat</option>
					<option value="23 Saat">23 Saat</option>
					<option value="1 Gün">1 Gün</option>
					<option value="2 Gün">2 Gün</option>
					<option value="3 Gün">3 Gün</option>
					<option value="4 Gün">4 Gün</option>
					<option value="5 Gün">5 Gün</option>
					<option value="6 Gün">6 Gün</option>
					<option value="7 Gün">7 Gün</option>
					<option value="8 Gün">8 Gün</option>
					<option value="9 Gün">9 Gün</option>
					<option value="10 Gün">10 Gün</option>
					<option value="11 Gün">11 Gün</option>
					<option value="12 Gün">12 Gün</option>
					<option value="13 Gün">13 Gün</option>
					<option value="14 Gün">14 Gün</option>
					<option value="15 Gün">15 Gün</option>
					<option value="16 Gün">16 Gün</option>
					<option value="17 Gün">17 Gün</option>
					<option value="18 Gün">18 Gün</option>
					<option value="19 Gün">19 Gün</option>
					<option value="20 Gün">20 Gün</option>
					<option value="21 Gün">21 Gün</option>
					<option value="22 Gün">22 Gün</option>
					<option value="23 Gün">23 Gün</option>
					<option value="24 Gün">24 Gün</option>
					<option value="25 Gün">25 Gün</option>
					<option value="26 Gün">26 Gün</option>
					<option value="27 Gün">27 Gün</option>
					<option value="28 Gün">28 Gün</option>
					<option value="29 Gün">29 Gün</option>
					<option value="1 Ay">1 Ay</option>
				</select></div>
			</div>
		</div>	
			
		<div class="SayfaIciButonlarIcinSatirAlanlariKapsayicisi">
			<input type="button" value="Dinlendir" class="FormAlaniIciDinlendirButonlari" onClick="DinlendirilmeFormKontrol()" tabindex="2">
		</div>
	</form>
</div>
<?php
			}else{
				header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=109");
				exit();
			}
	}else{
		header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=109");
		exit();
	}
}else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>