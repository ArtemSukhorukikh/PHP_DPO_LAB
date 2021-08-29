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

$pattern = "/(\d+-*\d+)/";
$dbconn = PDOPgSQL();
$stml = $dbconn->prepare("SELECT * FROM news");
$stml->execute();
$news = $stml->fetchAll();
foreach ($news as $new) {
    $newUrlId = [];
    if (preg_match($pattern, $new['url'], $newUrlId)) {
        $newUrl = 'https://sozd.parlament.gov.ru/bill/' . $newUrlId[0];
        $stml = $dbconn->prepare("UPDATE news SET url = :urlNew WHERE id = :id");
        $stml->bindParam(':urlNew', $newUrl);
        $stml->bindParam(':id', $new['id']);
        $status = $stml->execute();
        if ($status) {
            echo 'Ссылка ID = ' . $new['id'] . ' заменена.Новая ссылка: '. $newUrl . '<br>';
        } else {
            echo 'Замены не произошло. Id:'.$new['id'].'<br>';
        }
    } else {
        echo 'URLId:'.$new['id'].'Замена не требуетсяЫ<br>';
    }
}
