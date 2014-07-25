<?php
/**
 * Created by PhpStorm.
 * User: Stuart Eske
 * Date: 21/07/2014
 * Time: 15:59
 */
?>
<!doctype html>
<html>
<head lang="en">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <title>@yield('site_title') | WhatIf</title>
    <meta name="description" content="WhatIf - Insurance" />
    <meta name="keywords" content="whatif, insurance">
    <meta property="og:title" content="">

    {{ HTML::style('whatif/css/bootstrap.min.css') }}
    {{ HTML::style('whatif/css/font-awesome.min.css') }}
    <link rel="stylesheet" href="fancybox/jquery.fancybox-v=2.1.5.css" type="text/css" media="screen">
    {{ HTML::style('whatif/css/font-awesome.min.css') }}
    {{ HTML::style('whatif/css/style.css') }}

    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,600,300,200&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

    <link rel="prefetch" href="images/zoom.png">

</head>

<body>
<!-- Top Menu -->
@include('whatif.shared.front.top-menu')


<!-- === Arrows === -->
<div id="arrows">
    <div id="arrow-up" class="disabled"></div>
    <div id="arrow-down"></div>
    <div id="arrow-left" class="disabled visible-lg"></div>
    <div id="arrow-right" class="disabled visible-lg"></div>
</div><!-- /.arrows -->


<!-- === MAIN Background === -->
<div class="slide story" id="slide-1" data-slide="1">
    <div class="container">
        <div id="home-row-1" class="row clearfix">
            <div class="col-12">
                <h1 class="font-semibold">WhatIf <span class="font-thin">Insurance</span></h1>
                <h4 class="font-thin">Genetrixs in brema <span class="font-semibold">nunquam convertam orexis</span> cur liberi experimentum.</h4>
                <br>
                <br>
            </div><!-- /col-12 -->
        </div><!-- /row -->
        <div id="home-row-2" class="row clearfix">
            <div class="col-12 col-sm-4"><div class="home-hover navigation-slide" data-slide="4"><img src="images/s02.png"></div><span>PROFESSIONAL</span></div>
            <div class="col-12 col-sm-4"><div class="home-hover navigation-slide" data-slide="3"><img src="images/s01.png"></div><span>FRIENDLY</span></div>
            <div class="col-12 col-sm-4"><div class="home-hover navigation-slide" data-slide="5"><img src="images/s03.png"></div><span>SUITABLE</span></div>
        </div><!-- /row -->
    </div><!-- /container -->
</div><!-- /slide1 -->

<!-- === Slide 2 === -->
<div class="slide story" id="slide-2" data-slide="2">
    <div class="container">
        <div class="row title-row">
            <div class="col-12 font-thin">Contrary to popular belief, <span class="font-semibold">Lorem Ipsum</span> is not simply random text.</div>
        </div><!-- /row -->
        <div class="row line-row">
            <div class="hr">&nbsp;</div>
        </div><!-- /row -->
        <div class="row subtitle-row">
            <div class="col-12 font-thin">This is what <span class="font-semibold">we do best</span></div>
        </div><!-- /row -->
        <div class="row content-row">
            <div class="col-12 col-lg-3 col-sm-6">
                <p><i class="icon icon-eye-open"></i></p>
                <h2 class="font-thin">Visual <span class="font-semibold">Identity</span></h2>
                <h4 class="font-thin">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h4>
            </div><!-- /col12 -->
            <div class="col-12 col-lg-3 col-sm-6">
                <p><i class="icon icon-laptop"></i></p>
                <h2 class="font-thin">Web <span class="font-semibold">Design</span></h2>
                <h4 class="font-thin">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h4>
            </div><!-- /col12 -->
            <div class="col-12 col-lg-3 col-sm-6">
                <p><i class="icon icon-tablet"></i></p>
                <h2 class="font-thin">Mobile <span class="font-semibold">Apps</span></h2>
                <h4 class="font-thin">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h4>
            </div><!-- /col12 -->
            <div class="col-12 col-lg-3 col-sm-6">
                <p><i class="icon icon-pencil"></i></p>
                <h2 class="font-semibold">Development</h2>
                <h4 class="font-thin">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h4>
            </div><!-- /col12 -->
        </div><!-- /row -->
    </div><!-- /container -->
</div><!-- /slide2 -->

