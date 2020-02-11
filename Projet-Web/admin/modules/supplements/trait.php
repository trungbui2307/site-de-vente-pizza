<?php
	//include('../config.php');
	include('../../../db_config.php');
	$nom=$_POST['nom'];
	$sid=$_GET['id'];
	$prix=$_POST['prix'];
	
	if(isset($_POST['ajouter'])){
		//ajouter
		
		$pdoResult = $db->prepare('INSERT INTO supplements(nom,prix) VALUES (:nom, :prix)');
		$pdoResult->bindParam(':nom', $nom);
		$pdoResult->bindParam(':prix',$prix);
		$pdoResult->execute();
		header('location:../../index.php?manager=quanlysupplements&ac=ajouter');
	}else if(isset($_POST['modifier'])){
		//sua
		$querry = "UPDATE supplements SET nom=:nom,prix=:prix WHERE sid='$sid'";
		$pdoResult = $db->prepare($querry);
		$st = $pdoResult->execute(array(':nom'=>$nom,':prix'=>$prix));
		header('location:../../index.php?manager=quanlysupplements&ac=modifier&id='.$sid);
	}else{
		//xoa
		$querry = "DELETE FROM supplements WHERE sid='$sid'";
		$db->exec($querry);
		header('location:../../index.php?manager=quanlysupplements&ac=ajouter');
	}
?>