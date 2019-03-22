<?php
namespace TP1;

class Voitures extends Page
{
    public function __construct()
    {
        $retStr = parent::initHTML("Voitures", "style/style.css");
        $retStr .= parent::insertHeading();
        $retStr .= parent::beginBal("table");
        $retStr .= Voitures::connectAndFetch();
        $retStr .= parent::endBal("table");
        $retStr .= parent::endBal("body");
        $retStr .= parent::endBal("html");
        $this->doc .= $retStr;
    }

    public function connectAndFetch()
    {
        $conStr = sprintf("pgsql:host=%s;port=%d;dbname=%s;",
                          "192.168.56.10",
                          '5432',
                          'testdb');
        $user = 'master';
        $pass = '123qweQWE';

        $options = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        try {
            $pdo = new \PDO($conStr, $user, $pass, $options);
            $stmt = $pdo->query('SELECT * FROM voituresexotiques ORDER BY proprietaire_id');

            return Voitures::displayFormatted($stmt);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function displayFormatted($stmt)
    {
        $retStr = parent::beginBal("tr");

        $retStr .= parent::beginEndBal("td", "ID Voiture");
        $retStr .= parent::beginEndBal("td", "ID Proprietaire");
        $retStr .= parent::beginEndBal("td", "Marque");
        $retStr .= parent::beginEndBal("td", "Modele");
        $retStr .= parent::beginEndBal("td", "Année");
        $retStr .= parent::beginEndBal("td", "VIN");
        $retStr .= parent::beginEndBal("td", "Supprimer");

        $retStr .= parent::endBal("tr");

        foreach ($stmt as $row) {
            $retStr .=  parent::beginBal("tr");

            $retStr .= parent::beginEndBal("td", $row['voiture_id']);
            $retStr .= parent::beginEndBal("td", $row['proprietaire_id']);
            $retStr .= parent::beginEndBal("td", $row['marque']);
            $retStr .= parent::beginEndBal("td", $row['modele']);
            $retStr .= parent::beginEndBal("td", $row['annee']);
            $retStr .= parent::beginEndBal("td", $row['vin']);
            $lienSupprimer = "action/delete.php?voiture_id=" . $row['voiture_id'];
            $retStr .= parent::beginEndBal("td", parent::createLink($lienSupprimer, "Supprimer"));

            $retStr .= parent::endBal("tr");
        }
        return $retStr;
    }
}