<?php
$salt = "12edwsadfspAKFpkAPQWOir-K@@o2jAws";
$ttl_cookie = 3600;
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$password = hash('sha256', filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING) . $salt);

$mysql = new mysqli('localhost', 'root', 'root', 'cow_check');
$result = $mysql->query("select * from `user` where `login` = '$login' and `password` = '$password'");
$mysql->close();
$user = $result->fetch_assoc();

if (count($user) == 0) {
    echo "ERROR USER NOT FOUND";
    exit();
}
setcookie('user_cookie', $user['id'], time() + $ttl_cookie, "/");
header('Location: /');
?>