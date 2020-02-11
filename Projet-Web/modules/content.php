<div class="content">

			<div class="left" >
				
				<?php
					if(isset($_GET['produit'])){
						$tam = $_GET['produit'];
					}else{
						$tam='';
					}
					if($tam=='menu' || $tam=='supplement' || $tam=='payer'){
						include('modules/left/cart.php');
					}
				
				?>
			</div>
			<div class="right">
				<?php
					if(isset($_GET['produit'])){
						$tam = $_GET['produit'];
					}else{
						$tam='';
					}
					if($tam=='menu'){
						include('modules/right/produits.php');
					}else if($tam=='supplement'){
						include('modules/right/supplement.php');
					}else if($tam=='payer'){
						include('modules/right/add_commande.php');
					}
				?>
			</div>
</div>
<div class="clear"></div>