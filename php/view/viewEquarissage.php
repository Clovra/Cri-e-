<!DOCTYPE html>
<html class="text-bg-dark" lang="fr">
<head>
    <meta charset="utf-8" />
    <title>La criée</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="body text-bg-dark">
        <br><br><br><br>

        <!-- Création de la liste des lots destiner à l'equarissage dans un tableau -->

        <h1 class="text-center user-select-none fst-italic">Voici les lots destiner à l'équarissage</h1>
        <br><br>
        <h5 class="text-center user-select-none">Liste des lot destiner a l'Equarissage : </h5>
        <br>
        <div class="mx-auto">
            <table class="table table-bordered">
                <tr class="table-info text-center user-select-none">
                    <th>Numéro du Lot</th>
                    <th>Date de peche</th>
                    <th>Status du Lot</th>
                    <th>Nom du lot</th>
                </tr>
                <br>
                <?php
                while ($ligne = $requete3->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <tr class="table-light text-center user-select-none">
                        <td><?php echo $ligne["id"];?></td>
                        <td><?php echo $ligne["idDatePeche"];?></td>
                        <td><?php echo $ligne["StatuLot"];?></td>
                        <td><?php echo $ligne["nomLot"];?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>