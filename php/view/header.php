<!DOCTYPE html>
<html lang="fr"> 
<head>
    <meta content="charset=utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>La Criée</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

  <!-- Création de la navbar et de ses éléments -->

  <div class="bg-info-subtle">
    <nav class="navbar navbar-expand-lg bg-body-info">
      <div class="container-fluid">
        <a class="navbar-brand user-select-none fw-semibold fs-4" href="index.php?uc=home"><i class="fa fa-fw fa-home"></i> La criée</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle fw-semibold user-select-none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-envelope-open"></i>
                Gestion De Facture
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item user-select-none" href="index.php?uc=select">Facture selon Date de peche</a></li>
                <li><a class="dropdown-item user-select-none" href="index.php?uc=mail">Envoyer une facture par mail</a></li>
                <li><a class="dropdown-item user-select-none" href="index.php?uc=xml">Fichier XML Facture</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle fw-semibold user-select-none" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-truck-ramp-box"></i>
                  Lot
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item user-select-none" href="index.php?uc=association">Lot Non Vendu et Association</a></li>
                <li><a class="dropdown-item user-select-none" href="index.php?uc=equarissage">Lot Equarissage</a></li>
                <li><a class="dropdown-item user-select-none" href="index.php?uc=listelot">Aficher lot du jour</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle fw-semibold user-select-none" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-unlock"></i>
                  Bloquage et Debloquage
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item user-select-none" href="index.php?uc=bloquer">Bloquer un acheteur</a></li>
                <li><a class="dropdown-item user-select-none" href="index.php?uc=deblock">Debloquer un acheteur</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle fw-semibold user-select-none" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-chart-simple"></i>
                  Stats
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item user-select-none" href="index.php?uc=graph">Graphique Ventes/Poids</a></li>
                <li><a class="dropdown-item user-select-none" href="index.php?uc=espece">Info Espece</a></li>
                <li><a class="dropdown-item user-select-none" href="index.php?uc=batal">Info Bateaux</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle fw-semibold user-select-none" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-user-plus"></i>
                  Ajouter
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item user-select-none" href="index.php?uc=ajoutasso">Ajouter une association</a></li>
                <li><a class="dropdown-item user-select-none" href="index.php?uc=ajoutacheteur">Ajouter un acheteur</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav justify-content-end fw-semibold">
            <a class="text-dark user-select-none text-decoration-none"><i class="fa-regular fa-clock"></i> Heure locale : </a>
            <a class="text-dark user-select-none text-decoration-none" id="time"></a>
          </ul>
        </div>
      </div>
    </nav>
  </div>
<script>

  // fonction qui affiche l'heure locale dans la navbar

  setInterval(myTimer, 1000);

  function myTimer() {
    const d = new Date(); 
    document.getElementById("time").innerHTML = d.toLocaleTimeString();
  }
</script>
<style>

/* permet a la navbar de rester en haut de la page meme si on descend dans la page */

  div.bg-info-subtle {
    position: fixed;
    top : 0;
    width: 100%;
  }  
</style>
</body>
</html>