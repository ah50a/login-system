<?php
$title = 'Login';
include_once "layout/header.php";
include_once "midleware/guest.php";
include_once "layout/navbar.php";


$users = [
    [
        'id' => 1,
        'name' => 'Ahmed',
        'email' => 'ahmed@gmail.com',
        'password' => 12345,
        'gender' => 'm',
        'image' => '1.jpg'
    ],
    [
        'id' => 2,
        'name' => 'Mohamed',
        'email' => 'mohamed@gmail.com',
        'password' => 12345,
        'gender' => 'm',
        'image' => '1.jpg'
    ],
    [
        'id' => 3,
        'name' => 'Fatma',
        'email' => 'fatma@gmail.com',
        'password' => 12345,
        'gender' => 'f',
        'image' => '1.jpg'
    ]
];

if ($_POST) {
    # code...
    $erorrs = [];
    if (empty($_POST['email'])) {
        # code...
        $erorrs['email_requier'] = "<div class='text-danger font-weight-bold'>*Email Is Requierd</div>";
    }
    if (empty($_POST['password'])) {
        # code...
        $erorrs['password_requier'] = "<div class='text-danger font-weight-bold'>*Password Is Requierd</div>";
    }

    if (empty($erorrs)) {
        # code...
        foreach ($users as  $user) {
            # code...

            if ($_POST['email'] == $user['email'] && $_POST['password'] == $user['password']) {
                # code...
                $_SESSION['user'] = $user;
                header('location:index.php');
            }
            $erorrs['wrong-data'] = "<div class='text-danger font-weight-bold'>*Email Or Password Is Wrong</div>";
        }
    }
}
?>
<div class="contianer">
    <div class="row">
        <div class="col-12 text-center h1">
        </div>
        <div class="col-4 offset-4">
            <form method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" value="<?= (isset($_POST['email']) ? $_POST['email']: '') ?>" id="email" class="form-control" placeholder="" aria-describedby="helpId">
                    <?php
                    if (isset($erorrs['email_requier'])) {
                        # code...
                        echo $erorrs['email_requier'];
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="" aria-describedby="helpId">
                    <?php
                    if (isset($erorrs['password_requier'])) {
                        # code...
                        echo $erorrs['password_requier'];
                    }
                    if (isset( $erorrs['wrong-data'])) {
                        # code...
                        echo $erorrs['wrong-data'];
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



