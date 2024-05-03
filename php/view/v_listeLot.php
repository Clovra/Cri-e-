<!DOCTYPE html>
<html class="text-bg-dark">

<head>
  <meta charset="utf-8" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <div class= "text-bg-dark">
      <br><br><br><br>
      <h1 class="text-center user-select-none fst-italic">Choisissez une date <i class="fa-solid fa-calendar-days"></i>
      </h1>
      <br><br>
      <h5 class="text-center user-select-none">Choix de la date : </h5>
      <br>
      <form method="post" action="" class="text-center">
        <select name="SelectPeche" id="SelectPeche" class="btn btn-primary">
          <?php
          while ($donnees = $req->fetch()) {
            ?>
            <option value="<?php echo ($donnees['DatePeche']); ?>">
              <?php echo ($donnees['DatePeche']); ?>
            </option>
            <?php
          }
          ?>
        </select>
        <br><br>
        <input name="BoutonValider" id="BoutonValider" type="submit" value="Valider" class="btn btn-success">
      </form>
      <br><br>
      <?php

      // on verifie si la requete 2 contient bien quelque chose 
      
      if ((isset($_POST["BoutonValider"]))) {
        $date_choisi = $_POST["SelectPeche"];
        $req2 = getLot();
        if ($req2 != false && $req2->rowCount() > 0) {
          ;
          ?>

          </form>
          <table class = "table table-bordered">
            <thead>
              <tr class="table-info text-center user-select-none">
                <th>achteur</th>
                <th>Bateau</th>
                <th>date pêche</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($donnees = $req2->fetch()) { ?>
                <tr class="table-light text-center user-select-none">
                  <td>
                    <?php echo htmlspecialchars($donnees['idAcheteurLots']); ?>
                  </td>
                  <td>
                    <?php echo htmlspecialchars($donnees['idBateau']); ?>
                  </td>
                  <td>
                    <?php echo htmlspecialchars($donnees['idDatePeche']); ?>
                  </td>
                </tr>
              <?php
              }
        } else {
          ?>
              <br>
              <p class="text-center user-select-none"> Aucune lot pour la date :
                <?php echo $date_choisi; ?>
              </p>
              <?php
        }
      }
      ;
      ?>
        </tbody>
      </table>
    </div>
</body>

</html>