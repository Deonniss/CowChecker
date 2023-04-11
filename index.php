<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Форма регистрации</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>
<body>

<div class="container mt-4">
    <?php if ($_COOKIE['user_cookie'] == '') : ?>
        <div class="row">
            <div class="col">
                <h1>Форма регистрации</h1>
                <form action="validation-form/check.php" method="post">
                    <input type="text" class="form-control" name="login" id="login_r" placeholder="Введите логин"><br>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Введите имя"><br>
                    <input type="password" class="form-control" name="password" id="password_r"
                           placeholder="Введите пароль"><br>
                    <button class="btn btn-success" type="submit">Регистрация</button>
                </form>
            </div>
            <div class="col">
                <h1>Форма авторизации</h1>
                <form action="validation-form/auth.php" method="post">
                    <input type="text" class="form-control" name="login" id="login_a" placeholder="Введите логин"><br>
                    <input type="password" class="form-control" name="password" id="password_a" placeholder="Введите пароль"><br>
                    <button class="btn btn-success" type="submit">Войти</button>
                </form>
            </div>
        </div>
    <?php else: ?>
        <p>Hello <?= $_COOKIE['user_cookie'] ?>. <a href="/exit.php">Выйти</a> </p>
    <?php endif; ?>
</div>
</body>
</html>