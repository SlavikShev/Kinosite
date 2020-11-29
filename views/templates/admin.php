<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <style>
        .usersMenu > i {
            font-size: 200px;

        }

        .usersBtns {
            display: flex;
            justify-content: center;
            justify-items: center;
            align-items: center;
        }

        .usersMenu {
            border: black solid 1px;
            height: 250px;
            width: 250px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>
</head>
<body>
<header>
    <?php if (isset($_SESSION['login'])): ?>
        <a href="/auth/logout">logout</a>
    <?php endif ?>
    <?php if (isset($_SESSION['message'])): ?>
        <p><?= $_SESSION['message'] ?></p>
        <?php unset($_SESSION['message']) ?>
    <?php endif ?>
</header>
<main>
    <h1>Admin panel</h1>

    <?php if (isset($_SESSION['login'])): ?>
        <nav>
            <a href="/admin/index">Admin panel</a>
            <a href="/admin/films">Films</a>
            <a href="/admin/users">Users</a>
        </nav>
    <?php endif ?>
    <?php include_once 'views' . DIRECTORY_SEPARATOR . $this->page . '.php'; ?>
</main>
<footer></footer>
</body>
</html>