<!-- === SLide 3 - Portfolio -->
<!--<div class="slide story" id="slide-3" data-slide="3">-->
<!--    <div class="row">-->
<!--        <div class="col-12 col-sm-6 col-lg-2"><a data-fancybox-group="portfolio" class="fancybox" href="images/portfolio/p01-large.jpg"><img class="thumb" src="images/portfolio/p01-small.jpg" alt=""></a></div>-->
<!--        <div class="col-12 col-sm-6 col-lg-2"><a data-fancybox-group="portfolio" class="fancybox" href="images/portfolio/p02-large.jpg"><img class="thumb" src="images/portfolio/p02-small.jpg" alt=""></a></div>-->
<!--        <div class="col-12 col-sm-6 col-lg-2"><a data-fancybox-group="portfolio" class="fancybox" href="images/portfolio/p09-large.jpg"><img class="thumb" src="images/portfolio/p09-small.jpg" alt=""></a></div>-->
<!--        <div class="col-12 col-sm-6 col-lg-2"><a data-fancybox-group="portfolio" class="fancybox" href="images/portfolio/p010-large.jpg"><img class="thumb" src="images/portfolio/p10-small.jpg" alt=""></a></div>-->
<!--        <div class="col-12 col-sm-6 col-lg-2"><a data-fancybox-group="portfolio" class="fancybox" href="images/portfolio/p05-large.jpg"><img class="thumb" src="images/portfolio/p05-small.jpg" alt=""></a></div>-->
<!--        <div class="col-12 col-sm-6 col-lg-2"><a data-fancybox-group="portfolio" class="fancybox" href="images/portfolio/p06-large.jpg"><img class="thumb" src="images/portfolio/p06-small.jpg" alt=""></a></div>-->
<!--        <div class="col-12 col-sm-6 col-lg-2"><a data-fancybox-group="portfolio" class="fancybox" href="images/portfolio/p07-large.jpg"><img class="thumb" src="images/portfolio/p07-small.jpg" alt=""></a></div>-->
<!--        <div class="col-12 col-sm-6 col-lg-2"><a data-fancybox-group="portfolio" class="fancybox" href="images/portfolio/p08-large.jpg"><img class="thumb" src="images/portfolio/p08-small.jpg" alt=""></a></div>-->
<!--        <div class="col-12 col-sm-6 col-lg-2"><a data-fancybox-group="portfolio" class="fancybox" href="images/portfolio/p03-large.jpg"><img class="thumb" src="images/portfolio/p03-small.jpg" alt=""></a></div>-->
<!--        <div class="col-12 col-sm-6 col-lg-2"><a data-fancybox-group="portfolio" class="fancybox" href="images/portfolio/p04-large.jpg"><img class="thumb" src="images/portfolio/p04-small.jpg" alt=""></a></div>-->
<!--        <div class="col-12 col-sm-6 col-lg-2"><a data-fancybox-group="portfolio" class="fancybox" href="images/portfolio/p11-large.jpg"><img class="thumb" src="images/portfolio/p11-small.jpg" alt=""></a></div>-->
<!--        <div class="col-12 col-sm-6 col-lg-2"><a data-fancybox-group="portfolio" class="fancybox" href="images/portfolio/p12-large.jpg"><img class="thumb" src="images/portfolio/p12-small.jpg" alt=""></a></div>-->
<!--    </div><!-- /row -->
<!--</div><!-- /slide3 -->

<!-- === Slide 4 - Process === -->
<!--<div class="slide story" id="slide-4" data-slide="4">-->
<!--    <div class="container">-->
<!--        <div class="row title-row">-->
<!--            <div class="col-12 font-thin">See us <span class="font-semibold">at work</span></div>-->
<!--        </div><!-- /row -->
<!--        <div class="row line-row">-->
<!--            <div class="hr">&nbsp;</div>-->
<!--        </div><!-- /row -->
<!--        <div class="row subtitle-row">-->
<!--            <div class="col-sm-1 hidden-sm">&nbsp;</div>-->
<!--            <div class="col-12 col-sm-10 font-light">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</div>-->
<!--            <div class="col-sm-1 hidden-sm">&nbsp;</div>-->
<!--        </div><!-- /row -->
<!--        <div class="row content-row">-->
<!--            <div class="col-sm-1 hidden-sm">&nbsp;</div>-->
<!--            <div class="col-12 col-sm-2">-->
<!--                <p><i class="icon icon-bolt"></i></p>-->
<!--                <h2 class="font-thin">Listening to<br><span class="font-semibold" >your needs</span></h2>-->
<!--                <h4 class="font-thin">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</h4>-->
<!--            </div><!-- /col12 -->
<!--            <div class="col-12 col-sm-2">-->
<!--                <p><i class="icon icon-cog"></i></p>-->
<!--                <h2 class="font-thin">Project<br><span class="font-semibold">discovery</span></h2>-->
<!--                <h4 class="font-thin">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</h4>-->
<!--            </div><!-- /col12 -->
<!--            <div class="col-12 col-sm-2">-->
<!--                <p><i class="icon icon-cloud"></i></p>-->
<!--                <h2 class="font-thin">Storming<br><span class="font-semibold">our brains</span></h2>-->
<!--                <h4 class="font-thin">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</h4>-->
<!--            </div><!-- /col12 -->
<!--            <div class="col-12 col-sm-2">-->
<!--                <p><i class="icon icon-map-marker"></i></p>-->
<!--                <h2 class="font-thin">Getting<br><span class="font-semibold">there</span></h2>-->
<!--                <h4 class="font-thin">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</h4>-->
<!--            </div><!-- /col12 -->
<!--            <div class="col-12 col-sm-2">-->
<!--                <p><i class="icon icon-gift"></i></p>-->
<!--                <h2 class="font-thin">Delivering<br><span class="font-semibold">the product</span></h2>-->
<!--                <h4 class="font-thin">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</h4>-->
<!--            </div><!-- /col12 -->
<!--            <div class="col-sm-1 hidden-sm">&nbsp;</div>-->
<!--        </div><!-- /row -->
<!--    </div><!-- /container -->
<!--</div><!-- /slide4 -->

