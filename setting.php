<?php
$title = 'Change Acount Information';
include_once "layout/header.php";
include_once "midleware/auth.php";
include_once "layout/navbar.php";

define('ALLOWEDEXTENTION', [
    'jpg', 'png', 'jpeg'
]);

define('SIZE_ALLOEWD', 10 ** 6);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    # code...
    $erorrs = [];
    if (empty($_POST['name'])) {
        # code...
        $erorrs['name-requier'] = "<div class='text-danger font-weight-bold'>*Name Is Requierd</div>";
    }
    if (empty($_POST['email'])) {
        # code...
        $erorrs['email-requier'] = "<div class='text-danger font-weight-bold'>*Email Is Requierd</div>";
    }
    if (empty($_POST['gender'])) {
        # code...
        $erorrs['gender-requier'] = "<div class='text-danger font-weight-bold'>*Gender Is Requierd</div>";
    }

    if (empty($erorrs)) {
        # code...
        if ($_FILES['image']['error'] == 0) {
            # code...
            //extention validate
            $extention = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            if (!in_array($extention, ALLOWEDEXTENTION)) {
                # code...
                $erorrs['image']['extention'] = "<div class='text-danger font-weight-bold'>*Allowed Extention Are: " . implode(', ', ALLOWEDEXTENTION) . "</div>";
            }

            //size validate
            if ($_FILES['image']['size'] > SIZE_ALLOEWD) {
                # code...
                $erorrs['image']['size'] = "<div class='text-danger font-weight-bold'>*Maximum Uploaded File Must Be Less Than: " . SIZE_ALLOEWD / (10 ** 6) . "</div";
            }

            //update image
            if (empty($erorrs)) {
                # code...
                $image_path = 'images/users';
                $image_name = time() . '.' . $extention;
                $full_path = "$image_path/$image_name";
                move_uploaded_file($_FILES['image']['tmp_name'], $full_path);
                $_SESSION['user']['image'] = $image_name;
            }
        }

        if (empty($erorrs)) {
            # code...
            $_SESSION['user']['name'] = $_POST['name'];
            $_SESSION['user']['email'] = $_POST['email'];
            $_SESSION['user']['gender'] = $_POST['gender'];
            $success = "<div class='text-success alert alert-success font-weight-bold'>*Updated Uploaded Successfully</div>";
        }
    }
}
?>

<div class="contianer">
    <div class="row">
        <div class="col-12 text-center h1">
            <?= $title ?>
        </div>
        <div class="col-4 offset-4">
        <?php
            if (isset($success)) {
                # code...
                echo $success;
            }
            ?>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group text-center">
                    <label for="image"><img src="images/users/<?= $_SESSION['user']['image'] ?>" class="w-100 rounded-circle" style="cursor: pointer; height:200px; " alt="<?= $_SESSION['user']['name'] ?>"> </label>
                    <input type="file" name="image" id="image" class="d-none">
                    <?php 
                        if (!empty($erorrs['image'])) {
                            # code...
                            foreach ($erorrs['image'] as  $erorr) {
                                # code...
                                echo $erorr;
                            }
                        }
                    ?>
                </div>
                <hr class="mt-5">
                <div class="form-row">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="" aria-describedby="helpId">
                    <?php
                    if (isset($erorrs['name-requier'])) {
                        # code...
                        echo $erorrs['name-requier'];
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="" aria-describedby="helpId">
                    <?php
                    if (isset($erorrs['email-requier'])) {
                        # code...
                        echo $erorrs['email-requier'];
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="gander">Gander</label>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" value="m" id="customControlValidation2" name="gender" <?= ($_SESSION['user']['gender'] == 'm' ? 'checked' : '') ?> required>
                        <label class="custom-control-label" for="customControlValidation2">Male</label>
                    </div>
                    <div class="custom-control custom-radio mb-3">
                        <input type="radio" class="custom-control-input" value="f" id="customControlValidation3" name="gender" <?= ($_SESSION['user']['gender'] == 'f' ? 'checked' : '') ?> required>
                        <label class="custom-control-label" for="customControlValidation3">Famle</label>
                    </div>
                    <?php
                    if (isset($erorrs['gender-requier'])) {
                        # code...
                        echo $erorrs['gender-requier'];
                    }
                    ?>
                </div>
                <div class="form-group">
                    <button class="btn btn-outline-dark rounded"><?= $title ?></button>
                </div>
            </form>


        </div>
    </div>
</div>
<?php
include_once "layout/footer.php";
?>