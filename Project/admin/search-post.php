<?php
    if(isset($_POST['title'])){
        $title = $_POST['title'];
    }
    require('config.php');
    // 2. Khai bao Truy van
    $sql = "SELECT * FROM posts WHERE title like '$title'";
    mysqli_set_charset($conn,'UTF8');
    $result = mysqli_query($conn,$sql);
    $posts_arr = array();
    while($row = mysqli_fetch_assoc($result)){
        $id = $row['postid'];
        $topic = $row['topic'];
        $author = $row['author'];
        $title = $row['title'];
        $created_at = $row['created_at'];
        $updated_at = $row['updated_at'];
        $posts_arr[] = array("postid" => $id, "topic" => $topic, "author" => $author, "title" => $title, "created_at" => $created_at, "updated_at" => $updated_at);
    }
    echo json_encode($posts_arr);

?>