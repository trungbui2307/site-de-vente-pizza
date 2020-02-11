<?php

$query = "SELECT * FROM supplements ORDER BY sid ASC";
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
		<td><?php echo $row['sid'] ?></td>
		<td><?php echo $row['nom'] ?>;</td>
		<td><?php echo $row['prix'] ?></td>
		<td><a href="index.php?manager=quanlysupplements&ac=modifier&id=<?php echo $row['sid'] ?>">Modifier</td>
		<td><a href="modules/supplements/trait.php?id=<?php echo $row['sid'] ?>">Supprimer</td>
	</tr>
<?php
}
?>
</table>