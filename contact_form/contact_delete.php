<?php 
ini_set("display_errors",1);
error_reporting(E_ALL);
require_once ("core/base.php");
require_once ("core/functions.php");

// local file delete
$id = $_GET["id"];
// $sql = "SELECT * FROM contact WHERE id = '$id'";
// $query = mysqli_query(con(),$sql);
// $row = mysqli_fetch_assoc($query);
$localFile = contact($id);
unlink($localFile["photo"]);

// db file delete
if(contactDelete($id)){
    linkTo("contact_list.php");
}