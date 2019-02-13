<?php
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
        $stmt = $pdo->query('SELECT * FROM voituresexotiques');
        foreach ($stmt as $row)
        {
            //echo $row['pays'] . "- " . $row['nom'] . " : " . $row['cup'] . "<br/>";
            var_dump($row);
        }
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
}