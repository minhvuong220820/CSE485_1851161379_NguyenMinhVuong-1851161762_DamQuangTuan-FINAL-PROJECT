<?php
    $post_id = $_GET['id'];
    require("config.php");
    include("../include/function.php");
    // B2: Khai bao truy van
    if(deletePost($post_id)){
        header("Location:post-managerment.php");
        exit();
    }else{
        echo "Loi gi do ...";
    }
    // B3: Dong ket noi
    mysqli_close($conn);
?>