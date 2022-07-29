<?php
ini_set("display_errors",1);
error_reporting(E_ALL);
require_once ("core/base.php");
require_once ("core/functions.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $url ?>/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $url ?>/assets/vendor/data_table/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/vendor/feather-icons-web/feather.css">
    <link rel="stylesheet" href="assets/vendor/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?php echo $url ?>/assets/css/style.css">
    <title>Document</title>
</head>
<body style="background-color:#002b36;">
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="col-12 col-md-10">
            <div class="card shadow-lg" style="background-color: rgba(238, 232, 213, .125) ;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-primary font-monospace contact-list-header"></i>Contact List</h4>
                        <a href="form.php" class="border p-3 btn btn-primary add-contact-btn"><i class="fas fa-circle-plus fa-1x mr-2"></i>Add Contact</a>
                    </div>
                    <table class="table table-hover table-responsive table-bordered">
                        <thead>
                            <tr>
                                <th class="text-white text-center">#</th>
                                <th class="text-white text-center">photo</th>
                                <th class="text-white text-center">Name</th>
                                <th class="text-white text-center">Email</th>
                                <th class="text-white text-center">Phone</th>
                                <th class="text-white text-center">Control</th>
                                <th class="text-white text-center">Created_at</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach(contactListAll() as $key => $c){ ?>
                                <tr>
                                    <td class="text-white text-nowrap text-center table-data"><?php echo $c["id"] ?></td>
                                    <td class="text-white text-nowrap text-center table-data">
                                        <img src="<?php echo $c["photo"] ?>" alt="" class="photo">
                                    </td>
                                    <td class="text-white text-nowrap text-center table-data"><?php echo $c["name"] ?></td>
                                    <td class="text-white text-nowrap text-center table-data"><?php echo $c["email"] ?></td>
                                    <td class="text-white text-nowrap text-center table-data"><?php echo $c["phone"] ?></td>
                                    <td class="text-white text-nowrap text-center table-data">
                                        <a href="contact_delete.php?id=<?php echo $c["id"] ?>" onclick="return confirm('Are u sure delete')" class="btn btn-outline-danger btn-sm"><i class="feather-trash-2 fa-fw"></i></a>
                                        <a href="contact_edit.php?id=<?php echo $c["id"] ?>" class="btn btn-outline-info btn-sm"><i class="feather-edit-2 fa-fw"></i></a>
                                    </td>
                                    <td class="text-white text-nowrap text-center table-data"><?php echo showTime($c["created_at"]) ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="<?php echo $url ?>/assets/vendor/jquery.js"></script>
<script src="<?php echo $url ?>/assets/vendor/data_table/jquery.dataTables.min.js"></script>
<script src="<?php echo $url ?>/assets/vendor/data_table/dataTables.bootstrap4.min.js"></script>
</body>
</html>
