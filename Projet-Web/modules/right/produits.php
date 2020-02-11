<?php

$title = "Product";
?>

		<h1 style="font-size: 60px"> Liste des produits: </h1>

		<table>
			<tr>
				<th style="font-size:40px">Rid</th>
				<th style="font-size:40px">Nom</th>
				<th style="font-size:40px">Prix</th>
				<th style="font-size:40px">Action</th>
			</tr>

			<?php

			try {

				require("db_config.php");

				$SQL = "SELECT * FROM recettes";

				$res = $db->query($SQL);

				foreach ($res as $row) {
					?>
					<tr>
						<td style="text-indent: 180px"><?php echo $row['rid'] ?></td>
						<td><?php echo $row['nom'] ?></td>
						<td style="text-indent: 170px"><?php echo $row['prix'] ?></td>
						<td><a href="index.php?produit=supplement&rid=<?php echo $row['rid'] ?>">Ajouter au panier</a></td> 
					</tr>
					<?php 
				} 
					?>

				</table>

				<?php

				$db = null; 
			}

			catch (PDOException $e) {
				echo "Erreur SQL: ".$e->getMessage(); 
			}
			?>
			<br>
			<a href='index.php'>Revenir</a> à la page d'accueil





		
	