<?php
require_once("functions.php");


class FormulaireProprietaire extends Page
{
    public function __construct()
    {   
        $retStr = parent::initHTML("Modifier", "style.css");
        $retStr .= parent::insertHeading();
        $retStr .= parent::beginEndBal("h2", "Formulaire proprietaires");
        $retStr .= parent::beginForm("POST", 'record.php', "proprietaires");
        $retStr .= parent::insertInput("number", "id_proprietaire", "ID Proprietaire");
        $retStr .= parent::insertInput("text", "nom", "Nom");
        $retStr .= parent::insertInput("text", "adresse", "Adresse");
        $retStr .= parent::insertHidden("formname", "proprietaires");
        $retStr .= parent::beginEndBal("button", "Envoyer");
        $retStr .= parent::endBal("form");
        $retStr .= parent::endBal("body");
        $retStr .= parent::endBal("html");
        echo $retStr;
    }
}

$page = new FormulaireProprietaire();