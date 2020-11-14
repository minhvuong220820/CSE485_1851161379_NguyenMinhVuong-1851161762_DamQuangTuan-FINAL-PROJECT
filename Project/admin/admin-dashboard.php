<?php
require ('config.php');
include ('../include/function.php');
?>
<!doctype html>
<html lang="en">

<head>
    <title>User Managerment</title>
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
                        <a class="list-group-item active list-group-item-action text-center"
                            href="admin-dashboard.php"><i class="fas fa-users"> User Management</i></a>
                        <a class="list-group-item list-group-item-action text-center" href="post-managerment.php"><i
                                class="fas fa-edit"> Post Management</i></a>
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
                                <input class="form-control" type="text" name="name" id="name"
                                    placeholder="Search User's Full Name">
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>User Id</th>
                                    <th>Full name</th>
                                    <th>Role</th>
                                    <th>Email</th>
                                    <th>Info</th>
                                    <th>Edit Role</th>
                                    <th>Delete User</th>
                                </tr>
                            </thead>
                            <tbody id="user">
                                <?php
                        $sql="SELECT * FROM users";
                        $result=mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_assoc($result)){
                        ?>
                                <tr>
                                    <td scope="row"><?php echo $row['userid'];?></td>
                                    <td><?php echo $row['full_name'];?></td>
                                    <td><?php echo $row['role'];?></td>
                                    <td><?php echo $row['email'];?></td>
                                    <td><a class="d-flex justify-content-center"
                                            href="view-user.php?id=<?php echo $row['userid']; ?>"><i
                                                class="far fa-eye"></i></a></td>
                                    <td><a class="d-flex justify-content-center"
                                            href="edit-page.php?id=<?php echo $row['userid']; ?>"><i
                                                class="fas fa-user-edit"></i></a></td>
                                    <td><a class="d-flex justify-content-center"
                                            href="delete-user.php?id=<?php echo $row['userid']; ?>"><i
                                                class="far fa-trash-alt"></i></a></td>
                                </tr>
                                <?php
                            }
                        ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <footer>
        <p class="text-center pt-3 pb-3 mb-0 mt-5" style="background-color: #ddd;">Copyright © 2012 - 2018 ·
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
            var name = $("#name").val();
            // Xử lý truyền -- nhận bằng Ajax
            if (name === '') {
                alert("Chưa nhập tên người dùng !");
            } else {
                $.ajax({
                    //Xu ly truyen
                    url: 'search-user.php',
                    type: 'POST',
                    data: {
                        name: name
                    },
                    dataType: 'json',
                    //Xy ly gia tri tra ve
                    success: function(res) {
                        // var obj = $.parseJSON(res);
                        $("tbody").empty();
                        for (var i = 0; i < res.length; i++) {
                            var id = res[i]['userid'];
                            var full_name = res[i]['full_name'];
                            var role = res[i]['role'];
                            var email = res[i]['email'];

                            $("tbody").append(
                                "<tr>" +
                                "<td>" + id + "</td>" +
                                "<td>" + full_name + "</td>" +
                                "<td>" + role + "</td>" +
                                "<td>" + email + "</td>" +
                                "<td>" +
                                "<a class='d-flex justify-content-center' href='view-user.php?id=" +
                                id + "'><i class='far fa-eye'>" + "</i>" + "</a>" +
                                "</td>" +
                                "<td>" +
                                "<a class='d-flex justify-content-center' href='edit-page.php?id=" +
                                id + "'><i class='fas fa-user-edit'>" + "</i>" +
                                "</a>" + "</td>" +
                                "<td>" +
                                "<a class='d-flex justify-content-center' href='delete-user.php?id=" +
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