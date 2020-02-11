
<?php

$title = "Panier";

//////////////////////////////////////////////////////////////////////

if(isset($_GET['supprimer'])) {

    if($_GET['supprimer'] == 'recette') {

        if(isset($_GET['rpt'])) {

            $rpt = $_GET['rpt'];
            unset($_SESSION['recette'][$rpt]);

        } else echo "error rpt<br>";

        if(isset($_SESSION['supplement'][$_GET['rpt']])) {
            unset($_SESSION['supplement'][$_GET['rpt']]);
        }

        if(empty($_SESSION['recette'])) {
            unset($_SESSION['recette']);
            unset($_SESSION['supplement']);
        }
    }

    if($_GET['supprimer'] == 'supplement') { 

        if(isset($_GET['rpt'])) {

            if(isset($_GET['idsup'])) {
                unset($_SESSION['supplement'][$_GET['rpt']][$_GET['idsup']]);
            } else echo "error idsup<br>";

            if(empty($_SESSION['supplement'][$_GET['rpt']])) {
                unset($_SESSION['supplement'][$_GET['rpt']]);
            }

            if(empty($_SESSION['supplement'])) {
                unset($_SESSION['supplement']);
            }


        } else echo "error rpt<br>";
    }
}

///////////////////////////////////////////////////////////////////////////

if(isset($_GET['rid'])) {

    if(!isset($_SESSION['rpt'])) {
        $_SESSION['rpt'] = 0;
    } else {
        $_SESSION['rpt']++;
    }

    $rid = intval($_GET['rid']);

    try {

        require("db_config.php");

        $SQL = "SELECT COUNT(*) FROM recettes WHERE rid = $rid";
        $st = $db->prepare($SQL);
        $st->execute();

        $number = $st->fetchColumn();

        if($number != 0) {
            $SQL = "SELECT * FROM recettes WHERE rid = $rid";
            $st = $db->prepare($SQL);
            $st->execute();

            $result = $st->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row) { 
                $_SESSION['recette'][$_SESSION['rpt']]=array(
                    "rid" => $row['rid'],
                    "prix" => $row['prix']
                );
            }

        } else {

            echo "Produit invalide!!!<br>";
        }

        $db = null; 
    }

    catch (PDOException $e){
        echo "Erreur SQL: ".$e->getMessage(); 
    }
}

///////////////////////////////////////////////////////////////////////////

if(isset($_GET['sid'])) {

    $sid=intval($_GET['sid']);
    echo "SID: ".$sid;

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
                echo $sid." / ".$rpt;
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
        <h1>Panier</h1>
        <?php 
        if(isset($_SESSION['recette']) || isset($_SESSION['supplement'])) { 
            ?>
            <table>
                <tr>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Action</th>
                </tr>

                <?php
                $prixtotal = 0;


                if(isset($_SESSION['recette'])) {

                    $rpt = 0;
                    $rid = 0;

                    while($rpt <= $_SESSION['rpt']) {
                        if(isset($_SESSION['recette'][$rpt])) {
                            foreach($_SESSION['recette'][$rpt] as $id => $value) { 
                                if($id == 'rid') {
                                    $rid = $value;
                                }
                            }
                            require("db_config.php");

                            $SQL = "SELECT * FROM recettes WHERE rid = $rid";
                            $res = $db->query($SQL);
                           
                            foreach($res as $row) {
                                $prixtotal = $prixtotal + $row['prix'];
                                ?>

                                <tr> 
                                    <td><?php echo $row['nom'] ?></td> 
                                    <td><?php echo $row['prix'] ?>€</td>
                                    <td><a href="index.php?produit=menu&supprimer=recette&rpt=<?php echo $rpt ?>">Supprimer</a></td>
                                </tr>

                                <?php
                            } 

                            if(isset($_SESSION['supplement'][$rpt])) {

                                $SQL = "SELECT * FROM supplements WHERE sid IN(";

                                foreach($_SESSION['supplement'][$rpt] as $sid => $value) {
                                    $SQL.=$sid.",";
                                }

                                $SQL = substr($SQL,0,-1).")";

                                $res = $db->query($SQL);

                                foreach($res as $row) {
                                    $prixtotal = $prixtotal + $row['prix'];
                                    ?>

                                    <tr> 
                                        <td><?php echo "+ ".$row['nom'] ?></td> 
                                        <td><?php echo $row['prix'] ?>€</td>
                                        <td><a href="index.php?produit=menu&supprimer=supplement&rpt=<?php echo $rpt ?>&idsup=<?php echo $row['sid'] ?>">Supprimer</a></td>
                                    </tr>

                                    <?php
                                }
                            }

                            ?>
                            <tr>
                                <td colspan="3"><a href="index.php?produit=supplement">Supplement</a></td>
                            </tr>
                            <?php
                        }
                        $rpt++;
                    }

                    ?>

                    <tr> 
                        <td colspan="3">Prix total: <?php echo $prixtotal ?>€</td> 
                    </tr> 

                    <?php
                } 

            } else {
                echo "<p>Votre panier est vide. Veillez ajouter des produits.</p>";
            }

            ?>
        </table>

        <?php
        if(isset($_SESSION['recette'])) {
            ?>
            <a href="index.php?produit=payer">Payment</a>
            <?php
        }
        
        ?>
