<?php
    $hostname = 'localhost';
    $user = 'root';
    $password = '';
    $dbname   = 'db_bettashop';

    $conn = mysqli_connect($hostname, $user, $password, $dbname) or die ('Gagal terhubung ke database');
    /*if ($conn){ 
        $buka = mysqli_select_db ($conn, $dbname);
        echo "Database dapat terhubung";
        if (!$buka){
            echo "Database tidak dapat terhubung";
        }
    }else{
        echo "Mysql tidak terhubung";
    }*/
?>