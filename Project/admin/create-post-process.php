<?php

$target_dir = "../image/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
// if(isset($_POST["submit"])) {
//   $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//   if($check !== false) {
//     //echo "File is an image - " . $check["mime"] . ".";
//     $uploadOk = 1;
//   } else {
//     //echo "File is not an image.";
//     $uploadOk = 0;
//   }
// }

// Check if file already exists
// if (file_exists($target_file)) {
//   echo "Sorry, file already exists.";
//   $uploadOk = 0;
// }

// Check file size
// if ($_FILES["fileToUpload"]["size"] > 500000) {
//   echo "Sorry, your file is too large.";
//   $uploadOk = 0;
// }

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} 
else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

        $topic = $_POST['txtTopic'];
        $title = $_POST['txtTitle'];
        $image = htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));
        $content = $_POST['txtBody'];
    } 
    else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$conn = mysqli_connect('localhost','root','','projectdb');
if(!$conn){
    die('Khong the ket noi');
}
$sql = "INSERT INTO posts ( userid, topic, author, title, image, body, created_at, updated_at)
                        VALUES('1','$topic','NMV','$title','$image','$content',NOW(),NOW())";

if(mysqli_query($conn, $sql)){
    
    header("Location:../admin/post-managerment.php");
}
else{
    echo"error";
}
mysqli_close($conn);


?>