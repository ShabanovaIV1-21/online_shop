<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Фильтры</title>
</head>
<body>
    <header class="header">

    </header>
    
    <nav class="navbar navbar-expand-lg nav-colour sticky-top shadow-lg p-3 bg-info" >
        <div class="container">
            
                <a class="navbar-brand me-5" href="#">
                  <img src="img/settings.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
                  Фильтры
                </a>
              
          
          <button class="navbar-toggler" type="button"  data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Главная</a>
              </li>
              
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Товары
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item dropdown-item-head" href="#">Комплектующие</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Жесткий диск</a></li>                
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#">О нас</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="modal" data-bs-target="#connect">Свяжитесь с нами</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="modal" data-bs-target="#login">Войти</a>
              </li>
              
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Поиск" aria-label="Поиск">
              <button class="btn btn-outline-light" type="submit">Поиск</button>
            </form>
          </div>
        </div>
      </nav>

    <main class="main">
        <div class="container">
        <h1 class="mt-5">Наши товары</h1>
        
            <div class="row mb-5">
                <div class="col-12 col-sm-6 col-lg-3 mt-4"><!--  сколько кололонок занимает элемент внутри и при какой ширине экрана-->
                    <div class="card" >
                        <img src="img/305.jpg" class="card-img-top py-2" alt="...">
                        <div class="card-body">
                        <div class="card__body-up">
                            <h5 class="card-title">Фильтр</h5>
                            <div class="price">
                            <button type="button" class="btn btn-warning">128 471 &#8381;</button>
                            </div>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                        <a class="btn btn-success align-self-end mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Посмотреть подробно</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-3 mt-4">
                    <div class="card" >
                        <img src="img/305.jpg" class="card-img-top py-2" alt="...">
                        <div class="card-body">
                        <div class="card__body-up">
                            <h5 class="card-title">Фильтр</h5>
                            <div class="price">
                            <button type="button" class="btn btn-warning">128 471 &#8381;</button>
                            </div>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                        <a class="btn btn-success align-self-end mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Посмотреть подробно</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-3 mt-4">
                    <div class="card" >
                        <img src="img/305.jpg" class="card-img-top py-2" alt="...">
                        <div class="card-body">
                        <div class="card__body-up">
                            <h5 class="card-title">Фильтр</h5>
                            <div class="price">
                            <button type="button" class="btn btn-warning">128 471 &#8381;</button>
                            </div>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                        <a class="btn btn-success align-self-end mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Посмотреть подробно</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-3 mt-4">
                    <div class="card" >
                        <img src="img/305.jpg" class="card-img-top py-2" alt="...">
                        <div class="card-body">
                        <div class="card__body-up">
                            <h5 class="card-title">Фильтр</h5>
                            <div class="price">
                            <button type="button" class="btn btn-warning">128 471 &#8381;</button>
                            </div>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                        <a class="btn btn-success align-self-end mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Посмотреть подробно</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-12 col-sm-6 col-lg-3 mt-4"><!--  сколько кололонок занимает элемент внутри и при какой ширине экрана-->
                    <div class="card" >
                        <img src="img/305.jpg" class="card-img-top py-2" alt="...">
                        <div class="card-body">
                        <div class="card__body-up">
                            <h5 class="card-title">Фильтр</h5>
                            <div class="price">
                            <button type="button" class="btn btn-warning">128 471 &#8381;</button>
                            </div>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                        <a class="btn btn-success align-self-end mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Посмотреть подробно</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-3 mt-4">
                    <div class="card" >
                        <img src="img/305.jpg" class="card-img-top py-2" alt="...">
                        <div class="card-body">
                        <div class="card__body-up">
                            <h5 class="card-title">Фильтр</h5>
                            <div class="price">
                            <button type="button" class="btn btn-warning">128 471 &#8381;</button>
                            </div>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                        <a class="btn btn-success align-self-end mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Посмотреть подробно</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-3 mt-4">
                    <div class="card" >
                        <img src="img/305.jpg" class="card-img-top py-2" alt="...">
                        <div class="card-body">
                        <div class="card__body-up">
                            <h5 class="card-title">Фильтр</h5>
                            <div class="price">
                            <button type="button" class="btn btn-warning">128 471 &#8381;</button>
                            </div>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                        <a class="btn btn-success align-self-end mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Посмотреть подробно</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-3 mt-4">
                    <div class="card" >
                        <img src="img/305.jpg" class="card-img-top py-2" alt="...">
                        <div class="card-body">
                        <div class="card__body-up">
                            <h5 class="card-title">Фильтр</h5>
                            <div class="price">
                            <button type="button" class="btn btn-warning">128 471 &#8381;</button>
                            </div>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                        <a class="btn btn-success align-self-end mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Посмотреть подробно</a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </main>

    <footer class="footer">
    <div class="row mb-5 p-5">
      <div class="col-md-3 col-sm-6 col-xs-12 footer-column mb-3">
        <h4 class="footer-title">Быстрый старт</h4>
        <a class="footer-link" href="index.html">Главная</a>
        <a class="footer-link" href="index.html">Авторизация</a>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12 footer-column mb-3">
        <h4 class="footer-title">О нас</h4>
        <a class="footer-link" href="index.html">Главная</a>
        <a class="footer-link" href="index.html">Авторизация</a>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12 footer-column mb-3">
        <h4 class="footer-title">Свяжитесь с нами</h4>
        <a class="footer-link" href="index.html">Главная</a>
        <a class="footer-link" href="index.html">Авторизация</a>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12 footer-soc mb-3">
        <h4 class="footer-title">Мы в соц. сетях</h4>
        <img class="soc-img mb-1" src="img/11.svg" alt="">
        <img class="soc-img mb-1" src="img/12.svg" alt="">
        <img class="soc-img mb-1" src="img/13.svg" alt="">
        <img class="soc-img mb-1" src="img/14.svg" alt="">
        <img class="soc-img mb-1" src="img/15.svg" alt="">
        <img class="soc-img mb-1" src="img/16.svg" alt="">
      </div>
    </div>
    </footer>
</body>
</html>