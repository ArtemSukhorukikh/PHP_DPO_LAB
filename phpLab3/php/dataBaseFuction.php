<?php

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

function checkApplicationInDB($dbConn, $email) 
{
    $sql = 'SELECT * FROM "applications" AS apl WHERE apl.email = :email';
    $stml = $dbConn->prepare($sql);
    $stml->execute(array('email' => $email));
    $row = $stml->fetch(PDO::FETCH_ASSOC);
    if ($row != null AND count($row) != 0) {
        $dateSend = DateTime::createFromFormat('Y-m-d H:i:s', $row['sendDateTime']);
        $nowDate = new DateTime();
        $interval = $nowDate->diff($dateSend);
        if ($interval->h >= 1) {
            $sql = 'DELETE FROM "applications" WHERE email = :email;';
            $stml = $dbConn->prepare($sql);
            $stml->execute(array('email' => $email));
            return ['NEED_NEW', (new DateTime())->add(new \DateInterval('PT1H30M0S'))->format('Y-m-d H:i:s')];
        }
        else {
            return ['ALREADY_SENT', $dateSend->add(new \DateInterval('PT1H0M0S'))->format('Y-m-d H:i:s')];
        }
    } else {
        return ['NEED_NEW', (new DateTime())->add(new \DateInterval('PT1H30M0S'))->format('Y-m-d H:i:s')];
    }
}

function addNewApplicationInDB($dbConn, $email) {
    $sql = 'INSERT INTO "applications" ("email", "sendDateTime") VALUES(:email, :sendDateTime)';
    $stml = $dbConn->prepare($sql);
    $stml->execute(array('email' => $email, 'sendDateTime' => (new DateTime())->format('Y-m-d H:i:s')));    
}