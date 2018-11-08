<? if(isset($_SESSION["Yonetici"])){ ?>
<script type="text/javascript" language="javascript">
	function SecimAlaniGoster(AlanDegeri, MetinDegeri){
		var IslemYapilacakAlan		=	AlanDegeri;
		var IslemYapilacakMetin		=	MetinDegeri;
		
		document.getElementById(IslemYapilacakAlan).style.opacity		=	"0.25";
		document.getElementById(IslemYapilacakMetin).style.opacity		=	"1";
	}

	function SecimAlaniGizle(AlanDegeri, MetinDegeri){
		var IslemYapilacakAlan		=	AlanDegeri;
		var IslemYapilacakMetin		=	MetinDegeri;
		
		document.getElementById(IslemYapilacakAlan).style.opacity		=	"0";
		document.getElementById(IslemYapilacakMetin).style.opacity		=	"0";
	}
</script>	
	
<div id="FormAlaniKapsayicisi">
	<div class="SayfaIciBaslikAlanlariKapsayicisi">
		<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=190" target="_top">Temalar</a> > Yeni Kayıt Ekle > Taslak Seçimi
	</div>
	
	<div class="FormAlaniIciTaslakAlanlariGenelKapsayicisi">
	<?php
	$TemaSayisi				=	38;
	$DonguBaslangicSayisi	=	1;
	
	while($DonguBaslangicSayisi<=$TemaSayisi){
		$DonguBaslangicSayisiKarakterUzunlugu		=	strlen($DonguBaslangicSayisi);
			if($DonguBaslangicSayisiKarakterUzunlugu==1){
				$TemaDosyaAdiYaz			=	"Tema_00".$DonguBaslangicSayisi.".jpg";
				$TemaAltVeTitleMetniYaz		=	"Tema 00".$DonguBaslangicSayisi;
			}elseif($DonguBaslangicSayisiKarakterUzunlugu==2){
				$TemaDosyaAdiYaz			=	"Tema_0".$DonguBaslangicSayisi.".jpg";
				$TemaAltVeTitleMetniYaz		=	"Tema 0".$DonguBaslangicSayisi;
			}elseif($DonguBaslangicSayisiKarakterUzunlugu==3){
				$TemaDosyaAdiYaz			=	"Tema_".$DonguBaslangicSayisi.".jpg";
				$TemaAltVeTitleMetniYaz		=	"Tema ".$DonguBaslangicSayisi;
			}
	?>
		<div class="FormAlaniIciTaslakAlanlariKapsayicisi" onMouseOver="SecimAlaniGoster('KarartmaAlani<?php echo $DonguBaslangicSayisi; ?>', 'MetinAlani<?php echo $DonguBaslangicSayisi; ?>')" onMouseOut="SecimAlaniGizle('KarartmaAlani<?php echo $DonguBaslangicSayisi; ?>', 'MetinAlani<?php echo $DonguBaslangicSayisi; ?>')">
			<div class="FormAlaniIciTaslakResmiAlanlariKapsayicisi">
				<img src="Resimler/<?php echo DonusumleriGeriDondur($TemaDosyaAdiYaz); ?>" width="300" height="400" alt="<?php echo DonusumleriGeriDondur($TemaAltVeTitleMetniYaz); ?>" title="<?php echo DonusumleriGeriDondur($TemaAltVeTitleMetniYaz); ?>">
			</div>
			<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=193&ID=<?php echo $DonguBaslangicSayisi; ?>"><div id="KarartmaAlani<?php echo $DonguBaslangicSayisi; ?>" class="FormAlaniIciKarartmaliTaslakResmiAlanlariKapsayicisi"></div></a>
			<a href="http://www.<?php echo SITEDOMAINI.SITEDIZINI; ?>/index.php?S=0&SS=193&ID=<?php echo $DonguBaslangicSayisi; ?>"><div id="MetinAlani<?php echo $DonguBaslangicSayisi; ?>" class="FormAlaniIciKarartmaliTaslakResmiAlanlariMetni">KULLAN</div></a>
		</div>
	<?php
		$DonguBaslangicSayisi++;
	}
	?>
	</div>
</div>
<?php }else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>