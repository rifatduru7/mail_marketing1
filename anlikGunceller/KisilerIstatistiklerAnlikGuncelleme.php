<?php
session_start(); ob_start();
header("Content-Type:text/html; charset=UTF-8");
require_once("../Ayarlar/Ayarlar.php");
require_once("../Ayarlar/Fonksiyonlar.php");

$GelenID		=	SayiliIcerikleriFiltrele($_REQUEST["ID"]);
	if($GelenID!=""){
		$KisiBilgileriSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM kisiler WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
		$KisiBilgileriSorgusuKayitSayisi	=	$KisiBilgileriSorgusu->num_rows;
			if($KisiBilgileriSorgusuKayitSayisi>0){
				$KisiBilgileriSorgusuKaydi	=	$KisiBilgileriSorgusu->fetch_assoc();
					$KisiBilgileriSorgusuKaydiID									=	$KisiBilgileriSorgusuKaydi["ID"];
					$KisiBilgileriSorgusuKaydiGonderimBekleyenMailSayisi			=	$KisiBilgileriSorgusuKaydi["GonderimBekleyenMailSayisi"];
					$KisiBilgileriSorgusuKaydiGonderilenMailSayisi					=	$KisiBilgileriSorgusuKaydi["GonderilenMailSayisi"];
					$KisiBilgileriSorgusuKaydiAcilanMailSayisi						=	$KisiBilgileriSorgusuKaydi["AcilanMailSayisi"];
					$KisiBilgileriSorgusuKaydiMailAcilmaSayisi						=	$KisiBilgileriSorgusuKaydi["MailAcilmaSayisi"];
					$KisiBilgileriSorgusuKaydiIcerigineTiklananMailSayisi			=	$KisiBilgileriSorgusuKaydi["IcerigineTiklananMailSayisi"];
					$KisiBilgileriSorgusuKaydiMailIcerigineTiklanmaSayisi			=	$KisiBilgileriSorgusuKaydi["MailIcerigineTiklanmaSayisi"];					$KisiBilgileriSorgusuKaydiIzinsizGonderimBildirimiSayisi		=	$KisiBilgileriSorgusuKaydi["IzinsizGonderimBildirimiSayisi"];
?>
			<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($KisiBilgileriSorgusuKaydiGonderimBekleyenMailSayisi) ?>|<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($KisiBilgileriSorgusuKaydiGonderilenMailSayisi) ?>|<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($KisiBilgileriSorgusuKaydiAcilanMailSayisi) ?>|<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($KisiBilgileriSorgusuKaydiMailAcilmaSayisi) ?>|<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($KisiBilgileriSorgusuKaydiIcerigineTiklananMailSayisi) ?>|<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($KisiBilgileriSorgusuKaydiMailIcerigineTiklanmaSayisi) ?>|<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($KisiBilgileriSorgusuKaydiIzinsizGonderimBildirimiSayisi) ?>
<?php
			}
	}
ob_end_flush();
$VeritabaniBaglantisi->close();
?>