<?php
    // Kiem tra
    $errors = array();
    $full_name = $_POST['txtFullName'];
    if (empty($full_name)) {
		$errors[] = 'You forgot to enter your full name.';
    }
    
    $user_name = $_POST['txtUsername'];
	if (empty($user_name)) {
		$errors[] = 'You forgot to enter your user name.';
    }
    
    $email = $_POST['txtEmail'];
	if (empty($email)) {
		$errors[] = 'You forgot to enter your email address.';
    }
    
    $password1 = $_POST['txtPassword'];
	$password2 = $_POST['txtPassword2'];
	if (!empty($password1)) {
		if ($password1 !== $password2) { //#4
			$errors[] = 'Your two password did not match.';
		} 
	} else {
		$errors[] = 'You forgot to enter your password.';
	}
    // Kiem tra Error:
    if (empty($errors)){
        // Neu ko co loi: lam gi do tiep theo
        // B1: Ket noi database Server;
        $conn = mysqli_connect('localhost','root','','projectdb');
        if(!$conn){
            die('Khong the ket noi');
        }
        // B2: Khai bao cau truy van
        $password_hash = password_hash($password1, PASSWORD_DEFAULT);
        $activation_code = substr(md5(uniqid(rand(), true)), 16, 16);
        // echo $activation_code;
        $sql = "INSERT INTO users ( full_name, username, email, password, registration_date, activation_code)
                VALUES('$full_name','$user_name','$email','$password_hash',NOW(),'$activation_code')";
        // echo $sql;
        if(mysqli_query($conn,$sql)){
            require_once "contact.php";
            $m = new sendMail();
            $from='minhvuongys@gmail.com';
            $tieudethu = '[TuHocTiengAnhHieuQua] Please verify your email address';
            $noidungthu = 'Almost done, @TuHocTiengAnhHieuQua! To complete your TuHocTiengAnhHieuQua sign up, we just need to verify your email address: web2code2vn@gmail.com.';
            $noidungthu = '<a href="http://localhost/Project/signup/active.php?code='.$activation_code.'">Click Here</a>';
            $p = 'hoilamgi123';
            $error = '';
            $m -> sendMailFromLocalhost($email, $from, $tennguoigui="TuHocTiengAnhHieuQua", $tieudethu, $noidungthu, $from, $p, $error);
            header("Location: ../signup/verify-email.html");
            exit();
        }else{
            header("Location: ../signup/signup-page.php");
            exit();
        }
        // B3: Xử lý kết quả
    }else{
        // Co loi, hien thi lai loi cho nguoi dung biet
        echo "Co loi nhap lieu ...";
    }
?>