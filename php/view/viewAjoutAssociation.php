<!DOCTYPE html>
<html class="text-bg-dark"> 
<head>
    <meta charset="utf-8">
    <title>La criée</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

    <!-- Creation du formulaire d'ajout d'une association -->

    <div class="body text-bg-dark">
        <br><br><br><br>
        <h1 class="text-center user-select-none fst-italic"> Ajout d'une nouvelle Association</h1>
        <br><br>
        <h5 class="text-center user-select-none"> Veuillez remplir ce formulaire avec les informations de votre association : </h5>
        <br>
        <div class="d-flex justify-content-center">
            <form method="post" action="">
                <div class="d-flex justify-content-center">
                    <label class="form-label user-select-none">Nom de l'association : </p> 
                    <input class="form-control" type="text" id="nomAsso" name="nomAsso" required="true">
                </div>
                <br>
                <div class="d-flex justify-content-center">
                    <label class="form-label user-select-none">Numéro de téléphone : </p>
                    <input class="form-control" type="text" id="numTel" name="numTel" required="true">
                </div>
                <br>
                <div class="d-flex justify-content-center">
                    <label class="form-label user-select-none">Nom de votre Région : </p>
                    <input class="form-control" type="text" id="nomReg" name="nomReg" required="true">
                </div>
                <br>
                <div class="d-flex justify-content-center">
                    <input class="btn btn-success" type="submit" id="Validation" name="Validation" value="Valider">
                </div>
            </form>
        </div>
        <br>
        <?php 

        // message de confirmation d'ajout d'association

        if (isset($_POST['Validation'])){
            $nom_choisi=$_POST['nomAsso'];
            $tel_choisi=$_POST['numTel'];
            $region_choisi=$_POST['nomReg'];{
                ?> <p class="text-center user-select-none">Le nom de votre association a bien été enregistrer sous le nom de <?php echo $nom_choisi ?></p><?php
            }
        } 
        ?>
        <br>
    </div>
</body>
</html>

        