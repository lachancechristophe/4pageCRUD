<?php
require_once("functions.php");

class Accueil Extends Page {

    function __construct()
    {
        parent::initHTML("Accueil", "style.css");
        parent::insertHeading();
        parent::beginBal("p");
        parent::createLink("owners.php", "Voir les propriétaires.");
        parent::br();
        parent::createLink("voitures.php", "Voir les voitures.");
        parent::br();
        parent::createLink("form.php", "Modifier les enregistrements.");
        parent::br();
        parent::endBal("p");
        parent::endBal("body");
        parent::endBal("html");
    }
}

$page = new Accueil();

?>