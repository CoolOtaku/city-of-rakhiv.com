<!-- Секція: Новини та оголошення -->
<section id="news_and_announcements" class="home-section text-center bg-gray">
    <div class="heading-about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="wow bounceInDown" data-wow-delay="0.4s">
                        <div class="section-heading">
                            <h2>Новини та оголошення</h2>
                            <i class="fa fa-2x fa-angle-down"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-lg-offset-5">
                <hr class="marginbot-50">
            </div>
        </div>
        <div class="row">
            <div class="container">
                <div class="slider">
                    <div class="slider__wrapper">
                        <div class="slider__items">
                            <!-- Дані завантажуються через JS -->
                            <?
                            function url(){
                                return sprintf(
                                    "%s://%s%s",
                                    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
                                    $_SERVER['SERVER_NAME'],
                                    $_SERVER['REQUEST_URI']
                                );
                            }
                            $url = url()."api/getNews";
                            $array = array(
                                'api_key' => $_SESSION['ApiKey'],
                                'type' => 'all'
                            );  
                            $curl = curl_init($url);
                            curl_setopt($curl, CURLOPT_URL, $url);
                            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($curl, CURLOPT_POST, 1);
                            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($array, '', '&'));
                            $headers = array(
                                "Accept: application/json",
                            );
                            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
                            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
                            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                            $resp = curl_exec($curl);
                            curl_close($curl);
                            
                            $resp = json_decode($resp);
                            foreach ($resp as &$value) {
                                echo "<div class=\"slider__item\" onclick=\"goToNews('".$value->id."');\"><div class=\"slider_img_container\"><img src=\"".$value->img."\" class=\"img-responsive\"></div><p class=\"slider_title_container\"><h5>".$value->title."</h5></p><p class=\"top-nav-collapse\">".$value->date."</p></div>";
                            }
                            ?>
                        </div>
                    </div>
                    <a href="#" class="slider__control" data-slide="prev"></a>
                    <a href="#" class="slider__control" data-slide="next"></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-lg-offset-5">
                <hr class="marginbot-50">
            </div>
        </div>
    </div>
</section>
<!-- /Секція: Новини та оголошення -->