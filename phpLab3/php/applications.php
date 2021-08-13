<?php
require 'dataBaseFuction.php';
header('Content-Type: application/json; charset=utf-8');
$dbConn = PDOPgSQL();
$result = checkApplicationInDB($dbConn, $_POST['email']);

if ($result[0] == 'NEED_NEW') {
    addNewApplicationInDB($dbConn, $_POST['email']);
    mail($_POST['email'], "Поступила новая заявка", "Новая заявка \n ФИО: $_POST[surname] $_POST[name] $_POST[patronymic] \n Телефон: $_POST[phone] \n Эл. почта: $_POST[email] \n Сообщение: $_POST[message]");
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
