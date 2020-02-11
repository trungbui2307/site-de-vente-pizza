
<?php
require("auth/EtreAuthentifie.php");
$title = 'Accueil';
include("header.php");

if($idm->getRole() =='admin'){
	header('location:admin/index.php');
}else{
	header('location:index.php');
}
?>



<?php





//echo "Escaped values: ".$e_($ci->idm->getIdentity());


include("footer.php");
?>