<?php
require 'dbConnection.php';


$xml = simplexml_load_file('testXML.xml');//Считываем xml файл
//var_dump($xml);
$dbconn = PDOPgSQL();
$rowsToAdd = array();
foreach ($xml as $worker) {
    array_push($rowsToAdd, [
      'name' => (string)$worker->name[0], 'age' => (string)$worker->age[0], 'salary' => (string)$worker->salary[0]
    ]);
}
echo '<br>';
//var_dump($rowsToAdd);
addToDB($dbconn, $rowsToAdd);
$fp = fopen('results.json', 'w');
fwrite($fp, dbToJson($dbconn));
fclose($fp);