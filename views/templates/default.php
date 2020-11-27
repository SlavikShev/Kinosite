<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= substr(strstr($this->page, '\\'), 1) ?></title>
    <link rel="stylesheet"
          href="css/style.css">
</head>
<body>
    <header>
        <nav class="header-nav">
            <div class="header-box-logo">
                <a href="#"><img src="images/logo.png"
                                 alt="Logo"
                                 class="header-logo_img img"></a>
            </div>
        </nav>
    </header>
    <main>
        <div class="main-box_first">
            <nav class="main-nav">
                <ul>
                    <li>
                        <a href="#">#</a>
                    </li>
                    <li>
                        <a href="#">#</a>
                    </li>
                    <li>
                        <a href="#">#</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="main-box_second">
            <?php include_once 'views' . DIRECTORY_SEPARATOR . $this->page . '.php' ?>
        </div>
        <div class="main-adverts">
            <div class="box-adverts">
                <a href="https://www.tesla.com/models" target="_blank"><img src="images/tesla-s.jpg" alt = "tesla-s"></a>
                <a href="https://www.tesla.com/solarpanels" target="_blank"><img src="images/tesla-solar-panel.jpg" alt = "tesla-solar-panel"></a>
            </div>
        </div>
    </main>
    <footer>
        <div><p>JUN-2020</p></div>
    </footer>
</body>
</html>