<?php

$page_title = "Espace Client";
include("header.php");
include('auth/loader.php');
?>
<link rel="stylesheet" type="text/css" href="style/admin.css" />
<div class="right">
		<?php
		$uid = $idm->getUid();
		if(isset($uid)) {

			try {
				
				require("db_config.php");

				$SQL = "SELECT COUNT(*) FROM commandes WHERE uid = $uid";
				$st = $db->prepare($SQL);
				$st->execute();

				$number = $st->fetchColumn();

				if($number == 0) {
					echo "Vous avez fait aucun d'achat.<br>";
					
					
				}
				else {
					$SQL = "SELECT * FROM commandes WHERE uid = $uid";
					$res = $db->query($SQL);
					?>
					<h3>Liste des achats effectués: </h3>
					<table width="100%" border="1">
						<tr>
							<th>ref</th>
							<th>date</th>
							<th>prix total</th>
						</tr>

						<?php
						foreach($res as $row) {
							?>

							<tr>
								<td><?php echo $row['ref'] ?></td>
								<td><?php echo $row['date'] ?></td>

								<td>
									<?php
									$rid = $row['rid'];
							$cid = $row['cid'];
							$prix_rid = 0;
							$prix_sid = 0;
							$SQL1 = "SELECT recettes.prix FROM commandes INNER JOIN recettes ON commandes.rid = recettes.rid WHERE commandes.rid = $rid ";
							$res1 = $db->query($SQL1);

							foreach($res1 as $row1) {
							$prix_rid = $row1['prix'];
							}

							
							$SQL2 = "SELECT supplements.prix FROM supplements INNER JOIN extras ON supplements.sid = extras.sid WHERE extras.cid = $cid";
							$st = $db->query($SQL2);
							

							foreach($st as $row2) {
							$prix_sid = $prix_sid+$row2['prix'];
							}
							

									$total = $prix_sid + $prix_rid;

									echo $total."€";
									?>
								</td>
							</tr>

							<?php } ?>
						</table>
						<?php
					}
					$db = null; 
				}

				catch (PDOException $e) {
					echo "Erreur SQL: ".$e->getMessage(); 
				}

				?>
				<br>
				<a href='index.php'>Revenir</a> à la page d'accueil
				<?php
			} else {
				echo 'Veillez <a href="login.php">connecter</a> d\'abord.<br>';
			}
			?> 
</div> 
		<?php
		include "footer.php";
		?>
