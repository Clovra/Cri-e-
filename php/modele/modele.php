<?php

function getLot(){
    require_once("sqlconnection.php");
    if (isset($_POST['BoutonValider'])) {
        $date = $_POST["SelectPeche"];
        $bdd = getBDD();
        $req2 = $bdd->query("SELECT * FROM lot WHERE idDatePeche = '$date' and StatuLot= 'Vendu'");
    }
    return $req2;
}

// fonction qui retourne toute les date peches existante dans la base de donnée

function getPeche()
{
    require_once("sqlconnection.php");
    $bdd = getBDD();

    $requete1 = $bdd->prepare("SELECT DISTINCT DatePeche FROM peche");
    $requete1->execute();

 return $requete1;
}

// fonction qui retourne les informations des facture correspondante a la date selectionner par l'utilisateur

function getStatuFacture()
{
    require_once("sqlconnection.php");
    $bdd = getBDD();
    $requete2=null;
    $date_choisi = null;
    
        if (isset($_POST['BoutonValider'])) {
            $date_choisi = $_POST["SelectPeche"]; {

        $requete2 = $bdd->prepare("SELECT DISTINCT facture.idFacture, facture.montantFacture , facture.StatusFacture, acheteur.nomAcheteur FROM facture
                                INNER JOIN lot ON lot.idFactureLots = facture.idFacture
                                INNER JOIN acheteur ON lot.idAcheteurLots = acheteur.idAcheteur
                                INNER JOIN peche ON lot.idBateau = peche.idBateau
                                WHERE idDatePeche = '$date_choisi'");
        $requete2->execute();
        return $requete2;
            }
        }
    }

// fonction qui retourne les informations des lots destiner à l'équarissage

function getStatuEquarissage()
{
    require_once("sqlconnection.php");
    $bdd = getBDD();

    $requete3 = $bdd->prepare("SELECT DISTINCT lot.id, lot.idDatePeche, lot.StatuLot, lot.nomLot FROM lot WHERE lot.StatuLot = 'Equarissage'");
    $requete3->execute();

    return $requete3;
}

// fonction qui retourne les lots non vendu que les association vont récuperer

function getLotNonVendu()
{
    require_once("sqlconnection.php");
    $bdd = getBDD();

    $requete4 = $bdd->prepare("SELECT lot.StatuLot, lot.idDatePeche, lot.id, lot.nomLot, association.nomAsso FROM association 
                            INNER JOIN lot ON lot.idAsso = association.id 
                            WHERE lot.StatuLot = 'Non vendu'");
    $requete4->execute();
    return $requete4;
}

// fonction qui retourne les acheteurs et leur facture correspondante pour ceux qui n'ont pas régler leur facture

function getLotNonPayer()
{
    require_once("sqlconnection.php");
    $bdd = getBDD();

    $requete5 = $bdd->prepare("SELECT DISTINCT facture.StatusFacture, facture.montantFacture, acheteur.nomAcheteur FROM facture 
                            INNER JOIN lot ON lot.idFactureLots = facture.idFacture
                            INNER JOIN acheteur ON lot.idAcheteurLots = acheteur.idAcheteur
                            WHERE facture.StatusFacture = 'Non payer' OR facture.StatusFacture = 'En cours'");
    $requete5->execute();
    return $requete5;
}

// fonction qui retourne les noms des acheteurs qui n'ont pas payer de facture

function getCustomerForBlock()
{
    require_once("sqlconnection.php");
    $bdd = getBDD();

    $requete6 = $bdd->prepare("SELECT DISTINCT acheteur.nomAcheteur FROM acheteur
                            INNER JOIN lot ON lot.idAcheteurLots = acheteur.idAcheteur
                            INNER JOIN facture ON lot.idFactureLots = facture.idFacture
                            WHERE acheteur.Bloquage = 0 AND facture.StatusFacture = 'Non payer' OR facture.StatusFacture = 'En cours'");
    $requete6->execute();
    return $requete6;
}

// fonction qui bloque un acheteurs choisi par l'utilisateur

function setBlock()
{
   
    require_once("sqlconnection.php");
    $bdd = getBDD();
    

    if (isset($_POST['BoutonBloquage'])) {
        if (isset($_POST['SelectCustomer'])){
            $customer_choisi = $_POST["SelectCustomer"];{

    $requete7 = $bdd->prepare("UPDATE acheteur SET Bloquage = true WHERE nomAcheteur = '$customer_choisi'");
    $requete7->execute();
    return $requete7;
            }
        }
    }
}

// fonction qui retourne les noms des acheteurs bloquer

function getCustomerBlocked()
{
    require_once("sqlconnection.php");
    $bdd = getBDD();

    $requete8 = $bdd->prepare("SELECT DISTINCT nomAcheteur FROM acheteur WHERE Bloquage = 1 ");
    $requete8->execute();
    return $requete8;
}

// fonction qui enleve le status de bloquer de l'acheteur selectionner par l'utilisateur

function setDeblockCustomer()
{
    require_once("sqlconnection.php");
    $bdd = getBDD();

    if (isset($_POST['BoutonDebloquage'])) {
        if (isset($_POST['SelectBlocked'])) {
            $customer_deblock = $_POST["SelectBlocked"];{

    $requete9 = $bdd->prepare("UPDATE acheteur SET Bloquage = false WHERE nomAcheteur ='$customer_deblock'");
    $requete9->execute();
    return $requete9;
            }
        }
    }
}

// fonction qui affiche les achteurs bloquer dans une liste déroulante

function getDeblockCustomer()
{
    require_once("sqlconnection.php");
    $bdd = getBDD();

    $requete10 = $bdd->prepare("SELECT DISTINCT nomAcheteur FROM acheteur WHERE Bloquage = 1");
    $requete10->execute();
    return $requete10;
}

// fonction qui affiche les informations concernant les acheteur qui n'ont pas encore reglé de facture

function getLotVendu()
{
    require_once("sqlconnection.php");
    $bdd = getBDD();

    $requete11 = $bdd->prepare("SELECT DISTINCT acheteur.nomAcheteur, facture.StatusFacture, facture.montantFacture, lot.StatuLot FROM facture
                            INNER JOIN lot ON lot.idFactureLots = facture.idFacture
                            INNER JOIN acheteur ON lot.idAcheteurLots = acheteur.idAcheteur
                            WHERE facture.StatusFacture = 'Non payer' AND lot.StatuLot = 'Vendu'");
    $requete11->execute();
    return $requete11;
}

// fonction qui affiche dans une liste déroulante les acheteurs ayant acheter un lot mais qui n'ont pas encore payer la facture ou reçu celle-ci

function getCustomerForMail()
{
    require_once("sqlconnection.php");
    $bdd = getBDD();

    $requete12 = $bdd->prepare("SELECT DISTINCT nomAcheteur FROM acheteur
                            INNER JOIN lot ON lot.idAcheteurLots = acheteur.idAcheteur
                            INNER JOIN facture ON lot.idFactureLots = facture.idFacture
                            WHERE facture.StatusFacture = 'Non payer' AND lot.StatuLot = 'Vendu'");
    $requete12->execute();
    return $requete12;
}

// fonction qui change le status de la facture en 'en cours' pour l'acheteur selectionner

function sendFacture()
{
    require_once("sqlconnection.php");
    $bdd = getBDD();

    if (isset($_POST['BoutonSend'])) {
        if (isset($_POST['SelectCustomerForMail'])) {
            $custom_choice = $_POST["SelectCustomerForMail"];{

    $requete13 = $bdd->prepare("UPDATE facture 
                            INNER JOIN lot ON lot.idFactureLots = facture.idFacture
                            INNER JOIN acheteur ON lot.idAcheteurLots = acheteur.idAcheteur
                            SET facture.StatusFacture = 'En cours' WHERE nomAcheteur = '$custom_choice' ");
    $requete13->execute();
    return $requete13;
            }
        }
    }
}

// fonction qui recupere le mail de l'acheteur selectionner par l'utilisateur

function getMail()
{
    require_once("sqlconnection.php");
    $bdd = getBDD();

    if (isset($_POST['BoutonSend'])) {
        if (isset($_POST['SelectCustomerForMail'])) {
            $custom_choice = $_POST["SelectCustomerForMail"];{

    $requete14 = $bdd->prepare("SELECT acheteur.mailAcheteur FROM acheteur WHERE nomAcheteur = '$custom_choice' ");
    $requete14->execute();
    return $requete14;
            }
        }
    }
}

// fonction qui afficher les informations des factures pour l'utilisateur

function getXmlFile()
{
    require_once("sqlconnection.php");
    $bdd = getBDD();
    $requete16 = $bdd->prepare("SELECT DISTINCT facture.idFacture, facture.montantFacture, facture.StatusFacture, nomAcheteur, facture.dateFacturePayer FROM facture
                                INNER JOIN lot ON lot.idFactureLots = facture.idFacture
                                INNER JOIN acheteur ON lot.idAcheteurLots = acheteur.idAcheteur
                                ORDER BY idFacture ASC");
    $requete16->execute();
    return $requete16;
}

// fonction qui récuperent les dates des factures payer pour le fichier xml

function getDateFact()
{
    require_once("sqlconnection.php");
    $bdd = getBDD();

    $requete17 = $bdd->prepare("SELECT DISTINCT facture.dateFacturePayer FROM facture
                                WHERE facture.dateFacturePayer IS NOT NULL");
    $requete17->execute();

    return $requete17;
}

// fonction qui prend les inforamtions des facture pour les mettre dans le fichier xml

function setXmlData()
{
    require_once("sqlconnection.php");
    $bdd = getBDD();

    if (isset($_POST['BoutonExport'])) {
        if (isset($_POST['SelectFact'])){
            $DateFactChoice = $_POST['SelectFact'];{
    
    $requete18 = $bdd->prepare("SELECT DISTINCT facture.idFacture, facture.montantFacture, facture.dateFacturePayer, nomAcheteur FROM facture
                                INNER JOIN lot ON lot.idFactureLots = facture.idFacture
                                INNER JOIN acheteur ON lot.idAcheteurLots = acheteur.idAcheteur
                                WHERE facture.dateFacturePayer = '$DateFactChoice'");
    $requete18->execute();
    return $requete18;
            }
        }
    } 
}

// fonction qui définit les informations sur le graphique depuis 6 mois

function setDataArray()
{
    require_once("sqlconnection.php");
    $bdd = getBDD();

    $requete19 = $bdd->prepare("SELECT lot.poidsBrutLot, COUNT(poidsBrutLot) as poids FROM lot WHERE lot.idDatePeche > SUBDATE(NOW(), INTERVAL 180 DAY) GROUP BY poidsBrutLot ORDER BY poids ASC");
    $requete19->execute();
    return $requete19;
}

// fonction qui retourne les informations relatifs aux especes

function getAllSpacies()
{
    require_once("sqlconnection.php");
    $bdd = getBDD();

    $requete20 = $bdd->prepare("SELECT espece.nomEspece, espece.nomCourtEspece, nomScientifiqueEspece FROM espece ORDER BY espece.nomEspece ASC");
    $requete20->execute();
    return $requete20;
}

// fonction qui permet de retourner les informations relatifs aux bateaux

function getShipData()
{
    require_once("sqlconnection.php");
    $bdd = getBDD();

    $requete21 = $bdd->prepare("SELECT bateau.nomBateaux, bateau.immatriculationBateaux, bateau.idBateaux FROM bateau ORDER BY bateau.idBateaux");
    $requete21->execute();
    return $requete21;
}

// fonction qui permet d'ajouter une nouvelle association dans la base de donnée

function setDataAsso()
{
    require_once("sqlconnection.php");
    $bdd = getBDD();

    if (isset($_POST['Validation'])){
        $nom_choisi=$_POST['nomAsso'];
        $tel_choisi=$_POST['numTel'];
        $region_choisi=$_POST['nomReg'];{
            if ($nom_choisi != null && $tel_choisi!= null && $region_choisi!=null){
                
                $requete22 = $bdd->prepare("INSERT INTO association (nomAsso, telephone, region) VALUES (:nom, :tel, :region)");
                $requete22->bindParam(":nom", $nom_choisi);
                $requete22->bindParam(":tel", $tel_choisi);
                $requete22->bindParam(":region", $region_choisi);
                $requete22->execute();
                return $requete22;
            }
        }
    }
}

// fonction qui permet d'ajouter un nouvel acheteur dans la base de donnée

function setDataBuyer()
{
    require_once("sqlconnection.php");
    $bdd = getBDD();

    if (isset($_POST['ValiderBuyer'])){
        $nom_set=$_POST['nomBuy'];
        $mail_acheteur=$_POST['mailBuy'];{
            if ($nom_set != null && $mail_acheteur != null){

                $requete23 = $bdd->prepare("INSERT INTO acheteur (nomAcheteur, mailAcheteur) VALUES (:nomp, :mail)");
                $requete23->bindParam(":nomp", $nom_set);
                $requete23->bindParam(":mail", $mail_acheteur);
                $requete23->execute();
                return $requete23;
            }
        }
    }
}

?>