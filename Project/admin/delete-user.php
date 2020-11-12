<?php
    $user_id = $_GET['id'];
    require("config.php");
    include("../include/function.php");
    // B2: Khai bao truy van
    if(deleteUser($user_id)){
        header("Location:admin-dashboard.php");
        exit();
    }else{
        echo "Loi gi do ...";
    }
    // B3: Dong ket noi
    mysqli_close($conn);
?>