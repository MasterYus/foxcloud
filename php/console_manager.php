<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
if (isset($_SESSION['user_group_id'])){
    if($_SESSION['user_group_id']=="2"){
        if(isset($_POST['request'])){
            // Setup database
            $connection = mysqli_connect("localhost", "root", "","foxcloud");
            //fix charset
            mysqli_set_charset ($connection , 'utf8');
            switch ($_POST['request']){
            case "get_all_users":
                $query = mysqli_query($connection,"select * from users");
                while($data = mysqli_fetch_assoc($query)){
                    echo <<<EOF
                    <tr>
                    <th scope="row">{$data['ID']}</th>
                    <td>{$data['LOGIN']}</td>
                    <td>{$data['NAME']}</td>
                    <td>{$data['S_NAME']}</td>
                    EOF;
                    if ($data['GROUP_ID']=="1"){
                        echo "<td>Пользователь<td>";
                    } elseif ($data['GROUP_ID']=="2"){
                        echo "<td>Админ<td>";
                    }
                    echo "</tr>";
                }
                break;
            case "get_all_files":
                 $query = mysqli_query($connection,"select * from audio");
                while($data = mysqli_fetch_assoc($query)){
                    echo <<<EOF
                    <tr>
                    <th scope="row">{$data['ID']}</th>
                    <td>{$data['FILE_NAME']}</td>
                    <td>{$data['FILE_ARTIST']}</td>
                    <td>{$data['FILE_ALBUM']}</td>
                    <td>{$data['FILE_DESC']}</td>
                    EOF;
                    echo "</tr>";
                }
                break;
            case "test":
                echo "<tr><th scope='row'>test</th></tr>";
                break;
            case "":
                break;
            default :
                break;
            }
        }
    }
}
