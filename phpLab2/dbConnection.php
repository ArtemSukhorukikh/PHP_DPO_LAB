<?php


function PDOPgSQL()
{
    static $dbconn;
    if (is_null($dbconn)) {

        try {
            $configArray = parse_ini_file('config.ini');
            $dsn = "pgsql:host={$configArray['host']};port={$configArray['port']};dbname={$configArray['dbname']}";
            $dbconn = new PDO($dsn, $configArray['username'], $configArray['passwd']);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br />";
        }
    }

    return $dbconn;
}


function addToDB($dbconn, $rows)
{
    $sql = 'INSERT INTO "workerTable" ("name", "age", "salary") VALUES(:name, :age, :salary)';
    foreach ($rows as $row) {
        $stml = $dbconn->prepare($sql);
        $stml->bindParam(':name', $row['name']);
        $stml->bindParam(':age', $row['age']);
        $stml->bindParam(':salary', $row['salary']);
        $stml->execute();
    }
}

function dbToJson($dbconn)
{
    $sql = 'SELECT * FROM "workerTable" ORDER BY id ASC ';
    $stml= $dbconn->prepare($sql);
    $stml->execute();
    $data = $stml->fetchAll(PDO::FETCH_ASSOC);
    return json_encode($data, JSON_UNESCAPED_UNICODE);
}