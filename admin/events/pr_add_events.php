<?php
     $status= $ev_title = $ev_start = $ev_end = $ev_description = $avatar = $fileToUpload = "";
    if(!empty($_POST)){
        require_once ('../dbhelper.php');

        $ev_title = $_POST['ev_title'];
        $ev_start = $_POST['ev_start'];
        $ev_end = $_POST['ev_end'];
        $ev_description = $_POST['ev_description'];
        $status = $_POST['status'];

        if (strtotime($ev_start) > strtotime($ev_end)) {
             echo '<script language="javascript">';
             echo "if(confirm('Enter Event End greater than Start Event'))";
             echo "{document.location.href='add_events.php'};";
             echo '</script>';
        } else {
            include 'uploadfile.php'; 

            $sql = "INSERT INTO events(id_events, ev_title, ev_start, ev_end, ev_avatar, ev_description, status) values('','$ev_title', '$ev_start', '$ev_end', '$avatar', '$ev_description', '$status')";
            query($sql);
            header('Location: list_events.php');
        }
    }

?>