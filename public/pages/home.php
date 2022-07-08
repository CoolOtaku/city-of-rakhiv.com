<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Від Ципсерая до міста Рахів</title>

  <? include 'public/libs/favicon.php' ?>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="public/bootstrap/css/bootstrap.min.css" />

  <!-- Шрифти -->
  <link rel="stylesheet" type="text/css" href="public/font-awesome/css/font-awesome.min.css" />

  <? include 'public/libs/css.php' ?>
  <link rel="stylesheet" type="text/css" href="public/css/alert.css">

  <? include 'public/libs/google_login.php' ?>

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
  <!-- Анімація загрузки сторінки -->
  <div id="preloader">
    <div id="load"></div>
  </div>
  <input type="hidden" id="api_key" value="<? echo $_SESSION['ApiKey']; ?>">

  <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header page-scroll">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse" id="nav-btn-open">
          <i class="fa fa-bars"></i>
        </button>
        <a class="navbar-brand" href="">
          <img id="logo" src="public/images/logo.png" width="70px">
        </a>
      </div>

      <!-- Навігація -->
      <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
        <ul class="nav navbar-nav">
          <li id="nav_item0" class="active"><a href="#intro">Головна</a></li>
          <li><a id="nav_item1" href="#RDA_MANAGEMENT">Керівництво РДА</a></li>
          <li><a id="nav_item2" href="#news_and_announcements">Новини та оголошення</a></li>
          <li><a id="nav_item3" href="#history">Історія міста</a></li>
          <li><a id="nav_item4" href="#about_the_city">Про місто</a></li>
          <li><a id="nav_item5" href="#for_the_tourist">Для туриста</a></li>
          <li><a id="nav_item6" href="#contact">Контакти</a></li>
          <li><a id="nav_item7" href="javascript: login();">
              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
              </svg>
            </a></li>
        </ul>
      </div>
      <!-- /Навігація -->
    </div>
    <!-- /Контейнер навігації -->
    <ul class="container text-center text-white" id="adap-nav-menu">

    </ul>
  </nav>

  <!-- Секція: інтро -->
  <section id="intro" class="intro">
    <div class="slogan">
      <h2>Від Ципсерая до міста Рахів</h2>
      <h4>Вітання на сайті - візитці про місто «Рахів»</h4>
    </div>
    <div class="page-scroll">
      <a href="#RDA_MANAGEMENT" class="btn btn-circle">
        <i class="fa fa-angle-double-down animated"></i>
      </a>
    </div>
  </section>
  <!-- /Секція: інтро -->

  <? include 'public/libs/RSA_leadership.php' ?>
  
  <? include 'public/libs/news_and_announcements.php' ?>

  <? include 'public/libs/history_of_the_city.php' ?>

  <? include 'public/libs/about_the_city.php' ?>

  <? include 'public/libs/for_tourist.php' ?>

  <? include 'public/libs/contacts.php' ?>

  <? include 'public/libs/footer.php' ?>

  <? include 'public/libs/js.php' ?>
  
  <script src="public/js/alert.js"></script>

  <script src="public/js/home.js"></script>

</body>

</html>