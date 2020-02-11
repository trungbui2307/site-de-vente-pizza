
<?php  
$rid = 0;
$nom = '';
$prix = '';
$id = $_GET['id'];
$query = "SELECT * FROM recettes WHERE rid = :id";
$stmt = $db->prepare($query);
$stmt->execute(array(':id'=>$id));
$row = $stmt->fetch();
?>
<form action="modules/pizza/traiter.php?id=<?php echo $row['rid']?>" method="post" enctype="multipart/form-data">

<table width="100%" border="1">
	<tr>
		<td colspan="2"><div align="center">Modifier Pizza</div></td>
	</tr>
	<tr>
		<td>Nom de Pizza</td>
		<td><input type="text" name="nom" value="<?php echo $row['nom']?>"></td>
	</tr>
		<td>Prix</td>
		<td><input type="text" name="prix" value="<?php echo $row['prix']?>"></td>
	</tr>
	<tr>
		<td colspan="2"><div align="center"><input type="submit" name="modifier" id="modifier" value="Modifier"></div></td>
	</tr>

</table>
</form>