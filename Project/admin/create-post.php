<!doctype html>
<html lang="en">

<head>
    <title>Create Post</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <form action="create-post-process.php" method="POST" enctype="multipart/form-data">
            <h1 class="mt-5">Create Post</h1>
            <div class="form-group mt-5">
                <label for="txtTopic">Topic</label>
                <input type="text" name="txtTopic" id="txtTopic" class="form-control" value="" placeholder=""
                    aria-describedby="helpId">
            </div>
            <div class="form-group">
                <label for="txtTitle">Title</label>
                <input type="text" name="txtTitle" id="txtTitle" class="form-control" value="" placeholder=""
                    aria-describedby="helpId">
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <p>Select image to upload: </p>
                <input type="file" name="fileToUpload" id="fileToUpload">
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label for="txtBody">Content</label>
                    <textarea class="form-control" name="txtBody" id="txtBody" rows="30"></textarea>
                </div>
            </div>
            <div class="form-group d-flex justify-content-center">
                <button type="button" class="btn btn-lg">
                    <input type="submit" class="form-control bg-success" name="sbmSave" id="sbmSave" value="Create">
                </button>
                <a name="" id="" class="btn btn-outline-danger btn-lg" href="post-managerment.php"
                    role="button">Cancel</a>
            </div>
        </form>
    </div>
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
</body>

</html>