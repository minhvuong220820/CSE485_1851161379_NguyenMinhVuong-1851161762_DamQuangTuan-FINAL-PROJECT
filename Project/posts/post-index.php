<?php
require ('../admin/config.php');
include ('../include/function.php');
$post_id=$_GET['id'];
$post=getOnePost($post_id);
?>
<!doctype html>
<html lang="en">

<head>
    <title><?php echo $post['title']; ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/Project/index.css">
</head>

<body>
    <div class="container">
        <div class="pageheader mt-5">
            <p class="text-lg-left text-wrap d-inline-block" style="width: fit-content;"><a href="/Project/index.php"
                    class="text-decoration-none">TuHocTiengAnhHieuQua.com</a></p>
        </div>
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#33495d">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active" style="background-color: #f96e5b">
                        <a class="nav-link" href="/Project/index.php"><i class="fas fa-home"> Trang chủ</i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Project/project.html"><i class="fas fa-magic"> Khóa học hay</i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Project/login/login-page.php"><i class="fas fa-sign-in-alt">
                                Login</i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://tuhoctienganhhieuqua.com/lien-he/"><i class="fas fa-phone">
                                Liên hệ</i></a>
                    </li>
            </div>
        </nav>

        <div class="row mt-5">
            <div class="col-md-8">
                <p style="font-size: 20px;"><i class="fas fa-home"> You are here: </i><a href="/Project/index.php">
                        Home</a> / <a href="post-topic-index.php?topic=<?php echo $post['topic']; ?>"> <?php echo $post['topic']; ?></a> / <?php echo $post['title']; ?></p>
                <div class="post-info p-3">
                    <h3 class="mt-2"><?php echo $post['title']; ?></h3>
                    <ul class="" style="list-style-type: none;">
                        <li class="d-inline-block"><i class="far fa-clock"> <?php echo $post['created_at']; ?></i></li>
                        <li class="d-inline-block"><i class="fas fa-sync-alt"> <?php echo $post['updated_at']; ?></i>
                        </li>
                        <li class="d-inline-block"><i class="fas fa-folder"> <?php echo $post['topic']; ?></i></li>
                        <li class="d-inline-block"><i class="fas fa-user"> <?php echo $post['author']; ?></i></li>
                        <li class="d-inline-block"><i class="fas fa-comments"> 0</i></li>
                    </ul>
                </div>
                <img src="/Project/image/<?php echo $post['image'];?>" class="img-fluid mt-5"
                        style="width: 895px; heigh: 250px;" alt="Responsive image">
                <p class="post-content mt-5 p-3"><?php echo $post['body']; ?></p>
                <hr>
                <p class="form-text text-muted">
                    Đề xuất cho bạn
                </p>
                <a href="post-index.php?id=<?php echo $post['postid']+1; ?>" class="another-post">Click vào đây để xem thêm các bài viết khác</a>
            </div>

            <div class="col-md-4">
                <div class="card justify-content-center" style="width: 18rem;">
                    <img src="/Project/image/1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Anh Văn Giao Tiếp Cho Người Hoàn Toàn Mất Gốc</h5>
                        <p class="card-text">Nhanh chóng lấy lại nền tảng tiếng Anh bị mất gốc. Tập trung vào phần nói
                            và nghe. Phát âm chuẩn giọng Mỹ. Giao tiếp theo chủ đề.</p>
                        <a href="https://unica.vn/anh-van-giao-tiep-cho-nguoi-hoan-toan-mat-goc?coupon=nAac7lvxU4"
                            class="btn btn-outline-primary d-flex justify-content-center">Giữ ưu đãi này</a>
                    </div>
                </div>
            </div>
        </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/1e9d4d2468.js" crossorigin="anonymous"></script>
</body>

</html>