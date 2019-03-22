<?php
namespace TP1;

class FormulaireVoiture extends Page
{
    public function __construct()
    {
        $retStr = parent::initHTML("Modifier", "style/style.css");
        $retStr .= parent::insertHeading();
        $retStr .= parent::beginEndBal("p", "Pour ajouter un enregistrement, laisser l'ID vide !");
        $retStr .= parent::beginEndBal("h2", "Formulaire voitures");
        $retStr .= parent::beginForm("POST", 'action/record.php', "voiture");
        $retStr .= parent::insertInput("number", "id_voiture", "ID Voiture");
        $retStr .= parent::insertInput("number", "id_proprietaire", "ID Proprietaire");
        $retStr .= parent::insertInput("text", "marque", "Marque");
        $retStr .= parent::insertInput("text", "modele", "Modele");
        $retStr .= parent::insertInput("number", "annee", "Année");
        $retStr .= parent::insertInput("text", "vin", "VIN");
        $retStr .= parent::insertHidden("formname", "voitures");
        $retStr .= parent::beginEndBal("button", "Envoyer");
        $retStr .= parent::endBal("form");

        
        $retStr .= parent::endBal("body");
        $retStr .= parent::endBal("html");
        $this->doc .= $retStr;
    }
}