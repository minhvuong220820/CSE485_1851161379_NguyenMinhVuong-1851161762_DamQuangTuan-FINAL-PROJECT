<?php
    require ('config.php');
    include ('../include/function.php');
    $user_id=$_GET['id'];
    $user=getOneUser($user_id);
    $fullname=$_POST['txtFullName'];
    $role=$_POST['txtRole'];
    $stt=$_POST['txtStatus'];
    foreach ($user as $row){
        $x = $row['0'];
        $sql = "SELECT * FROM users WHERE userid = '$x'";
    }
    $sql = "UPDATE users SET full_name = '$fullname', role = '$role', status = '$stt' WHERE userid ='$user_id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header('Location: ../admin/admin-dashboard.php');
    exit();
?>