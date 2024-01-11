
<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8" />
</head>

<body>
  <section>
    <div>
      <h1 class="text-center">vente du <?php echo(date("d-m-Y")) ?></h1>
        <table class="table table-bordered">
          <thead>
              <tr>
                <th>achteur</th>
                <th>Bateau</th>
                <th>date péche</th>
                <th>prix</th>
              </tr>
          </thead>
          <tbody><?php while ($donnees = $req->fetch()){?>
            <tr > 
              <td> <?php echo htmlspecialchars($donnees['idAcheteurLots']); ?> </td>
              <td> <?php echo htmlspecialchars($donnees['idBateau']); ?> </td>
              <td> <?php echo htmlspecialchars($donnees['idDatePeche']); ?> </td> 
              <td> <?php echo htmlspecialchars($donnees['prixEcheresLots']); ?> </td>
            </tr>
            <?php } $req->closeCursor(); ?>
          </tbody>
        </table>
      </table>
    </div>
  </section>
</body>
</html>