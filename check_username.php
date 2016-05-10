<?php

$db = mysqli_connect('localhost', 'st2014', 'progress', 'st2014');

if(isset($_POST['username'])){
    $username = mysqli_real_escape_string($db, $_POST['username']);
        if (!empty($username)) {
            $username_query = mysqli_query($db, "SELECT COUNT(`username`) FROM `t135190_klusers1` WHERE `username`='$username'");    

        $username_result = mysqli_fetch_row($username_query);
            //kui on olemas siis 1, kui ei siis 0
            if ($username_result[0] == '0') {
                echo('0');
            } else {
                echo('1');
            }
        }
    }

?>