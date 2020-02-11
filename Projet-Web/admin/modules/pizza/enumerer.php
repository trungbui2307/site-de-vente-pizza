<?php

$query = "SELECT * FROM recettes ORDER BY rid ASC";
$data = $db->query($query);
?>
<table width="100%" border="1">
	<tr>
		<td>ID</td>
		<td>Nom</td>
		<td>Prix</td>
		<td colspan="2">Manager</td>
	</tr>
<?php
foreach ($data as $row) {
?>
	<tr>
		<td><?php echo $row['rid'] ?></td>
		<td><?php echo $row['nom'] ?>;</td>
		<td><?php echo $row['prix'] ?></td>
		<td><a href="index.php?manager=quanlypizza&ac=modifier&id=<?php echo $row['rid'] ?>">Modifier</td>
		<td><a href="modules/pizza/traiter.php?id=<?php echo $row['rid'] ?>">Supprimer</td>
	</tr>
<?php
}
?>
</table>