<?php
require 'findOutUsesrWinning.php';

$inputDatas = glob("A/*.dat");
$outputDatas = glob("A/*.ans");
$i = 1;
foreach(array_combine($inputDatas, $outputDatas) as $input => $output){
    $fileWithAnswear = fopen($output, 'r');
    $fileAnswear = fgets($fileWithAnswear);
    $functionAnswear = findOutUserWinning($input);
    if ($fileAnswear == $functionAnswear) {
        echo "\tТест $i : Успешно.";
    }
    else{
        echo "\tTast $i : Провалено.";
    }
    echo "Ожидаемое значение: $fileAnswear. Полученный ответ: $functionAnswear.";
    echo "<br/>";
    $i++;
}