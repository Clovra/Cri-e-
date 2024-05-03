<!DOCTYPE html>
<html class="text-bg-dark"> 
<head>
    <meta charset="utf-8">
    <title>La criée</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

    <!-- creation du formulaire d'ajout d'un nouvel acheteur -->

    <div class="body text-bg-dark">
        <br><br><br><br>
        <h1 class="text-center user-select-none fst-italic"> Ajout d'un nouvel Acheteur</h1>
        <br><br>
        <h5 class="text-center user-select-none"> Veuillez remplir ce formulaire vos informations : </h5>
        <br>
        <div class="d-flex justify-content-center">
            <form method="post" action="">
                <div class="d-flex justify-content-center">
                    <label class="form-label user-select-none">Nom suivi du prénom : </p> 
                    <input class="form-control" type="text" id="nomBuy" name="nomBuy" required="true">
                </div>
                <br>
                <div class="d-flex justify-content-center">
                    <label class="form-label user-select-none">Adresse Mail : </p>
                    <input class="form-control" type="text" id="mailBuy" name="mailBuy" required="true">
                </div>
                <br>
                <div class="d-flex justify-content-center">
                    <input class="btn btn-success" type="submit" id="ValiderBuyer" name="ValiderBuyer" value="Valider">
                </div>
            </form>
        </div>
        <br>
        <?php

       // message de confirmation 

        if (isset($_POST['ValiderBuyer'])){
            $nom_set=$_POST['nomBuy'];
            $mail_acheteur=$_POST['mailBuy'];{
                ?><p class="text-center user-select-none"> L'acheteur <?php echo $nom_set?> a bien été enregistrer </p><?php
            }
        }
        ?>
    </div>
</body>
</html>

