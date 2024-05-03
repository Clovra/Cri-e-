<!DOCTYPE html>
<html class="text-bg-dark">
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

        <!-- Creation de la liste des acheteurs bloquer dans un tableau -->

        <h1 class="text-center user-select-none fst-italic"> Débloquage d'un acheteur <i class="fa-solid fa-unlock"></i></h1>
        <br><br>
        <h5 class="text-center user-select-none">Liste des acheteurs bloquer : </h5>
        <br><br>
        <div class="mx-auto">
            <table class="table">
                <tr class="table-info text-center user-select-none">
                    <th>Nom</th>
                </tr>
                <br>
                <?php
                while ($ligne = $requete8->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <tr class="table-light text-center user-select-none">
                        <td><?php echo $ligne["nomAcheteur"];?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
        <br>

        <!-- creation de la liste deroulante contenant les acheteurs bloquer -->

        <p class="text-center user-select-none">Selectionner un acheteur à débloquer : </p>
        <div class="d-flex justify-content-center">
            <form method="post" action="">
                <div class="d-flex justify-content-center">
                    <select name="SelectBlocked" id="SelectBlocked" class="btn btn-primary">
                        <?php
                        while ($donnees = $requete10->fetch()) {
                            ?>
                            <option value="<?php echo ($donnees['nomAcheteur']); ?>"> <?php echo ($donnees['nomAcheteur']); ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <br><br>
                <div class="d-flex justify-content-center">
                    <input name="BoutonDebloquage" id="BoutonDebloquage" type="submit" value="Debloquer" class="btn btn-success">
                </div>
            </form>
        </div>
        <br>
        <?php  

        // message de confirmation 

        if (isset($_POST['BoutonDebloquage'])) {
            if (isset($_POST['SelectBlocked'])) {
                $customer_deblock=$_POST["SelectBlocked"];{
                    ?> <p class="text-center user-select-none">L'acheteur <?php echo $customer_deblock ?> à bien été debloquer</p><?php
                }
            }
        } else {
            ?> 
            <p class="text-center user-select-none"> Veuillez séléctionner un acheteur à debloquer </p> 
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