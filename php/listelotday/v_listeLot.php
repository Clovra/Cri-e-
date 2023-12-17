
<!DOCTYPE html>
<html>
 <head>
 <meta charset="utf-8" />
 <title>Mon blog</title>
 <link href="style.css" rel="stylesheet" />
 </head>

 <body>
 <section>
 <table>
 <?php
 while ($donnees = $req->fetch())
 {
 ?>
 <tr>
 <td> <?php echo htmlspecialchars($donnees['id']); ?> </td> <td> <?php echo htmlspecialchars($donnees['idDatePeche']); ?> </td>   </tr>

 <?php
 }

 $req->closeCursor();
 ?>
 </table>
 </section>
 </body>
</html>