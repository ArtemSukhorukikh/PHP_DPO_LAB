<?php

$configArray = parse_ini_file('config.ini');
$address = str_replace(' ', '+', $_POST['adress']);
    $parameters = array(
      'apikey' => $configArray['token'],
      'geocode' => $address,
      'format' => 'json'
    );

    $response = file_get_contents('https://geocode-maps.yandex.ru/1.x/?'. http_build_query($parameters));
    $obj = json_decode($response, true);
    $addressObj = $obj['response']['GeoObjectCollection']['featureMember'][0]['GeoObject']['metaDataProperty']['GeocoderMetaData']['Address']['Components'];
    $cord = str_replace(" ", ",", $obj['response']['GeoObjectCollection']['featureMember'][0]['GeoObject']['Point']['pos']);
    $parameters = array(
      'apikey' => $configArray['token'],
      'geocode' => $cord,
      'kind' => 'metro',
      'format' => 'json'
    );

    $response = file_get_contents('https://geocode-maps.yandex.ru/1.x/?'. http_build_query($parameters));
    $obj = json_decode($response, true);
    $addressResult = [];
    $metro = $obj['response']['GeoObjectCollection']['featureMember'][0]['GeoObject']['name'];
    $result = [
      'cord'=>$cord,
      'metro'=>$metro,
    ];
    foreach($addressObj as $tmpAdress){
      $result['address'][$tmpAdress['kind']] = $tmpAdress['name'];
    }
    echo json_encode($result);