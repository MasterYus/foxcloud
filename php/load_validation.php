<?php
/* 
 * AJAX server validation
 */
    $response = array();
    $response['success'] = true;
    $response['song_name'] = "";
    $response['song_album'] = "";
    $response['song_description']= "";
    $targetFolder = 'storage/audio/';
    
    if(!isset($_POST['song_name']) || empty($_POST['song_name'])){
        $response['song_name'] ="Пожалуйста введите имя!";
        $response['success'] = false;
    }
    
    if(!isset($_POST['song_album']) || empty($_POST['song_album'])){
        $response['song_album'] ="Пожалуйста введите альбом!";
        $response['success'] = false;
    }
    
    if(!isset($_POST['song_description']) || empty($_POST['song_description'])){
        $response['song_description'] ="Нужно добавить описание!";
        $response['success'] = false;
    }
    
    echo json_encode($response);

