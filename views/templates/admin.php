<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
    <?php include_once 'views' . DIRECTORY_SEPARATOR . $this->page . '.php'; ?>
</main>
<footer></footer>
</body>
</html>