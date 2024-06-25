<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/project.loc/style.css">
    <title>Фильтры</title>
</head>
<body>
    <header class="header">
    <nav class="navbar navbar-expand-lg nav-colour sticky-top shadow-lg p-3 bg-blue" >
        <div class="container">
            
                <a class="navbar-brand me-5" href="#">
                  <img src="/project.loc/img/logo.svg" alt="" width="30" height="30" class="d-inline-block align-text-top">
                  Фильтры
                </a>
          <button class="navbar-toggler" type="button"  data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/project.loc/">Главная</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="/project.loc/categories/all">Каталог</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="/project.loc/articles">Статьи</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active"  href="/project.loc/cart">Корзина</a>
              </li>
              
              <li class="nav-item">
                <?= !empty($user) ? "<a class='nav-link active' href='/project.loc/users/logout'>Выйти</a>" : '' ?>
              </li>
              <li class="nav-item">
                <?= empty($user) ? "<a class='nav-link active' href='/project.loc/users/register'>Регистрация</a>" : "<a class='nav-link active' href='/project.loc/personal'>Личный кабинет</a>" ?>
              </li>
              <li class="nav-item">
                <?= !empty($user) ? '<span class="nav-link active" >Привет, '  . $user->getNickname() . '</span>'  : "<a class='nav-link active' href='/project.loc/users/login'>Войти</a>"?>
              </li>
              
              
              
              <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Товары
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item dropdown-item-head" href="#">Комплектующие</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Жесткий диск</a></li>
                  <li><a class="dropdown-item" href="#">Материнская плата</a></li>
                  <li><a class="dropdown-item" href="#">Жесткий диск</a></li>
                  <li><a class="dropdown-item" href="#">Материнская плата</a></li>
                  <li><a class="dropdown-item" href="#">Жесткий диск</a></li>
                  <li><a class="dropdown-item" href="#">Материнская плата</a></li>
                  <li><a class="dropdown-item" href="#">Жесткий диск</a></li>
                  <li><a class="dropdown-item" href="#">Материнская плата</a></li>
                  <li><a class="dropdown-item dropdown-item-head" href="#">Комплектующие</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Жесткий диск</a></li>
                  <li><a class="dropdown-item" href="#">Материнская плата</a></li>
                  <li><a class="dropdown-item" href="#">Жесткий диск</a></li>
                  <li><a class="dropdown-item" href="#">Материнская плата</a></li>
                  <li><a class="dropdown-item" href="#">Жесткий диск</a></li>
                  <li><a class="dropdown-item" href="#">Материнская плата</a></li>
                  <li><a class="dropdown-item" href="#">Жесткий диск</a></li>
                  <li><a class="dropdown-item" href="#">Материнская плата</a></li>
                
                </ul>
              </li> -->
              
              
              
            </ul>
            <form class="d-flex" role="search" action="/project.loc/search">
              <input class="form-control me-2" type="search" placeholder="Поиск" aria-label="Поиск" name="q" id="q">
              <button class="btn btn-outline-light" type="submit">Поиск</button>
            </form>
          </div>
        </div>
      </nav>
    </header>
    
    

    <main class="main">
        <?=$content ?>
    </main>

    <footer class="footer row bg-blue p-5">
    <!-- <div class="row p-5"> -->
      <div class="col-md-3 col-sm-6 footer-column mb-3">
        <h4 class="footer-title">Быстрый старт</h4>
        <a class="footer-link" href="/project.loc/">Главная</a>
        <a class="footer-link" href="/project.loc/users/login">Авторизация</a>
      </div>
      <div class="col-md-3 col-sm-6 footer-column mb-3">
        <h4 class="footer-title">Наша политика</h4>
        <a class="footer-link" href="/project.loc">Политика конфиденциальности</a>
        <a class="footer-link" href="/project.loc">Пользовательское соглашение</a>
      </div>
      <div class="col-md-3 col-sm-6 footer-column mb-3">
        <h4 class="footer-title">Свяжитесь с нами</h4>
        <a class="footer-link" href="tel:+7 (123) 456-78-90">+7 (123) 456-78-90</a>
        <a class="footer-link" href="mailti:admin@gmail.com">admin@gmail.com</a>
      </div>
      <div class="col-md-3 col-sm-6 footer-soc mb-3">
        <h4 class="footer-title">Мы в соц. сетях</h4>
        <img class="soc-img mb-1" src="/project.loc/img/11.svg" alt="">
        <img class="soc-img mb-1" src="/project.loc/img/12.svg" alt="">
        <img class="soc-img mb-1" src="/project.loc/img/13.svg" alt="">
        <img class="soc-img mb-1" src="/project.loc/img/14.svg" alt="">
        <img class="soc-img mb-1" src="/project.loc/img/15.svg" alt="">
        <img class="soc-img mb-1" src="/project.loc/img/16.svg" alt="">
      </div>
    <!-- </div> -->
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>