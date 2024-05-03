<!DOCTYPE html>
<html class="text-bg-dark" lang="fr"> 
<head>
    <meta charset="utf-8">
    <title>La criée</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

    <!-- Creation de la liste des especes dans un tableau -->

    <div class="body text-bg-dark">
        <br><br><br><br><br>
        <h1 class="text-center user-select-none fst-italic"> Liste Especes <i class="fa-solid fa-list"></i></h1>
        <br><br>
        <h5 class="text-center user-select-none"> Liste de tout les poissons par ordre alphabétique : </h5>
        <br><br>
        <div class="mx-auto">
            <table class="table table-bordered">
                <tr class="table-info text-center user-select-none">
                    <th>Nom de l'espèce</th>
                    <th>Nom Scientifique de l'espèce</th>
                    <th>Nom abreger de l'espece</th>
                </tr>
                <?php
                while ($ligne = $requete20->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <tr class="table-light text-center user-select-none">
                        <td><?php echo $ligne["nomEspece"];?></td>
                        <td><?php echo $ligne["nomScientifiqueEspece"];?></td>
                        <td><?php echo $ligne["nomCourtEspece"];?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
        <br>
    </div>
</body>
</html>