<?php
    if(isset($_POST['name'])){
        $name = $_POST['name'];
    }
    require('config.php');
    // 2. Khai bao Truy van
    $sql = "SELECT * FROM users WHERE full_name like '$name'";
    mysqli_set_charset($conn,'UTF8');
    $result = mysqli_query($conn,$sql);
    $users_arr = array();
    while($row = mysqli_fetch_assoc($result)){
        $id = $row['userid'];
        $full_name = $row['full_name'];
        $role = $row['role'];
        $email = $row['email'];
        $users_arr[] = array("userid" => $id, "full_name" => $full_name, "role" => $role, "email" => $email);
    }
    echo json_encode($users_arr);

?>