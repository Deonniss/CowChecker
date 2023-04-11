<?php

$salt = "12edwsadfspAKFpkAPQWOir-K@@o2jAws";
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

if (mb_strlen($login) < 4 || mb_strlen($login) > 16) {
    echo "ERROR LOGIN LEN (4-16)";
    exit();
} else if (mb_strlen($name) < 2 || mb_strlen($name) > 32) {
    echo "ERROR NAME LEN (2-32)";
    exit();
} else if (mb_strlen($password) < 4 || mb_strlen($password) > 32) {
    echo "ERROR PASSWORD LEN (4-32)";
    exit();
}

$password = hash('sha256', $password.$salt);

$mysql = new mysqli('localhost', 'root', 'root', 'cow_check');
$mysql->query("insert into `user` (`login`, `password`, `name`) values ('$login', '$password', '$name')");
$mysql->close();

header('Location: /');

?>

