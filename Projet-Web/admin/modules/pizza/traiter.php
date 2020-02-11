<?php
	//include('../config.php');
		include('../../../db_config.php');

	$nom=$_POST['nom'];
	$rid=$_GET['id'];
	$prix=$_POST['prix'];
	
	if(isset($_POST['ajouter'])){
		//ajouter
		
		$pdoResult = $db->prepare('INSERT INTO recettes(nom,prix) VALUES (:nom, :prix)');
		$pdoResult->bindParam(':nom', $nom);
		$pdoResult->bindParam(':prix',$prix);
		$pdoResult->execute();
		header('location:../../index.php?manager=quanlypizza&ac=ajouter');
	}else if(isset($_POST['modifier'])){
		//sua
		$querry = "UPDATE recettes SET nom=:nom,prix=:prix WHERE rid='$rid'";
		$pdoResult = $db->prepare($querry);
		$st = $pdoResult->execute(array(':nom'=>$nom,':prix'=>$prix));
		header('location:../../index.php?manager=quanlypizza&ac=modifier&id='.$rid);
	}else{
		//xoa

		$querry = "DELETE FROM recettes WHERE rid='$rid'";
		$db->exec($querry);
		header('location:../../index.php?manager=quanlypizza&ac=ajouter');
	}
?>