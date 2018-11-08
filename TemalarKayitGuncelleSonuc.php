<? if(isset($_SESSION["Yonetici"])){
	$GelenID									=	SayiliIcerikleriFiltrele($_REQUEST["ID"]);

	if($GelenID!=""){
		$GuncellenecekKaydinMevcutBilgileriSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM temalar WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
		$GuncellenecekKaydinMevcutBilgileriSorgusuKayitSayisi	=	$GuncellenecekKaydinMevcutBilgileriSorgusu->num_rows;				
			if($GuncellenecekKaydinMevcutBilgileriSorgusuKayitSayisi>0){
				$GuncellenecekKaydinMevcutBilgileriSorgusuKaydi		=	$GuncellenecekKaydinMevcutBilgileriSorgusu->fetch_assoc();
					$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi		=	$GuncellenecekKaydinMevcutBilgileriSorgusuKaydi["TemaTaslakDosyasi"];
					$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiLogosu					=	$GuncellenecekKaydinMevcutBilgileriSorgusuKaydi["Logosu"];
						$LogosuDosyasiIcinAdOlustur						=	substr($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiLogosu, 0, -4);
					$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiBirinciResimDosyasiAdi	=	$GuncellenecekKaydinMevcutBilgileriSorgusuKaydi["BirinciResimDosyasiAdi"];
						$BirinciResimDosyasiAdiDosyasiIcinAdOlustur		=	substr($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiBirinciResimDosyasiAdi, 0, -4);
						$BirinciResimDosyasiAdiDosyasiIcinUzanti		=	substr($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiBirinciResimDosyasiAdi, -4);
					$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiIkinciResimDosyasiAdi	=	$GuncellenecekKaydinMevcutBilgileriSorgusuKaydi["IkinciResimDosyasiAdi"];
						$IkinciResimDosyasiAdiDosyasiIcinAdOlustur		=	substr($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiIkinciResimDosyasiAdi, 0, -4);
						$IkinciResimDosyasiAdiDosyasiIcinUzanti			=	substr($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiIkinciResimDosyasiAdi, -4);
					$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiSiraNumarasi				=	$GuncellenecekKaydinMevcutBilgileriSorgusuKaydi["SiraNumarasi"];
	
				if(($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_003") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_004") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_007") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_008") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_009") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_010") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_011") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_012") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_013") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_014") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_015") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_016") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_017") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_018") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_019") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_020") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_021") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_022")){
					$BirinciResimGenislikDegeri			=	600;
					$BirinciResimYukseklikDegeri		=	450;
					$IkinciResimGenislikDegeri			=	0;
					$IkinciResimYukseklikDegeri			=	0;
				}


				if(($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_005") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_006") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_023") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_024") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_025") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_026") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_027") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_028") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_029") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_030") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_031") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_032") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_033") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_034") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_035") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_036") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_037") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_038")){
					$BirinciResimGenislikDegeri			=	295;
					$BirinciResimYukseklikDegeri		=	220;
					$IkinciResimGenislikDegeri			=	295;
					$IkinciResimYukseklikDegeri			=	220;
				}

				$GelenTemaAdi														=	IceriginIlkHarfiniBuyukYap(HarfliVeSayiliIcerikleriFiltrele($_REQUEST["TemaAdi"]));

				if(isset($_FILES["Logosu"])){
					$GelenLogosu													=	$_FILES["Logosu"];
				}else{
					$GelenLogosu													=	"";
				}

				$GelenLogoLinki														=	LinkliIcerikleriFiltrele($_REQUEST["LogoLinki"]);
					if($GelenLogoLinki!=""){
						if(LinkDogrulugunuOnEkZorunluKontrolEt($GelenLogoLinki)!=1){
							$GelenLogoLinki			=	"";
						}
					}
				$GelenSiraNumarasi													=	SayiliIcerikleriFiltrele($_REQUEST["SiraNumarasi"]);
				$GelenBaslikMetniBir												=	HarfliVeSayiliIcerikleriFiltrele($_REQUEST["BaslikMetniBir"]);
				$GelenBaslikMetniIki												=	HarfliVeSayiliIcerikleriFiltrele($_REQUEST["BaslikMetniIki"]);
				$GelenBaslikMetniUc													=	HarfliVeSayiliIcerikleriFiltrele($_REQUEST["BaslikMetniUc"]);
				$GelenBaslikMetniDort												=	HarfliVeSayiliIcerikleriFiltrele($_REQUEST["BaslikMetniDort"]);
				$GelenBaslikMetniBes												=	HarfliVeSayiliIcerikleriFiltrele($_REQUEST["BaslikMetniBes"]);

				if(isset($_REQUEST["IcerikMetniBir"])){
					$GelenIcerikMetniBir											=	EditorluIcerikleriFiltrele($_REQUEST["IcerikMetniBir"]);
				}else{
					$GelenIcerikMetniBir											=	"";
				}

				if(isset($_REQUEST["IcerikMetniIki"])){
					$GelenIcerikMetniIki											=	EditorluIcerikleriFiltrele($_REQUEST["IcerikMetniIki"]);
				}else{
					$GelenIcerikMetniIki											=	"";
				}

				if(isset($_REQUEST["IcerikMetniUc"])){
					$GelenIcerikMetniUc												=	EditorluIcerikleriFiltrele($_REQUEST["IcerikMetniUc"]);
				}else{
					$GelenIcerikMetniUc												=	"";
				}

				if(isset($_REQUEST["IcerikMetniDort"])){
					$GelenIcerikMetniDort											=	EditorluIcerikleriFiltrele($_REQUEST["IcerikMetniDort"]);
				}else{
					$GelenIcerikMetniDort											=	"";
				}

				if(isset($_REQUEST["IcerikMetniBes"])){
					$GelenIcerikMetniBes											=	EditorluIcerikleriFiltrele($_REQUEST["IcerikMetniBes"]);
				}else{
					$GelenIcerikMetniBes											=	"";
				}

				if((($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_001") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_002") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_007") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_008") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_009") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_010") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_011") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_012") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_013") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_014") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_015") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_016") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_017") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_018") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_019") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_020") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_021") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_022") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_023") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_024") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_025") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_026") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_027") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_028") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_029") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_030") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_031") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_032") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_033") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_034") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_035") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_036") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_037") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_038")) and ($GelenIcerikMetniBir=="")){
					header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=201");
					exit();
				}

				if(isset($_REQUEST["IcerikMetniBirinciButonMetni"])){
					$GelenIcerikMetniBirinciButonMetni								=	KucukHarfBuyukHarfDegistir(HarfliVeSayiliIcerikleriFiltrele($_REQUEST["IcerikMetniBirinciButonMetni"]));
				}else{
					$GelenIcerikMetniBirinciButonMetni								=	"";
				}

				if(isset($_REQUEST["IcerikMetniBirinciButonLinki"])){
					$GelenIcerikMetniBirinciButonLinki								=	LinkliIcerikleriFiltrele($_REQUEST["IcerikMetniBirinciButonLinki"]);
						if($GelenIcerikMetniBirinciButonLinki!=""){
							if(LinkDogrulugunuOnEkZorunluKontrolEt($GelenIcerikMetniBirinciButonLinki)!=1){
								$GelenIcerikMetniBirinciButonLinki					=	"";
							}
						}
				}else{
					$GelenIcerikMetniBirinciButonLinki								=	"";
				}

				if((($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_001") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_002") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_007") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_008") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_009") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_010") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_011") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_012") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_015") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_016") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_017") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_018") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_019") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_020") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_023") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_024") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_025") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_026") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_027") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_028") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_031") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_032") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_033") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_034") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_035") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_036")) and (($GelenIcerikMetniBirinciButonMetni=="") or ($GelenIcerikMetniBirinciButonLinki==""))){
					header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=201");
					exit();
				}

				if(isset($_REQUEST["IcerikMetniIkinciButonMetni"])){
					$GelenIcerikMetniIkinciButonMetni								=	KucukHarfBuyukHarfDegistir(HarfliVeSayiliIcerikleriFiltrele($_REQUEST["IcerikMetniIkinciButonMetni"]));
				}else{
					$GelenIcerikMetniIkinciButonMetni								=	"";
				}

				if(isset($_REQUEST["IcerikMetniIkinciButonLinki"])){
					$GelenIcerikMetniIkinciButonLinki								=	LinkliIcerikleriFiltrele($_REQUEST["IcerikMetniIkinciButonLinki"]);
						if($GelenIcerikMetniIkinciButonLinki!=""){
							if(LinkDogrulugunuOnEkZorunluKontrolEt($GelenIcerikMetniIkinciButonLinki)!=1){
								$GelenIcerikMetniIkinciButonLinki					=	"";
							}
						}
				}else{
					$GelenIcerikMetniIkinciButonLinki								=	"";
				}

				if((($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_002") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_008") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_011") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_012") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_016") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_019") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_020") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_024") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_027") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_028") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_032") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_035") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_036")) and (($GelenIcerikMetniIkinciButonMetni=="") or ($GelenIcerikMetniIkinciButonLinki==""))){
					header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=201");
					exit();
				}

				if(isset($_FILES["BirinciResimDosyasiAdi"])){
					$GelenBirinciResimDosyasiAdi									=	$_FILES["BirinciResimDosyasiAdi"];
				}else{
					$GelenBirinciResimDosyasiAdi									=	"";
				}

				if(isset($_REQUEST["BirinciResimLinki"])){
					$GelenBirinciResimLinki											=	LinkliIcerikleriFiltrele($_REQUEST["BirinciResimLinki"]);
						if($GelenBirinciResimLinki!=""){
							if(LinkDogrulugunuOnEkZorunluKontrolEt($GelenBirinciResimLinki)!=1){
								$GelenBirinciResimLinki								=	"";
							}
						}
				}else{
					$GelenBirinciResimLinki											=	"";
				}

				if(isset($_REQUEST["BirinciResimAltMetni"])){
					$GelenBirinciResimAltMetni										=	HarfliVeSayiliIcerikleriFiltrele($_REQUEST["BirinciResimAltMetni"]);
				}else{
					$GelenBirinciResimAltMetni										=	"";
				}

				if((($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_003") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_004") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_005") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_006") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_007") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_008") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_009") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_010") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_011") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_012") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_013") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_014") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_015") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_016") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_017") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_018") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_019") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_020") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_021") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_022") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_023") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_024") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_025") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_026") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_027") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_028") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_029") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_030") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_031") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_032") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_033") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_034") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_035") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_036") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_037") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_038")) and (($GelenBirinciResimLinki=="") or ($GelenBirinciResimAltMetni==""))){
					header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=201");
					exit();
				}

				if(isset($_REQUEST["BirinciResimBirinciButonMetni"])){
					$GelenBirinciResimBirinciButonMetni								=	KucukHarfBuyukHarfDegistir(HarfliVeSayiliIcerikleriFiltrele($_REQUEST["BirinciResimBirinciButonMetni"]));
				}else{
					$GelenBirinciResimBirinciButonMetni								=	"";
				}

				if(isset($_REQUEST["BirinciResimBirinciButonLinki"])){
					$GelenBirinciResimBirinciButonLinki								=	LinkliIcerikleriFiltrele($_REQUEST["BirinciResimBirinciButonLinki"]);
						if($GelenBirinciResimBirinciButonLinki!=""){
							if(LinkDogrulugunuOnEkZorunluKontrolEt($GelenBirinciResimBirinciButonLinki)!=1){
								$GelenBirinciResimBirinciButonLinki					=	"";
							}
						}
				}else{
					$GelenBirinciResimBirinciButonLinki								=	"";
				}

				if((($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_003") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_004") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_005") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_006") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_009") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_010") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_011") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_012") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_013") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_014") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_017") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_018") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_019") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_020") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_021") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_022") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_025") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_026") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_027") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_028") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_029") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_030") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_033") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_034") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_035") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_036") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_037") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_038")) and (($GelenBirinciResimBirinciButonMetni=="") or ($GelenBirinciResimBirinciButonLinki==""))){
					header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=201");
					exit();
				}

				if(isset($_REQUEST["BirinciResimIkinciButonMetni"])){
					$GelenBirinciResimIkinciButonMetni								=	KucukHarfBuyukHarfDegistir(HarfliVeSayiliIcerikleriFiltrele($_REQUEST["BirinciResimIkinciButonMetni"]));
				}else{
					$GelenBirinciResimIkinciButonMetni								=	"";
				}

				if(isset($_REQUEST["BirinciResimIkinciButonLinki"])){
					$GelenBirinciResimIkinciButonLinki								=	LinkliIcerikleriFiltrele($_REQUEST["BirinciResimIkinciButonLinki"]);
						if($GelenBirinciResimIkinciButonLinki!=""){
							if(LinkDogrulugunuOnEkZorunluKontrolEt($GelenBirinciResimIkinciButonLinki)!=1){
								$GelenBirinciResimIkinciButonLinki					=	"";
							}
						}
				}else{
					$GelenBirinciResimIkinciButonLinki								=	"";
				}

				if((($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_004") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_006") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_010") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_012") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_014") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_018") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_020") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_022") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_026") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_028") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_030") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_034") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_036") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_038")) and (($GelenBirinciResimIkinciButonMetni=="") or ($GelenBirinciResimIkinciButonLinki==""))){
					header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=201");
					exit();
				}

				if(isset($_FILES["IkinciResimDosyasiAdi"])){
					$GelenIkinciResimDosyasiAdi										=	$_FILES["IkinciResimDosyasiAdi"];
				}else{
					$GelenIkinciResimDosyasiAdi										=	"";
				}

				if(isset($_REQUEST["IkinciResimLinki"])){
					$GelenIkinciResimLinki											=	LinkliIcerikleriFiltrele($_REQUEST["IkinciResimLinki"]);
						if($GelenIkinciResimLinki!=""){
							if(LinkDogrulugunuOnEkZorunluKontrolEt($GelenIkinciResimLinki)!=1){
								$GelenIkinciResimLinki								=	"";
							}
						}
				}else{
					$GelenIkinciResimLinki											=	"";
				}

				if(isset($_REQUEST["IkinciResimAltMetni"])){
					$GelenIkinciResimAltMetni										=	HarfliVeSayiliIcerikleriFiltrele($_REQUEST["IkinciResimAltMetni"]);
				}else{
					$GelenIkinciResimAltMetni										=	"";
				}

				if((($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_005") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_006") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_023") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_024") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_025") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_026") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_027") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_028") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_029") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_030") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_031") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_032") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_033") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_034") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_035") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_036") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_037") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_038")) and (($GelenIkinciResimLinki=="") or ($GelenIkinciResimAltMetni==""))){
					header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=201");
					exit();
				}

				if(isset($_REQUEST["IkinciResimBirinciButonMetni"])){
					$GelenIkinciResimBirinciButonMetni								=	KucukHarfBuyukHarfDegistir(HarfliVeSayiliIcerikleriFiltrele($_REQUEST["IkinciResimBirinciButonMetni"]));
				}else{
					$GelenIkinciResimBirinciButonMetni								=	"";
				}

				if(isset($_REQUEST["IkinciResimBirinciButonLinki"])){
					$GelenIkinciResimBirinciButonLinki								=	LinkliIcerikleriFiltrele($_REQUEST["IkinciResimBirinciButonLinki"]);
						if($GelenIkinciResimBirinciButonLinki!=""){
							if(LinkDogrulugunuOnEkZorunluKontrolEt($GelenIkinciResimBirinciButonLinki)!=1){
								$GelenIkinciResimBirinciButonLinki					=	"";
							}
						}
				}else{
					$GelenIkinciResimBirinciButonLinki								=	"";
				}

				if((($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_005") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_006") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_025") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_026") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_027") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_028") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_029") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_030") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_033") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_034") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_035") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_036") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_037") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_038")) and (($GelenIkinciResimBirinciButonMetni=="") or ($GelenIkinciResimBirinciButonLinki==""))){
					header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=201");
					exit();
				}

				if(isset($_REQUEST["IkinciResimIkinciButonMetni"])){
					$GelenIkinciResimIkinciButonMetni								=	KucukHarfBuyukHarfDegistir(HarfliVeSayiliIcerikleriFiltrele($_REQUEST["IkinciResimIkinciButonMetni"]));
				}else{
					$GelenIkinciResimIkinciButonMetni								=	"";
				}

				if(isset($_REQUEST["IkinciResimIkinciButonLinki"])){
					$GelenIkinciResimIkinciButonLinki								=	LinkliIcerikleriFiltrele($_REQUEST["IkinciResimIkinciButonLinki"]);
						if($GelenIkinciResimIkinciButonLinki!=""){
							if(LinkDogrulugunuOnEkZorunluKontrolEt($GelenIkinciResimIkinciButonLinki)!=1){
								$GelenIkinciResimIkinciButonLinki					=	"";
							}
						}
				}else{
					$GelenIkinciResimIkinciButonLinki								=	"";
				}

				if((($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_006") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_026") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_028") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_030") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_034") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_036") or ($GuncellenecekKaydinMevcutBilgileriSorgusuKaydiTemaTaslakDosyasi=="Tema_038")) and (($GelenIkinciResimIkinciButonMetni=="") or ($GelenIkinciResimIkinciButonLinki==""))){
					header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=201");
					exit();
				}

				if(($GelenTemaAdi!="") and ($GelenLogoLinki!="") and ($GelenSiraNumarasi!="") and ($GelenBaslikMetniBir!="")){	
					$EsKayitKontrolSorgusu				=	$VeritabaniBaglantisi->query("SELECT * FROM temalar WHERE ID!='$GelenID' AND TemaAdi='$GelenTemaAdi' ORDER BY ID ASC LIMIT 1");
					$EsKayitKontrolSorgusuKayitSayisi	=	$EsKayitKontrolSorgusu->num_rows;
						if($EsKayitKontrolSorgusuKayitSayisi<1){
							$KayitGuncelle		=	$VeritabaniBaglantisi->query("UPDATE temalar SET TemaAdi='$GelenTemaAdi', LogoLinki='$GelenLogoLinki', BaslikMetniBir='$GelenBaslikMetniBir', BaslikMetniIki='$GelenBaslikMetniIki', BaslikMetniUc='$GelenBaslikMetniUc', BaslikMetniDort='$GelenBaslikMetniDort', BaslikMetniBes='$GelenBaslikMetniBes', IcerikMetniBir='$GelenIcerikMetniBir', IcerikMetniIki='$GelenIcerikMetniIki', IcerikMetniUc='$GelenIcerikMetniUc', IcerikMetniDort='$GelenIcerikMetniDort', IcerikMetniBes='$GelenIcerikMetniBes',  IcerikMetniBirinciButonMetni='$GelenIcerikMetniBirinciButonMetni', IcerikMetniBirinciButonLinki='$GelenIcerikMetniBirinciButonLinki', IcerikMetniIkinciButonMetni='$GelenIcerikMetniIkinciButonMetni', IcerikMetniIkinciButonLinki='$GelenIcerikMetniIkinciButonLinki', BirinciResimLinki='$GelenBirinciResimLinki', BirinciResimAltMetni='$GelenBirinciResimAltMetni', BirinciResimBirinciButonMetni='$GelenBirinciResimBirinciButonMetni', BirinciResimBirinciButonLinki='$GelenBirinciResimBirinciButonLinki', BirinciResimIkinciButonMetni='$GelenBirinciResimIkinciButonMetni', BirinciResimIkinciButonLinki='$GelenBirinciResimIkinciButonLinki', IkinciResimLinki='$GelenIkinciResimLinki', IkinciResimAltMetni='$GelenIkinciResimAltMetni', IkinciResimBirinciButonMetni='$GelenIkinciResimBirinciButonMetni', IkinciResimBirinciButonLinki='$GelenIkinciResimBirinciButonLinki', IkinciResimIkinciButonMetni='$GelenIkinciResimIkinciButonMetni', IkinciResimIkinciButonLinki='$GelenIkinciResimIkinciButonLinki', SiraNumarasi='$GelenSiraNumarasi' WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
								if($KayitGuncelle){
									if($GelenSiraNumarasi!=$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiSiraNumarasi){
										if($GelenSiraNumarasi<=$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiSiraNumarasi){
											$DigerKayitlarinSiraNumaralariniGuncelle	=	$VeritabaniBaglantisi->query("UPDATE temalar SET SiraNumarasi=SiraNumarasi+1 WHERE ID!='$GelenID' AND SiraNumarasi>='$GelenSiraNumarasi' AND SiraNumarasi<'$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiSiraNumarasi' ORDER BY ID ASC");
												if(!$DigerKayitlarinSiraNumaralariniGuncelle){
													header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=201");
													exit();
												}
										}

										if($GelenSiraNumarasi>=$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiSiraNumarasi){
											$DigerKayitlarinSiraNumaralariniGuncelle	=	$VeritabaniBaglantisi->query("UPDATE temalar SET SiraNumarasi=SiraNumarasi-1 WHERE ID!='$GelenID' AND SiraNumarasi<='$GelenSiraNumarasi' AND SiraNumarasi>'$GuncellenecekKaydinMevcutBilgileriSorgusuKaydiSiraNumarasi' ORDER BY ID ASC");
												if(!$DigerKayitlarinSiraNumaralariniGuncelle){
													header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=201");
													exit();
												}
										}
									}
									
									if($GelenLogosu!=""){
										if(($GelenLogosu["name"]!="") and ($GelenLogosu["type"]!="") and ($GelenLogosu["tmp_name"]!="") and ($GelenLogosu["error"]==0) and ($GelenLogosu["size"]>0)){
											$LogosuDosyaAdiOlustur					=	$LogosuDosyasiIcinAdOlustur;
											$LogosuDosyaAdi							=	$GelenLogosu["name"];
											$LogosuDosyaUzantisiKontrolEt			=	substr($LogosuDosyaAdi, -4);
												if(($LogosuDosyaUzantisiKontrolEt==".png") or ($LogosuDosyaUzantisiKontrolEt==".PNG")){
													$LogosuDosyaUzantisi			=	$LogosuDosyaUzantisiKontrolEt;
													$LogosuYeniDosyaAdi				=	$LogosuDosyaAdiOlustur.$LogosuDosyaUzantisi;

													$LogosuYukle				=	new upload($GelenLogosu, 'tr-TR');
														if($LogosuYukle->uploaded){
															$LogosuYukle->mime_magic_check				=	true;
															$LogosuYukle->allowed						=	array("image/*");
															$LogosuYukle->file_new_name_body			=	$LogosuDosyaAdiOlustur;
															$LogosuYukle->file_auto_rename				=	false;
															$LogosuYukle->file_overwrite				=	true;								
															$LogosuYukle->image_background_color		=	null;
															$LogosuYukle->image_resize					=	true;
															$LogosuYukle->image_x						=	201;
															$LogosuYukle->image_y						=	54;
															$LogosuYukle->process(SITEKOKDIZINI."Resimler/");
																if($LogosuYukle->processed){
																	$LogosuYukle->clean();

																	$LogosuIcinKayitGuncelle		=	$VeritabaniBaglantisi->query("UPDATE temalar SET Logosu='$LogosuYeniDosyaAdi' WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
																		if(!$LogosuIcinKayitGuncelle){
																			header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=201");
																			exit();
																		}
																}else{
																	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=201");
																	exit();
																}
														}else{
															header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=201");
															exit();
														}
												}else{
													header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=201");
													exit();
												}
										}
										
									}									
									
									if($GelenBirinciResimDosyasiAdi!=""){
										if(($GelenBirinciResimDosyasiAdi["name"]!="") and ($GelenBirinciResimDosyasiAdi["type"]!="") and ($GelenBirinciResimDosyasiAdi["tmp_name"]!="") and ($GelenBirinciResimDosyasiAdi["error"]==0) and ($GelenBirinciResimDosyasiAdi["size"]>0)){
											$BirinciResimDosyaAdiOlustur					=	$BirinciResimDosyasiAdiDosyasiIcinAdOlustur;
											$BirinciResimDosyaAdi							=	$GelenBirinciResimDosyasiAdi["name"];
											$BirinciResimDosyaUzantisiKontrolEt				=	substr($BirinciResimDosyaAdi, -4);
												if(($BirinciResimDosyaUzantisiKontrolEt==".jpg") or ($BirinciResimDosyaUzantisiKontrolEt==".JPG") or ($BirinciResimDosyaUzantisiKontrolEt=="jpeg") or ($BirinciResimDosyaUzantisiKontrolEt=="JPEG") or ($BirinciResimDosyaUzantisiKontrolEt==".png") or ($BirinciResimDosyaUzantisiKontrolEt==".PNG") or ($BirinciResimDosyaUzantisiKontrolEt==".gif") or ($BirinciResimDosyaUzantisiKontrolEt==".GIF") or ($BirinciResimDosyaUzantisiKontrolEt==".bmp") or ($BirinciResimDosyaUzantisiKontrolEt==".BMP")){		
													$BirinciResimDosyasiAdiNoktasizDosyaUzantisi	=	substr($BirinciResimDosyasiAdiDosyasiIcinUzanti, -3);
													$BirinciResimDosyasiAdiDosyaUzantisi			=	$BirinciResimDosyasiAdiDosyasiIcinUzanti;
													$BirinciResimDosyasiAdiYeniDosyaAdi				=	$BirinciResimDosyaAdiOlustur.$BirinciResimDosyasiAdiDosyaUzantisi;

													if($BirinciResimDosyasiAdiDosyasiIcinUzanti!=$BirinciResimDosyaUzantisiKontrolEt){
														$BirinciResimConvertDurumu						=	1;
													}else{
														$BirinciResimConvertDurumu						=	0;
													}

													$BirinciResimDosyasiAdiYukle				=	new upload($GelenBirinciResimDosyasiAdi, 'tr-TR');
														if($BirinciResimDosyasiAdiYukle->uploaded){
															$BirinciResimDosyasiAdiYukle->mime_magic_check				=	true;
															$BirinciResimDosyasiAdiYukle->allowed						=	array("image/*");
															$BirinciResimDosyasiAdiYukle->file_new_name_body			=	$BirinciResimDosyaAdiOlustur;
															$BirinciResimDosyasiAdiYukle->file_auto_rename				=	false;
															$BirinciResimDosyasiAdiYukle->file_overwrite				=	true;																	

															if($BirinciResimConvertDurumu==1){
																$BirinciResimDosyasiAdiYukle->image_convert				=	$BirinciResimDosyasiAdiNoktasizDosyaUzantisi;
																$BirinciResimDosyasiAdiYukle->image_quality				=	100;
															}
															$BirinciResimDosyasiAdiYukle->image_background_color		=	"#FFFFFF";
															$BirinciResimDosyasiAdiYukle->image_resize					=	true;
															$BirinciResimDosyasiAdiYukle->image_x						=	$BirinciResimGenislikDegeri;
															$BirinciResimDosyasiAdiYukle->image_y						=	$BirinciResimYukseklikDegeri;
															$BirinciResimDosyasiAdiYukle->process(SITEKOKDIZINI."Resimler/");
																if($BirinciResimDosyasiAdiYukle->processed){
																	$BirinciResimDosyasiAdiYukle->clean();

																	$BirinciResimDosyasiIcinKayitGuncelle		=	$VeritabaniBaglantisi->query("UPDATE temalar SET BirinciResimDosyasiAdi='$BirinciResimDosyasiAdiYeniDosyaAdi' WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
																		if(!$BirinciResimDosyasiIcinKayitGuncelle){
																			header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=201");
																			exit();
																		}
																}else{
																	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=201");
																	exit();
																}
														}else{
															header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=201");
															exit();
														}
												}else{
													header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=201");
													exit();
												}
										}
									}
									
									if($GelenIkinciResimDosyasiAdi!=""){
										if(($GelenIkinciResimDosyasiAdi["name"]!="") and ($GelenIkinciResimDosyasiAdi["type"]!="") and ($GelenIkinciResimDosyasiAdi["tmp_name"]!="") and ($GelenIkinciResimDosyasiAdi["error"]==0) and ($GelenIkinciResimDosyasiAdi["size"]>0)){
											$IkinciResimDosyaAdiOlustur					=	$IkinciResimDosyasiAdiDosyasiIcinAdOlustur;
											$IkinciResimDosyaAdi						=	$GelenIkinciResimDosyasiAdi["name"];
											$IkinciResimDosyaUzantisiKontrolEt			=	substr($IkinciResimDosyaAdi, -4);
												if(($IkinciResimDosyaUzantisiKontrolEt==".jpg") or ($IkinciResimDosyaUzantisiKontrolEt==".JPG") or ($IkinciResimDosyaUzantisiKontrolEt=="jpeg") or ($IkinciResimDosyaUzantisiKontrolEt=="JPEG") or ($IkinciResimDosyaUzantisiKontrolEt==".png") or ($IkinciResimDosyaUzantisiKontrolEt==".PNG") or ($IkinciResimDosyaUzantisiKontrolEt==".gif") or ($IkinciResimDosyaUzantisiKontrolEt==".GIF") or ($IkinciResimDosyaUzantisiKontrolEt==".bmp") or ($IkinciResimDosyaUzantisiKontrolEt==".BMP")){		
													$IkinciResimDosyasiAdiNoktasizDosyaUzantisi	=	substr($IkinciResimDosyasiAdiDosyasiIcinUzanti, -3);
													$IkinciResimDosyasiAdiDosyaUzantisi			=	$IkinciResimDosyasiAdiDosyasiIcinUzanti;
													$IkinciResimDosyasiAdiYeniDosyaAdi			=	$IkinciResimDosyaAdiOlustur.$IkinciResimDosyasiAdiDosyaUzantisi;

													if($IkinciResimDosyasiAdiDosyasiIcinUzanti!=$IkinciResimDosyaUzantisiKontrolEt){
														$IkinciResimConvertDurumu						=	1;
													}else{
														$IkinciResimConvertDurumu						=	0;
													}

													$IkinciResimDosyasiAdiYukle				=	new upload($GelenIkinciResimDosyasiAdi, 'tr-TR');
														if($IkinciResimDosyasiAdiYukle->uploaded){
															$IkinciResimDosyasiAdiYukle->mime_magic_check				=	true;
															$IkinciResimDosyasiAdiYukle->allowed						=	array("image/*");
															$IkinciResimDosyasiAdiYukle->file_new_name_body				=	$IkinciResimDosyaAdiOlustur;
															$IkinciResimDosyasiAdiYukle->file_auto_rename				=	false;
															$IkinciResimDosyasiAdiYukle->file_overwrite					=	true;																	

															if($IkinciResimConvertDurumu==1){
																$IkinciResimDosyasiAdiYukle->image_convert				=	$IkinciResimDosyasiAdiNoktasizDosyaUzantisi;
																$IkinciResimDosyasiAdiYukle->image_quality				=	100;
															}
															$IkinciResimDosyasiAdiYukle->image_background_color			=	"#FFFFFF";
															$IkinciResimDosyasiAdiYukle->image_resize					=	true;
															$IkinciResimDosyasiAdiYukle->image_x						=	$IkinciResimGenislikDegeri;
															$IkinciResimDosyasiAdiYukle->image_y						=	$IkinciResimYukseklikDegeri;
															$IkinciResimDosyasiAdiYukle->process(SITEKOKDIZINI."Resimler/");
																if($IkinciResimDosyasiAdiYukle->processed){
																	$IkinciResimDosyasiAdiYukle->clean();

																	$IkinciResimDosyasiIcinKayitGuncelle		=	$VeritabaniBaglantisi->query("UPDATE temalar SET IkinciResimDosyasiAdi='$IkinciResimDosyasiAdiYeniDosyaAdi' WHERE ID='$GelenID' ORDER BY ID ASC LIMIT 1");
																		if(!$IkinciResimDosyasiIcinKayitGuncelle){
																			header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=201");
																			exit();
																		}
																}else{
																	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=201");
																	exit();
																}
														}else{
															header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=201");
															exit();
														}
												}else{
													header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=201");
													exit();
												}
										}
									}
				
									header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=200");
									exit();									
								}else{
									header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=201");
									exit();
								}
						}else{
							header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=202");
							exit();
						}
				}else{
					header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=201");
					exit();
				}
			}else{
				header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=201");
				exit();
			}
	}else{
		header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php?S=0&SS=201");
		exit();
	}
}else{
	header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
	exit();
} ?>