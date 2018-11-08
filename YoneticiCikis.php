<?php
unset($_SESSION["Yonetici"]);
session_destroy();

header("Location:http://www.".SITEDOMAINI.SITEDIZINI."/index.php");
exit();
?>