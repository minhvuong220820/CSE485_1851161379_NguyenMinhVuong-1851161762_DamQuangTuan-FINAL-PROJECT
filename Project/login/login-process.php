<?php
    // Kiem tra
    $errors = array();
    global $username;
    $username = $_POST['txtUsername'];
	if (empty($username)) {
		$errors[] = 'You forgot to enter your User name.';
    }

    $password = $_POST['txtPassword'];
	if (empty($password)) {	
			$errors[] = 'Your two password did not match.';
	} 
    // Kiem tra Error:
    if (empty($errors)){
        // B1: Ket noi database Server;
        $conn = mysqli_connect('localhost','root','','projectdb');
        if(!$conn){
            die('Khong the ket noi');
        }
        // B2: Khai bao cau truy van
        $sql = "SELECT * FROM users WHERE username='$username'";
        // echo $sql;
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            $row = mysqli_fetch_assoc($result);
            $password_hash = $row['password'];
            // echo $password_hash;
            if(password_verify($password,$password_hash)){
                $result1 = mysqli_query($conn,$sql);
                $stt = mysqli_fetch_all($result1);
                foreach ($stt as $row) {
                    if($row['8'] == '2'){
                        header("Location:../admin/admin-dashboard.php");
                    }
                    elseif($row['8'] == '1'){
                        header("Location:../user/user-dashboard.php?un=$username");
                    }
                    else {
                        header("Location:../signup/verify-email.html");
                    }
                }
                
            }
            else{
                echo "Chưa khớp";
            }
        }else{
            echo "Username không tồn tại !";
        }

    }else{
        // Co loi, hien thi lai loi cho nguoi dung biet
        echo "Co loi nhap lieu ...";
    }
?>