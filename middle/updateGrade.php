<?php
/**
 * Created by PhpStorm.
 * User: pdelong
 * Date: 3/31/18
 * Time: 1:26 PM
 */

$url = 'https://web.njit.edu/~sdp53/cs490/updateGrade.php';

function updateGrade($data_obj, $url){
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_obj);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $r_decoded = json_decode($response, true);
    curl_close($ch);
    return $r_decoded;

}

$updateGrade_obj = file_get_contents('php://input');
#$getGrade_obj = json_encode(array('Username' => 'pgd22'));
$updateGrade_res = updateGrade($updateGrade_obj, $url); # pass to sunny & retrieve response

$response_obj = json_encode($updateGrade_res, true); # encode the response from sunny
echo $response_obj; # echo back to front
#print_r($displayQ_res) ;