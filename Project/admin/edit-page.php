<?php
require ('config.php');
include ('../include/function.php');
$user_id=$_GET["id"];
$user=getOneUser($user_id);
?>

<!doctype html>
<html lang="en">

<head>
    <title>Update User's Info</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <form action="edit-process.php?id=<?php echo $_GET["id"]; ?>" method="POST">
            <h1 class="mt-5">Update Record</h1>
            <div class="form-group mt-5">
                <label for="txtUserID">User ID</label>
                <input type="text" class="form-control" name="txtUserID" id="txtUserID"
                    value="<?php echo $user['userid'];?>" disabled="disabled">
            </div>
            <div class="form-group">
                <label for="txtFullName">Full name</label>
                <input type="text" name="txtFullName" id="txtFullName" class="form-control"
                    value="<?php echo $user['full_name'];?>" placeholder="" aria-describedby="helpId">
            </div>
            <div class="form-group">
                <label for="txtRole">Role</label>
                <input type="text" name="txtRole" id="txtRole" class="form-control" value="<?php echo $user['role'];?>"
                    placeholder="" aria-describedby="helpId">
                <small id="helpId" class="form-text text-muted">Admin (Status = 2) or User (Status = 1)</small>
            </div>
            <div class="form-group">
                <label for="txtStatus">Status</label>
                <input type="text" name="txtStatus" id="txtStatus" class="form-control"
                    value="<?php echo $user['status'];?>" placeholder="" aria-describedby="helpId">
                <small id="helpId" class="form-text text-muted">2 (Role = Admin) or 1 (Role = User)</small>
            </div>
            <div class="form-group d-flex justify-content-center">
                <button type="button" class="btn btn-lg">
                    <input type="submit" class="form-control bg-success" name="sbmSave" id="sbmSave" value="Save">
                </button>
                <a name="" id="" class="btn btn-outline-danger btn-lg" href="admin-dashboard.php"
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