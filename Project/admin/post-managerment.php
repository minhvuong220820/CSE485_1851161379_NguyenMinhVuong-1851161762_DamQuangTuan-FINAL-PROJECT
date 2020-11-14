<?php
require ('config.php');
include ('../include/function.php');
?>
<!doctype html>
<html lang="en">

<head>
    <title>Post Managerment</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="container-fluid">
        <nav class="navbar navbar-expand-sm navbar-light bg-danger">
            <a class="navbar-brand" href="/Project/index.php">TuHocTiengAnhHieuQua.com</a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse"
                data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" name="txtUserID" id="txtUserID"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php
                                if (isset($_SESSION['name']))
                                {
                                echo $_SESSION['name'];
                                }
                            ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="#">Change Password</a>
                            <a class="dropdown-item" href="#">Log Out</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <main class="mt-5">
            <div class="row">
                <div class="col-md-4">
                    <ul class="list-unstyled list-group">
                        <a class="list-group-item list-group-item-action text-center" href="admin-dashboard.php"><i
                                class="fas fa-users"> User Management</i></a>
                        <a class="list-group-item active list-group-item-action text-center"
                            href="post-managerment.php"><i class="fas fa-edit"> Post Management</i></a>
                    </ul>
                </div>
                <div class="col-md-8 ">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="submit" value="Search" class="btn btn-outline-dark btn-md" name="search"
                                id="search">
                        </div>
                        <div class="col-md-8">
                            <div class="active-pink-3 active-pink-4 mb-4">
                                <input class="form-control" type="text" name="title" id="title"
                                    placeholder="Search Post's Title">
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Post Id</th>
                                    <th>Topic</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Edit Post</th>
                                    <th>Delete Post</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                        $sql="SELECT * FROM posts";
                        $result=mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_assoc($result)){
                        ?>
                                <tr>
                                    <td scope="row"><?php echo $row['postid'];?></td>
                                    <td><?php echo $row['topic'];?></td>
                                    <td><?php echo $row['author'];?></td>
                                    <td><?php echo $row['title'];?></td>
                                    <td><?php echo $row['created_at'];?></td>
                                    <td><?php echo $row['updated_at'];?></td>
                                    <td><a class="d-flex justify-content-center"
                                            href="edit-post.php?id=<?php echo $row['postid']; ?>"><i
                                                class="fas fa-edit"></i></a></td>
                                    <td><a class="d-flex justify-content-center"
                                            href="delete-post.php?id=<?php echo $row['postid']; ?>"><i
                                                class="far fa-trash-alt"></i></a></td>
                                </tr>
                                <?php
                            }
                        ?>
                            </tbody>
                        </table>
                    </div>
                    <a name="" id="" class="btn btn-lg btn-outline-success" href="/Project/admin/create-post.php"
                        role="button">Create new Post</a>
                </div>
            </div>
        </main>
    </div>

    <footer>
        <p class="text-center pt-3 pb-3 mt-5 mb-0" style="background-color: #ddd;">Copyright © 2012 - 2018 ·
            TuHocTiengAnhHieuQua.com</p>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/1e9d4d2468.js" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function() {
        $("#search").click(function() {

            //    Lấy giá trị:
            var title = $("#title").val();
            // Xử lý truyền -- nhận bằng Ajax
            if (title === '') {
                alert("Chưa nhập tiêu đề bài viết !");
            } else {
                $.ajax({
                    //Xu ly truyen
                    url: 'search-post.php',
                    type: 'POST',
                    data: {
                        title: title
                    },
                    dataType: 'json',
                    //Xy ly gia tri tra ve
                    success: function(res) {
                        // var obj = $.parseJSON(res);
                        $("tbody").empty();
                        for (var i = 0; i < res.length; i++) {
                            var id = res[i]['postid'];
                            var topic = res[i]['topic'];
                            var author = res[i]['author'];
                            var title = res[i]['title'];
                            var created_at = res[i]['created_at'];
                            var updated_at = res[i]['updated_at'];
                            $("tbody").append(
                                "<tr>" +
                                "<td>" + id + "</td>" +
                                "<td>" + topic + "</td>" +
                                "<td>" + author + "</td>" +
                                "<td>" + title + "</td>" +
                                "<td>" + created_at + "</td>" +
                                "<td>" + updated_at + "</td>" +
                                "<td>" +
                                "<a class='d-flex justify-content-center' href='edit-post.php?id=" +
                                id + "'><i class='fas fa-edit'>" + "</i>" + "</a>" +
                                "</td>" +
                                "<td>" +
                                "<a class='d-flex justify-content-center' href='delete-post.php?id=" +
                                id + "'><i class='far fa-trash-alt'>" + "</i>" +
                                "</a>" + "</td>" +
                                "</tr>"
                            );
                        }
                    }
                })
            }
        })
    })
    </script>
</body>

</html>