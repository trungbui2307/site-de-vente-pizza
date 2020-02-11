<?php
include('auth/loader.php');
$uid = $idm->getRole();
$cid = $idm->getIdentity();
?>

<div class="menu">
		<ul>
			<li><a href="index.php">Accueil</a></li>
			<li><a href="index.php?produit=menu">Menu</a></li>
			<li><a href="login.php">Se connecter</a></li>
			<?php if($uid=='admin'){
			?>
			
			<li><a href="logout.php">Log out</a></li>
			<li><a href="admin/index.php">Adminitrateur</a></li>
			<li style="display: block;color: white;text-align: right;padding: 14px 16px;">Bonjour <?php echo $cid ?> votre rôle est: <?php echo $uid ?></li>
			<?php
			}else if($uid=='user'){
			?>
			
			<li><a href="logout.php">Log out</a></li>
			<li><a href="espaceclient.php">EspaceClient</a></li>
			<li style="display: block;color: white;text-align: right;padding: 14px 16px;">Bonjour <?php echo $cid ?> votre rôle est: <?php echo $uid ?></li>		
			<?php
		}
		?>
		</ul>
</div>