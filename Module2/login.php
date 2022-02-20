<!DOCTYPE html>
<html>

<head>
    <title>
        Вход
    </title>
    <link href="css/login.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-dark bg-primary justify-content-between">
        <a href="index.php" class="navbar-brand">Главная</a>

    </nav>
    <div class="form_wrap">
        <div class="wrap">
            <h2>Регистрация и вход</h2><br>
            <form action="index.php" method="post">
                <p> <input class='reg_input' type="text" placeholder="Логин" name="login" /><br>
                     <input class='reg_input' type="text" placeholder="Пароль" name="password" /></p>
                <p><button type="submit" class="btn btn-primary">Войти</button></p>
            </form>
            <form action="index.php" method="post">
                <p>
                     <input class='reg_input' type="text" placeholder="Имя" name="newname" /><br>
                     <input class='reg_input' type="text" placeholder="Эл.почта" name="newemail" /><br>
                     <input class='reg_input' type="text" placeholder="Логин" name="newlogin" /><br>
                     <input class='reg_input' type="text" placeholder="Пароль" name="newpassword" /><br>

                </p>
                <p><button type="submit" class="btn btn-primary">Регистрация</button></p>
            </form>
        </div>
    </div>
</body>

</html>