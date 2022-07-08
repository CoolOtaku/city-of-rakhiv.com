<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Авторизація через Google</title>

    <? include 'public/libs/favicon.php' ?>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="public/css/bootstrap.css" />

    <link href="public/css/login.css" rel="stylesheet">

    <? include 'public/libs/google_login.php' ?>

</head>

<body>
    <input type="hidden" id="api_key" value="<? echo $_SESSION['ApiKey']; ?>">

    <div class="box text-black">
        <h1>Вхід в профіль</h1>
        <div class="d-flex justify-content-center">
            <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
        </div>
    </div>

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

    <script src="public/js/login.js" type="text/javascript"></script>

</body>

</html>