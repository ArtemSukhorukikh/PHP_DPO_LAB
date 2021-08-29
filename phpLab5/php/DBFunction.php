<?php

$dbConn = PDOPgSQL();
if ($_POST['operation'] == 'PARAM') {
    return withParam($dbConn, $_POST['id']);
} else {
    return withoutParam($dbConn,$_POST['sql']);
}
function PDOPgSQL() //Создание подключения
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

function withParam($dbConn, $id) 
{
    $sql = 'SELECT * FROM "users" WHERE email = ?';
    $stml = $dbConn->prepare($sql);
    $stml->execute(array($id));
    $row = $stml->fetch(PDO::FETCH_ASSOC);
    $json_row = json_encode($row); 
    echo $json_row;
}

function withoutParam($dbConn, $sqlString) 
{
    $sql = 'SELECT * FROM "users" WHERE email = '.$sqlString;
    $stml = $dbConn->prepare($sql);
    $stml->execute();
    $row = $stml->fetch(PDO::FETCH_ASSOC);
    $json_row = json_encode($row); 
    echo $json_row;
}