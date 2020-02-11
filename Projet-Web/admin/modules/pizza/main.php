<div class="left">
	<?php
	if (isset($_GET['ac'])) {
		$tam=$_GET['ac'];
	}else{
		$tam='';
	}if($tam=='ajouter'){
		include('modules/pizza/ajouter_form.php');
	}if($tam=='modifier'){
		include('modules/pizza/modifier_form.php');
	}
	?>
</div>
<div class="right">
	<?php
		include('modules/pizza/enumerer.php');
	?>
</div>