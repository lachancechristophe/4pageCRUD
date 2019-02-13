<?php
require_once("functions.php");

class Formulaire Extends Page {

    function __construct()
    {
        parent::initHTML("Modifier", "style.css");
        parent::insertHeading();
        parent::beginEndBal("h2", "Formulaire voitures");
        parent::beginForm("POST", 'record.php', "voiture");
        parent::insertInput("number", "id_voiture", "ID Voiture");
        parent::insertInput("number", "id_proprietaire", "ID Proprietaire");
        parent::insertInput("text", "marque", "Marque");
        parent::insertInput("text", "modele", "Modele");
        parent::insertInput("number", "annee", "Année");
        parent::insertInput("text", "vin", "VIN");
        parent::insertHidden("formname", "voitures");
        parent::beginEndBal("button", "Envoyer");
        parent::endBal("form");

        parent::beginForm("POST", 'record.php', "proprietaires");
        parent::insertInput("number", "id_proprietaire", "ID Proprietaire");
        parent::insertInput("text", "nom", "Nom");
        parent::insertInput("text", "adresse", "Adresse");
        parent::insertHidden("formname", "proprietaires");
        parent::beginEndBal("button", "Envoyer");
        parent::endBal("form");
        parent::endBal("body");
        parent::endBal("html");
    }
}

$page = new Formulaire();

?>