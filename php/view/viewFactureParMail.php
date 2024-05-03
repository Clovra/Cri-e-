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

        <!-- Création de la liste des acheteur avec une facture non payer dans un tableau -->

        <h1 class="text-center user-select-none fst-italic">Envoyer une facture par mail <i class="fa-solid fa-paper-plane"></i></h1>
        <br><br>
        <h5 class="text-center user-select-none">Liste des acheteur n'ayant pas encore régler leur facture : </h5>
        <div class="mx-auto">
            <table class="table table-bordered">
                <tr class="table-info text-center user-select-none">
                    <th>Nom de l'acheteur</th>
                    <th>Montant de la facture</th>
                    <th>Status du Lot</th>
                    <th>Status de la facture</th>
                </tr>
                <br>
                <?php
                while ($ligne = $requete11->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <tr class="table-light text-center user-select-none">
                        <td><?php echo $ligne["nomAcheteur"];?></td>
                        <td><?php echo $ligne["montantFacture"];?> € </td>
                        <td><?php echo $ligne["StatuLot"];?></td>
                        <td><?php echo $ligne["StatusFacture"];?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
        <br>

        <!-- liste déroulante avec les acheteurs concerné -->

        <p class="text-center user-select-none">Selectionner un acheteur à qui envoyer une facture par mail : </p>
        <div class="d-flex justify-content-center">
            <form method="post" action="">
                <div class="d-flex justify-content-center">
                    <select name="SelectCustomerForMail" id="SelectCustomerForMail" class="btn btn-primary">
                        <?php
                        while ($donnees = $requete12->fetch()) {
                            ?>
                            <option value="<?php echo ($donnees['nomAcheteur']); ?>"> <?php echo ($donnees['nomAcheteur']); ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <br><br>
                <div class="d-flex justify-content-center">
                    <input name="BoutonSend" id="BoutonSend" type="submit" value="Valider" class="btn btn-success">
                </div>
            </form>
        </div>
        <br>
        <?php

        // message de confirmation 

        if (isset($_POST['BoutonSend'])) {
            if (isset($_POST['SelectCustomerForMail'])){
                $custom_choice=$_POST["SelectCustomerForMail"];{
                    $mail = $requete14->fetch();
                    ?> 
                    <p class="text-center user-select-none">La facture à bien été envoyer à l'acheteur <?php echo $custom_choice ?> à l'adresse mail suivante <?php echo ($mail['mailAcheteur']); ?> </p>
                    <?php
                }
            }
        } else {
            ?> 
            <p class="text-center user-select-none"> Veuillez selectionner un acheteur à qui envoyer une facture </p> 
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
    </div>
</body>
</html>