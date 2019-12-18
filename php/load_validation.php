<?php
/* 
 * AJAX server validation and file uploading
 */
    session_start();
    $response = array();
    $response['success'] = true;
    $response['song_name'] = "";
    $response['song_album'] = "";
    $response['song_description']= "";
    $response['file_upload']= "";
    
    $checkFolder = '/FOXCLOUD/storage/tmp/';
    $targetFolder = '/FOXCLOUD/storage/audio/';
 
    if(!isset($_POST['song_name']) || empty($_POST['song_name'])){
        $response['song_name'] ="Пожалуйста введите имя!";
        $response['success'] = false;
    }
    
    if(!isset($_POST['file_uploaded']) || empty($_POST['file_uploaded']) || !file_exists($_SERVER['DOCUMENT_ROOT'].$checkFolder.$_POST['file_uploaded'])){
        $response['file_upload'] ="Файл не загружен!";
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
    
    if( $response['success']){
        // Setup database
        $connection = mysqli_connect("localhost", "root", "","foxcloud");
        //fix charset
        mysqli_set_charset ($connection , 'utf8');
        //prepare data
        $song_name = secure_input($_POST['song_name']);
        $song_album = secure_input($_POST['song_album']);
        $song_desc = secure_input($_POST['song_description']);
        $user = session_id();
        //SQL query to add file
        $query = mysqli_query($connection,"insert into audio (FILE_NAME, FILE_ARTIST, FILE_ALBUM, FILE_DESC) values ('$song_name','$user','$song_album','$song_desc')");
            //redirect when successfully registered
            if($query){
                //save loaded file
                $last_id = mysqli_insert_id($connection);
                rename($_SERVER['DOCUMENT_ROOT'].$checkFolder.$_POST['file_uploaded'], $_SERVER['DOCUMENT_ROOT'].$targetFolder.$last_id.".mp3");
                //This is success
                mysqli_close($connection);
            }
        }
        
    echo json_encode($response);
    
    // Secure from injections
    function secure_input($data) {
        $data = trim($data);
        //$data = stripslashes($data);
        $data = htmlspecialchars($data);
        //$data = mysqli_real_escape_string($data);
      return $data;
    }

