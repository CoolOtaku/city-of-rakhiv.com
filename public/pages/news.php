<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Сторінка з публікацією</title>

    <? include 'public/libs/favicon.php' ?>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="public/css/bootstrap.css" />

    <!-- Стилі -->
    <link rel="stylesheet" type="text/css" href="public/css/news.css">
    <meta name="theme-color" content="#712cf9">

</head>

<body>
    <input type="hidden" id="api_key" value="<? echo $_SESSION['ApiKey']; ?>">
    <header>
        <div class="navbar navbar-dark shadow-sm">
            <div class="container">
                <a href="/" class="navbar-brand d-flex align-items-center">
                    <img id="logo" src="public/images/logo.png" width="20">
                    <strong class="ms-3">ВІД ЦИПСЕРАЯ ДО МІСТА РАХІВ</strong>
                </a>
            </div>
        </div>
    </header>

    <main>
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <div class="d-flex justify-content-center">
                        <img id="news-img" class="rounded" src="">
                    </div>
                    <h1 id="news-title" class="fw-light mt-4"></h1>
                    <p id="news-date" class="lead text-muted">📅 </p>
                    <p>
                    <div id="news-text">

                    </div>
                    </p>
                </div>
            </div>
        </section>

    </main>

    <footer class="text-muted py-5">
        <div class="container">
            <p class="float-end mb-1">
                <a href="#">На верх</a>
            </p>
            <p class="mb-1">©SYOMCHIK, рік створення - 2022.</p>
        </div>
    </footer>

    <!-- HelloPreload -->
    <style type="text/css">
        #hellopreloader>p {
            display: none;
        }

        #hellopreloader_preload {
            display: block;
            position: fixed;
            z-index: 99999;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            min-width: 300px;
            background: #67b0d1 url(public/images/load.gif) center center no-repeat;
            background-size: 96px;
        }
    </style>
    <div id="hellopreloader">
        <div id="hellopreloader_preload"></div>
    </div>
    <script type="text/javascript">
        var hellopreloader = document.getElementById("hellopreloader_preload");

        function fadeOutnojquery(el) {
            el.style.opacity = 1;
            var interhellopreloader = setInterval(function() {
                el.style.opacity = el.style.opacity - 0.05;
                if (el.style.opacity <= 0.05) {
                    clearInterval(interhellopreloader);
                    hellopreloader.style.display = "none";
                }
            }, 16);
        }
        window.onload = function() {
            setTimeout(function() {
                fadeOutnojquery(hellopreloader);
            }, 1000);
        };
    </script>
    <!-- HelloPreload -->

    <!-- JavaScript Движки -->
    <script src="public/js/jquery.min.js"></script>
    <script src="public/js/jquery.cookie.js"></script>
    <script src="public/js/bootstrap-admin.js"></script>

    <script src="public/js/news.js" type="text/javascript"></script>

</body>

</html>