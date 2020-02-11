<?php

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type"; content="text/html"; charset="utf-8" />
    <title>NekoPizza</title>
   	<link rel="stylesheet" type="text/css" href="style/style.css" />
</head>
<body>
	
	<div class="wrapper">
		<?php
			include('db_config.php');
			include('modules/header.php');
			include('modules/menu.php');
			include('modules/content.php');
			include('modules/footer.php');
		?>
	</div>
</body>
</html>
