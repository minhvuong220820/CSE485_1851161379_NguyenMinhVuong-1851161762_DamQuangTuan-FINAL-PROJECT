<?php
    // User Functions
    function getAllUsers(){
        global $conn;
        $sql = "SELECT * FROM users";
        $result = mysqli_query($conn,$sql);
        $users = mysqli_fetch_all($result);
        return $users;
    }

    function getOneUsername($username){
        global $conn;
        global $username;
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn,$sql);
        $user1 = mysqli_fetch_all($result);
        return $user1;
    }

    function getOneUser($id){
        global $conn;
        $sql = "SELECT * FROM users WHERE userid = '$id'";
        $result = mysqli_query($conn,$sql);
        $user = mysqli_fetch_assoc($result);
        return $user;
    }
    
    function getOnePost($id){
        global $conn;
        $sql = "SELECT * FROM posts WHERE postid = '$id'";
        $result = mysqli_query($conn,$sql);
        $post = mysqli_fetch_assoc($result);
        return $post;
    }

    function deleteUser($id){
        global $conn;
        $sql = "DELETE FROM users WHERE userid = '$id'";
        if(mysqli_query($conn,$sql))
            return TRUE;
        else
            return FALSE;
    }

    function deletePost($id){
        global $conn;
        $sql = "DELETE FROM posts WHERE postid = '$id'";
        if(mysqli_query($conn,$sql))
            return TRUE;
        else
            return FALSE;
    }
?>