<!-- === Slide 5 === -->
<!--<div class="slide story" id="slide-5" data-slide="5">-->
<!--    <div class="container">-->
<!--        <div class="row title-row">-->
<!--            <div class="col-12 font-thin"><span class="font-semibold">Clients</span> we’ve worked with</div>-->
<!--        </div><!-- /row -->
<!--        <div class="row line-row">-->
<!--            <div class="hr">&nbsp;</div>-->
<!--        </div><!-- /row -->
<!--        <div class="row subtitle-row">-->
<!--            <div class="col-sm-1 hidden-sm">&nbsp;</div>-->
<!--            <div class="col-12 col-sm-10 font-light">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. <br/><br/> The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero.</div>-->
<!--            <div class="col-sm-1 hidden-sm">&nbsp;</div>-->
<!--        </div><!-- /row -->
<!--        <div class="row content-row">-->
<!--            <div class="col-1 col-sm-1 hidden-sm">&nbsp;</div>-->
<!--            <div class="col-12 col-sm-2"><img src="images/client01.png" alt=""></div>-->
<!--            <div class="col-12 col-sm-2"><img src="images/client02.png" alt=""></div>-->
<!--            <div class="col-12 col-sm-2"><img src="images/client03.png" alt=""></div>-->
<!--            <div class="col-12 col-sm-2"><img src="images/client04.png" alt=""></div>-->
<!--            <div class="col-12 col-sm-2"><img src="images/client05.png" alt=""></div>-->
<!--            <div class="col-1 col-sm-1 hidden-sm">&nbsp;</div>-->
<!--        </div><!-- /row -->
<!--    </div><!-- /container -->
<!--</div><!-- /slide5 -->

<!-- === Slide 6 / Contact === -->
<div class="slide story" id="slide-6" data-slide="6">
    <div class="container">
        <div class="row title-row">
            <div class="col-12 font-light">Leave us a <span class="font-semibold">message</span></div>
        </div><!-- /row -->
        <div class="row line-row">
            <div class="hr">&nbsp;</div>
        </div><!-- /row -->
        <div class="row subtitle-row">
            <div class="col-sm-1 hidden-sm">&nbsp;</div>
            <div class="col-12 col-sm-10 font-light">You can find us literally anywhere, just push a button and we’re there</div>
            <div class="col-sm-1 hidden-sm">&nbsp;</div>
        </div><!-- /row -->
        <div id="contact-row-4" class="row">
            <div class="col-sm-1 hidden-sm">&nbsp;</div>
            <div class="col-12 col-sm-2 with-hover-text">
                <p><a target="_blank" href="#"><i class="icon icon-phone"></i></a></p>
                <span class="hover-text font-light ">+44 4839-4343</span></a>
            </div><!-- /col12 -->
            <div class="col-12 col-sm-2 with-hover-text">
                <p><a target="_blank" href="#"><i class="icon icon-envelope"></i></a></p>
                <span class="hover-text font-light ">munter@blacktie.co</span></a>
            </div><!-- /col12 -->
            <div class="col-12 col-sm-2 with-hover-text">
                <p><a target="_blank" href="#"><i class="icon icon-home"></i></a></p>
                <span class="hover-text font-light ">London, England<br>zip code 98443</span></a>
            </div><!-- /col12 -->
            <div class="col-12 col-sm-2 with-hover-text">
                <p><a target="_blank" href="#"><i class="icon icon-facebook"></i></a></p>
                <span class="hover-text font-light ">facebook/blacktie_co</span></a>
            </div><!-- /col12 -->
            <div class="col-12 col-sm-2 with-hover-text">
                <p><a target="_blank" href="#"><i class="icon icon-twitter"></i></a></p>
                <span class="hover-text font-light ">@BlackTie_co</span></a>
            </div><!-- /col12 -->
            <div class="col-sm-1 hidden-sm">&nbsp;</div>
        </div><!-- /row -->
    </div><!-- /container -->
</div><!-- /Slide 6 -->

</body>

<!-- SCRIPTS -->
{{ HTML::script('whatif/js/html5shiv.js') }}
{{ HTML::script('whatif/js/jquery-1.10.2.min.js') }}
{{ HTML::script('whatif/js/jquery-migrate-1.2.1.min.js') }}
{{ HTML::script('whatif/js/bootstrap.min.js') }}
{{ HTML::script('whatif/js/jquery.easing.1.3.js') }}
{{ HTML::script('whatif/fancybox/jquery.fancybox.pack-v=2.1.5.js') }}
{{ HTML::script('whatif/js/script.js') }}

<!-- fancybox init -->
<script>
    $(document).ready(function(e) {
        var lis = $('.nav > li');
        menu_focus( lis[0], 1 );

        $(".fancybox").fancybox({
            padding: 10,
            helpers: {
                overlay: {
                    locked: false
                }
            }
        });

    });
</script>

</html>