<?php


/* 
 * Some kind of library to show gui elements
 */

// Function to display messages
function display_alert($msg,$icon){
    echo '<p class="has-error">';
    echo $icon;
    echo $msg;
    echo "</p>";
}

function display_msg($msg,$icon){
    echo '<p class="has-success">';
    echo $icon;
    echo $msg;
    echo "</p>";
}

function show_user_footer(){
   if (isset($_SESSION["user_login"])) { 
                    echo <<<EOF
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><strong>{$_SESSION['user_name']} {$_SESSION['user_surname']}</strong><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                    EOF;
                        if($_SESSION["user_group_id"] == "1"){
                            echo '<li><a href="profile.php">Профиль</a></li>';    
                        }             
                     echo <<<EOF
                            <li>
                                <a href="?session_clear">Выйти</a>
                            </li>
                        </ul>
                    </li>
                    EOF; 
                        if($_SESSION["user_group_id"] == "2"){
                             echo '<li><a href="console.php"><strong>ADMIN</strong></a></li>';
                        }
                    } else {
                    echo <<<EOF
                    <li>
                        <a href="login.php"><strong>Войти</strong></a>
                    </li>
                     <li>
                        <a href="registration.php"><u>Регистрация</u></a>
                    </li>
                    EOF;}
}

function show_file_row($param){
    // db connection required!!!
    // Setup database
    $connection = mysqli_connect("localhost", "root", "","foxcloud");
    //fix charset
    mysqli_set_charset ($connection , 'utf8');
    if ($param == "user"){
        $query = mysqli_query($connection,"select * from audio where FILE_ARTIST='".session_id()."'");
    } else {
        $query = mysqli_query($connection,"select * from audio");
    }
        if(mysqli_num_rows($query)==0){
            echo <<<EOF
            <div class="row div-center div-center-self text-center">
            <img draggable="false" style="width:300px; height: auto;" src="img/empty.jpg"/>
            </div>
            <div class="row div-center div-center-self text-center">
            <p style="font-size:15px">Здесь пока ничего нет :(<br>Загрузите свой первый трек!</p>
            </div>
            EOF;
        }
        while($data = mysqli_fetch_assoc($query)){
            $get_user_query = mysqli_query($connection,"select * from users where ID='".$data['FILE_ARTIST']."'");
            $user_data = mysqli_fetch_assoc($get_user_query);
        echo <<<EOF
        <div class="row div-center">
            <div class="col-xs-1 text-center">
                <p><i class="fa fa-file-audio-o fa-4x"></i></p>
            </div>
            <div class="col-xs-6">
                <h4>
                    <a>{$data['FILE_NAME']}</a>
                </h4>
                <p>by <a href="#">{$user_data['LOGIN']} ({$user_data['NAME']} {$user_data['S_NAME']})</a></p>
                <p>{$data['FILE_DESC']}</p>
                <a class="btn btn-primary" href="#">Read More <i class="fa fa-comment"></i></a>             
            </div>
            <div class="col-xs-3 "><audio id="sound" controls controlsList="nodownload"><source src="storage/audio/{$data['ID']}.mp3" type="audio/mp3" ></audio></div>
        </div>
        <hr>
        EOF;
        }
        mysqli_close($connection);
}
