<?php
namespace TP1;

class Accueil extends Page
{
    public function __construct()
    {
        $retStr =  parent::initHTML("Accueil", "style/style.css");
        $retStr .= parent::insertHeading();
        $retStr .= parent::beginBal("p");
        $retStr .= parent::createLink("ShowOwners.php", "Voir les propriétaires.");
        $retStr .= parent::br();
        $retStr .= parent::createLink("ShowVoitures.php", "Voir les voitures.");
        $retStr .= parent::br();
        $retStr .= parent::createLink("ShowFormOwners.php", "Modifier les propriétaires.");
        $retStr .= parent::br();
        $retStr .= parent::createLink("ShowFormVoitures.php", "Modifier les voitures.");
        $retStr .= parent::br();
        $retStr .= parent::endBal("p");
        $retStr .= parent::endBal("body");
        $retStr .= parent::endBal("html");
        $this->doc .= $retStr;
    }
}
