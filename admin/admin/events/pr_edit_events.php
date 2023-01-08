<?php
$id_events = $status= $ev_title = $ev_start = $ev_end = $ev_description = $avatar = $fileToUpload= "";
if (!empty($_POST)) {
    require_once('../dbhelper.php');

    $id_events  = $_POST['id_events'];
    $ev_title = $_POST['ev_title'];
    $ev_start = $_POST['ev_start'];
    $ev_end = $_POST['ev_end'];
    $image = $_FILES["fileToUpload"]["name"];
    $ev_description = $_POST['ev_description'];
    $status = $_POST['status'];
    
    if (strtotime($ev_start) > strtotime($ev_end)) {
        echo '<script language="javascript">';
        echo "if(confirm('Enter Event End greater than Start Event'))";
        echo "{document.location.href='list_events.php'};";
        echo '</script>';
    } else {
        if($image != ""){
            include 'uploadfile.php';
        
            $sql = "Update events set ev_title='$ev_title', status='$status', ev_start ='$ev_start', ev_end ='$ev_end', ev_description='$ev_description', ev_avatar='$avatar' where id_events ='$id_events '";
            query($sql);
            header('Location: list_events.php');
        }
        else{
            $sql = "Update events set ev_title='$ev_title', status='$status', ev_start ='$ev_start', ev_end ='$ev_end', ev_description='$ev_description' where id_events ='$id_events '";
            query($sql);
            header('Location: list_events.php');
        }
    }
    

}
