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
    <div class="text-bg-dark">
        <br><br><br><br>

        <!-- Creation de la liste déroulante contenant toutes les dates peche de la bdd -->

        <h1 class="text-center user-select-none fst-italic">Choisissez une date  <i class="fa-solid fa-calendar-days"></i></h1>
        <br><br>
        <h5 class="text-center user-select-none">Choix de la date : </h5>
        <br>
        <form method="post" action="" class="text-center">
            <select name="SelectPeche" id="SelectPeche" class="btn btn-primary">
                <?php
                while ($donnees = $requete1->fetch()) {
                    ?>
                    <option value="<?php echo ($donnees['DatePeche']); ?>"> <?php echo ($donnees['DatePeche']); ?></option>
                    <?php
                }
                ?>
            </select>
            <br><br>
            <input name="BoutonValider" id="BoutonValider" type="submit" value="Valider" class="btn btn-success"> 
        </form>
        <?php

        // on verifie si la requete 2 contient bien quelque chose 

        if (isset($_POST["BoutonValider"])){
            $requete2=getStatuFacture();
            $date_choisi=$_POST["SelectPeche"];
            if ($requete2 != false && $requete2->rowCount() > 0) {
                ?>
                <br>

                <!-- si la requete contient quelque chose on créer le tableau de la liste des factures --> 

                <p class="text-center user-select-none"> Date selectionner : <?php echo $date_choisi; ?> </p>
                <div class="mx-auto">
                    <table class="table table-bordered">
                        <tr class="table-info text-center user-select-none">
                            <th>Numéro Facture</th>
                            <th>Montant</th>
                            <th>Status</th>
                            <th>Nom Acheteur</th>
                        </tr>
                        <?php
                        while ($row = $requete2->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <tr class="table-light text-center user-select-none">
                                <td><?php echo $row["idFacture"];?></td>
                                <td><?php echo $row["montantFacture"];?> € </td>
                                <td><?php echo $row["StatusFacture"];?></td>
                                <td><?php echo $row["nomAcheteur"];?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                </div>
                <?php

                // si la requete 2 ne contient rien alors il n'y aucune facture pour la date selectionner par l'utilisateur

            } else {
                ?>
                <br>
                <p class="text-center user-select-none"> Aucune facture pour la date : <?php echo $date_choisi; ?> </p>
                <?php
            }
        } else {
            ?>
            <br>
            <p class="text-center user-select-none">Veuillez selectionner une date</p>
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