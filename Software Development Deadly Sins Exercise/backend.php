<?php
session_start();
$title = "Info Sec - Software Development Deadly Sins Exercise";

function connectDB(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "info sec";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function persistentLogin(){
    if(!isset($_SESSION['logged in'])){
        header('location: regis.php');
    }
}

function getUUID(){
    $conn=connectDB();
    $stmt = $conn->prepare("SELECT * FROM `users` WHERE `username` =?");
    $stmt->bind_param("s", $_SESSION['u']);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $conn->close();
    if($result->num_rows==1){ // uuid exists
        $row=$result->fetch_assoc();
        return $row['uuid'];
    }
}

function cookieU(){
    if (isset($_COOKIE["u"]))
        echo "Welcome " . getUsername($_COOKIE["u"]). "!";
    else {
        echo "Welcome guest!";
    setcookie("u", getUUID(), time()+3600);
    }
}

function getUsername(){
    $conn=connectDB();
    $stmt = $conn->prepare("SELECT * FROM `users` WHERE `uuid` =?");
    $stmt->bind_param("s", $_COOKIE['u']);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $conn->close();
    if($result->num_rows==1){ 
        $row=$result->fetch_assoc();
        return $row['username'];
    }
}

function getPassword($username){
    $conn=connectDB();
    $stmt = $conn->prepare("SELECT * FROM `users` WHERE `username` =?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $conn->close();
    if($result->num_rows==1){ 
        $row=$result->fetch_assoc();
        return $row['password'];
    }
}

function generateUUID(){ //sir ean's magic from appdev <3
    $generate = "";
    $char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $length = 32;
    for ($i = 0; $i < $length; $i++ ) {
        $generate[$i]=$char[intval(floor((rand(0,10)/10)*$length))];
    }
    checkUUIDExists($generate);
    return $generate;
}

function checkUUIDExists($code){ //sir ean's magic from appdev <3
    $conn=connectDB();
    $stmt = $conn->prepare("SELECT * FROM `users` WHERE `uuid` =?");
    $stmt->bind_param("s", $code);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $conn->close();
    if($result->num_rows>0){ // uuid exists
        generateUUID();
    }else{
        return $code;
    }
}

function checkUsernameExists($code){ // based on sir ean's magic from appdev <3
    $conn=connectDB();
    $stmt = $conn->prepare("SELECT * FROM `users` WHERE `username` =?");
    $stmt->bind_param("s", $code);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $conn->close();
    if($result->num_rows==1){ // username exists
        return 1;
    }else{
        if(isset($_SESSION['error'])){
            unset($_SESSION["error"]);
        }
        return 0;
    }
}

if(isset($_POST['signup'])){
    $uuid=generateUUID();
	$userNum= checkUsernameExists($_POST['username']);
    if($userNum==0 && !isset($_SESSION['error'])){
        $conn=connectDB();
        $stmt = $conn->prepare("INSERT INTO `users` (`uuid`, `username`, `password`) VALUES (?, ?, ?)");
        $hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $stmt->bind_param("sss", $uuid, $_POST['username'], $hash);
        $stmt->execute();
        // echo "New records created successfully";
        $stmt->close();
        $conn->close();
        header("location: index.php");
    }else{
        $_SESSION['error']= "Username '".$_POST['username']."' is already taken.";
        if(isset($_SESSION['login error'])){
            unset($_SESSION['login error']);
        }
        header("location: regis.php");
    }   
}

if(isset($_POST['login'])){ 
    if(isset($_SESSION['error'])){
        unset($_SESSION["error"]);
    }
    $conn=connectDB();
    $userNum= checkUsernameExists($_POST['username']);
    if(filter_var($userNum, FILTER_VALIDATE_INT) == true && password_verify($_POST['password'], getPassword($_POST['username']))==true){
        // found username and password
        if(!isset($_SESSION['login error'])){
            unset($_SESSION['login error']);
        }
        $_SESSION['logged in']=true;
        $_SESSION['u']=$_POST['username'];
        header("location: index.php");
    }else{
        $_SESSION['login error']= "Username/password incorrect" ;
        header("location: regis.php");
    }
}

if(isset($_POST['logout'])){ 
    session_destroy();
    setcookie('u', "",  time()-86400);
    header("location: regis.php");
}
?>