<?php
ini_set("display_errors",1);
error_reporting(E_ALL);

// conn start
function con()
{
    return mysqli_connect("localhost","chankin","root","contact_us");
}
// conn end

// old data start
function old($inputName)
{
    if(isset($_POST[$inputName])){
        return $_POST[$inputName];
    }else {
        return "";
    }
}
// old data end

// error start
function setError($inputName , $message)
{
    return $_SESSION["error"][$inputName] = $message;
}

function getError($inputName)
{
    if(isset($_SESSION["error"][$inputName])){
        return $_SESSION["error"][$inputName];
    }else{
        return "";
    }
}

function clearError()
{
    return $_SESSION["error"] = [];
}
// error end

// common start
function alert($data , $color)
{
    return "<p class='alert alert-$color'>$data</p>";
}

function textFilter($text)
{
    $letter = trim($text);
    $letter = htmlentities($letter ,ENT_QUOTES);
    $letter = stripslashes($letter);
    return $letter;
}

function runQuery($sql)
{
    if(mysqli_query(con(),$sql)){
        return true;
    }else {
        die("db error". mysqli_error(con(),$sql));
    }
}

function fetchAll($sql)
{
    $query = mysqli_query(con(),$sql);
    $rows = [];
    while($row = mysqli_fetch_assoc($query)){
        array_push($rows , $row);
    }
    return $rows;
}

function fetch($sql)
{
    $query = mysqli_query(con(),$sql);
    $row = mysqli_fetch_assoc($query);
    return $row;
}

function showTime($timeStamp, $format= "d-m-Y")
{
    return date($format, strtotime($timeStamp));
}

function linkTo($l)
{
    echo "<script>location.href = '$l'</script>";
}
// common end

// register start
function register()
{
    $errorStatus = 0;
    $name = "";
    $email = "";
    $phone = "";
    $upload = "";
    global $supportFileTypeArr;
    // name validation start
    if(empty($_POST["name"])){
        setError("name", "Name is required");
        $errorStatus = 1;
    }else if(strlen($_POST["name"]) < 4){
        setError("name", "Name is to short");
        $errorStatus = 1;
    }else if(strlen($_POST["name"]) > 10){
        setError("name", "Name is to long");
        $errorStatus = 1;
    }else if(!preg_match("/^[a-zA-Z-' ]*$/",$_POST["name"])){
        setError("name", "Only letters and white space allowed");
        $errorStatus = 1;
    }else {
        $name = textFilter($_POST["name"]);
    }
    // name validation end

    // email validation start
    if(empty($_POST["email"])){
        setError("email", "Email is required");
        $errorStatus = 1;
    }else if(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
        setError("email", "Email is invalid");
        $errorStatus = 1;
    }else {
        $email = textFilter($_POST["email"]);
    }
    // email validation end

    // phone validation start
    if(empty($_POST["phone"])){
        setError("phone", "Phone is required");
        $errorStatus = 1;
    }else if(!preg_match("/^[0-9' ]*$/",$_POST["phone"])){
        setError("phone", "Phone number is invalid");
        $errorStatus = 1;
    }else if(strlen($_POST["phone"]) < 10) {
       setError("phone", "value must be greater than 11");
       $errorStatus = 1;
    }else {
        $phone = textFilter($_POST["phone"]);
    }
    // phone validation end

    // file validation start
    if(empty($_FILES["upload"]["name"])){
        setError("upload", "file is required");
        $errorStatus = 1;
    }else if(!in_array($_FILES["upload"]["type"],$supportFileTypeArr)){
        setError("upload","file is invalid");
        $errorStatus = 1;
    }else {
        $store = "store/";
        $name = $_FILES["upload"]["name"];
        $fileName = $store.uniqid().$name;
        $tmpName = $_FILES["upload"]["tmp_name"];
        move_uploaded_file($tmpName,$fileName);
        $upload = $_FILES["upload"]["name"];
    }
    // file validation end
    if(!$errorStatus){
        $name = $_POST["name"];
        $sql = "INSERT INTO contact (name,email,phone,photo) VALUES ('$name','$email','$phone','$fileName')";
        if(runQuery($sql)){
            return alert("contact created success", "success");
        }
    }
}
// register end

// contact list start
function contactListAll()
{
    $sql = "SELECT * FROM contact";
    return fetchAll($sql);
}

function contact($id)
{
    $sql = "SELECT * FROM contact WHERE id = $id";
    return fetch($sql);
}



function contactDelete($id)
{
    $sql = "DELETE FROM contact WHERE id = $id";
    return runQuery($sql);
}

function contactUpdate()
{
    $errorStatus = 0;
    $name = "";
    $email = "";
    $phone = "";
    $upload = "";
    global $supportFileTypeArr;
    // name validation start
    if(empty($_POST["name"])){
        setError("name", "Name is required");
        $errorStatus = 1;
    }else if(strlen($_POST["name"]) < 4){
        setError("name", "Name is to short");
        $errorStatus = 1;
    }else if(strlen($_POST["name"]) > 20){
        setError("name", "Name is to long");
        $errorStatus = 1;
    }else if(!preg_match("/^[a-zA-Z-' ]*$/",$_POST["name"])){
        setError("name", "Only letters and white space allowed");
        $errorStatus = 1;
    }else {
        $name = textFilter($_POST["name"]);
    }
    // name validation end

    // email validation start
    if(empty($_POST["email"])){
        setError("email", "Email is required");
        $errorStatus = 1;
    }else if(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
        setError("email", "Email is invalid");
        $errorStatus = 1;
    }else {
        $email = textFilter($_POST["email"]);
    }
    // email validation end

    // phone validation start
    if(empty($_POST["phone"])){
        setError("phone", "Phone is required");
        $errorStatus = 1;
    }else if(!preg_match("/^[0-9' ]*$/",$_POST["phone"])){
        setError("phone", "Phone number is invalid");
        $errorStatus = 1;
    }else if(strlen($_POST["phone"]) < 11) {
       setError("phone", "value must be greater than 11");
       $errorStatus = 1;
    }else {
        $phone = textFilter($_POST["phone"]);
    }
    // phone validation end

    // file validation start
    if(empty($_FILES["upload"]["name"])){
        setError("upload", "file is required");
        $errorStatus = 1;
    }else if(!in_array($_FILES["upload"]["type"],$supportFileTypeArr)){
        setError("upload","file is invalid");
        $errorStatus = 1;
    }else {
        $store = "store/";
        $name = $_FILES["upload"]["name"];
        $fileName = $store.uniqid().$name;
        $tmpName = $_FILES["upload"]["tmp_name"];
        move_uploaded_file($tmpName,$fileName);
        $upload = $_FILES["upload"]["name"];
    }
    // file validation end
    if(!$errorStatus){
        $name = $_POST["name"];
        $id = $_POST["id"];
        $sql = "UPDATE contact SET name = '$name',phone = '$phone', email = '$email', photo = '$fileName' WHERE id = $id";
        if(runQuery($sql)){
            return linkTo("contact_list.php");
        }
    }
}
// contact list end