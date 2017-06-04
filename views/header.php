<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Четвертый модуль</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="/webroot/css/style.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <script src="/webroot/js/jquery-3.2.1.min.js"></script>

    <script src="/webroot/js/jquery.modal.min.js"></script>
    <script src="/webroot/js/jquery.cookie.min.js"></script>



</head>

<!--выполняться один раз при открытии страницы сайта-->

<body style="background-color:<?= $data['config'][1]['value']; ?>">

<div id="opn-win" style="display:none;" class="animated fadeInDown">
    <br>
    <form>
        <input type="login" placeholder="Ваше имя">
        <input type="email" placeholder="Ваш электронный адрес...">
        <input type="submit" value="Подписаться">
    </form>
</div>


<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:<?= $data['config'][0]['value'] ?>">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Переключатель</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">Учебный сайт</a>
    </div>
    <ul id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
            <li><a class="active" href="/category/list">Категории новостей</a></li>
            <li><a href="/news/list/">Список новостей</a></li>
            <li><a href="/find/">Поиск</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Меню
                    <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Беременность</a></li>
                    <li class="dropdown-submenu">
                        <a href="#">Малыши</a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Мне 1 год</a></li>
                            <li><a href="#">А вот уже и 2 год!</a></li>
                            <li><a href="#">3 года! А что дальше?</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Дети</a></li>
                    <li><a href="#">Все о питании</a></li>
                </ul>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <?php if (Session::get('login')): ?>
                <li><a href="/">Добро пожаловать,  <?= Session::get('login'); ?></a></li>
                <li><a href="/users/logout/">Выйти</a></li>
            <?php else : ?>
                <li><a href="/users/register/">Register</a></li>
                <li><a href="/users/login/">Войти</a></li>
            <?php endif; ?>
        </ul>
        <form action="search.php" method="post" name="form" onsubmit="return false;"
              class="navbar-form navbar-right" role="search">
            <div class="form-group">
                <div class="btn-group">
                    <input type="text" autocomplete="off" id="search" data-toggle="dropdown" class="form-control"
                           placeholder="search by tags"> </input>
                    <ul id="resSearch" class="dropdown-menu">
                    </ul>
                </div>
            </div>
        </form>
</nav>
<br>
<?php if (App::getRoutes()->getMethodPrefix() == null): ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2">
                <?php for ($prom = $data['promotion'], $cnt = count($data['promotion']), $i = 0;
                $i < $cnt;
                $i++): ?>
                <?php if ($i == ceil($cnt / 2)) : ?>
            </div>
            <div class="col-sm-2 col-sm-push-8">
                <?php endif; ?>
                <div class="banner" data-placement="right" data-toggle="tooltip"
                     title="Купон на скидку-1gjh12gj23jg3se.-Примените и получите 10% скидки">
                    <p>Цена : <span><?= $prom[$i]['price'] ?></span> грн.</p>
                    <p>Переходов : <?= $prom[$i]['cnt'] ?></p>
                    <p id="<?= $prom[$i]['id'] ?>">
                        <a href="<?= $prom[$i]['site'] ?>"><?= $prom[$i]['firm'] ?> <?= $prom[$i]['product_name'] ?></a>
                    </p>
                </div>
                <?php endfor; ?>
            </div>
            <div class="col-sm-8 col-sm-pull-2">
                <?php if (Session::hasFlash()) { ?>
                    <div class="starter-template">
                        <div class="alert alert-info" role="alert">
                            <?php Session::flash(); ?>
                        </div>
                    </div>
                <?php } ?>
                <?php include $this->path; ?>
            </div>
        </div>
    </div>
<?php elseif (Session::get('login') == 'admin'): ?>
    <?php include VIEW_PATH . DS . App::getRoutes()->getMethodPrefix() . DS . 'admin_menu.php'; ?>
<?php else : ?>
    <div class="container">
    <?php include $this->path; ?>
    </div>
<?php endif; ?>


<?php include VIEW_PATH . DS . 'footer.php'; ?>
</body>
<script src="/webroot/js/main.js"></script>
</html>
