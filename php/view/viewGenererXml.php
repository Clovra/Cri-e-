<!DOCTYPE html>
<html class="text-bg-dark" lang="fr"> 
<head>
    <meta charset="utf-8">
    <title>La criée</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="body text-bg-dark">
        <br><br><br><br>

        <!-- Affichage de toute les facture dans un tableau -->

        <h1 class="text-center user-select-none fst-italic">Generer le fichier xml relatif aux facture</h1>
        <br><br>
        <h5 class="text-center user-select-none">Info relatif aux factures : </h5>
        <div class="mx-auto">
            <table class="table table-bordered">
                <tr class="table-info text-center user-select-none">
                    <th>Numéro de facture</th>
                    <th>Nom de l'acheteur</th>
                    <th>Montant de la facture</th>
                    <th>Date de paiement</th>
                    <th>Status de la facture</th>
                </tr>
                <br>
                <?php
                while ($ligne = $requete16->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <tr class="table-light text-center user-select-none">
                        <td><?php echo $ligne["idFacture"];?></td>
                        <td><?php echo $ligne["nomAcheteur"];?></td>
                        <td><?php echo $ligne["montantFacture"];?> € </td>
                        <td><?php echo $ligne["dateFacturePayer"];?></td>
                        <td><?php echo $ligne["StatusFacture"];?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
        <br>

        <!-- liste déroulante avec les dates de paiement -->

        <p class="text-center user-select-none">Veuillez selectionner une date de paiement : </p>
        <form method="post" action="" class="text-center">
            <select name="SelectFact" id="SelectFact" class="btn btn-primary">
                <?php
                while ($donneesFact = $requete17->fetch()) {
                    ?>
                    <option value="<?php echo ($donneesFact['dateFacturePayer']); ?>"> <?php echo ($donneesFact['dateFacturePayer']); ?></option>
                    <?php
                }
                ?>
            </select>
            <br><br>
            <div class="d-flex justify-content-center">
                <button name="BoutonExport" id="BoutonExport" type="submit" value="Exporter le fichier XML" class="btn btn-success" >
                    Exporter le fichier xml &nbsp; <i class="fa-solid fa-download"></i>
            </button>
            </div>
        </form>
        <?php

        // creation du fichier xml 

        if (isset($_POST['BoutonExport'])) {
            if (isset($_POST['SelectFact'])){
                $DateFactChoice = $_POST['SelectFact'];{
                    $xmlFile=new DOMDocument ('1.0', 'utf-8');  // creation du fichier avec utf-8
                    $xmlFile->appendChild($ListFact = $xmlFile->createElement('ListeFacture')); // ajout d'un element "listeFacture"
                    while ($rs = $requete18->fetch(PDO::FETCH_ASSOC)){ // boucle pour chaque facture
                        $ListFact->appendChild($facture = $xmlFile->createElement('Facture')); // ajout d'un element Facture enfant de ListeFacture pour toute les facture de la date selectionner
                        $facture->appendChild($xmlFile->createElement('Nom', $rs['nomAcheteur'])); // ajout d'un element nom enfant de facture
                        $facture->appendChild($xmlFile->createElement('Numero', $rs['idFacture'])); // ajout d'un element numéro enfant de facture
                        $facture->appendChild($xmlFile->createElement('Montant', $rs['montantFacture'])); // ajout d'un element montant enfant de facture
                        $facture->appendChild($xmlFile->createElement('Date-Paiement', $rs['dateFacturePayer'])); // ajout d'un element date enfant de facture
                        
                    }
                    $xmlFile->formatOutput = true; 
                    $xmlFile->save("Facture/facture_$DateFactChoice.xml"); // on choisit l'emplacement ou le fichier va etre mis ainsi que son nom
                    ?>
                    <br><p class="text-center user-select-none"> Le fichier à bien été exporter vers le dossier facture de l'application</p>
                    <?php
                }
            }
        } else {
            ?>
            <br>
            <div class="text-center">
            <div class="spinner-grow text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
            </div>
            <div class="spinner-grow text-secondary" role="status">
            <span class="visually-hidden">Loading...</span>
            </div>
            <div class="spinner-grow text-success" role="status">
            <span class="visually-hidden">Loading...</span>
            </div>
            <div class="spinner-grow text-danger" role="status">
            <span class="visually-hidden">Loading...</span>
            </div>
            <div class="spinner-grow text-warning" role="status">
            <span class="visually-hidden">Loading...</span>
            </div>
            <div class="spinner-grow text-info" role="status">
            <span class="visually-hidden">Loading...</span>
            </div>
            <div class="spinner-grow text-light" role="status">
            <span class="visually-hidden">Loading...</span>
            </div>
            </div>
            <?php
        }  
        ?>
        <br>
    </div>
</body>
</html>


