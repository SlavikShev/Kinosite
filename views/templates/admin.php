<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= substr(strstr($this->page, '\\'), 1) ?></title>
    <link rel="stylesheet"
          href="../css/admin-panel-style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
<header>
    <?php if (isset($_SESSION['login'])): ?>
        <div class="Out">
            <a href="/auth/logout">
                <div class="logOut">
                    <i class="fas fa-sign-out-alt"></i>
                    <?= $_SESSION['login'] ?>
                </div>
            </a>
        </div>
    <?php endif ?>
    <?php if (isset($_SESSION['message'])): ?>
        <div class="mg">
            <div class="message">
                <p class="messageStr"><?= $_SESSION['message'] ?></p>
            </div>
        </div>
        <?php unset($_SESSION['message']) ?>
    <?php endif ?>
</header>
<main>
    <?php if (isset($_SESSION['login'])): ?>
        <h1 class="index">
            <a href="/admin/index">
                <div class="indexRef">
                    <i class="fas fa-home"></i>
                    Main page
                </div>
            </a>
        </h1>
    <?php endif ?>
    <?php include_once 'views' . DIRECTORY_SEPARATOR . $this->page . '.php'; ?>
</main>
</body>
</html>