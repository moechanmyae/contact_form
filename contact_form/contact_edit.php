<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
require_once("core/base.php");
require_once("core/functions.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $url ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $url ?>/assets/vendor/feather-icons-web/feather.css">
    <link rel="stylesheet" href="<?php echo $url ?>/assets/vendor/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?php echo $url ?>/assets/css/style.css">
    <title>Contact Form</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="text-white mb-0 text-uppercase">contact update form</h4>
                            <a href="<?php echo $url ?>/contact_list.php"><i class="fas fa-bars fa-2x"></i></a>
                        </div>     
                        <hr>
                        <?php
                            $id = $_GET["id"];
                            $current = contact($id);
                            if(isset($_POST["update-btn"])){
                                echo contactUpdate();
                            }
                        ?>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <!-- name start -->
                            <div class="form-group">
                                <label for="name" class="text-white"><i class="feather-user text-primary mx-2"></i>name</label>
                                <input type="hidden" name="id" value="<?php echo  $current["id"] ?>">
                                <input type="text" id="name" name="name" class="form-control" value="<?php echo $current["name"] ?>">
                                <small class="text-danger font-monospace"><?php echo getError("name") ?></small>
                            </div>
                            <!-- name end -->

                            <!-- email start -->
                            <div class="form-group mt-4">
                                <label for="email" class="text-white"><i class="feather-user text-primary mx-2"></i>email</label>
                                <input type="text" id="email" name="email" class="form-control" value="<?php echo $current["email"] ?>">
                                <small class="text-danger font-monospace"><?php echo getError("email") ?></small>
                            </div>
                            <!-- email end -->

                            <!-- phone start -->
                            <div class="form-group mt-4">
                                <label for="phone" class="text-white"><i class="feather-user text-primary mx-2"></i>phone</label>
                                <input type="number" id="phone" name="phone" min="11" class="form-control" value="<?php echo $current["phone"] ?>">
                                <small class="text-danger font-monospace"><?php echo getError("phone") ?></small>
                            </div>
                            <!-- phone end -->

                            <!-- file start -->
                            <div class="form-group mt-4">
                                <label for="file" class="text-white"><i class="feather-user text-primary mx-2"></i>upload</label>
                                <input type="file" id="file" name="upload" accept=".jpg,.jpeg,.png" class="form-control" value="<?php echo $current["photo"] ?>">
                                <small class="text-danger font-monospace"><?php echo getError("upload") ?></small>
                            </div>
                            <!-- file end -->
                            <hr>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" checked required type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">All Correct</label>
                                </div>
                                <button class="btn btn-primary text-uppercase" name="update-btn">contact update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php clearError() ?>
    <script src="<?php echo $url ?>/assets/vendor/jquery.js"></script>
    <script src="<?php echo $url ?>/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>