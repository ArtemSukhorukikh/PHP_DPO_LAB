<?php

function findOutUserWinning($pathToInputData)
{
    $inputData = fopen($pathToInputData, 'r');
    $userBalance = 0;
    $countUserBets = fgets($inputData);
    $usersBets = [];
    for ($i = 0; $i < $countUserBets; $i++) {
        $inputString = explode(' ', fgets($inputData));
        $usersBets[(int)$inputString[0]]['bidAmount'] = (int)$inputString[1];
        $usersBets[(int)$inputString[0]]['decision'] = trim($inputString[2], "\n\r");
    }
    $countGames = fgets($inputData);
    $gamesResults = [];
    for ($i = 0; $i < $countGames; $i++) {
        $inputString = explode(' ', fgets($inputData));
        $gamesResults[(int)$inputString[0]]['L'] = (float)$inputString[1];
        $gamesResults[(int)$inputString[0]]['R'] = (float)$inputString[2];
        $gamesResults[(int)$inputString[0]]['D'] = (float)$inputString[3];
        $gamesResults[(int)$inputString[0]]['issue'] = trim($inputString[4], "\n\r");
    }
    foreach ($usersBets as $gameID => $bet) { 
        if ($bet['decision'] == $gamesResults[$gameID]['issue']) {
            $userBalance += (100 * $gamesResults[$gameID][$bet['decision']] -100) * $bet['bidAmount'];
        }
        else {
            $userBalance -= 100*$bet['bidAmount'];
        }
    }
    return $userBalance/100;
}