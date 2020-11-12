<?php
    require ('config.php');
    include ('../include/function.php');
    $post_id=$_GET['id'];
    $post=getOnePost($post_id);
    $topic=$_POST['txtTopic'];
    $title=$_POST['txtTitle'];
    $body=$_POST['txtBody'];
    foreach ($post as $row){
        $x = $row['0'];
        $sql = "SELECT * FROM posts WHERE postid = '$x'";
    }
    $sql = "UPDATE posts SET topic = '$topic', title = '$title', body = '$body', updated_at = NOW() WHERE postid ='$post_id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header('Location: ../admin/post-managerment.php');
    exit();
?>