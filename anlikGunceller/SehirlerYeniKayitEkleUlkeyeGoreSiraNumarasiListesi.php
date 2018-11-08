<?php
session_start(); ob_start();
header("Content-Type:text/html; charset=UTF-8");
require_once("../Ayarlar/Ayarlar.php");
require_once("../Ayarlar/Fonksiyonlar.php");

$GelenUlkeIDsi		=	SayiliIcerikleriFiltrele($_REQUEST["UlkeIDsi"]);

$Sehirler				=	$VeritabaniBaglantisi->query("SELECT * FROM sehirler WHERE UlkeIDsi='$GelenUlkeIDsi'");
$SehirlerKayitSayisi	=	$Sehirler->num_rows;
	if($SehirlerKayitSayisi>0){
		$BaslangicDegeri	=	1;
		$BitisDegeri		=	$SehirlerKayitSayisi+1;
		
		while($BaslangicDegeri<=$BitisDegeri){
?>		
			<option value="<?php echo $BaslangicDegeri; ?>" <?php if($BaslangicDegeri==$BitisDegeri){ ?>selected="selected"<?php } ?>><?php echo $BaslangicDegeri; ?></option>	
<?php
			$BaslangicDegeri++;
		}
	}else{
?>
	<option value="1" selected="selected">1</option>
<?php
	}
ob_end_flush();
$VeritabaniBaglantisi->close();
?>