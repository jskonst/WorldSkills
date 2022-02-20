<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link href="css/login.css" rel="stylesheet">
<script src="js/navbar.js"></script>
<?php
session_start();
$host = '127.0.0.1';
$db   = 'test_db';
$user = 'root';
$pass = '';
$charset = 'utf8';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);
try {
    $dbh = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    die('Подключение не удалось: ' . $e->getMessage());
}
if (isset($_POST['login']) && isset($_POST['password']) && $_POST['password'] != '' && $_POST['login'] != '' || isset($_POST['newlogin']) && isset($_POST['newpassword']) && isset($_POST['newname']) && isset($_POST['newemail']) && $_POST['newpassword'] != '' && $_POST['newname'] != '' && $_POST['newemail'] != '' && $_POST['newlogin'] != '' || isset($_SESSION['login']) && $_SESSION['login'] != '' && isset($_SESSION['password']) && $_SESSION['password'] != '') {
    if (isset($_SESSION['login']) && $_SESSION['login'] != '' && isset($_SESSION['password']) && $_SESSION['password'] != '') {
        $login = $_SESSION["login"];
        $password = $_SESSION["password"];
    } else {
        if (isset($_POST['login']) && isset($_POST['password']) && $_POST['password'] != '' && $_POST['login'] != '') {
            $login = $_POST['login'];
            $password = $_POST['password'];
        } else {
            $login = $_POST['newlogin'];
            $password = $_POST['newpassword'];
            $_SESSION['login'] = $login;
            $_SESSION['password'] =$password;
            $name = $_POST['newname'];
            $email = $_POST['newemail'];
            $stmt = $pdo->query("INSERT INTO authors (name, email, password, login) VALUES ('$name', '$email', '$password', '$login')");
        }
    }
    $stmt = $pdo->query("SELECT * FROM authors WHERE login = '$login' AND password = '$password'");
    $rows = $stmt->fetch();
    if (is_countable($rows)) {
        $_SESSION['login'] = $login;
        $_SESSION['password'] =$password;
        $_SESSION['author_id'] = $rows['id'];
        $stmt = $pdo->query("SELECT * FROM authors WHERE login = '$login' AND password = '$password'");
        while ($row = $stmt->fetch()) {
?>
            <nav class="navbar navbar-dark bg-primary justify-content-between">
                <a href="index.php" class="navbar-brand">Главная</a>


                <div class="dropdown accaunt_link">
                    <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo  $row['name']; ?>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="newarticle.php">Добавить статью</a></li>
                        <div class="dropdown-divider"></div>
                        <li><a class="dropdown-item" onclick="leavejs()">Выход</a></li>
                    </ul>
                </div>

            </nav>
        <?php
        }
    } else {
        ?>
        <nav class="navbar navbar-dark bg-primary justify-content-between">
            <a href="index.php" class="navbar-brand">Главная</a>
            <a href="login.php" class="nav-link mr-sm-2">Регистрация/Вход</a>

        </nav>

        <?php echo '<script language="javascript">';
        echo 'alert("При входе или регистрации произошла ошибка. Попробуйте поменять логин или почту")';
        echo '</script>'; ?>

    <?php
    }
} else {
    ?>


    <nav class="navbar navbar-dark bg-primary justify-content-between">
        <a href="index.php" class="navbar-brand">Главная</a>
        <a href="login.php" class="nav-link mr-sm-2">Регистрация/Вход</a>

    </nav>








<?php



}

