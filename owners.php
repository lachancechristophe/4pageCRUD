<?php
require_once("functions.php");

class Proprietaires Extends Page {

    function __construct()
    {
        parent::initHTML("Proprietaires", "style.css");
        parent::insertHeading();
        parent::beginBal("table");
        Proprietaires::connectAndFetch();
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
            $stmt = $pdo->query('SELECT * FROM proprietairesvoitures');
            
            Proprietaires::displayFormatted($stmt);

        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    function displayFormatted($stmt) {
        parent::beginBal("tr");

        parent::beginEndBal("td", "ID");
        parent::beginEndBal("td", "Nom");
        parent::beginEndBal("td", "Adresse");

        parent::endBal("tr");

        foreach ($stmt as $row)
        {
            parent::beginBal("tr");

            parent::beginEndBal("td", $row['id']);
            parent::beginEndBal("td", $row['nom']);
            parent::beginEndBal("td", $row['adresse']);

            parent::endBal("tr");
        }
    }

}

$page = new Proprietaires();

?>