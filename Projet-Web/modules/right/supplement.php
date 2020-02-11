
<?php

$title = "Supplement";
if(isset($_GET['rid'])){
$_SESSION['rid'] = $_GET['rid'];
}

///////////////////////////////////////////////////////////////////////////

if(isset($_GET['sid'])) {

	$sid=intval($_GET['sid']);

	if(isset($_GET['ajout_rpt'])) {
		$rpt = $_GET['ajout_rpt'];
	} else {
		$rpt = $_SESSION['rpt'];
	}
	
	try {

		require("db_config.php");

		$SQL = "SELECT COUNT(*) FROM supplements WHERE sid = $sid";
		$st = $db->prepare($SQL);
		$st->execute();
		$number = $st->fetchColumn();


		if($number != 0) {
			$SQL = "SELECT * FROM supplements WHERE sid = $sid";
			$st = $db->prepare($SQL);
			$st->execute();

			$result = $st->fetchAll(PDO::FETCH_ASSOC);

			foreach ($result as $row) { 
				$_SESSION['supplement'][$rpt][$sid] = $row['prix'];
			}

		} else {
			echo "Produit invalid!!!<br>";
		}

		$db = null; 
	}

	catch (PDOException $e){
		echo "Erreur SQL: ".$e->getMessage(); 
	}

}
?>


		<h1 style="font-size: 60px"> Liste des suppléments: </h1>

		<table>
			<tr>
				<th style="font-size:40px">Sid</th>
				<th style="font-size:40px">Nom</th>
				<th style="font-size:40px">Prix</th>
				<th style="font-size:40px">Action</th>
			</tr>

			<?php

			try {

				require("db_config.php");

				$SQL = "SELECT * FROM supplements";
				$res = $db->query($SQL);

				foreach ($res as $row) {

					?>

					<tr>
						<td style="text-indent: 180px"><?php echo $row['sid'] ?></td>
						<td><?php echo $row['nom'] ?></td>
						<td style="text-indent: 170px"><?php echo $row['prix'] ?></td>

						<?php
						if(isset($_GET['ajout_rpt'])) {
							$rpt = $_GET['ajout_rpt'];
							?>
							<td><a href="index.php?produit=supplement&sid=<?php echo $row['sid'] ?>&ajout_rpt=<?php echo $rpt ?>">Ajouter au panier</a></td>

							<?php } else if(isset($_SESSION['recette'])){ ?>

							<td><a href="index.php?produit=supplement&sid=<?php echo $row['sid'] ?>">Ajouter au panier</a></td>

							<?php } else { ?>
							<td><a href="index.php?produit=supplement">Ajouter au panier</a></td>
							<?php } ?>

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
			<a href="index.php?produit=menu">Ajouter</a> un pizza
			<br><br>
			<a href='index.php'>Revenir</a> à la page d'accueil


			


