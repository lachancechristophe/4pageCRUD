<?php
namespace TP1;

require_once("../lib/functions.php");
if (!empty($_REQUEST['voiture_id'])) {
    $pdo = ConnectReturnPDO();
    if (!empty($pdo)) {
        $query = "DELETE FROM voituresexotiques WHERE voiture_id =" . $_REQUEST['voiture_id'];
        echo $query;
        $stmt = $pdo->query($query);
    }
}
if (!empty($_REQUEST['proprietaire_id'])) {
    $pdo = ConnectReturnPDO();
    if (!empty($pdo)) {
        $query = "DELETE FROM proprietairesvoitures WHERE id =" . $_REQUEST['proprietaire_id'];
        echo $query;
        $stmt = $pdo->query($query);
    }
}