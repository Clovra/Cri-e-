
<!DOCTYPE html>
<html>
 <head>
 <meta charset="utf-8" />
</head>

<body>
  <section>
    <div>
      <h1 class="text-center">vente du <?php echo(date("Y-m-d")) ?></h1>
        <table class="table table-bordered">
          <thead>
              <tr>
                  <th>lot</th>
                  <th>date</th>
                  <th>nom lot</th>
              </tr>

          </thead>
          <tbody><?php while ($donnees = $req->fetch()){?>
            <tr > 
                <td> <?php echo htmlspecialchars($donnees['id']); ?> </td>
                <td> <?php echo htmlspecialchars($donnees['idDatePeche']); ?> </td> 
                <td> <?php echo htmlspecialchars($donnees['nomLot']); ?> </td>
                
            </tr>
            <?php } $req->closeCursor(); ?>
          </tbody>
        </table>
      </table>
    </div>
  </section>
</body>
</html>