<?php
session_start(); ob_start();
header("Content-Type:text/html; charset=UTF-8");
require_once("../Ayarlar/Ayarlar.php");
require_once("../Ayarlar/Fonksiyonlar.php");

$GelenUlkeIDsi				=	SayiliIcerikleriFiltrele($_REQUEST["UlkeIDsi"]);
$GelenMevcutUlkeIDsi		=	SayiliIcerikleriFiltrele($_REQUEST["MevcutUlkeIDsi"]);
$GelenMevcutSehirIDsi		=	SayiliIcerikleriFiltrele($_REQUEST["MevcutSehirIDsi"]);

$Sehirler				=	$VeritabaniBaglantisi->query("SELECT * FROM sehirler WHERE UlkeIDsi='$GelenUlkeIDsi' ORDER BY SiraNumarasi ASC");
$SehirlerKayitSayisi	=	$Sehirler->num_rows;
	if($SehirlerKayitSayisi>0){
?>
		<option value="" <?php if(($GelenMevcutUlkeIDsi==0) or (($GelenUlkeIDsi!=$GelenMevcutUlkeIDsi) or ($GelenMevcutSehirIDsi==0))){ ?>selected="selected"<?php } ?>></option>
<?php
		while($SehirlerKayitlari=$Sehirler->fetch_assoc()){
			$SehirlerKayitlariID			=	$SehirlerKayitlari["ID"];
			$SehirlerKayitlariSehirAdi		=	$SehirlerKayitlari["SehirAdi"];
?>
			<option value="<?php echo $SehirlerKayitlariID; ?>"	<?php if(($GelenMevcutUlkeIDsi!=0) and ($GelenUlkeIDsi==$GelenMevcutUlkeIDsi) and ($GelenMevcutSehirIDsi!=0) and ($GelenMevcutSehirIDsi==$SehirlerKayitlariID)){ ?>selected="selected"<?php } ?>><?php echo DonusumleriGeriDondur($SehirlerKayitlariSehirAdi); ?></option>
<?php
		}
	}else{
?>
	<option value="" selected="selected"></option>
<?php
	}
ob_end_flush();
$VeritabaniBaglantisi->close();
?>