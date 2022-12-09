<?php
include './session.php';
include './post.php';

if(isset($_POST['menu'])){
    $main_path=MAIN_PATH.'/';
    $menu_link=['home'];
    echo json_encode(['main_path'=>$main_path,'menu_link'=>$menu_link]);
}
?>