<!DOCTYPE html>
<html class="text-bg-dark" lang="fr">
<head>
    <meta charset="utf-8" />
    <title>La criée</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <div class="body text-bg-dark">
        <br><br><br><br>

        <!-- Creation de la liste des acheteurs qui n'ont pas payer dans un tableau -->

        <h1 class="text-center user-select-none fst-italic">Bloquage d'un acheteur <i class="fa-solid fa-lock"></i></h1>
        <br><br>
        <h5 class="text-center user-select-none">Liste des acheteurs qui n'ont pas encore payer : </h5>
        <div class="mx-auto">
            <table class="table table-bordered">
                <tr class="table-info text-center user-select-none">
                    <th>Nom de l'acheteur</th>
                    <th>Montant de la facture</th>
                    <th>Status de la facture</th>
                </tr>
                <br>
                <?php
                while ($ligne = $requete5->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <tr class="table-light text-center user-select-none">
                        <td><?php echo $ligne["nomAcheteur"];?></td>
                        <td><?php echo $ligne["montantFacture"];?> € </td>
                        <td><?php echo $ligne["StatusFacture"];?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
        <br>

        <!-- Création de la liste déroulante des acheteurs qui n'ont pas payer -->

        <p class="text-center user-select-none">Liste des acheteurs : </p>
        <div class="d-flex justify-content-center">
            <form method="post" action="">
                <div class="d-flex justify-content-center">
                    <select name="SelectCustomer" id="SelectCustomer" class="btn btn-primary">
                        <?php
                        while ($donnees = $requete6->fetch()) {
                            ?>
                            <option value="<?php echo ($donnees['nomAcheteur']); ?>"> <?php echo ($donnees['nomAcheteur']); ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <br><br>
                <div class="d-flex justify-content-center">
                    <input name="BoutonBloquage" id="BoutonBloquage" type="submit" value="Bloquer" class="btn btn-success" onclick="Avertissement()">
                </div>
            </form>
        </div>
        <br>
        <?php

        // message de confirmation 

        if (isset($_POST['BoutonBloquage'])) {
            if (isset($_POST['SelectCustomer'])){
                $customer_choisi=$_POST["SelectCustomer"];{
                    ?> 
                    <p class="text-center user-select-none" id="test">L'acheteur <?php echo $customer_choisi ?> à bien été bloquer</p>
                    <?php
                }
            }
        } else{
            ?> 
            <p class="text-center user-select-none"> Veuillez séléctionner un acheteur à bloquer </p> 
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
