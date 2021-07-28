<?php
require 'dataBaseFuction.php';
header('Content-Type: application/json; charset=utf-8');
$dbConn = PDOPgSQL();
$result = checkApplicationInDB($dbConn, $_POST['email']);

if ($result[0] == 'NEED_NEW') {
    addNewApplicationInDB($dbConn, $_POST['email']);
    $result = array(
        "operation" => 'NEW_APPLICATION',
        "surname" => $_POST['surname'],
        "name" => $_POST['name'],
        "patronymic" => $_POST['patronymic'],
        "phone" => $_POST['phone'],
        "email" => $_POST['email'],
        "message" => $_POST['message'],
        "dateAnswear" => $result[1]
    );
} else {
    $result = array(
        "operation" => 'SENT_APPLICATION',
        "dateNewApplication" => $result[1]
    );
}
echo json_encode($result, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
