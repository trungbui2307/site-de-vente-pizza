
<?php

require("../auth/EtreAuthentifie.php");
include('../db_config.php');
$uid = $idm->getRole();
	if(isset($uid) && $uid == 'admin' ) {

?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type"; content="text/html"; charset="utf-8" />
    <title>Manager website</title>
   	<link rel="stylesheet" type="text/css" href="style/admin.css" />
</head>
<body>
	<div class="wrapper">
		<?php
			include('../db_config.php');
			include('modules/header.php');
			include('modules/menu.php');
			include('modules/content.php');
			
		?>
	</div>
</body>
<?php
}else{
	echo "Vous n'avez pas le droit d'accès à cette page.<br>";
}
?>
</html>
