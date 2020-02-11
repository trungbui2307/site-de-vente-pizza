<div class="left">
	<?php
	if (isset($_GET['ac'])) {
		$tam=$_GET['ac'];
	}else{
		$tam='';
	}if($tam=='ajouter'){
		include('modules/supplements/ajout_form.php');
	}if($tam=='modifier'){
		include('modules/supplements/mod_form.php');
	}
	?>
</div>
<div class="right">
	<?php
		include('modules/supplements/enumerer_sup.php');
	?>
</div>