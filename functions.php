<?php
    class Page
    {
        function initHTML($titre, $css) {
            echo "<!DOCTYPE html>\n";
            echo "<html lang='fr'>\n";
            echo "<head>\n";
            echo "<title>".$titre."</title>\n";
            if(!empty($css))
                echo '<link rel="stylesheet" type="text/css" href="' . $css .'">';
            echo "</head>\n";
            echo "<body>\n";
        }

        function beginForm($method, $action, $name) {
            echo "<form method='" . $method . "' action='" . $action . "' name='" . $name . "' >\n";
        }

        function insertInput($type, $name, $humantext) {
            echo "<p><label for='" . $name . "'>" . $humantext . "</label><br/>";
            echo "<input name='" . $name . "' type='" . $type . "' value='' /> </p>";
        }

        function insertHidden($name, $value) {
            echo "<input type='hidden' name='" . $name . "' value='" . $value . "' ></input>";
        }

        function createLink($href, $text) {
            echo "<a href=" . $href . ">" . $text . "</a>";
        }

        function beginBal($bal) {
            echo "<" . $bal . ">";
        }

        function endBal($bal) {
            echo "</" . $bal . ">";
        }

        function br() {
            echo "<br/>\n";
        }
    
        function insertHeading() {
            Page::beginEndBal("h1", "Voitures exotiques");
            Page::beginEndBal("h2", "et leur propriétaire,");
            Page::beginEndBal("h3", "Une véritable histoire d'amour.");
            Page::beginEndBal("p", "Découvrez la passion de Christophe, Éric et Enrique Iglesias!");
        }

        function beginEndBal($bal, $content) {
            Page::beginBal($bal);
            echo $content;
            Page::endBal($bal);
            echo "\n";
        }
    }
    function connectReturnPDO() {
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
            return $pdo;
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
?>