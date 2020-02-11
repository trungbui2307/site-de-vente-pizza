

<?php
require_once('../auth/EtreAuthentifie.php');
$uid = $idm->getRole();
	if(isset($uid) && $uid == 'admin' ) {
		?>
		<h1>Liste des commandes: </h1>

		<?php

		try {

			require("../db_config.php");
			$SQL = "SELECT * FROM commandes";
			$res = $db->query($SQL);
			
			?>

			<table width="100%" border="1">
				<tr>
					<th>cid</th>
					<th>ref</th>
					<th>uid</th>
					<th>rid</th>
					<th>date</th>
					<th>prix total</th>
					<th>statut</th>
				</tr>

				<?php
				foreach($res as $row) {
					?>

					<tr>
						<td><?php echo $row['cid'] ?></td>
						<td><?php echo $row['ref'] ?></td>
						<td><?php echo $row['uid'] ?></td>
						<td><?php echo $row['rid'] ?></td>
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

						<td><?php echo $row['statut']?></td>
					</tr>

					<?php } ?>
				</table>
				
				<?php

				$db = null; 
			}

			catch (PDOException $e) {
				echo "Erreur SQL: ".$e->getMessage(); 
			}
		} else {
			echo "Vous n'avez pas le droit d'accès à cette page.<br>";
			echo "<a href='../../index.php'>Revenir</a> à la page d'accueil";
		}


?>
</table>