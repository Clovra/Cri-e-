<?php

function getLot(){
    $date = date("D");
    require_once("sqlConnect.php"); 
    $bdd = getBDD();
    $req = $bdd->query("SELECT * FROM lot WHERE annee = '$date'");
    return $req;
}

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     require_once("sqlConnect.php");
//     formulaire();
// }

// function formulaire(){
    
//     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//         $conn = getBDD();

//         $isbn = $_POST['isbn'];
//         $titre = $_POST['titre'];
//         $prix = $_POST['prix'];
//         $editeur = $_POST['editeur'];
//         $annee = $_POST['annee'];
//         $langue = $_POST['langue'];
//         $numAuteur = $_POST['numAuteur'];
//         $numGenre = $_POST['numGenre'];

//         try {
//             $stmt = $conn->prepare("INSERT INTO livre (isbn, titre, prix, editeur, annee, langue, numAuteur, numGenre) VALUES (:isbn, :titre, :prix, :editeur, :annee, :langue, :numAuteur, :numGenre)");
//             $stmt->bindParam(':isbn', $isbn);
//             $stmt->bindParam(':titre', $titre);
//             $stmt->bindParam(':prix', $prix);
//             $stmt->bindParam(':editeur', $editeur);
//             $stmt->bindParam(':annee', $annee);
//             $stmt->bindParam(':langue', $langue);
//             $stmt->bindParam(':numAuteur', $numAuteur);
//             $stmt->bindParam(':numGenre', $numGenre);
//             $stmt->execute();

//             echo "Livre ajouté avec succès !";
//         } catch (PDOException $e) {
//             echo "Erreur : " . $e->getMessage();
//         }
//     } else {
//         exit();
//     }
// } 

// ?>