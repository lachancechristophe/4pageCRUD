<?php
require_once("functions.php");

class Voitures Extends Page {

    function __construct()
    {
        parent::initHTML("Voitures", "style.css");
        parent::insertHeading();
        parent::beginBal("table");
        Voitures::connectAndFetch();
        parent::endBal("table");
        parent::endBal("body");
        parent::endBal("html");
    }

    function connectAndFetch() {
        $conStr = sprintf("pgsql:host=%s;port=%d;dbname=%s;",
                "192.168.56.10",
                '5432',
                'testdb');
        $user = 'master';
        $pass = '123qweQWE';

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        try {
            $pdo = new PDO($conStr, $user, $pass, $options);
            $stmt = $pdo->query('SELECT * FROM voituresexotiques ORDER BY proprietaire_id');
            
            Voitures::displayFormatted($stmt);

        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    function displayFormatted($stmt) {
        parent::beginBal("tr");

        parent::beginEndBal("td", "ID Voiture");
        parent::beginEndBal("td", "ID Proprietaire");
        parent::beginEndBal("td", "Marque");
        parent::beginEndBal("td", "Modele");
        parent::beginEndBal("td", "Année");
        parent::beginEndBal("td", "VIN");

        parent::endBal("tr");

        foreach ($stmt as $row)
        {
            parent::beginBal("tr");

            parent::beginEndBal("td", $row['voiture_id']);
            parent::beginEndBal("td", $row['proprietaire_id']);
            parent::beginEndBal("td", $row['marque']);
            parent::beginEndBal("td", $row['modele']);
            parent::beginEndBal("td", $row['annee']);
            parent::beginEndBal("td", $row['vin']);

            parent::endBal("tr");
        }
    }

}

$page = new Voitures();

?>