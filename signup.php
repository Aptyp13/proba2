<?php
$dbc = mysqli_connect('localhost', 'root', '', 'proba');
if (!$dbc) {
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

//var_dump($_POST);
if(isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
    $password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
    $password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));
    if(!empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {
        $query ="SELECT * FROM `probasignup` WHERE username = '$username'";
        $data = mysqli_query($dbc, $query);
        if(mysqli_num_rows($data) == 0) {
            $query ="INSERT INTO `probasignup` (username, password) VALUES ('$username', SHA('$password2'))";
            mysqli_query($dbc,$query);

            echo 'Всё готово, теперь можно авторизироваться';
            mysqli_close($dbc);
            exit();
        }
        else {
            echo 'Логин уже существует';
        }
    }
}
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="proba.css">
    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="isotop.css">
    <link rel="stylesheet" type="text/css" href="slider.css">

    <link rel="stylesheet" href="fm.revealator.jquery.min.css">
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/fm.revealator.jquery.min.js"></script>

</head>
<body>


<!--15:03-->
<section class="fullpage">
    <header>
        <div class="container">
           <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">
                    <img src="img/Your%20Logo.png">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-menu-about" href="#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-menu-services" href="#services">Servicing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-menu-portfolio" href="#portfolio">Portfolio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-menu-blog" href="#blog">blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-menu-contuct" href="#contuct">Contact us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.google.com"><i class=" icon-search"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <div class="content">
        <div class="container">
            <h1 class="revealator-slideleft revealator-delay2 revealator-once">Web development project</h1>
            <p class="revealator-slideright revealator-delay2 revealator-once pinf">Заригестрируйтесь для продолжения</p>
        </div>



<div class="container">
        <div class="formsignup">
            <form class="signup" method="post">
                <label for="username">Ваш login</label>
                <input type="text" name="username" id="username" required><br>
                <label for="password">Введите пароль</label>
                <input type="password" name="password1" id="password1" required><br>
                <label for="password">Введите пароль ещё раз</label>
                <input type="password" name="password2" id="password2" required>
                <button type="submit" name="submit">Регистрация</button>
            </form>
        </div>
</div>



    </div>


    <div class="footer">
        <p>All rights Reserved © 2017</p>
    </div>



</section>
</body>
</html>