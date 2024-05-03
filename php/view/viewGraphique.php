<!DOCTYPE html>
<html class="text-bg-dark">
<head>
    <meta charset="utf-8" />
    <title>La criée</title>
    <!-- importation de ploty pour pouvoir créer le graph --><script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <div class="text-bg-dark">
        <br><br><br><br>
        <h1 class="text-center user-select-none fst-italic">Graphique <i class="fa-solid fa-chart-line"></i></h1>
        <br><br>
        <?php 

        //definition de deux liste vides 

        $XArray = [];
        $YArray = [];

        //remplissage des listes avec données bdd

        while ($donnees = $requete19->fetch()){
            $XArray[] = $donnees['poidsBrutLot'];
            $YArray[] = $donnees['poids'];
        }
        ?>
        <div id="Poids" ></div>
        <script>

            // passage du type array au string avec la fonction implode et le delimiteur ","

            const xArray = [<?php echo implode(",", $XArray);?>];
            const yArray = [<?php echo implode(",", $YArray);?>];

            // Conception du graph

            const data = [{
                x:xArray,
                y:yArray,
                type:"bar",
                orientation:"v",
                marker: {color:"rgba(255,0,0,0.6)"}
            }];

            // Légende du graph

            const layout = {
                    xaxis: {range: [2, 8], title: "Poids des lots (Kg)"},
                    yaxis: {range: [0, 5], title: "Nombre de lots"},
                    title: "Lot pécher par poids durant les 6 derniers mois"
            };

            //Création du graph

            Plotly.newPlot("Poids", data, layout);
        </script>
    </div>
</body>
</html>