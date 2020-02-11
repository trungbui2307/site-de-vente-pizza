<div class="content">
	<?php
		if(isset($_GET['manager'])){
			$tam=$_GET['manager'];
		}else{
			$tam='';
		}if($tam=='quanlypizza'){
			include('modules/pizza/main.php');
		}else if($tam=='quanlysupplements'){
			include('modules/supplements/main.php');
		}else if($tam=='quanlycommande'){
			include('modules/commandes/main.php');
		}
		?>
<div class="clear"></div>