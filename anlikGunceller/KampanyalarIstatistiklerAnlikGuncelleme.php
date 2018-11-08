<?php
session_start(); ob_start();
header("Content-Type:text/html; charset=UTF-8");
require_once("../Ayarlar/Ayarlar.php");
require_once("../Ayarlar/Fonksiyonlar.php");

$GelenID		=	SayiliIcerikleriFiltrele($_REQUEST["ID"]);
	if($GelenID!=""){
		$KampanyaBilgileriSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM kampanyalar WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
		$KampanyaBilgileriSorgusuKayitSayisi	=	$KampanyaBilgileriSorgusu->num_rows;
			if($KampanyaBilgileriSorgusuKayitSayisi>0){
				$KampanyaBilgileriSorgusuKaydi	=	$KampanyaBilgileriSorgusu->fetch_assoc();
					$KampanyaBilgileriSorgusuKaydiID									=	$KampanyaBilgileriSorgusuKaydi["ID"];
					$KampanyaBilgileriSorgusuKaydiGonderimBekleyenMailSayisi			=	$KampanyaBilgileriSorgusuKaydi["GonderimBekleyenMailSayisi"];
					$KampanyaBilgileriSorgusuKaydiGonderilenMailSayisi					=	$KampanyaBilgileriSorgusuKaydi["GonderilenMailSayisi"];
					$KampanyaBilgileriSorgusuKaydiAcilanMailSayisi						=	$KampanyaBilgileriSorgusuKaydi["AcilanMailSayisi"];
					$KampanyaBilgileriSorgusuKaydiMailAcilmaSayisi						=	$KampanyaBilgileriSorgusuKaydi["MailAcilmaSayisi"];
					$KampanyaBilgileriSorgusuKaydiIcerigineTiklananMailSayisi			=	$KampanyaBilgileriSorgusuKaydi["IcerigineTiklananMailSayisi"];
					$KampanyaBilgileriSorgusuKaydiMailIcerigineTiklanmaSayisi			=	$KampanyaBilgileriSorgusuKaydi["MailIcerigineTiklanmaSayisi"];					$KampanyaBilgileriSorgusuKaydiIzinsizGonderimBildirenKisiSayisi		=	$KampanyaBilgileriSorgusuKaydi["IzinsizGonderimBildirenKisiSayisi"];
?>
			<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($KampanyaBilgileriSorgusuKaydiGonderimBekleyenMailSayisi) ?>|<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($KampanyaBilgileriSorgusuKaydiGonderilenMailSayisi) ?>|<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($KampanyaBilgileriSorgusuKaydiAcilanMailSayisi) ?>|<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($KampanyaBilgileriSorgusuKaydiMailAcilmaSayisi) ?>|<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($KampanyaBilgileriSorgusuKaydiIcerigineTiklananMailSayisi) ?>|<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($KampanyaBilgileriSorgusuKaydiMailIcerigineTiklanmaSayisi) ?>|<?php echo SayiliIcerikleriOndalikHanesizNoktaliYaz($KampanyaBilgileriSorgusuKaydiIzinsizGonderimBildirenKisiSayisi) ?>
<?php
			}
	}
ob_end_flush();
$VeritabaniBaglantisi->close();
?>