<?php
    require_once("config.php");
    if(isset($_REQUEST["user"]) && isset($_REQUEST["pass"])){
        
    }
    else {
        
    }
    try {
        $connect = new PDO('mysql:host = '.$hostname.'; dbname = '.$database, $username, $password);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $account = $_REQUEST['user'];
        $pass = $_REQUEST['pass'];
        $sql = "SELECT * FROM quanlibanhang.dangnhap WHERE taikhoan = '$account' AND matkhau = '$pass'";
        $query = $connect->prepare($sql);
        $query->execute();
        $result = $query;
        if($result->rowCount()>0){
            session_start();
            $_SESSION["logined"] = "OK";
            header('location: order.php');
        }
        else{
            header('location: login.php');
        }
    }catch(PDOException $err){
        die($err->getMessage());
    }
?>